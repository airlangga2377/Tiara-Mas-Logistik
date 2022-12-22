@extends('layouts.app')

@section('title') 
    <title>Cargo aja | Login</title>
@endsection

@section('top-nav-bar')
    @include('layouts.nav')
@endsection

@section('content') 
  <form action="{{ url('login') }}" method="post">
    @csrf
    <div class="container-fluid my-5 d-flex justify-content-center">
      <div class="col-xl-3 col-sm-5"> 
        <div class="text-wrap fs-4 mb-2 text-center">Masuk</div>
        
        {{-- Error handler --}}
        @if ($errors->any())
          <div class="alert alert-danger bg-danger text-white border-0" role="alert">
              {!! $errors->first() !!}
          </div>
        @endif

        @if (Session::has('message'))
          <div class="alert alert-warning bg-warning text-white border-0" role="alert">
              {!! Session::get('message') !!}
          </div>
        @endif 

        <div class="mb-xl-3 mb-sm-5">
          <label for="email" class="form-label">Email</label>
          <input type="email" class="form-control shadow-sm @if ($errors->any()) is-invalid @endif" name="email" id="email" aria-describedby="emailText" placeholder="isi email">
        </div>
        <div class="mb-xl-3 mb-sm-5">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control shadow-sm @if ($errors->any()) is-invalid @endif" name="password" id="password" aria-describedby="passwordText" placeholder="isi password">
        </div>

        <div class="form-check" hidden>
          <input class="form-check-input" type="checkbox" value="true" id="checkBoxRememberMe" name="checkBoxRememberMe">
          <label class="form-check-label" for="checkBoxRememberMe">
            Ingat email
          </label>
        </div>

        <button type="submit" class="btn btn-success w-100 mt-2">Masuk</button>
      </div>
    </div>
  </form>
@endsection

@section('footer')
  @include('layouts.footer') 
@endsection