<?php $__env->startSection('preload'); ?>
    
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>  

    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easy-loading/1.3.0/jquery.loading.js"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('title'); ?> 
    <title>Cargo aja</title>
<?php $__env->stopSection(); ?> 

<?php $__env->startSection('top-nav-bar'); ?> 
    <?php echo $__env->make('layouts.loggednav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>   
    <!-- Modal tracking -->
    <div class="modal fade modal-dialog-scrollable" id="modalTracking" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="parentTableIdTracking"> 
                <table id="tableIdTracking" class="display">
                    <thead>
                        <tr> 
                            <th>Deskripsi Tracking</th> 

                            <th>Tanggal</th> 
                        </tr>
                    </thead>
                    <tbody> 
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
            
            
            </div>
        </div>
        </div>
    </div>

    
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
                <li class="breadcrumb-item active" aria-current="page">Manifest</li>  
            </ol>
        </nav>
    </div>
    <div class="container-fluid"> 
        <div class="row justify-content-center align-items-center g-2">
            <div class="col">
                <p class="fs-1 text text-center" id="manifest">Manifest</p>
            </div> 
        </div>
        <div class="row justify-content-center align-items-start">
            <div class="col-auto shadow-sm p-3 float-start">
                <div class="row-auto justify-content-center align-items-center">
                    <div class="col-12">
                        <label for="jenisBarang" class="fs-5 form-label fw-bold w-100">Fitur</label>  
                    </div>
                    <div class="col-12 pt-2"> 
                        <a role="button" class="fs-5 btn btn-success w-100" href="<?php echo e(url('barang/manifest/create')); ?>">Tambah Manifest</a>
                    </div>   
                </div>
            </div>
            <div class="col-xl-8 col-md-0 col-sm-0 shadow-sm p-3" id="tableIdParent"> 
                <table id="tableId" class="display">
                    <thead>
                        <tr> 
                            <th></th>
                            <th>No Manifest</th>
                            <th>No Pol</th> 
                            <th>Sopir</th>

                            <th>Tanggal</th>

                            <th class="text text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $allCargo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $barang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                        <?php if($barang->no_manifest): ?> 
                            <tr>
                                <td data-toggle="tooltip" data-placement="top" title="Jenis Pengiriman <?php echo e($barang->jenis_pengiriman); ?>"><?php echo e($loop->index + 1); ?></td> 
                                <td><?php echo e($barang->no_manifest); ?></td>  
                                <td><?php echo e($barang->no_pol); ?></td>   
                                <td><?php echo e($barang->sopir ? $barang->sopir : $barang->sopir_utama); ?></td>  

                                <td><?php echo e($barang->asal); ?></td>  

                                <td>
                                    <div class="row justify-content-start align-items-center g-2 px-3">
                                        <div class="col-6 text-center">
                                            <?php if($barang->last_id_message_tracking == 1  && ($barang->asal == $kodeKota->kota || $name == "superadmin")): ?> 
                                                <form action="<?php echo e(url("barang/manifest/berangkat")); ?>" method="post">
                                                    <?php echo csrf_field(); ?>
                                                    <input type="text" name="no_manifest" value="<?php echo e(encrypt($barang->no_manifest)); ?>" hidden>
                                                    <button type="submit" class="btn btn-primary" style="width: 95px">Berangkat</button>
                                                </form>
                                            <?php else: ?>
                                                <button type="button" class="btn btn-primary disabled" style="width: 95px">Berangkat</button>
                                            <?php endif; ?>
                                        </div>  
                                        <div class="col-6 text-center">
                                            <form action="<?php echo e(url("barang/manifest/print")); ?>" method="get" target="_blank">
                                                <input type="text" name="no_manifest" value="<?php echo e(encrypt($barang->no_manifest)); ?>" hidden>
                                                <button type="submit" class="btn btn-primary" style="width: 95px">Cetak</button>
                                            </form>
                                        </div>   
                                            <div class="col-6 text-center">
                                                <?php if(($barang->last_id_message_tracking == 2) && ($barang->tujuan == $kodeKota->kota || $name == "superadmin")): ?> 
                                                    <form action="<?php echo e(url("barang/manifest/sampai")); ?>" method="get">
                                                        <input type="text" name="no_manifest" value="<?php echo e(encrypt($barang->no_manifest)); ?>" hidden>
                                                        <button type="submit" class="btn btn-primary" style="width: 95px">Sampai</button>
                                                    </form>
                                                <?php else: ?>
                                                    <button type="button" class="btn btn-primary disabled" style="width: 95px">Sampai</button>
                                                <?php endif; ?>
                                            </div>    
                                        <div class="col-6 text-center">
                                            <button type="button" class="btn btn-primary" id="btnGetTracking" style="width: 95px" value="<?php echo e(encrypt($barang->no_manifest)); ?>" data-bs-toggle="modal" data-bs-target="#modalTracking">Lacak</button>
                                        </div>  
                                    </div>   
                                </td>  
                            </tr>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
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
            $('#tableId').DataTable({
                responsive: true
            }); 
            // table.on('order.dt search.dt', function () {
            //     let i = 1;
        
            //     table.cells(null, 0, { search: 'applied', order: 'applied' }).every(function (cell) {
            //         this.data(i++);
            //     });
            // }).draw();

            $('#tableId tbody').on('click', '#btnGetTracking', function () { 
                $("#overlayLoading").css("visibility", "visible");   

                var value = $(this).val(); 

                $('#parentTableIdTracking').empty();
                $('#parentTableIdTracking').append("<table id='tableIdTracking' class='display'><thead><tr><th>Deskripsi Tracking</th><th>Tanggal</th></tr></thead><tbody></tbody></table>");

                $('#tableIdTracking').DataTable({ 
                    processing: true,
                    ajax: {
                        url: '/barang/manifest/tracking',
                        type: 'POST',
                        dataType: "json",
                        contentType: "application/json; charset=utf-8;", 
                        headers: {
                            'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'
                        },
                        "data": function ( d ) {
                            d.no_manifest = value;
                            return JSON.stringify( d );
                        },
                        statusCode: {
                            404: function() {
                                alert( "Tidak ditemukan" );
                            }
                        },
                    },
                    columns: [   
                        {data: "pesan"}, 
                        {data: "created"},  
                    ],  
                    pageLength: 10,
                });

                $("#overlayLoading").css("visibility", "hidden");    
            }); 

            
  
            $('#overlayLoading').css('visibility', 'hidden');
            
            $("#printManifest").click(function (e) { 
                e.preventDefault(); 
            }); 
             
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\agi\Desktop\kerja\Kargo Website\resources\views/page/admin/manifest/CargoPengirimanTrukManifest.blade.php ENDPATH**/ ?>