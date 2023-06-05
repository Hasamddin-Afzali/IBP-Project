
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" href="{{asset('loginfiles/')}}/css/style.css">
    <title>Login Page</title>
</head>
<body>
    <div class="container py-5 vh-100">
      <div class="row d-flex justify-content-center h-100 align-items-center">
        <div class="col-lg-4 col-md-6">
              <div class="card">
                <div class="card-body p-3">
                  <div class="col header-img my-3">
                    <img src="{{asset('loginfiles/')}}/img/header-logo.png" class="img-fluid" alt="LOGO">
                  </div>
                  <div class="card-title">
                    <h5 class=" mb-4">Create a new account</h5>
                  </div>
                  <form action="register" method="POST" name="signup">
                    {{ csrf_field() }}
                    <div class="form-outline">
                      <input type="text" placeholder="Username" name="name" class="form-control mb-3 focus-none">
                    </div>
                    <div class="col">
                      <input type="email" placeholder="E-mail" name="email" class="form-control mb-3 focus-none">
                    </div>
                    <div class="col">
                      <input type="password" placeholder="Password" name="password" class="form-control mb-3 focus-none">
                    </div>
                    <div class="col">
                        <button type="submit" class="btn btn-primary w-100 btn-block">SIGN UP NOW</button>
                    </div>
                    <hr>
                    <div class="col">
                        <a href=""><button type="button" class="btn btn-success btn-block w-100 mb-3">Already have an account</button></a>
                    </div>
                  </form>         
                </div>
              </div> 
          </div>
        </div>
        <p class="text-center text-light">2022 &copy; Hasamuddin.com.tr</p>
      </div>
    </div>
    <script src="js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
