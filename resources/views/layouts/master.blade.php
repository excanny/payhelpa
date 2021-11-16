<!DOCTYPE html>
<html lang="en">
<div id="loadOverlay" style="background-color:#012067; position:absolute; top:0px; left:0px; width:100%; height:100%; z-index:2000;"></div>
<head>
	
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>PayHelpa - Dashboard</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	{{-- <link rel="icon" href="{{ asset('assets/img/icon.ico')}}" type="image/x-icon"/> --}}

	<meta name="csrf-token" content="{{ csrf_token() }}">

	<link rel="stylesheet" type="text/css" href="{{ asset('assets/slick/slick.css')}}"/>

	<link rel="stylesheet" type="text/css" href="{{ asset('assets/slick/slick-theme.css')}}"/>

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Raleway&display=swap" rel="stylesheet">

	<!-- CSS -->
	<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
	<!-- Default theme -->
	<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<!-- CSS Files -->
	<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css')}}"> 
	{{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> --}}
	<link rel="stylesheet" href="{{ asset('assets/css/atlantis.min.css')}}">

	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.0/css/dataTables.bootstrap4.min.css">


 
	<!-- default icons used in the plugin are from Bootstrap 5.x icon library (which can be enabled by loading CSS below) -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.min.css" crossorigin="anonymous">
 
	<!-- alternatively you can use the font awesome icon library if using with `fas` theme (or Bootstrap 4.x) by uncommenting below. -->
	<!-- link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" crossorigin="anonymous" -->
	
	<!-- the fileinput plugin styling CSS file -->
	<link href="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.2.5/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />


	<style>
		body{
			font-family: 'Raleway', sans-serif !important;
			
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

	.rating-list li:hover,
	.rating-list li:hover ~ li {
	color: #ffd700;
	
	}

	.rating-list {
		display: inline-block;
		list-style: none;
	}

	.rating-list li {
		float: right;
		color: #ddd;
		padding: 10px 5px;
	}


	.navbar-header .dropdown-menu:after {
    border-bottom: 8px solid #3E7BFA !important;
	}

	#bank_transfer_lu:hover, #wallet_transfer_lu{
		text-decoration: none;
	}



	.status-box::after {
		position: absolute;
		right: -90px;
		top: 60%;
		transform: translateY(-50%);
		border-bottom: 1px dashed #fff;
		content: "";
		width: 187px;
		height: 4px;
		}

		.status-box2::after {
		position: absolute;
		right: -99px;
		top: 60%;
		transform: translateY(-50%);
		border-bottom: 1px dashed #fff;
		content: "";
		width: 190px;
		height: 4px;
		}

		.status-box3::after {
		position: absolute;
		right: -87px;
		top: 60%;
		transform: translateY(-50%);
		border-bottom: 1px dashed #fff;
		content: "";
		width: 186px;
		height: 4px;
		}


		.status-boxfu::after {
		position: absolute;
		right: -98px;
		top: 60%;
		transform: translateY(-50%);
		border-bottom: 1px dashed #fff;
		content: "";
		width: 185px;
		height: 4px;
		}

		.status-box2fu::after {
		position: absolute;
		right: -93px;
		top: 60%;
		transform: translateY(-50%);
		border-bottom: 1px dashed #fff;
		content: "";
		width: 190px;
		height: 4px;
		}

		.status-box3fu::after {
		position: absolute;
		right: -98px;
		top: 60%;
		transform: translateY(-50%);
		border-bottom: 1px dashed #fff;
		content: "";
		width: 189px;
		height: 4px;
		}


		.file-drop-zone-title{
			visibility: hidden;
			
		}

		.file-drop-zone-title:after {
			content: 'Upload document or reciept for this transaction';
			display: block;
			visibility: visible;
			color:#C4C4FF

		}


	/* Extra small devices (phones, 600px and down) */
	@media only screen and (max-width: 768px) {
     #fu_rate_label_box{
		 text-align:center !important;
	 	}

		 #fu_rate_label{
		 	margin-bottom: 5rem !important;
	 	}
    }

  

    /* Large devices (laptops/desktops, 992px and up) */
    @media only screen and (min-width: 992px) {

    }

    /* Extra large devices (large laptops and desktops, 1200px and up) */
    @media only screen and (min-width: 1200px) {

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
<body style="overflow: scroll !important">
	<div id="cover"> 
		{{-- <span class="glyphicon glyphicon-refresh w3-spin preloader-Icon"></span>  --}}
		<img src="{{ asset('assets/images/payhelpa_light-dashboard2.png')}}" alt="" class="mt-5">
	</div>
	<div class="wrapper">
		<div class="main-header">
			<!-- Logo Header -->
			<div class="logo-header pb-3">
				
				<a href="/" class="logo mt-4">
					<img src="{{ asset('assets/images/payhelpa_light-01dashboard.png')}}" alt="navbar brand" class="navbar-brand">
                   
				</a>
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button"  data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon text-white">
						<i class="icon-menu text-white"></i>
					</span>
				</button>
				<button class="topbar-toggler more"><i class="icon-options-vertical text-white"></i></button>
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
						<p><span>Hello {{strtoupper($user->name)}}, welcome back, nice to always have you here.</span> 	@if ($user->number_verified == 0) <span style="color: #FF731C">Account not verified</span> @endif</p>
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
								<span class="notification">50</span>
							</a>
							<ul class="dropdown-menu notif-box animated fadeIn" aria-labelledby="notifDropdown">
								<li style="background:#3E7BFA">
									<div class="dropdown-title text-white text-left">Notifications(50)</div>
								</li>
								<li>
									<div class="notif-scroll scrollbar-outer">
										<div class="notif-center">
											<a href="#">
												<div class="notif-icon bg-secondary"> <i class="fa fa-user"></i> </div>
												<div class="notif-content">
													<span class="block">
														New user registered
													</span>
													<span class="time">5 minutes ago</span> 
												</div>
											</a>
											<a href="#">
												<div class="notif-icon bg-dark"> <i class="fa fa-user"></i> </div>
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
									<a class="see-all" href="javascript:void(0);">See all notifications </a>
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
										
											@if(empty($user->profile_image))
          											<i class='fa fa-user-circle text-dark' style="font-size: 2rem;"></i>
											@else
											<img src='https://payhelpa.s3.eu-west-3.amazonaws.com/uploads/profile_pictures/{{$user->profile_image}}' class='rounded-circle' width='30px' height='30px'>
											@endif

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

					{{-- Hide if user's number is verified --}}
					
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
	

		<!-- End Sidebar -->

		    {{-- Dynamic Content --}}


			@yield('content')


			{{-- Dynamic Content --}}
		
		
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
	{{-- <script src="{{ asset('assets/js/setting-demo.js')}}"></script> --}}
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

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.0/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.0/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/raty/3.0.0/jquery.raty.min.js" integrity="sha512-82+rXsrLf7WAylMdkaH5lWdNXWC0xHUKB41bmUCMICDHy/qpMZqpo4fQlBRJ5h1oSCqFOwKTWC4u2+vR2fblFw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	
<!-- piexif.min.js is needed for auto orienting image files OR when restoring exif data in resized images and when you
    wish to resize images before upload. This must be loaded before fileinput.min.js -->
	<script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.2.5/js/plugins/piexif.min.js" type="text/javascript"></script>
 
	<!-- sortable.min.js is only needed if you wish to sort / rearrange files in initial preview. 
		This must be loaded before fileinput.min.js -->
	<script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.2.5/js/plugins/sortable.min.js" type="text/javascript"></script>
	 
	<!-- bootstrap.bundle.min.js below is needed if you wish to zoom and preview file content in a detail modal
		dialog. bootstrap 5.x or 4.x is supported. You can also use the bootstrap js 3.3.x versions. -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
	 
	<!-- the main fileinput plugin script JS file -->
	<script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.2.5/js/fileinput.min.js"></script>
	 
	<!-- following theme script is needed to use the Font Awesome 5.x theme (`fas`). Uncomment if needed. -->
	<!-- script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.2.5/themes/fas/theme.min.js"></script -->
	 
	<!-- optionally if you need translation for your language then include the locale file as mentioned below (replace LANG.js with your language locale) -->
	<script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.2.5/js/locales/LANG.js"></script>
	  
	
<script>

	var multipleLineChart = document.getElementById('multipleLineChart').getContext('2d');

	var myMultipleLineChart = new Chart(multipleLineChart, {
		type: 'line',
		data: {
			labels: ["10:59PM", "11:59PM", "12:59AM", "1:59AM", "2:59AM", "3:59AM", "4:59AM", "5:59AM", "6:59AM", "7:59AM", "8:59AM", "9:59AM"],
			datasets: [{
				label: "Naira",
				borderColor: "#FB49C0",
				pointBorderColor: "#FFF",
				pointBackgroundColor: "#FB49C0",
				pointBorderWidth: 2,
				pointHoverRadius: 4,
				pointHoverBorderWidth: 1,
				pointRadius: 4,
				backgroundColor: 'transparent',
				fill: true,
				borderWidth: 2,
				data: [2020, 2300, 3200, 3800, 4005, 4580, 5110, 5520, 6060, 6700, 7070, 7150]
			}, {
				label: "Dollar",
				borderColor: "#31AFD6",
				pointBorderColor: "#FFF",
				pointBackgroundColor: "#31AFD6",
				pointBorderWidth: 2,
				pointHoverRadius: 4,
				pointHoverBorderWidth: 1,
				pointRadius: 4,
				backgroundColor: 'transparent',
				fill: true,
				borderWidth: 2,
				data: [1500, 2220, 5648, 3459, 4000, 4105, 5117, 6160, 6185, 4210, 3185, 6194]
			}]
		},
		options : {
			responsive: true, 
			maintainAspectRatio: false,
			legend: {
				position: 'top',
			},
			tooltips: {
				bodySpacing: 4,
				mode:"nearest",
				intersect: 0,
				position:"nearest",
				xPadding:10,
				yPadding:10,
				caretPadding:10
			},
			layout:{
				padding:{left:15,right:15,top:15,bottom:15}
			}
		}
	});


	//bind onClick event to all LI-tags of the legend
	var legendItems = myLegendContainer.getElementsByTagName('li');
	for (var i = 0; i < legendItems.length; i += 1) {
		legendItems[i].addEventListener("click", legendClickCallback, false);
	}

</script>

<script>
	$("#p2p_btn").click(function(){
  		$("#Express").hide();
		$("#P2P").show();
		//alert("P2p")
	});
</script>

<script>
	$("#Express_btn").click(function(){
		$("#P2P").hide();
  		$("#Express").show(); 
		 // alert("Express")
	});
</script>

<script>
	$("#profile_btn").click(function(){
  		
		$("#profile").show();
		$("#kyc").hide();
		$("#security").hide();
		//alert("P2p")
		$("#kyc2").hide();
	});
</script>

<script>
	$("#kyc_btn").click(function(){
		$("#profile").hide();
		$("#kyc").show();
		$("#security").hide();
		$("#kyc2").hide();
	});
</script>

<script>
	$("#security_btn").click(function(){
		$("#profile").hide();
		$("#kyc").hide();
		$("#kyc2").hide();
		$("#security").show();
	});
</script>


<script>
	
	$("#next_btn").click(function(){
		$("#profile").hide();
		$("#kyc").hide();
		$("#security").hide();
		$("#kyc2").show();
	});
</script>

<script>


    $("#profile_form").submit(function(e){
    
        e.preventDefault();

    	var querystring = $(this).serialize();
    
    //alert(querystring);

	$.ajaxSetup({
               headers: {
                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               }
               });

        $.ajax({
            url: "{{ url('/updateprofile') }}",
            type: "POST",
            data: querystring,
            dataType: "json",
			beforeSend:function(){
                $('#profile_submit_btn').text('Sending...');
                },
            success: function(response) {
                //code to execute
				alertify.set('notifier','position', 'top-right');
 				alertify.success('Saved successfully');
				$('#profile_submit_btn').text('Saved');
				$("#profile_submit_btn").css({backgroundColor: 'yellow'});
                if(response == 1)
                {
                    //CancelExperience();

					load_profile();
                
                }

				//console.log(response);

            },
            error: function(xhr, textStatus, errorThrown) {
                    //code to execute
                    //alert(xhr.responseText);
                    //$('#request-result2').html('Error occurred! Try again').delay(4000).fadeOut();
                },
            });

        return false;
    });

</script>


<script>

	load_profile();
	
	function load_profile()
	{
		//var performance_id = $('#performance_id').val();
	   // alert(performance_id)
		
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});

		$.ajax({
			url:"{{url('loadprofile')}}",
			method:"GET",
			dataType:"json",
			success:function(data)
			{
				//console.log(data);
				// $('#employeekpis').html(data.employeekpis);
				// //alert("hi")
				// if(data.filled_employee_score_count === 0)
				// {
				// 	$('#submit_to_line_manager').prop('disabled', false);
				// 	//$('#submit_to_line_manager').css('backgroundColor','red');
				// }

				$('#user_profile').html(data.user_profile);
			}
		});
	}
	
	</script>
	
	

<script>


    $("#security_form").submit(function(e){
    
        e.preventDefault();

    	var querystring = $(this).serialize();
    
    	//alert(querystring);

	$.ajaxSetup({
               headers: {
                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               }
               });

        $.ajax({
            url: "{{ url('/changepassword') }}",
            type: "POST",
            data: querystring,
            dataType: "json",
			beforeSend:function(){
                $('#password_change_submit_btn').text('Sending...');
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

				//console.log(response);
				alertify.set('notifier','position', 'top-right');
 				alertify.success('Changed successfully');
				$('#password_change_submit_btn').text('Changed');

            },
            error: function(xhr, textStatus, errorThrown) {
                    //code to execute
                    //alert(xhr.responseText);
                    //$('#request-result2').html('Error occurred! Try again').delay(4000).fadeOut();
                },
            });

        return false;
    });

</script>


<script>


	//$("#switchshowaccountbalance").click(function(){
	$("body").on('click' ,'#switchshowaccountbalance', function(e){
		if ($('#switchshowaccountbalance').is(":checked"))
		{
			// it is checked
			//alert("checked")
			var value = 1;
		}
		else
		{
			var value = 0;
		}

		//alert(value);

		$.ajaxSetup({
               headers: {
                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               }
               });

        $.ajax({
            url: "{{ url('/showaccountbalance') }}",
            type: "POST",
			data:{value:value},
            dataType: "json",
			beforeSend:function(){
                //$('#password_change_submit_btn').text('Sending...');
                },
            success: function(response) {
                //code to execute

				//console.log(response);

				if(response == 1)
                {
					alertify.set('notifier','position', 'top-right');
 				    alertify.success('Changed successfully');
					load_show_account_balance();

				}

            },
            error: function(xhr, textStatus, errorThrown) {
                    //code to execute
                    //alert(xhr.responseText);
                    //$('#request-result2').html('Error occurred! Try again').delay(4000).fadeOut();
                },
            });

        return false;


	});

</script>

<script>

	load_show_account_balance();
	
	function load_show_account_balance()
	{
		
		$.ajaxSetup({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					}
		});
		$.ajax({
			url:"{{url('loadaccountbalance')}}",
			method:"GET",
			dataType:"json",
			success:function(data)
			{
				//console.log(data);
				// $('#employeekpis').html(data.employeekpis);
				// //alert("hi")
				// if(data.filled_employee_score_count === 0)
				// {
				// 	$('#submit_to_line_manager').prop('disabled', false);
				// 	//$('#submit_to_line_manager').css('backgroundColor','red');
				// }

				$('#loadaccountbalance').html(data.loadaccountbalance);
			}
		});
	}
	
	</script>


