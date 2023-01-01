@extends("layouts.app")

@section("preload")
        {{-- Datatables --}}
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
        <link href="{{ url('/assets/css/bus/app.css') }}" rel="stylesheet" />
@endsection

@section("title") 
    <title>Cargo aja</title>
@endsection

@section("top-nav-bar")
<nav class="navbar navbar-light shadow-sm"> 
    <div class="container-fluid"> 
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="dropdown">
            <a class="ms-2 me-2 fs-5 text-dark text-decoration-none" href="{{ url("home") }}">Beranda</a>
            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                {{ Auth::user()->name }}
            </button>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="{{ url("logout") }}">Keluar</a></li> 
            </ul>
        </div>

        <div class="offcanvas offcanvas-start text-bg-light" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
            <div class="offcanvas-header">    
                
                <button type="button" class="btn-close offcanvas-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body"> 
                <div class="list-group list-group-flush"> 
                    <a role="button" class="fs-5 fw-bold list-group-item list-group-item-action" href="{{ url("barang") }}">Barang</a>
                    <a role="button" class="fs-5 list-group-item list-group-item-action" href="{{ url("barang/truk/insert#pengiriman") }}">Pengiriman</a>
                    <a role="button" class="fs-5 list-group-item list-group-item-action" href="{{ url("barang/bus/insert#pengiriman") }}">Pengiriman Bus</a>
                    <a role="button" class="fs-5 list-group-item list-group-item-action" href="{{ url("barang/bus/kategoribarang") }}">Kategori Barang</a>
                    <a role="button" class="fs-5 list-group-item list-group-item-action" href="{{ url("barang/bus/wilayah") }}">Wilayah</a>
                </div>
            </div>
        </div> 
    </div>
</nav> 
@endsection

@section("content")
<div class="container">  
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url("home") }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ url("barang") }}">Barang</a></li>
                <li class="breadcrumb-item"><a href="{{ url("barang") }}">Bus</a></li>
                <li class="breadcrumb-item active" aria-current="page">Kategori Barang</li>
            </ol>
        </nav>
</div>

{{-- TAMBAH KATEGORI BARU --}}

<div class="modal fade categorygoods" id="categorygoodsbus" tabindex="-1" aria-labelledby="categorygoodsbus" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Kategori</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="/save-categorygoodsbus" method="POST">
                {{ csrf_field() }}
                <div class="mb-3">
                <label for="category" class="col-form-label">Kategori</label>
                <input type="text" name="category" class="form-control" id="category">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batalkan</button>
                <button type="submit" class="btn btn-primary">Buat Kategori Baru</button>
            </div>
            </form>
        </div>
    </div>
</div>

  {{-- KATEGORI BARANG --}}

    <div class="modal fade category_bus" id="categorybus" tabindex="-1" aria-labelledby="goodscategorybus" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Kategori</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="/save-goodscategorybus" method="POST">
                {{ csrf_field() }}
            <div class="mb-3">
                <label for="kategori" class="col-form-label">Kategori</label>
                <select class="form-control kt-select2 kategori" id="kategori" name="category">
                <option></option>
                </select>
            </div>
            <div class="mb-3">
                <label for="name" class="col-form-label">Nama Barang</label>
                <input type="text"name="name" class="form-control" id="name">
            </div>
            <div class="mb-3">
                <label for="pickup" class="col-form-label">Dari</label>
                <input type="text" name="pickup" class="form-control" id="pickup">
            </div>
            <div class="mb-3">
                <label for="dropoff" class="col-form-label">Tujuan</label>
                <input type="text" name="dropoff" class="form-control" id="dropoff">
            </div>
            <div class="mb-3">
                <label for="price" class="col-form-label">Harga</label>
                <input type="number" name="price" class="form-control" id="price">
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batalkan</button>
            <button type="submit" class="btn btn-primary">Buat Kategori Barang</button>
        </div>
        </form>
        </div>
    </div>
    </div>
<div class="container-fluid">
    @if ('status')
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <form action="{{ url("barang/bus/category") }}"> 
            <div class="row justify-content-center align-items-start">
                <div class="col-auto shadow-sm p-3 float-start">
                    <div class="row-auto justify-content-center align-items-center">
                        <div class="col-12">
                            <label for="jenisBarang" class="fs-5 form-label fw-bold w-100">Fitur</label>  
                        </div>
                        <div class="col-12 pt-2">
                            <a role="button" class="fs-5 btn btn-success" href="{{ url('barang/bus/tambah-kategori ') }}">Tambahkan Kategori Barang</a>
                        </div>
                        <div class="col-12 pt-2">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#categorybus">Tambahkan</button>
                        </div>   
                    </div>
                </div>
                <div class="col-8 shadow-sm p-3" id="tableIdParent">
                    <table id="categorygoods" class="display">
                        <thead>
                            <tr> 
                                <th>Kategori Barang</th>
                                <th>Nama Barang</th>
                                <th>Asal</th>
                                <th>Tujuan</th>
                                <th>Harga</th>
                                <th class="text text-center">Ubah</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            @foreach ($categorys as $data)
                            <tr>
                                <td>
                                    {{ $data->category }}
                                </td>
                                <td>
                                    {{ $data->name }}
                                </td>
                                <td>
                                    {{ $data->pickup }}
                                </td>
                                <td>
                                    {{ $data->dropoff }}
                                </td>
                                <td>
                                    {{ $data->price }}
                                </td>
                                <td>
                                </td>                            
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

    </form>
@endsection

@section("footer")
    @include("layouts.footerAdmin") 
@endsection

@section("script-body-bottom")
    <script>
        $(document).ready(function () {
        $('#categorygoods').DataTable();
});
  
        $("#overlayLoading").css("visibility", "hidden"); // Function stuck loading
        
    </script>
    <script>
        $(document).ready(function () {
            $('.kategori').select2({
                dropdownParent: '#categorybus', 
                    // ajax: {
                    //     url: "/wilayahKota",
                    //     processResults: function({data}){
                    //         return {
                    //             results: $.map(data, function(item){
                    //                 return {
                    //                     id: item.id,
                    //                     name: item.name
                    //                 }   
                    //             })
                    //     }
                    //     }
                    // }
                })
                .on('select2:open', () => {
                    $(".select2-results:not(:has(a))").append(`<li style='list-style: none; padding: 10px;'><a style="width: 100%" data-bs-target="#categorygoodsbus"
                   type="button" class="btn btn-primary" >Tambahkan Kategori Baru</a>
                </li>`);
            }); 
            }); 
        </script>
@endsection 