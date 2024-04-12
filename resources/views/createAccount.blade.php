<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>UL Digital Gallery</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
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


    <div class="hero  N  vh-100 d-flex align-items-center" id="home">
    <div class="container">

   <section>
      <div class="container mt-3 pt-2">
        <div class="row">
          <div class="col-12 col-sm-7 col-md-5 m-auto">
            <div class="card border-0 shadow">
              <div class="card-body text-centre">
              <div class="d-flex justify-content-center">
              <img src="/img/logo.png" alt="" class="img-fluid">
            </div>
                <h1 class="text-center">Log in</h1>
                <p class="text-center">Digital <span style="color:#0E6545;">Gallery</span></p>
                <form action="">

                <label for="username">Full name</label>
                  <input type="text" name="" id="" class="form-control rounded-pill my-1 py-2 custom-input"  />

                <label for="username">Phone number</label>
                <input type="phone number" name="" id="" class="form-control rounded-pill my-1 py-2 custom-input"  />

                 

                <label for="username">Email</label>
                <input type="email" name="" id="" class="form-control rounded-pill my-1 py-2 custom-input"  />

                <label for="username">Password</label>
                <input type="password" name="" id="" class="form-control rounded-pill my-1 py-2 custom-input"  />

                <label for="username">Confirm Password</label>
                <input type="password" name="" id="" class="form-control rounded-pill my-1 py-2 custom-input"  />

                  

                  <div class="text-center mt-3">
                  <div class="d-inline-block">
                            <p class="d-inline">Already have an account ?</p>
                            <a href="login" class="nav-link d-inline m">Log in</a>
                        </div>
                        <button class="btn btn-primary w-100 mt-3">create account</button>
                       
                    </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>   

   
    






</body>

</html>