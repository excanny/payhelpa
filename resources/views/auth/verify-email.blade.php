<html lang="en">
<head>
  <title>PayHelpa Register Success</title>
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
      background-image: url("assets/images/Mask Group.png"); /* The image used */
      /* background-color: #cccccc; Used if the image is unavailable */
      height: 250px; /* You must set a specified height */
      background-position: center; /* Center the image */
      background-repeat: no-repeat; /* Do not repeat the image */
      background-size: cover; 
    }
  </style>
</head>
<body>


{{-- <div style="margin-top: 1rem;" class="pr-3">
    <form method="POST" action="{{ route('logout') }}">
        @csrf

        <button type="submit" class="btn btn-sm float-right">
            {{ __('Log Out') }}
        </button>
    </form>
</div> --}}

<div class="container">
    
  <div class="row">
      <div class="col text-center mt-5">
        <a href="{{ url('/')}}">
        <img src="{{ asset('assets/images/payhelpa-03.png')}}" alt="">
        </a>
      </div>
  </div>
  <div class="row" style="margin-top: 10rem;">
    <div class="col text-center">
        <svg width="96" height="96" viewBox="0 0 96 96" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" clip-rule="evenodd" d="M47.9999 0.333313C21.6749 0.333313 0.333252 21.675 0.333252 48C0.333252 74.325 21.6749 95.6666 47.9999 95.6666C74.3249 95.6666 95.6666 74.325 95.6666 48C95.6666 21.675 74.3249 0.333313 47.9999 0.333313ZM68.6612 39.94C69.0417 39.5051 69.3313 38.9985 69.5131 38.45C69.6949 37.9016 69.7652 37.3223 69.7198 36.7462C69.6744 36.1702 69.5142 35.6091 69.2487 35.0959C68.9833 34.5826 68.6178 34.1277 68.174 33.7578C67.7301 33.3879 67.2167 33.1105 66.664 32.9419C66.1113 32.7733 65.5305 32.717 64.9557 32.7762C64.381 32.8354 63.8238 33.009 63.3171 33.2867C62.8104 33.5644 62.3644 33.9407 62.0052 34.3933L43.3719 56.749L33.7302 47.103C32.913 46.3136 31.8184 45.8769 30.6822 45.8867C29.546 45.8966 28.4591 46.3523 27.6557 47.1558C26.8523 47.9592 26.3965 49.0461 26.3867 50.1822C26.3768 51.3184 26.8136 52.413 27.6029 53.2303L40.6029 66.2303C41.0287 66.6558 41.5385 66.988 42.0997 67.2056C42.661 67.4232 43.2614 67.5214 43.8627 67.4941C44.4641 67.4668 45.0531 67.3145 45.5924 67.0469C46.1316 66.7793 46.6091 66.4023 46.9946 65.94L68.6612 39.94Z" fill="#06C270"/>
          </svg>
        
        <h1 class="mt-3" style="font-style: normal; font-weight: 600; font-size: 36px; line-height: 43.57px; text-align: center; color: #231F20;">Awesome!</h1>
        <p style="font-style: normal; font-weight: 400; font-size: 18px; text-align: center; color: #979797">Registration successful. Please check your <br> email for activation link</p>
    </div>
  </div>

    <div class="row mx-auto text-center">
    
      <div class="text-center mx-auto">

        @if (session('status') == 'verification-link-sent')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ __('A new verification link has been sent to the email address you provided during registration.') }}
            </div>
        @endif
          
          {{-- <a href="" class="btn btn-outline-primary">EMAIL ACCOUNT</a> --}}
          {{-- <form method="POST" action="{{ route('verification.send') }}">
            @csrf --}}

            <div>
                {{-- <p class="my-0"><label for="">Didn't get link?</label></p>
                <button class="btn btn-outline-primary">
                    {{ __('Resend Verification Email') }}
                </button> --}}

                <a href="{{ url('/')}}">
                  <button class="btn px-5" style="border:1px solid #3E7BFA; padding-top: .6rem; padding-bottom: .6rem;">
                    <span style="font-style: normal; font-size: 10px; font-weight: 800; text-align: center; color: #3E7BFA">HOME PAGE</span> 
                  </button>
                </a>
                
            </div>
        {{-- </form> --}}

      </div>
    
    </div>

</div>

{{-- <div class="masked" style="margin-top: 5rem;"></div> --}}

</body>
</html>