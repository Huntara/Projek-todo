@extends('layout.layout')
@section('content')
    <div class="w-100  text-center text-lg-start " style="background-color: hsl(0, 0%, 96%)" >
        <div class="px-5 vh-100 d-flex align-items-center w-100 apacoba">
          <div class="d-flex justify-content-between align-items-center">
            <div class="col-lg-6 mb-5 mb-lg-0 woy">
              <h1 class="my-5 display-3 fw-bold text-white">
                Belajar 
                <br/>
                <span class="text-primary">Laravel Login and Register</span>
               </h1>
              
              <p style="color: rgb(255, 255, 255)">
                PPLG Wajib Ngulik!
              </p>
            </div>
            @if($errors->any())
            <script>
              swal("Error!","Harus mengisi semua input!","error");
            </script>
            @endif
            <div class="col-lg-5 mb-5 mb-lg-0">
              <div class="card w-100 ">
                <div class="card-body py-4 px-md-5">
                  <form action="/register/input" method="POST">
                    @csrf

                    <label for="form3Example4" class="form-label">Full name</label>
                    <div class="input-group mb-3">
                      <div class="input-group-text">
                        <i class='fas fa-portrait' style='font-size:20px'></i>
                      </div>
                      <input type="text" class="form-control" id="form3Example4" aria-describedby="basic-addon3" name="name" />
                    </div>

                   
                    <label for="form3Example4" class="form-label">Username</label>
                    <div class="input-group mb-3">
                      <div class="input-group-text">
                        <i class='fas fa-user-alt'></i>
                      </div>
                      <input type="text" class="form-control" id="form3Example4" aria-describedby="basic-addon3" name="username" />
                    </div>

                    <label for="form3Example4" class="form-label">Email</label>
                    <div class="input-group mb-3">
                      <div class="input-group-text">
                        <i class='fas fa-address-card'></i>
                      </div>
                      <input type="text" class="form-control" id="form3Example4" aria-describedby="basic-addon3" name="email" />
                    </div>

                    <label for="form3Example4" class="form-label">Password</label>
                    <div class="input-group mb-3">
                      <div class="input-group-text">
                        <i class='fas fa-key'></i>
                      </div>
                      <input type="password" class="form-control" id="form3Example4" aria-describedby="basic-addon3" name="password" />
                    </div>
                    <div class="d-flex justify-content-between mt-3 ">
                      <div class="p">Do you have an account?</div>
                      <a href="/" class="text-white">Back to login!</a>
                            
                      </div>
                    </div>   
                    <div class="d-flex align-items-center mb-4">      
                    <button type="submit" class="btn mx-5 btn-primary btn-lg btn-block">Create account</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
@endsection