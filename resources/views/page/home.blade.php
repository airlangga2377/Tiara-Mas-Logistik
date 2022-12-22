{{-- 
1. Copy and paste the template, rename it 
2. Add route to your blade file 
3. Add code 
--}}

@extends('layouts.app')

@section('preload')  
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
                    <a role="button" class="fs-5 list-group-item list-group-item-action" href="{{ url('barang/truk/insert#pengiriman') }}">Pengiriman</a>
                </div>
            </div>
        </div> 
    </div>
</nav> 
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center g-2 m-3">
        <div class="col-xl-auto col-sm-12">
            <div class="card card-body text-center shadow-sm">
                <h4 class="card-title fs-3">Pengiriman</h4>
                <p class="card-text fs-5 py-3">Anda dapat menambahkan pengiriman barang</p>
                <a class="btn btn-primary fs-5" href="{{ url('barang/truk/insert#pengiriman') }}" role="button">Lihat Pengiriman</a>
            </div>
        </div>
        <div class="col-xl-auto col-sm-12">
            <div class="card card-body text-center shadow-sm">
                <h4 class="card-title fs-3">Barang</h4>
                <p class="card-text fs-5 py-3">Anda dapat melihat beberapa barang</p>
                <a class="btn btn-primary fs-5" href="{{ url('barang') }}" role="button">Lihat Barang</a>
            </div>
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
            $('#overlayLoading').css('visibility', 'hidden');
        });
    </script>
@endsection