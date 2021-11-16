<html lang="en">
<head>
  <title>PayHelpa Ligin</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">

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
        <img src="payhelpa-01.png" alt="">
      </div>
  </div>
  <div class="row" style="margin-top: 5rem;">
    <div class="col">
        <h1 style="font-style: normal; font-weight: 600; font-size: 36px; line-height: 43.57px; color: #231F20;">Reset your password</h1>
        <p class="mt-3" style="font-style: normal; font-weight: 400; font-size: 20px; line-height: 22px; color: #979797;">Enter your user account verified email and we would send you a password reset link.</p>
    </div>
  </div>

    <div class="row mt-5">
    
      <div class="col-md-6" style="max-width: 42% !important;">
        <form method="POST" action="{{ route('password.email') }}">
            @csrf
        
          <div class="form-group">
            <label for="email" class="text-right" style="font-style: normal; font-weight: 400; font-size: 20px; line-height: 24.2px; text-align: center; color: #303030;">Email address</label>
            <input type="email" class="form-control" placeholder="example@gmail.com" type="email" name="email" :value="old('email')" required autofocus>
          </div>
         
         
          <div class="row mt-2">
            <div class="col">
              <button type="submit" class="btn btn-primary text-white mt-2" style="font-style: normal; font-weight: 600; font-size: 14px; line-height: 16px;">VERIFY MY ACCOUNT</button>
            </div>
          </div>
          
        </form>

       
      </div>


      
    
    </div>

</div>


</body>
</html>