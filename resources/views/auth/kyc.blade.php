@extends('layouts.master')

@section('content')

<div class="main-panel">
    <div class="content">
        <div class="page-inner">

            <div class="row">
                <div class="col-md-12">
                    <div class="row mb-5">
                        <div class="col-md-12">

                            <div class="row pt-3 px-3 pb-0">
                                <div class="col">
                                    <a class="cursor mx-3" id="profile_btn">Profile</a>  <a class="cursor mx-3" id="kyc_btn">KYC</a> <a class="cursor mx-3" id="security_btn">Security</a>
                                </div>
                            </div>

                        </div>
                       
                    </div>


                    <div id="profile">

                    
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card" style="box-shadow: 0px 0.298734px 1.19494px rgba(0, 0, 0, 0.25);">
                                   

                                       <form id="profile_form">
                                            @csrf

                                            <div id="user_profile">
                                                 
                                            </div>

                                        

                                            <div class="form-group">
                                                <button id="profile_submit_btn" class="ml-4 btn btn-primary px-5 mt-3" style="background: #2A8BF2; border: 1px solid #2A8BF2; box-sizing: border-box;border-radius: 30px;">Save</button>
                                            </div>

                                        </form>
                                        <hr>

                                        
                                        <div id="personalinfobox"></div>
                                           
                                
                                    </div>
                                </div>
                            </div>
                           
                        </div>

                    </div>

                    <div id="kyc" style="display: none; width:100%;">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="card" style="box-shadow: 0px 0.298734px 1.19494px rgba(0, 0, 0, 0.25);">
                                    <div class="card-body">
                                       
                                        <h3 class="text-dark mt-5" style="font-weight: 600;
                                        font-size: 22px;
                                        line-height: 19px;
                                        letter-spacing: 0.005em;">Verify your account</h3>

                                        <h4 class="text-dark mt-5 mb-3" style="font-style: normal;
                                        font-weight: 600;
                                        font-size: 18px;
                                        line-height: 16px;
                                        
                                        color: #0F2744;">Take a picture</h4>

                                        <div id="my_camera"></div>

                                        <form>
                                            <input type=button value="Take Snapshot" onClick="take_snapshot()">
                                        </form>

                                        <div id="results">Your captured image will appear here...</div>

                                        <span>
                                            <svg width="198" height="115" viewBox="0 0 198 115" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <g filter="url(#filter0_d)">
                                                <rect x="2" y="1" width="194" height="111" rx="3" fill="white"/>
                                                </g>
                                                <path d="M85 49H92L95 45H103L106 49H113V67H85V49Z" stroke="#C4C4C4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M99 62C101.761 62 104 59.7614 104 57C104 54.2386 101.761 52 99 52C96.2386 52 94 54.2386 94 57C94 59.7614 96.2386 62 99 62Z" stroke="#C4C4C4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                <defs>
                                                <filter id="filter0_d" x="0" y="0" width="198" height="115" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                                <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                                                <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                                                <feOffset dy="1"/>
                                                <feGaussianBlur stdDeviation="1"/>
                                                <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0"/>
                                                <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow"/>
                                                <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow" result="shape"/>
                                                </filter>
                                                </defs>
                                                </svg>
                                                
                                        </span>

                                   
                                        <div class="row mt-3">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="amount">Upload a Valid ID image(Intl. passport, drivers license, voters card)</label>
                                                     {{-- <form id="kyc_form"></form> --}}
                                                    <div class="input-group mb-3">
                                                        
                                                            
                                                        <label for="browse1"><button class="btn bg-white form-control">rrrr</button></label>
                                                      
                                                      <div class="input-group-append">
                                                        <label for="browse1"> <span class="input-group-text bg-white cursor text-primary" style="color:#979797"> Upload</span> 
                                                        </label>
                                                      </div>
                                                    </div>
                                                     
                                                  </div>

                                           
                                                
                                                  <input type="file" name="browsePhoto" id="browse1" accept="image/*" style="display:none;">   
                                                       

                                                  <div class="form-group mt-3">
                                                    <label for="amount">State of residence</label>
                                                    <input type="text" class="form-control" name="state" id="state" placeholder="for example: lagos state">
                                                </div>
        
                                                <div class="form-group mt-3">
                                                    <label for="amount">Residential Address(optional)</label>
                                                    <input type="text" class="form-control" name="address" id="address2" placeholder="Enter your residential address">
                                                </div>
        
                                                <button class="btn btn-primary px-5 mt-3" style="background: #2A8BF2; border: 1px solid #2A8BF2; box-sizing: border-box;border-radius: 30px;">Save</button>
                                            </div>
                                        </div>

                                    
                                        
                                    </div>
                                </div>
                            </div>
                           
                        </div>

                    </div>


                    <div id="security" style="display: none; width:100%;">

                    
                        <div class="row w-100">
                            <div class="col-md-6">
                                <div class="card" style="box-shadow: 0px 0.298734px 1.19494px rgba(0, 0, 0, 0.25);">
                                    <div class="card-body">
                                       
                                        <h3 class="text-dark mt-5" style="font-weight: 600;
                                        font-size: 22px;
                                        line-height: 19px;
                                        letter-spacing: 0.005em;">Change password</h3>

                                        <form id="security_form">
                                            @csrf
                                        <div class="row mt-3">
                                            <div class="col-lg-6">
                                               
                                                  <div class="form-group mt-3">
                                                    <label for="amount">Old password</label>
                                                    <input type="password" name="old_password" id="old_password" class="form-control" placeholder="Enter your old password">
                                                </div>
        
                                                <div class="form-group">
                                                    <label for="amount">New password</label>
                                                    <input type="password" name="new_password" id="new_password" class="form-control" placeholder="Enter your new password">
                                                </div>

                                                <div class="form-group mt-3">
                                                    <button id="password_change_submit_btn" class="btn btn-primary px-5 mt-3" style="background: #2A8BF2; border: 1px solid #2A8BF2; box-sizing: border-box;border-radius: 30px;">Save</button>
                                                </div>
        
                                                
                                            </div>
                                        </div>

                                    </form>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card" style="box-shadow: 0px 0.298734px 1.19494px rgba(0, 0, 0, 0.25);">
                                    <div class="card-body">
                                       
                                        <h3 class="text-dark mt-5" style="font-weight: 600;
                                        font-size: 22px;
                                        line-height: 19px;
                                        letter-spacing: 0.005em;">Dashboard Settings</h3>

                                    

                                       <div id="loadaccountbalance">

                                       </div>
                                           
                                       

                                        <h3 class="text-dark mt-5" style="font-weight: 600;
                                        font-size: 22px;
                                        line-height: 19px;
                                        letter-spacing: 0.005em;">Notification </h3>

    
                                            <div id="loadshownotifications">

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

