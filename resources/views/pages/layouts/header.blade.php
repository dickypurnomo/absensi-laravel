<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/79e7db14dd.js" crossorigin="anonymous"></script>
    <title>Kirin Peformance ★ {{ $title }}</title>
</head>

<body>
        <div class="container">
            <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4">
              <div class="col-md-3 mb-2 mb-md-0">
                <a href="/" class="d-inline-flex link-body-emphasis text-decoration-none">
                  <img src="\images\logo-kirinpeformance.svg" alt="" class="logos" width="40" height="32">
                </a>
              </div>

              <ul class="nav nav-underline col-12 col-md-auto mb-2 my-2 justify-content-center mb-md-0">
                <li><a href="/" class="nav-link px-4 text-dark {{ ($active === "home") ? 'active' : '' }}">Home</a></li>
                <li><a href="/" class="nav-link px-4 text-dark {{ ($active === "shop") ? 'active' : '' }}">Shop</a></li>
                <li><a href="/" class="nav-link px-4 text-dark {{ ($active === "blog") ? 'active' : '' }}">Blog</a></li>
                <li><a href="/" class="nav-link px-4 text-dark {{ ($active === "gallery") ? 'active' : '' }}">Gallery</a></li>
                <li><a href="/" class="nav-link px-4 text-dark {{ ($active === "about") ? 'active' : '' }}">About</a></li>
              </ul>

              <div class="col-md-3 text-end button">
              @auth
              <li class="nav-item dropdown list-unstyled">
                <a class="nav-link dropdown-toggle" href="/dashboard" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Welcome back, {{ auth()->user()->name }}
                </a>
                <ul class="dropdown-menu list-unstyled">
                  <li><a class="dropdown-item" href="/dashboard">Dashboard</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li>
                  <form action="/logout" method="POST">
                    @csrf
                    <button type="submit" class="dropdown-item">Logout</button>
                  </form>
                </li>
                </ul>
              </li>
              @else
                <a href="/login"><button type="button" class="btn btn-dark me-2">Login</button></a>
              @endauth
            </div>

            </header>
          </div>
