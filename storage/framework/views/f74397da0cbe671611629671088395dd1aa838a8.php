<!-- Top Nav Bar -->
<nav class="navbar navbar-expand-sm navbar-light bg-light shadow-sm">
    <div class="container">
        <div class="col w-25"> 
            <!-- Logo -->
            <a class="navbar-brand float-start" href="<?php echo e(url('/')); ?>"> 
                <img style="width: 80%" src="<?php echo e(url('/tiara-mas.png')); ?>"/> 
            </a> 

            <div class="row float-end me-2"> 
                <button class="navbar-toggler d-lg-none " type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse float-end" id="collapsibleNavId">
                    <ul class="navbar-nav "> 
                        <!-- <li class="nav-item">
                            <a class="nav-link" href="#">Lacak</a>
                        </li> 
                        <li class="nav-item">
                            <a class="nav-link" href="#">Tentang</a>
                        </li>  -->
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(url('home')); ?>">Masuk</a>
                        </li> 
                    </ul> 
                </div>
            </div>
        </div>
    </div>
</nav><?php /**PATH C:\Users\Agi\Desktop\Kerja\Kargo Website\resources\views/layouts/notloggednav.blade.php ENDPATH**/ ?>