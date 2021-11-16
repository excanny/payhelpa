<html lang="en">
<head>
  <title>PayHelpa Ligin</title>
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
      background-image: url("Mask Group.png"); /* The image used */
      /* background-color: #cccccc; Used if the image is unavailable */
      height: 250px; /* You must set a specified height */
      background-position: center; /* Center the image */
      background-repeat: no-repeat; /* Do not repeat the image */
      background-size: cover; 
    }
  </style>
</head>
<body>

<div class="container">
  <div class="row" style="margin-top: 5rem;">
      <div class="col">
        <a href="{{ url('/')}}">
        <img src="{{ asset('assets/images/payhelpa-03.png') }}" alt="">
        </a>
      </div>
  </div>
  <div class="row" style="margin-top: 5rem;">
    <div class="col">
        <h1 style="font-style: normal; font-weight: 600; font-size: 36px; line-height: 43.57px; color: #231F20;">Reset your password</h1>
       
    </div>
  </div>

    <div class="row mt-5">
    
      <div class="col-md-6" style="max-width: 42% !important;">

          <!-- Validation Errors -->
          
          <x-auth-validation-errors class="mb-4" :errors="$errors" />
          {{-- <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
             <x-auth-validation-errors class="mb-4" :errors="$errors" />
          </div> --}}

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <!-- Password Reset Token -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <!-- Email Address -->
            <div>
              <label for="email" class="text-right" style="font-size: 18px; line-height: 24.2px; text-align: center; color: #303030;" hidden>Email address</label>

                <x-input id="email" class="form-control" type="email" name="email" :value="old('email', $request->email)" required autofocus hidden/>
            </div>

            <!-- Password -->
            {{-- <div class="mt-4">
              <label for="email" class="text-right" style="font-style: normal; font-weight: 400; font-size: 20px; line-height: 24.2px; text-align: center; color: #303030;">Password</label>

                <x-input id="password" class="form-control" type="password" name="password" required />
            </div> --}}

            <label for="pwd" class="text-right mt-4" style="font-size: 18px; line-height: 24.2px; text-align: center; color: #303030;">Password</label>
            <div class="input-group mb-3">
              <x-input id="password" class="form-control border border-right-0 password" type="password" name="password" required />
              <div class="input-group-append">
                <span class="input-group-text bg-white border border-left-0"> <i class="fa fa-eye-slash form-control-feedback cursor"></i></span>
              </div>
            </div>

            <!-- Confirm Password -->

            <label for="pwd" class="text-right mt-4" style="font-style: normal; font-weight: 400; font-size: 20px; line-height: 24.2px; text-align: center; color: #303030;">Confirm Password</label>
            <div class="input-group mb-3">
              <x-input id="password_confirmation" class="form-control border border-right-0 password" type="password" name="password_confirmation" required />
              <div class="input-group-append">
                <span class="input-group-text bg-white border border-left-0"> <i class="fa fa-eye-slash form-control-feedback cursor"></i></span>
              </div>
            </div>

            <div class="flex items-center justify-end mt-4">
              <button type="submit" class="btn btn-primary text-white mt-2" style="font-style: normal; font-weight: 600; font-size: 14px; line-height: 16px;">RESET</button>
            </div>
        </form>

       
      </div>


      
    
    </div>

</div>


<script>
   
  // toggle password visibility
  $('.form-control-feedback').on('click', function() {
    $(this).toggleClass('fa-eye-slash').toggleClass('fa-eye'); // toggle our classes for the eye icon
   
    if($(this).hasClass('fa-eye')){
      $('.password').attr('type','text'); // activate the hideShowPassword plugin
    }
    else
    {
      $('.password').attr('type','password');
    }
  });
</script>


</body>
</html>