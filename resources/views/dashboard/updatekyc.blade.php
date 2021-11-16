<!DOCTYPE html>
<html lang="en">
<div id="loadOverlay" style="background-color:#012067; position:absolute; top:0px; left:0px; width:100%; height:100%; z-index:2000;"></div>
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>PayHelpa - Dashboard Update KYC</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	{{-- <link rel="icon" href="{{ asset('assets/img/icon.ico')}}" type="image/x-icon"/> --}}

	<meta name="csrf-token" content="{{ csrf_token() }}">

	<link rel="stylesheet" type="text/css" href="{{ asset('assets/slick/slick.css')}}"/>

	<link rel="stylesheet" type="text/css" href="{{ asset('assets/slick/slick-theme.css')}}"/>

	<!-- CSS -->
	<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
	<!-- Default theme -->
	<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.13/css/intlTelInput.css" integrity="sha512-gxWow8Mo6q6pLa1XH/CcH8JyiSDEtiwJV78E+D+QP0EVasFs8wKXq16G8CLD4CJ2SnonHr4Lm/yY2fSI2+cbmw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

	

	<!-- CSS Files -->
	<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css')}}"> 
	{{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> --}}
	<link rel="stylesheet" href="{{ asset('assets/css/atlantis.min.css')}}">



	<style>
		::-webkit-scrollbar {
		width: 10px;
		}
		.cursor{
			cursor : pointer;
		}

		.custom-file-input ~ .custom-file-label::after {
			content: "Upload" !important;
			background: white;
			border-left: none;
		}

        #cover {
			position: fixed;
			height: 100%;
			width: 100%;
			top: 0;
			left: 0;
			background: #012067;
			z-index: 9999;
			font-size: 65px;
			text-align: center;
			padding-top: 200px;
			color: #fff;
			font-family:tahoma;
	
        }

        #loadOverlay{display: none;}
		
	</style>

	<!-- Fonts and icons -->
	<script src="{{ asset('assets/js/plugin/webfont/webfont.min.js')}}"></script>
	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['../assets/css/fonts.min.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>


</head>
<body>
    <div id="cover"> <span class="glyphicon glyphicon-refresh w3-spin preloader-Icon"></span> PayHelpa</div>
	<div class="wrapper">
		<div class="main-header">
			<!-- Logo Header -->
			<div class="logo-header pb-3">
				
				<a href="/" class="logo mt-4">
					<img src="{{ asset('assets/images/payhelpa_light-01dashboard.png')}}" alt="navbar brand" class="navbar-brand">
                   
				</a>
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button"  data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i class="icon-menu"></i>
					</span>
				</button>
				<button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
				<div class="nav-toggle">
					<button class="btn btn-toggle toggle-sidebar mt-4">
						{{-- <i class="icon-menu"></i> --}}
						<svg width="16" height="12" viewBox="0 0 16 12" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M15.0645 10.9434L10.2257 6.18864L15.0645 1.43393" stroke="#6F6C99" stroke-width="2.4"/>
							<path d="M5.38721 9.3584L2.1614 6.18859L5.38721 3.01878" stroke="#6F6C99" stroke-width="2.4"/>
						</svg>
							
					</button>
				</div>
			</div>
			<!-- End Logo Header -->

			<!-- Navbar Header -->
			<nav class="navbar navbar-header navbar-expand-lg" style="box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.05);">
				
				<div class="container-fluid">

					<div class="collapse" id="search-nav">
						<p><span>Hello {{strtoupper($user->name)}}, welcome back, nice to always have you here. @if ($user->number_verified == 0) <span style="color: #FF731C">Account not verified</span> @endif</span></p>
					</div>
					
					<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
						<li class="nav-item toggle-nav-search hidden-caret">
							<a class="nav-link"  href="#search-nav" role="button" aria-expanded="false" aria-controls="search-nav">
								<i class="fa fa-search"></i>
							</a>
						</li>
						<li class="nav-item dropdown hidden-caret">
							
							<ul class="dropdown-menu messages-notif-box animated fadeIn" aria-labelledby="messageDropdown">
								<li>
									<div class="dropdown-title d-flex justify-content-between align-items-center">
										Messages 									
										<a href="#" class="small">Mark all as read</a>
									</div>
								</li>
								<li>
									<div class="message-notif-scroll scrollbar-outer">
										<div class="notif-center">
											<a href="#">
												<div class="notif-img"> 
													<img src="../assets/img/jm_denis.jpg" alt="Img Profile">
												</div>
												<div class="notif-content">
													<span class="subject">Jimmy Denis</span>
													<span class="block">
														How are you ?
													</span>
													<span class="time">5 minutes ago</span> 
												</div>
											</a>
											<a href="#">
												<div class="notif-img"> 
													<img src="../assets/img/chadengle.jpg" alt="Img Profile">
												</div>
												<div class="notif-content">
													<span class="subject">Chad</span>
													<span class="block">
														Ok, Thanks !
													</span>
													<span class="time">12 minutes ago</span> 
												</div>
											</a>
											<a href="#">
												<div class="notif-img"> 
													<img src="../assets/img/mlane.jpg" alt="Img Profile">
												</div>
												<div class="notif-content">
													<span class="subject">Jhon Doe</span>
													<span class="block">
														Ready for the meeting today...
													</span>
													<span class="time">12 minutes ago</span> 
												</div>
											</a>
											<a href="#">
												<div class="notif-img"> 
													<img src="../assets/img/talha.jpg" alt="Img Profile">
												</div>
												<div class="notif-content">
													<span class="subject">Talha</span>
													<span class="block">
														Hi, Apa Kabar ?
													</span>
													<span class="time">17 minutes ago</span> 
												</div>
											</a>
										</div>
									</div>
								</li>
								<li>
									<a class="see-all" href="javascript:void(0);">See all messages<i class="fa fa-angle-right"></i> </a>
								</li>
							</ul>
						</li>
						<li class="nav-item dropdown hidden-caret">
							<a class="nav-link dropdown-toggle" href="#" id="notifDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="fa fa-bell"></i>
								<span class="notification">2</span>
							</a>
							<ul class="dropdown-menu notif-box animated fadeIn" aria-labelledby="notifDropdown">
								<li>
									<div class="dropdown-title">You have 2 new notification</div>
								</li>
								<li>
									<div class="notif-scroll scrollbar-outer">
										<div class="notif-center">
											<a href="#">
												<div class="notif-icon notif-primary"> <i class="fa fa-user-plus"></i> </div>
												<div class="notif-content">
													<span class="block">
														New user registered
													</span>
													<span class="time">5 minutes ago</span> 
												</div>
											</a>
											<a href="#">
												<div class="notif-icon notif-success"> <i class="fa fa-comment"></i> </div>
												<div class="notif-content">
													<span class="block">
														Luke posted new dollar rate
													</span>
													<span class="time">12 minutes ago</span> 
												</div>
											</a>
											{{-- <a href="#">
												<div class="notif-img"> 
													<img src="../assets/img/profile2.jpg" alt="Img Profile">
												</div>
												<div class="notif-content">
													<span class="block">
														Reza send messages to you
													</span>
													<span class="time">12 minutes ago</span> 
												</div>
											</a> --}}
										
										</div>
									</div>
								</li>
								<li>
									<a class="see-all" href="javascript:void(0);">See all notifications<i class="fa fa-angle-right"></i> </a>
								</li>
							</ul>
						</li>
						<li class="nav-item dropdown hidden-caret">
							
							<div class="dropdown-menu quick-actions quick-actions-info animated fadeIn">
								<div class="quick-actions-header">
									<span class="title mb-1">Quick Actions</span>
									<span class="subtitle op-8">Shortcuts</span>
								</div>
								<div class="quick-actions-scroll scrollbar-outer">
									<div class="quick-actions-items">
										<div class="row m-0">
											<a class="col-6 col-md-4 p-0" href="#">
												<div class="quick-actions-item">
													<i class="flaticon-file-1"></i>
													<span class="text">Generated Report</span>
												</div>
											</a>
											<a class="col-6 col-md-4 p-0" href="#">
												<div class="quick-actions-item">
													<i class="flaticon-database"></i>
													<span class="text">Create New Database</span>
												</div>
											</a>
											<a class="col-6 col-md-4 p-0" href="#">
												<div class="quick-actions-item">
													<i class="flaticon-pen"></i>
													<span class="text">Create New Post</span>
												</div>
											</a>
											<a class="col-6 col-md-4 p-0" href="#">
												<div class="quick-actions-item">
													<i class="flaticon-interface-1"></i>
													<span class="text">Create New Task</span>
												</div>
											</a>
											<a class="col-6 col-md-4 p-0" href="#">
												<div class="quick-actions-item">
													<i class="flaticon-list"></i>
													<span class="text">Completed Tasks</span>
												</div>
											</a>
											<a class="col-6 col-md-4 p-0" href="#">
												<div class="quick-actions-item">
													<i class="flaticon-file"></i>
													<span class="text">Create New Invoice</span>
												</div>
											</a>
										</div>
									</div>
								</div>
							</div>
						</li>
						<li class="nav-item dropdown hidden-caret">
						
									<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
										<div class="avatar-sm">
											{{-- <img src="../assets/img/profile.jpg" alt="..." class="avatar-img rounded-circle"> --}}
											<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
												<circle cx="10" cy="10" r="10" fill="#C4C4C4"/>
												<circle cx="10" cy="10" r="10" fill="url(#pattern0)"/>
												<defs>
												<pattern id="pattern0" patternContentUnits="objectBoundingBox" width="1" height="1">
												<use xlink:href="#image0" transform="translate(0 -0.25) scale(0.003125)"/>
												</pattern>
												<image id="image0" width="320" height="480" xlink:href="data:image/jpeg;base64,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"/>
												</defs>
												</svg>
										</div>
									</a>
									<ul class="dropdown-menu dropdown-user animated fadeIn">
										<div class="dropdown-user-scroll scrollbar-outer">
											{{-- <li>
												<div class="user-box">
													<div class="avatar-lg"><img src="../assets/img/profile.jpg" alt="image profile" class="avatar-img rounded"></div>
													<div class="u-text">
														<h4>Hizrian</h4>
														<p class="text-muted">hello@example.com</p><a href="profile.html" class="btn btn-xs btn-secondary btn-sm">View Profile</a>
													</div>
												</div>
											</li> --}}
											<li>
											
												<form method="POST" action="{{ route('logout') }}">
													@csrf
												
														<button type="submit" class="btn btn-sm bg-white  float-right">
															<i class="fa fa-power-off"></i> {{ __('Log Out') }}
														</button>
													</form>
												</li>
										</div>
									</ul>
								</div>
							</a>
							<ul class="dropdown-menu dropdown-user animated fadeIn">
								<div class="dropdown-user-scroll scrollbar-outer">
									<li>
										<div class="user-box">
											<div class="avatar-lg"><img src="../assets/img/profile.jpg" alt="image profile" class="avatar-img rounded"></div>
											<div class="u-text">
												<h4>Hizrian</h4>
												<p class="text-muted">hello@example.com</p><a href="profile.html" class="btn btn-xs btn-secondary btn-sm">View Profile</a>
											</div>
										</div>
									</li>
									<li>
										<div class="dropdown-divider"></div>
										
										<a class="dropdown-item" href="#">Logout</a>
									</li>
								</div>
							</ul>
						</li>
					</ul>
				</div>
			</nav>
			<!-- End Navbar -->

		


		

		<!-- Sidebar -->
		<div class="sidebar sidebar-style-2">			
			<div class="sidebar-wrapper scrollbar scrollbar-inner">
				<div class="sidebar-content">
					{{-- <div class="user">
				
						<div class="info">
						

							<a href="{{url('dashboard/kyc/1')}}" class="btn text-white" style="background: rgba(255, 255, 255, 0.53); border-radius: 30px;">Verify Your Account</a>
								
								
						</div>
					</div> --}}
                    	
					@if ($user->number_verified == 0)
	
                    <div class="user">
                
                        <div class="info">
                        

                            <a href="{{url('dashboard/kyc/1')}}" class="btn text-white" style="background: rgba(255, 255, 255, 0.53); border-radius: 30px;">Verify Your Account</a>
                                
                                
                        </div> 
                    </div>

                    @endif
					<ul class="nav nav-primary">
					
						<li class="nav-item my-3">
							<a href="{{route('dashboard')}}">
								
								<svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
									<rect x="0.473633" y="0.473633" width="5.33333" height="5.33333" rx="1.4" fill="white"/>
									<rect x="0.473633" y="8.47363" width="5.33333" height="5.33333" rx="1.4" fill="white"/>
									<rect x="8.47363" y="0.473633" width="5.33333" height="5.33333" rx="1.4" fill="white"/>
									<rect x="8.47363" y="8.47363" width="9.33333" height="9.33333" rx="1.4" fill="white"/>
								</svg>
								
								<p class="ml-3 text-white">Dashboard</p>
							</a>
							
						</li>
						<li class="nav-item my-3">
							<a href="{{route('p2p')}}">
							
									<svg width="21" height="20" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path fill-rule="evenodd" clip-rule="evenodd" d="M9.33333 9.33333H0V0L3.72398 3.72398L5.13832 2.30963C5.65902 1.78892 6.50324 1.78892 7.02394 2.30963C7.54464 2.83033 7.54464 3.67455 7.02394 4.19525L5.60959 5.6096L9.33333 9.33333ZM20.3568 10.3096H11.0234L14.7475 14.0337L13.3335 15.4477C12.8128 15.9684 12.8128 16.8126 13.3335 17.3333C13.8542 17.854 14.6984 17.854 15.2191 17.3333L16.6331 15.9193L20.3568 19.643V10.3096Z" fill="#C4C4FF"/>
								</svg>
										
									
								<p class="ml-3 text-white">P2P</p>
							</a>
						</li>
						<li class="nav-item my-3">
							<a  href="{{route('wallet')}}">
								{{-- <i class="fas fa-pen-square"></i> --}}
								<svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path fill-rule="evenodd" clip-rule="evenodd" d="M2.3335 0.333496C1.22893 0.333496 0.333496 1.22893 0.333496 2.3335V15.6668C0.333496 16.7714 1.22893 17.6668 2.3335 17.6668H15.6668C16.7714 17.6668 17.6668 16.7714 17.6668 15.6668V2.3335C17.6668 1.22893 16.7714 0.333496 15.6668 0.333496H2.3335ZM9.83334 7.00018C9.00492 7.00018 8.33334 7.67176 8.33334 8.50018V9.50018C8.33334 10.3286 9.00492 11.0002 9.83334 11.0002H13.5C14.3284 11.0002 15 10.3286 15 9.50018V8.50018C15 7.67176 14.3284 7.00018 13.5 7.00018H9.83334Z" fill="#C4C4FF"/>
									</svg>
									
								<p class="ml-3 text-white">Wallet</p>
							</a>
						</li>
						<li class="nav-item my-3">
							<a  href="">
								
							<svg width="21" height="27" viewBox="0 0 21 27" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path fill-rule="evenodd" clip-rule="evenodd" d="M16.9925 9.25723C17.243 8.50577 16.5281 7.79084 15.7766 8.04133L1.32413 12.8588C0.646216 13.0848 0.443109 13.9452 0.948392 14.4505L4.42107 17.9232L10.0695 14.9645L7.11079 20.6129L10.5834 24.0855C11.0887 24.5908 11.9491 24.3877 12.175 23.7097L16.9925 9.25723Z" fill="#C4C4FF"/>
								<circle cx="2.33301" cy="22.6665" r="2" fill="#C4C4FF"/>
								</svg>
										
									
								<p class="ml-3 text-white">Messages</p>
							</a>
						</li>
						<li class="nav-item my-3">
							<a  href="{{route('status')}}">
								
									<svg width="14" height="24" viewBox="0 0 14 24" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M5.71854 22.9167C6.08941 23.645 7.12991 23.645 7.50077 22.9167L12.8926 12.3284C13.163 11.7975 12.912 11.1494 12.3546 10.9391L7.85319 9.2401C7.1904 8.98995 6.46046 8.98242 5.79265 9.21885L0.894732 10.9529C0.325305 11.1545 0.0632428 11.811 0.337352 12.3493L5.71854 22.9167Z" fill="#C4C4FF"/>
										<circle cx="7.00033" cy="3.99984" r="3.33333" fill="#C4C4FF"/>
										</svg>
											
								<p class="ml-3 text-white">Status</p>
							</a>
						</li>
						<li class="nav-item my-3">
							<a href="{{route('kyc')}}">
								{{-- <i class="fas fa-desktop"></i> --}}
								<svg width="14" height="24" viewBox="0 0 14 24" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M5.71854 22.9167C6.08941 23.645 7.12991 23.645 7.50077 22.9167L12.8926 12.3284C13.163 11.7975 12.912 11.1494 12.3546 10.9391L7.85319 9.2401C7.1904 8.98995 6.46046 8.98242 5.79265 9.21885L0.894732 10.9529C0.325305 11.1545 0.0632428 11.811 0.337352 12.3493L5.71854 22.9167Z" fill="#C4C4FF"/>
									<circle cx="7.00033" cy="3.99984" r="3.33333" fill="#C4C4FF"/>
									</svg>
								<p class="ml-3 text-white">Account Setting</p>
							</a>
						</li>
					
					</ul>
				</div>
			</div>
		</div>
	</div>
	

<div class="main-panel">
    <div class="content">
        <div class="page-inner">

            <div class="row">
                <div class="col-md-12">
                    <div class="row mb-5">
                        <div class="col-md-12">

                            <div class="row pt-3 px-3 pb-0">
                                <div class="col">
                                    <a class="cursor mx-3" href="{{ route('profile')}}">Profile</a>  <a class="cursor mx-3 text-dark" href="{{ route('updatekyc')}}" style="text-decoration: underline;">Update KYC</a> <a class="cursor mx-3" href="{{ route('security')}}">Security</a>
                                </div>
                            </div>

                        </div>
                       
                    </div>




                    <div id="kyc2" style="width:100%;">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="card" style="box-shadow: 0px 0.298734px 1.19494px rgba(0, 0, 0, 0.25);">
                                    <div class="card-body">
                                       
            
                                        <div class="row mt-3">
                                            <div class="col-lg-6">
                                                
                                            <form action="{{route('updatekyc')}}" method="POST">
                                                @csrf
                                                  <div class="form-group mt-3">
                                                    <label for="amount">State of residence</label>
                                                    <input type="text" class="form-control" name="state" id="state" value="{{ $user->state }}" placeholder="for example: lagos state" required>
                                                </div>
        
                                                <div class="form-group mt-3">
                                                    <label for="amount">Residential Address(optional)</label>
                                                    <input type="text" class="form-control" name="address" id="address" placeholder="Enter your residential address" value="{{ $user->address }}">
                                                </div>
        
                                                <div>
                                                    <button id="kyc_send_btn" class="btn btn-primary px-5 mt-3" style="background: #2A8BF2; border: 1px solid #2A8BF2; box-sizing: border-box;border-radius: 30px;">Update</button>
                                                </div>
                                               

                                                </form>

                                            </div>
                                        </div>

                                    
                                        
                                    </div>
                                </div>
                            </div>
                           
                        </div>

                    </div>
                
                
                </div>
               
            </div>

        </div>
    </div>
    
</div>

<!-- The Modal -->
<div class="modal" id="myModal">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
  
        <!-- Modal Header -->
        <div class="modal-header border-0">
          <button type="button" class="close" data-dismiss="modal"><i class="fa fa-times text-danger" style="font-weight:100"></i></button>
        </div>
  
        <!-- Modal body -->
        <div class="modal-body">
            <div class="row">
                <div class="col text-center">
                    <h3 class=" text-dark">Pay your helpa</h3>
                    <small class="text-muted">Enter your helpa’s ID to get their account number</small>
                </div>
            </div>
            <div class="form-group">
                <label for="amount">Helpa’s ID</label>
                <input type="text" class="form-control" placeholder="Enter Helpa's ID">
            </div>
        </div>
  
        <!-- Modal footer -->
        <div class="modal-footer border-0">
          
        </div>
  
      </div>
    </div>
  </div>



</div>
<!--   Core JS Files   -->

<script src="{{ asset('assets/js/core/jquery.3.2.1.min.js')}}"></script>

<script src="{{ asset('assets/js/core/popper.min.js')}}"></script>
<script src="{{ asset('assets/js/core/bootstrap.min.js')}}"></script>

<!-- jQuery UI -->
<script src="{{ asset('assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js')}}"></script>
<script src="{{ asset('assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js')}}"></script>

<!-- jQuery Scrollbar -->
<script src="{{ asset('assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js')}}"></script>


<!-- Chart JS -->
<script src="{{ asset('assets/js/plugin/chart.js/chart.min.js')}}"></script>

<!-- jQuery Sparkline -->
<script src="{{ asset('assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js')}}"></script>

<!-- Chart Circle -->
<script src="{{ asset('assets/js/plugin/chart-circle/circles.min.js')}}"></script>

<!-- Datatables -->
<script src="{{ asset('assets/js/plugin/datatables/datatables.min.js')}}"></script>


<!-- jQuery Vector Maps -->
<script src="{{ asset('assets/js/plugin/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{ asset('assets/js/plugin/jqvmap/maps/jquery.vmap.world.js')}}"></script>

<!-- Sweet Alert -->
<script src="{{ asset('assets/js/plugin/sweetalert/sweetalert.min.js')}}"></script>

<!-- Atlantis JS -->
<script src="{{ asset('assets/js/atlantis.min.js')}}"></script>

<!-- Atlantis DEMO methods, don't include it in your project! -->
<script src="{{ asset('assets/js/setting-demo.js')}}"></script>
<script src="{{ asset('assets/js/demo.js')}}"></script>
<!-- Chart JS -->
<script src="{{ asset('assets/js/plugin/chart.js/chart.min.js')}}"></script>

<!-- jQuery Scrollbar -->
<script src="{{ asset('assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js')}}"></script>
<!-- Atlantis JS -->
<script src="{{ asset('assets/js/atlantis.min.js')}}"></script>
<!-- Atlantis DEMO methods, don't include it in your project! -->
<script src="{{ asset('assets/js/setting-demo2.js')}}"></script>
<script type="text/javascript" src="{{ asset('assets/js/webcam.min.js')}}"></script>

<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

<script src="https://unpkg.com/card@2.5.3/lib/card.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.13/js/intlTelInput.min.js" integrity="sha512-QMUqEPmhXq1f3DnAVdXvu40C8nbTgxvBGvNruP6RFacy3zWKbNTmx7rdQVVM2gkd2auCWhlPYtcW2tHwzso4SA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>




<script>


$("#kyc_form").submit(function(e){

    e.preventDefault();

    // alert("Hi");

    var form_data = new FormData();
        
    var files = $('#customFile')[0].files[0];
 
        
    form_data.append('idcard', files);

    var photo = $('.image-tag').val();

    form_data.append('photo', photo);

    var address = $('#address').val();

    form_data.append('address', address);

    var state = $('#state').val();

    form_data.append('state', state);


        //  for (var pair of form_data.entries()) {
        //     console.log(pair[0]+ ', ' + pair[1]); 
        // }


    $.ajaxSetup({
           headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           }
           });

    $.ajax({
        url: "{{ url('/uploadkyc') }}",
        type: "POST",
        contentType: false,
        processData: false,
        data: form_data,
        dataType: "json",
        // headers: {
        // 'Content-Type':'application/json'
        // },
        beforeSend:function(){
            $('#kyc_send_btn').text('Sending...');
            },
        success: function(response) {
            //code to execute
            // $('#profile_submit_btn').text('Saved');
            // $("#profile_submit_btn").css({backgroundColor: 'yellow'});
            // if(response == 1)
            // {
            //     //CancelExperience();

            // 	load_profile();
            
            // }
             $('#kyc_send_btn').text('Sent');

            alertify.set('notifier','position', 'top-right');
            alertify.success('submitted successfully');
            window.location.href = "{{URL::to('/dashboard/kyc/submitted')}}"
            console.log(response);

        },
        error: function(xhr, textStatus, errorThrown) {
                //code to execute
                console.log(xhr.responseText);
                //$('#request-result2').html('Error occurred! Try again').delay(4000).fadeOut();
            },
        });

    return false;

});

