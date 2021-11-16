<html lang="en">
<head>
  <title>PayHelpa - Home</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Raleway&display=swap" rel="stylesheet">



  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js" integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <style>
    body{
      font-family: 'Raleway', sans-serif;
      overflow-x:hidden;
    }
     @media only screen and (max-width: 750px) {
          #helpa{
            margin-top: 9rem !important;
            margin-left: -19rem !important;
          } 
           #helpa_text{
            font-size: 26px !important;
          }
          #helpa_tagline{
            font-size: 20px !important;
          }
           .partner-images{
            margin-bottom: 2rem;
          }
        }
        
         /* Large screen (laptops/desktops, 992px and up) */
        @media only screen and (min-width: 992px) {

        }

        /* Extra large devices (large laptops and desktops, 1200px and up) */
        @media only screen and (min-width: 1200px) {

        }
  </style>
</head>
<body>
  
<section style="background: #F2F6FF; width: 100%; background-image: url('assets/images/worldlineart.png')">

<div class="container">
  <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 ">
        <nav class="navbar navbar-expand-md mt-5" >
          <!-- Brand -->
          <a class="navbar-brand text-white" href="/">
            <img src="{{ asset('assets/images/payhelpa-03.png') }}"  alt="">
          </a>
        
          <!-- Toggler/collapsibe Button -->
          <button class="navbar-toggler bg-white" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            {{-- <span class="navbar-toggler-icon text-danger"></span> --}}
            <i class="fa fa-bars"></i>
          </button>
        
          <!-- Navbar links -->
          <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav justify-content-md-end">
              <li class="nav-item mx-5">
                <a class="nav-link" style="font-size: 20px; font-style: normal; font-weight: 400; line-height: 24px; color:#121212" href="/about">About Us</a>
              </li>
              <li class="nav-item mx-4">
                <a class="nav-link" style="font-size: 20px; font-style: normal; font-weight: 400; line-height: 24px; color:#121212" href="/careers">Careers</a>
              </li>
              <li class="nav-item d-lg-none">
                <a class="nav-link" style="font-size: 20px; font-style: normal; font-weight: 400; line-height: 24px;" href="/login">Login</a>
              </li>
              <li class="nav-item d-lg-none">
                <a class="nav-link text-white" style="font-size: 20px; font-style: normal; font-weight: 400; line-height: 24px;" href="/register">Register</a>
              </li>
              
            </ul>
           
          </div>
          <span class="float-right d-none d-sm-block">
            <a href="/login" class="btn px-4 text-white" style="background: #3E7BFA;">Login</a>
            <a href="/register" class="btn btn-outline-primary px-3">Register</a>
          </span>
        </nav>
      </div>
  </div>

<div >
  <div class="row text-center" style="margin-top: 15rem ;" id="helpa" >
    <div class="col-lg-12 col-md-12 col-sm-8 col-xs-6 text-center" id ="helpa_text">   
        <h1 class="text-center" style="text-align: center !important; margin-top: -108px!important; color:#222C65; font-size: 48px; ; font-weight: bold; line-height: 127.02%; ">Africa's first of its kind.<br> We connect Africans to the World.</h1>
    </div>
  </div>

  <div class="row text-white">
    <div class="col-lg-12 col-md-12 col-sm-8 col-xs-6 text-center">
        <a href="{{ url('register')}}" class="btn mt-3 text-white" style="width:200px; background: #3E7BFA; margin-bottom: 10rem;">Find a Helpa</a>
    </div>
  </div>
</div>

</div>

</section>


<section style="margin-bottom: 5rem; margin-top: 5rem; background: #fff">
  <div class="container-fluid">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
      <div class="text-center">
        <h6 style="font-size: 36px; font-style: normal; font-family: Raleway; font-weight: 600; line-height: 45.73px; color: #222C65;">Our Mission</h6>
        <p style="color:#333333; letter-spacing: 0.04em;">PayHelpa aims to ease the burden of Africans by <br>enabling transactions in foreign countries without<br> having to worry about exchange of currency.</p>
      </div>
      
    </div>
  </div>
</section>

<section style="margin-bottom: 5rem; margin-top: 5rem; background: #F2F6FF">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-6 ">
          
        <h6 style="font-size: 36px; margin-left: 160px ; font-style: normal; font-weight: bold; line-height: 45.73px; letter-spacing: 0.02em; color: #222C65; margin-top: 3.5rem;">FINANCIAL COMPLEXITY DISSOLVED</h6>
        <p style="color:#121212; margin-left: 160px ; font-family: Raleway; margin-bottom: 4rem;">To ensure free and fair transactions, we <br>collaborate with financial institutions, <br>regulators, payment, networks and banks.<br> Funds are properly safe-guaranteed system.<br> Transactions are also closely checked to very <br>that all terms and agreements are met.</p>
      </div>
      <div class="col">
      <img src="{{ asset('assets/images/Rectangle 371.png') }}" alt="" width="60%" style="margin-top: 40px ;  margin-left: 160px; margin-bottom: 2rem;">
    </div>
    </div>
  </div>
</section>

