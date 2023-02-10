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
<<<<<<<< HEAD:storage/framework/views/8fd4ab1ab6e6d39f058b28a108db7f4076de49e1.php
                        <a role="button" class="fs-5 btn btn-success w-100" href="<?php echo e(url('barang/manifest/create')); ?>">Tambah Manifest</a>
========
                        @if (Auth::user()->jenis_user == "bus")
                        <a role="button" class="fs-5 btn btn-success w-100" href="{{ url('/barang/manifest/bus/create') }}">Tambah Manifest</a>
                        @elseif (Auth::user()->jenis_user == "truk")
                        <a role="button" class="fs-5 btn btn-success w-100" href="{{ url('barang/manifest/create') }}">Tambah Manifest</a>
                        @endif
>>>>>>>> a1d66252d031d8304a268ea3ce5a09ee09d6e01d:resources/views/page/admin/manifest/CargoPengirimanTrukManifest.blade.php
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
<<<<<<<< HEAD:storage/framework/views/8fd4ab1ab6e6d39f058b28a108db7f4076de49e1.php
                    <?php $__currentLoopData = $allCargo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $barang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                        <?php if($barang->no_manifest): ?> 
========
                    @if (Auth::user()->jenis_user == "truk")
                    @foreach ($allCargo as $barang) 
                        @if ($barang->no_manifest) 
>>>>>>>> a1d66252d031d8304a268ea3ce5a09ee09d6e01d:resources/views/page/admin/manifest/CargoPengirimanTrukManifest.blade.php
                            <tr>
                                <td data-toggle="tooltip" data-placement="top" title="Jenis Pengiriman <?php echo e($barang->jenis_pengiriman); ?>"><?php echo e($loop->index + 1); ?></td> 
                                <td><?php echo e($barang->no_manifest); ?></td>  
                                <td><?php echo e($barang->no_pol); ?></td>   
                                <td><?php echo e($barang->sopir ? $barang->sopir : $barang->sopir_utama); ?></td>  

                                <td><?php echo e($barang->asal); ?></td>  

                                <td>
                                    <div class="row justify-content-start align-items-center g-2 px-3">
<<<<<<<< HEAD:storage/framework/views/8fd4ab1ab6e6d39f058b28a108db7f4076de49e1.php
                                        <?php if($barang->last_id_message_tracking == 1  && ($barang->asal == $kodeKota->kota || $name == "superadmin")): ?> 
                                        <div class="col-6 text-center">
                                                <form action="<?php echo e(url("barang/manifest/berangkat")); ?>" method="post">
                                                    <?php echo csrf_field(); ?>
                                                    <input type="text" name="no_manifest" value="<?php echo e(encrypt($barang->no_manifest)); ?>" hidden>
                                                    <button type="submit" class="btn btn-primary" style="width: 95px">Berangkat</button>
                                                </form> 
                                        </div>  
                                        <?php endif; ?>
========
                                        @if ($barang->last_id_message_tracking == 1  && ($barang->asal == $kodeKota->kota || $name == "superadmin")) 
                                        <div class="col-6 text-center">
                                                <form action="{{ url("barang/manifest/berangkat") }}" method="post">
                                                    @csrf
                                                    <input type="text" name="no_manifest" value="{{ encrypt($barang->no_manifest) }}" hidden>
                                                    <button type="submit" class="btn btn-primary" style="width: 95px">Berangkat</button>
                                                </form> 
                                        </div>  
                                        @endif
>>>>>>>> a1d66252d031d8304a268ea3ce5a09ee09d6e01d:resources/views/page/admin/manifest/CargoPengirimanTrukManifest.blade.php
                                        <div class="col-6 text-center">
                                            <form action="<?php echo e(url("barang/manifest/print")); ?>" method="get" target="_blank">
                                                <input type="text" name="no_manifest" value="<?php echo e(encrypt($barang->no_manifest)); ?>" hidden>
                                                <button type="submit" class="btn btn-primary" style="width: 95px">Cetak</button>
                                            </form>
                                        </div>   
<<<<<<<< HEAD:storage/framework/views/8fd4ab1ab6e6d39f058b28a108db7f4076de49e1.php
                                            <?php if(($barang->last_id_message_tracking == 2) && ($barang->tujuan == $kodeKota->kota || $name == "superadmin")): ?> 
                                            <div class="col-6 text-center">
                                                    <form action="<?php echo e(url("barang/manifest/sampai")); ?>" method="get">
                                                        <input type="text" name="no_manifest" value="<?php echo e(encrypt($barang->no_manifest)); ?>" hidden>
                                                        <button type="submit" class="btn btn-primary" style="width: 95px">Sampai</button>
                                                    </form> 
                                            </div>    
                                            <?php endif; ?>
                                        <div class="col-6 text-center">
                                            <button type="button" class="btn btn-primary <?php echo e(($barang->is_lunas && $barang->is_diterima) ? "w-100" : ""); ?>" id="btnGetTracking" style="width: 95px" value="<?php echo e(encrypt($barang->no_manifest)); ?>" data-bs-toggle="modal" data-bs-target="#modalTracking">Lacak</button>
