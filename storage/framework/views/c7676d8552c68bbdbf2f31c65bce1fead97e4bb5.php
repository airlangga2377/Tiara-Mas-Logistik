<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

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
    <h2 class="title">PO."LANCAR JAYA ABADI"</h2>
  </div>
  <div>
    <p class="title text">Jl. Yos Sudarso (Depan Makodim) Sumbawa Besar Tlp. (0371) 21241 - 21428</p>
  </div>
  <div>
    <p class="title text" style="padding-bottom: 20px;">Pertokoan Sulung Mas Blok A 22 Surabaya Telp./Fax. (031) 3529402</p>
  </div>
  <div>
    <p class="text" style="padding-bottom: 20px;">Tolong terima paket via Truck "LANCAR JAYA ABADI" EA ..............</p>
  </div>
    <table style="padding-bottom: 20px;"> 
        <tbody> 
          <tr>
            <td colspan="3"><p class="text">Sopir:</p></td>
            <td colspan="3"><p class="text">Kernet:</p></td>
          </tr>
      </tbody> 
    </table> 
    <table class="konten">
      <thead>
        <tr>
          <th class="title text" style="width: 10px;">No.</p></th>
          <th class="title text">Nama Pengirim</th>
          <th class="title text">Nama Penerima</th>
          <th class="title text">Jenis Barang</th>
          <th class="title text">Jumlah</th>
          <th class="title text">Keterangan</th>
        </tr>
      </thead>
      <tbody> 
        <?php for($i = 0; $i < 27; $i++): ?>
          <tr>
            <td class="text" style="text-align: center"><?php echo e($i + 1); ?></td>
            <td class="text"></td>
            <td class="text"></td>
            <td class="text"></td>
            <td class="text"></td>
            <td class="text"></td>
          </tr>
        <?php endfor; ?>
          <tr>
            <td></td>
            <td class="text">Jumlah Total</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td style="border: 0px;"></td>
            <td class="text" style="border: 0px;">Penerima,</td>
            <td class="text" style="border: 0px;">Sopir,</td>
            <td class="text" style="border: 0px;">Kernet,</td> 
            <td class="text" style="border: 0px; text-align: right;" colspan="2">,.............................</td>
          </tr>
          <tr>
            <td style="border: 0px;"></td>
            <td style="border: 0px;"></td>
            <td style="border: 0px;"></td>
            <td style="border: 0px;"></td>
            <td style="border: 0px;"></td>
            <td class="text" style="border: 0px;">Pengirim</td>
          </tr>
        </tbody>
    </table>
</body>
</html><?php /**PATH C:\Users\agi\Desktop\kerja\Kargo Website\resources\views/page/admin/CargoPengirimanTrukManifest.blade.php ENDPATH**/ ?>