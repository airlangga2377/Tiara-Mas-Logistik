@extends("layouts.app")

@section("preload")
    {{-- SELECT 2 --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-rc.0/css/select2.css" integrity="sha512-PO7TIdn2hPTkZ6DSc5eN2DyMpTn/ZixXUQMDLUx+O5d7zGy0h1Th5jgYt84DXvMRhF3N0Ucfd7snCyzlJbAHQA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-rc.0/js/select2.full.js" integrity="sha512-Gu2OIWdShncC2h0KqZMOrDWTR0okm7pXBU3M1HuedqlVCDgMbz9BCQWx2AV72pvDAbPhyP9qR7hjk6pUXXj1xg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        
    {{-- Datatables --}}
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    {{-- <link href="{{ url('/assets/css/bus/app.css') }}" rel="stylesheet" /> --}}
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

                {{ Auth::user()->name }}

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

                    <a role="button" class="fs-5 fw-bold list-group-item list-group-item-action" href="{{ url("barang") }}">Barang</a>

                    <a role="button" class="fs-5 fw-bold list-group-item list-group-item-action" href="{{ url("barang") }}">Barang</a>  

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
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url("home") }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ url("barang") }}">Barang</a></li>
            <li class="breadcrumb-item active" aria-current="page">Pengiriman Bus</li>
        </ol>
    </nav> <br> <br>
        <form action="{{ url("/barang/bus/insert-save") }}" method="post">
            {{ csrf_field() }}
    <div class="row justify-content-between d-flex g-3">
        <label class="text-wrap g-5 border-bottom" id="pengiriman"><h2>IDENTITAS PENGIRIM</h2></label>
            {{-- Error handler --}}
            @if ($errors->any())
                <div class="fs-5 alert alert-danger bg-danger text-white border-0 text-center" role="alert">
                    {!! $errors->first() !!}
                </div>
            @endif

            @if (Session::has("message")) 
                    <div class="fs-5 alert alert-success bg-success text-white border-0 text-center" role="alert" id="toggleStatusPengiriman">
                        {!! Session::get("message") !!} 
                        <script>
                            window.open("/barang/bus/print/resi?no_lmt={!! Session::get('no_lmt') !!}", "_blank")
                        </script>
                        <script>
                            window.open("/barang/bus/print/barang?no_lmt={!! Session::get('no_lmt') !!}", "_blank")
                        </script>
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
        <label class="text-wrap g-5 border-bottom" id="pengiriman"><h2>IDENTITAS PENERIMA</h2></label>
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
            <style>
                .container-fluid{
                    /* background-color:#f5f5f5; */
                    background-color:#fff;
                    display: inherit;
                }
                .row.justify-content-between.d-flex.g-3{
                    background-color: #e9ecef;
                }
                .select2-container .select2-selection--single{
                    height: 57.7983px;
                    /* inline-size: 524.048px; */
                    text-align: center;
                    padding-top: 10px;
                    font-size: 24px;
                    
                }
                .select2-container--default .select2-selection--single .select2-selection__rendered{
                    display: block !important;
                    color: rgb(0, 0, 0);
                    height: 57.7983px;
                    width: 100%;
                    /* inline-size: 524.048px; */
                }

                .select2-container--default .select2-selection--single .select2-selection__arrow b{
                    display: block;
                    
                } 
                
                .select2-container--default.select2-container--open .select2-selection--single .select2-selection__arrow b{
                    display: block;
                }

                .statusPembayaran{
                    height: 57.7983px;
                    width: 100%;
                }
                
            </style>
            <div class="row justify-content-between d-flex g-1">
                <div class="row align-items-start py-5 md-15">
                    @if ($isUserSuperadmin)
                        <div class="col">
                            <div class="mb-xl-3 mb-sm-5">                             
                                <label for="pickup" class="form-label fs-4">Asal Barang</label>
                                <select type="option" id="pickup" class="form-control select-pickup shadow-sm p-3" name="pickup" id="pickup" aria-describedby="pickupText" value="{!! old('pickup') !!}">
                                    <option value="" disabled selected>Silahkan Pilih Asal</option>
                                @foreach ($allCargo as $wilayah)
                                    <option value="{{ $wilayah->wilayah }}">{{ $wilayah->wilayah }}</option>
                                @endforeach
                                </select>
                                <div id="validationpickup" class="invalid-feedback">
                                    @if (Session::has("pickupError")) @endif
                                </div>
                            </div>
                        </div>
                        @else
                    @endif
                    <div class="col">
                        <div class="mb-xl-3 mb-sm-5">
                            <label for="dropoff" class="form-label fs-4">Tujuan Barang</label>
                            <select type="option" id="dropoff" class="form-control" name="dropoff" id="tujuanBarang" aria-describedby="tujuanBarangText" value="{!! old('tujuanBarang') !!}">
                                <option value=""> Silahkan Pilih Tujuan </option>
                                @foreach ($allCargo as $kota)
                                    <option value="{{ $kota->wilayah }}">{{ $kota->wilayah }}</option>
                                @endforeach
                            </select>
                            <div id="validationTujuanBarang" class="invalid-feedback">
                                @if (Session::has("tujuanBarangError")) @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-between d-flex g-1">
                <div class="row align-items-start py-1">
                    <div class="col">
                        <div class="mb-xl-3 mb-sm-5">
                            <label for="keterangan" class="form-label fs-4">Keterangan</label>
                            <input type="text" class="form-control shadow-sm p-3" name="keterangan" id="keterangan" aria-describedby="keteranganText" placeholder="isi keterangan" value="{!! old('keterangan') !!}">                                
                            <div id="validationKeterangan" class="invalid-feedback">
                                @if (Session::has("keteranganError")) @endif
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-xl-3 mb-sm-5"> 
                            <label for="statusPembayaran" class="form-label fs-4">Lunas</label> 
                            <select class="form-control statusPembayaran" type="select" id="statusPembayaran" name="statusPembayaran">
                                <option value="1" selected>Bayar Tujuan</option>
                                <option value="4">Lunas</option>
                            </select>
                        </div>
                        <div id="validationStatusPembayaran" class="invalid-feedback">
                            @if (Session::has("statusPembayaranError")) @endif
                        </div>
                    </div>
                </div>
            </div>
    @for ($i = 0; $i < 1; $i++)<br>
            <label class="text-wrap g-5 border-bottom" id="pengiriman"><h2>INFORMASI BARANG </h2></label>
            @if (old() != null)
                <div class="row justify-content-between d-flex g-1">
                    <div class="row align-items-start py-1">
                        <div class="col">
                            <div class="mb-xl-3 mb-sm-5">
                                <label for="jenisBarang" class="form-label fs-4">Pilih Jenis Barang</label>                                                                            
                                <select class="form-select shadow-sm p-3" name="jenisBarang[]" id="jenisBarang" aria-describedby="jenisBarangText" value="{!! old('jenisBarang')[$i] !!}">                                        
                                        <option value="barang">Barang</option>
                                        <option value="dokumen">Dokumen</option>
                                        <option value="cairan">Cairan</option>
                                </select>
                                <div id="validationJenisBarang" class="invalid-feedback">
                                    @if (Session::has("jenisBarangError")) @endif
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-xl-3 mb-sm-5">
                                <label for="jenisPaket" class="form-label fs-4">Isi Menurut Pengakuan</label>
                                <input type="text" class="form-control shadow-sm p-3" name="jenisPaket" id="jenisPaket" aria-describedby="jenisPaketText" placeholder="isi menurut pengakuan" value="{!! old('jenisPaket') !!}">
                                <div id="validationJenisPaket" class="invalid-feedback">
                                    @if (Session::has("jenisPaketError")) @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-between d-flex g-1">
                    <div class="row align-items-start py-1">
                        <div class="col">
                            <div class="mb-xl-3 mb-sm-5">
                                <label for="berat" class="form-label fs-4">Berat</label>
                                <input type="text" class="form-control shadow-sm p-3" name="berat[]" id="kubikasiBerat" aria-describedby="kubikasiBeratText" placeholder="isi berat" data-toggle="tooltip" data-placement="top" title="Berat Barang" value="{!! old('berat')[$i] !!}">
                                <div id="validationBerat" class="invalid-feedback">
                                    @if (Session::has("beratError")) @endif
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-xl-3 mb-sm-5">
                                <label for="jumlahBarang" class="form-label fs-4">Jumlah Barang</label>
                                <input type="number" class="form-control shadow-sm p-3" name="jumlahBarang" id="jumlahBarang" aria-describedby="jumlahBarangText" placeholder="isi jumlah barang" value="{!! old('jumlahBarang')[$i] !!}">
                                <div id="validationJumlahBarang" class="invalid-feedback">
                                    @if (Session::has("jumlahBarangError")) @endif
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-xl-3 mb-sm-5">
                                <label for="panjangBarang" class="form-label fs-4">Panjang</label>
                                <input type="text" class="form-control shadow-sm p-3" name="panjangBarang[]" id="panjangBarang" aria-describedby="panjangBarangText" placeholder="isi panjang barang" value="{!! old('panjangBarang')[$i] !!}">
                                <div id="validationPanjangBarang" class="invalid-feedback">
                                    @if (Session::has("panjangBarangError")) @endif
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-xl-3 mb-sm-5">
                                <label for="lebarBarang" class="form-label fs-4">Lebar</label>
                                <input type="text" class="form-control shadow-sm p-3" name="lebarBarang[]" id="lebarBarang" aria-describedby="lebarBarangText" placeholder="isi lebar barang" value="{!! old('lebarBarang')[$i] !!}">
                                <div id="validationLebarBarang" class="invalid-feedback">
                                    @if (Session::has("lebarBarangError")) @endif
                                </div>
                            </div>
                        </div>
                        <div class="col">
                                <div class="mb-xl-3 mb-sm-5">
                                    <label for="tinggiBarang" class="form-label fs-4">Tinggi</label>
                                    <input type="text" class="form-control shadow-sm p-3" name="tinggiBarang[]" id="tinggiBarang" aria-describedby="tinggiBarangText" placeholder="isi tinggi barang" value="{!! old('tinggiBarang')[$i] !!}">
                                    <div id="validationTinggiBarang" class="invalid-feedback">
                                        @if (Session::has("tinggiBarangError")) @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-between d-flex g-1">
                    <div class="row align-items-start py-1">
                        <div class="col">
                            <div class="mb-xl-3 mb-sm-5">
                                <label for="biayaBarang" class="form-label fs-4">Biaya Barang</label>
                                <input type="text" class="form-control shadow-sm p-3" name="biaya[]" id="biaya" aria-describedby="biayaText" placeholder="isi biaya" value="{!! old('biaya')[$i] !!}">
                                <div id="validationBiayaBarang" class="invalid-feedback">
                                    @if (Session::has("biayaBarangError")) @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @else
            <div class="row justify-content-between d-flex g-1">
                <div class="row align-items-start py-1">
                    <div class="col">
                        <div class="mb-xl-3 mb-sm-5">
                            <label for="jenisBarang" class="form-label fs-4">Pilih Jenis Barang</label>                                                                            
                            <select class="form-select shadow-sm p-3" name="jenisBarang[]" id="jenisBarang" aria-describedby="jenisBarangText" value="">                                        
                                    <option value="barang">Barang</option>
                                    <option value="dokumen">Dokumen</option>
                                    <option value="cairan">Cairan</option>
                            </select>
                            <div id="validationJenisBarang" class="invalid-feedback">
                                @if (Session::has("jenisBarangError")) @endif
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-xl-3 mb-sm-5">
                            <label for="jenisPaket" class="form-label fs-4">Isi Menurut Pengakuan</label>
                            <input type="text" class="form-control shadow-sm p-3" name="jenisPaket" id="jenisPaket" aria-describedby="jenisPaketText" placeholder="isi menurut pengakuan" value="">
                            <div id="validationJenisPaket" class="invalid-feedback">
                                @if (Session::has("jenisPaketError")) @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-between d-flex g-1">
                <div class="row align-items-start py-1">
                    <div class="col">
                        <div class="mb-xl-3 mb-sm-5">
                            <label for="berat" class="form-label fs-4">Berat</label>
                            <input type="text" class="form-control shadow-sm p-3" name="berat[]" id="kubikasiBerat" aria-describedby="kubikasiBeratText" placeholder="isi berat" data-toggle="tooltip" data-placement="top" title="Berat Barang" value="">
                            <div id="validationBerat" class="invalid-feedback">
                                @if (Session::has("beratError")) @endif
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-xl-3 mb-sm-5">
                            <label for="jumlahBarang" class="form-label fs-4">Jumlah Barang</label>
                            <input type="number" class="form-control shadow-sm p-3" name="jumlahBarang" id="jumlahBarang" aria-describedby="jumlahBarangText" placeholder="isi jumlah barang" value="">                            
                            <div id="validationJumlahBarang" class="invalid-feedback">
                                @if (Session::has("jumlahBarangError")) @endif
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-xl-3 mb-sm-5">
                            <label for="panjangBarang" class="form-label fs-4">Panjang</label>
                            <input type="text" class="form-control shadow-sm p-3" name="panjangBarang[]" id="panjangBarang" aria-describedby="panjangBarangText" placeholder="isi panjang barang" value="">
                            <div id="validationPanjangBarang" class="invalid-feedback">
                                @if (Session::has("panjangBarangError")) @endif
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-xl-3 mb-sm-5">
                            <label for="lebarBarang" class="form-label fs-4">Lebar</label>
                            <input type="text" class="form-control shadow-sm p-3" name="lebarBarang[]" id="lebarBarang" aria-describedby="lebarBarangText" placeholder="isi lebar barang" value="">
                            <div id="validationLebarBarang" class="invalid-feedback">
                                @if (Session::has("lebarBarangError")) @endif
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-xl-3 mb-sm-5">
                            <label for="tinggiBarang" class="form-label fs-4">Tinggi</label>
                            <input type="text" class="form-control shadow-sm p-3" name="tinggiBarang[]" id="tinggiBarang" aria-describedby="tinggiBarangText" placeholder="isi tinggi barang" value="">
                            <div id="validationTinggiBarang" class="invalid-feedback">
                                @if (Session::has("tinggiBarangError")) @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-between d-flex g-1">
                <div class="row align-items-start py-1">
                    <div class="col">
                        <div class="mb-xl-3 mb-sm-5">
                            <label for="biayaBarang" class="form-label fs-4">Biaya Barang</label>
                            <input type="text" class="form-control shadow-sm p-3" name="biaya[]" id="biaya" aria-describedby="biayaText" placeholder="isi biaya" value="">
                            <div id="validationBiayaBarang" class="invalid-feedback">
                                @if (Session::has("biayaBarangError")) @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    @endif
    @endfor
    <button type="submit" class="btn btn-primary" id="btnSubmit">Tambah Pengiriman</button>
</form>
@endsection

@section("footer")
<div class="container">
    @include("layouts.footerAdmin")
</div> 
@endsection

@section("script-body-bottom")

    <script>
        $(document).ready(function(){ // Function stuck loading
            $("#overlayLoading").css("visibility", "hidden"); 
        });
    </script>
    <script>
        $(document).ready(function () {
            $('#pickup').select2({
                width: "resolve"
            });
                
        
        }); 
        </script>
        <script>
            $(document).ready(function () {
                $('#dropoff').select2({
                })
            
            }); 
            </script>
@endsection 