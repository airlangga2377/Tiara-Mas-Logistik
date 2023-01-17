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
    {{-- Error handler --}}
    @if ($errors->any())
        <script>
            alert($errors->first()); 
        </script>
    @endif 
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
                        <a role="button" class="fs-5 btn btn-success" href="{{ url('barang/truk/insert#pengiriman') }}">Tambah Pengiriman</a>
                    </div>  
                    <div class="col-12 pt-2 ">
                        <a role="button" class="fs-5 btn btn-success w-100" href="{{ url('barang/manifest') }}">Manifest</a>
                    </div>  
                </div>
            </div>
            <div class="col-8 shadow-sm p-3" id="tableIdParent"> 
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
                            <tr>
                                <td class="@if ($barang->is_lunas && $barang->is_diterima) bg-success text-white @endif" data-toggle="tooltip" data-placement="top" title="Jenis Pengiriman {{ $barang->jenis_pengiriman }}">{{ $loop->index + 1 }}</td> 
                                <td>{{ explode(" ", $barang->nama_pengirim)[0]}}</td> 
                                <td>{{ explode(" ", $barang->nama_penerima)[0]}}</td> 
                                <td>{{ $barang->biaya }}</td>  
                                <td>{{ $barang->jumlah_barang }}</td>  

                                <td>{{ $barang->no_resi }}</td>  

                                <td>{{ $barang->created }}</td>  

                                <td>
                                    <div class="row justify-content-start align-items-center g-2 px-3">
                                        <div class="col-6 text-center">
                                            {{-- 
                                                last_id_message_tracking = "sampai tujuan" 
                                            --}}
                                            @if (!$barang->is_diterima && $barang->no_manifest && $barang->last_id_message_tracking == 3 && ($kodeKota->kota == $barang->tujuan || $name == "superadmin")) 
                                                <form action="{{ url("barang/truk/update/diterima") }}" method="get">
                                                    <input type="text" name="no_lmt" value="{{ encrypt($barang->no_lmt) }}" hidden>
                                                    <button type="submit" class="btn btn-primary" style="width: 75px">Terima</button>
                                                </form>
                                            @elseif(!$barang->no_manifest || $barang->last_id_message_tracking < 3)
                                                <button type="button" class="btn btn-secondary disabled">Terima</button>
                                            @endif
                                        </div>
                                        <div class="{{ (!$barang->is_lunas || !$barang->is_diterima) ? "col-6" : "col-auto" }} text-center">
                                            <form action="{{ url("barang/truk/print/deliverynote") }}" method="get" target="_blank">
                                                <input type="text" name="no_lmt" value="{{ encrypt($barang->no_lmt) }}" hidden>
                                                <button type="submit" class="btn btn-primary" style="width: 75px">Cetak</button>
                                            </form>
                                        </div> 
                                        <div class="col-6 text-center">
                                            @php
                                                $isBayarTujuan = $barang->id_status_pembayaran == 1;
                                                $isPiutang = $barang->id_status_pembayaran == 3;
                                            @endphp
                                            @if ($barang->no_manifest && !$barang->is_lunas && ($isBayarTujuan || $isPiutang)) 
                                                <form action="{{ url("barang/truk/update/lunas") }}" method="get">
                                                    <input type="text" name="no_lmt" value="{{ encrypt($barang->no_lmt) }}" hidden>
                                                    <button type="submit" class="btn btn-primary" style="width: 75px">Lunas</button>
                                                </form>
                                            @elseif(!$barang->is_lunas || !$barang->is_diterima)
                                                <button type="button" class="btn btn-secondary disabled" style="width: 75px">Lunas</button> 
                                            @endif
                                        </div>  
                                        <div class="col-6 text-center">
                                            @if (!$barang->no_manifest && !$barang->is_lunas && !$barang->last_id_message_tracking)  
                                                <form action="{{ url("barang/truk/delete") }}" method="get">
                                                    <input type="text" name="no_lmt" value="{{ encrypt($barang->no_lmt) }}" hidden>
                                                    <button type="submit" class="btn btn-danger" style="width: 75px">Hapus</button>
                                                </form>
                                            @elseif(!$barang->is_lunas || !$barang->is_diterima)
                                                <button type="button" class="btn btn-danger disabled" style="width: 75px">Hapus</button>
                                            @endif
                                        </div>   
                                    </div> 
                                </td>  
                            </tr>
                        @endforeach 
                    </tbody>
                </table>
            </div> 
        </div> 
    </div>
@endsection

@section('footer')
    @include('layouts.footer') 
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

            {{-- $('#tableId tbody').on('click', 'tr', function () {
                var data = table.row(this).data();
                alert('You clicked on ' + data[1] + "'s row");
            }); --}}
  
            $('#overlayLoading').css('visibility', 'hidden');
            
            $("#printManifest").click(function (e) { 
                e.preventDefault(); 
            }); 
        });
    </script>
@endsection