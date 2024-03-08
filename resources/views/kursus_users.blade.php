<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard | Online Course</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <script src="https://unpkg.com/feather-icons"></script>
</head>

<body>
    <div class="container">
        @if (session('success'))
            <div class="alert alert-success" id="myAlert">
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger" id="myAlert">
                {{ session('error') }}
            </div>
        @endif
        {{-- navbar --}}
        <nav class="navbar navbar-expand-lg mt-3 mb-4">
            <a class="navbar-brand" dissable href="/dashboard">Logo. </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll"
                aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse d-inline justify-content-center" id="navbarScroll">
                <ul class="navbar-nav navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                    {{-- <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#course">Course</a>
                    </li> --}}
                    <li class="nav-item">
                        <a class="nav-link" href="/">Home Page</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">How its work</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                    @can('admin')
                        <li class="nav-item">
                            <a class="nav-link" href="/dashboard/kursus">Add List Course </a>
                        </li>
                    @endcan
                </ul>
            </div>
            <form class="d-flex" role="search justify-content-end">
                <button class="btn btn-outline-none me-4" type="submit"><ion-icon name="search-outline"></ion-icon>
                    Search</button>
                @if (auth()->check())
                    <div class="dropdown ms-3">
                        <button class="btn btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            {{ auth()->user()->name }}
                        </button>
                        <ul class="dropdown-menu">
                            <li><button class="dropdown-item" type="button"
                                    disabled>{{ auth()->user()->name }}</button></li>
                            <li><a href="/sesi/logout" class="dropdown-item" type="button">Log Out</a></li>
                        </ul>
                    </div>
                @else
                    <a href="/sesi" class="btn btn-light ms-3" data-bs-toggle="modal"
                        data-bs-target="#login">Login</a>
                @endif
            </form>
        </nav>
        <div class="row">
            <div class="col">
                <button onclick="goBack()" class="btn btn-danger mb-3">Back page</button>
            </div>
            <div class="col-10 me-5">
                <form method="POST" action="{{ route('join.kursus', ['kursusId' => $kursus->id]) }}">
                    @csrf
                    {{-- <button type="submit" class="btn btn-sm btn-primary">Join</button> --}}
                    <button type="submit" class="btn btn-success" onclick="return confirm('Apakah kamu yakin ingin masuk ke kelas ini ?')">Join</button>
                </form>
            </div>
        </div>
            <h1>Users in {{ $kursus->judul }} course</h1>
        <br><br>
        @if ($users->count() > 0)
            <div class="table-responsive">
                <table class="table table-hover table-bordered border border-dark border-2">
                    <thead class="table-warning">
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Jenis Kelamin</th>
                            <th scope="col">No. telepon</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            @foreach ($users as $user)
                                <th scope="row">{{ $loop->index + 1 }}</th>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->jeniskelamin }}</td>
                                <td>{{ $user->notelp }}</td>
                        </tr>
        @endforeach
        </tbody>
        </table>
    @else
        <p>No users have joined {{ $kursus->judul }} yet.</p>
        @endif
        @if (auth()->user()->kursus->contains($kursus->id))
            <form action="{{ route('exit.kursus', $kursus) }}" method="POST">
                @csrf
                @method('POST')
                <button type="submit" onclick="return confirm('Apakah kamu yakin ingin keluar ke kelas ini ?')">Exit Course</button>
            </form>
        @endif
    </div>


    </div>
    {{-- bootstrap javascript --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

    {{-- ioicons javascript --}}
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

    {{-- icon feather --}}
    <script>
        feather.replace();
    </script>

    {{-- timer javascript --}}
    <script>
        // Wait for the DOM to be ready
        document.addEventListener('DOMContentLoaded', function() {
            // Get the alert element
            var alertElement = document.getElementById('myAlert');

            // Set a timeout to hide the alert after 20 seconds (20000 milliseconds)
            setTimeout(function() {
                // Add the 'hidden' class to hide the alert
                alertElement.classList.add('hidden');
            }, 3000); // 20 seconds in milliseconds
        });
    </script>
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
</body>

</html>
