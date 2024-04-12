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
  
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <script src="/script/script.js"></script> 

    <link rel="stylesheet" href="/css/style.css">
    <link rel="icon" type="image/png" href="img/logo.png">
</head>

<body>

    <nav class="navbar navbar-expand-lg py-1.5 sticky-top ">
        <div class="container-fluid">
            <img src="/img/logo.png" alt="">
            <a class="navbar-brand text-white" href="welcome">Digital Gallery</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item ">
                        <a class="nav-link text-white " href="welcome">Home</a>
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
                        <a class="nav-link text-white" href="login">Contact</a>
                    </li>
                </ul>
                <a href="login" class="btn btn-primary">Log in</a>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 mx-auto" style="margin-top: 25px;">
                <form class="d-flex ms-auto" enctype="multipart/form-data">
                    <input class="form-control me-2" type="file" accept="video/*" id="video-upload" onchange="previewVideo(this);" aria-label="Upload video">
                    <button class="btn btn-outline-success" type="submit">Post Video</button>
                </form>
                <div class="row" id="video-preview" style="display: none;">
                    <div class="col-lg-12 mx-auto">
                        <video id="preview-video" width="320" height="240" controls>
                            Your browser does not support the video tag.
                        </video>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function previewVideo(input) {
            var file = input.files[0];
            var video = document.getElementById('preview-video');
            var source = document.createElement('source');
            source.setAttribute('src', URL.createObjectURL(file));
            video.appendChild(source);
            document.getElementById('video-preview').style.display = 'block';
        }
    </script>

     
    <div class="container posts-content">
    <div class="row">
        <div class="col-lg-7 mx-auto">
            <div class="card mb-4" style="margin :15px;">
                <div class="media mb-9" style="display: flex; align-items: center;">
                    <img src="https://bootdey.com/img/Content/avatar/avatar3.png" class="d-block ui-w-40 rounded-circle" alt="" style="margin-left:15px;" style="flex-shrink: 0;">
                    <div class="media-body ml-3">
                        <h6 style="margin-left:15px;"> Kenneth Frazier</h6>
                        <div class="text-muted small" style="margin-left:15px;"> <h7>3 days ago</h7></div>
                    </div>
                </div>
                <p style="margin-left:15px;"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus finibus commodo bibendum.</p>
                <video src="/img/BETWAY APPP.mp4" class="img-fluid" style="width: 100%;" height="600px" controls autoplay loop alt="Video"></video>
                <div class="card-body">
                    <!-- Add any additional content related to the video here -->
                </div>
                <div class="card-footer">
                    <a href="javascript:void(0)" class="d-inline-block text-muted">
                        <strong>123</strong> <small class="align-middle">Likes</small>
                    </a>
                    <a href="javascript:void(0)" class="d-inline-block text-muted ml-3" style="margin-left:10px; color:blue;">
                        <small class="align-middle">Share</small>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Add more rows and cards for other videos if needed -->
    <div class="row">
        <div class="col-lg-7 mx-auto">
            <div class="card mb-4" style="margin :15px;">
                <div class="media mb-9" style="display: flex; align-items: center;">
                    <img src="https://bootdey.com/img/Content/avatar/avatar3.png" class="d-block ui-w-40 rounded-circle" alt="" style="margin-left:15px;" style="flex-shrink: 0;">
                    <div class="media-body ml-3">
                        <h6 style="margin-left:15px;"> Kenneth Frazier</h6>
                        <div class="text-muted small" style="margin-left:15px;"> <h7>3 days ago</h7></div>
                    </div>
                </div>
                <p style="margin-left:15px;"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus finibus commodo bibendum.</p>
                <video src="/img/skomi.mp4" class="img-fluid" style="width: 100%;" height="600px" controls autoplay loop alt="Video"></video>
                <div class="card-body">
                    <!-- Add any additional content related to the video here -->
                </div>
                <div class="card-footer">
                    <a href="javascript:void(0)" class="d-inline-block text-muted">
                        <strong>123</strong> <small class="align-middle">Likes</small>
                    </a>
                    <a href="javascript:void(0)" class="d-inline-block text-muted ml-3" style="margin-left:10px; color:blue;">
                        <small class="align-middle">Share</small>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

</body>

</html>