<section style="margin-bottom: 5rem; margin-top: 5rem; background: #fff">
  <div class="container-fluid">
    <div class="row">
      <div  class="col-lg-12 col-md-12 col-sm-8 col-xs-6 text-center">
        <h6 style="font-size: 36px; font-style: normal; font-family: Raleway; font-weight: bold; line-height: 43.73px; color: #222C65; ">THE POTENTIAL OF THE<br> ONLINE ECONOMY</h6>
      </div>
      <div class="container-fluid">
    <div class="row">
      <div class="col-md-6 ">
          
        <h6 style="font-size: 20px; margin-left: 160px ; font-style: normal; margin-top: 5rem; font-weight: bold; line-height: 40.73px; letter-spacing: 0.01em; color: #222C65; margin-top: 5rem;"><strong>INFRASTRUCTURE</strong></h6>
        <p style=" color:#121212; margin-left: 160px ; margin-bottom: 5rem;">Our cloud-based infrastructure ensures hight <br>availability, scalability and securit. Our payment <br>systems are error-free and allow easy and quick<br> transfers</p>
      </div>
      <div class="col">
      <img src="{{ asset('assets/images/Rectangle 368.png') }}" alt="" width="60% !important" style="margin-top: 40px ;  margin-left: 100px; margin-bottom: 2rem;">
    </div>
    </div>
    
    <div class="container p-5">
    <div class="row">
      <div class="col">
      <img src="{{ asset('assets/images/Rectangle 369.jpg') }}" alt="3" width="70% !important" style="margin-top: 40px ;  margin-left: 56px; margin-bottom: 2rem;">
    </div>
        <div class="col">
            <ul style="list-style-type:disc">
                <h6 style="font-size: 30px; margin-left: 70px ; font-style: normal; margin-top: 1rem; font-weight: bold; line-height: 45.73px; letter-spacing: 0.02em; color: #222C65;"><strong>OUR CULTURE</strong></h6>
            <li style=" color:#121212; margin-left: 70px ; "> We believe that relationships, growth, and <br>impact are the foundations for developing a <br>company where people want to work.</li>
            <li style=" color:#121212; margin-left: 70px ; "> We promote a low-ego culture and hold <br>ourselves to a high standard of excellence. We <br>treat each other in the team the same way we <br>treat our users: by communicating in a way that <br>fosters trust, functioning with transparency, and always having each other's backs.</li>
            <li style=" color:#121212; margin-left: 70px ; "> Individual efforts are recognized, and team <br>victories are celebrated. Every member of the <br>team is a stakeholder, which is promoted in all<br> work situations. What we all share is a mission<br> that begins with the heart, as well as a desire to <br>collaborate to create something of lasting value <br>and a personal impact for our users.</li>
       
            </ul>
         </div>
     </div>
     
    </div>
  </div>
      
    </div>
  </div>
</section>


<section style="margin-bottom: 5rem; margin-top: 5rem; background: #F2F6FF">
  <div class="container-fluid">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
      
        <h6 style="font-size: 36px; margin-top: 5rem !important ; font-style: normal; font-family: Raleway; font-weight: 600; line-height: 45.73px; color: #222C65;">OUR PARTNERS</h6>
        <div class="container">
  <div class="row" style = "margin-bottom: 5rem;">
    <div class="col">
      <img src="{{ asset('assets/images/Rectangle 372.png') }}" alt="" class="partner-images" width="100%">
    </div>
    <div class="col" style = "margin-top: 2.5rem !important;">
      <img  src="{{ asset('assets/images/Rectangle 373.png') }}" alt="" class="partner-images" width="100%">
    </div>
    <div class="col">
      <img src="{{ asset('assets/images/Rectangle 374.png') }}" alt=""class="partner-images" width="100%">
    </div>
    <div class="col"  style = "margin-top: 1.1rem !important;">
      <img src="{{ asset('assets/images/Rectangle 375.png') }}" alt="" class="partner-images" width="100%">
    </div>
    <div class="col"  style = "margin-top: 1.5rem !important;">
      <img src="{{ asset('assets/images/Rectangle 376.png') }}" alt="" class="partner-images" width="100%">
    </div>
    </div>
  </div>      </div>
     
    </div>
 
</section>

