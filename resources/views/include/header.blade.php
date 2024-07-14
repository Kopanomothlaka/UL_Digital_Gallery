<nav class="navbar navbar-expand-lg py-1.5 sticky-top">
    <div class="container-fluid">
        <a class="navbar-brand text-white" href="welcome">


            <div class="navvv">
                <img src="/img/logo.png" alt="">
                Digital Gallery

            </div>

        </a>


        <button class="navbar-toggler custom-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>


        <div class="collapse navbar-collapse" id="navbarNav">


            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link text-white" href="welcome">Home</a>
                </li>
                @auth
                    <li class="nav-item">
                        <a class="nav-link text-white" href="news">News</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="pictures">Pictures</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="videos">Videos</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('notifications.index') }}">
                            Notifications
                            @isset($mentionsCount)
                                @if ($mentionsCount > 0)
                                    <span class="badge badge-pill badge-danger">{{ $mentionsCount }}</span>
                                @endif
                            @endisset
                        </a>
                    </li>





                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                           data-bs-toggle="dropdown" aria-expanded="false">
                            <i>
                                <img src="/img/profileicon.png" alt="icon"
                                     style="height: 35px;width: 35px;align-content: center">

                            </i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{ route('profile.show') }}">Profile</a></li>
                            <li>
                                <hr class="dropdown-divider"/>
                            </li>
                            <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
                        </ul>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link text-white" href="news">News</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="pictures">Pictures</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="videos">Videos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="contact">Contact</a>
                    </li>
            </ul>
            <a href="log" class="btn btn-primary">Log in</a>
            @endauth
            </ul>
        </div>
    </div>

</nav>

<style>
    .custom-toggler .navbar-toggler-icon {
        background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3E%3Cpath stroke='rgba(255, 255, 255, 1)' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3E%3C/svg%3E");
    }

</style>
