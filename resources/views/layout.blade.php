<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">


    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('tittle ' ,'UL Digital Gallery')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap JS and dependencies (jQuery and Popper.js) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>

    <link rel="icon" type="image/png" href="img/logo.png">
    <link href="{{ asset('/css/NewsStyle.css') }}" rel="stylesheet"/>
    <link href="{{ asset('/css/style.css') }}" rel="stylesheet"/>


    <style>
        .content-section {
            background-image: url(/img/bg_image.png);
            background-position: center;
            background-size: cover;
            background-attachment: fixed;
            position: relative;
            z-index: 2;

        }

        .content-section {
            content: "";
            width: 100%;
            height: 100%;
            position: absolute;
            top: 0;
            left: 0;
            background-color: rgba(21, 20, 51, 0.479);
            z-index: -1;

        }

        .nav-link.dropdown-toggle {
            position: relative;
            padding-right: 1.5rem;
        }

        .nav-link.dropdown-toggle::after {
            display: none;
        }

        /* Additional styles for the dropdown */
        .dropdown-container .dropdown-menu {
            background-color: #ffffff;
            color: #000000;
        }

        .nav-link.dropdown-toggle i {
            display: inline-block !important;
        }
    </style>

</head>

<body>
@include('include.header')


<main>

    <div class="container-fluid px-0 ">
        @yield('content')
    </div>
</main>


</body>

</html>