<section style="margin-bottom: 1rem; margin-top: 3rem; background: #fff">
  <div class="container-fluid ">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
      
        <h6 style="font-size: 36px; margin-top: 2rem; margin-bottom: 2rem; font-style: normal; font-family: Raleway; font-weight: 600; line-height: 45.73px; color: #222C65;">THE TEAM</h6>
        <div class="container">
  <div class="row" style = "margin-bottom: 1rem;">
    <div class="col">
      <img src="{{ asset('assets/images/sky.jpeg') }}" alt="sky" width="50%" style="border-radius: 50%"><br>
      <p>Ayodeji Adesola</p>
      <p style = "font-size: 12px !important ; line-height: 195.02%;  margin-top: -1.1rem !important">CEO</p>
      
    </div>
    <div class="col">
      <img src="{{ asset('assets/images/MrTosin.png') }}" alt="t"  width="50%" style="border-radius: 50%"><br>
      <p>Tosin Adesola</p>
      <p style = "font-size: 12px !important ; line-height: 195.02%;  margin-top: -1.1rem !important">Project Manager</p>
      
    </div>
    <div class="col">
      <img src="{{ asset('assets/images/blessing1.png') }}" alt="" width="50%" style="border-radius: 50%"><br>
      <p>Blessing Onoruke</p>
      <p style = "font-size: 12px !important ; line-height: 195.02%;  margin-top: -1.1rem !important">Product Designer</p>
      
    </div>
    <div class="col">
      <img src="" alt=""width="50%" style="border-radius: 50%"><br>
      <p>Godson</p>
      <p style = "font-size: 12px !important ; line-height: 195.02%; margin-top: -1.1rem !important">Fullstack developer</p>

    </div>
    <br>
    
    </div>
    <div class="row" style = "margin-bottom: 1rem;">
        <div class="col">
      <img src="{{ asset('assets/images/TeeTee.png') }}" alt="titi" width="40%"  style="border-radius: 50%" ><br>
      <p>Titilope </p>
      <p style = "font-size: 12px !important ; line-height: 195.02%;  margin-top: -1.1rem !important">Fullstack developer</p>
      
    </div>
    <div class="col">
      <img src="{{ asset('assets/images/MrAyo.png') }}" alt="ayo"  width="40%" style="border-radius: 50%"><br>
      <p>Ayo</p>
      <p style = "font-size: 12px !important ; line-height: 195.02%;  margin-top: -1.1rem !important">Content Developer</p>
      
    </div>
    <div class="col">
      <img src="{{ asset('assets/images/Osinachi2.png') }}" alt="chidera"  width="40%" style="border-radius: 50%"><br>
      <p>Osinachi Chinke</p>
      <p style = "font-size: 12px !important ; line-height: 195.02%;  margin-top: 1.1rem !important">Graphics Designer</p>
      
    </div>
   
    
    
    
    </div>
    
  </div>      </div>
     
    </div>
 
</section>





<section style="background: #F2F6FF">
  <div class="container p-5">
    <div class="row">
      <div class="col text-center">
        <h4 class="mt-4" style="color: #222C65; font-size: 36px; font-style: normal; font-weight: 700; line-height: 45.73px;">Get the latest from PayHelpa</h4>

        <p>Subscribe with your email to get our guide tips <br> and industry news.</p>
      </div>
    </div>
  </div>
</section>


<section style="background: #F2F6FF">

    <div class="row">
     
      <div class="col-md-4 text-center mx-auto" style="background: #F2F6FF">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Enter your email address" style="background: rgba(62, 123, 250, 0.04);">
          <div class="input-group-append" style = "margin-bottom: 5rem;">
            <button class="btn px-3 text-white" type="submit" style="background: #3E7BFA">Subscribe</button>
          </div>
        </div>
      </div>
      
  </div>
</section>


<section style="padding-bottom: 3rem; padding-top: 3rem; background: #fff">
  <div class="container">
    <div class="row mt-5">
      <div class="col">
       <img src="{{ asset('assets/images/payhelpa_icon-01.png') }}" alt="">
      </div>
      <div class="col">
        <h3 class="mb-4">Company</h3>
        <p>About Us</p>
        <p>Careers</p>
        <p>Privacy</p>
        <p>Terms</p>
      </div>
      <div class="col">
        <h3 class="mb-4">Product</h3>
        <p>Items trading</p>
        <p>Dollar trading</p>
        <p>Naira - Dollar wallet</p>
      </div>
      <div class="col">
        <h3 class="mb-4">Resource</h3>
        <p>Customer stories </p>
        <p>Media</p>
        <p>FAQ</p>
        <p>Security</p>
      </div>
      <div class="col">
        <h3 class="mb-4">Contact</h3>
        <p>info@payhelpa.com</p>
        <p>+2345000000</p>
        
      </div>
      
    </div>
  </div>
</section>

<div class="container">
  <div class="row">
    <div class="col">
      <hr>
    </div>
  </div>
</div>

<section class="mb-5 bg-white">
  <div class="container">
  
    <div class="row no-gutters">
     
      <div class="col text-center">
        <i class="fa fa-facebook-square fa-2x"></i>
      </div>
      <div class="col text-center">
        <i class="fa fa-twitter fa-2x"></i>
      </div>
      <div class="col text-center">
        <i class="fa fa-whatsapp fa-2x "></i>
      </div>
      <div class="col text-center">
        <i class="fa fa-youtube-square fa-2x"></i>
      </div>
      <div class="col text-center">
        <i class="fa fa-instagram fa-2x"></i>
      </div>
      
    </div>
  </div>
</section>


</div>

<!-- jQuery library -->
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>--}}

<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

{{-- <script>
    $(document).ready(function(){
      $(".lazy").slick({
        lazyLoad: 'ondemand', // ondemand progressive anticipated
        infinite: true
      });
  });
</script> --}}

<script>
  var owl = $('.owl-carousel');
  owl.owlCarousel({
      items:4,
      loop:true,
      margin:10,
      autoplay:true,
      autoplayTimeout:1000,
      autoplayHoverPause:true
  });
</script>

</body>
</html>