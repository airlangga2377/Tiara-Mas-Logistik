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
                    <div class="accordion accordion-flush" id="accordionFlushNav">
                        <div class="accordion-item">
                        <h2 class="accordion-header" id="flushHadingNav">
                            <button class="fs-5 accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapsPengiriman" aria-expanded="true" aria-controls="flush-collapseOne">
                            Pengiriman
                            </button>
                        </h2>
                        <div id="flush-collapsPengiriman" class="accordion-collapse collapse" aria-labelledby="flushHadingNav" data-bs-parent="#accordionFlushNav">
                            <div class="accordion-body">
                                <?php if(Auth::user()->is_user_superadmin): ?>
                                    <a role="button" class="fs-5 list-group-item list-group-item-action border-0" href="<?php echo e(url('barang/truk/insert#pengiriman')); ?>">Truk</a>
                                    <a role="button" class="fs-5 list-group-item list-group-item-action border-0" href="<?php echo e(url('barang/bus/insert#pengiriman')); ?>">Bus</a>
                                <?php else: ?>
                                    <a role="button" class="fs-5 list-group-item list-group-item-action border-0" href="<?php echo e(url('barang/' . $jenisUser .'/insert#pengiriman')); ?>"><?php echo e(ucfirst($jenisUser)); ?></a>
                                <?php endif; ?>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="accordion accordion-flush" id="accordionFlushNav">
                        <div class="accordion-item">
                        <h2 class="accordion-header" id="flushHadingNav">
                            <button class="fs-5 accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapsManifest" aria-expanded="true" aria-controls="flush-collapseOne">
                            Manifest
                            </button>
                        </h2>
                        <div id="flush-collapsManifest" class="accordion-collapse collapse" aria-labelledby="flushHadingNav" data-bs-parent="#accordionFlushNav">
                            <div class="accordion-body">
                            <a role="button" class="fs-5 list-group-item list-group-item-action border-0" href="<?php echo e(url('barang/manifest')); ?>">Lihat</a>
                            <a role="button" class="fs-5 list-group-item list-group-item-action border-0" href="<?php echo e(url('barang/manifest/create')); ?>">Buat</a>
                            </div>
                        </div>
                        </div>
                    </div>
    
                    <?php echo $__env->yieldContent('top-nav-bar-custom'); ?>
                </div>
            </div>
        </div> 
    </div>
    </nav><?php /**PATH C:\Users\agi\Desktop\kerja\Kargo Website\resources\views/layouts/loggednav.blade.php ENDPATH**/ ?>