========
                                            @if (($barang->last_id_message_tracking == 2) && ($barang->tujuan == $kodeKota->kota || $name == "superadmin")) 
                                            <div class="col-6 text-center">
                                                    <form action="{{ url("barang/manifest/sampai") }}" method="get">
                                                        <input type="text" name="no_manifest" value="{{ encrypt($barang->no_manifest) }}" hidden>
                                                        <button type="submit" class="btn btn-primary" style="width: 95px">Sampai</button>
                                                    </form> 
                                            </div>    
                                            @endif
                                        <div class="col-6 text-center">
                                            <button type="button" class="btn btn-primary {{ ($barang->is_lunas && $barang->is_diterima) ? "w-100" : "" }}" id="btnGetTracking" style="width: 95px" value="{{ encrypt($barang->no_manifest) }}" data-bs-toggle="modal" data-bs-target="#modalTracking">Lacak</button>
>>>>>>>> a1d66252d031d8304a268ea3ce5a09ee09d6e01d:resources/views/page/admin/manifest/CargoPengirimanTrukManifest.blade.php
                                        </div>  
                                    </div>   
                                </td>  
                            </tr>
<<<<<<<< HEAD:storage/framework/views/8fd4ab1ab6e6d39f058b28a108db7f4076de49e1.php
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
========
                        @endif
                    @endforeach 
                    @elseif (Auth::user()->jenis_user == "bus")
                    @foreach ($allWilayah as $barang)
                        @if ($barang->no_manifest) 
                            <tr>
                                <td data-toggle="tooltip" data-placement="top" title="Jenis Pengiriman {{ $barang->jenis_pengiriman }}">{{ $loop->index + 1 }}</td> 
                                <td>{{ $barang->no_manifest }}</td>  
                                <td>{{ $barang->no_pol }}</td>   
                                <td>{{ $barang->sopir ? $barang->sopir : $barang->sopir_utama }}</td>  

                                <td>{{ \Carbon\Carbon::parse($barang->created)->format('d-M-y') }}</td>  

                                <td>
                                    <div class="row justify-content-start align-items-center g-2 px-3">
                                        @if ($barang->last_id_message_tracking == 1  && ($barang->asal == $wilayah->wilayah || $name == "superadmin")) 
                                        <div class="col-6 text-center">
                                                <form action="{{ url("barang/manifest/berangkat") }}" method="post">
                                                    @csrf
                                                    <input type="text" name="no_manifest" value="{{ encrypt($barang->no_manifest) }}" hidden>
                                                    <button type="submit" class="btn btn-primary" style="width: 95px">Berangkat</button>
                                                </form> 
                                        </div>  
                                        @endif
                                        <div class="col-6 text-center">
                                            <form action="{{ url("/barang/manifest-bus/print") }}" method="get" target="_blank">
                                                <input type="text" name="no_manifest" value="{{ encrypt($barang->no_manifest) }}" hidden>
                                                <button type="submit" class="btn btn-primary" style="width: 95px">Cetak</button>
                                            </form>
                                        </div>   
                                            @if (($barang->last_id_message_tracking == 2) && ($barang->tujuan == $wilayah->wilayah || $name == "superadmin")) 
                                            <div class="col-6 text-center">
                                                    <form action="{{ url("barang/manifest/sampai") }}" method="get">
                                                        <input type="text" name="no_manifest" value="{{ encrypt($barang->no_manifest) }}" hidden>
                                                        <button type="submit" class="btn btn-primary" style="width: 95px">Sampai</button>
                                                    </form> 
                                            </div>    
                                            @endif
                                        <div class="col-6 text-center">
                                            <button type="button" class="btn btn-primary {{ ($barang->is_lunas && $barang->is_diterima) ? "w-100" : "" }}" id="btnGetTracking" style="width: 95px" value="{{ encrypt($barang->no_manifest) }}" data-bs-toggle="modal" data-bs-target="#modalTracking">Lacak</button>
                                        </div>  
                                    </div>   
                                </td>  
                            </tr>
                        @endif
                    @endforeach 
                    @endif
>>>>>>>> a1d66252d031d8304a268ea3ce5a09ee09d6e01d:resources/views/page/admin/manifest/CargoPengirimanTrukManifest.blade.php
                    </tbody>
                </table>
            </div> 
        </div> 
    </div>
<?php $__env->stopSection(); ?>

<<<<<<<< HEAD:storage/framework/views/8fd4ab1ab6e6d39f058b28a108db7f4076de49e1.php
<?php $__env->startSection('footer'); ?>
    <?php echo $__env->make("layouts.footerAdmin", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
<?php $__env->stopSection(); ?>
========
@section('footer')
    @include("layouts.footerAdmin") 
@endsection
>>>>>>>> a1d66252d031d8304a268ea3ce5a09ee09d6e01d:resources/views/page/admin/manifest/CargoPengirimanTrukManifest.blade.php

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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Asus\Downloads\Kargo Website Pengiriman v.1.1.5\Kargo Website\resources\views/page/admin/manifest/CargoPengirimanTrukManifest.blade.php ENDPATH**/ ?>