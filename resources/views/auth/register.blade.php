<html lang="en">
<head>
  <title>PayHelpa Register</title>
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
     /* Extra small devices (phones, 600px and down) */
   @media only screen and (max-width: 768px) {
    .reg_btn1{
      padding: 3rem 4rem !important;
      margin-bottom: 1rem;
      text-align: center;
    }
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
</div>

  <div class="row" style="margin-top: 5rem;">
    <div class="col-12 text-center p-3">
        <h1 style="text-align: center; color: #231F20; font-weight: 600;">Let's get started</h1>
    </div>
  </div>

  <div class="container-fluid">
    <div class="row mt-5">
      <div class="col-md-3 col-sm-5 offset-md-3 offset-sm-3 text-center">
       
          
          <a href="{{ url('/register/individual')}}" class="btn btn-block reg_btn1" style="background:#3E7BFA; padding-top:1rem;">
            <svg width="57" height="57" viewBox="0 0 57 57" fill="none" xmlns="http://www.w3.org/2000/svg">
              <g clip-path="url(#clip0_2019:1034)">
              <path d="M48.0225 53.4374L44.6007 41.4585C44.5039 41.1209 44.5091 40.7622 44.6156 40.4275C44.7221 40.0929 44.9251 39.7971 45.1992 39.5775L53.2131 33.1668L50.8013 23.5142L45.9242 29.6132C45.7568 29.8217 45.5447 29.9899 45.3036 30.1055C45.0626 30.2211 44.7986 30.2812 44.5312 30.2812H35.625V26.7187H43.6763L50.2669 18.4804C50.4745 18.2217 50.7501 18.0261 51.0629 17.9157C51.3756 17.8052 51.713 17.7842 52.037 17.8552C52.361 17.9261 52.6587 18.086 52.8967 18.317C53.1347 18.548 53.3035 18.8409 53.3841 19.1626L56.9466 33.4126C57.0296 33.7431 57.0161 34.0906 56.9074 34.4136C56.7988 34.7366 56.5997 35.0217 56.3338 35.2348L48.3538 41.6188L51.4496 52.4595L48.0225 53.4374Z" fill="white"/>
              <path d="M40.9688 9.79688C40.9688 8.56384 41.3344 7.35848 42.0194 6.33324C42.7045 5.30801 43.6782 4.50893 44.8173 4.03707C45.9565 3.5652 47.21 3.44174 48.4194 3.68229C49.6287 3.92285 50.7396 4.51662 51.6115 5.38851C52.4834 6.2604 53.0772 7.37126 53.3177 8.58061C53.5583 9.78996 53.4348 11.0435 52.9629 12.1827C52.4911 13.3219 51.692 14.2955 50.6668 14.9806C49.6415 15.6656 48.4362 16.0313 47.2031 16.0313C45.5502 16.0294 43.9656 15.3719 42.7968 14.2032C41.6281 13.0344 40.9706 11.4498 40.9688 9.79688ZM44.5312 9.79688C44.5312 10.3253 44.688 10.8419 44.9815 11.2813C45.2751 11.7207 45.6924 12.0631 46.1806 12.2654C46.6689 12.4676 47.2061 12.5205 47.7244 12.4174C48.2427 12.3143 48.7188 12.0598 49.0924 11.6862C49.4661 11.3125 49.7206 10.8364 49.8237 10.3181C49.9268 9.79984 49.8738 9.26262 49.6716 8.7744C49.4694 8.28617 49.1269 7.86888 48.6875 7.5753C48.2482 7.28171 47.7316 7.125 47.2031 7.125C46.4948 7.12595 45.8157 7.40775 45.3149 7.90862C44.814 8.40949 44.5322 9.08854 44.5312 9.79688Z" fill="white"/>
              <path d="M35.6321 33.8438C34.6854 33.8438 33.7775 33.4677 33.108 32.7982C32.4386 32.1288 32.0625 31.2208 32.0625 30.2741V26.7259C32.0625 25.7792 32.4386 24.8712 33.108 24.2018C33.7775 23.5323 34.6854 23.1562 35.6321 23.1562H39.1875V17.8125H17.8125V23.1562H21.3679C22.3146 23.1562 23.2225 23.5323 23.892 24.2018C24.5614 24.8712 24.9375 25.7792 24.9375 26.7259V30.2741C24.9375 31.2208 24.5614 32.1288 23.892 32.7982C23.2225 33.4677 22.3146 33.8438 21.3679 33.8438H17.8125V39.1875H39.1875V33.8438H35.6321Z" fill="white"/>
              <path d="M8.97792 53.4374L12.3997 41.4585C12.4963 41.1209 12.491 40.7623 12.3845 40.4277C12.278 40.093 12.0751 39.7973 11.8012 39.5775L3.78736 33.1668L6.20095 23.516L11.078 29.6132C11.2452 29.8215 11.457 29.9896 11.6978 30.1052C11.9385 30.2208 12.2021 30.2809 12.4692 30.2812H21.3754V26.7187H13.3242L6.73533 18.4804C6.52775 18.2217 6.25207 18.0261 5.93934 17.9157C5.62661 17.8052 5.28924 17.7842 4.96524 17.8552C4.64124 17.9261 4.34347 18.086 4.10547 18.317C3.86747 18.548 3.69869 18.8409 3.61814 19.1626L0.0556421 33.4126C-0.0274415 33.7431 -0.0138644 34.0906 0.0947595 34.4136C0.203383 34.7366 0.402485 35.0217 0.668392 35.2348L8.64839 41.6188L5.5508 52.4595L8.97792 53.4374Z" fill="white"/>
              <path d="M9.79688 16.0313C8.56384 16.0313 7.35848 15.6656 6.33324 14.9806C5.30801 14.2955 4.50893 13.3219 4.03707 12.1827C3.5652 11.0435 3.44174 9.78996 3.68229 8.58061C3.92285 7.37126 4.51662 6.2604 5.38851 5.38851C6.2604 4.51662 7.37126 3.92285 8.58061 3.68229C9.78996 3.44174 11.0435 3.5652 12.1827 4.03707C13.3219 4.50893 14.2955 5.30801 14.9806 6.33324C15.6656 7.35848 16.0313 8.56384 16.0313 9.79688C16.0294 11.4498 15.3719 13.0344 14.2032 14.2032C13.0344 15.3719 11.4498 16.0294 9.79688 16.0313ZM9.79688 7.125C9.26843 7.125 8.75185 7.28171 8.31246 7.5753C7.87308 7.86888 7.53062 8.28617 7.32839 8.7744C7.12616 9.26262 7.07325 9.79984 7.17634 10.3181C7.27944 10.8364 7.53391 11.3125 7.90758 11.6862C8.28125 12.0598 8.75733 12.3143 9.27562 12.4174C9.79391 12.5205 10.3311 12.4676 10.8194 12.2654C11.3076 12.0631 11.7249 11.7207 12.0185 11.2813C12.312 10.8419 12.4688 10.3253 12.4688 9.79688C12.4678 9.08854 12.186 8.40949 11.6851 7.90862C11.1843 7.40775 10.5052 7.12595 9.79688 7.125Z" fill="white"/>
              </g>
              <defs>
              <clipPath id="clip0_2019:1034">
              <rect width="57" height="57" fill="white"/>
              </clipPath>
              </defs>
              </svg>
            <h6 style="font-size: 26px; font-style: normal; font-weight: 600; line-height: 45.73px; color:#fff">Individual</h6> 
            <p style="font-size: 14px; font-style: normal; color:#fff">As an individual, you have access to find <br> a Helpa that would run your personal transactions.</p>
          </a>
      </div>

      <div class="col-md-3 col-sm-5 text-center">
        <a href="{{ url('/register/business')}}" class="btn btn-outline-primary btn-block reg_btn2" style="padding-top: 1rem;">
          <svg width="57" height="57" viewBox="0 0 57 57" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g opacity="0.7">
            <path d="M28.5 16.625V7.125H4.75V49.875H52.25V16.625H28.5ZM14.25 45.125H9.5V40.375H14.25V45.125ZM14.25 35.625H9.5V30.875H14.25V35.625ZM14.25 26.125H9.5V21.375H14.25V26.125ZM14.25 16.625H9.5V11.875H14.25V16.625ZM23.75 45.125H19V40.375H23.75V45.125ZM23.75 35.625H19V30.875H23.75V35.625ZM23.75 26.125H19V21.375H23.75V26.125ZM23.75 16.625H19V11.875H23.75V16.625ZM47.5 45.125H28.5V40.375H33.25V35.625H28.5V30.875H33.25V26.125H28.5V21.375H47.5V45.125ZM42.75 26.125H38V30.875H42.75V26.125ZM42.75 35.625H38V40.375H42.75V35.625Z" fill="#3E7BFA"/>
            </g>
            </svg>
            
            <h6 style="font-size: 26px; font-style: normal; font-weight: 600; line-height: 45.73px; color: #231F20">Business</h6>
            <p style="font-size: 14px; font-style: normal;color: #979797;">As a company, you have access to find a <br> Helpa that would run your business <br> transactions</p>
        </a>
    </div>
    
    </div>

  </div>

{{-- <div class="masked" style="margin-top: 5rem;"></div> --}}

</body> 
</html>