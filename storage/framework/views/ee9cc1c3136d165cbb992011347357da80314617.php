<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo e($detail->nama_pengirim); ?>_<?php echo e($detail->created); ?>_<?php echo e($user->kota); ?>_<?php echo e((new DateTime(null, new DateTimeZone('Asia/Jakarta')))->getTimestamp()); ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <style>
        *{
            font-family: 'Roboto Condensed', sans-serif;
        }
        body{
            margin: -50px -50px;
            height: 500px;
        }
        .table-metode-pembayaran th, .table-metode-pembayaran td{
            width: 282px;
            border: 2px solid black;
            border-collapse: collapse;
            padding-left: 2px;
        }
        .table-penerima th, .table-penerima td{            
            border: 2px solid black;
            border-collapse: collapse;
            padding-left: 2px;
            width: 280px;
        }
        .table-goods th, .table-goods td{
            border: 2px solid black;
            border-collapse: collapse;
            width: 187px;
            text-align: center;
        }
        .table-berat th, .table-berat td{
            border: 2px solid black;
            border-collapse: collapse;
            padding-left: 2px;
            width: 186px;
            text-align: center;
        }
        .table-asal th, .table-asal td {
            border: 2px solid black;
            border-collapse: collapse;
            padding-left: 2px;
            width: 282px;
            text-align: center;
        }
    </style>
  </head>
  <body>
<?php for($i = 0; $i < $detail->jumlah_barang; $i++): ?>
    <div style="border-width: 5px;border-style:solid;border-collapse: collapse;" class="container">
        <div paddingspan="3" class="card border-primary">
            <table>
                <tbody>
                    <tr>
                        <td>
                            <img src="logo.png" width="100px" height="100px" alt="logo tiara mas">
                        </td>
                        <td>
                            <h2 style="margin-left: 10px;">Tiara Mas</h2>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <b><caption style="width:550px;text-align:center;"><?php echo e($detail->kode_kota_asal); ?>-<?php echo e($detail->kode_wilayah_asal); ?>-<?php echo e($detail->id_user); ?></caption></b>
        <div class="row">
            <div class="col metode-pembayaran">
                <table class="table-metode-pembayaran">
                    <tbody>
                        <tr>
                            <th style="border-bottom-style: hidden;border-left-style: hidden;">
                                Metode Pembayaran :
                            </th>
                            <td rowspan="2" style="border-right-style:hidden;text-align:center;padding-top:10px;">
                                <?php
                                    echo '<img src="data:image/png;base64,' . DNS2D::getBarcodePNG($detail->no_resi, "QRCODE") . '" alt="barcode" width="100" height="100"   />';
                                ?>
                                <br>
                                <?php echo e($detail->no_resi); ?>

                            </td>
                        </tr>
                        <tr>
                            <td style="border-left-style: hidden;font-size:50px;">
                                <?php echo e(ucfirst($detail->pesan)); ?>

                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col penerima">
                <table class="table-penerima">
                    <thead>
                        <tr>
                            <th style="border-bottom-style: hidden;border-top-style: hidden;border-left-style: hidden;">
                                Pengirim :
                            </th>
                            <th style="border-bottom-style: hidden;border-top-style: hidden;">
                                Penerima :
                            </th>
                        </tr>
                    </thead>
                    <tbody>                    
                        <tr>
                            <td style="border-left-style: hidden;padding-top:20px;padding-bottom:20px;">
                                <?php echo e($detail->nama_pengirim); ?>

                            </td>
                            <td style="padding-top:20px;padding-bottom:20px;">
                                <?php echo e($detail->nama_penerima); ?>

                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col goods">
                <table class="table-goods">
                    <thead>
                        <tr>
                            <th style="border-left-style: hidden;border-top-style: hidden;">
                                Jenis Paket
                            </th>
                            <th style="border-top-style: hidden;">
                                Nama Barang
                            </th>
                            <th style="border-top-style: hidden;border-right-style: hidden;">
                                Jumlah Koli
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="border-left-style: hidden;padding-top: 20px;padding-bottom: 20px;">
                                <?php echo e($detail->jenis_paket); ?>

                            </td>
                            <td style="padding-top: 20px;padding-bottom: 20px;">
                                <?php echo e($detail->jenis_barang); ?>

                            </td>
                            <td style="border-right-style: hidden;padding-top: 20px;padding-bottom: 20px;">
                                <?php echo e($detail->jumlah_barang); ?> <?php echo e($detail->code); ?>

                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col berat">
                <table class="table-berat">
                    <thead>
                        <tr>
                            <th style="border-left-style:hidden;border-top-style:hidden;"">
                                Koli Ke
                            </th>
                            <th style="border-top-style:hidden;">
                                Berat
                            </th>
                            <th style="border-right-style:hidden;border-top-style:hidden;">
                                Keterangan
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="border-left-style:hidden;">
                                <?php echo e($i + 1); ?>

                            </td>
                            <td style="padding-top: 35px;padding-bottom: 35px;">
                                <?php echo e($detail->berat); ?> Kg
                            </td>
                            <td style="border-right-style: hidden;">
                                <?php echo e($detail->keterangan); ?>

                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col asal">
                <table class="table-asal">
                    <thead>
                        <tr>
                            <th style="border-left-style: hidden;border-top-style: hidden;">
                                Asal
                            </th>
                            <th style="border-right-style: hidden;border-top-style: hidden;">
                                Tujuan
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="border-left-style: hidden;padding-bottom:35px;padding-top:35px;">
                                <?php echo e($detail->asal); ?>

                            </td>
                            <td style="border-right-style: hidden;padding-bottom:35px;padding-top:35px;">
                                <?php echo e($detail->tujuan); ?>

                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php endfor; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html><?php /**PATH D:\Kargo Website\resources\views/page/admin/Bus/resi/CetakBarang.blade.php ENDPATH**/ ?>