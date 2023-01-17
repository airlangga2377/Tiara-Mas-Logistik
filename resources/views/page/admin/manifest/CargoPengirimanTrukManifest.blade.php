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
        <div class="modal-dialog">
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
    @if ($errors->any())
        <script>
            alert($errors->first()); 
        </script>
    @endif 
    <div class="container"> 
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li> 
                <li class="breadcrumb-item"><a href="{{ url('barang') }}">Barang</a></li> 
                <li class="breadcrumb-item active" aria-current="page">Manifest</li>  
            </ol>
        </nav>
    </div>
    <div class="container-fluid"> 
        <div class="row justify-content-center align-items-center g-2">
            <div class="col">
                <p class="fs-1 text text-center" id="manifest">Manifest</p>
            </div> 
        </div>
        <div class="row justify-content-center align-items-start">
            <div class="col-auto shadow-sm p-3 float-start">
                <div class="row-auto justify-content-center align-items-center">
                    <div class="col-12">
                        <label for="jenisBarang" class="fs-5 form-label fw-bold w-100">Fitur</label>  
                    </div>
                    <div class="col-12 pt-2"> 
                        <a role="button" class="fs-5 btn btn-success w-100" href="{{ url('barang/manifest/create') }}">Tambah Manifest</a>
                    </div>   
                </div>
            </div>
            <div class="col-xl-8 col-md-0 col-sm-0 shadow-sm p-3" id="tableIdParent"> 
                <table id="tableId" class="display">
                    <thead>
                        <tr> 
                            <th></th>
                            <th>No Manifest</th>
                            <th>No Pol</th> 
                            <th>Sopir</th>

                            <th>Tanggal</th>

                            <th class="text text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($allCargo as $barang) 
                        @if ($barang->no_manifest) 
                            <tr>
                                <td data-toggle="tooltip" data-placement="top" title="Jenis Pengiriman {{ $barang->jenis_pengiriman }}">{{ $loop->index + 1 }}</td> 
                                <td>{{ $barang->no_manifest }}</td>  
                                <td>{{ $barang->no_pol }}</td>   
                                <td>{{ $barang->sopir ? $barang->sopir : $barang->sopir_utama }}</td>  

                                <td>{{ $barang->asal }}</td>  

                                <td>
                                    <div class="row justify-content-start align-items-center g-2 px-3">
                                        <div class="col-6 text-center">
                                            @if ($barang->last_id_message_tracking == 1  && ($barang->asal == $kodeKota->kota || $name == "superadmin")) 
                                                <form action="{{ url("barang/manifest/berangkat") }}" method="post">
                                                    @csrf
                                                    <input type="text" name="no_manifest" value="{{ encrypt($barang->no_manifest) }}" hidden>
                                                    <button type="submit" class="btn btn-primary" style="width: 95px">Berangkat</button>
                                                </form>
                                            @else
                                                <button type="button" class="btn btn-primary disabled" style="width: 95px">Berangkat</button>
                                            @endif
                                        </div>  
                                        <div class="col-6 text-center">
                                            <form action="{{ url("barang/manifest/print") }}" method="get" target="_blank">
                                                <input type="text" name="no_manifest" value="{{ encrypt($barang->no_manifest) }}" hidden>
                                                <button type="submit" class="btn btn-primary" style="width: 95px">Cetak</button>
                                            </form>
                                        </div>   
                                            <div class="col-6 text-center">
                                                @if (($barang->last_id_message_tracking == 2) && ($barang->tujuan == $kodeKota->kota || $name == "superadmin")) 
                                                    <form action="{{ url("barang/manifest/sampai") }}" method="get">
                                                        <input type="text" name="no_manifest" value="{{ encrypt($barang->no_manifest) }}" hidden>
                                                        <button type="submit" class="btn btn-primary" style="width: 95px">Sampai</button>
                                                    </form>
                                                @else
                                                    <button type="button" class="btn btn-primary disabled" style="width: 95px">Sampai</button>
                                                @endif
                                            </div>    
                                        <div class="col-6 text-center">
                                            <button type="button" class="btn btn-primary" id="btnGetTracking" style="width: 95px" value="{{ encrypt($barang->no_manifest) }}" data-bs-toggle="modal" data-bs-target="#modalTracking">Lacak</button>
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
    @include('layouts.footer') 
@endsection

@section('script-body-bottom')  
    <script> 
        $(document).ready( function () {  
            $('#tableId').DataTable({
                responsive: true
            }); 
            // table.on('order.dt search.dt', function () {
            //     let i = 1;
        
            //     table.cells(null, 0, { search: 'applied', order: 'applied' }).every(function (cell) {
            //         this.data(i++);
            //     });
            // }).draw();

            $('#tableId tbody').on('click', '#btnGetTracking', function () { 
                $("#overlayLoading").css("visibility", "visible");   

                var value = $(this).val(); 

                $('#parentTableIdTracking').empty();
                $('#parentTableIdTracking').append("<table id='tableIdTracking' class='display'><thead><tr><th>Deskripsi Tracking</th><th>Tanggal</th></tr></thead><tbody></tbody></table>");

                $('#tableIdTracking').DataTable({ 
                    processing: true,
                    ajax: {
                        url: '/barang/manifest/tracking',
                        type: 'POST',
                        dataType: "json",
                        contentType: "application/json; charset=utf-8;", 
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        "data": function ( d ) {
                            d.no_manifest = value;
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
                        {data: "created"},  
                    ],  
                    pageLength: 10,
                });

                $("#overlayLoading").css("visibility", "hidden");    
            }); 

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