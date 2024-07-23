<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LilaWeb | @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">
</head>
<body>
    <div class="sidebar d-flex flex-column p-3">
        <h2 class="text-center">LilaWeb</h2>
        <ul class="nav nav-pills flex-column">

            @if (Auth::user())
                @if (Auth::user()->role_id == 1)
                    <li class="nav-item">
                        <a href="dashboard" @if(request()->route()->uri == 'dashboard') class='nav-link active'@else class="nav-link" @endif>Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a href="books"  @if(request()->route()->uri == 'books' || request()->route()->uri == 'book-add' || request()->route()->uri == 'book-edit/{slug}' ) class='nav-link active' @else class="nav-link" @endif>Books</a>
                    </li>
                    <li class="nav-item">
                        <a href="categories" @if(request()->route()->uri == 'categories' || request()->route()->uri == 'category-add' || request()->route()->uri == 'category-deleted' || request()->route()->uri == 'category-edit/{slug}' || request()->route()->uri == 'category-delete/{slug}') class='nav-link active' @else class="nav-link" @endif>Categories</a>
                    </li>
                    <li class="nav-item">
                        <a href="users" @if(request()->route()->uri == 'users') class='nav-link active' @else class="nav-link" @endif>Users</a>
                    </li>
                    <li class="nav-item">
                        <a href="logout" class="nav-link">Logout</a>
                    </li>
                @else
                    <li class="nav-item">
                        <a href="profile" @if(request()->route()->uri == 'profile') class='nav-link active' @else class="nav-link" @endif>Profile</a>
                    </li>
                    <li class="nav-item">
                        <a href="/" @if(request()->route()->uri == '/' || request()->route()->uri == 'desk-book/{slug}') class='nav-link active' @else class="nav-link" @endif>Book List</a>
                    </li>
                    <li class="nav-item">
                        <a href="logout" class="nav-link">Logout</a>
                    </li>
                @endif
            @else
                <a href="/login">Login</a>
            @endif
        </ul>
    </div>
    <div class="main-content">
        <div class="container-fluid">
            <div class="row mb-4">
                <div class="col-md-12">
                </div>
            </div>
            <div class="row">
                @yield('content')
            </div>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>
