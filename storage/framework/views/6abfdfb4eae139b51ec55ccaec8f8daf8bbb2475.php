<?php $__env->startSection('preload'); ?>  
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
                    <a role="button" class="fs-5 list-group-item list-group-item-action" href="<?php echo e(url('barang/truk/insert#pengiriman')); ?>">Pengiriman</a>
                </div>
            </div>
        </div> 
    </div>
</nav> 
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center align-items-center g-2 m-3">
        <div class="col-xl-auto col-sm-12">
            <div class="card card-body text-center shadow-sm">
                <h4 class="card-title fs-3">Pengiriman</h4>
                <p class="card-text fs-5 py-3">Anda dapat menambahkan pengiriman barang</p>
                <a class="btn btn-primary fs-5" href="<?php echo e(url('barang/truk/insert#pengiriman')); ?>" role="button">Lihat Pengiriman</a>
            </div>
        </div>
        <div class="col-xl-auto col-sm-12">
            <div class="card card-body text-center shadow-sm">
                <h4 class="card-title fs-3">Barang</h4>
                <p class="card-text fs-5 py-3">Anda dapat melihat beberapa barang</p>
                <a class="btn btn-primary fs-5" href="<?php echo e(url('barang')); ?>" role="button">Lihat Barang</a>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
    <?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script-body-bottom'); ?>  
    <script> 
        $(document).ready( function () { 
            $('#overlayLoading').css('visibility', 'hidden');
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Agi\Desktop\Kerja\Kargo Website\resources\views/page/home.blade.php ENDPATH**/ ?>