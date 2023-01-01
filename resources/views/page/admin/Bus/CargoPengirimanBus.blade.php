@extends("layouts.app")

@section("preload")
    {{-- Datatables --}}
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>  
<<<<<<< HEAD
    <link href="{{ url('/assets/css/bus/app.css') }}" rel="stylesheet" />
=======

>>>>>>> 96ef6381689b581a74f833bdac31cacd28e36f24
    {{-- Select2 --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> 
@endsection

@section("title") 
    <title>Cargo aja</title>
@endsection

@section("top-nav-bar")
<nav class="navbar navbar-light shadow-sm"> 
    <div class="container-fluid"> 
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="dropdown">
            <a class="ms-2 me-2 fs-5 text-dark text-decoration-none" href="{{ url("home") }}">Beranda</a>
            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
<<<<<<< HEAD
                {{ Auth::user()->name }}
=======
                {{ $name }}
>>>>>>> 96ef6381689b581a74f833bdac31cacd28e36f24
            </button>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="{{ url("logout") }}">Keluar</a></li> 
            </ul>
        </div>

        <div class="offcanvas offcanvas-start text-bg-light" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
            <div class="offcanvas-header">    
                
                <button type="button" class="btn-close offcanvas-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body"> 
                <div class="list-group list-group-flush"> 
<<<<<<< HEAD
                    <a role="button" class="fs-5 fw-bold list-group-item list-group-item-action" href="{{ url("barang") }}">Barang</a>
=======
                    <a role="button" class="fs-5 fw-bold list-group-item list-group-item-action" href="{{ url("barang") }}">Barang</a>  
>>>>>>> 96ef6381689b581a74f833bdac31cacd28e36f24
                    <a role="button" class="fs-5 list-group-item list-group-item-action" href="{{ url("barang/truk/insert#pengiriman") }}">Pengiriman</a>
                    <a role="button" class="fs-5 list-group-item list-group-item-action" href="{{ url("barang/bus/insert#pengiriman") }}">Pengiriman Bus</a>
                </div>
            </div>
        </div> 
    </div>
</nav> 
@endsection

@section("content")  
<div class="container">  
<<<<<<< HEAD
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url("home") }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ url("barang") }}">Barang</a></li>
                <li class="breadcrumb-item active" aria-current="page">Pengiriman Bus</li>
            </ol>
        </nav>

        <form action="{{ url("/barang/bus/insert-save") }}" method="post">
            {{ csrf_field() }}
            <div class="row justify-content-between d-flex g-3">
                <label class="text-wrap g-5" id="pengiriman"><h2>IDENTITAS PENGIRIM</h2></label>
                <div class="col-12 m-1 py-2 rounded-2 justify-content-center shadow-sm bg-dark text-light">    
                        {{-- Error handler --}}
                        @if ($errors->any())
                            <div class="fs-5 alert alert-danger bg-danger text-white border-0 text-center" role="alert">
                                {!! $errors->first() !!}
                            </div>
                        @endif

                        @if (Session::has("message")) 
                            <div class="fs-5 alert alert-success bg-success text-white border-0 text-center" role="alert" id="toggleStatusPengiriman">
                                {!! Session::get("message") !!}
                            </div>
                        @endif 
                        <div class="row justify-content-between d-flex g-1">
                            <div class="row align-items-start py-1">
                                <div class="col">
                                    <div class="mb-xl-3 mb-sm-5">
                                            <label for="namaPengirim" class="form-label fs-4">Nama Pengirim</label>
                                            <input type="text" class="form-control shadow-sm p-3" name="namaPengirim" id="namaPengirim" aria-describedby="namaPengirimText" placeholder="isi nama pengirim" value="{!! old('namaPengirim') !!}">
                                        <div id="validationNamaPengirim" class="invalid-feedback">
                                                @if (Session::has("namaPengirimError")) @endif
                                    </div>
                                </div>
                            </div>                    
                            <div class="col">
                                <div class="mb-xl-3 mb-sm-5">
                                    <label for="nomorPengirim" class="form-label fs-4">Tlp Pengirim</label>
                                    <input type="text" class="form-control shadow-sm p-3" name="nomorPengirim" id="nomorPengirim" aria-describedby="nomorPengirimText" placeholder="isi nomor pengirim" value="{!! old('nomorPengirim') !!}">
                                    <div id="validationNamaPengirim" class="invalid-feedback">
                                        @if (Session::has("nomorPengirimError")) @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-between d-flex g-2">  
                <label class="text-wrap g-5" id="pengiriman"><h2>IDENTITAS PENERIMA</h2></label>
                <div class="col-12 m-1 py-2 rounded-2 justify-content-center shadow-sm bg-dark text-light">
                    <div class="row justify-content-between d-flex g-1">
                    <div class="row align-items-start py-1">
                        <div class="col">
                            <div class="mb-xl-3 mb-sm-5">
                                <label for="namaPenerima" class="form-label fs-4">Nama Penerima</label>
                                <input type="text" class="form-control shadow-sm p-3" name="namaPenerima" id="namaPenerima" aria-describedby="namaPenerimaText" placeholder="isi nama penerima" value="{!! old('namaPenerima') !!}">
                                <div id="validationNamaPenerima" class="invalid-feedback">
                                    @if (Session::has("namaPenerimaError")) @endif
                                </div>
                            </div>
                        </div>   
                            <div class="col">
                                <div class="mb-xl-3 mb-sm-5">
                                    <label for="nomorPenerima" class="form-label fs-4">Tlp Penerima</label>
                                    <input type="text" class="form-control shadow-sm p-3" name="nomorPenerima" id="nomorPenerima" aria-describedby="nomorPenerimaText" placeholder="isi nomor penerima" value="{!! old('nomorPenerima') !!}">
                                    <div id="validationNomorPenerima" class="invalid-feedback">
                                        @if (Session::has("nomorPenerimaError")) @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <div class="row justify-content-between d-flex g-1">
                    <div class="row align-items-start py-1">
                        {{-- <div class="col">
                            <div class="mb-xl-3 mb-sm-5">
                                <label for="pickup" class="form-label fs-4" hidden>Asal Barang</label>
                                <select type="option" class="form-control shadow-sm p-3" name="pickup" id="pickup" aria-describedby="pickupText" placeholder="isi tujuan barang" value="{!! old('pickup') !!}" hidden>
                                <option selected value="{{ Auth::user()->wilayah }}">{{ Auth::user()->wilayah }}</option>
                                </select>
                                <div id="validationpickup" class="invalid-feedback">
                                    @if (Session::has("pickupError")) @endif
                                </div>
                            </div>
                        </div> --}}
                <div class="col">
                    <div class="mb-xl-3 mb-sm-5">
                        <label for="dropoff" class="form-label fs-4">Tujuan Barang</label>
                        <input type="text" class="form-control shadow-sm p-3" name="dropoff" id="tujuanBarang" aria-describedby="tujuanBarangText" placeholder="isi tujuan barang" value="{!! old('tujuanBarang') !!}">
                        <div id="validationTujuanBarang" class="invalid-feedback">
                            @if (Session::has("tujuanBarangError")) @endif
