<!DOCTYPE html>
<html lang="en">

<head>
    @include('includes.head')

</head>

<body>
    <main>
        <div class="row sticky-top">
            {{-- <nav class="navbar navbar-dark  " style=" background: linear-gradient(45deg, #f63610, #ef6969)">
            </nav> --}}
            <nav
                class="navbar navbar-expand-lg bg-light d-flex flex-wrap align-items-center justify-content-center justify-content-md-between static-top">
                <div class="container">
                    <a href="/"
                        class="d-flex align-items-center col-lg-3 mb-2 mb-md-0 text-dark text-decoration-none">
                        <img src="{{ asset('image/logo-wed-3.png') }}" height="90" />
                    </a>
                    <div class="col-md-1 text-end">

                        <a href="{{ route('login') }}">
                            <button class="btn btn-outline-danger" type="submit">เข้าสู่ระบบ</button>
                        </a>

                    </div>
                </div>
            </nav>
        </div>
    </main>

    <!-- End Example Code -->
</body>

</html>
