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
    

    <?php echo $__env->yieldContent('preload'); ?>
    
    <?php echo $__env->yieldContent('title'); ?>
  </head>
  <body>
    <div class="container-fluid p-0 h-100">
        <?php echo $__env->yieldContent('top-nav-bar'); ?>
        
        <?php echo $__env->yieldContent('content'); ?>
        
        <?php echo $__env->yieldContent('footer'); ?>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    
    <?php echo $__env->yieldContent('script-body-bottom'); ?>
  </body>
</html><?php /**PATH D:\Kargo Website\resources\views/layouts/app.blade.php ENDPATH**/ ?>