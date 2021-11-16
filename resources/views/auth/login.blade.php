<html lang="en">
<head>
  <title>PayHelpa - Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <style>
     body{
      font-family: 'Inter', sans-serif !important;
    }
    .masked{
      /* background-image: url("Mask Group.png"); The image used */
      background-image: url("assets/images/Mask Group.png"); /* The image used */
      height: 250px; /* You must set a specified height */
      background-position: center; /* Center the image */
      background-repeat: no-repeat; /* Do not repeat the image */
      background-size: cover; 
    }
    .cursor{
      cursor: pointer;
    }
    
    *:focus {
    outline: none !important;
    }
     /* Extra small devices (phones, 600px and down) */
     @media only screen and (max-width: 768px) {
      .email-address-box
      {
        width: 100% !important;
      }

      .password-box
      {
        width: 100% !important;
      }
    }

  

    /* Large devices (laptops/desktops, 992px and up) */
    @media only screen and (min-width: 992px) {

    }

    /* Extra large devices (large laptops and desktops, 1200px and up) */
    @media only screen and (min-width: 1200px) {

    }
  </style>
</head>
<body>

<div class="container">
  <div class="row" style="margin-top: 5rem;">
      <div class="col text-center">
        <a href="{{ url('/')}}">
          <img src="{{ asset('assets/images/payhelpa-03.png')}}" alt="">
        </a>
      </div>
  </div>
  <div class="row" style="margin-top: 5rem;">
    <div class="col text-center">
        <h1 style="font-style: normal; font-weight: 600; font-size: 32px; line-height: 43.57px; text-align: center; color: #231F20;">Welcome! Enjoy your <br> trading experience</h1>
    </div>
  </div>

    <div class="row mt-5 mb-5">
    
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mx-auto">

        <div class="card rounded-0" style="width: 50%; margin:auto;">

        @if (session('error'))
          <div class="alert alert-danger">
              {{ session('error') }}
          </div>
        @endif
        
        <form method="POST" action="{{ route('login') }}">
          @csrf
        
          <div class="form-group email-address-box mt-5" style="width: 90%; margin: auto">
            <label for="email" class="text-right" style="font-weight: 400; font-size: 18px; text-align: center; color: #303030;">Email address</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror " name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="example@gmail.com">
            @error('email')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>
          
          <div class="form-group password-box mt-4" style="width: 90%; margin: auto">
            
            <label for="pwd" class="text-right" style="font-weight: 400; font-size: 18px; text-align: center; color: #303030;">Password</label>
            <div class="input-group mb-3">
              <input id="password" type="password" class="form-control @error('password') is-invalid @enderror border border-right-0" name="password" required autocomplete="current-password">
              <div class="input-group-append">
                <span class="input-group-text bg-white border border-left-0"> <i class="fa fa-eye form-control-feedback cursor"></i></span>
              </div>
            </div>
      
              @error('password')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror

              <small><a href="{{ url('forgot-password')}}" class="text-dark"> Can't remember my password?</a></small>
          </div>
         
          <div class="row mt-2">
            <div class="col text-center">
              <button type="submit" class="btn text-white mt-2 px-5 py-2" style="font-size: 12px; background: #3E7BFA">LOGIN</button>
            </div>
          </div>
          
        </form>

        <div class="row">
          <div class="col text-center">
            <p style="font-weight: 400; font-size: 13px; line-height: 24px;"><span style="color:#979797;"> Don't have an account?</span> <span> <a href="{{ url('/register')}}"> Sign Up</a></span></p>
          </div>
        </div>
      </div>

    </div>
      
    
    </div>

</div>

{{-- <div class="masked"></div> --}}

<script>
   
  // toggle password visibility
  $('.form-control-feedback').on('click', function() {
    $(this).toggleClass('fa-eye').toggleClass('fa-eye-slash'); // toggle our classes for the eye icon
   
    if($(this).hasClass('fa-eye-slash')){
      $('#password').attr('type','text'); // activate the hideShowPassword plugin
    }
    else
    {
      $('#password').attr('type','password');
    }
  });
</script>

</body>
</html>