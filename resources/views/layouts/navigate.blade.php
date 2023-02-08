<nav class="navbar navbar-expand-lg navbar-dark bg-info ">
    <nav class="nav-brand mb-1 h5">Absensi Mahasiswa</nav>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-item nav-link{{ request()->is('/') ? ' active' : ' ' }}" href="/">Home</a>

            </li>
            <li class="nav-item">
                <a class="nav-item nav-link{{ request()->is('absensi') ? ' active' : '' }}" href="/absensi">Absen</a>

            </li>
            <li class="nav-item">
                <a class="nav-item nav-link{{ request()->is('mahasiswa') ? ' active' : '' }}"
                    href="/mahasiswa">Mahasiswa</a>

            </li>
            <li class="nav-item">
                <a class="nav-item nav-link{{ request()->is('jurusan') ? ' active' : '' }}" href="/jurusan">Jurusan</a>
            </li>
        </ul>

        <ul class="navbar-nav mr-5 justify-content-end">
            @auth
                <li class="nav-item dropdown">
                    <div class="nav-item dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-user" aria-hidden="true"></i> {{ auth()->user()->username}}
                    </div>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="/logout"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a>
                        <a class="dropdown-item" href="/profile"><i class="fa fa-eye" aria-hidden="true"></i> Show Profile</a>
                    </div>
                </li>
            </ul>
            @else
            <li class="nav-item">
                <a class="nav-item nav-link{{ request()->is('login') ? ' active' : '' }}" href="/login">Login</a>
            </li>
            <li class="nav-item">
                <a class="nav-item nav-link{{ request()->is('register') ? ' active' : '' }}" href="/register">Register</a>
            </li>
            @endauth
        </div>
    </nav>