=======
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url("home") }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ url("barang") }}">Barang</a></li>
            <li class="breadcrumb-item active" aria-current="page">Pengiriman</li>
        </ol>
    </nav>

    <form action="{{ url("barang/bus/insert") }}" method="post">
        @csrf
        <div class="row justify-content-between d-flex g-3">
            <label class="text-wrap g-5" id="pengiriman"><h2>IDENTITAS PENGIRIM</h2></label>
            <div class="col-12 m-1 py-2 rounded-2 justify-content-center shadow-sm bg-dark text-light">    
                    {{-- Error handler --}}
                    @if ($errors->any())
                        <div class="fs-5 alert alert-danger bg-danger text-white border-0 text-center" role="alert">
                            {!! $errors->first() !!}
                        </div>
                    @endif

                    @if (Session::has("message")) 
                        <div class="fs-5 alert alert-success bg-success text-white border-0 text-center" role="alert" id="toggleStatusPengiriman">
                            {!! Session::get("message") !!}
                        </div>
                    @endif 
                    <div class="row justify-content-between d-flex g-1">
                        <div class="row align-items-start py-1">
                            <div class="col">
                                <div class="mb-xl-3 mb-sm-5">
                                        <label for="namaPengirim" class="form-label fs-4">Nama Pengirim</label>
                                        <input type="text" class="form-control shadow-sm p-3" name="namaPengirim" id="namaPengirim" aria-describedby="namaPengirimText" placeholder="isi nama pengirim" value="{!! old('namaPengirim') !!}">
                                    <div id="validationNamaPengirim" class="invalid-feedback">
                                            @if (Session::has("namaPengirimError")) @endif
                                </div>
                            </div>
                        </div>                    
                        <div class="col">
                            <div class="mb-xl-3 mb-sm-5">
                                <label for="nomorPengirim" class="form-label fs-4">Tlp Pengirim</label>
                                <input type="text" class="form-control shadow-sm p-3" name="nomorPengirim" id="nomorPengirim" aria-describedby="nomorPengirimText" placeholder="isi nomor pengirim" value="{!! old('nomorPengirim') !!}">
                                <div id="validationNamaPengirim" class="invalid-feedback">
                                    @if (Session::has("nomorPengirimError")) @endif
                                </div>
                            </div>
