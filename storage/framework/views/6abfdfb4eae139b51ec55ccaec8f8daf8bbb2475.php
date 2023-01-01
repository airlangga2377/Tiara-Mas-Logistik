<?php $__env->startSection('preload'); ?>  
<?php $__env->stopSection(); ?>

<?php $__env->startSection('title'); ?> 
    <title>Cargo aja</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center align-items-center g-2 m-3">
        <div class="col-xl-4 col-sm-12">
            <div class="card card-body text-center shadow-sm">
                <h4 class="card-title fs-3">Input Pengiriman</h4>
                <p class="card-text fs-5 py-3">Anda dapat menambahkan pengiriman barang</p>
                <a class="btn btn-primary fs-5" href="<?php echo e(url('barang/truk/insert#pengiriman')); ?>" role="button">Input Pengiriman</a>
            </div>
        </div>
        <div class="col-xl-4 col-sm-12">
            <div class="card card-body text-center shadow-sm">
                <h4 class="card-title fs-3">Input Manifest</h4>
                <p class="card-text fs-5 py-3">Anda dapat membuat manifest dari pengiriman barang</p>
                <a class="btn btn-primary fs-5" href="<?php echo e(url('barang/manifest')); ?>" role="button">Input Manifest</a>
            </div>
        </div>
        <div class="col-xl-4 col-sm-12">
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