<!DOCTYPE html>
<html lang="en">

<head>
    @include('includes.head')

</head>

<body style="background-color: #f5f5f5">
    <header class="sticky-top">
        <div class="row" id="app">
            {{-- <nav class="navbar navbar-dark  " style=" background: linear-gradient(45deg, #f63610, #ef6969)">
            </nav> --}}
            <nav class="navbar bg-light ">
                <div class="container">


                    <a href="/"
                        class="d-flex align-items-center col-lg-3 mb-2 mb-md-0 text-dark text-decoration-none">
                        <img src="{{ asset('image/logo-wed-3.png') }}" height="90" />
                    </a>


                    <button class="navbar-toggler " type="button" data-bs-toggle="offcanvas"
                        data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                        <span class="navbar-bi bi-list-task" style="font-size: 30px"></span>
                    </button>



                    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar"
                        aria-labelledby="offcanvasNavbarLabel">
                        <div class="offcanvas-header">
                            <h5 class="offcanvas-title" id="offcanvasNavbarLabel"><i
                                    class="fs-1 bi bi-person-circle me-4"></i>{{ Auth::user()->name }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                                aria-label="Close"></button>
                        </div>
                        <hr>
                        <div class="offcanvas-body">
                            <h3>MENU</h3>
                            <ul class="navbar-nav justify-content-end flex-grow-1 pe-3" id="menu"
                                style="padding-top: 0%;">
                                <li class="nav-item">
                                    <a href="{{ route('home') }}" class="nav-link align-middle px-0">
                                        <i class="fs-4 bi bi-house-door" style="color: #000000;" aria-label="Home"></i>
                                        <span class="ms-1" style="color: #000000;">Dashboard</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('index_accidents') }}" class="nav-link align-middle px-0">
                                        <i class="fs-4 bi bi-clipboard2-plus" style="color: #000000;"></i>
                                        <span class="ms-1" style="color: #000000;">รายการเหตุการณ์</span>
                                    </a>
                                </li>
                                <hr>
                                <li class="nav-item">
                                    <a href="{{ route('category_index') }}" class="nav-link align-middle px-0">
                                        <i class="fs-4 bi bi-gear" style="color: #000000;"></i>
                                        <span class="ms-1" style="color: #000000;">จัดการหมวดหมู่เหตุการณ์</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('app-user') }}" class="nav-link align-middle px-0">
                                        <i class="fs-4 bi bi-person-plus" style="color: #000000;"></i>
                                        <span class="ms-1" style="color: #000000;">เพิ่มผู้ใช้งาน</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();"
                                        class="nav-link px-0 align-middle show_confirm">
                                        <i class=" fs-4 bi bi-box-arrow-right fs-4" style="color: #d82424;"></i>
                                        <span class="ms-1 " style="color: #d82424;">
                                            ออกจากระบบ
                                        </span>
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>

                            </ul>

                        </div>
                    </div>


                </div>
            </nav>
            {{-- <nav class="navbar navbar-dark  " style=" background: linear-gradient(45deg, #f63610, #ef6969)">
            </nav>
            <nav class="navbar navbar-dark  " style=" background: linear-gradient(45deg, #d0cdcc, #e3e1e1)">
            </nav> --}}
    </header>
    <div class="container">
        <div class=" container">
            <div style=" padding-top:3%;">
                @yield('content')
            </div>
        </div>
    </div>

    </div>



</body>

</html>
