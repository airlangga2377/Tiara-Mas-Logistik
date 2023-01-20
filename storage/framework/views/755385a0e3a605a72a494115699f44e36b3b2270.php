<?php $__env->startSection("preload"); ?>
    
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>  

    
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> 
<?php $__env->stopSection(); ?>

<?php $__env->startSection("title"); ?> 
    <title>Cargo aja</title>
<?php $__env->stopSection(); ?> 

<?php $__env->startSection('top-nav-bar'); ?> 
    <?php echo $__env->make('layouts.loggednav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection("content"); ?>  
<div class="container">  
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo e(url("home")); ?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?php echo e(url("barang")); ?>">Barang</a></li>
            <li class="breadcrumb-item active" aria-current="page">Pengiriman</li>
        </ol>
    </nav>

    <form action="<?php echo e(url("barang/truk/insert")); ?>" method="post">
        <?php echo csrf_field(); ?>  
        <div class="row justify-content-center align-items-center g-2">
            <div class="col">
                <p class="fs-1 text text-center" id="pengiriman">Input Pengiriman Truk</p>
            </div> 
        </div>
        <div class="row justify-content-between d-flex g-3">  
            <div class="col-12 m-1 py-2 rounded-2 justify-content-center shadow-sm bg-dark text-light">    
                
                <?php if($errors->any()): ?>
                    <div class="fs-5 alert alert-danger bg-danger text-white border-0 text-center" role="alert">
                        <?php echo $errors->first(); ?>

                    </div>
                <?php endif; ?>

                <?php if(Session::has("message")): ?> 
                    <div class="fs-5 alert alert-success bg-success text-white border-0 text-center" role="alert" id="toggleStatusPengiriman">
                        <?php echo Session::get("message"); ?> 
                        <script>
                            window.open("http://127.0.0.1:8000/barang/truk/print/deliverynote?no_lmt=<?php echo Session::get('no_lmt'); ?>", "_blank")
                        </script>
                    </div>
                <?php endif; ?> 
                
                <div class="row mb-3 justify-content-center ">  
                    <div class="row align-items-start py-1">
                        <div class="col">
                            <div class="mb-xl-3 mb-sm-5">
                                <label for="namaPengirim" class="form-label fs-4">Nama Pengirim</label>
                                <input type="text" class="form-control shadow-sm p-3" name="namaPengirim" id="namaPengirim" aria-describedby="namaPengirimText" placeholder="isi nama pengirim" value="<?php if($errors->any()): ?> <?php echo old('namaPengirim'); ?> <?php endif; ?>">
                                <div id="validationNamaPengirim" class="invalid-feedback">
                                    <?php if(Session::has("namaPengirimError")): ?> <?php endif; ?>
                                </div>
                            </div> 
                        </div>
                        <div class="col">
                            <div class="mb-xl-3 mb-sm-5">
                                <label for="nomorPengirim" class="form-label fs-4">Tlp Pengirim</label>
                                <input type="text" class="form-control shadow-sm p-3" name="nomorPengirim" id="nomorPengirim" aria-describedby="nomorPengirimText" placeholder="isi nomor pengirim" value="<?php echo old('nomorPengirim'); ?>">
                                <div id="validationNamaPengirim" class="invalid-feedback">
                                    <?php if(Session::has("nomorPengirimError")): ?> <?php endif; ?>
                                </div>
                            </div> 
                        </div> 
                    </div>  
    
                    <div class="row align-items-start py-1">
                        <div class="col">
                            <div class="mb-xl-3 mb-sm-5">
                                <label for="namaPenerima" class="form-label fs-4">Nama Penerima</label>
                                <input type="text" class="form-control shadow-sm p-3" name="namaPenerima" id="namaPenerima" aria-describedby="namaPenerimaText" placeholder="isi nama penerima" value="<?php echo old('namaPenerima'); ?>">
                                <div id="validationNamaPenerima" class="invalid-feedback">
                                    <?php if(Session::has("namaPenerimaError")): ?> <?php endif; ?>
                                </div>
                            </div>  
                        </div> 
                        <div class="col">
                            <div class="mb-xl-3 mb-sm-5">
                                <label for="nomorPenerima" class="form-label fs-4">Tlp Penerima</label>
                                <input type="text" class="form-control shadow-sm p-3" name="nomorPenerima" id="nomorPenerima" aria-describedby="nomorPenerimaText" placeholder="isi nomor penerima" value="<?php echo old('nomorPenerima'); ?>">
                                <div id="validationNamaPenerima" class="invalid-feedback">
                                    <?php if(Session::has("nomorPenerimaError")): ?> <?php endif; ?>
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
                                    <option disabled <?php if(old("tujuan") == null || old() == null): ?> selected <?php endif; ?> value>Semua Tujuan</option>
                                    <option value="taliwang" <?php if(old("tujuan") == "taliwang"): ?> selected <?php endif; ?>>Taliwang</option>
                                    <option value="bima" <?php if(old("tujuan") == "bima"): ?> selected <?php endif; ?>>Bima</option>
                                    <option value="sumbawa" <?php if(old("tujuan") == "sumbawa"): ?> selected <?php endif; ?>>Sumbawa</option>
                                    <option value="mataram" <?php if(old("tujuan") == "mataram"): ?> selected <?php endif; ?>>Mataram</option>
                                </select>
                                <div id="validationtujuan" class="invalid-feedback">
                                    <?php if(Session::has("tujuanError")): ?> <?php endif; ?>
                                </div> 
                            </div>
                        </div> 
                        <div class="col-6"> 
                            <div class="mb-xl-3 mb-sm-5 p-3 w-60"> 
                                <label for="statusPembayaran" class="form-label fs-4">Status Pembayaran</label>  
                                <select class="form-select" aria-label="Pilih Status Pembayaran" id="selectBoxStatusPembayaran" data-live-search="true" name="statusPembayaran">
                                    <option disabled <?php if(old("statusPembayaran") == null || old() == null): ?> selected <?php endif; ?> value>Pilih Status Pembayaran</option>
                                    <option value="1" <?php if(old("statusPembayaran") == "1"): ?> selected <?php endif; ?>>Bayar Tujuan</option>
                                    <option value="2" <?php if(old("statusPembayaran") == "2"): ?> selected <?php endif; ?>>Lunas Kantor Surabaya</option>
                                    <option value="3" <?php if(old("statusPembayaran") == "3"): ?> selected <?php endif; ?>>Piutang</option> 
                                </select>
                                <div id="validationtujuan" class="invalid-feedback">
                                    <?php if(Session::has("statusPembayaranError")): ?> <?php endif; ?>
                                </div> 
                            </div> 
                        </div> 
                        
                        <div class="col-6">
                            <div class="mb-xl-3 mb-sm-5">
                                <label for="keterangan" class="form-label fs-4">Keterangan</label>
                                <input type="text" class="form-control shadow-sm p-3" name="keterangan" id="keterangan" aria-describedby="keteranganText" placeholder="isi keterangan" value="<?php echo old('keterangan'); ?>">
                                <div id="validationKeterangan" class="invalid-feedback">
                                    <?php if(Session::has("keteranganError")): ?> <?php endif; ?>
                                </div>
                            </div>  
                        </div> 
                        <div class="col">
                            <div class="mb-xl-3 mb-sm-5">
                                <label for="jenisDetail" class="form-label fs-4">Jenis (untuk manifest)</label>
                                <input type="text" class="form-control shadow-sm p-3" name="jenisDetail" id="jenisDetail" aria-describedby="jenisDetailText" placeholder="isi jenis (untuk manifest)" value="<?php echo old('jenisDetail'); ?>">
                                <div id="validationjenisDetail" class="invalid-feedback">
                                    <?php if(Session::has("jenisDetailError")): ?> <?php endif; ?>
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
                    <?php for($i = 0; $i < 7; $i++): ?>
                        <tr>
                            <th scope="row"><?php echo e($i + 1); ?></th>
                            <?php if(old() != null): ?> 
                                <td>
                                    <input type="number" class="form-control fs-6" aria-label="Jumlah Barang" id="jumlahBarang" name="jumlahBarang[]" value="<?php echo old('jumlahBarang')[$i]; ?>" aria-describedby="jumlahBarangText" placeholder="isi jumlah barang" data-toggle="tooltip" data-placement="top" title="Jumlah Barang">
                                </td>
                                <td>
                                    <input type="text" class="form-control fs-6" aria-label="Code Satuan" id="Code Satuan" name="code[]" value="<?php echo old('code')[$i]; ?>" aria-describedby="codeText" placeholder="isi code satuan" data-toggle="tooltip" data-placement="top" title="Code Satuan Barang">
                                </td>
                                <td>
                                    <input type="text" class="form-control fs-6" aria-label="Pilih Barang" id="jenisBarang" name="jenisBarang[]" value="<?php echo old('jenisBarang')[$i]; ?>" aria-describedby="jenisBarangText" placeholder="isi jenis barang" data-toggle="tooltip" data-placement="top" title="Jenis Barang">
                                </td>
                                <td>
                                    <input type="text" class="form-control fs-6" aria-label="biaya" id="biaya" name="biaya[]" value="<?php echo old('biaya')[$i]; ?>" aria-describedby="biayaText" placeholder="isi biaya" data-toggle="tooltip" data-placement="top" title="Biaya Barang">
                                </td>

                                
                                <td>
                                    <input type="text" class="form-control fs-6" name="kubikasiPanjang[]" value="<?php echo old('kubikasiPanjang')[$i]; ?>" id="kubikasiPanjang" aria-describedby="kubikasiPanjangText" placeholder="isi panjang" data-toggle="tooltip" data-placement="top" title="Panjang Barang">
                                </td> 
                                <td>
                                    <input type="text" class="form-control fs-6" name="kubikasiLebar[]" value="<?php echo old('kubikasiLebar')[$i]; ?>" id="kubikasiLebar" aria-describedby="kubikasiLebarText" placeholder="isi lebar" data-toggle="tooltip" data-placement="top" title="Lebar Barang">
                                </td> 
                                <td>
                                    <input type="text" class="form-control fs-6" name="kubikasiTinggi[]" value="<?php echo old('kubikasiTinggi')[$i]; ?>" id="kubikasiTinggi" aria-describedby="kubikasiTinggiText" placeholder="isi tinggi" data-toggle="tooltip" data-placement="top" title="Tinggi Barang">
                                </td> 
                                <td>
                                    <input type="text" class="form-control fs-6" name="berat[]" value="<?php echo old('berat')[$i]; ?>" id="kubikasiBerat" aria-describedby="kubikasiBeratText" placeholder="isi berat" data-toggle="tooltip" data-placement="top" title="Berat Barang">
                                </td>  
                            <?php else: ?> 
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
                            <?php endif; ?>
                        </tr> 
                    <?php endfor; ?> 
                    </tbody>
                </table>
            </div>  

            <button type="submit" class="btn btn-success mt-2 fs-5 mh-30" id="btnSubmit" disabled>Tambah Pengiriman</button>
        </div>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection("footer"); ?>
    <?php echo $__env->make("layouts.footerAdmin", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
<?php $__env->stopSection(); ?>

<?php $__env->startSection("script-body-bottom"); ?>  
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts.app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Agi\Desktop\Kerja\Kargo Website\resources\views/page/admin/CargoPengirimanTruk.blade.php ENDPATH**/ ?>