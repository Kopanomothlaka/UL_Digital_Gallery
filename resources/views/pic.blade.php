<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">


    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <script src="/script/script.js"></script>

    <link href="{{ asset('/css/style.css') }}" rel="stylesheet"/>
    <link rel="icon" type="image/png" href="img/logo.png">


</head>
<style>
    /* Importing Google Font Poppins */
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;800;900&display=swap');

    /* Resetting padding and margin */
    body {
        font-family: 'Poppins', sans-serif;
        padding: 0;
        margin: 0;
        background-color: #f5f5f5;
    }

    /* Styling container */
    .container {
        width: 100vw;
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 25px;
        padding: 20px;
    }

    /* Image card styling */
    .image-card-container {
        position: relative;
        margin-bottom: 20px;
        background-color: white;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        text-align: center;
    }

    /* Image container */
    .image-container {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100%;
        overflow: hidden;
    }

    .image-container img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    /* Overlay text styling */
    .container .text {
        height: 100%;
        width: 100%;
        position: absolute;
        top: 0;
        left: 0;
        display: flex;
        align-items: flex-end;
        padding: 3px;

        margin-bottom: 5px;
        line-height: 5;
        font-size: large;
        color: white;
        background-color: rgba(7, 7, 7, 0.414);
    }

    /* Text image styling */
    .container .text img {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        margin-right: 10px;
        margin-bottom: 15px;
        border: 1px solid white;
    }

    /* Responsive adjustments */
    @media (max-width: 992px) {
        .image-card-container {
            flex: 1 1 calc(33% - 20px);
        }
    }

    @media (max-width: 768px) {
        .image-card-container {
            flex: 1 1 calc(50% - 20px);
        }
    }

    @media (max-width: 576px) {
        .image-card-container {
            flex: 1 1 100%;
        }
    }

</style>
<body>


<nav class="navbar navbar-expand-lg py-1.5 sticky-top ">
    <div class="container-fluid">

        <div class="navvv">
            <a href="welcome">
                <img src="/img/logo.png" alt="Logo">
            </a>

        </div>


        <form class="form-inline my-2 my-lg-0" action="{{ route('search') }}" method="GET">
            <input class="form-control mr-sm-2" type="search" style="margin-left: 15px;" placeholder="Search here"
                   aria-label="Search" name="query" id="searchInput">
        </form>


        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>


        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link text-white" href="welcome">Home</a>
                </li>
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
            </ul>
        </div>
    </div>
</nav>


<div class="container mt-5">
    <div class="">
        <div class="image-card-container">
            <div class="image-container">
                <img src="/img/kay.jpg" alt="">
            </div>
            <div class="text">
                <img src="/img/akkkk.jpg" alt="">Kopano Mothlaka
            </div>
        </div>
        <div class="image-card-container">
            <div class="image-container">
                <img src="/img/team.jpg" alt="">
            </div>
            <div class="text">
                <img src="/img/team.jpg" alt="">Kopano Mothlaka
            </div>
        </div>
        <div class="image-card-container">
            <div class="image-container">
                <img src="/img/istockphoto-1403500817-612x612.jpg" alt="">
            </div>
            <div class="text">
                <img src="/img/istockphoto-1403500817-612x612.jpg" alt="">Kopano Mothlaka
            </div>
        </div>
        <div class="image-card-container">
            <div class="image-container">
                <img src="/img/pexels-efrem-efre-2786187-27582545.jpg" alt="">
            </div>
            <div class="text">
                <img src="/img/pexels-efrem-efre-2786187-27582545.jpg" alt="">Kopano Mothlaka
            </div>
        </div>
    </div>
    <div class="">
        <div class="image-card-container">
            <div class="image-container">
                <img src="/img/pexels-hao-jin-1587812061-27367865.jpg" alt="">
            </div>
            <div class="text">
                <img src="/img/pexels-hao-jin-1587812061-27367865.jpg" alt="">Kopano Mothlaka
            </div>
        </div>
        <div class="image-card-container">
            <div class="image-container">
                <img src="/img/pexels-shadell-clark-184416555-11666211.jpg" alt="">
            </div>
            <div class="text">
                <img src="/img/pexels-shadell-clark-184416555-11666211.jpg" alt="">Kopano Mothlaka
            </div>
        </div>
        <div class="image-card-container">
            <div class="image-container">
                <img src="/img/pexels-shanerich5-27355247.jpg" alt="">
            </div>
            <div class="text">
                <img src="/img/pexels-shanerich5-27355247.jpg" alt="">Kopano Mothlaka
            </div>
        </div>
        <div class="image-card-container">
            <div class="image-container">
                <img src="/img/pexels-valeriya-27852806.jpg" alt="">
            </div>
            <div class="text">
                <img src="/img/pexels-valeriya-27852806.jpg" alt="">Kopano Mothlaka
            </div>
        </div>
    </div>
    <div class="">
        <div class="image-card-container">
            <div class="image-container">
                <img src="/img/pexels-simranpreet-singh-1157199357-28158295.jpg" alt="">
            </div>
            <div class="text">
                <img src="/img/pexels-simranpreet-singh-1157199357-28158295.jpg" alt="">Kopano Mothlaka
            </div>
        </div>
        <div class="image-card-container">
            <div class="image-container">
                <img src="/img/pexels-luciana-evrard-1458998685-27367377.jpg" alt="">
            </div>
            <div class="text">
                <img src="/img/pexels-luciana-evrard-1458998685-27367377.jpg" alt="">Kopano Mothlaka
            </div>
        </div>
        <div class="image-card-container">
            <div class="image-container">
                <img src="/img/pexels-marcus-silva-86421404-27703471.jpg" alt="">
            </div>
            <div class="text">
                <img src="/img/pexels-marcus-silva-86421404-27703471.jpg" alt="">Kopano Mothlaka
            </div>
        </div>
        <div class="image-card-container">
            <div class="image-container">
                <img src="/img/pexels-thebaaru-27468751.jpg" alt="">
            </div>
            <div class="text">
                <img src="/img/pexels-thebaaru-27468751.jpg" alt="">Kopano Mothlaka
            </div>
        </div>
    </div>
</div>
</body>

</html>
