<?php $__env->startSection('content'); ?> 
  <form action="<?php echo e(url('')); ?>" method="post">
    <?php echo csrf_field(); ?>
    <div class="container-fluid my-5 d-flex justify-content-center">
      <div class="col-3"> 
        <div class="text-wrap fs-4 mb-2 text-center">Masuk</div>
        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="email" class="form-control shadow-sm" name="email" id="email" aria-describedby="emailText" placeholder="isi email">
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control shadow-sm" name="password" id="password" aria-describedby="passwordText" placeholder="isi password">
        </div>
        <button type="button" class="btn btn-success w-100">Masuk</button>
      </div>
    </div>
  </form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Agi\Desktop\Kerja\Kargo Website\resources\views/backend/login/index.blade.php ENDPATH**/ ?>