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
    <title>Cargo aja | Pengiriman</title>
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
            <li class="breadcrumb-item"><a href="{{ url('barang') }}">Barang</a></li>
            <li class="breadcrumb-item active" aria-current="page">Pengiriman</li>
        </ol>
    </nav>

    <form action="{{ url('barang/pengiriman/insert') }}" method="post">
        @csrf  
        <div class="row justify-content-between d-flex g-3"> 
            <div class="text-wrap fs-3 mb-2 text-center">Pengiriman</div>
            <div class="col-xl-5 col-sm-5 m-1 py-2 border border-dark rounded-2 justify-content-center shadow-sm">   
                {{-- Error handler --}}
                @if ($errors->any())
                    <div class="fs-5 alert alert-danger bg-danger text-white border-0" role="alert">
                        {!! $errors->first() !!}
                    </div>
                @endif

                @if (Session::has('message'))
                    <div class="fs-5 alert alert-success bg-success text-white border-0" role="alert">
                        {!! Session::get('message') !!}
                    </div>
                @endif 
                
                <div class="row mb-3 justify-content-center">  
                    <div class="row align-items-start py-1">
                        <div class="col">
                            <div class="mb-xl-3 mb-sm-5">
                                <label for="namaPengirim" class="form-label fs-4">Nama Pengirim</label>
                                <input type="text" class="form-control shadow-sm p-3 @if ($errors->any()) is-invalid @endif" name="namaPengirim" id="namaPengirim" aria-describedby="namaPengirimText" placeholder="isi nama pengirim">
                                <div id="validationNamaPengirim" class="invalid-feedback">
                                    @if (Session::has('namaPengirimError')) @endif
                                </div>
                            </div> 
                        </div>
                        <div class="col">
                            <div class="mb-xl-3 mb-sm-5">
                                <label for="nomorPengirim" class="form-label fs-4">Nomor Pengirim</label>
                                <input type="number" class="form-control shadow-sm p-3 @if ($errors->any()) is-invalid @endif" name="nomorPengirim" id="nomorPengirim" aria-describedby="nomorPengirimText" placeholder="isi nomor pengirim">
                                <div id="validationNamaPengirim" class="invalid-feedback">
                                    @if (Session::has('nomorPengirimError')) @endif
                                </div>
                            </div> 
                        </div> 
                    </div>  
    
                    <div class="row align-items-start py-1">
                        <div class="col">
                            <div class="mb-xl-3 mb-sm-5">
                                <label for="namaPenerima" class="form-label fs-4">Nama Penerima</label>
                                <input type="text" class="form-control shadow-sm p-3 @if ($errors->any()) is-invalid @endif" name="namaPenerima" id="namaPenerima" aria-describedby="namaPenerimaText" placeholder="isi nama penerima">
                                <div id="validationNamaPenerima" class="invalid-feedback">
                                    @if (Session::has('namaPenerimaError')) @endif
                                </div>
                            </div>  
                        </div> 
                        <div class="col">
                            <div class="mb-xl-3 mb-sm-5">
                                <label for="nomorPenerima" class="form-label fs-4">Nomor Penerima</label>
                                <input type="number" class="form-control shadow-sm p-3 @if ($errors->any()) is-invalid @endif" name="nomorPenerima" id="nomorPenerima" aria-describedby="nomorPenerimaText" placeholder="isi nomor penerima">
                                <div id="validationNamaPenerima" class="invalid-feedback">
                                    @if (Session::has('nomorPenerimaError')) @endif
                                </div>
                            </div>  
                        </div> 
                    </div>  
                </div>

                <div class="row justify-content-center align-items-center g-2">
                    <div class="mb-xl-3 mb-sm-5">
                        <label for="jenisBarang" class="form-label fs-4">Jenis Barang</label> 
                        <select class="form-select @if ($errors->any()) is-invalid @endif" aria-label="Select jenis barang" id="select_box_jenis" data-live-search="true" name="jenisBarang">
                            <option disabled selected value>Jenis Barang</option>
                            <option value="kulkas">Kulkas</option>
                            <option value="motor">Motor</option> 
                        </select>
                        <div id="validationJenisBarang" class="invalid-feedback">
                            @if (Session::has('jenisBarangError')) @endif
                        </div> 
                    </div>  
    
                    <div class="mb-xl-3 mb-sm-5">
                        <label for="jumlahBarang" class="form-label fs-4">Jumlah Barang</label>
                        <input type="number" class="form-control shadow-sm p-3 @if ($errors->any()) is-invalid @endif" name="jumlahBarang" id="jumlahBarang" aria-describedby="jumlahBarangText" placeholder="isi jumlah barang">
                        <div id="validationJenisBarang" class="invalid-feedback">
                            @if (Session::has('jumlahBarangError')) @endif
                        </div>
                    </div>  
                </div>
            </div>
            
            <div class="col-xl-3 col-sm-5 m-1 py-2 border border-dark rounded-2 justify-content-center shadow-sm">
                <label for="namaPengirim" class="form-label fs-4">Keterangan</label>
                <div class="form-floating mh-60" style="height: 80px;">
                    <textarea class="form-control" style="max-height: 80px;" placeholder="isi keterangan" id="textAreaKeterangan" maxlength="50" name="keterangan"></textarea>
                    <label for="floatingTextarea">Keterangan</label> 
                </div>
                <div class="row g-2">
                    <label for="namaPengirim" class="form-label fs-5">Nama Supir</label>
                    <select class="form-select" aria-label="Select nama supir" id="select_box_supir" data-live-search="true" name="pilihSupir">
                        <option disabled selected value>Nama Supir</option>
                        <option value="rini">Rini</option>
                        <option value="setio">Setio</option> 
                    </select>

                    <label for="namaPengirim" class="form-label fs-5">Nama Kernet</label>
                    <select class="form-select" aria-label="Select nama kernet" id="select_box_kernet" data-live-search="true" name="pilihKernet">
                        <option disabled selected value>Nama Kernet</option>
                        <option value="rimba">Rimba</option>
                        <option value="sindi">Sindi</option> 
                    </select> 

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="kubikasiCheck" name="isKubikasi" data-bs-toggle="collapse" data-bs-target="#collapseKubikasi" aria-expanded="false" aria-controls="collapseKubikasi">
                        <label class="form-check-label fs-6" for="kubikasiCheck">
                          Menggunakan kubikasi
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="lunas" id="lunasCheckBox" name="isLunas">
                        <label class="form-check-label" for="lunasCheckBox">
                          Lunas
                        </label>
                    </div> 
                    
                    <div class="mb-xl-3 mb-sm-5">
                        <label for="biaya" class="form-label fs-4">Biaya</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Rp</span>
                            <input type="number" class="form-control shadow-sm p-3 @if ($errors->any()) is-invalid @endif" name="biaya" id="biaya" aria-describedby="biayaText" placeholder="isi biaya">
                            <div id="validationbiaya" class="invalid-feedback">
                                @if (Session::has('biayaError')) @endif
                            </div>
                        </div>
                    </div>  
                </div>
            </div>
            
            <div class="col-xl-3 col-sm-5 m-1 py-2 border border-dark rounded-2 justify-content-center shadow-sm">
                <div class="collapse" id="collapseKubikasi">
                    <div class="card card-body"> 
                        <div class="mb-xl-3 mb-sm-5">
                            <label for="kubikasiPanjang" class="form-label fs-4">Panjang</label>
                            <input type="text" class="form-control shadow-sm @if ($errors->any()) is-invalid @endif" name="kubikasiPanjang" id="kubikasiPanjang" aria-describedby="kubikasiPanjangText" placeholder="isi panjang">
                            <div id="validationkubikasiPanjang" class="invalid-feedback">
                                @if (Session::has('kubikasiPanjangError')) @endif
                            </div>
                            <label for="kubikasiLebar" class="form-label fs-4">Lebar</label>
                            <input type="text" class="form-control shadow-sm @if ($errors->any()) is-invalid @endif" name="kubikasiLebar" id="kubikasiLebar" aria-describedby="kubikasiLebarText" placeholder="isi lebar">
                            <div id="validationkubikasiLebar" class="invalid-feedback">
                                @if (Session::has('kubikasiLebarError')) @endif
                            </div>
                            <label for="kubikasiTinggi" class="form-label fs-4">Tinggi</label>
                            <input type="text" class="form-control shadow-sm @if ($errors->any()) is-invalid @endif" name="kubikasiTinggi" id="kubikasiTinggi" aria-describedby="kubikasiTinggiText" placeholder="isi tinggi">
                            <div id="validationkubikasiTinggi" class="invalid-feedback">
                                @if (Session::has('kubikasiTinggiError')) @endif
                            </div>
                            <label for="kubikasiBerat" class="form-label fs-4">Berat</label>
                            <input type="text" class="form-control shadow-sm @if ($errors->any()) is-invalid @endif" name="kubikasiBerat" id="kubikasiBerat" aria-describedby="kubikasiBeratText" placeholder="isi berat">
                            <div id="validationkubikasiBerat" class="invalid-feedback">
                                @if (Session::has('kubikasiBeratError')) @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-success mt-2 fs-5 mh-30">Tambah Pengiriman</button>
        </div>
    </form>
</div>
@endsection

@section('footer')
    @include('layouts.footerAdmin') 
@endsection

@section('script-body-bottom')  
    <script>
        $('#select_box_jenis').select2({
            width: 'resolve' // need to override the changed default
        });
        $('#select_box_supir').select2({
            width: 'resolve' // need to override the changed default
        });
        $('#select_box_kernet').select2({
            width: 'resolve' // need to override the changed default
        });
    </script>
@endsection