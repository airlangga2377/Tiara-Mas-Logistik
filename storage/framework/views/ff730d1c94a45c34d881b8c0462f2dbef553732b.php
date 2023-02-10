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
        <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
            
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="parentTableIdTracking"> 
                <table id="tableIdTracking" class="display">
                    <thead>
                        <tr> 
                            <th>Deskripsi Tracking</th> 
                            <th>Status Pembayaran</th> 

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

<<<<<<< HEAD
     
=======
    
    <?php if($errors->any()): ?>
        <script>
            alert($errors->first()); 
        </script>
    <?php endif; ?> 
>>>>>>> a1d66252d031d8304a268ea3ce5a09ee09d6e01d
    <div class="container"> 
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo e(url('home')); ?>">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Barang</li> 
            </ol>
        </nav>
    </div>
    <div class="container-fluid"> 
        <div class="row justify-content-center align-items-center g-2">
            <div class="col">
                <p class="fs-1 text text-center">Semua Barang</p>
            </div> 
        </div>
        <div class="row justify-content-center align-items-start">
            <div class="col-auto shadow-sm p-3 float-start">
                <div class="row-auto justify-content-center align-items-center">
                    <div class="col-12">
                        <label for="jenisBarang" class="fs-5 form-label fw-bold w-100">Fitur</label>  
                    </div>
                    <div class="col-12 pt-2"> 
                        <?php if(Auth::user()->is_user_superadmin): ?>
                            <div class="dropdown dropend">
                                <button class="btn fs-5 btn btn-success dropdown-toggle" type="button" id="triggerId" data-bs-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        Tambah Pengiriman
                                        </button>
                                <div class="dropdown-menu" aria-labelledby="triggerId">
                                    <a role="button" class="dropdown-item" href="barang/truk/insert#pengiriman">Truk</a>
                                    <a role="button" class="dropdown-item" href="barang/bus/insert#pengiriman">Bus</a>
                                </div>
                            </div>
                        <?php else: ?>
                            <a role="button" class="fs-5 btn btn-success" href="<?php echo e(url('barang/' . $jenisUser .'/insert#pengiriman')); ?>">Tambah Pengiriman</a>
                        <?php endif; ?>
                    </div>  
                    <div class="col-12 pt-2 ">
                        <a role="button" class="fs-5 btn btn-success w-100" href="<?php echo e(url('barang/manifest')); ?>">Manifest</a>
                    </div>  
                </div>
            </div>
            <div class="col-8 shadow-sm p-3" id="tableIdParent">  
                <?php if($errors->any()): ?>
                    <div class="fs-5 alert alert-danger bg-danger text-white border-0 text-center" role="alert" id="toggleStatusPengiriman">
                        <?php echo e(session('errors')->first('message')); ?> 
                        <button type="button" class="btn-close float-end" id="btnCloseErrorMessage" aria-label="Close"></button>
                    </div>
                <?php endif; ?> 
                <table id="tableId" class="display">
                    <thead>
                        <tr> 
                            <th></th>
                            <th>Pengirim</th>
                            <th>Penerima</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                            <th>Resi</th>

                            <th>Tanggal</th>

                            <th class="text text-center">Ubah</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $allCargo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $barang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                            <?php if(!($barang->jenis_pengiriman != $jenisUser && !Auth::user()->is_user_superadmin)): ?>
                                <tr>
                                    <td class="<?php if($barang->is_lunas && $barang->is_diterima): ?> bg-success text-white <?php endif; ?>" data-toggle="tooltip" data-placement="top" title="Jenis Pengiriman <?php echo e($barang->jenis_pengiriman); ?>"><?php echo e($loop->index + 1); ?></td> 
                                    <td><?php echo e(explode(" ", $barang->nama_pengirim)[0]); ?></td> 
                                    <td><?php echo e(explode(" ", $barang->nama_penerima)[0]); ?></td> 
                                    <td><?php echo e($barang->biaya); ?></td>  
                                    <td><?php echo e($barang->jumlah_barang); ?></td>  

                                    <td><?php echo e($barang->no_resi); ?></td>  

                                    <td><?php echo e($barang->last_id_message_tracking); ?></td>  

                                    <td>
                                        <div class="row justify-content-start align-items-center g-2 px-3">
                                            <?php if(!$barang->is_diterima && $barang->no_manifest && $barang->last_id_message_tracking == 3 && ($kodeKota->kota == $barang->tujuan || $name == "superadmin")): ?> 
                                                <div class="col-6 text-center">
                                                    
                                                        <form action="<?php echo e(url("barang/update/diterima")); ?>" method="get">
                                                            <input type="text" name="no_lmt" value="<?php echo e(encrypt($barang->no_lmt)); ?>" hidden>
                                                            <button type="submit" class="btn btn-primary" style="width: 75px">Terima</button>
                                                        </form>
                                                </div>
                                            <?php endif; ?>
