{{-- 
    1. Copy and paste the template, rename it 
    2. Add route to your blade file 
    3. Add code 
    --}}

@extends('layouts.app')

@section('preload')  
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
@endsection

@section('title') 
    <title>Cargo aja</title>
@endsection

@section('top-nav-bar')
    {{-- Your code --}}
@endsection

@section('content')  
    {{-- Your code --}}
@endsection

@section('footer')
  @include('layouts.footer') 
@endsection

@section('script-body-bottom')   
@endsection