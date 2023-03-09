<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Nobar-App | Login</title>
  </head>
  <body>
    
    

    <div class="d-flex justify-content-center bg-dark vh-100 vw-100" style="align-items: center">
        <div class="card border-0" style="width: 23rem; border-radius:20px">
            <div class="card-body">
                <div class="text-center">
                    <h1>Login Admin</h1>
                </div>
                <div class="mt-5">
                    <form action="/auth/login" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="name@example.com">
                            @error('email')
                                <div class="invalid-feedback mb-3">
                                    {{ $message }}
                                </div>
                            @enderror
                          </div>
                          <div class="mb-3">
                            <label for="password @error('password') is-invalid @enderror" class="form-label">Password</label>
                            <input class="form-control" name="password" id="password">
                            @error('password')
                                <div class="invalid-feedback mb-3">
                                    {{ $message }}
                                </div>
                            @enderror
                          </div>
                          <div class="d-flex justify-content-center align-items-center" style="flex-direction: column">
                            <button class="btn btn-danger">Login</button>
                            <a href="/" class="btn btn-danger mt-2">Cancel</a>
                          </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>