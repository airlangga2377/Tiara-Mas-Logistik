{{-- 
1. Copy and paste the template, rename it 
2. Add route to your blade file 
3. Add code 
--}}

@extends("layouts.app")

@section("preload")
    {{-- Datatables --}}
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>  

    {{-- Select2 --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> 
@endsection

@section("title") 
    <title>Cargo aja</title>
<<<<<<< HEAD
@endsection 

@section('top-nav-bar') 
    @include('layouts.loggednav')
=======
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
                {{ $name }}
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
                    <a role="button" class="fs-5 list-group-item list-group-item-action" href="{{ url("barang/truk/insert#pengiriman") }}">Pengiriman</a>
                </div>
            </div>
        </div> 
    </div>
</nav> 
>>>>>>> 96ef6381689b581a74f833bdac31cacd28e36f24
@endsection

@section("content")  
<div class="container">  
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url("home") }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ url("barang") }}">Barang</a></li>
            <li class="breadcrumb-item active" aria-current="page">Pengiriman</li>
        </ol>
    </nav>

    <form action="{{ url("barang/truk/insert") }}" method="post">
        @csrf  
<<<<<<< HEAD
        <div class="row justify-content-center align-items-center g-2">
            <div class="col">
                <p class="fs-1 text text-center" id="pengiriman">Input Pengiriman Truk</p>
            </div> 
        </div>
        <div class="row justify-content-between d-flex g-3">  
=======
        <div class="row justify-content-between d-flex g-3"> 
            <label class="text-wrap fs-3 mb-2 text-center" id="pengiriman">Pengisian Pengiriman Truk</label>
>>>>>>> 96ef6381689b581a74f833bdac31cacd28e36f24
            <div class="col-12 m-1 py-2 rounded-2 justify-content-center shadow-sm bg-dark text-light">    
                {{-- Error handler --}}
                @if ($errors->any())
                    <div class="fs-5 alert alert-danger bg-danger text-white border-0 text-center" role="alert">
                        {!! $errors->first() !!}
                    </div>
                @endif

                @if (Session::has("message")) 
                    <div class="fs-5 alert alert-success bg-success text-white border-0 text-center" role="alert" id="toggleStatusPengiriman">
<<<<<<< HEAD
                        {!! Session::get("message") !!} 
                        <script>
                            window.open("http://127.0.0.1:8000/barang/truk/print/deliverynote?no_lmt={!! Session::get('no_lmt') !!}", "_blank")
                        </script>
=======
                        {!! Session::get("message") !!}
>>>>>>> 96ef6381689b581a74f833bdac31cacd28e36f24
                    </div>
                @endif 
                
                <div class="row mb-3 justify-content-center ">  
                    <div class="row align-items-start py-1">
                        <div class="col">
                            <div class="mb-xl-3 mb-sm-5">
                                <label for="namaPengirim" class="form-label fs-4">Nama Pengirim</label>
<<<<<<< HEAD
                                <input type="text" class="form-control shadow-sm p-3" name="namaPengirim" id="namaPengirim" aria-describedby="namaPengirimText" placeholder="isi nama pengirim" value="@if ($errors->any()) {!! old('namaPengirim') !!} @endif">
=======
                                <input type="text" class="form-control shadow-sm p-3" name="namaPengirim" id="namaPengirim" aria-describedby="namaPengirimText" placeholder="isi nama pengirim" value="{!! old('namaPengirim') !!}">
>>>>>>> 96ef6381689b581a74f833bdac31cacd28e36f24
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
                                </div>
                            </div>  
                        </div> 
                    </div>  
                </div>

                <div class="row justify-content-center align-items-center g-2"> 
                    <div class="row justify-content-center align-items-center g-2"> 
                        <div class="col-12"> 
                            <div class="mb-xl-3 mb-sm-5 p-3 w-60"> 
                                <label for="tujuan" class="form-label fs-4">Tujuan</label>  
                                <select class="form-select" aria-label="Pilih tujuan" id="selectBoxTujuan" data-live-search="true" name="tujuan">
                                    <option disabled @if (old("tujuan") == null || old() == null) selected @endif value>Semua Tujuan</option>
                                    <option value="taliwang" @if (old("tujuan") == "taliwang") selected @endif>Taliwang</option>
                                    <option value="bima" @if (old("tujuan") == "bima") selected @endif>Bima</option>
                                    <option value="sumbawa" @if (old("tujuan") == "sumbawa") selected @endif>Sumbawa</option>
                                    <option value="mataram" @if (old("tujuan") == "mataram") selected @endif>Mataram</option>
                                </select>
                                <div id="validationtujuan" class="invalid-feedback">
                                    @if (Session::has("tujuanError")) @endif
                                </div> 
                            </div>
                        </div> 
                        <div class="col"> 
                            <div class="mb-xl-3 mb-sm-5 p-3 w-60"> 
                                <label for="lunas" class="form-label fs-4">Lunas</label> 
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="isLunas" name="isLunas" value="Lunas">
                                    <label class="form-check-label">Lunas</label>
                                </div>
                            </div> 
                        </div> 
