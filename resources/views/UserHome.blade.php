<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">


    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('tittle ' ,'UL Digital Gallery')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="icon" type="image/png" href="img/logo.png">

    <style>
        .content-section {
            background-image: url(/img/bg_image.png);
            background-position: center;
            background-size: cover;
            background-attachment: fixed;
            position: relative;
            z-index: 2;

        }
        .content-section{
            content: "";
            width: 100%;
            height: 100%;
            position: absolute;
            top: 0;
            left: 0;
            background-color: rgba(21, 20, 51, 0.479);
            z-index: -1;

        }
    </style>

</head>

<body>
@include('include.loggedinHeader')

<div class="content-section">
    @yield('content2')

</div>




</body>

</html>
