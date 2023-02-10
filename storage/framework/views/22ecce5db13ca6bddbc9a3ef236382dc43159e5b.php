<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Author: Tiara Mas IT">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Icon -->
    

    <style> 
      .overlayLoading{
          position: fixed; 
          width: 100%;
          height: 100%;
          background: rgba(0,0,0,0.5);  
          z-index: 1;
      }
    </style>
    <?php echo $__env->yieldContent('style'); ?>
    
<?php $__env->startSection('title'); ?> 
    <title>Cargo aja</title>
<?php $__env->stopSection(); ?> 
    
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>

    <?php echo $__env->yieldContent('preload'); ?>
    
    <?php echo $__env->yieldContent('title'); ?>
  </head>
  <body>
    <div class="container-fluid p-0 h-100">
      <div class="d-flex justify-content-center overlayLoading" style="z-index: 1;"  id="overlayLoading">
        <div class="spinner-border text-center text-light inline-flex m-auto" role="status">
          <span class="fs-1 visually-hidden">Loading...</span>
        </div>
      </div>  
      
      <?php echo $__env->yieldContent('top-nav-bar'); ?>
      
       
      
      <?php echo $__env->yieldContent('content'); ?>
      
      <?php echo $__env->yieldContent('footer'); ?>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
    
    <?php echo $__env->yieldContent('script-body-bottom'); ?>
  </body>
</html><?php /**PATH C:\Users\Asus\Downloads\Kargo Website Pengiriman v.1.1.5\Kargo Website\resources\views/layouts/app.blade.php ENDPATH**/ ?>