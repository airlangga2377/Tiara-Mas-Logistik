<?php $__env->startSection("preload"); ?>
    
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>  

    
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> 
<?php $__env->stopSection(); ?>

<?php $__env->startSection("title"); ?> 
    <title>Cargo aja</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection("top-nav-bar"); ?>
<nav class="navbar navbar-light shadow-sm"> 
    <div class="container-fluid"> 
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="dropdown">
            <a class="ms-2 me-2 fs-5 text-dark text-decoration-none" href="<?php echo e(url("home")); ?>">Beranda</a>
            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                <?php echo e($name); ?>

            </button>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="<?php echo e(url("logout")); ?>">Keluar</a></li> 
            </ul>
        </div>

        <div class="offcanvas offcanvas-start text-bg-light" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
            <div class="offcanvas-header">    
                
                <button type="button" class="btn-close offcanvas-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body"> 
                <div class="list-group list-group-flush"> 
                    <a role="button" class="fs-5 fw-bold list-group-item list-group-item-action" href="<?php echo e(url("barang")); ?>">Barang</a>  
                    <a role="button" class="fs-5 list-group-item list-group-item-action" href="<?php echo e(url("barang/pengiriman#pengiriman")); ?>">Pengiriman</a>
                </div>
            </div>
        </div> 
    </div>