<script>

	//$("#switchpersonaldata").click(function(){
	$("body").on('click' ,'#switchpersonaldata', function(e){
		if ($('#switchpersonaldata').is(":checked"))
		{
			// it is checked
			//alert("checked")
			var value = 1;
		}
		else
		{
			var value = 0;
		}

		$.ajaxSetup({
               headers: {
                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               }
               });

        $.ajax({
            url: "{{ url('/showpersonaldata') }}",
            type: "POST",
			data:{value:value},
            dataType: "json",
			beforeSend:function(){
                $('#password_change_submit_btn').text('Sending...');
                },
            success: function(response) {
                //code to execute
				alertify.set('notifier','position', 'top-right');
 				alertify.success('Changed successfully');
				load_show_personal_info();
				//alert("hi");

            },
            error: function(xhr, textStatus, errorThrown) {
                    //code to execute
                    //alert(xhr.responseText);
                    //$('#request-result2').html('Error occurred! Try again').delay(4000).fadeOut();
                },
            });

        return false;


	});

</script>

<script>

	load_show_personal_info();
	
	function load_show_personal_info()
	{
		
		$.ajaxSetup({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					}
		});
		$.ajax({
			url:"{{url('loadshowpersonalinfo')}}",
			method:"GET",
			dataType:"json",
			success:function(data)
			{
				//console.log(data);
				// $('#employeekpis').html(data.employeekpis);
				// //alert("hi")
				// if(data.filled_employee_score_count === 0)
				// {
				// 	$('#submit_to_line_manager').prop('disabled', false);
				// 	//$('#submit_to_line_manager').css('backgroundColor','red');
				// }

				$('#personalinfobox').html(data.personalinfobox);
			}
		});
	}
	