<<<<<<< HEAD
                                            <div class="<?php echo e((!$barang->is_lunas || !$barang->is_diterima) ? "col-6" : "col-12"); ?> text-center">
                                                <?php if($barang->jenis_pengiriman == "truk"): ?>
                                                    <form action="<?php echo e(url("barang/truk/print/deliverynote")); ?>" method="get" target="_blank">
                                                        <input type="text" name="no_lmt" value="<?php echo e(encrypt($barang->no_lmt)); ?>" hidden>
                                                        <button type="submit" class="btn btn-primary <?php echo e(($barang->is_lunas && $barang->is_diterima) ? "w-100" : ""); ?>" style="width: 75px">Cetak</button>
                                                    </form>
                                                <?php else: ?>
                                                    <div class="dropdown dropend">
                                                        <button class="btn btn-primary dropdown-toggle <?php echo e(($barang->is_lunas && $barang->is_diterima) ? "w-100" : ""); ?>" type="button" id="triggerId" data-bs-toggle="dropdown" aria-haspopup="true" style="width: 75px"
                                                                aria-expanded="false">
                                                                Cetak
                                                                </button>
                                                        <div class="dropdown-menu" aria-labelledby="triggerId">
                                                            <a role="button" type="submit" class="dropdown-item" href="barang/bus/print/resi?no_lmt=<?php echo e(encrypt($barang->no_lmt)); ?>" target="_blank">Resi</a>
                                                            <a role="button" type="submit" class="dropdown-item" href="barang/bus/print/barang?no_lmt=<?php echo e(encrypt($barang->no_lmt)); ?>" target="_blank">Barang</a> 
                                                        </div>
                                                    </div>
                                                <?php endif; ?>
                                            </div> 
=======
                                        </div>
                                        <div class="<?php echo e((!$barang->is_lunas || !$barang->is_diterima) ? "col-6" : "col-12"); ?> text-center">
                                            <form action="<?php echo e(url("barang/truk/print/deliverynote")); ?>" method="get" target="_blank">
                                                <input type="text" name="no_lmt" value="<?php echo e(encrypt($barang->no_lmt)); ?>" hidden>
                                                <button type="submit" class="btn btn-primary <?php echo e(($barang->is_lunas && $barang->is_diterima) ? "w-100" : ""); ?>" style="width: 75px">Cetak</button>
                                            </form>
                                        </div> 
                                        <div class="col-6 text-center">
>>>>>>> a1d66252d031d8304a268ea3ce5a09ee09d6e01d
                                            <?php
                                                $isBayarTujuan = $barang->id_status_pembayaran == 1;
                                                $isPiutang = $barang->id_status_pembayaran == 3;
                                            ?>
                                            <?php if($barang->no_manifest && !$barang->is_lunas && ($isBayarTujuan || $isPiutang)): ?> 
                                                <div class="col-6 text-center">
                                                        <form action="<?php echo e(url("barang/update/lunas")); ?>" method="get">
                                                            <input type="text" name="no_lmt" value="<?php echo e(encrypt($barang->no_lmt)); ?>" hidden>
                                                            <button type="submit" class="btn btn-primary" style="width: 75px">Lunas</button>
                                                        </form>
                                                </div>  
                                            <?php endif; ?>
                                            <?php if(!$barang->no_manifest && !$barang->is_lunas && !$barang->last_id_message_tracking): ?>  
