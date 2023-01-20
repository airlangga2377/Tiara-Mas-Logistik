<?php $__env->startSection('preload'); ?>
    
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    
    <script src="simple.money.format.js"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('title'); ?> 
    <title>Cargo aja</title>
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
                    <a role="button" class="fs-5 list-group-item list-group-item-action" href="<?php echo e(url('barang/pengiriman#pengiriman')); ?>">Pengiriman</a>
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

    <form action="<?php echo e(url('barang/insert/many')); ?>" method="post">
        <?php echo csrf_field(); ?>  
        <div class="row justify-content-between d-flex g-3"> 
            <div class="text-wrap fs-3 mb-2 text-center" id="pengiriman">Pengiriman</div>
            <div class="col-xl-12 col-sm-5 m-1 py-2 border border-dark rounded-2 justify-content-center shadow-sm">   
                
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
                                <input type="text" class="form-control shadow-sm p-3 <?php if($errors->any()): ?> is-invalid <?php endif; ?>" name="namaPengirim" id="namaPengirim" aria-describedby="namaPengirimText" placeholder="isi nama pengirim" value="<?php if(Session::has('namaPengirim')): ?> <?php echo Session::get('namaPengirim'); ?>  <?php endif; ?>">
                                <div id="validationNamaPengirim" class="invalid-feedback">
                                    <?php if(Session::has('namaPengirimError')): ?> <?php endif; ?>
                                </div>
                            </div> 
                        </div>
                        <div class="col">
                            <div class="mb-xl-3 mb-sm-5">
                                <label for="nomorPengirim" class="form-label fs-4">Tlp Pengirim</label>
                                <input type="text" class="form-control shadow-sm p-3 <?php if($errors->any()): ?> is-invalid <?php endif; ?>" name="nomorPengirim" id="nomorPengirim" aria-describedby="nomorPengirimText" placeholder="isi nomor pengirim" value="<?php if(Session::has('nomorPengirim')): ?> <?php echo Session::get('nomorPengirim'); ?>  <?php endif; ?>">
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
                                <input type="text" class="form-control shadow-sm p-3 <?php if($errors->any()): ?> is-invalid <?php endif; ?>" name="namaPenerima" id="namaPenerima" aria-describedby="namaPenerimaText" placeholder="isi nama penerima" value="<?php if(Session::has('namaPenerima')): ?> <?php echo Session::get('namaPenerima'); ?>  <?php endif; ?>">
                                <div id="validationNamaPenerima" class="invalid-feedback">
                                    <?php if(Session::has('namaPenerimaError')): ?> <?php endif; ?>
                                </div>
                            </div>  
                        </div> 
                        <div class="col">
                            <div class="mb-xl-3 mb-sm-5">
                                <label for="nomorPenerima" class="form-label fs-4">Tlp Penerima</label>
                                <input type="text" class="form-control shadow-sm p-3 <?php if($errors->any()): ?> is-invalid <?php endif; ?>" name="nomorPenerima" id="nomorPenerima" aria-describedby="nomorPenerimaText" placeholder="isi nomor penerima" value="<?php if(Session::has('nomorPenerima')): ?> <?php echo Session::get('nomorPenerima'); ?>  <?php endif; ?>">
                                <div id="validationNamaPenerima" class="invalid-feedback">
                                    <?php if(Session::has('nomorPenerimaError')): ?> <?php endif; ?>
                                </div>
                            </div>  
                        </div> 
                    </div>  
                </div>

                <div class="row-auto justify-content-center align-items-center g-2"> 
                    <div class="row justify-content-center align-items-center g-2">
                        <div class="col"> 
                            <div class="mb-xl-3 mb-sm-5 border p-3 w-60">
                                <label for="jenisPengirim" class="form-label fs-4">Jenis Pengirim</label> 
                                
                                <select class="form-select <?php if($errors->any()): ?> is-invalid <?php endif; ?>" aria-label="Pilih jenisPengirim" id="selectBoxJenisPengirim" data-live-search="true" name="jenisPengirim">
                                    <option disabled selected value>Semua Jenis Pengirim</option>
                                    <option value="umum">Umum</option>
                                    <option value="mitra">Mitra</option>
                                    <option value="distributor">Distributor</option> 
                                </select>
                                <div id="validationjenisPengirim" class="invalid-feedback">
                                    <?php if(Session::has('jenisPengirimError')): ?> <?php endif; ?>
                                </div> 
                            </div>  
                        </div>
                        <div class="col"> 
                            <div class="mb-xl-3 mb-sm-5 border p-3 w-60"> 
                                <label for="tujuan" class="form-label fs-4">Tujuan</label>  
                                <select class="form-select <?php if($errors->any()): ?> is-invalid <?php endif; ?>" aria-label="Pilih tujuan" id="selectBoxTujuan" data-live-search="true" name="tujuan">
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
                        </div>
                    </div>

                    <input type="number" name="jumlah" id="jumlah" aria-describedby="jumlahText" readonly hidden value="1">

                    <button type="button" class="btn btn-primary fs-5" id="btnAddItem">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16" data-darkreader-inline-fill="" style="--darkreader-inline-fill:currentColor;">
                        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"></path>
                        </svg>
                        Tambah
                      </button>
                </div>
            </div>

            <div class="container-fluid" id="containerItemBarang"> 
                <div id="itemBarang">
                    <div class="col-xl-12 col-sm-5 m-1 py-2 card border border-dark rounded-2 justify-content-center shadow-sm">
                        <div class="accordion accordion-flush" id="accordionFlush0">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-heading">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse" aria-expanded="true" aria-controls="flush-collapse">
                                Nama barang
                            </button>
                            </h2>
                            <div id="flush-collapse" class="accordion-collapse collapse" aria-labelledby="flush-heading" data-bs-parent="#accordionFlush0">
                            <div class="accordion-body"> 
                                
                                <div class="col-xl-12 col-sm-5 m-1 py-2 card rounded-2 justify-content-center shadow-sm">
                                    <div class="card-body">  
                                        <div class="row justify-content-center align-items-center g-2">
                                            <div class="col">
                                                <div class="mb-xl-3 mb-sm-5">
                                                    <label for="jenisBarang" class="form-label fs-4 w-100">Jenis Barang</label> 
                                                    <select class="form-select <?php if($errors->any()): ?> is-invalid <?php endif; ?>" aria-label="Pilih Barang" id="selectBoxJenis" data-live-search="true" name="jenisBarang[]">
                                                        <option disabled selected value>Jenis Barang</option>
                                                        <option value="besi">besi</option>
                                                        <option value="tidak besi">tidak besi</option> 
                                                    </select>
                                                    <div id="validationJenisBarang" class="invalid-feedback">
                                                        <?php if(Session::has('jenisBarangError')): ?> <?php endif; ?>
                                                    </div> 
                                                </div>  
                                            </div>
                                            <div class="col"> 
                                                <div class="mb-xl-3 mb-sm-5">
                                                    <label for="jumlahBarang" class="form-label fs-4">Jumlah Barang</label>
                                                    <input type="number" class="form-control shadow-sm p-3 <?php if($errors->any()): ?> is-invalid <?php endif; ?>" name="jumlahBarang[]" id="jumlahBarang" aria-describedby="jumlahBarangText" placeholder="isi jumlah barang">
                                                    <div id="validationJenisBarang" class="invalid-feedback">
                                                        <?php if(Session::has('jumlahBarangError')): ?> <?php endif; ?>
                                                    </div>
                                                </div>  
                                            </div>
                                        </div>
        
                                        <div class="row justify-content-center align-items-center g-2">
                                            <div class="col-6"> 
                                                <div class="mb-xl-3 mb-sm-5">
                                                    <label for="kubikasiPanjang" class="form-label fs-4">Panjang</label>
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control shadow-sm <?php if($errors->any()): ?> is-invalid <?php endif; ?>" name="kubikasiPanjang[]" id="kubikasiPanjang" aria-describedby="kubikasiPanjangText" placeholder="isi panjang">
                                                        <div id="validationkubikasiPanjang" class="invalid-feedback">
                                                            <?php if(Session::has('kubikasiPanjangError')): ?> <?php endif; ?>
                                                        </div>
                                                        <span class="input-group-text" id="basic-addon1">M</span>
                                                    </div>
                                                </div>
                                            </div> 
                                            <div class="col-6">
                                                <div class="mb-xl-3 mb-sm-5">
                                                    <label for="kubikasiLebar" class="form-label fs-4">Lebar</label>
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control shadow-sm <?php if($errors->any()): ?> is-invalid <?php endif; ?>" name="kubikasiLebar[]" id="kubikasiLebar" aria-describedby="kubikasiLebarText" placeholder="isi lebar">
                                                        <div id="validationkubikasiLebar" class="invalid-feedback">
                                                            <?php if(Session::has('kubikasiLebarError')): ?> <?php endif; ?>
                                                        </div>
                                                        <span class="input-group-text" id="basic-addon1">M</span>
                                                    </div>
                                                </div>
                                            </div> 
                                            <div class="col-6">
                                                <div class="mb-xl-3 mb-sm-5">
                                                    <label for="kubikasiTinggi" class="form-label fs-4">Tinggi</label>
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control shadow-sm <?php if($errors->any()): ?> is-invalid <?php endif; ?>" name="kubikasiTinggi[]" id="kubikasiTinggi" aria-describedby="kubikasiTinggiText" placeholder="isi tinggi">
                                                        <div id="validationkubikasiTinggi" class="invalid-feedback">
                                                            <?php if(Session::has('kubikasiTinggiError')): ?> <?php endif; ?>
                                                        </div>
                                                        <span class="input-group-text" id="basic-addon1">M</span>
                                                    </div>
                                                </div>
                                            </div>  
                                            <div class="col-6">
                                                <div class="mb-xl-3 mb-sm-5">
                                                    <label for="berat" class="form-label fs-4">Berat</label>
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control shadow-sm <?php if($errors->any()): ?> is-invalid <?php endif; ?>" name="berat[]" id="berat" aria-describedby="beratText" placeholder="isi berat">
                                                        <div id="validationberat" class="invalid-feedback">
                                                            <?php if(Session::has('beratError')): ?> <?php endif; ?>
                                                        </div>
                                                        <span class="input-group-text" id="basic-addon1">Kg</span>
                                                    </div>
                                                </div>
                                            </div>  
                                        </div> 
        
                                        <div class="row g-2">
                                            <div class="mb-xl-3 mb-sm-5">
                                                <label for="biaya" class="form-label fs-4">Biaya (Pengecualian)</label> 
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text" id="basic-addon1">Rp</span>
                                                    <input type="number" class="form-control shadow-sm p-3 <?php if($errors->any()): ?> is-invalid <?php endif; ?>" name="biaya[]" id="biaya" aria-describedby="biayaText" placeholder="isi biaya">
                                                    <div id="validationbiaya" class="invalid-feedback">
                                                        <?php if(Session::has('biayaError')): ?> <?php endif; ?>
                                                    </div>
                                                </div>
        
                                                <div class="mb-xl-3 mb-sm-5">
                                                    <label for="lunas" class="form-label fs-5">Lunas</label>
                                                    <select class="form-select" aria-label="Pilih lunas" data-live-search="true" name="isLunas[]">
                                                        <option value>Belum Lunas</option>
                                                        <option value="lunas">Lunas</option> 
                                                    </select>
                                                </div> 
                                            </div>  
        
                                            <div class="row justify-content-center align-items-center g-2">
                                                <div class="col">
                                                    <label for="namaSupir" class="form-label fs-5">Nama Supir</label>
                                                    <div class="mb-xl-3 mb-sm-5">
                                                        <select class="form-select" aria-label="Select nama supir" id="selectBoxSupir" data-live-search="true" name="pilihSupir[]">
                                                            <option disabled selected value>Nama Supir</option>
                                                            <option value="rini">Rini</option>
                                                            <option value="setio">Setio</option> 
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <label for="namaKernet" class="form-label fs-5">Nama Kernet</label>
                                                    <div class="mb-xl-3 mb-sm-5">
                                                    <select class="form-select" aria-label="Select nama kernet" id="selectBoxKernet" data-live-search="true" name="pilihKernet[]">
                                                        <option disabled selected value>Nama Kernet</option>
                                                        <option value="rimba">Rimba</option>
                                                        <option value="sindi">Sindi</option> 
                                                    </select>
                                                    </div>
                                                </div>
                                            </div> 
                                        
                                            <label for="keterangan" class="form-label fs-4">Keterangan</label>
                                            <div class="form-floating mh-60" style="height: 80px;">
                                                <textarea class="form-control" style="max-height: 80px;" placeholder="isi keterangan" id="textAreaKeterangan" maxlength="50" name="keterangan[]"></textarea>
                                                <label for="floatingTextarea">Keterangan</label> 
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <button type="submit" class="btn btn-success mt-2 fs-5 mh-30" id="btnSubmit">Tambah Pengiriman</button>
        </div>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
    <?php echo $__env->make('layouts.footerAdmin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script-body-bottom'); ?>  
    <script> 
        $('#selectBoxJenisPengirim').select2({
            width: 'resolve' // need to override the changed default
        });

        $('#selectBoxTujuan').select2({
            width: 'resolve' // need to override the changed default
        }); 
        
        function rumusKubikasi(panjang, lebar, tinggi, harga) {
            if(panjang && lebar && tinggi && harga){
                var volume = panjang * lebar * tinggi * harga;
                return new Intl.NumberFormat('ID', {
                    style: 'currency',
                    currency: 'IDR'
                }).format(volume); 
            }
            return "";
        } 

        function rumusBerat(beratKg, jenisBarang) {
            if(beratKg && jenisBarang){
                if(jenisBarang === "besi"){
                    var harga = beratKg * 1000;
                    return new Intl.NumberFormat('ID', {
                        style: 'currency',
                        currency: 'IDR'
                    }).format(harga);  
                } else if(jenisBarang === "tidak besi"){
                    var harga = beratKg * 800;
                    return new Intl.NumberFormat('ID', {
                        style: 'currency',
                        currency: 'IDR'
                    }).format(harga);  
                }
            }
            return "";
        } 

        $(document).ready(function(){  
            
            $('#overlayLoading').css('visibility', 'hidden');

            $('#btnSubmit').click(function (e) { 
                $('#overlayLoading').css('visibility', 'visible');
            });

            $('#btnAddItem').click(function (e) {  
                var itemBarang = $('#itemBarang').html().replaceAll("flush-heading", "flush-heading" + $('div#itemBarang').length)
                itemBarang = itemBarang.replaceAll("flush-collapse", "flush-collapse" + $('div#itemBarang').length)
                $('#containerItemBarang').append('<div id="itemBarang">' + itemBarang + '</div>');

                $('#jumlah').attr('value', parseInt($('#jumlah').val()) + 1);
            });
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\agi\Desktop\kerja\Kargo Website\resources\views/page/admin/CargoPengirimanBanyakBarang.blade.php ENDPATH**/ ?>