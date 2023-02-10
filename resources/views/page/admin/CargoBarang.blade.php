{{-- 
1. Copy and paste the template, rename it 
2. Add route to your blade file 
3. Add code 
--}}

@extends('layouts.app')

@section('preload')
    {{-- Datatables --}}
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>  

    {{-- Loading Jquery --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easy-loading/1.3.0/jquery.loading.js"></script>
@endsection

@section('title') 
    <title>Cargo aja</title>
@endsection 

@section('top-nav-bar') 
    @include('layouts.loggednav')
@endsection

@section('content')    
    <!-- Modal tracking -->
    <div class="modal fade modal-dialog-scrollable" id="modalTracking" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
            {{-- <h1 class="modal-title fs-5" id="modalLabelTracking">Modal title</h1> --}}
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="parentTableIdTracking"> 
                <table id="tableIdTracking" class="display">
                    <thead>
                        <tr> 
                            <th>Deskripsi Tracking</th> 
                            <th>Status Pembayaran</th> 

                            <th>Tanggal</th> 
                        </tr>
                    </thead>
                    <tbody> 
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
            {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> --}}
            {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
            </div>
        </div>
        </div>
    </div>

    {{-- Error handler --}} 
    <div class="container"> 
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Barang</li> 
            </ol>
        </nav>
    </div>
    <div class="container-fluid"> 
        <div class="row justify-content-center align-items-center g-2">
            <div class="col">
                <p class="fs-1 text text-center">Semua Barang</p>
            </div> 
        </div>
        <div class="row justify-content-center align-items-start">
            <div class="col-auto shadow-sm p-3 float-start">
                <div class="row-auto justify-content-center align-items-center">
                    <div class="col-12">
                        <label for="jenisBarang" class="fs-5 form-label fw-bold w-100">Fitur</label>  
                    </div>
                    <div class="col-12 pt-2"> 
                        @if (Auth::user()->is_user_superadmin)
                            <div class="dropdown dropend">
                                <button class="btn fs-5 btn btn-success dropdown-toggle" type="button" id="triggerId" data-bs-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        Tambah Pengiriman
                                        </button>
                                <div class="dropdown-menu" aria-labelledby="triggerId">
                                    <a role="button" class="dropdown-item" href="barang/truk/insert#pengiriman">Truk</a>
                                    <a role="button" class="dropdown-item" href="barang/bus/insert#pengiriman">Bus</a>
                                </div>
                            </div>
                        @else
                            <a role="button" class="fs-5 btn btn-success" href="{{ url('barang/' . $jenisUser .'/insert#pengiriman') }}">Tambah Pengiriman</a>
                        @endif
                    </div>  
                    <div class="col-12 pt-2 ">
                        <a role="button" class="fs-5 btn btn-success w-100" href="{{ url('barang/manifest') }}">Manifest</a>
                    </div>  
                </div>
            </div>
            <div class="col-8 shadow-sm p-3" id="tableIdParent">  
                @if ($errors->any())
                    <div class="fs-5 alert alert-danger bg-danger text-white border-0 text-center" role="alert" id="toggleStatusPengiriman">
                        {{session('errors')->first('message')}} 
                        <button type="button" class="btn-close float-end" id="btnCloseErrorMessage" aria-label="Close"></button>
                    </div>
                @endif 
                <table id="tableId" class="display">
                    <thead>
                        <tr> 
                            <th></th>
                            <th>Pengirim</th>
                            <th>Penerima</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                            <th>Resi</th>

                            <th>Tanggal</th>

                            <th class="text text-center">Ubah</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($allCargo as $barang) 
                            @if (!($barang->jenis_pengiriman != $jenisUser && !Auth::user()->is_user_superadmin))
                                <tr>
                                    <td class="@if ($barang->is_lunas && $barang->is_diterima) bg-success text-white @endif" data-toggle="tooltip" data-placement="top" title="Jenis Pengiriman {{ $barang->jenis_pengiriman }}">{{ $loop->index + 1 }}</td> 
                                    <td>{{ explode(" ", $barang->nama_pengirim)[0]}}</td> 
                                    <td>{{ explode(" ", $barang->nama_penerima)[0]}}</td> 
                                    <td>{{ $barang->biaya }}</td>  
                                    <td>{{ $barang->jumlah_barang }}</td>  

                                    <td>{{ $barang->no_resi }}</td>  

                                    <td>{{ $barang->last_id_message_tracking }}</td>  

                                    <td>
                                        <div class="row justify-content-start align-items-center g-2 px-3">
                                            @if (!$barang->is_diterima && $barang->no_manifest && $barang->last_id_message_tracking == 3 && ($kodeKota->kota == $barang->tujuan || $name == "superadmin")) 
                                                <div class="col-6 text-center">
                                                    {{-- 
                                                        last_id_message_tracking = "sampai tujuan" 
                                                    --}}
                                                        <form action="{{ url("barang/update/diterima") }}" method="get">
                                                            <input type="text" name="no_lmt" value="{{ encrypt($barang->no_lmt) }}" hidden>
                                                            <button type="submit" class="btn btn-primary" style="width: 75px">Terima</button>
                                                        </form>
                                                </div>
                                            @endif
                                            <div class="{{ (!$barang->is_lunas || !$barang->is_diterima) ? "col-6" : "col-12" }} text-center">
                                                @if ($barang->jenis_pengiriman == "truk")
                                                    <form action="{{ url("barang/truk/print/deliverynote") }}" method="get" target="_blank">
                                                        <input type="text" name="no_lmt" value="{{ encrypt($barang->no_lmt) }}" hidden>
                                                        <button type="submit" class="btn btn-primary {{ ($barang->is_lunas && $barang->is_diterima) ? "w-100" : "" }}" style="width: 75px">Cetak</button>
                                                    </form>
                                                @else
                                                    <div class="dropdown dropend">
                                                        <button class="btn btn-primary dropdown-toggle {{ ($barang->is_lunas && $barang->is_diterima) ? "w-100" : "" }}" type="button" id="triggerId" data-bs-toggle="dropdown" aria-haspopup="true" style="width: 75px"
                                                                aria-expanded="false">
                                                                Cetak
                                                                </button>
                                                        <div class="dropdown-menu" aria-labelledby="triggerId">
                                                            <a role="button" type="submit" class="dropdown-item" href="barang/bus/print/resi?no_lmt={{ encrypt($barang->no_lmt) }}" target="_blank">Resi</a>
                                                            <a role="button" type="submit" class="dropdown-item" href="barang/bus/print/barang?no_lmt={{ encrypt($barang->no_lmt) }}" target="_blank">Barang</a> 
                                                        </div>
                                                    </div>
                                                @endif
                                            </div> 
                                            @php
                                                $isBayarTujuan = $barang->id_status_pembayaran == 1;
                                                $isPiutang = $barang->id_status_pembayaran == 3;
                                            @endphp
                                            @if ($barang->no_manifest && !$barang->is_lunas && ($isBayarTujuan || $isPiutang)) 
                                                <div class="col-6 text-center">
                                                        <form action="{{ url("barang/update/lunas") }}" method="get">
                                                            <input type="text" name="no_lmt" value="{{ encrypt($barang->no_lmt) }}" hidden>
                                                            <button type="submit" class="btn btn-primary" style="width: 75px">Lunas</button>
                                                        </form>
                                                </div>  
                                            @endif
                                            @if (!$barang->no_manifest && !$barang->is_lunas && !$barang->last_id_message_tracking)  
                                                <div class="col-6 text-center">
                                                        <form action="{{ url("barang/delete") }}" method="get">
                                                            <input type="text" name="no_lmt" value="{{ encrypt($barang->no_lmt) }}" hidden>
                                                            <button type="submit" class="btn btn-danger" style="width: 75px">Hapus</button>
                                                        </form> 
                                                </div> 
                                            @endif
                                            <div class="{{ ($barang->is_lunas && $barang->is_diterima) ? "col-12" : "col-6" }} text-center" data-bs-toggle="modal" data-bs-target="#modalTracking">
                                                <button type="button" class="btn btn-primary {{ ($barang->is_lunas && $barang->is_diterima) ? "w-100" : "" }}" id="btnGetTracking" value="{{ encrypt($barang->no_lmt) }}" style="width: 75px">Lacak</button>
                                            </div>     
                                        </div> 
                                    </td>  
                                </tr>
                            @endif
                        @endforeach 
                    </tbody>
                </table>
            </div> 
        </div> 
    </div>
@endsection

@section('footer')
    @include("layouts.footerAdmin") 
@endsection

@section('script-body-bottom')  
    <script> 
        $(document).ready( function () {
            var table = $('#tableId').DataTable({  
                pageLength: 10,
            });

            table.on('order.dt search.dt', function () {
                let i = 1;
        
                table.cells(null, 0, { search: 'applied', order: 'applied' }).every(function (cell) {
                    this.data(i++);
                });
            }).draw();

            $('#tableId tbody').on('click', '#btnGetTracking', function () {
                $("#overlayLoading").css("visibility", "visible");   

                var value = $(this).val(); 

                $('#parentTableIdTracking').empty();
                $('#parentTableIdTracking').append("<table id='tableIdTracking' class='display'><thead><tr><th>Deskripsi Tracking</th><th>Status Pembayaran</th><th>Tanggal</th></tr></thead><tbody></tbody></table>");
                
                $('#tableIdTracking').DataTable({ 
                    processing: true,
                    order: [[2,'desc']],
                    ajax: {
                        url: '/barang/tracking',
                        type: 'POST',
                        dataType: "json",
                        contentType: "application/json; charset=utf-8;", 
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        "data": function ( d ) {
                            d.no_lmt = value;
                            return JSON.stringify( d );
                        },
                        statusCode: {
                            404: function() {
                                alert( "Tidak ditemukan" );
                            }
                        },
                    },
                    columns: [   
                        {data: "pesan"}, 
                        {data: "pembayaran"},  
                        {data: "created"},  
                    ],  
                    pageLength: 10,
                });

                $("#overlayLoading").css("visibility", "hidden");   
            }); 
  
            $('#overlayLoading').css('visibility', 'hidden');
            
            $("#printManifest").click(function (e) { 
                e.preventDefault(); 
            }); 
            
            $("#btnCloseErrorMessage").click(function (e) { 
                e.preventDefault();
                $("#toggleStatusPengiriman").toggle();
            });
        });
    </script>
@endsection