</script>


<script>
    $('#customFile').on("change", function(){
        $('#kyc_send_btn').prop("disabled", false);
     
    });
</script>




<script>
function formatString(e) {
var inputChar = String.fromCharCode(event.keyCode);
var code = event.keyCode;
var allowedKeys = [8];
if (allowedKeys.indexOf(code) !== -1) {
    return;
}

event.target.value = event.target.value.replace(
    /^([1-9]\/|[2-9])$/g, '0$1/' // 3 > 03/
).replace(
    /^(0[1-9]|1[0-2])$/g, '$1/' // 11 > 11/
).replace(
    /^([0-1])([3-9])$/g, '0$1/$2' // 13 > 01/3
).replace(
    /^(0?[1-9]|1[0-2])([0-9]{2})$/g, '$1/$2' // 141 > 01/41
).replace(
    /^([0]+)\/|[0]+$/g, '0' // 0/ > 0 and 00 > 0
).replace(
    /[^\d\/]|^[\/]*$/g, '' // To allow only digits and `/`
).replace(
    /\/\//g, '/' // Prevent entering more than 1 `/`
);
}

</script>


{{-- Notifications --}}

<script>


@if(Session::has('success'))
    alertify.set('notifier','position', 'top-right');
     alertify.success("{{ Session::get('success') }}");
   @php
     Session::forget('success');
   @endphp
