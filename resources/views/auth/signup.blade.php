<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Signup</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
    <section class="h-100 gradient-form" style="background-color: #eee;">
        <div class="container py-5 h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-xl-10">
              <div class="card rounded-3 text-black">
                <div class="row g-0">
                  <div class="col-lg-6">
                    <div class="card-body p-md-5 mx-md-4">
      
                      <div class="text-center">
                        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/lotus.webp"
                          style="width: 185px;" alt="logo">
                        <h4 class="mt-1 mb-5 pb-1">We are The Lotus Team</h4>
                      </div>
      
                      <form action="{{route('signuped')}}" method="POST">
                        @csrf
                        <p>Please Signup</p>
                        <div data-mdb-input-init class="form-outline mb-4">
                            <label class="form-label" for="form2Example11">Username</label>
                          <input type="text" id="form2Example11" class="form-control" name="name" 
                            placeholder="username" />
                            @error('name')
                          <p class="text-danger"> {{$message}}</p>
                        @enderror
                        </div>
                       
                        <div data-mdb-input-init class="form-outline mb-4">
                            <label class="form-label" for="form2Example11">Email</label>
                            <input type="text" id="form2Example11" class="form-control" name="email" 
                              placeholder="Phone number or email address" />
                          </div>
                          @error('email')
                          <div>
                        <p class="text-danger"> {{$message}}</p>
                          </div>
                      @enderror
                        <div data-mdb-input-init class="form-outline mb-4">
                            <label class="form-label" for="form2Example22">Password</label>
                          <input type="password" id="form2Example22" class="form-control" name="password" />
                          @error('password')
                        
                          <p class="text-danger"> {{$message}}</p>
                            
                        @enderror
                        </div>
                
                        <div data-mdb-input-init class="form-outline mb-4">
                            <input type="password" id="form2Example22" class="form-control" name="Confirmpassword" />
                            <label class="form-label" for="form2Example22">Password</label>
                          </div>
                    
                        <div class="d-flex align-items-center justify-content-center pb-4">
                          <button  type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-outline-danger">Signup</button>
                        </div>
      
                      </form>
      
                    </div>
                  </div>
                  <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
                    
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>