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
                                            <h4 style="font-size: 25px; text-align: center; color: #231F20;">WHO ARE YOU?</h4>
                                           
                                        </div>
                                    </div>
                                    
                                    <div class="row mt-5 mx-auto text-center" style="margin-bottom: 8rem;">
                                    
                                        <div class="text-center mx-auto">
                                            <a href="{{ url('/dashboard/kyc/2/local')}}" class="btn btn-primary mr-3" style="padding: 3rem 6rem;">Local User</a>
                                            <a href="{{ url('/dashboard/kyc/2/foreign')}}" class="btn btn-outline-primary mx-3" style="padding: 3rem 6rem;">Foreign User</a>
                                           
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




