<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo e($detail->nama_pengirim); ?>_<?php echo e($detail->created); ?>_<?php echo e($user->kota); ?>_<?php echo e((new DateTime(null, new DateTimeZone('Asia/Jakarta')))->getTimestamp()); ?></title>

    <!-- Bootstrap CSS --><!-- CSS only -->

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
        }  
        body{ 
            margin: -50px -50px;
            height: 500px;
        }
        .container{
            width: 1432px;
            border: 5px solid black;
            border-collapse: collapse;
        }
        .table-pengirim th, .table-pengirim td{
            width: 472px;
            border: 2px solid black;
            padding-left: 2px;
        }
        .table-jumlahbarang th, .table-jumlahbarang td{
            width: 232px;
            border: 2px solid black;
            padding-left: 2px;
        }
        td, th{
            padding: 3px;
            border-collapse: collapse;
        } 
        table{
            border-collapse: collapse; 
        }

    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col title">
                <table class="table-title">
                    <tbody>
                        <tr>
                            <td>
                                <img src="logo.png" width="100px" height="100px" alt="logo tiara mas">
                            </td>
                            <td>
                                <h2 style="margin-left: 10px;">Tiara Mas</h2>
                            </td>
                            <td>
                                <h3>BUKTI TANDA TERIMA KIRIMAN BARANG</h3>
                            </td>
                            <td>
                                <?php
                                    echo '<img src="data:image/png;base64,' . DNS2D::getBarcodePNG($detail->no_resi, "QRCODE") . '" alt="barcode" width="100" height="100"   />';
                                ?>
                                <br>
                                <?php echo e($detail->no_resi); ?>

                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col pengirim">
                <table style="border-left-style:hidden;border-right-style:hidden;" class="table-pengirim">
                    <thead style="border-bottom-style:hidden;">
                        <tr>
                            <td>
                                Pengirim :
                            </td>
                            <td>
                                Penerima :
                            </td>
                            <td>
                                Pembayaran :
                            </td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <?php echo e($detail->nama_pengirim); ?>

                            </td>
                            <td>
                                <?php echo e($detail->nama_penerima); ?>

                            </td>
                            <td>
                                <?php echo e(ucfirst($detail->pesan)); ?>

                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <table style="border-top-style: hidden;" class="table-jumlahbarang">
                    <thead>
                        <tr>
                            <td style="border-left-style: hidden;">
                                Jumlah Titipan
                            </td>
                            <td>
                                Berat
                            </td>
                            <td style="border-bottom-style: hidden;">
                                Biaya Kirim
                            </td>
                            <td rowspan="2" style="border-right-style: hidden;border-left-style: hidden;">
                                <p style="border-style: solid;"><?php echo e(terbilang($angka)); ?> rupiah</p>
                            </td>
                        </tr>
                    </thead>
                    <tbody style="border-bottom-style: hidden;border-left-style: hidden;">
                        <tr>
                            <td>
                                <?php echo e($detail->jumlah_barang); ?> Koli
                            </td>
                            <td>
                                <?php echo e($detail->berat); ?> Kg
                            </td>
                            <td>
                                Rp.  <?php echo e(number_format($detail->biaya,2,',','.')); ?>

                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html><?php /**PATH D:\Kargo Website\resources\views/page/admin/Bus/resi/CetakResi.blade.php ENDPATH**/ ?>