</script>


<script>


	//$("#").click(function(){
	$("body").on('click' ,'#switchloadnotifications', function(e){
		if ($('#switchloadnotifications').is(":checked"))
		{
			// it is checked
			//alert("checked")
			var value = 1;
		}
		else
		{
			var value = 0;
		}

		//alert(value);

		$.ajaxSetup({
               headers: {
                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               }
               });

        $.ajax({
            url: "{{ url('/shownotifications') }}",
            type: "POST",
			data:{value:value},
            dataType: "json",
			beforeSend:function(){
              //  $('#password_change_submit_btn').text('Sending...');
                },
            success: function(response) {
                //code to execute

				//load_show_personal_info();
				//console.log(response)
				
				load_show_notifications();
				alertify.set('notifier','position', 'top-right');
 				alertify.success('Changed successfully');

            },
            error: function(xhr, textStatus, errorThrown) {
                    //code to execute
                    //alert(xhr.responseText);
                    //$('#request-result2').html('Error occurred! Try again').delay(4000).fadeOut();
                },
            });

        return false;


	});

</script>

<script>

	load_show_notifications();
	
	function load_show_notifications()
	{
		
		$.ajaxSetup({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					}
		});
		$.ajax({
			url:"{{url('loadshownotifications')}}",
			method:"GET",
			dataType:"json",
			success:function(data)
			{
				//console.log(data);

				$('#loadshownotifications').html(data.loadshownotifications);
			}
		});
	}
	
	</script>


	
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

{{-- Notifications --}}


<script>

	$("body").on('click' ,'#generateotp', function(e){

		$.ajaxSetup({
               headers: {
                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               }
               });

        $.ajax({
            url: "{{ url('/generateotp') }}",
            type: "POST",
            dataType: "json",
			beforeSend:function(){
				$('#generateotpspinner').show();
                },
            success: function(response) {
                //code to execute
				//console.log(response);
				$('#generateotpspinner').hide();
				alertify.set('notifier','position', 'top-right');
 				alertify.success('OTP sent successfully. Check your email');
				 load_otp_withdraw();
            },
            error: function(xhr, textStatus, errorThrown) {
                    //code to execute
                    //alert(xhr.responseText);
                    //$('#request-result2').html('Error occurred! Try again').delay(4000).fadeOut();
                },
            });

        return false;


	});

</script>


<script>

	//$("#").click(function(){
	$("body").on('click' ,'#resendotp', function(e){

		$.ajaxSetup({
               headers: {
                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               }
               });

        $.ajax({
            url: "{{ url('/resendotp') }}",
            type: "POST",
            dataType: "json",
			beforeSend:function(){
              	 $('#resendotpspinner').show();
                },
            success: function(response) {
                //code to execute
				//console.log(response);
				$('#resendotpspinner').hide();
				alertify.set('notifier','position', 'top-right');
 				alertify.success('OTP resent successfully. Check your email');
				 load_otp_withdraw();
            },
            error: function(xhr, textStatus, errorThrown) {
                    //code to execute
                    //alert(xhr.responseText);
                    //$('#request-result2').html('Error occurred! Try again').delay(4000).fadeOut();
                },
            });

        return false;

	});

</script>


<script>

	load_otp_withdraw();
	
	function load_otp_withdraw()
	{
		
		$.ajaxSetup({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					}
		});
		$.ajax({
			url:"{{url('loadotpwithdraw')}}",
			method:"GET",
			dataType:"json",
			success:function(data)
			{
				//console.log(data);

				$('#loadotpwithdraw').html(data.loadotpwithdraw);
			}
		});
	}
	
	</script>


	<script>
		$('.digit-group').find('input').each(function() {
				$(this).attr('maxlength', 1);
				$(this).on('keyup', function(e) {
					var parent = $($(this).parent());
					
					if(e.keyCode === 8 || e.keyCode === 37) {
						var prev = parent.find('input#' + $(this).data('previous'));
						
						if(prev.length) {
							$(prev).select();
						}
					} else if((e.keyCode >= 48 && e.keyCode <= 57) || (e.keyCode >= 65 && e.keyCode <= 90) || (e.keyCode >= 96 && e.keyCode <= 105) || e.keyCode === 39) {
						var next = parent.find('input#' + $(this).data('next'));
						
						if(next.length) {
							$(next).select();
						} else {
							if(parent.data('autosubmit')) {
								parent.submit();
							}
						}
					}
				});
			});
	</script>



