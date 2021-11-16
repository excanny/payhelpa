<!DOCTYPE html>
<html lang="en">
<head>
  <title>Kokoruns - User Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="shortcut icon" href="<?php echo base_url();?>/public/assets/Images/favicon.png" />
</head>
<body style="background: #F5F5F5">

<header class="container-fluid bg-white">

              <nav class="p-2">
                
                  <a class="navbar-brand" href="<?php echo site_url(); ?>">
                    <img src="https://kokoruns.com/public/assets/Images/Header%20and%20Footer/Logo.png" alt="Logo" style="width:200px;">
                  </a>
                 
                    <!-- <a href="<?php //echo site_url(); ?>logout" class="float-right pt-4">
                            <i class="fa fa-power-off" data-toggle="tooltip" title="Logout"></i>
                    </a> -->

              </nav>
              
</header>

    <div class="container mx-auto" style="margin: 4rem">
        <div class="row bg-white w-50 mx-auto">
            <div class="col">
              <div class="pt-4 pl-4 pr-4">
                <h2 class="mb-3 text-center">Login Into Your Account</h2>

                <?php if(!empty(session()->getFlashdata('success'))){ ?>

                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong>Success!</strong> <?php echo session()->getFlashdata('success');?>
                    </div>
                        
                    <?php } ?>

                    <?php if(!empty(session()->getFlashdata('error'))){ ?>

                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong>Error!</strong> <?php echo session()->getFlashdata('error');?>
                        </div>

                    <?php } ?>
                   
                        <form action="<?php echo site_url()?>front/loginaction" method="POST">
                            <div class="form-group">
                                <input type="text" class="form-control rounded-0" id="user-email-or-phone-number" name="user-email-or-phone-number" placeholder="Enter Email or Phone Number" autocomplete="off" required>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control rounded-0" placeholder="Enter password" id="myPassword" name="password" autocomplete="off" required>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-block rounded-0 text-white w-50 mx-auto" style="background: red;" id="submit">Login</button>
                            </div>
                        </form>
                
                    <h5 class="text-center text-primary">OR</h5>

                    <div class="row">
                        <div class="col">
                            <button type="button" class="btn btn-white btn-block rounded-0 border w-100">
                                <img class="float-left" src="<?php echo base_url();?>/public/assets/Images/Index/Google%20Logo.png" alt="" width="5%"> <span class="text-primary"> Continue with Google</span>
                            </button>
                            <button type="button" class="btn btn-block rounded-0 border w-100" style="background: #3C5A99;">
                                <img class="float-left" src="<?php echo base_url();?>/public/assets/Images/Index/Facebook%20Logo.png" alt="" width="5%"> <span class="text-white"> Continue with Facebook</span>
                            </button>
                            <button type="button" class="btn btn-dark btn-block rounded-0 border w-100" style="background: #000;">
                                <img class="float-left" src="data:image/png;base64,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" alt="" width="5%"> <span class="text-white"> Sign Up with Apple</span>
                            </button>
                        </div>
                    </div>
                    <p class="text-center mt-2 mb-1">Dont have an account? <a href="<?php echo site_url();?>register">Register</a></p>
                    <p class="text-center"> <a href="<?php echo site_url();?>forgot">Forgot Password?</a></p>
                </div>
            </div>
          
        </div>
    </div>


    <div class="container-fluid bg-white py-3 w-100">
        
        <div class="row">
            <div class="col-md-2 pl-4">
                <img class="kokoruns-footer-logo" src="<?php echo base_url();?>/public/assets/Images/Header%20and%20Footer/Logo.png" width="100%">
            </div>
            <div class="col text-center pt-3">
                <a class="text-primary mx-2 font-weight-bold">
                Contact Us 
                </a>

                <a class="text-primary mx-2 font-weight-bold">
                About Us 
                </a>

                <a class="text-primary mx-2 font-weight-bold">
                Our Community Guidelines 
                </a>

                <a class="text-primary mx-2 font-weight-bold">
                FAQ
                </a>
            
                
                
                <a class="text-primary font-weight-bold">
                Terms&nbsp;of&nbsp;Use 
                </a>
                
                <a class="text-primary font-weight-bold">
                Terms&nbsp;of&nbsp;Service
                </a> 

                <a class="text-primary mx-2 font-weight-bold">
                Privacy&nbsp;Policy 
                </a>

            </div>
        
        </div> 
            
    </div>


</body>
</html>