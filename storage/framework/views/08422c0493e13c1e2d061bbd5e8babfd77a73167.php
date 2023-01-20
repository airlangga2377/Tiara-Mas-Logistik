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
            margin: 50px 10px;
        }

        .container-header{
            height: 150px;
        }
        .container-header, .container-header-foot{
            width: 100%; 
        }
        .container-good{
            width: 100%;
            height: 100%;
            float: left;
        }
        .table-good th, .table-good td{
            border: 1px solid black;
        }
        .table-good tfoot td{ 
            border: 0px solid black;
        }
        .table-good td{
            padding: auto 3px;
        } 

        .logo{  
            width:200px;  
            display: inline; 
        } 
        .logo img{  
            display: inline;
        } 

        .address{
            padding-left: 50px;
            width:700px;  
            display: inline-block;  
        }
        .address td{
            column-width: 100px;
        }
        .address p{
            display: block;  
        }

        .info-buyer{
            padding-left: 50px;
            width:400px;
            display: inline-block;  
        }
        .info-buyer p{
            display: block;  
        } 

        .text{
            font-size: 20px; 
            margin-bottom: 3px;
        } 
        .title{
            font-size: 25px; 
            font-weight: bold; 
        } 
        .border-none{
            border: 0px;
        }

        table{
            width: 100%; 
        }  
        td, th{
            padding: 2px;
            /* border: 1px solid black; */
            border-collapse: collapse;
        } 
        table{
            border-collapse: collapse; 
        }
    </style>
