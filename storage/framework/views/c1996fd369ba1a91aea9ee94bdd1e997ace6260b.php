<?php $__env->startSection('preload'); ?>  
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('title'); ?> 
    <title>Cargo aja | Pengiriman</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('top-nav-bar'); ?> 
<nav class="navbar navbar-light shadow-sm"> 
    <div class="container-fluid"> 
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="dropdown">
            <a class="ms-2 me-2 fs-5 text-dark text-decoration-none" href="<?php echo e(url('home')); ?>">Beranda</a>
            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                <?php echo e($name); ?>

            </button>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="<?php echo e(url('logout')); ?>">Keluar</a></li> 
            </ul>
        </div>

        <div class="offcanvas offcanvas-start text-bg-light" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
            <div class="offcanvas-header">    
                
                <button type="button" class="btn-close offcanvas-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body"> 
                <div class="list-group list-group-flush"> 
                    <a role="button" class="fs-5 fw-bold list-group-item list-group-item-action" href="<?php echo e(url('barang')); ?>">Barang</a>  
                    <a role="button" class="fs-5 list-group-item list-group-item-action" href="<?php echo e(url('barang/pengiriman')); ?>">Pengiriman</a>
                </div>
            </div>
        </div> 
    </div>
</nav>  
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>  

<div class="container">  
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo e(url('home')); ?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?php echo e(url('barang')); ?>">Barang</a></li>
            <li class="breadcrumb-item active" aria-current="page">Pengiriman</li>
        </ol>
    </nav>

    <form action="<?php echo e(url('barang/pengiriman/insert')); ?>" method="post">
        <?php echo csrf_field(); ?>  
        <div class="row justify-content-between d-flex g-3"> 
            <div class="text-wrap fs-3 mb-2 text-center" id="pengiriman">Pengiriman</div>
            <div class="col-xl-5 col-sm-5 m-1 py-2 border border-dark rounded-2 justify-content-center shadow-sm">   
                
                <?php if($errors->any()): ?>
                    <div class="fs-5 alert alert-danger bg-danger text-white border-0" role="alert">
                        <?php echo $errors->first(); ?>

                    </div>
                <?php endif; ?>

                <?php if(Session::has('message')): ?>
                    <div class="fs-5 alert alert-success bg-success text-white border-0" role="alert">
                        <?php echo Session::get('message'); ?>

                    </div>
                <?php endif; ?> 
                
                <div class="row mb-3 justify-content-center">  
                    <div class="row align-items-start py-1">
                        <div class="col">
                            <div class="mb-xl-3 mb-sm-5">
                                <label for="namaPengirim" class="form-label fs-4">Nama Pengirim</label>
                                <input type="text" class="form-control shadow-sm p-3 <?php if($errors->any()): ?> is-invalid <?php endif; ?>" name="namaPengirim" id="namaPengirim" aria-describedby="namaPengirimText" placeholder="isi nama pengirim">
                                <div id="validationNamaPengirim" class="invalid-feedback">
                                    <?php if(Session::has('namaPengirimError')): ?> <?php endif; ?>
                                </div>
                            </div> 
                        </div>
                        <div class="col">
                            <div class="mb-xl-3 mb-sm-5">
                                <label for="nomorPengirim" class="form-label fs-4">Nomor Pengirim</label>
                                <input type="number" class="form-control shadow-sm p-3 <?php if($errors->any()): ?> is-invalid <?php endif; ?>" name="nomorPengirim" id="nomorPengirim" aria-describedby="nomorPengirimText" placeholder="isi nomor pengirim">
                                <div id="validationNamaPengirim" class="invalid-feedback">
                                    <?php if(Session::has('nomorPengirimError')): ?> <?php endif; ?>
                                </div>
                            </div> 
                        </div> 
                    </div>  
    
                    <div class="row align-items-start py-1">
                        <div class="col">
                            <div class="mb-xl-3 mb-sm-5">
                                <label for="namaPenerima" class="form-label fs-4">Nama Penerima</label>
                                <input type="text" class="form-control shadow-sm p-3 <?php if($errors->any()): ?> is-invalid <?php endif; ?>" name="namaPenerima" id="namaPenerima" aria-describedby="namaPenerimaText" placeholder="isi nama penerima">
                                <div id="validationNamaPenerima" class="invalid-feedback">
                                    <?php if(Session::has('namaPenerimaError')): ?> <?php endif; ?>
                                </div>
                            </div>  
                        </div> 
                        <div class="col">
                            <div class="mb-xl-3 mb-sm-5">
                                <label for="nomorPenerima" class="form-label fs-4">Nomor Penerima</label>
                                <input type="number" class="form-control shadow-sm p-3 <?php if($errors->any()): ?> is-invalid <?php endif; ?>" name="nomorPenerima" id="nomorPenerima" aria-describedby="nomorPenerimaText" placeholder="isi nomor penerima">
                                <div id="validationNamaPenerima" class="invalid-feedback">
                                    <?php if(Session::has('nomorPenerimaError')): ?> <?php endif; ?>
                                </div>
                            </div>  
                        </div> 
                    </div>  
                </div>

                <div class="row justify-content-center align-items-center g-2">
                    <div class="mb-xl-3 mb-sm-5">
                        <label for="tujuan" class="form-label fs-4">Tujuan</label> 
                        
                        <select class="form-select <?php if($errors->any()): ?> is-invalid <?php endif; ?>" aria-label="Pilih tujuan" id="select_box_tujuan" data-live-search="true" name="tujuan">
                            <option disabled selected value>Semua Tujuan</option>
                            <option value="kaliwang">Kaliwang</option>
                            <option value="bima">Bima</option>
                            <option value="sumbawa">Sumbawa</option>
                            <option value="mataram">Mataram</option>
                        </select>
                        <div id="validationtujuan" class="invalid-feedback">
                            <?php if(Session::has('tujuanError')): ?> <?php endif; ?>
                        </div> 
                    </div>  

                    <div class="mb-xl-3 mb-sm-5">
                        <label for="jenisBarang" class="form-label fs-4">Jenis Barang</label> 
                        <select class="form-select <?php if($errors->any()): ?> is-invalid <?php endif; ?>" aria-label="Pilih Barang" id="select_box_jenis" data-live-search="true" name="jenisBarang">
                            <option disabled selected value>Jenis Barang</option>
                            <option value="besi">besi</option>
                            <option value="tidakbesi">tidak besi</option> 
                        </select>
                        <div id="validationJenisBarang" class="invalid-feedback">
                            <?php if(Session::has('jenisBarangError')): ?> <?php endif; ?>
                        </div> 
                    </div>  
    
                    <div class="mb-xl-3 mb-sm-5">
                        <label for="jumlahBarang" class="form-label fs-4">Jumlah Barang</label>
                        <input type="number" class="form-control shadow-sm p-3 <?php if($errors->any()): ?> is-invalid <?php endif; ?>" name="jumlahBarang" id="jumlahBarang" aria-describedby="jumlahBarangText" placeholder="isi jumlah barang">
                        <div id="validationJenisBarang" class="invalid-feedback">
                            <?php if(Session::has('jumlahBarangError')): ?> <?php endif; ?>
                        </div>
                    </div>  
                </div>
            </div>
            
            <div class="col-xl-3 col-sm-5 m-1 py-2 card border border-dark rounded-2 justify-content-center shadow-sm">
                <div class="card-body"> 
                    <label for="keterangan" class="form-label fs-4">Keterangan</label>
                    <div class="form-floating mh-60" style="height: 80px;">
                        <textarea class="form-control" style="max-height: 80px;" placeholder="isi keterangan" id="textAreaKeterangan" maxlength="50" name="keterangan"></textarea>
                        <label for="floatingTextarea">Keterangan</label> 
                    </div>
                    <div class="row g-2">
                        <label for="namaSupir" class="form-label fs-5">Nama Supir</label>
                        <select class="form-select" aria-label="Select nama supir" id="select_box_supir" data-live-search="true" name="pilihSupir">
                            <option disabled selected value>Nama Supir</option>
                            <option value="rini">Rini</option>
                            <option value="setio">Setio</option> 
                        </select>

                        <label for="namaKernet" class="form-label fs-5">Nama Kernet</label>
                        <select class="form-select" aria-label="Select nama kernet" id="select_box_kernet" data-live-search="true" name="pilihKernet">
                            <option disabled selected value>Nama Kernet</option>
                            <option value="rimba">Rimba</option>
                            <option value="sindi">Sindi</option> 
                        </select> 
                        
                        <div class="mb-xl-3 mb-sm-5">
                            <label for="biaya" class="form-label fs-4">Biaya</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="pengecualian" id="pengecualianCheckBox" name="isPengecualian" data-toggle="">
                                <label class="form-check-label" for="pengecualianCheckBox">
                                Pengecualian
                                </label>
                            </div> 
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Rp</span>
                                <input type="number" class="form-control shadow-sm p-3 <?php if($errors->any()): ?> is-invalid <?php endif; ?>" disabled name="biaya" id="biaya" aria-describedby="biayaText" placeholder="isi biaya">
                                <div id="validationbiaya" class="invalid-feedback">
                                    <?php if(Session::has('biayaError')): ?> <?php endif; ?>
                                </div>
                            </div>
                        </div>  
                        
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="lunas" id="lunasCheckBox" name="isLunas">
                            <label class="form-check-label" for="lunasCheckBox">
                            Lunas
                            </label>
                        </div>  
                    </div>
                </div>
            </div>
            
            <div class="col-xl-3 col-sm-5 m-1 py-2  border border-dark rounded-2 justify-content-center shadow-sm">
                <div class="card-body"> 
                    <div class="mb-xl-3 mb-sm-5">
                        <label for="kubikasiPanjang" class="form-label fs-4">Panjang</label>
                        <input type="text" class="form-control shadow-sm <?php if($errors->any()): ?> is-invalid <?php endif; ?>" name="kubikasiPanjang" id="kubikasiPanjang" aria-describedby="kubikasiPanjangText" placeholder="isi panjang">
                        <div id="validationkubikasiPanjang" class="invalid-feedback">
                            <?php if(Session::has('kubikasiPanjangError')): ?> <?php endif; ?>
                        </div>
                        <label for="kubikasiLebar" class="form-label fs-4">Lebar</label>
                        <input type="text" class="form-control shadow-sm <?php if($errors->any()): ?> is-invalid <?php endif; ?>" name="kubikasiLebar" id="kubikasiLebar" aria-describedby="kubikasiLebarText" placeholder="isi lebar">
                        <div id="validationkubikasiLebar" class="invalid-feedback">
                            <?php if(Session::has('kubikasiLebarError')): ?> <?php endif; ?>
                        </div>
                        <label for="kubikasiTinggi" class="form-label fs-4">Tinggi</label>
                        <input type="text" class="form-control shadow-sm <?php if($errors->any()): ?> is-invalid <?php endif; ?>" name="kubikasiTinggi" id="kubikasiTinggi" aria-describedby="kubikasiTinggiText" placeholder="isi tinggi">
                        <div id="validationkubikasiTinggi" class="invalid-feedback">
                            <?php if(Session::has('kubikasiTinggiError')): ?> <?php endif; ?>
                        </div>
                        <label for="berat" class="form-label fs-4">Berat</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Kg</span>
                            <input type="text" class="form-control shadow-sm <?php if($errors->any()): ?> is-invalid <?php endif; ?>" name="berat" id="berat" aria-describedby="beratText" placeholder="isi berat">
                            <div id="validationberat" class="invalid-feedback">
                                <?php if(Session::has('beratError')): ?> <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="mb-xl-3 mb-sm-5 row">
                        <label for="rekomendasi" class="form-label fs-4">Biaya tanpa pengecualian</label>
                        <p class="text-start" id="titleBiayaKubikasi">Biaya kubikasi</p>
                        <p class="text-start" id="rekomendasiBiayaKubikasi">Rp</p>
                        <p class="text-start" id="titleBiayaBerat">Biaya berat</p>
                        <p class="text-start" id="rekomendasiBiayaBerat">Rp</p>
                    </div>
                </div> 
            </div> 
            <button type="submit" class="btn btn-success mt-2 fs-5 mh-30">Tambah Pengiriman</button>
        </div>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
    <?php echo $__env->make('layouts.footerAdmin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script-body-bottom'); ?>  
    <script>
        function rumusKubikasi(panjang, lebar, tinggi, harga) {
            if(panjang && lebar && tinggi && harga){
                return panjang * lebar * tinggi * harga; 
            }
            return "";
        } 

        function rumusBerat(beratKg, jenisBarang) {
            if(beratKg && jenisBarang){
                if(jenisBarang === "besi"){
                    return beratKg * 1000;
                } else if(jenisBarang === "tidak besi"){
                    return beratKg * 800;
                }
            }
            return "";
        } 

        $('#select_box_tujuan').select2({
            width: 'resolve' // need to override the changed default
        });
        $('#select_box_jenis').select2({
            width: 'resolve' // need to override the changed default
        });
        $('#select_box_supir').select2({
            width: 'resolve' // need to override the changed default
        });
        $('#select_box_kernet').select2({
            width: 'resolve' // need to override the changed default
        });

        $(document).ready(function(){
            $('#pengecualianCheckBox').click(function(){
                $('#biaya').prop('disabled', !$('#biaya').prop('disabled'));
                
                var panjang = $('#kubikasiPanjang').val();
                var lebar = $('#kubikasiLebar').val();
                var tinggi = $('#kubikasiTinggi').val();

                var berat = $('#berat').val();
                var jenis = $("#select_box_jenis").find(':selected').text();
                if($('#biaya').prop('disabled')){
                    $('#biaya').prop('value', '');
                    $('#rekomendasiBiayaKubikasi').html('Rp ' + rumusKubikasi(panjang, lebar, tinggi, 450000)); 
                    $('#rekomendasiBiayaBerat').html('Rp ' + rumusBerat(berat, jenis)); 
                }
                else {
                    $('#rekomendasiBiayaKubikasi').html('Rp'); 
                    $('#rekomendasiBiayaBerat').html('Rp'); 
                }
            });

            $('#kubikasiPanjang').change(function (e) { 
                e.preventDefault(); 
                var panjang = $('#kubikasiPanjang').val();
                var lebar = $('#kubikasiLebar').val();
                var tinggi = $('#kubikasiTinggi').val();
                if(panjang && lebar && tinggi){
                    $('#rekomendasiBiayaKubikasi').html('Rp ' + rumusKubikasi(panjang, lebar, tinggi, 450000)); 
                }
                else {
                    $('#rekomendasiBiayaKubikasi').html('Rp'); 
                }
            });
            $('#kubikasiLebar').change(function (e) { 
                e.preventDefault(); 
                var panjang = $('#kubikasiPanjang').val();
                var lebar = $('#kubikasiLebar').val();
                var tinggi = $('#kubikasiTinggi').val();
                if(panjang && lebar && tinggi){
                    $('#rekomendasiBiayaKubikasi').html('Rp ' + rumusKubikasi(panjang, lebar, tinggi, 450000)); 
                }
                else {
                    $('#rekomendasiBiayaKubikasi').html('Rp'); 
                }
            });
            $('#kubikasiTinggi').change(function (e) { 
                e.preventDefault(); 
                var panjang = $('#kubikasiPanjang').val();
                var lebar = $('#kubikasiLebar').val();
                var tinggi = $('#kubikasiTinggi').val();
                if(panjang && lebar && tinggi){
                    $('#rekomendasiBiayaKubikasi').html('Rp ' + rumusKubikasi(panjang, lebar, tinggi, 450000)); 
                }
                else {
                    $('#rekomendasiBiayaKubikasi').html('Rp'); 
                }
            });
            
            $('#select_box_jenis').change(function (e) { 
                e.preventDefault(); 
                var beratKg = $('#berat').val();
                var jenisBarang = $("#select_box_jenis").find(':selected').text();
                if(beratKg && jenisBarang){
                    if(jenisBarang === "besi" || jenisBarang === "tidak besi"){
                        $('#rekomendasiBiayaBerat').html('Rp ' + rumusBerat(beratKg, jenisBarang)); 
                    } 
                    else { 
                        $('#rekomendasiBiayaBerat').html('Rp'); 
                    }
                }
                else {
                    $('#rekomendasiBiayaBerat').html('Rp'); 
                }
            });
            $('#berat').change(function (e) { 
                e.preventDefault(); 
                var beratKg = $('#berat').val();
                var jenisBarang = $("#select_box_jenis").find(':selected').text();
                if(beratKg && jenisBarang){
                    if(jenisBarang === "besi" || jenisBarang === "tidak besi"){
                        $('#rekomendasiBiayaBerat').html('Rp ' + rumusBerat(beratKg, jenisBarang)); 
                    } 
                    else { 
                        $('#rekomendasiBiayaBerat').html('Rp'); 
                    }
                }
                else {
                    $('#rekomendasiBiayaBerat').html('Rp'); 
                }
            });
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\agi\Desktop\kerja\Kargo Website\resources\views/page/CargoPengirimanBarang.blade.php ENDPATH**/ ?>