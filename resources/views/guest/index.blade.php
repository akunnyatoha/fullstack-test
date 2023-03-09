@extends('guest.main')
@section('content')
<div class="container mt-3">
    <div class="text-center">
        <span class="fs-3">{{strtoupper($subtitle)}}</span>
    </div>
    <div>
        <div class="dropdown">
            <a class=" text-decoration-none dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false" style="color:white">
              Select Category
            </a>
          
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                @foreach ($categories as $category)
                    <li><a class="dropdown-item" href="/{{$category['title']}}">{{$category['title']}}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="row">
        @foreach ($movies as $movie)
        <div class="col d-flex justify-content-center">
            <div class="card bg-transparent border-0 mt-5" width="22rem" style="border-radius:20px">
                <div class="card-body" style="padding:0px 0px">
                    <div class="d-flex justify-content-center" style="align-items: center">
                        <img src="https://www.themoviedb.org/t/p/w220_and_h330_face/{{$movie['poster_path']}}" alt="" style="border-radius:20px; width:200px">
                    </div>
                    <div class="d-flex justify-content-center" style="align-items: center">
                        <a class="mt-1" href="/details/{{$movie['id']}}" style="text-decoration:none; color:rgb(216, 216, 216)">{{$movie['original_title']}}</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>



@endsection