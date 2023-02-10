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
@endsection 

@section('top-nav-bar') 
    @include('layouts.loggednav')
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
        <div class="row justify-content-center align-items-center g-2">
            <div class="col">
                <p class="fs-1 text text-center" id="pengiriman">Input Pengiriman Truk</p>
            </div> 
        </div>
        <div class="row justify-content-between d-flex g-3">  
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
                        <script>
                            window.open("/barang/truk/print/deliverynote?no_lmt={!! Session::get('no_lmt') !!}", "_blank")
                        </script>
                    </div>
                @endif 
                
                <div class="row mb-3 justify-content-center ">  
                    <div class="row align-items-start py-1">
                        <div class="col">
                            <div class="mb-xl-3 mb-sm-5">
                                <label for="namaPengirim" class="form-label fs-4">Nama Pengirim</label>
                                <input type="text" class="form-control shadow-sm p-3" name="namaPengirim" id="namaPengirim" aria-describedby="namaPengirimText" placeholder="isi nama pengirim" value="@if ($errors->any()) {!! old('namaPengirim') !!} @endif">
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
                            @if ($isUserSuperadmin)
                            <div class="mb-xl-3 mb-sm-5 p-3 w-60"> 
                                <label for="asal" class="form-label fs-4">Asal</label>  
                                <select class="form-select" aria-label="Pilih asal" id="selectBoxAsal" data-live-search="true" name="asal">
                                    <option disabled @if (old("asal") == null || old() == null) selected @endif value>Silahkan Pilih Asal</option>
                                    {{-- <option value="surabaya" @if (old("asal") == "surabaya") selected @endif>Surabaya</option>
                                    <option value="taliwang" @if (old("asal") == "taliwang") selected @endif>Taliwang</option>
                                    <option value="bima" @if (old("asal") == "bima") selected @endif>Bima</option>
                                    <option value="sumbawa" @if (old("asal") == "sumbawa") selected @endif>Sumbawa</option>
                                    <option value="mataram" @if (old("asal") == "mataram") selected @endif>Mataram</option> 
                                    @if ($kodeKota->kota != "surabaya" || $isUserSuperadmin) <option value="1" @if (old("id_kode_kota_asal") == "surabaya") selected @endif>Surabaya</option> @endif
                                    @if ($kodeKota->kota != "sumbawa" || $isUserSuperadmin) <option value="2" @if (old("id_kode_kota_asal") == "sumbawa") selected @endif>Sumbawa</option> @endif
                                    @if ($kodeKota->kota != "taliwang" || $isUserSuperadmin) <option value="3" @if (old("id_kode_kota_asal") == "taliwang") selected @endif>Taliwang</option> @endif --}}
                                    @foreach ($allWilayah as $wilayah)
                                        @if ($kodeKota->wilayah != $wilayah->wilayah || $isUserSuperadmin) <option value="{{ $wilayah->id_kode_kota }}" @if (old("id_kode_kota_asal") == $wilayah->wilayah) selected @endif>{{ ucfirst($wilayah->wilayah) }}</option> @endif
                                    @endforeach
                                </select>
                                <div id="validationasal" class="invalid-feedback">
                                    @if (Session::has("asalError")) @endif
                                </div> 
                            </div>
                            @endif
                            <div class="mb-xl-3 mb-sm-5 p-3 w-60"> 
                                <label for="tujuan" class="form-label fs-4">Tujuan</label>  
                                <select class="form-select" aria-label="Pilih tujuan" id="selectBoxTujuan" data-live-search="true" name="tujuan">
                                    <option disabled @if (old("tujuan") == null || old() == null) selected @endif value>Silahkan Pilih Tujuan</option>
                                    {{-- @if ($kodeKota->kota != "surabaya" || $isUserSuperadmin) <option value="surabaya" @if (old("tujuan") == "surabaya") selected @endif>Surabaya</option> @endif
                                    @if ($kodeKota->kota != "taliwang" || $isUserSuperadmin) <option value="taliwang" @if (old("tujuan") == "taliwang") selected @endif>Taliwang</option> @endif
                                    @if ($kodeKota->kota != "bima" || $isUserSuperadmin) <option value="bima" @if (old("tujuan") == "bima") selected @endif>Bima</option> @endif
                                    @if ($kodeKota->kota != "sumbawa" || $isUserSuperadmin) <option value="sumbawa" @if (old("tujuan") == "sumbawa") selected @endif>Sumbawa</option> @endif
                                    @if ($kodeKota->kota != "mataram" || $isUserSuperadmin) <option value="mataram" @if (old("tujuan") == "mataram") selected @endif>Mataram</option> @endif
                                    
                                    @if ($kodeKota->kota != "surabaya" || $isUserSuperadmin) <option value="1" @if (old("id_kode_kota_tujuan") == "surabaya") selected @endif>Surabaya</option> @endif
                                    @if ($kodeKota->kota != "sumbawa" || $isUserSuperadmin) <option value="2" @if (old("id_kode_kota_tujuan") == "sumbawa") selected @endif>Sumbawa</option> @endif
                                    @if ($kodeKota->kota != "taliwang" || $isUserSuperadmin) <option value="3" @if (old("id_kode_kota_tujuan") == "taliwang") selected @endif>Taliwang</option> @endif --}}
                                    @foreach ($allWilayah as $wilayah)
                                    @if ($kodeKota->wilayah != $wilayah->wilayah || $isUserSuperadmin) <option value="{{ $wilayah->id_kode_kota }}" @if (old("id_kode_kota_tujuan") == $wilayah->wilayah) selected @endif>{{ ucfirst($wilayah->wilayah) }}</option> @endif
                                @endforeach
                                </select>
                                <div id="validationtujuan" class="invalid-feedback">
                                    @if (Session::has("tujuanError")) @endif
                                </div> 
                            </div>
                        </div> 
                        <div class="col-6"> 
                            <div class="mb-xl-3 mb-sm-5 p-3 w-60"> 
                                <label for="statusPembayaran" class="form-label fs-4">Status Pembayaran</label>  
                                <select class="form-select" aria-label="Pilih Status Pembayaran" id="selectBoxStatusPembayaran" data-live-search="true" name="statusPembayaran">
                                    <option disabled @if (old("statusPembayaran") == null || old() == null) selected @endif value>Pilih Status Pembayaran</option>
                                    <option value="1" @if (old("statusPembayaran") == "1") selected @endif>Bayar Tujuan</option>
                                    <option value="2" @if (old("statusPembayaran") == "2") selected @endif>Lunas Kantor Pengirim</option>
                                    <option value="3" @if (old("statusPembayaran") == "3") selected @endif>Piutang</option> 
                                    <option value="4" @if (old("statusPembayaran") == "3") selected @endif>Lunas Kantor Tujuan</option> 
                                </select>
                                <div id="validationtujuan" class="invalid-feedback">
                                    @if (Session::has("statusPembayaranError")) @endif
                                </div> 
                            </div> 
                        </div> 
                        
                        <div class="col-6">
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
                                <label for="jenisDetail" class="form-label fs-4">Jenis (untuk manifest)</label>
                                <input type="text" class="form-control shadow-sm p-3" name="jenisDetail" id="jenisDetail" aria-describedby="jenisDetailText" placeholder="isi jenis (untuk manifest)" value="{!! old('jenisDetail') !!}">
                                <div id="validationjenisDetail" class="invalid-feedback">
                                    @if (Session::has("jenisDetailError")) @endif
                                </div>
                            </div>  
                        </div> 
                    </div>  
                </div> 
            </div> 
            
            <div class="col-12 m-1 rounded-2 justify-content-center shadow-sm text-dark">   
                <table id="tableId" class="display table table-hover table-responsive">
                    <thead>
                    <tr>
                        <th scope="col"><p class="text text-center">No</p></th>
                        <th scope="col"><p class="text text-center">Jumlah</p></th>
                        <th scope="col"><p class="text text-center">Code</p></th>
                        <th scope="col"><p class="text text-center">Jenis</p></th>
                        <th scope="col"><p class="text text-center">Biaya</p></th>
                        <th scope="col"><p class="text text-center">Panjang</p></th>
                        <th scope="col"><p class="text text-center">Lebar</p></th>
                        <th scope="col"><p class="text text-center">Tinggi</p></th>
                        <th scope="col"><p class="text text-center">Berat</p></th>
                    </tr>
                    </thead>
                    <tbody>
                    @for ($i = 0; $i < 7; $i++)
                        <tr>
                            <th scope="row">{{ $i + 1 }}</th>
                            @if (old() != null) 
                                <td>
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
                                </td>

                                {{-- formula --}}
                                <td>
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
                                </td>

                                {{-- formula --}}
                                <td>
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
            var jumlahBarang = $(this).find("#jumlahBarang"); 
            var biaya = $(this).find("#biaya");
            var kubikasiPanjang = $(this).find("#kubikasiPanjang");
            var kubikasiLebar = $(this).find("#kubikasiLebar");
            var kubikasiTinggi = $(this).find("#kubikasiTinggi");
            var kubikasiBerat = $(this).find("#kubikasiBerat");

            if(
                jenisBarang.val().length <= 0 
                && jumlahBarang.val().length <= 0 
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
            var statusPembayaran = $('#selectBoxStatusPembayaran').find(":selected").val();

            var jenisDetail = $("#jenisDetail").val();

            if(
                namaPengirim === ""
                || namaPengirim === undefined

                || nomorPengirim === ""
                || nomorPengirim === undefined

                || namaPenerima === ""
                || namaPenerima === undefined

                || jenisDetail === ""
                || jenisDetail === undefined
                
                || nomorPenerima === ""
                || nomorPenerima === undefined
                
                || tujuan === ""
                || statusPembayaran === ""
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
            var statusPembayaran = $('#selectBoxStatusPembayaran').find(":selected").val();

            var jenisDetail = $("#jenisDetail").val();

            if(
                namaPengirim === ""
                || namaPengirim === undefined

                || nomorPengirim === ""
                || nomorPengirim === undefined

                || namaPenerima === ""
                || namaPenerima === undefined

                || jenisDetail === ""
                || jenisDetail === undefined
                
                || nomorPenerima === ""
                || nomorPenerima === undefined
                
                || tujuan === ""
                || statusPembayaran === ""
            ){
                console.log("disabled");
                $( "#btnSubmit" ).prop( "disabled", true ); 
            }else{
                console.log("disabled false");
                $( "#btnSubmit" ).prop( "disabled", false ); 
            }
        }

        $(document).ready(function(){
            $("#overlayLoading").css("visibility", "hidden");  

            $('#tableId tbody').on('click', 'tr', disableSubmitButtonTable); 

            $('#tableId tbody').on('change', 'tr', disableSubmitButtonTable);
 
            $('#tableId tbody').on('change', 'tr #biaya', function () {
                var biaya = $(this).val();
                if(biaya !== ""){
                        // format number to Euro
                        let idr = Intl.NumberFormat('ID', {
                            style: 'currency',
                            currency: 'IDR',
                            currencySign: 'accounting',
                            // currencyDisplay: 'none',
                        }); 
                        $(this).attr("title", idr.format(biaya));
                    }else{
                        $(this).attr("title", "Biaya barang");
                    }
            }); 

            $("#namaPengirim").change(disableSubmitButton);
            $("#nomorPengirim").change(disableSubmitButton);
            $("#namaPenerima").change(disableSubmitButton);
            $("#nomorPenerima").change(disableSubmitButton);
            $("#jenisDetail").change(disableSubmitButton);

            $('#selectBoxTujuan').change(function (e) { 
                disableSubmitButton();
            });
            $('#selectBoxStatusPembayaran').change(function (e) { 
                disableSubmitButton();
            });
        });
    </script>
@endsection