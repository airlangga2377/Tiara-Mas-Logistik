<?php $__env->startSection("preload"); ?>
        
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
        <link href="<?php echo e(url('/assets/css/bus/app.css')); ?>" rel="stylesheet" />
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
                <?php echo e(Auth::user()->name); ?>

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
                    <a role="button" class="fs-5 list-group-item list-group-item-action" href="<?php echo e(url("barang/bus/kategoribarang")); ?>">Kategori Barang</a>
                    <a role="button" class="fs-5 list-group-item list-group-item-action" href="<?php echo e(url("barang/bus/wilayah")); ?>">Wilayah</a>
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
                <li class="breadcrumb-item active" aria-current="page">Barang</li>
            </ol>
        </nav>
</div>
<div class="modal fade" id="areabus" tabindex="-1" aria-labelledby="areabus" aria-hidden="true">
    <?php if('status'): ?>
        <div class="alert alert-success" role="alert">
            <?php echo e(session('status')); ?>

        </div>
    <?php endif; ?>
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Wilayah</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="/save-busarea" method="POST">
            <?php echo e(csrf_field()); ?>

          <div class="mb-3">
            <label for="city" class="col-form-label">Kota</label>            
            <select class="form-control kt-select2 city_area" name="city" id="wilayahKota">
                
            </select>
          </div>
          <div class="mb-3">
            <label for="alamat" class="col-form-label">Alamat</label>
            <input type="text"name="alamat" class="form-control" id="alamat">
          </div>
          <div class="mb-3">
            <label for="kode" class="col-form-label" hidden>Kode Wilayah</label>
            <input type="text" name="kode_wilayah" class="form-control" id="kode" value="" hidden>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batalkan</button>
        <button type="submit" class="btn btn-primary">Daftarkan Wilayah Baru</button>
      </div>
    </form>
    </div>
  </div>
</div>
<div class="container-fluid">   
    <form action="<?php echo e(url("barang/bus/wilayah")); ?>"> 
            <div class="row justify-content-center align-items-start">
                <div class="col-auto shadow-sm p-3 float-start">
                    <div class="row-auto justify-content-center align-items-center">
                        <div class="col-12">
                            <label for="jenisBarang" class="fs-5 form-label fw-bold w-100">Fitur</label>  
                        </div>
                        <div class="col-12 pt-2">
                            <a role="button" class="fs-5 btn btn-success" href="<?php echo e(url('barang/bus/tambah-wilayah ')); ?>">Tambahkan Wilayah Baru</a>
                        </div>
                        <div class="col-12 pt-2">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#areabus">Tambahkan</button>
                        </div>   
                    </div>
                </div>
                <div class="col-8 shadow-sm p-3" id="tableIdParent">
                    <table id="area_bus" class="display">
                        <thead>
                            <tr> 
                                <th>Kota</th>
                                <th>Alamat</th>
                                <th>Kode</th>
                                <th class="text text-center">Ubah</th>
                            </tr>
                        </thead>                        
                        <tbody>
                            
                        </tbody>
                    </table>
                </div>
            </div>

    </form>
<?php $__env->stopSection(); ?>
<?php $__env->startSection("footer"); ?>
    <?php echo $__env->make("layouts.footerAdmin", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
<?php $__env->stopSection(); ?>

<?php $__env->startSection("script-body-bottom"); ?>
<script>
$(document).ready(function () {
    $('#area_bus').DataTable();
    $("#overlayLoading").css("visibility", "hidden"); // Function stuck loading
});
</script>
<script>
$(document).ready(function () {
    $('#wilayahKota').select2({
        dropdownParent: '.modal',
        // .on('select2:open', () => {
        //     $(".select2-results:not(:has(a))").append(`<li style='list-style: none; padding: 10px;'><a style="width: 100%" href="/barang/bus/insert"
        //         class="btn btn-primary">+ <?php echo e(('Add New Branch')); ?></a> </li>`);
        // }) 
            // ajax: {
            //     url: "/wilayahKota",
            //     processResults: function({data}){
            //         return {
            //             results: $.map(data, function(item){
            //                 return {
            //                     id: item.id,
            //                     name: item.name
            //                 }   
            //             })
            //     }
            //     }
            // }
        });
    }); 
</script>
<?php $__env->stopSection(); ?> 
<?php echo $__env->make("layouts.app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Kargo Website\resources\views/page/admin/Bus/CargoBarangBus.blade.php ENDPATH**/ ?>