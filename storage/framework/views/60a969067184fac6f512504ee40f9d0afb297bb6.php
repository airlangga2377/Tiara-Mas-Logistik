<?php $__env->startSection("preload"); ?>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-rc.0/css/select2.css" integrity="sha512-PO7TIdn2hPTkZ6DSc5eN2DyMpTn/ZixXUQMDLUx+O5d7zGy0h1Th5jgYt84DXvMRhF3N0Ucfd7snCyzlJbAHQA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-rc.0/js/select2.full.js" integrity="sha512-Gu2OIWdShncC2h0KqZMOrDWTR0okm7pXBU3M1HuedqlVCDgMbz9BCQWx2AV72pvDAbPhyP9qR7hjk6pUXXj1xg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        
    
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    
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
            <li class="breadcrumb-item active" aria-current="page">Pengiriman Bus</li>
        </ol>
    </nav> <br> <br>
    <form action="<?php echo e(url("/barang/bus/insert")); ?>" method="post">
        <?php echo e(csrf_field()); ?>

        <div class="row justify-content-between d-flex g-3">
            <?php if(Session::has("message")): ?> 
                <div class="fs-5 alert alert-success bg-success text-white border-0 text-center" role="alert" id="toggleStatusPengiriman">
                    <?php echo Session::get("message"); ?> 
                    <script>
                        window.open("http://127.0.0.1:8000/barang/bus/print/resi?no_lmt=<?php echo Session::get('no_lmt'); ?>", "_blank")
                    </script>
                </div>
            <?php endif; ?> 
            <label class="text-wrap g-5 border-bottom" id="pengiriman"><h2>IDENTITAS PENGIRIM</h2></label>
                
                <?php if($errors->any()): ?>
                    <div class="fs-5 alert alert-danger bg-danger text-white border-0 text-center" role="alert">
                        <?php echo $errors->first(); ?>

                    </div>
                <?php endif; ?>
                <div class="row justify-content-between d-flex g-1">
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
            </div>
            <label class="text-wrap g-5 border-bottom" id="pengiriman"><h2>IDENTITAS PENERIMA</h2></label>
                <div class="row justify-content-between d-flex g-1">
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
                                <div id="validationNomorPenerima" class="invalid-feedback">
                                    <?php if(Session::has("nomorPenerimaError")): ?> <?php endif; ?>
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
                        
                        <?php if($isUserSuperadmin): ?>
                            <div class="col">
                                <div class="mb-xl-3 mb-sm-5">                             
                                    <label for="pickup" class="form-label fs-4">Asal Barang</label>
                                    <select type="option" id="pickup" class="form-control select-pickup shadow-sm p-3" name="asal" id="pickup" aria-describedby="pickupText" value="<?php echo old('pickup'); ?>">
                                        <option value="" disabled selected>Silahkan Pilih Asal</option>
                                        <?php $__currentLoopData = $allWilayah; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $wilayah): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($kodeKota->wilayah != $wilayah->wilayah || $isUserSuperadmin): ?> <option value="<?php echo e($wilayah->id_kode_kota); ?>" <?php if(old("id_kode_kota_asal") == $wilayah->wilayah): ?> selected <?php endif; ?>><?php echo e(ucfirst($wilayah->wilayah)); ?></option> <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <div id="validationpickup" class="invalid-feedback">
                                        <?php if(Session::has("pickupError")): ?> <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                        <div class="col">
                            <div class="mb-xl-3 mb-sm-5">
                                <label for="dropoff" class="form-label fs-4">Tujuan Barang <?php echo e($kodeKota->wilayah); ?></label>
                                <select type="option" id="dropoff" class="form-control" name="tujuan" id="tujuanBarang" aria-describedby="tujuanBarangText" value="<?php echo old('tujuanBarang'); ?>">
                                    <option value="">Silahkan Pilih Tujuan</option>
                                    <?php $__currentLoopData = $allWilayah; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $wilayah): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($kodeKota->wilayah != $wilayah->wilayah || $isUserSuperadmin): ?> <option value="<?php echo e($wilayah->id_kode_kota); ?>" <?php if(old("id_kode_kota_tujuan") == $wilayah->wilayah): ?> selected <?php endif; ?>><?php echo e(ucfirst($wilayah->wilayah)); ?></option> <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <div id="validationTujuanBarang" class="invalid-feedback">
                                    <?php if(Session::has("tujuanBarangError")): ?> <?php endif; ?>
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
                                <input type="text" class="form-control shadow-sm p-3" name="keterangan" id="keterangan" aria-describedby="keteranganText" placeholder="isi keterangan" value="<?php echo old('keterangan'); ?>">                                
                                <div id="validationKeterangan" class="invalid-feedback">
                                    <?php if(Session::has("keteranganError")): ?> <?php endif; ?>
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
                                <?php if(Session::has("statusPembayaranError")): ?> <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
        <?php for($i = 0; $i < 1; $i++): ?><br>
                <label class="text-wrap g-5 border-bottom" id="pengiriman"><h2>INFORMASI BARANG </h2></label>
                <?php if(old() != null): ?>
                    <div class="row justify-content-between d-flex g-1">
                        <div class="row align-items-start py-1">
                            <div class="col">
                                <div class="mb-xl-3 mb-sm-5">
                                    <label for="tipePaket" class="form-label fs-4">Pilih Tipe Paket</label>                                                                            
                                    <select class="form-select shadow-sm p-3" name="jenisPaket" id="tipePaket" aria-describedby="tipePaketText" value="<?php echo old('tipePaket')[$i]; ?>">                                        
                                            <option value="barang">Barang</option>
                                            <option value="dokumen">Dokumen</option>
                                            <option value="cairan">Cairan</option>
                                    </select>
                                    <div id="validationTipePaket" class="invalid-feedback">
                                        <?php if(Session::has("tipePaketError")): ?> <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-xl-3 mb-sm-5">
                                    <label for="jenisBarang" class="form-label fs-4">Jenis Barang</label>
                                    <input type="text" class="form-control shadow-sm p-3" name="jenisBarang[]" id="jenisBarang" aria-describedby="jenisBarangText" placeholder="isi jenis barang" value="<?php echo old('jenisBarang')[$i]; ?>">
                                    <div id="validationJenisBarang" class="invalid-feedback">
                                        <?php if(Session::has("jenisBarangError")): ?> <?php endif; ?>
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
                                    <input type="text" class="form-control shadow-sm p-3" name="berat[]" id="kubikasiBerat" aria-describedby="kubikasiBeratText" placeholder="isi berat" data-toggle="tooltip" data-placement="top" title="Berat Barang" value="<?php echo old('berat')[$i]; ?>">
                                    <div id="validationBerat" class="invalid-feedback">
                                        <?php if(Session::has("beratError")): ?> <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-xl-3 mb-sm-5">
                                    <label for="jumlahBarang" class="form-label fs-4">Jumlah Barang</label>
                                    <input type="number" class="form-control shadow-sm p-3" name="jumlahBarang" id="jumlahBarang" aria-describedby="jumlahBarangText" placeholder="isi jumlah barang" value="<?php echo old('jumlahBarang')[$i]; ?>">
                                    <div id="validationJumlahBarang" class="invalid-feedback">
                                        <?php if(Session::has("jumlahBarangError")): ?> <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-xl-3 mb-sm-5">
                                    <label for="panjangBarang" class="form-label fs-4">Panjang</label>
                                    <input type="text" class="form-control shadow-sm p-3" name="panjangBarang[]" id="panjangBarang" aria-describedby="panjangBarangText" placeholder="isi panjang barang" value="<?php echo old('panjangBarang')[$i]; ?>">
                                    <div id="validationPanjangBarang" class="invalid-feedback">
                                        <?php if(Session::has("panjangBarangError")): ?> <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-xl-3 mb-sm-5">
                                    <label for="lebarBarang" class="form-label fs-4">Lebar</label>
                                    <input type="text" class="form-control shadow-sm p-3" name="lebarBarang[]" id="lebarBarang" aria-describedby="lebarBarangText" placeholder="isi lebar barang" value="<?php echo old('lebarBarang')[$i]; ?>">
                                    <div id="validationLebarBarang" class="invalid-feedback">
                                        <?php if(Session::has("lebarBarangError")): ?> <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                    <div class="mb-xl-3 mb-sm-5">
                                        <label for="tinggiBarang" class="form-label fs-4">Tinggi</label>
                                        <input type="text" class="form-control shadow-sm p-3" name="tinggiBarang[]" id="tinggiBarang" aria-describedby="tinggiBarangText" placeholder="isi tinggi barang" value="<?php echo old('tinggiBarang')[$i]; ?>">
                                        <div id="validationTinggiBarang" class="invalid-feedback">
                                            <?php if(Session::has("tinggiBarangError")): ?> <?php endif; ?>
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
                                    <input type="text" class="form-control shadow-sm p-3" name="biaya[]" id="biaya" aria-describedby="biayaText" placeholder="isi biaya" value="<?php echo old('biaya')[$i]; ?>">
                                    <div id="validationBiayaBarang" class="invalid-feedback">
                                        <?php if(Session::has("biayaBarangError")): ?> <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php else: ?>
                <div class="row justify-content-between d-flex g-1">
                    <div class="row align-items-start py-1">
                        <div class="col">
                            <div class="mb-xl-3 mb-sm-5">
                                <label for="tipePaket" class="form-label fs-4">Pilih Tipe Paket</label>                                                                            
                                <select class="form-select shadow-sm p-3" name="jenisPaket" id="tipePaket" aria-describedby="tipePaketText" value="">                                        
                                        <option value="barang">Barang</option>
                                        <option value="dokumen">Dokumen</option>
                                        <option value="cairan">Cairan</option>
                                </select>
                                <div id="validationTipePaket" class="invalid-feedback">
                                    <?php if(Session::has("tipePaketError")): ?> <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-xl-3 mb-sm-5">
                                <label for="jenisBarang" class="form-label fs-4">Jenis Barang</label>
                                <input type="text" class="form-control shadow-sm p-3" name="jenisBarang[]" id="jenisBarang" aria-describedby="jenisBarangText" placeholder="isi jenis barang" value="">
                                <div id="validationJenisBarang" class="invalid-feedback">
                                    <?php if(Session::has("jenisBarangError")): ?> <?php endif; ?>
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
                                    <?php if(Session::has("beratError")): ?> <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-xl-3 mb-sm-5">
                                <label for="jumlahBarang" class="form-label fs-4">Jumlah Barang</label>
                                <input type="number" class="form-control shadow-sm p-3" name="jumlahBarang" id="jumlahBarang" aria-describedby="jumlahBarangText" placeholder="isi jumlah barang" value="">                            
                                <div id="validationJumlahBarang" class="invalid-feedback">
                                    <?php if(Session::has("jumlahBarangError")): ?> <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-xl-3 mb-sm-5">
                                <label for="panjangBarang" class="form-label fs-4">Panjang</label>
                                <input type="text" class="form-control shadow-sm p-3" name="panjangBarang[]" id="panjangBarang" aria-describedby="panjangBarangText" placeholder="isi panjang barang" value="">
                                <div id="validationPanjangBarang" class="invalid-feedback">
                                    <?php if(Session::has("panjangBarangError")): ?> <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-xl-3 mb-sm-5">
                                <label for="lebarBarang" class="form-label fs-4">Lebar</label>
                                <input type="text" class="form-control shadow-sm p-3" name="lebarBarang[]" id="lebarBarang" aria-describedby="lebarBarangText" placeholder="isi lebar barang" value="">
                                <div id="validationLebarBarang" class="invalid-feedback">
                                    <?php if(Session::has("lebarBarangError")): ?> <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-xl-3 mb-sm-5">
                                <label for="tinggiBarang" class="form-label fs-4">Tinggi</label>
                                <input type="text" class="form-control shadow-sm p-3" name="tinggiBarang[]" id="tinggiBarang" aria-describedby="tinggiBarangText" placeholder="isi tinggi barang" value="">
                                <div id="validationTinggiBarang" class="invalid-feedback">
                                    <?php if(Session::has("tinggiBarangError")): ?> <?php endif; ?>
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
                                    <?php if(Session::has("biayaBarangError")): ?> <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        <?php endif; ?>
        <?php endfor; ?>
        <button type="submit" class="btn btn-primary" id="btnSubmit">Tambah Pengiriman</button>
</form>
<?php $__env->stopSection(); ?>

<?php $__env->startSection("footer"); ?>
<div class="container">
    <?php echo $__env->make("layouts.footerAdmin", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div> 
<?php $__env->stopSection(); ?>

<?php $__env->startSection("script-body-bottom"); ?>

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
<?php $__env->stopSection(); ?> 
<?php echo $__env->make("layouts.app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Kargo Website\resources\views/page/admin/bus/CargoPengirimanBus.blade.php ENDPATH**/ ?>