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
                    <a role="button" class="fs-5 list-group-item list-group-item-action" href="<?php echo e(url("barang/truk/insert#pengiriman")); ?>">Pengiriman</a>
                    <a role="button" class="fs-5 list-group-item list-group-item-action" href="<?php echo e(url("barang/bus/insert#pengiriman")); ?>">Pengiriman Bus</a>
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

    <form action="<?php echo e(url("barang/bus/insert")); ?>" method="post">
        <?php echo csrf_field(); ?>
        <div class="row justify-content-between d-flex g-3">
            <label class="text-wrap fs-3 mb-2" id="pengiriman"><h2>IDENTITAS PENGIRIM</h2></label>
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
                </div>
            </div>  
            <label class="text-wrap fs-3 mb-2" id="pengiriman"><h2>IDENTITAS PENERIMA</h2></label>
            <div class="col-12 m-1 py-2 rounded-2 justify-content-center shadow-sm bg-dark text-light">
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
            <label class="text-wrap fs-3 mb-2" id="pengiriman"><h2>INFORMASI BARANG</h2></label>            
            <div class="col-12 m-1 py-2 rounded-2 justify-content-center shadow-sm bg-dark text-light">

        </div>    

    </form>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection("footer"); ?>
    <?php echo $__env->make("layouts.footerAdmin", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
<?php $__env->stopSection(); ?>

<?php $__env->startSection("script-body-bottom"); ?>
    <script>
        $(document).ready(function(){ // IKI DIGAE NGANDANI LEK FUNGSI2 NANG NJERONE FUNGSI IKI BAKAL DIEKSEKUSI SAK MARINE HALAMAN E DI LOAD
            $("#overlayLoading").css("visibility", "hidden"); // IKI NGGA SING DIGAE NGEHIDE 
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts.app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\backup\resources\views/page/admin/Bus/CargoPengirimanBus.blade.php ENDPATH**/ ?>