<<<<<<< HEAD
                        
                        <div class="col">
                            <div class="mb-xl-3 mb-sm-5">
                                <label for="keterangan" class="form-label fs-4">Keterangan</label>
                                <input type="text" class="form-control shadow-sm p-3" name="keterangan" id="keterangan" aria-describedby="keteranganText" placeholder="isi keterangan" value="{!! old('keterangan') !!}">
                                <div id="validationNamaPenerima" class="invalid-feedback">
                                    @if (Session::has("keteranganError")) @endif
                                </div>
                            </div>  
                        </div> 
=======
>>>>>>> 96ef6381689b581a74f833bdac31cacd28e36f24
                    </div> 
                </div> 
            </div> 
            
            <div class="col-12 m-1 rounded-2 justify-content-center shadow-sm text-dark">   
                <table id="tableId" class="display table table-hover table-responsive">
                    <thead>
                    <tr>
<<<<<<< HEAD
                        <th scope="col"><p class="text text-center">No</p></th>
                        <th scope="col"><p class="text text-center">Jumlah</p></th>
                        <th scope="col"><p class="text text-center">Code</p></th>
                        <th scope="col"><p class="text text-center">Jenis</p></th>
                        <th scope="col"><p class="text text-center">Biaya</p></th>
                        <th scope="col"><p class="text text-center">Panjang</p></th>
                        <th scope="col"><p class="text text-center">Lebar</p></th>
                        <th scope="col"><p class="text text-center">Tinggi</p></th>
                        <th scope="col"><p class="text text-center">Berat</p></th>
=======
                        <th scope="col">No</th>
                        <th scope="col">Jenis Barang</th>
                        <th scope="col">Jumlah Barang</th>
                        <th scope="col">Keterangan</th>
                        <th scope="col">Biaya</th>
                        <th scope="col">Panjang</th>
                        <th scope="col">Lebar</th>
                        <th scope="col">Tinggi</th>
                        <th scope="col">Berat</th>
>>>>>>> 96ef6381689b581a74f833bdac31cacd28e36f24
                    </tr>
                    </thead>
                    <tbody>
                    @for ($i = 0; $i < 7; $i++)
                        <tr>
                            <th scope="row">{{ $i + 1 }}</th>
                            @if (old() != null) 
                                <td>
<<<<<<< HEAD
                                    <input type="number" class="form-control fs-6" aria-label="Jumlah Barang" id="jumlahBarang" name="jumlahBarang[]" value="{!! old('jumlahBarang')[$i] !!}" aria-describedby="jumlahBarangText" placeholder="isi jumlah barang" data-toggle="tooltip" data-placement="top" title="Jumlah Barang">
                                </td>
                                <td>
                                    <input type="text" class="form-control fs-6" aria-label="Code Satuan" id="Code Satuan" name="code[]" value="{!! old('code')[$i] !!}" aria-describedby="codeText" placeholder="isi code satuan" data-toggle="tooltip" data-placement="top" title="Code Satuan Barang">
                                </td>
                                <td>
                                    <input type="text" class="form-control fs-6" aria-label="Pilih Barang" id="jenisBarang" name="jenisBarang[]" value="{!! old('jenisBarang')[$i] !!}" aria-describedby="jenisBarangText" placeholder="isi jenis barang" data-toggle="tooltip" data-placement="top" title="Jenis Barang">
                                </td>
                                <td>
                                    <input type="text" class="form-control fs-6" aria-label="biaya" id="biaya" name="biaya[]" value="{!! old('biaya')[$i] !!}" aria-describedby="biayaText" placeholder="isi biaya" data-toggle="tooltip" data-placement="top" title="Biaya Barang">
