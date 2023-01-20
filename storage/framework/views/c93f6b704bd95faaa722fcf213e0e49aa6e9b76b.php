<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo e($detail->nama_pengirim); ?>_<?php echo e($detail->created); ?>_<?php echo e($user->kota); ?>_<?php echo e((new DateTime(null, new DateTimeZone('Asia/Jakarta')))->getTimestamp()); ?></title>

    <!-- Bootstrap CSS --><!-- CSS only -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous"> -->

    <?php  
	function penyebut($nilai) {
		$nilai = abs($nilai);
		$huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
		$temp = "";
		if ($nilai < 12) {
			$temp = " ". $huruf[$nilai];
		} else if ($nilai <20) {
			$temp = penyebut($nilai - 10). " belas";
		} else if ($nilai < 100) {
			$temp = penyebut($nilai/10)." puluh". penyebut($nilai % 10);
		} else if ($nilai < 200) {
			$temp = " seratus" . penyebut($nilai - 100);
		} else if ($nilai < 1000) {
			$temp = penyebut($nilai/100) . " ratus" . penyebut($nilai % 100);
		} else if ($nilai < 2000) {
			$temp = " seribu" . penyebut($nilai - 1000);
		} else if ($nilai < 1000000) {
			$temp = penyebut($nilai/1000) . " ribu" . penyebut($nilai % 1000);
		} else if ($nilai < 1000000000) {
			$temp = penyebut($nilai/1000000) . " juta" . penyebut($nilai % 1000000);
		} else if ($nilai < 1000000000000) {
			$temp = penyebut($nilai/1000000000) . " milyar" . penyebut(fmod($nilai,1000000000));
		} else if ($nilai < 1000000000000000) {
			$temp = penyebut($nilai/1000000000000) . " trilyun" . penyebut(fmod($nilai,1000000000000));
		}     
		return $temp;
	}
 
	function terbilang($nilai) {
		if($nilai<0) {
			$hasil = "minus ". trim(penyebut($nilai));
		} else {
			$hasil = trim(penyebut($nilai));
		}     		
		return $hasil;
	}
 
 
	$angka = $detail->biaya;
	?>
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
            padding-bottom: 50px;
        }
        .tanda-terima{
            padding-left: 150px;
            font-size: 45px;
         }
        .barcode{
            padding-left: 200px;
            width: 50px;
            height: 50px;
            padding-bottom: 50px;
            margin-top: 25px;    
            margin-bottom: 50px;
        }
        .pengirim{
            display: flex;    
            border-style: solid;
            border-width: 2px;
            padding-bottom: 15%;
            padding-right: 200px;
            margin-right: -2px;
            margin-left: -2px;
            
        }
        .penerima{
            display: flex;    
            border-style: solid;
            border-width: 2px;
            padding-bottom: 14.6%;
            padding-right: 200px;
        }
        .pembayaran{
            display: flex;    
            border-style: solid;
            border-width: 2px;
            padding-bottom: 11%;
            margin-left: -2px;
            margin-right: -3%;
        }
        .jumlah-titipan{
            margin-top: -4px;
            margin-bottom: -2px;
            padding-bottom: 5px;
            margin-left: -2px;
            margin-right: -10px;
        }
        .biaya-barang{
            border-width: 2px;
            border-right-style: solid;
            border-left-style: solid;
            border-bottom-style: solid;
            margin-bottom: 3;
            margin-left: -0.1%;
            margin-right: -134%;
        }
        .terbilang{            
            border-left-style: hidden;
            border-right-style: solid;
            margin-right: -200px;
            margin-left: -150px;
        }
        .jenis-paket{
            margin-top: -6px;
            margin-left: -2px;
        }
        .asal-barang{
            margin-top: -7px;
            margin-left: -2px;
        }
        .tujuan-barang{
            border-width: 2px;
            border-style: hidden;
            margin-top: -7px;
            margin-right: -15px;
            margin-left: -3px;
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
                                        <div class="tanda-terima">
                                            <table>
                                                <tbody>
                                                    <tr>
                                                        <td><h5>BUKTI TANDA TERIMA KIRIMAN BARANG</h5></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="barcode">
                                            <table>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                        <?php
                                                            echo '<img src="data:image/png;base64,' . DNS2D::getBarcodePNG($detail->no_resi, "QRCODE") . '" alt="barcode" width="100" height="100"   />';
                                                        ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><?php echo $detail->no_resi; ?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </td>
                                </tr>
                            </thead>
                        </table>    
                    
                </div>
            </div>
            <div class="row">
                <div class="container-header-body box">
                    <table cellspacing="0">
                        <tbody>
                            <tr>
                                <td>
                                    <div class="pengirim">
                                        <table>
                                            <thead>
                                                <tr>
                                                    <th>
                                                        Pengirim :
                                                    </th>                       
                                                </tr>
                                            </thead>
                                            <tbody>                                    
                                                <tr>
                                                    <td style="font-size: 189%;padding-left:100%;"><?php echo e($detail->nama_pengirim); ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </td>
                                <td>
                                    <div class="penerima">
                                        <table>
                                            <thead>
                                                <tr>
                                                    <th>
                                                        Penerima :
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>                                    
                                                <tr>
                                                    <td style="font-size: 189%;padding-left:125%;"><?php echo e($detail->nama_penerima); ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </td>
                                <td>
                                    <div class="pembayaran">
                                        <table>
                                            <thead>
                                                <tr>
                                                    <th align="left">
                                                        Pembayaran :
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>                                    
                                                <tr> 
                                                    <td style="font-size: 189%;">
                                                        Bayar Tujuan
                                                    </td>
                                                </tr>   
                                            </tbody>
                                        </table>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    <div class="jumlah-titipan">
                                        <table cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th style="border-style: solid;border-width: 2px;padding-right:2em;padding-left:2em">
                                                        Jumlah Titipan
                                                    </th>
                                                    <th style="border-style: solid;border-width: 2px;padding-left:1.1em;padding-right:2.4em;margin-right:-2px;">
                                                        Berat
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                             <tr>
                                                <td style="border-style: solid;border-width: 2px;2px;padding-right:2em;padding-left:2em;padding-bottom:1.7em;padding-top:1.5em;">
                                                    <?php echo e($detail->jumlah_barang); ?> <?php echo e($detail->code); ?>

                                                </td>
                                                <td style="border-style: solid;border-width: 2px;padding-left:1em;padding-right:1em;padding-bottom:1.7em;padding-top:1.5em;">
                                                    <?php echo e($detail->berat); ?> Kg
                                                </td>
                                             </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </th>
                                <td>
                                    <div class="biaya-barang">
                                        <table cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th style="padding-bottom:50px;">
                                                        Biaya Kirim :
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <th style="padding-bottom:30px">
                                                    Rp.  <?php echo e(number_format($detail->biaya,2,',','.')); ?>

                                                    </th>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </td>
                                <td>
                                    <div class="terbilang">
                                        <table>
                                            <tbody>
                                                <tr>
                                                    <th style="border-style: solid;border-width:2px;padding-top:25px;padding-bottom:25px;padding-left:1px;padding-right:25px;font-size:21px;">
                                                        <?php echo e(terbilang($angka)); ?> rupiah
                                                    </th>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="jenis-paket">
                                        <table cellspacing="0">
                                            <tbody>
                                                <tr>
                                                    <th style="border-style: solid;border-width: 2px; padding-left: 0.100rem;padding-right:0.100rem;">
                                                         Jenis Paket
                                                    </th>
                                                    <th style="border-style: solid;border-width: 2px; padding-left: 0.220rem;padding-right:0.220rem">
                                                        Isi Menurut Pengakuan
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <td style="border-style: solid;border-width: 2px;padding-top:2rem;padding-bottom:2rem;padding-left:25%;">
                                                        <?php echo e($detail->jenis_paket); ?>

                                                    </td>
                                                    <td style="border-style: solid;border-width: 2px;">
                                                        <?php echo e($detail->jenis_barang); ?>

                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </td>
                                <td>
                                    <div class="asal-barang">
                                        <table cellspacing="0">
                                            <tbody>
                                                <tr>
                                                    <th style="border-style: solid;border-width: 2px;padding-left:7.600rem;padding-right:7.600rem;">
                                                        Asal
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <td style="border-style: solid;border-width: 2px;padding-top:52px;padding-bottom:49px;">
                                                        <?php echo e($detail->asal); ?>

                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </td>
                                <td>
                                    <div class="tujuan-barang">
                                        <table cellspacing="0">
                                            <tbody>
                                                <tr>
                                                    <th style="border-style: solid;border-width: 2px;padding-left:9.970rem;padding-right:9.970rem;">
                                                        Tujuan
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <td style="border-style: solid;border-width: 2px;padding-top:52px;padding-bottom:49px;">
                                                        <?php echo e($detail->tujuan); ?>

                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="diterima-tanggal">
                                        <table>
                                            <tbody>
                                                <tr>
                                                    <th style="padding-bottom: 125px;padding-top: 25px;">
                                                        Diterima Tanggal .......................
                                                    </th>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </td>
                                <td>
                                    <div class="acc-pengiriman">
                                        <table>
                                            <tbody>
                                                <tr>
                                                    <th style="padding-bottom: 100px;padding-top: 50px;">
                                                        Acc. Pengiriman
                                                    </th>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </td>
                                <td>
                                    <div class="tanggal-masuk">
                                        <table>
                                            <tbody>
                                                <tr>
                                                    <th style="padding-bottom: 125px;padding-top: 25px;">
                                                        <?php echo e(ucfirst(Auth::user()->id_kode_kota->kodeKota()->kota)); ?>, <?php echo e($detail->created); ?>

                                                    </th>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="nama-terang">
                                        <table>
                                            <tbody>
                                                <tr>
                                                    <td style="border-top-style: solid;padding-bottom:50px;">
                                                        Nama Terang / Cap
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </td>
                                <td>
                                    <div class="ttd-pengirim">
                                        <table>
                                            <tbody>
                                                <tr>
                                                    <td style="border-top-style: solid;padding-bottom:50px;">
                                                        <p>
                                                            TTD Pengirim
                                                        </p>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </td>
                                <td>
                                    <div class="ttd-bagian-pengiriman">
                                        <table>
                                            <tbody>
                                                <tr>
                                                    <td style="border-top-style: solid;padding-bottom:50px;padding-left:130px;padding-right:130px;">
                                                        Bagian Pengiriman
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html><?php /**PATH D:\Kargo Website\resources\views/page/admin/Bus/Resi/CargoPengirimanBusResi.blade.php ENDPATH**/ ?>