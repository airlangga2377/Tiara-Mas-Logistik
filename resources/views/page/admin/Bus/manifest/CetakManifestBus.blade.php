<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $bus->sopir ? $bus->sopir : $bus->sopir_utama }}_{{ $user->wilayah }}_{{ (new DateTime(null, new DateTimeZone('Asia/Jakarta')))->getTimestamp() }}</title>
    <!-- Bootstrap CSS --><!-- CSS only -->
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous"> --}}

    <style>
        *{
            font-family: 'Roboto Condensed', sans-serif;
            padding: 0px; 
            margin: 0px;
        }  
        body{ 
            margin: 50px 10px;
        }

        .title{
          text-align: center;
          font-weight: bold;
        }
        .title, .text{  
          width:100%;   
        }  
        .text{  
          font-size: 27px; 
        }  
        .title{
          font-size: 30px;
        }

        table{
            width: 100%; 
        }  
        .konten td, .konten th{
            border: 1px solid black;
        }
        td, th{
            padding: 5px;
            border-collapse: collapse;
            width: 100%;
        } 
        table{
            border-collapse: collapse;
        }
    </style>
</head>
<body> 
    <div> 
      <p><img style="display: inherit;margin-bottom:-80px;" src="logo.png" width="100px" height="100px" alt="logo tiara mas"></p>
        <h2 class="title">PT Tiara Mas Transport</h2>
    </div>
  <div>
    <p class="title text" style="padding-bottom: 20px;">{{ $user->alamat }}</p>
  </div>
  <div>
  </div>
  <div style="padding-bottom: 20px">
  <p class="text" style="display:inline; margin-right: 50px">Tolong terima paket via Bus "Tiara Mas" {{ $bus->no_pol }}</p>
    <p class="text" style="width: 100px; border: 1px black solid; display:inline-block; text-align: center;">{{ $bus->no_manifest }}</p>
    </div>
  <table style="padding-bottom: 20px;"> 
        <tbody> 
          <tr>
            <td colspan="3"><p class="text">Sopir: {{ $bus->sopir ? $bus->sopir : $bus->sopir_utama }}</p></td>
            <td colspan="3"><p class="text">Kernet: {{ $bus->kernet ? $bus->kernet : "-" }}</p></td>
          </tr>
      </tbody> 
    </table> 
    <table class="konten">
      <thead>
        <tr>
          <th class="title text" style="width: 10px;">No.</p></th>
          <th class="title text">Pengirim</th>
          <th class="title text">Penerima</th>
          <th class="title text">Jenis</th>
          <th class="title text">Biaya</th>
          <th class="title text">Koli</th>
          <th class="title text">no.resi</th>
          <th class="title text">Pembayaran</th>
          <th class="title text">Keterangan</th>
        </tr>
      </thead>
      <tbody> 
        @for ($i = 0; $i < 25; $i++)
          <tr> 
            @if (count($detail) > $i) 
              <td class="text" style="text-align: center">{{ $i + 1 }}</td>
              <td style="text-align: center;">@if ($detail[$i]) {{ $detail[$i]->nama_pengirim }} @endif</td>
              <td style="text-align: center;">@if ($detail[$i]) {{ $detail[$i]->nama_penerima }} @endif</td>
              <td style="text-align: center;">@if ($detail[$i]) {{ $detail[$i]->jenis_paket }} @endif</td>
              <td style="text-align: right;">@if ($detail[$i]) {{ $detail[$i]->biaya }} @endif</td>
              <td style="text-align: right;">@if ($detail[$i]) {{ $detail[$i]->jumlah_barang  }} @endif</td>
              <td style="text-align: right;">@if ($detail[$i]) {{ $detail[$i]->no_resi }} @endif</td>
              <td style="text-align: right;">@if ($detail[$i]) {{ $detail[$i]->pesan }} @endif</td> 
              <td style="text-align: right;">@if ($detail[$i]) {{ $detail[$i]->keterangan }} @endif</td>
            @else
              <td class="text" style="text-align: center; color: white">/</td>
              <td class="text"></td>
              <td class="text"></td>
              <td class="text"></td>
              <td class="text"></td>
              <td class="text"></td>
              <td class="text"></td>
              <td class="text"></td>
              <td class="text"></td>
            @endif
          </tr>
        @endfor
          <tr>
            <td></td>
            <td class="text" style="text-align: right" colspan="2">Jumlah Total</td>
            <td></td>
            <td style="text-align: right;">@if ($resume->totalBiaya) {{ $resume->totalBiaya }} @endif</td>
            <td style="text-align: right;">@if ($resume->jumlah_barang) {{ $resume->jumlah_barang }} @endif</td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td style="border: 0px;"></td>
            <td class="text" style="border: 0px;" colspan="2">Penerima,</td>
            <td class="text" style="border: 0px;" colspan="2">Sopir,</td>
            <td class="text" style="border: 0px;">Kernet,</td> 
            <td class="text" style="border: 0px;"></td>
            <td class="text" style="border: 0px; text-align: right;" colspan="2">,.............................</td>
          </tr>
          <tr>
            <td style="border: 0px;"></td>
            <td style="border: 0px;"></td>
            <td style="border: 0px;"></td>
            <td style="border: 0px;padding-top:70px;">{{ $bus->sopir ? $bus->sopir : $bus->sopir_utama }}</td>
            <td style="border: 0px;"></td>
            <td style="border: 0px;">{{ $bus->kernet ? $bus->kernet : "-" }}</td>
            <td style="border: 0px;"></td>
            <td style="border: 0px;"></td>
            <td class="text" style="border: 0px;padding-top:60px;">Pengirim</td>
          </tr>
        </tbody>
    </table>
</body>
</html>