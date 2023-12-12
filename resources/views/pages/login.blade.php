<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/79e7db14dd.js" crossorigin="anonymous"></script>
  <title>Login</title>
</head>
<body>
  <div class="backgrounds py-5">
    <div class="container my-5 background-scaling">
        <div class="p-5 text-center bg-body-tertiary rounded-3">
            @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            @endif

            @if (session()->has('errorlogin'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('errorlogin') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            @endif

            <main class="form-signin w-50 m-auto">
                <form class="heroes-login text-center" accept="/login" method="POST">
                    @csrf
                  <a href="/"><img class="mb-4 kirin-login" src="\images\logo-kirinpeformance.svg" alt="" width="72" height="57"></a>
                  <h1 class="h3 my-3 fw-normal">Login</h1>

                  <div class="form-floating">
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" name="email" autofocus required>
                    <label for="email">Email address</label>
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                  </div>
                  <div class="form-floating">
                    <input type="password" class="form-control" id="password" placeholder="Password" name="password" required>
                    <label for="password">Password</label>
                  </div>

                  <button class="btn btn-dark w-100 py-2 my-2" type="submit">Login</button>
                  <p class="text-center text-body-secondary mt-5 mb-3">&copy; {{ date('Y') }} Kirin ★ Peformance</p>
                </form>
              </main>
        </div>
      </div>
  </div>
</body>
</html>