</head>
<body>
    <div class="row">
        <div class="container-header">
            <div class="logo"> 
                <img src="logo.png" alt="logo tiara mas">
            </div>
            <div class="address"> 
                <p class="text title">PT. Tiara Mas Transport</p>
                <table 
                > 
                    <tbody>
                        <tr>
                            <td class="text" style="text-align: justify;">Sumbawa:</td> 
                            <td class="text">Besar JL. Yos Sudarso (Depan MAKODIM)</td>
                        </tr> 
                        <tr>
                            <td></td>
                            <td class="text">Telp. (0371) 21241-21428</td>
                        </tr>
                        <tr>
                            <td class="text" style="text-align: justify;">Surabaya:</td>
                            <td class="text">Petokoan Sulung Mas Blok A-22 (Jl. Sulungkali No: 89)</td>
                        </tr> 
                        <tr>
                            <td></td>
                            <td class="text">Telp. (031) 3529402 Fax. (031) 3524592</td>
                        </tr>
                    </tbody> 
                </table> 
            </div>
            <div class="info-buyer">  
                <table> 
                    <tbody>
                        <tr>
                            <td class="text" style="font-size: 30px"><?php echo e(ucfirst($user->kodeKota()->kota)); ?>, <?php echo e($detail->created); ?></td>  
                        </tr> 
                        <tr> 
                            <td class="text">Kepada Yth :</td>
                        </tr>
                        <tr>
                            <td class="text">Tuan / Toko <?php echo e($detail->nama_penerima); ?></td> 
                        </tr>   
                    </tbody> 
                </table>  
            </div>
        </div>
        <div class="container-header-foot">
            <table style="margin-bottom: 10px">
                <tbody>
                    <tr>
                        <td class="text title" style="text-align: center; " colspan="6">LMT No. <?php echo e($detail->no_lmt); ?></td> 
                    </tr>
                </tbody>
            </table> 
            <div>
                <a style="display: inline-block; width: 450px;" class="text">Sopir: <?php echo e($detail->sopir); ?></a>
                <a style="display: inline-block; width: 450px;" class="text">No. Pol.: <?php echo e($detail->no_pol); ?></a>
                <a style="display: inline-block; width: 450px;" class="text">Tujuan: <?php echo e(ucfirst($detail->tujuan)); ?></a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="container-good"> 
            <table class="table-good" style="height: auto;">
                <thead>
                <tr>
                    <th>Coli</th>
                    <th>Code</th>
                    <th>JENIS BARANG</th>
                    <th>Berat Kg</th>
                    <th>Ongkos Rp.</th>
                    <th style="width: 30%;" rowspan="8">
                        <p style="font-size: 18px;">SYARAT-SYARAT</p>
                        <p style="font-size: 18px; text-align: justify;">1. Bila ongkos pengangkutan yang tidak dibayar oleh penerima barang kami kirim kembali pada pengirim kecuali ada perjanjian dimuka.</p>
                        <p style="font-size: 18px; text-align: justify;">2. Jika terjadi kecelakaan yang diluar tanggungan kemampuan kami misalnya kebakaran / kecelakaan bukan tanggung jawab kami.</p>
                        <p style="font-size: 18px; text-align: justify;">3. Barang-barang pembungkusannya kurang sempurna atau dingkus dengan karung (pecah, belah, lux, cair tertile disb ) tidak ditanggung kerusakannya.</p>
                        <p style="font-size: 18px; text-align: justify;">4. Claim dapat diajukan bila disaksikan pegawai kami pada waktu barang tersebut diterimakan.</p>
                        <p style="font-size: 18px; text-align: justify;">5. Dalam waktu 2 bulan setelan terima barang tidak ada teguran, bukan tanggung jawabkan.</p>
                        <p style="font-size: 18px; text-align: justify;">6. Bilamana terjadi kehilangan atas titipan ini penggantian max 10 kali dari biaya pengiriman yang tercamtumkan dalam surat angkutan (SA).</p>
                    </th>
                </tr>
                </thead>
                <tbody> 
                    <?php for($i = 0; $i < 7; $i++): ?>
                        <tr>
                            <?php if(count($data) > $i): ?> 
                                <td style="text-align: center;"><?php if($data[$i]): ?> <?php echo e($data[$i]->jumlah_barang); ?> <?php endif; ?></td>
                                <td style="text-align: center;"><?php if($data[$i]): ?> <?php echo e($data[$i]->code); ?> <?php endif; ?></td>
                                <td style="text-align: center;"><?php if($data[$i]): ?> <?php echo e($data[$i]->jenis_barang); ?> <?php endif; ?></td>
                                <td style="text-align: center;"><?php if($data[$i]): ?> <?php echo e($data[$i]->berat); ?> <?php endif; ?></td>
                                <td style="text-align: center;"><?php if($data[$i]): ?> <?php echo e($data[$i]->biaya); ?> <?php endif; ?></td>
                            <?php else: ?> 
                                <td style="text-align: center;"></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            <?php endif; ?>
                        </tr>
                    <?php endfor; ?> 
                </tbody>
                <tfoot>
                    <tr>
                        <td class="text" style="text-align: left; " colspan="2" >Nama Pengirim: <?php echo e($detail->nama_pengirim); ?></td>  
                        <td class="text" style="text-align: right; " colspan="2" >Jumlah Rp.</td>  
                        <td>
                            <p class="text title" style="text-align: start;"><?php echo e(number_format($detail->biaya,2,',','.')); ?></p>
                        </td> 
                        <td class="text" style="text-align: start; border: 1px solid black;" rowspan="3">Keterangan: <?php echo e($detail->keterangan); ?></td> 
                    </tr>
                    <tr>
                        <td class="text title" style="text-align: left; border: 1px black solid; color:white;" colspan="4">
                            //
                        </td>
                        <td> 
                        </td>   
                    </tr>
                    <tr>
                        <td colspan="2" rowspan="2">
                            <p class="text" style="text-align: center;">Tanda tangan Stempel Penerima Dan nama terang</p>
                        </td>  
                        <td colspan="3" rowspan="2"> 
                            <p class="text" style="text-align: center;"></p>
                        </td>  
                    </tr>    
                    <tr>
                        <td> 
                        </td>   
                    </tr>   
                    <tr>
                        <td colspan="2">   
                            <p class="text" style="text-align: center; height: 50px; text-justify: auto;"> (........................................................) </p>
                        </td>  
                        <td></td>
                        <td colspan="3" style="width: 100%;">  
                            <h3 style="text-align: center; border: 2px black solid; display: inline; padding: 10px; border-radius: 20px">ISI TIDAK DIPERIKSA</h3>
                        </td>   
                    </tr>  
                </tfoot>
            </table> 
        </div> 
    </div> 
    <div class="row">
        <table>
            <tbody>
                <tr>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html><?php /**PATH C:\Users\agi\Desktop\kerja\Kargo Website\resources\views/page/admin/CargoPengirimanTrukDeliveryNote.blade.php ENDPATH**/ ?>