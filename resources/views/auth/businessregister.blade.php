<html lang="en">
<head>
  <title>PayHelpa Business Register</title>
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
      font-family: 'Inter', sans-serif;
    }
    .masked{
      background-image: url("assets/images/Mask Group.png"); /* The image used */
      /* background-color: #cccccc; Used if the image is unavailable */
      height: 250px; /* You must set a specified height */
      background-position: center; /* Center the image */
      background-repeat: no-repeat; /* Do not repeat the image */
      background-size: cover; 
    }
   /* Extra small devices (phones, 600px and down) */
   @media only screen and (max-width: 768px) {
    .name-box
      {
        width: 100% !important;
      }

      .email-address-box
      {
        width: 100% !important;
      }

      .password-box
      {
        width: 100% !important;
      }
    }
  }
    .cursor{
      cursor: pointer;
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
  <div class="row" style="margin-top: 3rem;">
    <div class="col text-center">
        <h1 style="font-style: normal; font-weight: 600; font-size: 32px; line-height: 43.57px; text-align: center; color: #231F20;">Welcome to your peer to peer <br> business trading platform.</h1>
    </div>
  </div>

    <div class="row mt-5 mb-5">
    
      <div class="col-md-12">

        <div class="card rounded-0" style="width: 50%; margin:auto;">

        <form method="POST" action="{{ route('register') }}">
          @csrf
          <div class="form-group name-box mt-5" style="width: 90%; margin:auto;">
            <input type="hidden" name="is_business" value="1">
            <label for="name" class="text-right" style="font-weight: 400; font-size: 18px;  text-align: center; color: #303030;">Company Name</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Company Name" value="{{ old('name') }}" required>
             @error('name')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
             @enderror
          </div>
          <div class="form-group email-address-box mt-4" style="width: 90%; margin:auto;">
            <label for="email" class="text-right" style="font-weight: 400; font-size: 18px;  text-align: center; color: #303030;">Company Email address</label>
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="example@gmail.com" required>
              @error('email')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
              @enderror
          </div>
          <div class="form-group password-box mt-4" style="width: 90%; margin:auto;">
            <label for="pwd" class="text-right" style="font-weight: 400; font-size: 18px;  text-align: center; color: #303030;">Password</label>
            {{-- <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Enter your password" required> --}}
            
            <div class="input-group mb-3">
              
              <input id="password" type="password" class="form-control @error('password') is-invalid @enderror border border-right-0" name="password" value="{{ old('password') }}" required autocomplete="current-password">
              <div class="input-group-append">
                <span class="input-group-text bg-white border border-left-0"> <i class="fa fa-eye form-control-feedback cursor"></i></span>
              </div>

              @error('password')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
              @enderror

            </div>
            
           
          </div>
        
          <div class="form-group" style="width: 90%; margin:auto;">
            <p style="font-style: normal; font-weight: 400; font-size: 14px; line-height: 16.94px; color: #979797;">**Password should contain atleast one uppercase, <br> lowercase, digit, symbol and minimum of 8 characters**</p>
          </div>
          <div class="row">
            <div class="col text-center">
              <button type="submit" class="btn btn-primary text-white py-2 my-3" style="font-style: normal; font-size: 12px; line-height: 16px; background:#3E7BFA;">CREATE ACCOUNT</button>
            </div>
          </div>
          
        </form>

        <div class="row mb-3">
          <div class="col text-center">
            <p style="font-style: normal; font-weight: 400; font-size: 15px; line-height: 24px;"><span style="color:#979797;"> Already have an account?</span> <span> <a href="/login"> Log In</a></span></p>
          </div>
        </div>
      </div>


    </div>
    
    </div>

</div>

{{-- <div class="masked" style="margin-top: 1rem;"></div> --}}

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