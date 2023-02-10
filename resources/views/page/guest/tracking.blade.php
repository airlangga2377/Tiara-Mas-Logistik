@extends('layouts.app')

@section('preload') 
    <link rel="preload" href="https://images.pexels.com/photos/1427541/pexels-photo-1427541.jpeg?cs=srgb&dl=pexels-samuel-w%C3%B6lfl-1427541.jpg&fm=jpg">

    {{-- Jquery --}}
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
@endsection

@section('title') 
    <title>Cargo aja</title>
@endsection

@section('top-nav-bar') 
    @include('layouts.notloggednav')
@endsection

@section('content') 
    <!-- Image -->
    <img src="https://images.pexels.com/photos/1427541/pexels-photo-1427541.jpeg?cs=srgb&dl=pexels-samuel-w%C3%B6lfl-1427541.jpg&fm=jpg" class="img w-100" alt="cargo image" style="object-fit: cover; height: 200px;"> 

    <!-- Section Content -->
    <div class="container-fluid my-5 d-flex justify-content-center">
        <div class="col-6"> 
            <div class="text-wrap fs-4 mb-2 text-center">
                Lacak Barangmu
            </div>
            <div class="mb-3 m-auto"> 
                <input type="text" class="form-control shadow-sm" name="r" id="trackGood" aria-describedby="trackGood" placeholder="isi nomor resimu" value="1"> 
            </div>
            <button type="submit" class="btn btn-success w-100" id="btn-lacak">Lacak</button>
        
            <div class="container-fluid mt-2 p-0">
                <ul class="list-group" id="parentTracking"> 
                    @if ($trackings)
                        @foreach ($trackings as $tracking)
                        <li class="list-group-item @if ($loop->last) active @endif">
                            <div class="row justify-content-center align-items-center">
                                <div class="col-3">
                                    <div class="col">
                                        <div class="text-wrap mb-2 fs-12 fw-lighter text-start">{{ $tracking->created }}</div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="col">
                                        <div class="text-wrap mb-2 fs-6 fw-lighter text-start">{{ $tracking->pesan }}</div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        @endforeach                         
                    @endif
                </ul>
            </div>
        </div>
    </div>
@endsection

@section('footer')
  @include('layouts.footer') 
@endsection

@section('script-body-bottom')  
    <script> 
        function capitalizeFirstLetter(string) {
            return string[0].toUpperCase() + string.slice(1);
        }

        $(document).ready( function () { 
            $('#overlayLoading').css('visibility', 'hidden');

            $('#btn-lacak').click(function (e) { 
                var req = $("#trackGood").val();
                if(
                    req === undefined 
                    || req === ""
                ){
                    $("#trackGood").addClass("alert alert-danger");
                    $("#trackGood").attr("role", "alert");
                    return;
                }
                $("#trackGood").removeClass("alert alert-danger");
                $("#trackGood").attr("role", "");
                $.ajax({
                    type: "POST",
                    url: "/",
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    data: 
                        JSON.stringify({
                            "r" : req
                        })
                    , 
                    dataType: "JSON",
                    contentType: "application/json; charset=utf-8",
                    success: function (response) {
                        $('#parentTracking').empty();
                        $("#trackGood").val("");
                        $.each(response, function( index, value ) {
                            if(value.pesan === null && value.created === null){
                                return;
                            }
                            value.pesan = capitalizeFirstLetter(value.pesan);
                            var html = `<li class="list-group-item"><div class="row justify-content-center align-items-center"><div class="col-3"><div class="col"><div class="text-wrap mb-2 fs-12 fw-lighter text-start">` + value.created + `</div></div></div><div class="col"><div class="col"><div class="text-wrap mb-2 fs-6 fw-lighter text-start">` + value.pesan + `</div></div></div></div></li>`
                            if(index+1 === response.length){
                                html = `<li class="list-group-item active"><div class="row justify-content-center align-items-center"><div class="col-3"><div class="col"><div class="text-wrap mb-2 fs-12 fw-lighter text-start">` + value.created + `</div></div></div><div class="col"><div class="col"><div class="text-wrap mb-2 fs-6 fw-lighter text-start">` + value.pesan + `</div></div></div></div></li>`;
                            }
                            $('#parentTracking').append(html);
                        });
                    },
                    statusCode: {
                        404: function() {
                            $('#parentTracking').empty();
                            alert( "Tidak ditemukan" );
                        }
                    },
                });
                e.preventDefault();
            }); 
        });
    </script>
@endsection