<script>
	// Listen to paste on the document
	document.addEventListener("paste", function(e) {
	// if the target is a text input
	if (e.target.type === "text") {
	var data = e.clipboardData.getData('Text');
	// split clipboard text into single characters
	data = data.split('');
	// find all other text inputs
	[].forEach.call(document.querySelectorAll("input[type=text]"), (node, index) => {
		// And set input value to the relative character
		node.value = data[index];
		});
	}
	});

</script>


<script>

var counter = 60;
var interval = setInterval(function() {
   
    // Display 'counter' wherever you want to display it.
    
	if(counter >= 0)
	{
		counter--;
    	$('#count').text(counter);
      	//console.log("Timer --> " + counter);
    }
	if (counter == 0) 
	{
     	clearInterval(interval);
      	$('#otp_phone_resend_link').css({'pointer-events' : '', 'color' : 'blue'});  
        return;
    }
	if (counter <= 1) 
	{
     	
      	$('#secs_box').text('sec');  
        return;
    }

}, 1000);
</script>


<script>

	function counter2()
	{

	var counter = 60;
	var interval = setInterval(function() {
	   
		// Display 'counter' wherever you want to display it.
		
		if(counter >= 0)
		{
			counter--;
			$('#count2').text(counter);
			  //console.log("Timer --> " + counter);
		}
		if (counter == 0) 
		{
			 clearInterval(interval);
			  $('#otp_phone_resend_link').css({'pointer-events' : '', 'color' : 'blue'});  
			return;
		}
		if (counter <= 1) 
		{
			 
			  $('#secs_box').text('sec');  
			return;
		}
	
	}, 1000);

	}

</script>


<script>

	function counter3()
	{

	var counter = 60;
	var interval = setInterval(function() {
	   
		// Display 'counter' wherever you want to display it.
		
		if(counter >= 0)
		{
			counter--;
			$('#count3').text(counter);
			  //console.log("Timer --> " + counter);
		}
		if (counter == 0) 
		{
			 clearInterval(interval);
			  $('#otp_phone_resend_link').css({'pointer-events' : '', 'color' : 'blue'});  
			return;
		}
		if (counter <= 1) 
		{
			 
			  $('#secs_box').text('sec');  
			return;
		}
	
	}, 1000);

	}

</script>



<script>
	

	$(".otp_box").keypress(function(){
		var len = $(".otp_box").filter(function () {
		return $.trim($(this).val()).length == 0
		}).length;

		console.log(len);
		if(len == 1)
		{
			//alert('hi');
			$("#otp_submit_btn").attr("disabled", false);
		}
	});

</script>


<script> 

	$("#continue_btn").click(function(){
		
		
		if (isEveryInputEmpty())
		{
			//alert('Some fields are empty.');
			$("#input_rate_error").show();
		}
		else
		{
			//alert('All inputs filled.');
			$("#myModal2bi").show();
			$("#myModal2a").hide();
			$("#input_rate_error").hide();
		}

	});

</script>


<script>
	$("#transaction_details_lu_input_rate_back").click(function (e) { 
		e.preventDefault();
		$("#myModal2bi").hide();
		$("#myModal2a").show();
	});
</script>

<script>
	$(".transaction_details_lu_input_rate_close").click(function (e) { 
		//e.preventDefault();
		document.getElementById('myModal2bi').style.display='none';
		$('.modal-backdrop').remove();
		$(':input').val('');
	});
</script>


<script>

function isEveryInputEmpty() 
{
    var allEmpty = false;

    $('.input_rate_continuex').each(function() {
        if ($(this).val() === '') {
            allEmpty = true;
            return true; // we've found a non-empty one, so stop iterating
        }
    });

    return allEmpty;
}

</script>


<script>

	function isEveryInputEmpty2() 
	{
		var allEmpty = false;
	
		$('.lu_connect_transaction_details').each(function() {
			if ($(this).val() === '') {
				allEmpty = true;
				return true; // we've found a non-empty one, so stop iterating
			}
		});
	
		return allEmpty;
	}
	
	</script>


<script>

	function isEveryInputEmpty3() 
	{
		var allEmpty = false;
	
		$('.lu_connect_transaction_details_input_rate').each(function() {
			if ($(this).val() === '') {
				allEmpty = true;
				return true; // we've found a non-empty one, so stop iterating
			}
		});
	
		return allEmpty;
	}
	
	</script>


<script> 

	$("#continue_btn2").click(function(){
		
		$("#myModal2a").hide();
		$("#myModal2bi").hide();
		$("#myModal2bii").hide();
		$("#myModal2c").show();

		//console.log("hi")
		
	});

</script>


<script>

	$("#back_pay_now").click(function (e) { 
		e.preventDefault();
		$("#myModal2a").hide();
		$("#myModal2bi").hide()
		$("#myModal2bii").show();
		$("#myModal2c").hide();
	});
</script>


<script>
	
	$("#pay_now_btn").click(function (e) { 
		e.preventDefault();


		$.ajaxSetup({
               headers: {
                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               }
               });

        $.ajax({
            url: "{{ url('generate/dynamic/account/number') }}",
            type: "POST",
			//data: querystring,
            dataType: "json",
			beforeSend:function(){
                
                },
            success: function(response) {
                //code to execute
				
				console.log(response);

				$(".account_number_box2").text(response.account_number);

				$(".account_number_box2").val(response.account_number);

				$("#myModal2b").hide();
				$("#myModal2c").hide();
				$("#myModal2d").show();				

            },
            error: function(xhr, textStatus, errorThrown) {
                    //code to execute
                    //console(xhr.responseText);
                    //$('#request-result2').html('Error occurred! Try again').delay(4000).fadeOut();
                },
            });

        // return false;

		
	});
</script>



<script>
	$("#back_pay_with").click(function (e) { 
		e.preventDefault();
		$("#myModal2a").hide();
		$("#myModal2b").hide();
		$("#myModal2c").show();
		$("#myModal2d").hide();
	});
</script>


<script type="text/javascript">
	$(document).ready(function() {
		 $("#cover").fadeOut("slow");
	});
</script>




<script> 

	$(".connect_lu").click(function(){

		var transaction_id = $(this).data('transaction_id');
		var rate = $(this).data('rate');
		//alert(transaction_id);

		
		$('.transaction_offer_id_connect_lu').val(transaction_id);
		 $('.dollar_rate_connect_lu').text(rate);
		$('#dollar_rate_connect_lu_hidden').val(rate);


	
		// $('#myModal1a').modal('show');

		$('#myModal1a').modal('show');
		
	});

</script>


