{{-- 
1. Copy and paste the template, rename it 
2. Add route to your blade file 
3. Add code 
--}}

@extends("layouts.app")

@section("preload")
    {{-- Datatables --}}
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script> 

    {{-- SELECT 2 --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-rc.0/css/select2.css" integrity="sha512-PO7TIdn2hPTkZ6DSc5eN2DyMpTn/ZixXUQMDLUx+O5d7zGy0h1Th5jgYt84DXvMRhF3N0Ucfd7snCyzlJbAHQA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-rc.0/js/select2.full.js" integrity="sha512-Gu2OIWdShncC2h0KqZMOrDWTR0okm7pXBU3M1HuedqlVCDgMbz9BCQWx2AV72pvDAbPhyP9qR7hjk6pUXXj1xg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    {{-- Loading Jquery --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easy-loading/1.3.0/jquery.loading.js"></script>
@endsection

@section("title") 
    <title>Cargo aja</title>
@endsection 

@section('top-nav-bar') 
    @include('layouts.loggednav')
@endsection

@section("content")  

<div class="container">  
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li> 
            <li class="breadcrumb-item"><a href="{{ url('barang') }}">Barang</a></li> 
            <li class="breadcrumb-item"><a href="{{ url('barang/manifest') }}">Manifest</a></li>  
            <li class="breadcrumb-item active" aria-current="page">Tambah Manifest</li>   
        </ol>
    </nav>

    <form action="{{ url("/barang/manifest-bus/create") }}" method="post">
        @csrf  
        <div class="row justify-content-center align-items-center g-2">
            <div class="col">
                <p class="fs-1 text text-center" id="manifest">Input Manifest</p>
            </div> 
        </div>
        <div class="row justify-content-between g-3"> 
            <div class="col p-2 rounded-2 justify-content-center shadow-sm bg-light text-dark">   
                {{-- Error handler --}}
                @if ($errors->any())
                    <div class="fs-5 alert alert-danger bg-danger text-white border-0 text-center" role="alert">
                        {!! $errors->first() !!}
                    </div>
                @endif

                @if (Session::has("message")) 
                    <div class="fs-5 alert alert-success bg-success text-white border-0 text-center" role="alert" id="toggleStatusPengiriman">
                        {!! Session::get("message") !!}
                        <script> 
                            window.open("/barang/manifest-bus/print?no_manifest={!! Session::get('no_manifest') !!}&sopir={!! Session::get('sopir') !!}", "_blank")
                        </script>
                    </div>
                @endif  
                
                <div class="row mb-3 justify-content-center">
                    <div class="col"> 
                        <label for="tujuan" class="form-label fs-4">Tujuan</label>  
                        <select class="form-select" aria-label="Pilih tujuan" id="selectBoxTujuan" data-live-search="true" name="tujuan">
                            <option disabled @if (old("tujuan") == null || old() == null) selected @endif value>Semua Tujuan</option>
                            @foreach ($allWilayah as $wilayah)                                           
                                @if ($wilayah->wilayah != "$wilayah->kota" || $isUserSuperadmin) <option value="{{ $wilayah->wilayah }}" @if (old("tujuan") == "{{ $wilayah->wilayah }}") selected @endif>{{ $wilayah->wilayah }}</option> @endif
                            @endforeach                     
                        </select>
                    </div>   
                </div> 
                <div class="row mb-3 justify-content-center ">   
                    <table id="tableId" class="display">
                        <thead>
                            <tr> 
                                <th></th>
                                <th>Nama Pengirim</th>
                                <th>No Resi</th>

                                <th>Pembayaran</th>
    
                                <th>Tanggal</th>
                                
                                <th class="text text-center">Tambah</th>
                            </tr>
                        </thead>
                        {{-- @foreach ($allCargo as $barang) 
                            <tr>
                                <td data-toggle="tooltip" data-placement="top" title="Jenis Pengiriman {{ $barang->jenis_pengiriman }}">{{ $loop->index + 1 }}</td> 
                                <td>{{ $barang->nama_pengirim }}</td>  
                                <td>{{ $barang->no_lmt }}</td>  
    
                                <td>{{ $barang->created }}</td>  
    
                                <td class="text text-center" id="btnPilih">
                                    <input class="form-check-input border-dark" type="checkbox" value="{{ encrypt($barang->id_cargo_pengiriman_details) }}">
                                </td> 
                            </tr>
                        @endforeach  --}}
                        <tbody>
                        </tbody>
                    </table>
                </div>  
                <div class="row mb-3 justify-content-center">
                    <div class="col"> 
                        <label for="no pol" class="form-label fs-4">No Pol</label>  
                        <select class="form-select" aria-label="Pilih no_pol" id="selectBoxNoPol" data-live-search="true" name="no_pol">
                            <option disabled @if (old("no_pol") == null || old() == null) selected @endif value>Semua No Pol</option>
                            @foreach ($allBus as $bus)                                
                            <option value="{{ $bus->id_bus }}" @if (old("no_pol") == "{{ $bus->no_pol }}") selected @endif>{{ $bus->no_pol }}</option> 
                            @endforeach
                        </select>
                    </div>  
                    <div class="col">
                        <label for="sopir" class="form-label fs-4">Nama Sopir (Isi jika tidak ada sopir utama)</label>
                        <input type="text" class="form-control shadow-sm p-2" name="sopir" id="selectBoxSopir" aria-describedby="sopirText" placeholder="isi nama sopir" value="{!! old('sopir') !!}">
                    </div>
                </div> 
            </div> 
            <button type="submit" class="btn btn-success mt-2 fs-5 mh-30" id="btnSubmit">Buat Manifest</button>
        </div>
    </form>
</div>
@endsection

@section("footer")
    @include("layouts.footerAdmin") 
@endsection

@section("script-body-bottom")  
    <script> 
        var count = 0;

        $(document).ready(function(){ 
            $("#overlayLoading").css("visibility", "hidden");   
            
            var table = $('#tableId').DataTable({ 
                processing: true,
                ajax: {
                    url: '/barang/manifest-bus/get',
                    type: 'POST',
                    dataType: "json",
                    contentType: "application/json; charset=utf-8;", 
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    "data": function ( d ) {
                        d.tujuan = $('#selectBoxTujuan').find(":selected").val();
                        return JSON.stringify( d );
                    } 
                },
                columns: [   
                    {"defaultContent": ""}, 

                    {data: "nama_pengirim"}, 

                    {data: "no_resi"}, 
                    {data: "pesan"}, 
                    {data: "created"},  
                    {
                        data: "no_resi",
                        render: function (data, type, row) {
                            return "<input class='form-check-input border-dark' type='checkbox' value='" + data + "'>"
                        }, 
                        createdCell: function (td, cellData, rowData, row, col) {
                            $(td).attr('id', 'btnPilih');
                            $(td).addClass(['text', 'text-center']);
                        }
                    },
                ],  
                pageLength: 10,
            });

            table.on('order.dt search.dt', function () {
                let i = 1;
        
                table.cells(null, 0, { search: 'applied', order: 'applied' }).every(function (cell) {
                    this.data(i++);
                }); 
            }).draw();

            $('#tableId tbody').on('click', '#btnPilih input', function () { 
                $("#overlayLoading").css("visibility", "visible");   

                var attrName = $(this).attr('name');
                if(
                    attrName === ""
                    || attrName === undefined
                ){
                    count++;
                    $(this).attr('name', 'no_lmt[]');                                        
                }else{
                    count--;
                    $(this).removeAttr('name');
                }
                $("#overlayLoading").css("visibility", "hidden");    
            }); 

            $("#btnSubmit").click(function (e) {
                var tujuan = $('#selectBoxTujuan').find(":selected").val();
                var no_pol = $('#selectBoxNoPol').find(":selected").val();

                if(
                    count <= 0
                    || count > 27

                    || tujuan === "" 
                    || tujuan === undefined

                    || no_pol === "" 
                    || no_pol === undefined
                ){
                    e.preventDefault();
                }
                
                if(
                    count <= 0
                    || count > 27
                ){ 
                    $("#tableId").addClass(['bg-danger', 'text-light']);
                } else{ 
                    $('#tableId').removeClass(['bg-danger', 'text-light']);
                }

                if(
                    no_pol === "" 
                    || no_pol === undefined
                ){ 
                    $("#selectBoxNoPol").addClass(['bg-danger', 'text-light']);
                } else{ 
                    $('#selectBoxNoPol').removeClass(['bg-danger', 'text-light']);
                }
                
                if(
                    tujuan === "" 
                    || tujuan === undefined
                ){ 
                    $("#selectBoxTujuan").addClass(['bg-danger', 'text-light']);
                } else{ 
                    $('#selectBoxTujuan').removeClass(['bg-danger', 'text-light']);
                }
            });

            $("#selectBoxTujuan").change(function (e) { 
                table.ajax.reload();
            });
            $('#selectBoxTujuan').select2({
                width: "resolve"
            });
        });
    </script>
@endsection