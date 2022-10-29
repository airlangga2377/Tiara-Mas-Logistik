{{-- 
1. Copy and paste the template, rename it 
2. Add route to your blade file 
3. Add code 
--}}

@extends('layouts.app')

@section('title') 
    <title>Cargo aja | Home</title>
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
    {{-- Your code --}} 
    <div class="container">
        <div class="p-3 row justify-content-center align-items-center g-5">
            <div class="col-auto"> 
                <a role="button" class="fs-5 btn btn-primary position-relative" href="{{ url('barang/pengiriman') }}">
                    Pengiriman
                    {{-- <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="z-index: 1">
                      99+
                    <span class="visually-hidden">unread messages</span> --}}
                    </span>
                </a>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    @include('layouts.footer') 
@endsection

@section('script-body-bottom')  
@endsection