<script> 

	$("#continue_lu_connect_btn").click(function(){

	 var val = $('#amount_connect_lu').val();

		if (val == '')
		{
			//alert('Some fields are empty.');
			$("#input_rate_error_connect_lu").show();
		}
		else
		{
			$("#input_rate_error_connect_lu").hide();
			// alert('All inputs filled.');
			var dollar_amount2 = $('#amount_connect_lu').val();
			var rate2 = $('#dollar_rate_connect_lu_hidden').val();

			//alert(dollar_amount2);

			var value2 = dollar_amount2 * rate2;

			// Create our number formatter.
			var formatter = new Intl.NumberFormat('en-US', {
			style: 'currency',
			currency: 'NGN',
			currencyDisplay: 'narrowSymbol',

			// These options are needed to round to whole numbers if that's what you want.
			//minimumFractionDigits: 0, // (this suffices for whole numbers, but will print 2500.10 as $2,500.1)
			//maximumFractionDigits: 0, // (causes 2500.99 to be printed as $2,501)
			});


			// Create our number formatter.
			var formatter2 = new Intl.NumberFormat('en-US', {
			style: 'currency',
			currency: 'USD',
			currencyDisplay: 'narrowSymbol',

			// These options are needed to round to whole numbers if that's what you want.
			//minimumFractionDigits: 0, // (this suffices for whole numbers, but will print 2500.10 as $2,500.1)
			//maximumFractionDigits: 0, // (causes 2500.99 to be printed as $2,501)
			});

			var value = formatter.format(value2); /* $2,500.00 */

			

			//For Modal display

			var rate = formatter.format(rate2); 

			$('.dollar_rate_connect_lu').text(rate);

			var dollar_amount = formatter2.format(dollar_amount2); 

			$('.amount_connect_lu').text(dollar_amount);

			$('.transaction_amount_connect_lu').val(dollar_amount2);

			$('.value_connect_lu').text(value);

			// $('#offer_id').val(offer_id);

			// $('.dollar_rate_connect_lu').text(dollar_rate);
			$('#myModal1a').modal('hide');
			//$('#myModal1bi').modal('show');
			$('#myModal1bi').modal('show');
			
		}

	});

</script>


<script>
	$('#transaction_details_continue_btn').click(function (e) { 
		e.preventDefault();

		//alert("hi")

		if (isEveryInputEmpty2())
		{
			//alert('Some fields are empty.');
			$("#transaction_details_continue_error").show();
		}
		else
		{
			//alert('All inputs filled.');

			
			var subject = $('#transaction_subject_connect_lu').val();
			var website = $('#transaction_website_link_connect_lu').val();
			var description = $('#transaction_description_connect_lu').val();

			//alert(website)

			$('.transaction_subject_connect_lu').val(subject);
			$('.transaction_website_link_connect_lu').val(website);
			$('.transaction_description_connect_lu').val(description);

			 $('#myModal1bi').modal('hide');
			$('#myModal1bii').modal('show');
			$("#transaction_details_continue_error").hide();
		}
		
	});
</script>


<script>
	$('#transaction_details_continue_btn_lu_input_rate').click(function (e) { 
		e.preventDefault();

		//alert("hi")

		if (isEveryInputEmpty3())
		{
			//alert('Some fields are empty.');
			$("#transaction_details_continue_error_lu_input_rate").show();
		}
		else
		{
			//alert('All inputs filled.');

			
			var subject = $('#transaction_subject_connect_lu_input_rate').val();
			var website = $('#transaction_website_link_connect_lu_input_rate').val();
			var description = $('#transaction_description_connect_lu_input_rate').val();

			//alert(description);

			$('.transaction_subject_lu_input_rate').val(subject);
			$('.transaction_website_link_lu_input_rate').val(website);
			$('.transaction_description_lu_input_rate').val(description);

			 $('#myModal2bi').hide();
			 $('#myModal2bii').show();
			// $("#transaction_details_continue_error").hide();
		}
		
	});
</script>


<script>
	$('#buy_now_continue_back').click(function (e) { 
		e.preventDefault();
		$('#myModal1a').modal('show');
		$('#myModal1bi').modal('hide');

	});
</script>

<script>
	$('#buy_now_continue_back2').click(function (e) { 
		e.preventDefault();
		$('#myModal1a').modal('hide');
		$('#myModal1bi').modal('show');
		$('#myModal1bii').modal('hide');
	});
</script>


<script>
	$('.buy_now_continue_back2cancel').click(function (e) { 
		e.preventDefault();
		document.getElementById('myModal1a').style.display='none';
		document.getElementById('myModal1bi').style.display='none';
		document.getElementById('myModal1bii').style.display='none';
		$('.modal-backdrop').remove();
		$(':input').val('');
		$('#myModal1a').modal('hide');
		$('#myModal1bi').modal('hide');
		$('#myModal1bii').modal('hide');
	});
</script>

<script>
	$('.buy_now_continue_cancel').click(function (e) { 
		e.preventDefault();
		document.getElementById('myModal1a').style.display='none';
		document.getElementById('myModal1bi').style.display='none';
		$('.modal-backdrop').remove();
		$(':input').val('');
		$('#myModal1a').modal('hide');
		$('#myModal1bi').modal('hide');
	});
</script>

<script>
	$('#buy_now_continue_btn').click(function (e) { 
		e.preventDefault();
		$('#myModal1a').modal('hide');
		$('#myModal1b').modal('hide');
		$('#myModal1c').modal('show');

		//alert("hi");
	});
</script>




<script>
	$('#myModal1c_back').click(function (e) { 
		e.preventDefault();
		$('#myModal1a').modal('hide');
		$('#myModal1b').modal('show');
		$('#myModal1c').modal('hide');
	});
</script>


<script>
	$('#pay_with_connect_lu_back').click(function (e) { 
		e.preventDefault();
		$('#myModal1a').modal('hide');
		$('#myModal1b').modal('hide');
		$('#myModal1c').modal('show');
		$('#myModal1d').modal('hide');
	});
</script>


<script>
	$('#made_transfer_back_connect_lu').click(function (e) { 
		e.preventDefault();
		$('#myModal1a').modal('hide');
		$('#myModal1b').modal('hide');
		$('#myModal1c').modal('hide');
		$('#myModal1d').modal('show');
		$('#myModal1e').modal('hide');
	});
</script>

<script>
	$('#confirm_back_connect_lu').click(function (e) { 
		e.preventDefault();
		$('#myModal1a').modal('hide');
		$('#myModal1b').modal('hide');
		$('#myModal1c').modal('hide');
		$('#myModal1d').modal('hide');
		$('#myModal1e').modal('show');
		$('#myModal1f').modal('hide');
	});
</script>


<script>
	$('#bank_transfer_connect_lu').click(function (e) { 
		e.preventDefault();
		$('#myModal1a').modal('hide');
		$('#myModal1b').modal('hide');
		$('#myModal1c').modal('hide');
		$('#myModal1d').modal('hide');
		$('#myModal1e').modal('show');
	});
</script>


<script>
	$('#card_pay_connect_lu').click(function (e) { 
		e.preventDefault();
		$('#myModal1g').modal('show');
	});
</script>


<script>
	$('#made_transfer_connect_lu_form').submit(function (e) { 
		e.preventDefault();
		
		var querystring = $(this).serialize();
    
    	//alert(querystring);

	$.ajaxSetup({
               headers: {
                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               }
               });

        $.ajax({
            url: "{{ url('/confirm/bank/transfer/connect/lu') }}",
            type: "POST",
            data: querystring,
            dataType: "json",
			beforeSend:function(){
                	$('#myModal1f').modal('show');
                },
            success: function(response) {
                //code to execute
			
				//console.log(response);

				if(response.transaction_succeed == true)
				{
					$('#myModal1a').modal('hide');
					$('#myModal1b').modal('hide');
					$('#myModal1c').modal('hide');
					$('#myModal1d').modal('hide');
					$('#myModal1e').modal('hide');
					$('#myModal1f').modal('hide');
					$('#myModal1h').modal('show');
					$('#transactionid_link_connect_lu').attr("href", window.location.origin+"/dashboard/transaction/"+response.transaction_id+"/details");
				}

				//counter3();

            },
            error: function(xhr, textStatus, errorThrown) {
                    //code to execute
                    //alert(xhr.responseText);
                    //$('#request-result2').html('Error occurred! Try again').delay(4000).fadeOut();
                },
            });

        return false;
	});