</nav> 
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

    <form action="<?php echo e(url("barang/insert/truk")); ?>" method="post">
        <?php echo csrf_field(); ?>  
        <div class="row justify-content-between d-flex g-3"> 
            <label class="text-wrap fs-3 mb-2 text-center" id="pengiriman">Pengisian Pengiriman Truk</label>
            <div class="col-12 m-1 py-2 rounded-2 justify-content-center shadow-sm bg-dark text-light">    
                
                <?php if($errors->any()): ?>
                    <div class="fs-5 alert alert-danger bg-danger text-white border-0 text-center" role="alert">
                        <?php echo $errors->first(); ?>

                    </div>
                <?php endif; ?>

                <?php if(Session::has("message")): ?> 
                    <div class="fs-5 alert alert-success bg-success text-white border-0 text-center" role="alert" id="toggleStatusPengiriman">
                        <?php echo Session::get("message"); ?>

                    </div>
                <?php endif; ?> 
                
                <div class="row mb-3 justify-content-center ">  
                    <div class="row align-items-start py-1">
                        <div class="col">
                            <div class="mb-xl-3 mb-sm-5">
                                <label for="namaPengirim" class="form-label fs-4">Nama Pengirim</label>
                                <input type="text" class="form-control shadow-sm p-3" name="namaPengirim" id="namaPengirim" aria-describedby="namaPengirimText" placeholder="isi nama pengirim" value="<?php echo old('namaPengirim'); ?>">
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
            
            <div class="col-12 m-1 rounded-2 justify-content-center shadow-sm text-dark">   
                <table id="tableId" class="display table table-hover table-responsive">
                    <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Jenis Barang</th>
                        <th scope="col">Jumlah Barang</th>
                        <th scope="col">Keterangan</th>
                        <th scope="col">Biaya</th>
                        <th scope="col">Panjang</th>
                        <th scope="col">Lebar</th>
                        <th scope="col">Tinggi</th>
                        <th scope="col">Berat</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php for($i = 0; $i < 7; $i++): ?>
                        <tr>
                            <th scope="row"><?php echo e($i + 1); ?></th>
                            <?php if(old() != null): ?> 
                                <td>
                                    <input type="text" class="form-control" aria-label="Pilih Barang" id="jenisBarang" name="jenisBarang[]" value="<?php echo old('jenisBarang')[$i]; ?>" aria-describedby="jenisBarangText" placeholder="isi jenis barang"/>
                                </td>
                                <td>
                                    <input type="number" class="form-control" aria-label="Jumlah Barang" id="jumlahBarang" name="jumlahBarang[]" value="<?php echo old('jumlahBarang')[$i]; ?>" aria-describedby="jumlahBarangText" placeholder="isi jumlah barang">
                                </td>
                                <td>
                                    <input type="text" class="form-control" aria-label="keterangan" id="keterangan" name="keterangan[]" value="<?php echo old('keterangan')[$i]; ?>" aria-describedby="keteranganText" placeholder="isi keterangan">
                                </td>
                                <td>
                                    <input type="text" class="form-control" aria-label="biaya" id="biaya" name="biaya[]" value="<?php echo old('biaya')[$i]; ?>" aria-describedby="biayaText" placeholder="isi biaya">
                                </td>

                                
                                <td>
                                    <input type="text" class="form-control" name="kubikasiPanjang[]" value="<?php echo old('kubikasiPanjang')[$i]; ?>" id="kubikasiPanjang" aria-describedby="kubikasiPanjangText" placeholder="isi panjang">
                                </td> 
                                <td>
                                    <input type="text" class="form-control" name="kubikasiLebar[]" value="<?php echo old('kubikasiLebar')[$i]; ?>" id="kubikasiLebar" aria-describedby="kubikasiLebarText" placeholder="isi lebar">
                                </td> 
                                <td>
                                    <input type="text" class="form-control" name="kubikasiTinggi[]" value="<?php echo old('kubikasiTinggi')[$i]; ?>" id="kubikasiTinggi" aria-describedby="kubikasiTinggiText" placeholder="isi tinggi">
                                </td> 
                                <td>
                                    <input type="text" class="form-control" name="berat[]" value="<?php echo old('berat')[$i]; ?>" id="kubikasiBerat" aria-describedby="kubikasiBeratText" placeholder="isi berat">
                                </td>  
                            <?php else: ?> 
                                <td>
                                    <input type="text" class="form-control" aria-label="Pilih Barang" id="jenisBarang" name="jenisBarang[]" value="" aria-describedby="jenisBarangText" placeholder="isi jenis barang"/>
                                </td>
                                <td>
                                    <input type="number" class="form-control" aria-label="Jumlah Barang" id="jumlahBarang" name="jumlahBarang[]" value="" aria-describedby="jumlahBarangText" placeholder="isi jumlah barang">
                                </td>
                                <td>
                                    <input type="text" class="form-control" aria-label="keterangan" id="keterangan" name="keterangan[]" value="" aria-describedby="keteranganText" placeholder="isi keterangan">
                                </td>
                                <td>
                                    <input type="text" class="form-control" aria-label="biaya" id="biaya" name="biaya[]" value="" aria-describedby="biayaText" placeholder="isi biaya">
                                </td>

                                
                                <td>
                                    <input type="text" class="form-control" name="kubikasiPanjang[]" value="" id="kubikasiPanjang" aria-describedby="kubikasiPanjangText" placeholder="isi panjang">
                                </td> 
                                <td>
                                    <input type="text" class="form-control" name="kubikasiLebar[]" value="" id="kubikasiLebar" aria-describedby="kubikasiLebarText" placeholder="isi lebar">
                                </td> 
                                <td>
                                    <input type="text" class="form-control" name="kubikasiTinggi[]" value="" id="kubikasiTinggi" aria-describedby="kubikasiTinggiText" placeholder="isi tinggi">
                                </td> 
                                <td>
                                    <input type="text" class="form-control" name="berat[]" value="" id="kubikasiBerat" aria-describedby="kubikasiBeratText" placeholder="isi berat">
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

        $(document).ready(function(){
            $("#overlayLoading").css("visibility", "hidden");  

            $('#tableId tbody').on('click', 'tr', function () {
                $( "#btnSubmit" ).prop( "disabled", true ); 

                var jenisBarang = $(this).find("#jenisBarang");
                var jumlahBarang = $(this).find("#jumlahBarang");
                var keterangan = $(this).find("#keterangan");
                var biaya = $(this).find("#biaya");
                var kubikasiPanjang = $(this).find("#kubikasiPanjang");
                var kubikasiLebar = $(this).find("#kubikasiLebar");
                var kubikasiTinggi = $(this).find("#kubikasiTinggi");
                var kubikasiBerat = $(this).find("#kubikasiBerat");
                
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
            }); 

            $('#tableId tbody').on('change', 'tr', function () {
                var jenisBarang = $(this).find("#jenisBarang");
                var jumlahBarang = $(this).find("#jumlahBarang");
                var keterangan = $(this).find("#keterangan");
                var biaya = $(this).find("#biaya");
                var kubikasiPanjang = $(this).find("#kubikasiPanjang");
                var kubikasiLebar = $(this).find("#kubikasiLebar");
                var kubikasiTinggi = $(this).find("#kubikasiTinggi");
                var kubikasiBerat = $(this).find("#kubikasiBerat");
                
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
            });  

            $( "#toggleStatusPengiriman" ).toggle( 3000);
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts.app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\agi\Desktop\kerja\Kargo Website\resources\views/page/admin/CargoPengirimanBarang.blade.php ENDPATH**/ ?>