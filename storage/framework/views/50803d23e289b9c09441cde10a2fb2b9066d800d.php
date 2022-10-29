<?php $__env->startSection('title'); ?> 
    <title>Cargo aja | Login</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('top-nav-bar'); ?>
    <?php echo $__env->make('layouts.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?> 
  <form action="<?php echo e(url('login')); ?>" method="post">
    <?php echo csrf_field(); ?>
    <div class="container-fluid my-5 d-flex justify-content-center">
      <div class="col-xl-3 col-sm-5"> 
        <div class="text-wrap fs-4 mb-2 text-center">Masuk</div>
        
        
        <?php if($errors->any()): ?>
          <div class="alert alert-danger bg-danger text-white border-0" role="alert">
              <?php echo $errors->first(); ?>

          </div>
        <?php endif; ?>

        <?php if(Session::has('message')): ?>
          <div class="alert alert-warning bg-warning text-white border-0" role="alert">
              <?php echo Session::get('message'); ?>

          </div>
        <?php endif; ?> 

        <div class="mb-xl-3 mb-sm-5">
          <label for="email" class="form-label">Email</label>
          <input type="email" class="form-control shadow-sm <?php if($errors->any()): ?> is-invalid <?php endif; ?>" name="email" id="email" aria-describedby="emailText" placeholder="isi email">
        </div>
        <div class="mb-xl-3 mb-sm-5">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control shadow-sm <?php if($errors->any()): ?> is-invalid <?php endif; ?>" name="password" id="password" aria-describedby="passwordText" placeholder="isi password">
        </div>

        <div class="form-check" hidden>
          <input class="form-check-input" type="checkbox" value="true" id="checkBoxRememberMe" name="checkBoxRememberMe">
          <label class="form-check-label" for="checkBoxRememberMe">
            Ingat email
          </label>
        </div>

        <button type="submit" class="btn btn-success w-100 mt-2">Masuk</button>
      </div>
    </div>
  </form>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
  <?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Kargo Website\resources\views/auth/login.blade.php ENDPATH**/ ?>