=======
                                    <input type="text" class="form-control fs-6" aria-label="Pilih Barang" id="jenisBarang" name="jenisBarang[]" value="{!! old('jenisBarang')[$i] !!}" aria-describedby="jenisBarangText" placeholder="isi jenis barang"/>
                                </td>
                                <td>
                                    <input type="number" class="form-control fs-6" aria-label="Jumlah Barang" id="jumlahBarang" name="jumlahBarang[]" value="{!! old('jumlahBarang')[$i] !!}" aria-describedby="jumlahBarangText" placeholder="isi jumlah barang">
                                </td>
                                <td>
                                    <input type="text" class="form-control fs-6" aria-label="keterangan" id="keterangan" name="keterangan[]" value="{!! old('keterangan')[$i] !!}" aria-describedby="keteranganText" placeholder="isi keterangan">
                                </td>
                                <td>
                                    <input type="text" class="form-control fs-6" aria-label="biaya" id="biaya" name="biaya[]" value="{!! old('biaya')[$i] !!}" aria-describedby="biayaText" placeholder="isi biaya">
>>>>>>> 96ef6381689b581a74f833bdac31cacd28e36f24
                                </td>

                                {{-- formula --}}
                                <td>
<<<<<<< HEAD
                                    <input type="text" class="form-control fs-6" name="kubikasiPanjang[]" value="{!! old('kubikasiPanjang')[$i] !!}" id="kubikasiPanjang" aria-describedby="kubikasiPanjangText" placeholder="isi panjang" data-toggle="tooltip" data-placement="top" title="Panjang Barang">
                                </td> 
                                <td>
                                    <input type="text" class="form-control fs-6" name="kubikasiLebar[]" value="{!! old('kubikasiLebar')[$i] !!}" id="kubikasiLebar" aria-describedby="kubikasiLebarText" placeholder="isi lebar" data-toggle="tooltip" data-placement="top" title="Lebar Barang">
                                </td> 
                                <td>
                                    <input type="text" class="form-control fs-6" name="kubikasiTinggi[]" value="{!! old('kubikasiTinggi')[$i] !!}" id="kubikasiTinggi" aria-describedby="kubikasiTinggiText" placeholder="isi tinggi" data-toggle="tooltip" data-placement="top" title="Tinggi Barang">
                                </td> 
                                <td>
                                    <input type="text" class="form-control fs-6" name="berat[]" value="{!! old('berat')[$i] !!}" id="kubikasiBerat" aria-describedby="kubikasiBeratText" placeholder="isi berat" data-toggle="tooltip" data-placement="top" title="Berat Barang">
                                </td>  
                            @else 
                                <td>
                                    <input type="number" class="form-control fs-6" aria-label="Jumlah Barang" id="jumlahBarang" name="jumlahBarang[]" value="" aria-describedby="jumlahBarangText" placeholder="isi jumlah barang" data-toggle="tooltip" data-placement="top" title="Jumlah Barang">
                                </td>
                                <td>
                                    <input type="text" class="form-control fs-6" aria-label="Code Satuan" id="Code Satuan" name="code[]" value="" aria-describedby="codeText" placeholder="isi code satuan" data-toggle="tooltip" data-placement="top" title="Code Satuan Barang">
                                </td>
                                <td>
                                    <input type="text" class="form-control fs-6" aria-label="Pilih Barang" id="jenisBarang" name="jenisBarang[]" value="" aria-describedby="jenisBarangText" placeholder="isi jenis barang" data-toggle="tooltip" data-placement="top" title="Jenis Barang">
                                </td>
                                <td>
                                    <input type="text" class="form-control fs-6" aria-label="biaya" id="biaya" name="biaya[]" value="" aria-describedby="biayaText" placeholder="isi biaya" data-toggle="tooltip" data-placement="top" title="Biaya Barang">
=======
                                    <input type="text" class="form-control fs-6" name="kubikasiPanjang[]" value="{!! old('kubikasiPanjang')[$i] !!}" id="kubikasiPanjang" aria-describedby="kubikasiPanjangText" placeholder="isi panjang">
                                </td> 
                                <td>
                                    <input type="text" class="form-control fs-6" name="kubikasiLebar[]" value="{!! old('kubikasiLebar')[$i] !!}" id="kubikasiLebar" aria-describedby="kubikasiLebarText" placeholder="isi lebar">
                                </td> 
                                <td>
                                    <input type="text" class="form-control fs-6" name="kubikasiTinggi[]" value="{!! old('kubikasiTinggi')[$i] !!}" id="kubikasiTinggi" aria-describedby="kubikasiTinggiText" placeholder="isi tinggi">
                                </td> 
                                <td>
                                    <input type="text" class="form-control fs-6" name="berat[]" value="{!! old('berat')[$i] !!}" id="kubikasiBerat" aria-describedby="kubikasiBeratText" placeholder="isi berat">
                                </td>  
                            @else 
                                <td>
                                    <input type="text" class="form-control fs-6" aria-label="Pilih Barang" id="jenisBarang" name="jenisBarang[]" value="" aria-describedby="jenisBarangText" placeholder="isi jenis barang"/>
                                </td>
                                <td>
                                    <input type="number" class="form-control fs-6" aria-label="Jumlah Barang" id="jumlahBarang" name="jumlahBarang[]" value="" aria-describedby="jumlahBarangText" placeholder="isi jumlah barang">
                                </td>
                                <td>
                                    <input type="text" class="form-control fs-6" aria-label="keterangan" id="keterangan" name="keterangan[]" value="" aria-describedby="keteranganText" placeholder="isi keterangan">
                                </td>
                                <td>
                                    <input type="text" class="form-control fs-6" aria-label="biaya" id="biaya" name="biaya[]" value="" aria-describedby="biayaText" placeholder="isi biaya">