>>>>>>> 96ef6381689b581a74f833bdac31cacd28e36f24
                        </div>
                    </div>
                </div>
            </div>
        </div>
<<<<<<< HEAD
    </div>                    
                <div class="row justify-content-between d-flex g-2">  
                    <label class="text-wrap g-5" id="pengiriman"><h2>INFORMASI BARANG</h2></label>
                    <div class="col-12 m-1 py-2 rounded-2 justify-content-center shadow-sm bg-dark text-light">
                        <div class="row justify-content-between d-flex g-1">
                        <div class="row align-items-start py-1">
                            <div class="col">
                                <div class="mb-xl-3 mb-sm-5">
                                    <label for="jenisBarang" class="form-label fs-4">Pilih Jenis Barang</label>                                                                            
                                    <select class="form-select shadow-sm p-3" name="jenisBarang" id="jenisBarang" aria-describedby="jenisBarangText" value="{!! old('jenisBarang') !!}">                                        
                                            <option value="barang">Barang</option>
                                            <option value="dokumen">Dokumen</option>
                                            <option value="cairan">cairan</option>
                                    </select>
                                    <div id="validationJenisBarang" class="invalid-feedback">
                                        @if (Session::has("jenisBarangError")) @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-xl-3 mb-sm-5">
                                    <label for="namaBarang" class="form-label fs-4">Nama Barang</label>
                                    <input type="text" class="form-control shadow-sm p-3" name="namaBarang" id="namaBarang" aria-describedby="namaBarangText" placeholder="isi nama barang" value="{!! old('namaBarang') !!}">                                
                                    <div id="validationNamaBarang" class="invalid-feedback">
                                        @if (Session::has("namaBarangError")) @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    
            <div class="row justify-content-between d-flex g-1">
                <div class="row align-items-start py-1">
                    <div class="col">
                        <div class="mb-xl-3 mb-sm-5">
                            <label for="beratBarang" class="form-label fs-4">Berat Barang</label>
                            <input type="text" class="form-control shadow-sm p-3" name="beratBarang" id="beratBarang" aria-describedby="beratBarangText" placeholder="isi berat barang" value="{!! old('beratBarang') !!}">
                            <div id="validationBeratBarang" class="invalid-feedback">
                                @if (Session::has("beratBarangError")) @endif
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-xl-3 mb-sm-5">
                            <label for="jumlahBarang" class="form-label fs-4">Jumlah Barang</label>
                            <input type="text" class="form-control shadow-sm p-3" name="jumlahBarang" id="jumlahBarang" aria-describedby="jumlahBarangText" placeholder="isi jumlah barang" value="{!! old('jumlahBarang') !!}">
                            <div id="validationJumlahBarang" class="invalid-feedback">
                                @if (Session::has("jumlahBarangError")) @endif
                            </div>
                        </div>
                    </div>
                        <div class="col">
                            <div class="mb-xl-3 mb-sm-5">
                                <label for="panjangBarang" class="form-label fs-4">Panjang Barang</label>
                                <input type="text" class="form-control shadow-sm p-3" name="panjangBarang" id="panjangBarang" aria-describedby="panjangBarangText" placeholder="isi panjang barang" value="{!! old('panjangBarang') !!}">
                                <div id="validationPanjangBarang" class="invalid-feedback">
                                    @if (Session::has("panjangBarangError")) @endif
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-xl-3 mb-sm-5">
                                <label for="lebarBarang" class="form-label fs-4">Lebar Barang</label>
                                <input type="text" class="form-control shadow-sm p-3" name="lebarBarang" id="lebarBarang" aria-describedby="lebarBarangText" placeholder="isi lebar barang" value="{!! old('lebarBarang') !!}">
                                <div id="validationLebarBarang" class="invalid-feedback">
                                    @if (Session::has("lebarBarangError")) @endif
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-xl-3 mb-sm-5">
                                <label for="tinggiBarang" class="form-label fs-4">Tinggi Barang</label>
                                <input type="text" class="form-control shadow-sm p-3" name="tinggiBarang" id="tinggiBarang" aria-describedby="tinggiBarangText" placeholder="isi tinggi barang" value="{!! old('tinggiBarang') !!}">
                                <div id="validationTinggiBarang" class="invalid-feedback">
                                    @if (Session::has("tinggiBarangError")) @endif
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-xl-3 mb-sm-5">
                                <label for="biayaBarang" class="form-label fs-4">Biaya Barang</label>
                                <input type="text" class="form-control shadow-sm p-3" name="biayaBarang" id="biayaBarang" aria-describedby="biayaBarangText" placeholder="isi biaya barang" value="{!! old('biayaBarang') !!}">
                                <div id="validationBiayaBarang" class="invalid-feedback">
                                    @if (Session::has("biayaBarangError")) @endif
