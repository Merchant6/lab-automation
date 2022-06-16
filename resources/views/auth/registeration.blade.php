<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Majestic Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{ asset('/theme/vendors/mdi/css/materialdesignicons.min.css') }}">
  <link rel="stylesheet" href="{{ asset('/theme/vendors/mdi/css/vendor.bundle.base.css') }}">
 
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{ asset('/theme/css/style.css') }}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{ asset('/theme/images/favicon.png')}}" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-stretch auth auth-img-bg">
        <div class="row flex-grow">
          <div class="col-lg-6 d-flex align-items-center justify-content-center">
            <div class="auth-form-transparent text-left p-3">
              <div class="brand-logo">
                <img src="{{asset('/theme/images/logo.svg')}}" alt="logo">
              </div>
              <h4>New here?</h4>
              <h6 class="font-weight-light">Join us today! It takes only few steps</h6>
              <form class="pt-3" method="POST" action="{{ route('register.custom') }}">
                @csrf
                <div class="form-group">
                  <label>Username</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="mdi mdi-account-outline text-primary"></i>
                      </span>
                    </div>
                    
                    <input id="name" type="text" class="form-control form-control-lg border-left-0 @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>
                                {{-- @if ($errors->has('username'))
                                  <span class="text-danger">{{ $errors->first('username') }}</span>
                                @endif --}}
                                <div class="error mt-3 border-round"> 
                                    @if(session()->get('username'))
                                        <div class="alert alert-success">
                                          {{ session()->get('username') }}  
                                        </div><br />
                                    @endif
                                </div>
                               
                  </div>
                </div>

                <div class="form-group">
                  <label>Password</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="mdi mdi-lock-outline text-primary"></i>
                      </span>
                    </div>
                    <input id="exampleInputPassword" type="password" class="form-control form-control-lg border-left-0 @error('pass') is-invalid @enderror" name="pass" required>
                                <div class="error mt-3 border-round"> 
                                    @if(session()->get('pass'))
                                        <div class="alert alert-success">
                                          {{ session()->get('pass') }}  
                                        </div><br />
                                    @endif
                                </div>
                                
                    
                </div>
                </div>

                <div class="form-group">
                    <label>Confirm Password</label>
                    <div class="input-group">
                      <div class="input-group-prepend bg-transparent">
                        <span class="input-group-text bg-transparent border-right-0">
                          <i class="mdi mdi-lock-outline text-primary"></i>
                        </span>
                      </div>
                                          
                      <input id="exampleInputPassword" type="password" class="form-control form-control-lg border-left-0 @error('confirm_password') is-invalid @enderror" name="confirm_password" required>
                                <div class="error mt-3 border-round"> 
                                    @if(session()->get('confirm_password'))
                                        <div class="alert alert-success">
                                          {{ session()->get('confirm_password') }}  
                                        </div><br />
                                    @endif
                                </div>
                  </div>
                  </div>
                
                <div class="mt-3">
                  <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">SIGN UP</button>
                </div>
                <div class="text-center mt-4 font-weight-light">
                  Already have an account? <a href="{{route('login')}}" class="text-primary">Login</a>
                </div>
              </form>
            </div>
          </div>
          <div class="col-lg-6 register-half-bg d-flex flex-row">
            <p class="text-white font-weight-medium text-center flex-grow align-self-end">Copyright &copy; 2020  All rights reserved.</p>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
 <script src="{{asset('/theme/vendors/base/vendor.bundle.base.js')}}"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="{{asset('/theme/js/off-canvas.js')}}"></script>
  <script src="{{asset('/theme/js/hoverable-collapse.js')}}"></script>
  <script src="{{asset('/theme/js/template.js')}}"></script>
  <!-- endinject -->
</body>

</html>
