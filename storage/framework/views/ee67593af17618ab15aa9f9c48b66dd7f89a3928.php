<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo e($detail->nama_pengirim); ?>_<?php echo e($detail->created); ?>_<?php echo e($user->kota); ?>_<?php echo e((new DateTime(null, new DateTimeZone('Asia/Jakarta')))->getTimestamp()); ?></title>

    <style>
        body{ 
            margin: -50px -50px;
        }
    </style>

</head>
<body>
    <div class="row justify-content-center align-items-center g-2">
        <div style="border-width: 5px;border-style: solid;" class="container">
            <div class="row">
                <h2 style="border-bottom-style: solid;">disini letak kode agen</h2>
                <div class="col-md-7">
                    <h3> Metode Pembayaran </h3>
                    <h3><?php echo e($detail->pesan); ?></h3>
                </div>
            </div>
        </div>
    </div>
</body>
</html><?php /**PATH D:\Kargo Website\resources\views/page/admin/Bus/Resi/CetakBarang.blade.php ENDPATH**/ ?>