>>>>>>> 96ef6381689b581a74f833bdac31cacd28e36f24
                                </td>

                                {{-- formula --}}
                                <td>
<<<<<<< HEAD
                                    <input type="text" class="form-control fs-6" name="kubikasiPanjang[]" value="" id="kubikasiPanjang" aria-describedby="kubikasiPanjangText" placeholder="isi panjang" data-toggle="tooltip" data-placement="top" title="Panjang Barang">
                                </td> 
                                <td>
                                    <input type="text" class="form-control fs-6" name="kubikasiLebar[]" value="" id="kubikasiLebar" aria-describedby="kubikasiLebarText" placeholder="isi lebar" data-toggle="tooltip" data-placement="top" title="Lebar Barang">
                                </td> 
                                <td>
                                    <input type="text" class="form-control fs-6" name="kubikasiTinggi[]" value="" id="kubikasiTinggi" aria-describedby="kubikasiTinggiText" placeholder="isi tinggi" data-toggle="tooltip" data-placement="top" title="Tinggi Barang">
                                </td> 
                                <td>
                                    <input type="text" class="form-control fs-6" name="berat[]" value="" id="kubikasiBerat" aria-describedby="kubikasiBeratText" placeholder="isi berat" data-toggle="tooltip" data-placement="top" title="Berat Barang">
=======
                                    <input type="text" class="form-control fs-6" name="kubikasiPanjang[]" value="" id="kubikasiPanjang" aria-describedby="kubikasiPanjangText" placeholder="isi panjang">
                                </td> 
                                <td>
                                    <input type="text" class="form-control fs-6" name="kubikasiLebar[]" value="" id="kubikasiLebar" aria-describedby="kubikasiLebarText" placeholder="isi lebar">
                                </td> 
                                <td>
                                    <input type="text" class="form-control fs-6" name="kubikasiTinggi[]" value="" id="kubikasiTinggi" aria-describedby="kubikasiTinggiText" placeholder="isi tinggi">
                                </td> 
                                <td>
                                    <input type="text" class="form-control fs-6" name="berat[]" value="" id="kubikasiBerat" aria-describedby="kubikasiBeratText" placeholder="isi berat">
>>>>>>> 96ef6381689b581a74f833bdac31cacd28e36f24
                                </td> 
                            @endif
                        </tr> 
                    @endfor 
                    </tbody>
                </table>
            </div>  

            <button type="submit" class="btn btn-success mt-2 fs-5 mh-30" id="btnSubmit" disabled>Tambah Pengiriman</button>
        </div>
    </form>
</div>
@endsection

@section("footer")
    @include("layouts.footerAdmin") 
@endsection

