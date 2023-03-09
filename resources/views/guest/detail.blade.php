@extends('guest.main')
@section('content')
    <div style="margin:20px 0px; background-color:rgb(82, 82, 82); height:500px; width:100; display:flex; justify-content:center; align-items:center">
        <div class="container">
            <div class="row justify-content-start">
                <div class="col col-sm-4" style="align-items:center;">
                    <img src="https://www.themoviedb.org/t/p/w220_and_h330_face/{{$movies['poster_path']}}" alt="" style="border-radius:20px; width:300px">
                </div>
                <div class="col">
                    <div class="container">
                        <div class="row">
                            <div class="mt-2" >
                                <a class="text-decoration-none" style="color:white" href="#"><span class="fs-1 fw-bold">{{$movies['title']}}</span></a>
                            </div>
                            <div class="mt-1">
                                <span class="">{{date($movies['release_date'])}} | </span>
                                <span class="border rounded-2" width="35px">{{$movies['adult'] == false ? '  SU':'18+'}}</span>
                                <span> | Genre: 
                                    @foreach ($movies['genres'] as $genre)
                                        <a href="#" class="text-decoration-none" style="color:white;">{{$genre['name']}}, </a>
                                    @endforeach
                                    |<span> {{$movies['runtime']}} minutes</span>
                                </span>
                            </div>
                            <div class="mt-3">
                                <div>
                                    <span class="fs-4 fw-bold">OVERVIEW</span>
                                </div>
                                <article>
                                    {!!$movies['overview']!!}
                                </article>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <span class="fs-5 fw-bold"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection