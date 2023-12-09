<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Bootstrap demo</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <!-- untuk css tambahan -->
        @yield('css')
    </head>
    <body>
        @include('sweetalert::alert')
        
        <!-- navbar -->
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Navbar</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                    <a class="nav-link active" href="/dashboard">Dashboard</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="/create">Tambah Data</a>
                    </li>
                </ul>
                </div>
            </div>
        </nav>

        <!-- untuk main tambahan -->
        @yield('main')

        <!-- footer -->
        <div class="card text-center">
            <div class="card-body">
                <h5 class="card-title">Footer</h5>
                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                <a href="#" class="btn btn-primary">My Sosial Media</a>
            </div>
            <div class="card-footer text-body-secondary">
                Copyright @2023 Weekly Study Jam INSTIKI #3
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

        <!-- untuk js tambahan -->
        @yield('js')
    </body>
</html>