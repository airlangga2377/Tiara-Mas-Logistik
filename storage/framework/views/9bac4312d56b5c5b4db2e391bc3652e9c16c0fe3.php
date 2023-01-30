<?php $__env->startSection("preload"); ?>
    
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script> 

    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-rc.0/css/select2.css" integrity="sha512-PO7TIdn2hPTkZ6DSc5eN2DyMpTn/ZixXUQMDLUx+O5d7zGy0h1Th5jgYt84DXvMRhF3N0Ucfd7snCyzlJbAHQA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-rc.0/js/select2.full.js" integrity="sha512-Gu2OIWdShncC2h0KqZMOrDWTR0okm7pXBU3M1HuedqlVCDgMbz9BCQWx2AV72pvDAbPhyP9qR7hjk6pUXXj1xg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easy-loading/1.3.0/jquery.loading.js"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection("title"); ?> 
    <title>Cargo aja</title>
<?php $__env->stopSection(); ?> 

<?php $__env->startSection('top-nav-bar'); ?> 
    <?php echo $__env->make('layouts.loggednav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection("content"); ?>  

<div class="container">  
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo e(url('home')); ?>">Home</a></li> 
            <li class="breadcrumb-item"><a href="<?php echo e(url('barang')); ?>">Barang</a></li> 
            <li class="breadcrumb-item"><a href="<?php echo e(url('barang/manifest')); ?>">Manifest</a></li>  
            <li class="breadcrumb-item active" aria-current="page">Tambah Manifest</li>   
        </ol>
    </nav>

    <form action="<?php echo e(url("/barang/manifest-bus/create")); ?>" method="post">
        <?php echo csrf_field(); ?>  
        <div class="row justify-content-center align-items-center g-2">
            <div class="col">
                <p class="fs-1 text text-center" id="manifest">Input Manifest</p>
            </div> 
        </div>
        <div class="row justify-content-between g-3"> 
            <div class="col p-2 rounded-2 justify-content-center shadow-sm bg-light text-dark">   
                
                <?php if($errors->any()): ?>
                    <div class="fs-5 alert alert-danger bg-danger text-white border-0 text-center" role="alert">
                        <?php echo $errors->first(); ?>

                    </div>
                <?php endif; ?>

                <?php if(Session::has("message")): ?> 
                    <div class="fs-5 alert alert-success bg-success text-white border-0 text-center" role="alert" id="toggleStatusPengiriman">
                        <?php echo Session::get("message"); ?>

                        <script> 
                            window.open("/barang/manifest-bus/print?no_manifest=<?php echo Session::get('no_manifest'); ?>&sopir=<?php echo Session::get('sopir'); ?>", "_blank")
                        </script>
                    </div>
                <?php endif; ?>  
                
                <div class="row mb-3 justify-content-center">
                    <div class="col"> 
                        <label for="tujuan" class="form-label fs-4">Tujuan</label>  
                        <select class="form-select" aria-label="Pilih tujuan" id="selectBoxTujuan" data-live-search="true" name="tujuan">
                            <option disabled <?php if(old("tujuan") == null || old() == null): ?> selected <?php endif; ?> value>Semua Tujuan</option>
                            <?php $__currentLoopData = $allWilayah; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $wilayah): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                                           
                                <?php if($wilayah->wilayah != "$wilayah->kota" || $isUserSuperadmin): ?> <option value="<?php echo e($wilayah->wilayah); ?>" <?php if(old("tujuan") == "<?php echo e($wilayah->wilayah); ?>"): ?> selected <?php endif; ?>><?php echo e($wilayah->wilayah); ?></option> <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                     
                        </select>
                    </div>   
                </div> 
                <div class="row mb-3 justify-content-center ">   
                    <table id="tableId" class="display">
                        <thead>
                            <tr> 
                                <th></th>
                                <th>Nama Pengirim</th>
                                <th>No Resi</th>

                                <th>Pembayaran</th>
    
                                <th>Tanggal</th>
                                
                                <th class="text text-center">Tambah</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                        </tbody>
                    </table>
                </div>  
                <div class="row mb-3 justify-content-center">
                    <div class="col"> 
                        <label for="no pol" class="form-label fs-4">No Pol</label>  
                        <select class="form-select" aria-label="Pilih no_pol" id="selectBoxNoPol" data-live-search="true" name="no_pol">
                            <option disabled <?php if(old("no_pol") == null || old() == null): ?> selected <?php endif; ?> value>Semua No Pol</option>
                            <?php $__currentLoopData = $allBus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bus): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                                
                            <option value="<?php echo e($bus->id_bus); ?>" <?php if(old("no_pol") == "<?php echo e($bus->no_pol); ?>"): ?> selected <?php endif; ?>><?php echo e($bus->no_pol); ?></option> 
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>  
                    <div class="col">
                        <label for="sopir" class="form-label fs-4">Nama Sopir (Isi jika tidak ada sopir utama)</label>
                        <input type="text" class="form-control shadow-sm p-2" name="sopir" id="selectBoxSopir" aria-describedby="sopirText" placeholder="isi nama sopir" value="<?php echo old('sopir'); ?>">
                    </div>
                </div> 
            </div> 
            <button type="submit" class="btn btn-success mt-2 fs-5 mh-30" id="btnSubmit">Buat Manifest</button>
        </div>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection("footer"); ?>
    <?php echo $__env->make("layouts.footerAdmin", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
<?php $__env->stopSection(); ?>

<?php $__env->startSection("script-body-bottom"); ?>  
    <script> 
        var count = 0;

        $(document).ready(function(){ 
            $("#overlayLoading").css("visibility", "hidden");   
            
            var table = $('#tableId').DataTable({ 
                processing: true,
                ajax: {
                    url: '/barang/manifest-bus/get',
                    type: 'POST',
                    dataType: "json",
                    contentType: "application/json; charset=utf-8;", 
                    headers: {
                        'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'
                    },
                    "data": function ( d ) {
                        d.tujuan = $('#selectBoxTujuan').find(":selected").val();
                        return JSON.stringify( d );
                    } 
                },
                columns: [   
                    {"defaultContent": ""}, 

                    {data: "nama_pengirim"}, 

                    {data: "no_resi"}, 
                    {data: "pesan"}, 
                    {data: "created"},  
                    {
                        data: "no_resi",
                        render: function (data, type, row) {
                            return "<input class='form-check-input border-dark' type='checkbox' value='" + data + "'>"
                        }, 
                        createdCell: function (td, cellData, rowData, row, col) {
                            $(td).attr('id', 'btnPilih');
                            $(td).addClass(['text', 'text-center']);
                        }
                    },
                ],  
                pageLength: 10,
            });

            table.on('order.dt search.dt', function () {
                let i = 1;
        
                table.cells(null, 0, { search: 'applied', order: 'applied' }).every(function (cell) {
                    this.data(i++);
                }); 
            }).draw();

            $('#tableId tbody').on('click', '#btnPilih input', function () { 
                $("#overlayLoading").css("visibility", "visible");   

                var attrName = $(this).attr('name');
                if(
                    attrName === ""
                    || attrName === undefined
                ){
                    count++;
                    $(this).attr('name', 'no_lmt[]');                                        
                }else{
                    count--;
                    $(this).removeAttr('name');
                }
                $("#overlayLoading").css("visibility", "hidden");    
            }); 

            $("#btnSubmit").click(function (e) {
                var tujuan = $('#selectBoxTujuan').find(":selected").val();
                var no_pol = $('#selectBoxNoPol').find(":selected").val();

                if(
                    count <= 0
                    || count > 27

                    || tujuan === "" 
                    || tujuan === undefined

                    || no_pol === "" 
                    || no_pol === undefined
                ){
                    e.preventDefault();
                }
                
                if(
                    count <= 0
                    || count > 27
                ){ 
                    $("#tableId").addClass(['bg-danger', 'text-light']);
                } else{ 
                    $('#tableId').removeClass(['bg-danger', 'text-light']);
                }

                if(
                    no_pol === "" 
                    || no_pol === undefined
                ){ 
                    $("#selectBoxNoPol").addClass(['bg-danger', 'text-light']);
                } else{ 
                    $('#selectBoxNoPol').removeClass(['bg-danger', 'text-light']);
                }
                
                if(
                    tujuan === "" 
                    || tujuan === undefined
                ){ 
                    $("#selectBoxTujuan").addClass(['bg-danger', 'text-light']);
                } else{ 
                    $('#selectBoxTujuan').removeClass(['bg-danger', 'text-light']);
                }
            });

            $("#selectBoxTujuan").change(function (e) { 
                table.ajax.reload();
            });
            $('#selectBoxTujuan').select2({
                width: "resolve"
            });
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts.app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Kargo Website\resources\views/page/admin/bus/manifest/CreateManifestBus.blade.php ENDPATH**/ ?>