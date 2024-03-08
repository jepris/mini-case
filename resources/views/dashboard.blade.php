<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard | Online Course</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <script src="https://unpkg.com/feather-icons"></script>

    {{-- livechat --}}
    <script type="text/javascript">window.$crisp=[];window.CRISP_WEBSITE_ID="839f9bb8-f3ba-4309-934d-f7bf8f032bee";(function(){d=document;s=d.createElement("script");s.src="https://client.crisp.chat/l.js";s.async=1;d.getElementsByTagName("head")[0].appendChild(s);})();</script>
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
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#course">Course</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/course">Master class</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/detail">How its work</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/about">About</a>
                    </li>
                    @can('admin')
                        <li class="nav-item">
                            <a class="nav-link" href="/dashboard/kursus">manage List Course </a>
                        </li>
                    @endcan

                </ul>
            </div>
            <form class="d-flex" role="search justify-content-end">
                {{-- <button class="btn btn-outline-none me-4" type="submit"><ion-icon name="search-outline"></ion-icon>
                    Search</button> --}}
                <a class="btn btn-outline-dark" href="/course" type="submit">Join Our Course</a>
                {{-- <a href="/sesi" class="btn btn-outline-dark ms-3" type="submit">Login</a> --}}

                @if (auth()->check())
                    <div class="dropdown ms-3">
                        <button class="btn btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            {{ auth()->user()->name }}
                        </button>
                        <ul class="dropdown-menu">
                            <li><button class="dropdown-item" type="button"
                                    disabled>{{ auth()->user()->role }}</button></li>
                            <li><a href="/sesi/logout" class="dropdown-item" type="button">Log Out</a></li>
                        </ul>
                    </div>
                @else
                    <a href="/sesi" class="btn btn-light ms-3" data-bs-toggle="modal"
                        data-bs-target="#login">Login</a>
                @endif
            </form>
        </nav>
    </div>

    {{-- hero section --}}
    <section>
        <div class="container">
            <div class="row">
                <div class="deskripsi" style="background-image: url('{{ asset('/img/desc1.png') }}');">
                    <div class="card-ui card float-end me-2" style="width: 60px;">
                        <div class="card-body">
                            <ion-icon name="triangle-outline" class="triangle"></ion-icon> <br>
                            <ion-icon name="square-outline" class="square"></ion-icon> <br>
                            <p>UI/UX</p>
                        </div>
                    </div>
                    <div class="col-5 ms-5">
                        <h1>Best Digital <span class="o-style">O</span>nline Courses</h1>
                        <p>Digital online courses provide an accessible and flexible way for individual to acquire
                            new knowledge and skills in various field</p>
                    </div>
                    <a href="#course" class="btn hero-button ms-5" style="width:120px;">Get Started</a>
                    <div class="hero-detail d-flex float-end">
                        <div class="card card-lesson" style="width: 11rem heigt: 3rem;">
                            <div class="card-body">
                                <h5 class="card-title">UI Design Pattern</h5>
                                <div class="ui-detail">
                                    <img src="{{ asset('img/4.jpg') }}" class="img-detail rounded-circle float-start"
                                        alt="">
                                    <div class="detail float-end">
                                        <h5>Veronica</h5>
                                        <h6>Country</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card card-private" style="width: 13rem; height: 5rem ">
                            <div class="card-body">
                                <div class="ui-detail">
                                    <img src="{{ asset('img/8.jpeg') }}" class="img-detail rounded-circle float-start"
                                        alt="">
                                    <div class="detail float-end">
                                        <h5>Karen</h5>
                                        <h6>UI/UX Designer</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- instructor --}}
    <section>
        <div class="container">
            <div class="customers">
                <div class="row">
                    <div class="col-5">
                        <div class="row">
                            <div class="col">
                                <div class="study">
                                    <div class="gambar-col">
                                        <div class="row">
                                            <div class="col-5">
                                                <img src="{{ asset('img/course1.jpeg') }}" class="img-col1 mt-2 ms-2"
                                                    style="border-radius: 10px" alt="">
                                            </div>
                                            <div class="col-7">
                                                <img src="{{ asset('img/course2.jpg') }}"
                                                    class="img-col2 ms-4 mt-1 me-1" style="border-radius:15px"
                                                    alt=""> <br>
                                                <img src="{{ asset('img/8.jpeg') }}" class="img-col3 mt-2 ms-4"
                                                    style="border-radius:15px" alt="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="desc-study">
                                        <div class="row">
                                            <div class="col-8">
                                                <h6 class="mt-3 ms-2">Study at your own place</h6>
                                            </div>
                                        </div>
                                        <div class="icon-arrow">
                                            <button>
                                                <a href="#course" class=" btn icon-block"><ion-icon
                                                        name="arrow-forward-outline"></ion-icon></a>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="learning">
                                    <div class="icon-online">
                                        <div class="row">
                                            <div class="col">
                                                <div class="camera">
                                                    <ion-icon name="camera-outline"></ion-icon>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="online">
                                                    <p class="text-center">Online</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-9">
                                            <h5>The learning process is simple</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-7">
                        <div class="user-all">
                            <div class="row">
                                <div class="col">
                                    <div class="user">
                                        <div class="row">
                                            <div class="col">
                                                <h2>231+</h2>
                                                <p>course & subjects</p>
                                            </div>
                                            <div class="col">
                                                <h2>319+</h2>
                                                <p>Instructors</p>
                                            </div>
                                            <div class="col">
                                                <h2>72K+</h2>
                                                <p>Using the app</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="img-flex d-flex">
                                        <img src="{{ asset('img/1.jpg') }}" alt=""
                                            class="flex-1 rounded-circle">
                                        <img src="{{ asset('img/1.jpg') }}" alt=""
                                            class="flex-2 rounded-circle">
                                        <img src="{{ asset('img/1.jpg') }}" alt=""
                                            class="flex-2 rounded-circle">
                                        <img src="{{ asset('img/1.jpg') }}" alt=""
                                            class="flex-2 rounded-circle">
                                        <img src="{{ asset('img/1.jpg') }}" alt=""
                                            class="flex-2 rounded-circle">
                                        <img src="{{ asset('img/1.jpg') }}" alt=""
                                            class="flex-2 rounded-circle">
                                        <p><span>72K+ </span>Happy Customers</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- card view --}}
    <section id="course">
        <div class="container">
            <div class="card-view mt-5 p-5">
                <div class="row">
                    <div class="col-4">
                        <h2>Most Popular Course</h2>
                        <p>start an incredible UI/UX Design Course with us. You can learn the most requested digital
                            courses.</p>
                            <div class="row">
                                @foreach ($category as $cate)
                                     <div class="col">
                                        <div class="online1">
                                            <p class="text-center">{{ $cate->name }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                    </div>
                    <div class="col-8">
                        <div class="course d-flex overflow-x-auto">
                            @foreach ($data as $row)
                                <div class="view-course d-flex">
                                    <div class="card card-image me-3"
                                        style="width: 15rem; height: 20rem; background-image: url('{{ asset('/cover_image/' . $row->cover) }}');">
                                    </div>
                                    <div class="card card-detail1" style="width: 15rem; height: 20rem;">
                                        <h5 class="card-title ">{{ $row->judul }}</h5>
                                        <p class="card-text">{{ $row->description }}</p>
                                        <h5 class="card-title">{{ $row->harga }}</h5>
                                        <div class="card-button">
                                            <div class="row">
                                                <div class="col-7">
                                                    {{-- //testing --}}
                                                    {{-- <a href="">
                                                        <a href="/tambahdatasiswa" data-bs-toggle="modal"
                                                            data-bs-target="#joinkelas">Join Class</a>
                                                    </a> --}}
                                                    <form method="POST" action="{{ route('join.kursus', ['kursusId' => $row->id]) }}">
                                                        @csrf
                                                        <button type="submit" class="join-btn btn btn-primary rounded-pill" onclick="return confirm('Apakah kamu yakin ingin masuk ke kelas ini ?')">Join</button>
                                                    </form>
                                                </div>
                                                <div class="col-5">
                                                    <a href="{{ url("/kursus/{$row->id}/users")}}" class="a-link"><i data-feather="arrow-up-right"
                                                            class="icon"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <div class="view d-grid gap-2 d-md-block">
                                <button class="viewall btn btn-primary" type="button"><a class="text-light"
                                        href="/course">View All </a><ion-icon class="ardown"
                                        name="arrow-forward-circle-outline"></ion-icon></button>
                            </div>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    {{-- modal --}}
    {{-- modal login --}}
    <div class="modal fade" id="login" tabindex="-1" aria-labelledby="login" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="modal-body">
                        <h1 class="text-center mt-2">Login</h1>
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                        <div class="card" style="margin-top: 70px">
                            <form style="margin: 30px" action="/sesi/login" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input class="form-control" value="{{ Session::get('email') }}" type="email"
                                        id="email" name="email" autofocus>
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input class="form-control" type="password" id="password" name="password">
                                </div>
                                <div class="nb-3 d-grid">
                                    <button name="submit" type="submit" class="btn btn-primary">Login</button>
                                </div>
                            </form>
                            <div class="register text-end mb-3 me-3">
                                <a href="/sesi/register" data-bs-toggle="modal" data-bs-target="#registrasi">don't
                                    have account? Create here!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{-- modal registrasi --}}
    <div class="modal fade" id="registrasi" tabindex="-1" aria-labelledby="login" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="modal-body">
                        <div class="container d-flex justify-content-center">
                            <div class="col-9">
                                <h1 class="text-center mt-2">Register</h1>
                                @if (session('error'))
                                    <div class="alert alert-danger">
                                        {{ session('error') }}
                                    </div>
                                @endif
                                <div class="card" style="margin-top: 40px">
                                    <form style="margin: 30px" action="/sesi/create" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Name</label>
                                            <input class="form-control" value="{{ Session::get('name') }}"
                                                type="text" id="name" name="name" autofocus>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">No. telpon</label>
                                            <input type="number" name="notelp" class="form-control"
                                                id="exampleInputEmail1" aria-describedby="emailHelp"
                                                placeholder="Masukkan No Telpon">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputPassword1" class="form-label">Jenis Kelamin</label>
                                            <select class="form-select" name="jeniskelamin" id="floatingSelectGrid">
                                                <option selected disabled>--</option>
                                                <option value="pria">Pria</option>
                                                <option value="wanita">Wanita</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email</label>
                                            <input class="form-control" value="{{ Session::get('email') }}"
                                                type="email" id="email" name="email">
                                        </div>
                                        <div class="mb-3">
                                            <label for="password" class="form-label">Password</label>
                                            <input class="form-control" type="password" id="password"
                                                name="password">
                                        </div>
                                        <div class="nb-3 d-grid">
                                            <button name="submit" type="submit"
                                                class="btn btn-primary">Register</button>
                                        </div>
                                    </form>
                                    <div class="register text-end mb-3 me-3">
                                        <a href="/sesi" data-bs-toggle="modal" data-bs-target="#login">have
                                            account? Login Here!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="joinkelas" tabindex="-1" aria-labelledby="login" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="modal-body">
                        <div class="container">
                            <h1 class="text-center mt-3">Join Kelas</h1>
                            <div class="card" style="margin-top: 70px">
                                <form style="margin: 30px" action="/insertdatasiswa" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="formFile" class="form-label">Nama</label>
                                        <input class="form-control" type="text" id="name" name="name"
                                            placeholder="Masukkan Nama Anda">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">No. telpon</label>
                                        <input type="number" name="notelp" class="form-control"
                                            id="exampleInputEmail1" aria-describedby="emailHelp"
                                            placeholder="Masukkan No Telpon">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label">Jenis Kelamin</label>
                                        <select class="form-select" name="jeniskelamin" id="floatingSelectGrid">
                                            <option selected disabled>--</option>
                                            <option value="1">Pria</option>
                                            <option value="2">Wanita</option>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-success">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
        document.addEventListener("DOMContentLoaded", function() {
        // Set a timeout to hide the alert after 3 seconds (3000 milliseconds)
        setTimeout(function() {
            // Get the alert element  
            var alertElement = document.getElementById('myAlert');
            // Add the 'd-none' class to hide the alert
            alertElement.classList.add('d-none');
        }, 3000); // 3 seconds in milliseconds
    });
    </script>
</body>

</html>