@endif


@if(Session::has('info'))
    alertify.set('notifier','position', 'top-right');
     alertify.info("{{ Session::get('info') }}");
    @php
      Session::forget('info');
    @endphp
@endif


@if(Session::has('warning'))
    alertify.set('notifier','position', 'top-right');
     alertify.warning("{{ Session::get('warning') }}");
    @php
      Session::forget('warning');
    @endphp
@endif


@if(Session::has('error'))
    alertify.set('notifier','position', 'top-right');
     alertify.error("{{ Session::get('error') }}");
    @php
      Session::forget('error');
    @endphp
@endif


</script>



 <!-- Configure a few settings and attach camera -->
 <script language="JavaScript">
    Webcam.set({
        // live preview size
        width: 320,
        height: 240,
        
        // device capture size
        dest_width: 640,
        dest_height: 480,
        
        // final cropped size
        crop_width: 480,
        crop_height: 480,
        
        // format and quality
        image_format: 'jpeg',
        jpeg_quality: 90,
        
        // flip horizontal (mirror mode)
        flip_horiz: true
    });

    Webcam.on( 'error', function(err) {
    // an error occurred (see 'err')
        $('#camera_disabled').show();
        $('#take_snapshot_btn').prop("disabled",true);
            console.log(err)
    } );

    Webcam.attach( '#my_camera' );

