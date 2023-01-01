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
                        <a role="button" class="fs-5 btn btn-success w-100" href="{{ url('barang/manifest/update') }}">Tambah Manifest</a>
                    </div>   
                </div>
            </div>
            <div class="col-8 shadow-sm p-3" id="tableIdParent"> 
                <table id="tableId" class="display">
                    <thead>
                        <tr> 
                            <th></th>
                            <th>No Manifest</th>
                            <th>No Pol</th> 
                            <th>Sopir</th>
                            <th>Jumlah</th> 

                            <th>Tanggal</th>

                            <th class="text text-center">Aksi</th>
                        </tr>
                    </thead>
                    @foreach ($allCargo as $barang) 
                        <tr>
                            <td data-toggle="tooltip" data-placement="top" title="Jenis Pengiriman {{ $barang->jenis_pengiriman }}">{{ $loop->index + 1 }}</td> 
                            <td>{{ $barang->no_manifest }}</td>  
                            <td>{{ $barang->no_pol }}</td>   
                            <td>{{ $barang->sopir }}</td>  
                            <td>{{ $barang->jumlah }}</td>  

                            <td>{{ $barang->created }}</td>  

                            <td>
                                <div class="row justify-content-start align-items-center g-2 px-3"> 
                                    <div class="col-6 text-center">
                                        <form action="{{ url("barang/manifest/print") }}" method="get" target="_blank">
                                            <input type="text" name="no_manifest" value="{{ encrypt($barang->no_manifest) }}" hidden>
                                            <button type="submit" class="btn btn-primary" style="width: 75px">Cetak</button>
                                        </form>
                                    </div>  
                                </div> 
                            </td>  
                        </tr>
                    @endforeach 
                    <tbody>
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