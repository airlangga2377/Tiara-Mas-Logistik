<?php $__env->startSection('preload'); ?>
    
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>  

    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easy-loading/1.3.0/jquery.loading.js"></script>
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
    
    <?php if($errors->any()): ?>
        <script>
            alert($errors->first()); 
        </script>
    <?php endif; ?> 
    <div class="container"> 
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo e(url('home')); ?>">Home</a></li> 
                <li class="breadcrumb-item"><a href="<?php echo e(url('barang')); ?>">Barang</a></li> 
                <li class="breadcrumb-item active" aria-current="page">Truk Manifest</li>  
            </ol>
        </nav>
    </div>
    <div class="container-fluid"> 
        <div class="row justify-content-center align-items-start">
            <div class="col-auto shadow-sm p-3 float-start">
                <div class="row-auto justify-content-center align-items-center">
                    <div class="col-12">
                        <label for="jenisBarang" class="fs-5 form-label fw-bold w-100">Fitur</label>  
                    </div>
                    <div class="col-12 pt-2">
                        <a role="button" class="fs-5 btn btn-success w-100" href="<?php echo e(url('barang/truk/manifest/insert')); ?>">Tambah Manifest</a>
                    </div>   
                </div>
            </div>
            <div class="col-8 shadow-sm p-3" id="tableIdParent"> 
                <table id="tableId" class="display">
                    <thead>
                        <tr> 
                            <th></th>
                            <th>No Manifest</th>
                            <th>No Pol</th> 
                            <th>Sopir</th>
                            <th>Jumlah</th> 

                            <th>Tanggal</th>

                            <th class="text text-center">Ubah</th>
                        </tr>
                    </thead>
                    <?php $__currentLoopData = $allCargo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $barang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                        <tr>
                            <td data-toggle="tooltip" data-placement="top" title="Jenis Pengiriman <?php echo e($barang->jenis_pengiriman); ?>"><?php echo e($loop->index + 1); ?></td> 
                            <td><?php echo e($barang->no_manifest); ?></td>  
                            <td><?php echo e($barang->no_pol); ?></td>   
                            <td><?php echo e($barang->sopir); ?></td>  
                            <td><?php echo e($barang->jumlah); ?></td>  

                            <td><?php echo e($barang->created); ?></td>  

                            <td>
                                <div class="row justify-content-start align-items-center g-2 px-3">
                                    <div class="col-6 text-center">
                                        <?php if(!$barang->is_diterima): ?> 
                                            <form action="<?php echo e(url("barang/truk/update/diterima")); ?>" method="get">
                                                <input type="text" name="no_lmt" value="<?php echo e(encrypt($barang->no_lmt)); ?>" hidden>
                                                <button type="submit" class="btn btn-primary" style="width: 75px">Terima</button>
                                            </form>
                                        <?php elseif($barang->is_diterima && !$barang->is_lunas): ?>
                                            <button type="button" class="btn btn-secondary disabled">Terima</button>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-6 text-center">
                                        <form action="<?php echo e(url("barang/truk/print/deliverynote")); ?>" method="get" target="_blank">
                                            <input type="text" name="no_lmt" value="<?php echo e(encrypt($barang->no_lmt)); ?>" hidden>
                                            <button type="submit" class="btn btn-primary" style="width: 75px">Cetak</button>
                                        </form>
                                    </div> 
                                    <div class="col-6 text-center">
                                        <?php if(!$barang->is_lunas): ?> 
                                            <form action="<?php echo e(url("barang/truk/update/lunas")); ?>" method="get">
                                                <input type="text" name="no_lmt" value="<?php echo e(encrypt($barang->no_lmt)); ?>" hidden>
                                                <button type="submit" class="btn btn-primary" style="width: 75px">Lunas</button>
                                            </form>
                                        <?php elseif($barang->is_lunas && !$barang->is_diterima): ?>
                                            <button type="button" class="btn btn-secondary disabled" style="width: 75px">Lunas</button> 
                                        <?php endif; ?>
                                    </div>  
                                    <div class="col-6 text-center">
                                        <?php if(!$barang->is_diterima && !$barang->is_lunas): ?> 
                                            <form action="<?php echo e(url("barang/truk/delete")); ?>" method="get">
                                                <input type="text" name="no_lmt" value="<?php echo e(encrypt($barang->no_lmt)); ?>" hidden>
                                                <button type="submit" class="btn btn-danger" style="width: 75px">Hapus</button>
                                            </form>
                                        <?php else: ?>
                                            <button type="button" class="btn btn-danger disabled" style="width: 75px">Hapus</button>
                                        <?php endif; ?>
                                    </div>   
                                </div> 
                            </td>  
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                    <tbody>
                    </tbody>
                </table>
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
            var table = $('#tableId').DataTable({ 
                // 
                pageLength: 10,
            });

            table.on('order.dt search.dt', function () {
                let i = 1;
        
                table.cells(null, 0, { search: 'applied', order: 'applied' }).every(function (cell) {
                    this.data(i++);
                });
            }).draw();

            
  
            $('#overlayLoading').css('visibility', 'hidden');
            
            $("#printManifest").click(function (e) { 
                e.preventDefault(); 
            }); 
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Agi\Desktop\Kerja\Kargo Website\resources\views/page/admin/CargoPengirimanTrukManifest.blade.php ENDPATH**/ ?>