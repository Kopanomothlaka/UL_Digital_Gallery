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

        <a href="welcome">
                <img src="/img/logo.png" alt="Logo">
            </a>

                
                <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" style="margin-left: 15px;" placeholder="Search here" aria-label="Search">
      
                </form>
            

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>


            <div class="collapse navbar-collapse" id="navbarNav" >
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
                        <a class="nav-link text-white" href="contact">Contact</a>
                    </li>

                </ul>

                
                <a href="login" class="btn btn-primary">Log in</a>
            </div>
        </div>
    </nav>
    <div class="container-fluid">
    
    <div class="row">
        <div class="col-lg-6 mx-auto" style="margin-top: 25px;">
            
        
            
            <form role="form" class="post-to-timeline shadow p-3 mb-3 bg-white rounded" style="margin-top:20px;">
                <div class="input-group">
                    <textarea class="form-control" style="height: 70px; margin-bottom: 10px; resize: none;" placeholder="What's on your mind..."></textarea>
                    <div class="input-group-append p-3">
                        <label for="image-upload" class="btn btn-sm btn-default ">
                            <i class="fa fa-camera" style="color: white;"></i>
                            <input type="file" id="image-upload" style="display: none;" onchange="previewImage(this);">
                        </label>
                        <button type="submit" class="btn btn-primary">Post</button>
                    </div>
                </div>
                <p id="file-name"></p> <!-- Element to display the file name -->
            </form>


            <div class="row" id="image-preview" style="display: none;">
               <div class="col-lg-2 mx-auto">
                   <img id="preview-img" src="#" alt="Preview Image" style="max-width: 100%; max-height: auto;">
               </div>
            </div>
        </div>
    </div>


   



</div>



    </div>
</div>

<script>
    function previewImage(input) {
        var file = input.files[0];
        var reader = new FileReader();

        reader.onload = function (e) {
            document.getElementById('image-preview').style.display = 'block';
            document.getElementById('preview-img').src = e.target.result;
        };

        reader.readAsDataURL(file);
    }
</script>

     
     


    
    <div class="container posts-content">
   


    <div class="row">
        <div class="col-lg-7 mx-auto" >
            <div class="card mb-4 shadow p-3 mb-1 bg-white rounded">

            <div class="media mb-9" style="display: flex; align-items: center;">
                <img src="https://bootdey.com/img/Content/avatar/avatar3.png" class="d-block ui-w-40 rounded-circle" alt="" style="margin-left:15px;" style="flex-shrink: 0;">
                <div class="media-body ml-3">
                     <h6 style="margin-left:15px;"> Kenneth Frazier</h6>
                    <div class="text-muted small" style="margin-left:15px;"> <h7>3 days ago</h7></div>
                </div>
            </div>
            <p style="margin-left:15px;"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus finibus commodo bibendum.
                    </p>
            <img src="/img/bg_image.png" class="img-fluid" style="width: 100%;" height="600px" alt="">
                <div class="card-body"  >
                                   

                    
                </div>


                <div class="card-footer">
                    <a href="javascript:void(0)" class="d-inline-block text-muted">
                        <strong>123</strong> <small class="align-middle">Likes</small>
                    </a>
                         <a href="javascript:void(0)" class="d-inline-block text-muted ml-3" style="margin-left:10px; color:blue;" >
                        <small class="align-middle">Share</small>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-7 mx-auto" >
            <div class="card mb-4 shadow p-3 mb-1 bg-white rounded">

            <div class="media mb-9" style="display: flex; align-items: center;">
                <img src="https://bootdey.com/img/Content/avatar/avatar3.png" class="d-block ui-w-40 rounded-circle" alt="" style="margin-left:15px;" style="flex-shrink: 0;">
                <div class="media-body ml-3">
                     <h6 style="margin-left:15px;"> Kenneth Frazier</h6>
                    <div class="text-muted small" style="margin-left:15px;"> <h7>3 days ago</h7></div>
                </div>
            </div>
            <p style="margin-left:15px;"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus finibus commodo bibendum.
                    </p>
            <img src="/img/bg_image.png" class="img-fluid" style="width: 100%;" height="600px" alt="">
                <div class="card-body"  >
                                   

                    
                </div>


                <div class="card-footer">
                    <a href="javascript:void(0)" class="d-inline-block text-muted">
                        <strong>123</strong> <small class="align-middle">Likes</small>
                    </a>
                         <a href="javascript:void(0)" class="d-inline-block text-muted ml-3" style="margin-left:10px; color:blue;" >
                        <small class="align-middle">Share</small>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-7 mx-auto" >
            <div class="card mb-4">

            <div class="media mb-9" style="display: flex; align-items: center;">
                <img src="https://bootdey.com/img/Content/avatar/avatar3.png" class="d-block ui-w-40 rounded-circle" alt="" style="margin-left:15px;" style="flex-shrink: 0;">
                <div class="media-body ml-3">
                     <h6 style="margin-left:15px;"> Kenneth Frazier</h6>
                    <div class="text-muted small" style="margin-left:15px;"> <h7>3 days ago</h7></div>
                </div>
            </div>
            <p style="margin-left:15px;"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus finibus commodo bibendum.
                    </p>
            <img src="/img/bg_image.png" class="img-fluid" style="width: 100%;" height="600px" alt="">
                <div class="card-body"  >
                                   

                    
                </div>


                <div class="card-footer">
                    <a href="javascript:void(0)" class="d-inline-block text-muted">
                        <strong>123</strong> <small class="align-middle">Likes</small>
                    </a>
                         <a href="javascript:void(0)" class="d-inline-block text-muted ml-3" style="margin-left:10px; color:blue;" >
                        <small class="align-middle">Share</small>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-7 mx-auto" >
            <div class="card mb-4">

            <div class="media mb-9" style="display: flex; align-items: center;">
                <img src="https://bootdey.com/img/Content/avatar/avatar3.png" class="d-block ui-w-40 rounded-circle" alt="" style="margin-left:15px;" style="flex-shrink: 0;">
                <div class="media-body ml-3">
                     <h6 style="margin-left:15px;"> Kenneth Frazier</h6>
                    <div class="text-muted small" style="margin-left:15px;"> <h7>3 days ago</h7></div>
                </div>
            </div>
            <p style="margin-left:15px;"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus finibus commodo bibendum.
                    </p>
            <img src="/img/bg_image.png" class="img-fluid" style="width: 100%;" height="600px" alt="">
                <div class="card-body"  >
                                   

                    
                </div>


                <div class="card-footer">
                    <a href="javascript:void(0)" class="d-inline-block text-muted">
                        <strong>123</strong> <small class="align-middle">Likes</small>
                    </a>
                         <a href="javascript:void(0)" class="d-inline-block text-muted ml-3" style="margin-left:10px; color:blue;" >
                        <small class="align-middle">Share</small>
                    </a>
                </div>
            </div>
        </div>
    </div>
    
     
</div>
      
    </section>   

   
    





    <script src="/script/script.js"></script> 

</body>

</html>