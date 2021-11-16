@extends('layouts.master')

@section('content')

<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                   

                    <div class="row">
                        <div class="col">
                            <div class="card" style="box-shadow: 0px 0.298734px 1.19494px rgba(0, 0, 0, 0.25);">
                                <div class="card-body">
                                   

                                    <div class="row" style="margin-top: 5rem;">
                                        <div class="col text-center">
                                            <p style="font-style: normal; font-weight: 600; font-size: 20px; line-height: 23.57px; text-align: center; color: #231F20;">OTP has been sent to your phone number</p>
                                            
                                        </div>
                                    </div>

                                   

                                        <div class="row mt-5">
                                            <div class="col text-right">
                                                <span class="font-weight-bold" style="margin-right: 2rem">Enter OTP</span>
                                            </div>
                                            <div class="col pr-5">
                                                <span class="text-left">
                                                    <form action="{{ route('verifyphonelocal') }}" method="post">
                                                        @csrf
                                                        
                                                        <input type="hidden" name="phone" value="{{ Session::get('phone')}}">
                                                         <button id="otp_phone_resend_link" style="pointer-events: none; color:gray; border:none; background:white;">
                                                            Resend code 
                                                         </button> 
                                                         <span id="count" class="text-danger">60 </span> 

                                                        <span class="text-danger" id="secs_box">secs</span> 
                                                    </form>
                                                   
                                                </span> 

                                                

                                            </div>
                                        </div>

                                    <form action="{{ url('verify/phone/otp')}}" method="post" class="digit-group">
                                        @csrf
                                        <div class="row mt-2">
                                             <div class="col"> 
                                                 <input type="hidden" name="phone" value="{{ Session::get('phone')}}"> 
                                                <div class="digit-group text-center">
                                                 <input class="otp_box" type="text" id="digit-1" name="digit1" data-next="digit-2" style="width: 40px; height: 40px; text-align: center; font-size: 24px;"/>
                                                <input class="otp_box" type="text" id="digit-2" name="digit2" data-next="digit-3" data-previous="digit-1" style="width: 40px; height: 40px; text-align: center; font-size: 24px;"/>
                                                <input class="otp_box" type="text" id="digit-3" name="digit3" data-next="digit-4" data-previous="digit-2" style="width: 40px; height: 40px; text-align: center; font-size: 24px;"/>
                                                
                                                <input class="otp_box" type="text" id="digit-4" name="digit4" data-next="digit-5" data-previous="digit-3" style="width: 40px; height: 40px; text-align: center; font-size: 24px;"/>
                                                <input class="otp_box" type="text" id="digit-5" name="digit5" data-next="digit-6" data-previous="digit-4" style="width: 40px; height: 40px; text-align: center; font-size: 24px;"/>
                                                <input class="otp_box" type="text" id="digit-6" name="digit6" data-previous="digit-5" style="width: 40px; height: 40px; text-align: center; font-size: 24px;"/>
                                              </div>
                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="col text-center">
                                                <button id="otp_submit_btn" href="javascript:void" class="btn btn-primary px-5 mt-5" style="background: #2A8BF2; border: 1px solid #2A8BF2; box-sizing: border-box;border-radius: 30px;" disabled>Verify</button>
                                            </div>
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




