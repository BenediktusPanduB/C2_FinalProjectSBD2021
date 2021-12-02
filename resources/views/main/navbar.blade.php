<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/f8b9f96ed4.js" crossorigin="anonymous"></script>
    <title>Data Base Parkir ITS</title>
    <style>
        .table td,
        th {
            text-align: center;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand mx-3" href="/">C2_Database Parkir ITS</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link {{ ($title === "Dashboard") ? 'active' : '' }}" href="/dashboard">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ ($title === "ParkirMasuk") ? 'active' : '' }}" href="/parkir/masuk">Parkir Masuk</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ ($title === "ParkirKeluar") ? 'active' : '' }}" href="/parkir/keluar">Parkir Keluar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ ($title === "Kartu") ? 'active' : '' }}" href="/kartu">Kartu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ ($title === "Petugas") ? 'active' : '' }}" {{ (auth()->user()->role !== 'admin') ? 'hidden' : ''}} href="/petugas">Petugas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ ($title === "Admin") ? 'active' : '' }}" {{ (auth()->user()->role !== 'admin') ? 'hidden' : ''}} href="/admin">Admin</a>
                    </li>
                </ul>
                <ul class="navbar-nav mx-5">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">{{ auth()->user()->name }}</a>
                        <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                            <li><a class="dropdown-item" href="/logout">Log Out</a></li>
                    </li>
            </div>
        </div>
    </nav>




    <div class="container my-5 mx-auto">
        @yield('container')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


</body>

</html>