</script>

<!-- Code to handle taking the snapshot and displaying it locally -->
<script language="JavaScript">
    // preload shutter audio clip
    var shutter = new Audio();
    shutter.autoplay = false;
    shutter.src = navigator.userAgent.match(/Firefox/) ? 'shutter.ogg' : 'shutter.mp3';
    
    function preview_snapshot() {
        // play sound effect
        try { shutter.currentTime = 0; } catch(e) {;} // fails in IE
        shutter.play();
        
        // freeze camera so user can preview current frame
        Webcam.freeze();
        
        // swap button sets
        document.getElementById('pre_take_buttons').style.display = 'none';
        document.getElementById('post_take_buttons').style.display = '';
    }
    
    function cancel_preview() {
        // cancel preview freeze and return to live camera view
        Webcam.unfreeze();
        
        // swap buttons back to first set
        document.getElementById('pre_take_buttons').style.display = '';
        document.getElementById('post_take_buttons').style.display = 'none';
    }
    
    function save_photo() {
        // actually snap photo (from preview freeze) and display it
        Webcam.snap( function(data_uri) {
            // display results in page
           
            $(".image-tag").val(data_uri);
            
            // // shut down camera, stop capturing
             Webcam.reset();
            
            // show results, hide photo booth
            //document.getElementById('results').style.display = '';
           // document.getElementById('my_photo_booth').style.display = 'none';

           $("#profile").hide();
            $("#kyc").hide();
            $("#security").hide();
            $("#kyc2").show();



        } );
    }
</script>


<script>
    // Add the following code if you want the name of the file appear on select
    $(".custom-file-input").on("change", function() {
      var fileName = $(this).val().split("\\").pop();
      $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
</script>


    <script type="text/javascript">
        $(document).ready(function() {
            $("#cover").fadeOut("slow");
        });
    </script>
  


</body>
</html>






