{{-- 
1. Copy and paste the template, rename it 
2. Add route to your blade file 
3. Add code 
--}}

@extends('layouts.app')

@section('style')   
    <style>
        .menu-widget{ 
            height: 100%;
            width: 100%;
        }
    </style>
@endsection

@section('title') 
    <title>Cargo aja</title>
@endsection

@section('top-nav-bar') 
    @include('layouts.loggednav')
@endsection

@section('content')
<div class="container">
    <div class="row equal justify-content-center g-2 m-3">
        <div class="col-xl-4 col-sm-12">
            <div class="card card-body text-center shadow-sm menu-widget">
                <h4 class="card-title fs-3">Input Pengiriman</h4>
                <p class="card-text fs-5 py-3">Anda dapat membuat surat jalan</p>
                <a class="btn btn-primary fs-5" href="{{ url('barang/truk/insert#pengiriman') }}" role="button">Input Pengiriman</a>
            </div>
        </div>
        <div class="col-xl-4 col-sm-12">
            <div class="card card-body text-center shadow-sm menu-widget">
                <h4 class="card-title fs-3">Input Manifest</h4>
                <p class="card-text fs-5 py-3">Anda dapat membuat manifest</p>
                <a class="btn btn-primary fs-5" href="{{ url('barang/manifest') }}" role="button">Input Manifest</a>
            </div>
        </div>
        <div class="col-xl-4 col-sm-12">
            <div class="card card-body text-center shadow-sm menu-widget">
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