</script>


<script>
	$('.closemodal1b').click(function (e) { 
		//e.preventDefault();
		// document.getElementById('myModal1a').style.display='none';
		// document.getElementById('myModal1b').style.display='none';
		$('#myModal1a').modal('hide');
		$('#myModal1b').modal('hide');
		// $('.modal-backdrop').remove();
		$(':input').val('');
	});
</script>

<script>
	$('.closemodal1c').click(function (e) { 
		e.preventDefault();

		document.getElementById('myModal1a').style.display='none';
		document.getElementById('myModal1bi').style.display='none';
		document.getElementById('myModal1bii').style.display='none';
		document.getElementById('myModal1c').style.display='none';
		$('.modal-backdrop').remove();
		$(':input').val('');
		$('#myModal1a').modal('hide');
		$('#myModal1bi').modal('hide');
		$('#myModal1bii').modal('hide');
		$('#myModal1c').modal('hide');
	});
</script>


<script>
	$('.closemodal1e').click(function (e) { 
		e.preventDefault();
		
		$('#myModal1a').modal('hide');
		$('#myModal1bi').modal('hide');
		$('#myModal1bii').modal('hide');
		$('#myModal1c').modal('hide');
		$('#myModal1d').modal('hide');
		$('#myModal1e').modal('hide');
	});
</script>


<script>
	$('.lu_connect_cancel').click(function (e) { 
		e.preventDefault();
		
		document.getElementById('myModal1a').style.display='none';
		$('.modal-backdrop').remove();
		$(':input').val('');
		//$('myModal1a').hide();
		$('#myModal1a').modal('hide');
	});
</script>


<script>
	function closeAllModals() 
	{

		// get modals
		const modals = document.getElementsByClassName('modal');

		// on every modal change state like in hidden modal
		for(let i=0; i<modals.length; i++) {
		modals[i].classList.remove('show');
		modals[i].setAttribute('aria-hidden', 'true');
		modals[i].setAttribute('style', 'display: none');
		}

		// get modal backdrops
		const modalsBackdrops = document.getElementsByClassName('modal-backdrop');

		// remove every modal backdrop
		for(let i=0; i<modalsBackdrops.length; i++) {
		document.body.removeChild(modalsBackdrops[i]);
		}
}
</script>


<script>
	$('#transfer_continue_btn').click(function (e) { 
		e.preventDefault();
		
		$('#myModal1c').modal('show');
	});
</script>


<script>
	$('#pay_now_btn1').click(function (e) { 
		e.preventDefault();


		$.ajaxSetup({
               headers: {
                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               }
               });

        $.ajax({
            url: "{{ url('generate/dynamic/account/number') }}",
            type: "POST",
			//data: querystring,
            dataType: "json",
			beforeSend:function(){
                
                },
            success: function(response) {
                //code to execute
				
				console.log(response);

				$(".account_number_box1").text(response.account_number);

				$(".account_number_box1").val(response.account_number);

				$('#myModal1b').modal('hide');
				$('#myModal1c').modal('hide');
				$('#myModal1d').modal('show');			

            },
            error: function(xhr, textStatus, errorThrown) {
                    //code to execute
                    //console(xhr.responseText);
                    //$('#request-result2').html('Error occurred! Try again').delay(4000).fadeOut();
                },
            });

		
	});
</script>


<script>
	$('#dollar_amount_input_rate').on("keyup keydown change", function(event){
		var dollar_amount2 = $('#dollar_amount_input_rate').val();
		var rate2 = $('#rate_input_rate').val();

		var value2 = dollar_amount2 * rate2;


		// Create our number formatter.
		var formatter = new Intl.NumberFormat('en-US', {
		style: 'currency',
		currency: 'NGN',
		currencyDisplay: 'narrowSymbol',

		// These options are needed to round to whole numbers if that's what you want.
		//minimumFractionDigits: 0, // (this suffices for whole numbers, but will print 2500.10 as $2,500.1)
		//maximumFractionDigits: 0, // (causes 2500.99 to be printed as $2,501)
		});


		// Create our number formatter.
		var formatter2 = new Intl.NumberFormat('en-US', {
		style: 'currency',
		currency: 'USD',
		currencyDisplay: 'narrowSymbol',

		// These options are needed to round to whole numbers if that's what you want.
		//minimumFractionDigits: 0, // (this suffices for whole numbers, but will print 2500.10 as $2,500.1)
		//maximumFractionDigits: 0, // (causes 2500.99 to be printed as $2,501)
		});

		var value = formatter.format(value2); /* $2,500.00 */

		 
		$('#naira_value_input_rate').val(value);

		 //For Modal display

		 var rate = formatter.format(rate2); 

		$('.dollar_rate_releasing_lu').text(rate);
		$('#dollar_rate_releasing_lu').val(rate2);
		$('.dollar_rate_releasing_lu').val(rate2);
		

		var dollar_amount = formatter2.format(dollar_amount2); 

		 $('.amount_releasing_lu').text(dollar_amount);
		 $('#amount_releasing_lu').val(dollar_amount2);
		 $('.amount_releasing_lu').val(dollar_amount2);

		 $('.value_releasing_lu').text(value);

		//$('#continue_btn').prop('disabled', false);

		//console.log(value);
	});
</script>

<script>
	$('#rate_input_rate').on("keyup keydown change", function(event){
		var dollar_amount2 = $('#dollar_amount_input_rate').val();
		var rate2 = $('#rate_input_rate').val();

		var value2 = dollar_amount2 * rate2;

		// Create our number formatter.
		var formatter = new Intl.NumberFormat('en-US', {
		style: 'currency',
		currency: 'NGN',
		currencyDisplay: 'narrowSymbol',

		// These options are needed to round to whole numbers if that's what you want.
		//minimumFractionDigits: 0, // (this suffices for whole numbers, but will print 2500.10 as $2,500.1)
		//maximumFractionDigits: 0, // (causes 2500.99 to be printed as $2,501)
		});

		// Create our number formatter.
		var formatter2 = new Intl.NumberFormat('en-US', {
		style: 'currency',
		currency: 'USD',
		currencyDisplay: 'narrowSymbol',

		// These options are needed to round to whole numbers if that's what you want.
		//minimumFractionDigits: 0, // (this suffices for whole numbers, but will print 2500.10 as $2,500.1)
		//maximumFractionDigits: 0, // (causes 2500.99 to be printed as $2,501)
		});

		var value = formatter.format(value2); /* $2,500.00 */

		$('#naira_value_input_rate').val(value);

		// //For Modal display

		var rate = formatter.format(rate2); 

		$('.dollar_rate_releasing_lu').text(rate);
		$('#dollar_rate_releasing_lu').val(rate2);
		$('.dollar_rate_releasing_lu').val(rate2);


		var dollar_amount = formatter2.format(dollar_amount2); 

		$('.amount_releasing_lu').text(dollar_amount);
		$('#amount_releasing_lu').val(dollar_amount2);
		$('.amount_releasing_lu').val(dollar_amount2);

		$('.value_releasing_lu').text(value);
		//$('#continue_btn').prop('disabled', false);

		//console.log(value);

	});
</script>


<script>
	$("#continue_back_lu").click(function (e) { 
		$("#myModal2bii").hide();
		$("#myModal2bi").show();
	});
</script>


<script>
	$("#bank_transfer_lu").click(function (e) { 
		e.preventDefault();

		$("#myModal2e").show();

		// counter2();
	});
