<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $detail->nama_pengirim }}_{{ $detail->created }}_{{ $user->kota }}_{{ (new DateTime(null, new DateTimeZone('Asia/Jakarta')))->getTimestamp() }}</title>

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
 
 
	$angka = $data->biaya;
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
                                <h2 style="margin-left: -300px;">Tiara Mas</h2>
                            </td>
                            <td>
                                <h2 style="margin-left: -400px;">BUKTI TANDA TERIMA KIRIMAN BARANG</h2>
                            </td>
                            <td style="padding-top: 10px;">
                                @php
                                    echo '<img src="data:image/png;base64,' . DNS2D::getBarcodePNG( env('APP_URL') . ":" . env('APP_PORT') . "/?r=" . encrypt($detail->no_resi), "QRCODE") . '" alt="barcode" width="100" height="100"   />';
                                @endphp
                                <br>
                                {{ $detail->no_resi }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <b><caption style="width:550px;text-align:center;font-size:30px;">{{ $detail->kode_kota_asal }}-{{ $detail->kode_wilayah_asal }}-{{ $detail->id_user }}</caption></b>
        <div class="row">
            <div class="col pengirim">
                <table style="border-left-style:hidden;border-right-style:hidden;" class="table-pengirim">
                    <thead style="border-bottom-style:hidden;">
                        <tr>
                            <th>
                                Pengirim :
                            </th>
                            <th>
                                Penerima :
                            </th>
                            <th>
                                Pembayaran :
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                {{ ucfirst($detail->nama_pengirim) }}
                                <br>
                                {{ $detail->nomor_pengirim }}
                            </td>
                            <td>
                                {{ ucfirst($detail->nama_penerima) }}
                                <br>
                                {{ $detail->nomor_penerima }}
                            </td>
                            <td>
                                {{ ucfirst($detail->pesan) }}
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
                                <p style="border-style: solid;padding:2px 2px;width:700px">{{ terbilang($angka) }} rupiah</p>
                            </th>
                        </tr>
                    </thead>
                    <tbody style="border-bottom-style: hidden;border-left-style: hidden;">
                        <tr>
                            <td>
                                {{ $data->jumlah_barang }} Koli
                            </td>
                            <td>
                                {{ $data->berat }} Kg
                            </td>
                            <td style="font-size: 30px;">
                                Rp. {{ number_format($data->biaya) }}
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
                                {{ $data->jenis_barang  }}
                            </td>
                            <td>
                                {{ $data->jenis_paket }}
                            </td>
                            <td>
                                {{ $detail->keterangan }}
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
                                {{ $asal }}
                            </td>
                            <td>
                                {{ $detail->tujuan }}
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
                                {{ ucfirst($detail->user->kota) }}, {{ $detail->created }}
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
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>