<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo e($detail->nama_pengirim); ?>_<?php echo e($detail->created); ?>_<?php echo e($user->kota); ?>_<?php echo e((new DateTime(null, new DateTimeZone('Asia/Jakarta')))->getTimestamp()); ?></title>

    <!-- Bootstrap CSS --><!-- CSS only -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous"> -->

    <style>
        *{
            font-family: 'Roboto Condensed', sans-serif;
            padding: 0px; 
            margin: 0px;
        }  
        body{ 
            margin: 10px 10px;
        }
        .container-luar{
            border-style: solid;
            border-width: 5px;
        }
        .text-title {
            padding-left: 10px;
        }
        .address{
            padding-left: 300px;
            font-size: 20px;
        }

    </style>
</head>
<body>
    <div class="row">
        <div class="container-luar">
            <div class="row">
                <div class="container-header">
                        <table>
                            <thead>
                                <tr>
                                    <td class="logo"> 
                                        <img src="logo.png" width="100px" height="100px" alt="logo tiara mas">
                                    </td>
                                    <td>TIARA MAS</td>
                                    <td>
                                        <div class="address">
                                            <table>
                                                <tbody>
                                                    <tr>
                                                        <td><h5>BUKTI TANDA TERIMA KIRIMAN BARANG</h5></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </td>
                                    <td><?php echo DNS1D::getBarcodeHTML($detail->no_resi,"EAN13"); ?></td>
                                </tr>
                            </thead>
                        </table>    
                    
                </div>
                <div class="container-header-foot">
                    <table style="margin-bottom: 10px">
                        <tbody>
                            <tr>
                                <td class="text title" style="text-align: center; " colspan="6">Resi No. <?php echo e($detail->no_resi); ?></td> 
                            </tr>
                        </tbody>
                    </table> 
                    <div>
                        <a style="display: inline-block; width: 450px;" class="text">Sopir: <?php echo e($detail->sopir); ?></a>
                        <a style="display: inline-block; width: 450px;" class="text">No. Pol.: <?php echo e($detail->no_pol); ?></a>
                        <a style="display: inline-block; width: 450px;" class="text">Tujuan: <?php echo e($detail->tujuan); ?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html><?php /**PATH D:\Kargo Website\resources\views/page/admin/Bus/resi/CargoPengirimanBusResi.blade.php ENDPATH**/ ?>