=======
        <div class="row justify-content-between d-flex g-2">  
            <label class="text-wrap g-5" id="pengiriman"><h2>IDENTITAS PENERIMA</h2></label>
            <div class="col-12 m-1 py-2 rounded-2 justify-content-center shadow-sm bg-dark text-light">
                <div class="row justify-content-between d-flex g-1">
                <div class="row align-items-start py-1">
                    <div class="col">
                        <div class="mb-xl-3 mb-sm-5">
                            <label for="namaPenerima" class="form-label fs-4">Nama Penerima</label>
                            <input type="text" class="form-control shadow-sm p-3" name="namaPenerima" id="namaPenerima" aria-describedby="namaPenerimaText" placeholder="isi nama penerima" value="{!! old('namaPenerima') !!}">
                            <div id="validationNamaPenerima" class="invalid-feedback">
                                @if (Session::has("namaPenerimaError")) @endif
                            </div>
                        </div>
                    </div>   
                        <div class="col">
                            <div class="mb-xl-3 mb-sm-5">
                                <label for="nomorPenerima" class="form-label fs-4">Tlp Penerima</label>
                                <input type="text" class="form-control shadow-sm p-3" name="nomorPenerima" id="nomorPenerima" aria-describedby="nomorPenerimaText" placeholder="isi nomor penerima" value="{!! old('nomorPenerima') !!}">
                                <div id="validationNamaPenerima" class="invalid-feedback">
                                    @if (Session::has("nomorPenerimaError")) @endif
>>>>>>> 96ef6381689b581a74f833bdac31cacd28e36f24
                                </div>
                            </div>
                        </div>
                    </div>
<<<<<<< HEAD
                    <div class="col"> 
                        <div class="mb-xl-3 mb-sm-5 p-3 w-60"> 
                            <label for="lunas" class="form-label fs-4">Lunas</label> 
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="isLunas" name="isLunas" value="Lunas">
                                <label class="form-check-label">Lunas</label>
                            </div>
                        </div> 
                    </div> 
                </div>
            </div>
        </div>              
                            <div class="col p-3">
                            <div class="trms-line-2-gray"></div>
                            </div></div>
                            <div class="col-md-5">
                            <div class="price-bus mb-xl-3 mb-sm-5">
                                <table>
                                        <tbody>
                                            <tr>
                                                <b>Biaya: </b>
                                            </tr>
                                            <tr>
                                               <b>Rp 1.500.000</b>
                                            </tr>
                                        </tbody>
                                </table>
                            </div>
                        </div>
    <button type="submit" class="btn btn-primary mt-2 fs-5 mh-30" id="btnSubmit">Tambah Pengiriman</button>
</div>   
</form>
=======
                </div>
            </div>                    
            <div class="row justify-content-between d-flex g-2">  
                <label class="text-wrap g-5" id="pengiriman"><h2>INFORMASI BARANG</h2></label>
                <div class="col-12 m-1 py-2 rounded-2 justify-content-center shadow-sm bg-dark text-light">
                    <div class="row justify-content-between d-flex g-1">
                    <div class="row align-items-start py-1">
                        <div class="col">
                            <div class="mb-xl-3 mb-sm-5">
                                <label for="Tipe Item" class="form-label fs-4">Pilih Item</label>
                                <select class="form-select shadow-sm p-3" name="tipeItem" id="tipeItem" aria-describedby="tipeItemText" value="{!! old('tipeItem') !!}">
                                    <option selected>Pilih Item</option>
                                </select>
                                <div id="TipeItem" class="invalid-feedback">
                                    @if (Session::has("tipeItemError")) @endif
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-xl-3 mb-sm-5">
                                <label for="namaBarang" class="form-label fs-4">Nama Barang</label>
                                <input type="text" class="form-control shadow-sm p-3" name="namaBarang" id="namaBarang" aria-describedby="namaBarangText" placeholder="isi nama barang" value="{!! old('namaBarang') !!}">
                                <div id="validationNamaPenerima" class="invalid-feedback">
                                    @if (Session::has("namaBarangError")) @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>       

    </form>
    </div>
>>>>>>> 96ef6381689b581a74f833bdac31cacd28e36f24
</div>
@endsection

@section("footer")
    @include("layouts.footerAdmin") 
@endsection

@section("script-body-bottom")
    <script>
        $(document).ready(function(){ // Function stuck loading
            $("#overlayLoading").css("visibility", "hidden"); 
        });
    </script>
@endsection 