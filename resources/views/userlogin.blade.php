@extends('main')
@section('content')
  
<section class="vh-100" style="background-color: #eee;">
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-12 col-xl-11">
        <div class="card text-black" style="border-radius: 25px;">
          <div class="card-body p-md-5">
            <div class="row justify-content-center">
              <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Please Login</p>

                @if(Session::has('success'))
                <div  class="alert alert-success">{{Session::get('success')}}</div>

                @endif

                {{-- @if(Session::has('notauthority'))
                <div  class="alert alert-danger">{{Session::get('notauthority')}}</div>

                @endif --}}
                
              

                @error('email')
                 <div class="alert alert-danger">{{ $message }}</div>
                 @enderror

                <form  action="{{ route('userlogin')}}" class="mx-1 mx-md-4" method="post" >
                  @csrf

               
               

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="email" id="email" value="{{ old('email') }}" autocomplete="off"   name="email" class="form-control" />
                      <label class="form-label" for="form3Example3c">Your Email</label>
                     
                    </div>
                  
                  </div>
                 


     r




                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="password" id="password" value="{{ old('password') }}" class="form-control" name="password" autocomplete="off" />
                      <label class="form-label" for="form3Example4c">Password</label>
                    </div>
                  
                  </div>

                

                 

                

                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <button type="submit" class="btn btn-primary btn-lg" style="color:blue">Login</button>
                  </div>

                </form>
                <a href="{{ url('/') }}" style="color:rgb(0, 79, 128)">Please go to Registration Page</a>

              </div>
              <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/draw1.webp"
                  class="img-fluid" alt="Sample image">

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection