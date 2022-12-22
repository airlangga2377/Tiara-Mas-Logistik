{{-- 
1. Copy and paste the template, rename it 
2. Add route to your blade file 
3. Add code 
--}}

@extends('layouts.app')

@section('preload')  
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>

    {{-- Datatables --}}
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
@endsection

@section('title') 
    <title>Cargo aja</title>
@endsection

@section('top-nav-bar')
<nav class="navbar navbar-light shadow-sm"> 
    <div class="container-fluid"> 
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="dropdown">
            <a class="ms-2 me-2 fs-5 text-dark text-decoration-none" href="{{ url('home') }}">Beranda</a>
            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                {{ $name }}
            </button>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="{{ url('logout') }}">Keluar</a></li> 
            </ul>
        </div>

        <div class="offcanvas offcanvas-start text-bg-light" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
            <div class="offcanvas-header">    
                
                <button type="button" class="btn-close offcanvas-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body"> 
                <div class="list-group list-group-flush"> 
                    <a role="button" class="fs-5 fw-bold list-group-item list-group-item-action" href="{{ url('barang') }}">Barang</a>  
                    <a role="button" class="fs-5 list-group-item list-group-item-action" href="{{ url('barang/pengiriman') }}">Pengiriman</a>
                </div>
            </div>
        </div> 
    </div>
</nav>  
@endsection

@section('content')  
    <div class="container"> 
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Barang</li> 
            </ol>
        </nav>

        <div class="row justify-content-center align-items-center g-5">
            <div class="col-auto shadow-sm p-3">
                <label for="jenisBarang" class="fs-5 form-label fw-bold w-100">Fitur</label> 
                <a role="button" class="fs-5 btn btn-success " href="{{ url('barang/pengiriman') }}">Tambah Pengiriman</a>
            </div>
            <div class="col"> 
                <table id="table_id" class="display">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Pengirim</th>
                            <th>Nama Penerima</th>
                            <th>Jenis Barang</th>
                            <th>Jumlah</th>
                            <th>No Resi</th>
                            <th>Keterangan</th>

                            <th>Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($allCargo as $barang) 
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $barang->nama_pengirim }}</td> 
                                <td>{{ $barang->nama_penerima }}</td> 
                                <td>{{ $barang->jenis_barang }}</td> 
                                <td>{{ $barang->jumlah_barang }}</td>  

                                <td>{{ $barang->no_resi }}</td>  

                                <td>{{ $barang->keterangan }}</td>  

                                <td>{{ $barang->created_at }}</td>  
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
        $('#table_id').DataTable({
            // ajax: {
            //     url: "/api/barang",
            // },
            "pageLength": 25
        });
    });
    </script>
@endsection