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
                                    <a class="cursor mx-3" href="{{ route('profile')}}">Profile</a>  <a class="cursor mx-3" href="{{ route('kyc')}}">KYC</a> <a class="cursor mx-3 text-dark" href="{{ route('security')}}" style="text-decoration: underline;">Security</a>
                                </div>
                            </div>

                        </div>
                       
                    </div>

            </div>


                    <div id="security" style="width:100%;">

                    
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
                                               
                                                {{-- <div class="form-group mt-3">
                                                    <label for="amount">Old password</label>
                                                    <input type="password" name="old_password" id="old_password" class="form-control" placeholder="Enter your old password">
                                                </div> --}}

                                                <label for="pwd" class="text-right" style="font-style: normal; font-weight: 400; font-size: 20px; line-height: 24.2px; text-align: center; color: #303030;">Old Password</label>
                                                <div class="input-group mb-3">
                                                  <input id="password" type="password" class="form-control border border-right-0" name="old_password" id="old_password" required autocomplete="current-password">
                                                  <div class="input-group-append">
                                                    <span class="input-group-text bg-white border border-left-0"> <i class="fa fa-eye form-control-feedback cursor"></i></span>
                                                  </div>
                                                </div>
        
                                                {{-- <div class="form-group">
                                                    <label for="amount">New password</label>
                                                    <input type="password" name="new_password" id="new_password" class="form-control" placeholder="Enter your new password">
                                                </div> --}}

                                                <div class="input-group mb-3">
                                                    <input type="password" name="new_password" id="new_password" class="form-control" placeholder="Enter your new password">
                                                    <div class="input-group-append">
                                                        <span class="input-group-textx bg-white border border-left-0"> <i class="fa fa-eye form-control-feedback cursor"></i></span>
                                                    </div>
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