</script>


<script>
	$("#close2b").click(function (e) { 
		e.preventDefault();
		$('#myModal2b').modal('hide');
		//alert("jkdjkde")
	});
</script>


<script>
	$("#made_transfer_form").submit(function (e) { 
		e.preventDefault();

		//store LU own rate

		//var querystring = $(this).serialize();

		var formData = new FormData();

        var file = $('#browse3')[0].files[0];


		formData.append('transaction_how_to_doc', file);

		var rate = $('#dollar_rate_releasing_lu').val();
		formData.append('rate', rate);

		var amount = $('#amount_releasing_lu').val();
		formData.append('amount', amount);

		var account_number = $('.account_number_box2').val();
		formData.append('account_number', account_number);

		var transaction_subject = $('.transaction_subject_lu_input_rate').val();
		formData.append('subject', transaction_subject);

		var website = $('.transaction_website_link_lu_input_rate').val();
		formData.append('website', website);

		var description = $('.transaction_description_lu_input_rate').val();
		formData.append('description', description);
		
    
    	// //Display the key/value pairs
		// for (var pair of formData.entries()) {
		// 	console.log(pair[0]+ ', ' + pair[1]); 
		// }

		$.ajaxSetup({
               headers: {
                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               }
               });

        $.ajax({
            url: "{{ url('/bank/transfer/lu/rate') }}",
            type: "POST",
			contentType: false,
            processData: false,                                   
            data: formData,
            dataType: "json",
	
            success: function(response) {
                //code to execute
			
				//console.log(response);

				// if(response.inserted)
				// {
				// 	$('#myModal2i').hide();
				// 	$('#myModal2b').hide();
				// 	$('#myModal2c').hide();
				// 	$('#myModal2d').hide();
				// 	$('#myModal2e').hide();
				// 	$('#myModal2f').hide();
				// 	//$('#myModal2h').modal('show');
				// 	$('#myModal2h').show();
				// 	$('.transactionid_link_lu_rate').attr("href", window.location.origin+"/dashboard/transaction/"+response.transaction_id+"/details");
				// }


				// if(response.pending_offer_exists == true)
				// {
				
				// 	alertify.set('notifier','position', 'top-right');
 				// 	alertify.warning('You have a pending offer. You may update the rate for more interest');
				// }

				$('#myModal2i').show();

				counter3();

            },
            error: function(xhr, textStatus, errorThrown) {
                    //code to execute
                    //alert(xhr.responseText);
                    //$('#request-result2').html('Error occurred! Try again').delay(4000).fadeOut();
                },
            });

        return false;
		

	});
</script>

<script>
	$("#made_transfer_back_lu").click(function (e) { 
		e.preventDefault();
		
		document.getElementById('myModal2e').style.display='none';
		 
	});
</script>

<script>
	$("#confirm_back_lu").click(function (e) { 
		e.preventDefault();

		 $('#myModal2f').modal('hide');
		$('#myModal2e').modal('show');
		//console.log("back clicked")
	});
</script>

<script>
	$("#card_pay_back_lu").click(function (e) { 
		e.preventDefault();

		 $('#myModal2h').modal('hide');
		$('#myModal2g').modal('show');
		
	});
</script>




<script>
	$("#card_pay_lu").click(function (e) { 
		e.preventDefault();
		$('#myModal2b').modal('hide');
		$('#myModal2c').modal('hide');
		$('#myModal2d').modal('hide');
		$('#myModal2g').modal('show');
	});
</script>


<script>
	$(".close2b").click(function (e) { 
		//e.preventDefault();
		document.getElementById('myModal2bii').style.display='none';
		$('.modal-backdrop').remove();
		$(':input').val('');
	});
</script>


<script>
	$(".close2c").click(function (e) { 
		//e.preventDefault();
		document.getElementById('myModal2c').style.display='none';
		$('.modal-backdrop').remove();
		$(':input').val('');
	});
</script>

<script>
	$(".close2e").click(function (e) { 
		//e.preventDefault();
		document.getElementById('myModal2d').style.display='none';
		document.getElementById('myModal2e').style.display='none';
		$('.modal-backdrop').remove();
		$(':input').val('');
	});
</script>


