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
<<<<<<< HEAD
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
=======
        .table-title th, .table-title td{
            width: 400px;
        }
        .table-pengirim th, .table-pengirim td{
            width: 472px;
            border: 2px solid black;
            padding-left: 2px;
            font-size: 30px;
        }
        .table-jumlahbarang th, .table-jumlahbarang td{
            width: 200px;
            border: 2px solid black;
            text-align: center;
            font-size: 30px;
        }
        .table-jenisbarang th, .table-jenisbarang td{
            width: 456px;
            border: 2px solid black;
            text-align: center;
            font-size: 30px;
        }
        .table-jenisbarang td{
            padding: 10px 10px;
        }
        .table-asal th, .table-asal td{
            width: 694px;
            border: 2px solid black;
            text-align: center;
            font-size: 30px;
        }
        .table-asal td{
            padding: 10px 10px;
        }
        .table-ttd th, .table-ttd td{
            width: 470px;
            font-size: 30px;
        }
        td, th{
            padding: 3px;
            border-collapse: collapse;
        }
        th{
            text-align: left;
        } 

>>>>>>> a1d66252d031d8304a268ea3ce5a09ee09d6e01d
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
<<<<<<< HEAD
                                <h2 style="margin-left: 10px;">Tiara Mas</h2>
                            </td>
                            <td>
                                <h3>BUKTI TANDA TERIMA KIRIMAN BARANG</h3>
                            </td>
                            <td>
=======
                                <h2 style="margin-left: -300px;">Tiara Mas</h2>
                            </td>
                            <td>
                                <h2 style="margin-left: -400px;">BUKTI TANDA TERIMA KIRIMAN BARANG</h2>
                            </td>
                            <td style="padding-top: 10px;">
>>>>>>> a1d66252d031d8304a268ea3ce5a09ee09d6e01d
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
<<<<<<< HEAD
=======
        <b><caption style="width:550px;text-align:center;font-size:30px;"><?php echo e($detail->kode_kota_asal); ?>-<?php echo e($detail->kode_wilayah_asal); ?>-<?php echo e($detail->id_user); ?></caption></b>
>>>>>>> a1d66252d031d8304a268ea3ce5a09ee09d6e01d
        <div class="row">
            <div class="col pengirim">
                <table style="border-left-style:hidden;border-right-style:hidden;" class="table-pengirim">
                    <thead style="border-bottom-style:hidden;">
                        <tr>
<<<<<<< HEAD
                            <td>
                                Pengirim :
                            </td>
                            <td>
                                Penerima :
                            </td>
                            <td>
                                Pembayaran :
                            </td>
=======
                            <th>
                                Pengirim :
                            </th>
                            <th>
                                Penerima :
                            </th>
                            <th>
                                Pembayaran :
                            </th>
>>>>>>> a1d66252d031d8304a268ea3ce5a09ee09d6e01d
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
<<<<<<< HEAD
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
=======
                                <?php echo e(ucfirst($detail->nama_pengirim)); ?>

                                <br>
                                <?php echo e($detail->nomor_pengirim); ?>

                            </td>
                            <td>
                                <?php echo e(ucfirst($detail->nama_penerima)); ?>

                                <br>
                                <?php echo e($detail->nomor_penerima); ?>

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
                            <th style="border-left-style: hidden;">
                                Jumlah Titipan
                            </th>
                            <th>
                                Berat
                            </th>
                            <th style="border-bottom-style: hidden;">
                                Biaya Kirim
                            </th>
                            <th rowspan="2" style="border-right-style: hidden;border-left-style: hidden;text-align:left;padding-left:10px;">
                                <p style="border-style: solid;padding:2px 2px;width:700px"><?php echo e(terbilang($angka)); ?> rupiah</p>
                            </th>
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
                            <td style="font-size: 30px;">
                                Rp. <?php echo e(number_format($detail->biaya)); ?>

                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <table class="table-jenisbarang">
                    <thead>
                        <tr>
                            <th>
                                Jenis Barang
                            </th>
                            <th>
                                Isi Menurut Pengakuan
                            </th>
                            <th>
                                Keterangan
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <?php echo e($detail->jenis_barang); ?>

                            </td>
                            <td>
                                <?php echo e($detail->jenis_paket); ?>

                            </td>
                            <td>
                                <?php echo e($detail->keterangan); ?>

                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <table style="border-top-style: hidden;" class="table-asal">
                    <thead>
                        <tr>
                            <th>
                                Asal
                            </th>
                            <th>
                                Tujuan
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <?php echo e($detail->asal); ?>

                            </td>
                            <td>
                                <?php echo e($detail->tujuan); ?>

                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <table class="table-ttd">
                    <thead>
                        <tr>
                            <th style="padding-bottom: 100px;padding-top: 30px;">
                                Diterima Tanggal .......................
                            </th>
                            <th>
                                Acc. Pengiriman
                            </th>
                            <th style="padding-bottom: 100px;padding-top: 30px;">
                                <?php echo e(ucfirst($user->Wilayah()->kota)); ?>, <?php echo e($detail->created); ?>

                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                Nama Terang / Cap
                            </td>
                            <td>
                                TTD Pengirim
                            </td>
                            <td>
                                Bagian Pengiriman
                            </td>
>>>>>>> a1d66252d031d8304a268ea3ce5a09ee09d6e01d
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html><?php /**PATH D:\Kargo Website\resources\views/page/admin/Bus/resi/CetakResi.blade.php ENDPATH**/ ?>