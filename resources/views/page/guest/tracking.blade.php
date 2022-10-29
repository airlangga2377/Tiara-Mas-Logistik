@extends('layouts.app')

@section('preload') 
    <link rel="preload" href="https://images.pexels.com/photos/1427541/pexels-photo-1427541.jpeg?cs=srgb&dl=pexels-samuel-w%C3%B6lfl-1427541.jpg&fm=jpg">
@endsection

@section('title') 
    <title>Cargo aja</title>
@endsection

@section('top-nav-bar')
    @include('layouts.nav')
@endsection

@section('content') 
    <!-- Image -->
    <img src="https://images.pexels.com/photos/1427541/pexels-photo-1427541.jpeg?cs=srgb&dl=pexels-samuel-w%C3%B6lfl-1427541.jpg&fm=jpg" class="img w-100" alt="cargo image" style="object-fit: cover; height: 200px;"> 

    <!-- Section Content -->
    <div class="container-fluid my-5 d-flex justify-content-center">
        <div class="col-6"> 
            <div class="text-wrap fs-4 mb-2 text-center">
                Lacak Barangmu
            </div>
            <form action="/index.html" method="post"> 
                <div class="mb-3 m-auto"> 
                    <input type="text" class="form-control shadow-sm" name="trackGood" id="trackGood" aria-describedby="trackGood" placeholder="isi nomor resimu"> 
                </div>
                <button type="submit" class="btn btn-success w-100">Lacak</button>
            </form>
        
            <div class="container-fluid mt-2 p-0">
                <ul class="list-group">
                    <li class="list-group-item active">
                        <div class="row justify-content-center align-items-center">
                            <div class="col-3">
                                <div class="col"> 
                                    <div class="text-wrap mb-2 fs-8 fw-lighter text-start">12:41</div>
                                    <div class="text-wrap mb-2 fs-12 fw-lighter text-start">20 Oct</div>
                                </div>
                            </div> 
                            <div class="col">
                                <div class="col"> 
                                    <div class="text-wrap mb-2 fs-8 fw-bold text-start">Gudang</div>
                                    <div class="text-wrap mb-2 fs-12 fw-lighter text-start">Kode Gudang</div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="row justify-content-center align-items-center">
                            <div class="col-3">
                                <div class="col"> 
                                    <div class="text-wrap mb-2 fs-6 fw-lighter text-start">12:41</div>
                                    <div class="text-wrap mb-2 fs-12 fw-lighter text-start">20 Oct</div>
                                </div>
                            </div> 
                            <div class="col">
                                <div class="col"> 
                                    <div class="text-wrap mb-2 fs-6 fw-lighter text-start">Gudang</div>
                                    <div class="text-wrap mb-2 fs-12 fw-lighter text-start">Kode Gudang</div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection

@section('footer')
  @include('layouts.footer') 
@endsection