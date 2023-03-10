<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>TMDB | {{$title}}</title>
  </head>
  <body class="bg-dark vh-100" style="color: white">
    
    

    <div>
      <nav class="navbar navbar-expand-lg navbar-dark bg-transparent">
        <div class="container">
            <a class="navbar-brand fs-3 fw-bold" href="/">TMDB-TEST</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ms-auto">
                <a class="nav-link fs-5 active"href="/">Home</a>
                @auth
                    <li class="nav-link active "><a class="fs-5" style="text-decoration: none;color:white;" href="/dashboard/masterCategories">Dashboard</a></li>
                    <form action="/auth/logout" method="post">
                        @csrf
                        <button type="submit" class="btn fs-5" style="color: white">Logout</button>
                    </form>
                @else
                    <a class="nav-link fs-5 active" href="/auth/login">Login</a>
                @endauth
            </div>
            </div>
        </div>
      </nav>
      <div>
        @yield('content')
      </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>