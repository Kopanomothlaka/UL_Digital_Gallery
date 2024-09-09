<!-- resources/views/news/show.blade.php -->
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>UL Digital Gallery</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <script src="/script/script.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="/css/style.css">
    <link rel="icon" type="image/png" href="img/logo.png">
    <style>
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


        .like-btn {
            background-color: #C8AB4D; /* Red background */
            border: none; /* Remove border */
            color: white; /* White text */
            padding: 10px 16px; /* Add some padding */
            text-align: center; /* Center the icon */
            text-decoration: none; /* Remove underline */
            display: inline-block; /* Display as inline-block */
            font-size: 16px; /* Set the font size */
            margin: 4px 2px; /* Add some margin */
            cursor: pointer; /* Change the cursor to a pointer on hover */
            border-radius: 50%; /* Make it a circle */
        }

        .like-btn:hover {
            background-color: #C8AB4D; /* Slightly darker green on hover */
        }

        .unlike-btn {
            background-color: #f44336; /* Red background */
            border: none; /* Remove border */
            color: white; /* White text */
            padding: 10px 16px; /* Add some padding */
            text-align: center; /* Center the icon */
            text-decoration: none; /* Remove underline */
            display: inline-block; /* Display as inline-block */
            font-size: 16px; /* Set the font size */
            margin: 4px 2px; /* Add some margin */
            cursor: pointer; /* Change the cursor to a pointer on hover */
            border-radius: 50%; /* Make it a circle */
        }

        .unlike-btn:hover {
            background-color: #c62828; /* Slightly darker red on hover */
        }

        .video-container {
            position: relative;
            padding-top: 40.25%; /* 16:9 Aspect Ratio */
            background-color: #000000;
        }

        .video-container video {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }
    </style>
</head>

<body>
<style>
    .spinner-container {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: rgb(33, 37, 41);
        z-index: 9999;
    }

    .spinner-container img {
        justify-content: center;
        text-align: center;

    }

    .spinner-grow {
        margin-top: 20px;
    }

</style>
<script>
    window.addEventListener('load', function () {
        document.querySelector('.spinner-container').style.display = 'none';
    });

</script>

<div class="spinner-container">
    <div class="spinner-grow" style="width: 7rem; height: 7rem; color: white;" role="status">
        <span class="sr-only"></span>
        <img src="/img/logo.png" alt="Logo" style="width: 90px;margin: 17px">

    </div>
</div>
<div class="text-center mb-5 col-lg-7 mx-auto">
    <img src="{{ asset('/img/logo.png') }}" class="img-fluid" alt="Logo"/>
    <h1 class="display-4">University Of Limpopo News</h1>
</div>
<div class="text mb-5 col-lg-7 mx-auto">


    <div class="container mt-5">
        <h1 class="mb-3 font-weight-bold">{{ $news->title }}</h1>
        <img src="{{ asset('/photos/' . $news->photo) }}" class="img-fluid mb-3" alt="News Image">
        <p>{{ $news->body }}</p>
        <p><small class="text-muted">Author: {{ $news->author }}</small></p>
        <p><small class="text-muted">Published: {{ $news->date->format('M d, Y') }}</small></p>
    </div>
</div>


</body>

</html>






