<script>
	$('#card_pay_form').submit(function (e) { 
		e.preventDefault();

	var querystring = $(this).serialize();
    
    //alert(querystring);

	$.ajaxSetup({
               headers: {
                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               }
               });

        $.ajax({
            url: "{{ url('/card/pay/lu/input/rate') }}",
            type: "POST",
            data: querystring,
            dataType: "json",
			beforeSend:function(){
                $('#pay_card_btn').text('Processing...');
                },
            success: function(response) {
                //code to execute
			
				console.log(response);

				if(response.check_virtual_account_record == true)
				{
					$('#myModal2b').modal('hide');
					$('#myModal2c').modal('hide');
					$('#myModal2d').modal('hide');
					$('#myModal2g').modal('hide');
					$('#myModal2h').modal('show');

					$('.transaction_id_lu').val(response.offer_id);
				}
				if(response.check_virtual_account_record == false)
				{
					alertify.set('notifier','position', 'top-right');
 					alertify.warning('Payment can not be confirmed yet');
				}

				if(response.pending_offer_exists == true)
				{
					alertify.set('notifier','position', 'top-right');
 					alertify.warning('You have a pending offer. You may update the rate for more interest');
				}
				

				//$('#transactionid_link_lu_rate').attr("href", window.location.origin+"/dashboard/transaction/"+response.transaction_id+"/details");

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
	$('#card_pay_form_connect_lu').submit(function (e) { 
		e.preventDefault();

	var querystring = $(this).serialize();
    
    //alert(querystring);

	$.ajaxSetup({
               headers: {
                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               }
               });

        $.ajax({
            url: "{{ url('/card/pay/lu') }}",
            type: "POST",
            data: querystring,
            dataType: "json",
			beforeSend:function(){
                $('#pay_card_btn_connect_lu').text('Processing...');
                },
            success: function(response) {
                //code to execute
				$(':input').val('');
				console.log(response);
				$('#myModal1b').modal('hide');
				$('#myModal1c').modal('hide');
				$('#myModal1d').modal('hide');
				$('#myModal1g').modal('hide');
				$('#myModal1h').modal('show');

				$('.transaction_id_lu').val(response.transaction_id);

				$('#transactionid_link_connect_lu').attr("href", window.location.origin+"/dashboard/transaction/"+response.transaction_id+"/details");

            },
            error: function(xhr, textStatus, errorThrown) {
                    //code to execute
                    //alert(xhr.responseText);
                    //$('#request-result2').html('Error occurred! Try again').delay(4000).fadeOut();
                },
            });

        return false;
		
	});
</script>


<script>
	function onlyNumber(evt) 
	{
		var charCode = (evt.which) ? evt.which : event.keyCode
		if (charCode > 31 && (charCode < 48 || charCode > 57)){
				return false;
			}
		return true;
	}	
</script>	


<script>
	$(document).ready( function () {
    	$('.datatable').DataTable();
	});
</script>


<script>
	$(".input-id").fileinput({'showUpload':false, 'previewFileType':'any'});
</script>


<!------------- FU transactions ------------------------------------------>

<script>
	$('.fu_trade').click(function (e) { 
		e.preventDefault();
		var transaction_id = $(this).data('transaction_id');

		var value2 = $(this).data('value');
		//alert(value2);

		var formatter = new Intl.NumberFormat('en-US', {
			style: 'currency',
			currency: 'NGN',
			currencyDisplay: 'narrowSymbol',

			// These options are needed to round to whole numbers if that's what you want.
			//minimumFractionDigits: 0, // (this suffices for whole numbers, but will print 2500.10 as $2,500.1)
			//maximumFractionDigits: 0, // (causes 2500.99 to be printed as $2,501)
		});

		var value = formatter.format(value2);

		$('.offer_id_fu_trade_value').text(value);

		$('#transaction_id_fu_trade').val(transaction_id);


		//Check if FU is verified to trade

		
		//$("#myModalaccepttrade").modal({backdrop: "static"});
	
		$('#myModalaccepttrade').modal('show'); //display something
		
		
	});
</script>


<script>
	$('#receipt').change(function (e) { 
		e.preventDefault();

		//alert('hi')
		var form_data = new FormData();

        var files = $('#receipt')[0].files[0];
            // alert("Hi");

        form_data.append('receipt', files);

		var transaction_id = $('#transaction_id_receipt_upload').val();

        form_data.append('transaction_id', transaction_id);

        //console.log(form_data);


            $.ajax({
                    url: '{{ url("/upload/receipt/fu") }}',
                    type: 'post',
                    contentType: false,
                    processData: false,
                    data: form_data,
                    success: function(response){
                        console.log(response);
						//$('#receipt_upload_continue').prop('disabled', false);
						$("#receipt_upload_continue").removeClass("disabled");

                    },
                    error: function(xhr, textStatus, errorThrown) {
                        //code to execute
                        //alert(xhr.responseText);
                        //$('#request-result2').html('Error occurred! Try again').delay(4000).fadeOut();
                    },

                });

		
	});
</script>


<script>
	$('#receipt_upload_continue').click(function (e) { 
		e.preventDefault();

		$('#myModalreceipt').modal('show');
	});
</script>


<script>
	$('#fu_private_details_continue_btn').click(function (e) { 
		e.preventDefault();
		$('#fu_private_details_continue').hide();
		$('#fu_private_details_continue2').show();
		//alert("hi")

		$('#private_details_label').css('background', '#78A3FC');
		$("processing_label").css("background", "");
	});
</script>

<script>
	$('#receipt_upload_continue_back').click(function (e) { 
		e.preventDefault();
		$('#fu_private_details_continue').show();
		$('#fu_private_details_continue2').hide();
		//alert("hi")
	});
</script>


<script>
	$('.have-you-carried-out-back').click(function (e) { 
		e.preventDefault();
		$('#myModalreceipt').modal('hide');
		//alert("hi")

	});
</script>


<script>
	$('.has-your-completed-back').click(function (e) { 
		e.preventDefault();
		$('#myModal').hide();
		//alert("hi")

	});
</script>


<script>
	$('.rate_user').click(function (e) { 
		e.preventDefault();

		$('#transaction_successful_page').hide();
		$('#rating_review_page').show();
		
	});
</script>

<script>
	$(".rate_star").hover(function(){
		$(this).removeClass("fa-star-o");
		$(this).addClass("fa-star");
	});
</script>

<script>
	$(".rate_star").click(function(){
		var score = $(this).data('score');
		var user_id = $(this).data('user_id');
		var transaction_id = $(this).data('transaction_id');
		//alert(transaction_id);

		$.ajaxSetup({
               headers: {
                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               }
               });

        $.ajax({
            url: "{{ url('/rate/user') }}",
            type: "POST",
            data:{score:score, user_id:user_id, transaction_id:transaction_id},
            dataType: "json",
			beforeSend:function(){
                //$('#profile_submit_btn').text('Sending...');
                },
            success: function(response) {
                //code to execute
				

				console.log(response);

				if(response.rated)
				{
				

					$('#rating_success_box').show();
					$('#rating_box').hide();
				}
				else
				{
					$('#rating_error_box').show();
					$('#rating_box').hide();
				}

            },
            error: function(xhr, textStatus, errorThrown) {
                    //code to execute
                    //alert(xhr.responseText);
                    //$('#request-result2').html('Error occurred! Try again').delay(4000).fadeOut();
                },
            });

        return false;

	});
</script>

<script>
	$("#review_form").submit(function (e) { 
		//e.preventDefault();

		var querystring = $(this).serialize();

		//alert(querystring);

		$.ajaxSetup({
               headers: {
                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               }
               });

        $.ajax({
            url: "{{ url('/user/review') }}",
            type: "POST",
            data: querystring,
            dataType: "json",
			beforeSend:function(){
               // $('#profile_submit_btn').text('Sending...');
                },
            success: function(response) {
                // //code to execute
				// alertify.set('notifier','position', 'top-right');
 				// alertify.success('Saved successfully');
				// $('#profile_submit_btn').text('Saved');
				// $("#profile_submit_btn").css({backgroundColor: 'yellow'});

                if(response.reviewed)
                {
                    alertify.set('notifier','position', 'top-right');
					alertify.success('Review submitted successfully');
					//$('#profile_submit_btn').text('Saved');
					
					//$('#review_comment').prop('disabled', false);
					//$('#review_submit_btn').prop('disabled', false);
					$('#review_submit_btn').hide();
					$('#review_submit_btn_submitted').show();

					$('#review_comment').hide();
					$('#review_comment_submitted').show();
                }

				console.log(response);

            },
            error: function(xhr, textStatus, errorThrown) {
                    //code to execute
                    //alert(xhr.responseText);
                    //$('#request-result2').html('Error occurred! Try again').delay(4000).fadeOut();
                },
            });

        return false;
		
	});
</script>

<script>
	//$('#profile_pic').change(function (e) { 
	$("body").on('change' ,'#profile_pic', function(e){
		e.preventDefault();
		//console.log("changed")
		var form_data = new FormData();

        var files = $('#profile_pic')[0].files[0];

        form_data.append('profile_pic', files);

		// Display the key/value pairs
            // for (var pair of form_data.entries()) {
            //     console.log(pair[0]+ ', ' + pair[1]); 
            // }


        //console.log(form_data);


            $.ajax({
                    url: '{{ url("/upload/profile/pic") }}',
                    type: 'post',
                    contentType: false,
                    processData: false,
                    data: form_data,
                    success: function(response){
                        console.log(response);
						//$('#receipt_upload_continue').prop('disabled', false);
						//$("#receipt_upload_continue").removeClass("disabled");

                    },
                    error: function(xhr, textStatus, errorThrown) {
                        //code to execute
                        //alert(xhr.responseText);
                        //$('#request-result2').html('Error occurred! Try again').delay(4000).fadeOut();
                    },

                });

	});
</script>


	@if (!empty($lu_rate))

		@if ($lu_rate->is_payment_confirmed == 0)

			<script type="text/javascript">
				$(document).ready(function(){
					$("#myModal2i").modal('show');
				});
			</script>

		@endif

	@endif

	@if(!empty($lu_rate2))

		@if ($lu_rate2->confirmed_transaction_seen == 0)

			<script type="text/javascript">
				$(document).ready(function(){
					$("#myModal2h").modal('show');
				});
			</script>

		@endif

	@endif

	<script>
		// Add the following code if you want the name of the file appear on select
		$(".custom-file-input").on("change", function() {
		  var fileName = $(this).val().split("\\").pop();
		  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
		});
	</script>

</body>
</html>