<<<<<<< HEAD
                                                <div class="col-6 text-center">
                                                        <form action="<?php echo e(url("barang/delete")); ?>" method="get">
                                                            <input type="text" name="no_lmt" value="<?php echo e(encrypt($barang->no_lmt)); ?>" hidden>
                                                            <button type="submit" class="btn btn-danger" style="width: 75px">Hapus</button>
                                                        </form> 
                                                </div> 
                                            <?php endif; ?>
                                            <div class="<?php echo e(($barang->is_lunas && $barang->is_diterima) ? "col-12" : "col-6"); ?> text-center" data-bs-toggle="modal" data-bs-target="#modalTracking">
                                                <button type="button" class="btn btn-primary <?php echo e(($barang->is_lunas && $barang->is_diterima) ? "w-100" : ""); ?>" id="btnGetTracking" value="<?php echo e(encrypt($barang->no_lmt)); ?>" style="width: 75px">Lacak</button>
                                            </div>     
                                        </div> 
                                    </td>  
                                </tr>
                            <?php endif; ?>
=======
                                                <form action="<?php echo e(url("barang/truk/delete")); ?>" method="get">
                                                    <input type="text" name="no_lmt" value="<?php echo e(encrypt($barang->no_lmt)); ?>" hidden>
                                                    <button type="submit" class="btn btn-danger" style="width: 75px">Hapus</button>
                                                </form>
                                            <?php elseif(!$barang->is_lunas || !$barang->is_diterima): ?>
                                                <button type="button" class="btn btn-secondary disabled" style="width: 75px">Hapus</button>
                                            <?php endif; ?>
                                        </div> 
                                        <div class="<?php echo e(($barang->is_lunas && $barang->is_diterima) ? "col-12" : "col-6"); ?> text-center" data-bs-toggle="modal" data-bs-target="#modalTracking">
                                            <button type="button" class="btn btn-primary <?php echo e(($barang->is_lunas && $barang->is_diterima) ? "w-100" : ""); ?>" id="btnGetTracking" value="<?php echo e(encrypt($barang->no_lmt)); ?>" style="width: 75px">Lacak</button>
                                        </div>   
                                    </div> 
                                </td>  
                            </tr>
>>>>>>> a1d66252d031d8304a268ea3ce5a09ee09d6e01d
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                    </tbody>
                </table>
            </div> 
        </div> 
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
    <?php echo $__env->make("layouts.footerAdmin", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script-body-bottom'); ?>  
    <script> 
        $(document).ready( function () {
            var table = $('#tableId').DataTable({  
                pageLength: 10,
            });

            table.on('order.dt search.dt', function () {
                let i = 1;
        
                table.cells(null, 0, { search: 'applied', order: 'applied' }).every(function (cell) {
                    this.data(i++);
                });
            }).draw();

            $('#tableId tbody').on('click', '#btnGetTracking', function () {
                $("#overlayLoading").css("visibility", "visible");   

                var value = $(this).val(); 

                $('#parentTableIdTracking').empty();
                $('#parentTableIdTracking').append("<table id='tableIdTracking' class='display'><thead><tr><th>Deskripsi Tracking</th><th>Status Pembayaran</th><th>Tanggal</th></tr></thead><tbody></tbody></table>");
                
                $('#tableIdTracking').DataTable({ 
                    processing: true,
<<<<<<< HEAD
                    order: [[2,'desc']],
=======
>>>>>>> a1d66252d031d8304a268ea3ce5a09ee09d6e01d
                    ajax: {
                        url: '/barang/tracking',
                        type: 'POST',
                        dataType: "json",
                        contentType: "application/json; charset=utf-8;", 
                        headers: {
                            'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'
                        },
                        "data": function ( d ) {
                            d.no_lmt = value;
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
                        {data: "pembayaran"},  
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
            
            $("#btnCloseErrorMessage").click(function (e) { 
                e.preventDefault();
                $("#toggleStatusPengiriman").toggle();
            });
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\agi\Desktop\kerja\Kargo Website\resources\views/page/admin/CargoBarang.blade.php ENDPATH**/ ?>