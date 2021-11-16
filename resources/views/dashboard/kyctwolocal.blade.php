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
                                            <p style="font-style: normal; font-weight: 600; font-size: 20px; line-height: 23.57px; text-align: center; color: #231F20;">Verify your phone number</p>
                                            <p style="font-size: 18px; line-height: 22px; text-align: center; color: #979797;">So that we can help you with a better experience</p>
                                        </div>
                                    </div>

                                    <form action="{{ url('verify/phone/local')}}" method="post">
                                        @csrf
                                        <div class="row mt-5">
                                            <div class="col-lg-4 mx-auto text-center">
                                                {{-- <input type="tel" id="demo" name="phone" placeholder="" id="telephone"> --}}
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                       
                                                        <span class="input-group-text bg-white">(+234)</span>
                                                    
                                                    </div>
                                                    <input type="number" name="phone" class="form-control" placeholder="Enter phone number" required>
                                                  </div>
                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="col text-center">
                                                <button href="javascript:void" class="btn btn-primary px-5 mt-5" style="background: #2A8BF2; border: 1px solid #2A8BF2; box-sizing: border-box;border-radius: 30px;">Verify</button>
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