@section("script-body-bottom")  
    <script>

        $("#selectBoxJenisPengirim").select2({
            width: "resolve" // need to override the changed default
        }); 
        $("#selectBoxSupir").select2({
            width: "resolve" // need to override the changed default
        });
        $("#selectBoxKernet").select2({
            width: "resolve" // need to override the changed default
        });
        
        function rumusKubikasi(panjang, lebar, tinggi, harga) {
            if(panjang && lebar && tinggi && harga){
                var volume = panjang * lebar * tinggi * harga;
                return new Intl.NumberFormat("ID", {
                    style: "currency",
                    currency: "IDR"
                }).format(volume); 
            }
            return "";
        } 

        function rumusBerat(beratKg, jenisBarang) {
            if(beratKg && jenisBarang){
                if(jenisBarang === "besi"){
                    var harga = beratKg * 1000;
                    return new Intl.NumberFormat("ID", {
                        style: "currency",
                        currency: "IDR"
                    }).format(harga);  
                } else if(jenisBarang === "tidak besi"){
                    var harga = beratKg * 800;
                    return new Intl.NumberFormat("ID", {
                        style: "currency",
                        currency: "IDR"
                    }).format(harga);  
                }
            }
            return "";
        } 
        function disableSubmitButtonTable() {
            $( "#btnSubmit" ).prop( "disabled", true ); 

            var jenisBarang = $(this).find("#jenisBarang");
<<<<<<< HEAD
            var jumlahBarang = $(this).find("#jumlahBarang"); 
=======
            var jumlahBarang = $(this).find("#jumlahBarang");
            var keterangan = $(this).find("#keterangan");
>>>>>>> 96ef6381689b581a74f833bdac31cacd28e36f24
            var biaya = $(this).find("#biaya");
            var kubikasiPanjang = $(this).find("#kubikasiPanjang");
            var kubikasiLebar = $(this).find("#kubikasiLebar");
            var kubikasiTinggi = $(this).find("#kubikasiTinggi");
            var kubikasiBerat = $(this).find("#kubikasiBerat");

            if(
                jenisBarang.val().length <= 0 
<<<<<<< HEAD
                && jumlahBarang.val().length <= 0 
=======
                && jumlahBarang.val().length <= 0
                && keterangan.val().length <= 0
>>>>>>> 96ef6381689b581a74f833bdac31cacd28e36f24
                && biaya.val().length <= 0
                && kubikasiPanjang.val().length <= 0
                && kubikasiLebar.val().length <= 0
                && kubikasiTinggi.val().length <= 0
                && kubikasiBerat.val().length <= 0
            ){
                $(this).removeClass("bg-danger"); 
                return;
            }

            if(
                jenisBarang.val()
                && jenisBarang.val() !== ""
                && jumlahBarang.val() 
                && jumlahBarang.val() !== ""

                && (
                    biaya.val() !== ""
                    ||
                    ( 
                        kubikasiPanjang.val() !== ""
                        && kubikasiLebar.val() !== ""
                        && kubikasiTinggi.val() !== ""
                        && kubikasiBerat.val() !== ""
                    )
                )
                ){  
                    if( 
                        (biaya.val())
                        || (
                            kubikasiPanjang.val()
                            && kubikasiLebar.val()
                            && kubikasiTinggi.val()
                            && kubikasiBerat.val()
                        )
                    ){ 
                        $(this).removeClass("bg-danger"); 

                        $( "#btnSubmit" ).prop( "disabled", false ); 
                    } 
            }
            
            else{
                $(this).addClass("bg-danger");

                $( "#btnSubmit" ).prop( "disabled", true ); 
            }

            var namaPengirim = $("#namaPengirim").val();
            var nomorPengirim = $("#nomorPengirim").val();
            var namaPenerima = $("#namaPenerima").val();
            var nomorPenerima = $("#nomorPenerima").val();

            var tujuan = $('#selectBoxTujuan').find(":selected").val();

            if(
                namaPengirim === ""
                || namaPengirim === undefined

                || nomorPengirim === ""
                || nomorPengirim === undefined

                || namaPenerima === ""
                || namaPenerima === undefined
                
                || nomorPenerima === ""
                || nomorPenerima === undefined
                
                || tujuan === ""
            ){
                $( "#btnSubmit" ).prop( "disabled", true ); 
            }
        }

        function disableSubmitButton() {
            $( "#btnSubmit" ).prop( "disabled", true );  

            var namaPengirim = $("#namaPengirim").val();
            var nomorPengirim = $("#nomorPengirim").val();
            var namaPenerima = $("#namaPenerima").val();
            var nomorPenerima = $("#nomorPenerima").val();

            var tujuan = $('#selectBoxTujuan').find(":selected").val();

            if(
                namaPengirim === ""
                || namaPengirim === undefined

                || nomorPengirim === ""
                || nomorPengirim === undefined

                || namaPenerima === ""
                || namaPenerima === undefined
                
                || nomorPenerima === ""
                || nomorPenerima === undefined
                
                || tujuan === ""
            ){
                $( "#btnSubmit" ).prop( "disabled", true ); 
            }else{
                $( "#btnSubmit" ).prop( "disabled", false ); 

            }
        }

        $(document).ready(function(){

            $("#overlayLoading").css("visibility", "hidden");  

            $('#tableId tbody').on('click', 'tr', disableSubmitButtonTable); 

            $('#tableId tbody').on('change', 'tr', disableSubmitButtonTable);
 
            $("#namaPengirim").change(disableSubmitButton);
            $("#nomorPengirim").change(disableSubmitButton);
            $("#namaPenerima").change(disableSubmitButton);
            $("#nomorPenerima").change(disableSubmitButton);
            $('#selectBoxTujuan').find(":selected").change(disableSubmitButton);
        });
    </script>
@endsection