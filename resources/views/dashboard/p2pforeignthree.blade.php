@php use \App\Http\Controllers\UserController; @endphp
@extends('layouts.master')

@section('content')

<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                  

                    <div>

                        @if( Session::has("success_body") )
                        <div class="alert alert-success alert-block text-center bg-success text-white" role="alert">
                            <button class="close" data-dismiss="alert"></button>
                            {{ Session::get("success_body") }}
                        </div>
                        @endif
            
                        @if( Session::has("error_body") )
                        <div class="alert alert-danger alert-block text-center bg-danger" role="alert">
                            <button class="close" data-dismiss="alert"></button>
                            {{ Session::get("error_body") }}
                        </div>
                        @endif


                        <div class="row mb-3">
                            <div class="col-lg-2 pt-2">
                               <span class="mt-3">NAIRA - DOLLAR</span>  
                            </div>
                            <div class="col-lg-4">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text bg-white "><i class="fa fa-search"></i></span>
                                    </div>
                                    <input type="text" class="form-control border border-left-0" placeholder="Search">
                                  </div>
                            </div>
                            <div class="col">
                                <div class="row">
                                    <div class="col-md-6 pt-3 text-right" id="fu_rate_label_box">
                                        @if(!is_null($fu_rate))
                                            <span class="mr-5 text-muted" id="fu_rate_label">Your rate: <span class="font-weight-bold">₦{{round($fu_rate->rate, 0)}}<span></span>
                                        @endif
                                    </div>
                                    <div class="col-md-6">
                                        <a href="javascript:void" class="btn px-5 text-primary ml-5" style="background: #fff; border: 1px solid #2A8BF2; box-sizing: border-box;border-radius: 30px;"  data-toggle="modal" data-target="#myModalforeignrate" data-backdrop="static">Update your rate</a>
                                    </div>
                                </div>
                                
                             </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card" style="box-shadow: 0px 0.298734px 1.19494px rgba(0, 0, 0, 0.25);">
                                    <div class="card-body table-responsive">
                                       
                                        <table class="table table-borderless datatable">
                                            <thead>
                                              <tr>
                                                <th>Helpas</th>
                                                <th>Dollar Rate</th>
                                                <th>Amount Needed</th>
                                                <th>Item</th>
                                                <th>Trade</th>
                                              </tr>
                                             
                                            </thead>
                                            
                                            <tbody>


                                             @foreach ($transaction_offers_lu as $offer)
                                                    
                                                <tr>
                                                    <td width="30%">
                                                        <div class="row">
                                                            <div class="col">
                                                                {{-- <img src="https://payhelpa.s3.eu-west-3.amazonaws.com/uploads/photos/{{UserController::GetUserSnapShot($offer->user_id)}}" alt="" width="50%" class="rounded-circle"> --}}
                                                                @if(empty($user->profile_image))
          											                <span class='fa fa-user-circle' style="font-size: 2rem;"></span>
                                                                @else
                                                                    <img src='https://payhelpa.s3.eu-west-3.amazonaws.com/uploads/profile_pictures/{{$user->profile_image}}' class='rounded-circle' width='30px' height='30px'>
                                                                @endif
                                                            </div>
                                                            <div class="col">
                                                                <p class="my-0">{{ ucfirst(UserController::GetUserName($offer->lu_id))}}</p>
                                                                
                                                            </div>
                                                        </div>
                                                        
        
                                                    </td>
                                                    <td>₦ {{$offer->rate}}</td>
                                                    <td>${{$offer->max_amount}}</td>
                                                    <td>{{$offer->description}}</td>
                                                    {{-- <td class="text-danger">{{$offer->rating}}</td> --}}
                                                
                                                    <td><a href="javascript:void" class="btn text-white fu_trade" style="background: #0ECB81; border: 1px solid #0ECB81; box-sizing: border-box; border-radius: 30px;" data-transaction_id="{{$offer->transaction_id}}" data-value="{{$offer->amount * $offer->rate}}">Trade</a></td>
                                                </tr>

                                              @endforeach
                                            
                                             
                                              
                                            </tbody>
                                          </table>
                                        
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


<!-- The Modal 1 -->
<div class="modal" id="myModalforeignrate">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
  
        <!-- Modal Header -->
        <div class="modal-header border-0 pt-1 pb-0">
          <button type="button" class="close" data-dismiss="modal"><i class="fa fa-times text-danger" style="font-weight:100"></i></button>
        </div>
  
        <!-- Modal body -->
        <div class="modal-body">
            <div class="row">
                <div class="col text-center">
                    <h3 class="text-center text-dark mt-0">Update your rate</h3>
                    
                </div>
            </div>

              <form action="{{ url('add/foreign/user/rate')}}" method="POST">
                    @csrf
              
                    <div class="form-group">
                        <label for="amount"><strong> Your Dollar rate (in Naira)</strong></label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                            <span class="input-group-text bg-white border border-right-0" style="padding: .6rem .1rem; padding-left: .7rem">₦</span>
                            </div>
                            <input type="number" step="0.01" name="rate" class="form-control border border-left-0" min="1" value="{{$fu_rate->rate}}" style="padding: .6rem .05rem;" required>
                        </div>
                    </div>
                   
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-6">
                                <label for="amount"><strong>Min. Amount <br> (least you can trade with)</strong></label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                    <span class="input-group-text bg-white border border-right-0" style="padding: .6rem .1rem; padding-left: .7rem">$</span>
                                    </div>
                                    {{-- <input type="number" step="0.01" name="min_amount" class="form-control border border-left-0" min="1" value="{{$user->min_amount}}" style="padding: .6rem .05rem;" required> --}}
                                    <select name="min_amount" class="form-control" required>
                                        <option value="">Select one</option>
                                        <option value="0.00" <?php if($fu_rate->min_amount == 0.00){ echo "selected"; } ?>>0</option>
                                        <option value="500.00" <?php if($fu_rate->min_amount == 500.00){ echo "selected"; } ?>>500</option>
                                        <option value="1000.00" <?php if($fu_rate->min_amount == 1000.00){ echo "selected"; } ?>>1000</option>
                                        <option value="1500.00" <?php if($fu_rate->min_amount == 1500.00){ echo "selected"; } ?>>1500</option>
                                        <option value="2000.00" <?php if($fu_rate->min_amount == 2000.00){ echo "selected"; } ?>>2000</option>
                                        <option value="2500.00" <?php if($fu_rate->min_amount == 2500.00){ echo "selected"; } ?>>2500</option>
                                        <option value="3000.00" <?php if($fu_rate->min_amount == 3000.00){ echo "selected"; } ?>>3000</option>
                                        <option value="3500.00" <?php if($fu_rate->min_amount == 3500.00){ echo "selected"; } ?>>3500</option>
                                        <option value="4000.00" <?php if($fu_rate->min_amount == 4000.00){ echo "selected"; } ?>>4000</option>
                                        <option value="4500.00" <?php if($fu_rate->min_amount == 4500.00){ echo "selected"; } ?>>4500</option>
                                        <option value="5000.00" <?php if($fu_rate->min_amount == 5000.00){ echo "selected"; } ?>>5000</option>
                                        <option value="5500.00" <?php if($fu_rate->min_amount == 5500.00){ echo "selected"; } ?>>5500</option>
                                        <option value="6000.00" <?php if($fu_rate->min_amount == 6000.00){ echo "selected"; } ?>>6000</option>
                                        <option value="6500.00" <?php if($fu_rate->min_amount == 6500.00){ echo "selected"; } ?>>6500</option>
                                        <option value="7000.00" <?php if($fu_rate->min_amount == 7000.00){ echo "selected"; } ?>>7000</option>
                                        <option value="7500.00" <?php if($fu_rate->min_amount == 7500.00){ echo "selected"; } ?>>7500</option>
                                        <option value="8000.00" <?php if($fu_rate->min_amount == 8000.00){ echo "selected"; } ?>>8000</option>
                                        <option value="8500.00" <?php if($fu_rate->min_amount == 8500.00){ echo "selected"; } ?>>8500</option>
                                        <option value="9000.00" <?php if($fu_rate->min_amount == 9000.00){ echo "selected"; } ?>>9000</option>
                                        <option value="9500.00" <?php if($fu_rate->min_amount == 9500.00){ echo "selected"; } ?>>9500</option>

                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <label for="amount"><strong> Max. Amount <br> (the best you can go)</strong></label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                            <span class="input-group-text bg-white border border-right-0" style="padding: .6rem .1rem; padding-left: .7rem">$</span>
                            </div>
                            {{-- <input type="number" step="0.01" name="max_amount" class="form-control border border-left-0" min="1" value="{{$user->max_amount}}" style="padding: .6rem .05rem;" required> --}}
                            <select name="max_amount" class="form-control" required>
                                <option value="">Select one</option>
                                <option value="500.00" <?php if($fu_rate->max_amount == 500.00){ echo "selected"; } ?>>500</option>
                                <option value="1000.00" <?php if($fu_rate->max_amount == 1000.00){ echo "selected"; } ?>>1000</option>
                                <option value="1500.00" <?php if($fu_rate->max_amount == 1500.00){ echo "selected"; } ?>>1500</option>
                                <option value="2000.00" <?php if($fu_rate->max_amount == 2000.00){ echo "selected"; } ?>>2000</option>
                                <option value="2500.00" <?php if($fu_rate->max_amount == 2500.00){ echo "selected"; } ?>>2500</option>
                                <option value="3000.00" <?php if($fu_rate->max_amount == 3000.00){ echo "selected"; } ?>>3000</option>
                                <option value="3500.00" <?php if($fu_rate->max_amount == 3500.00){ echo "selected"; } ?>>3500</option>
                                <option value="4000.00" <?php if($fu_rate->max_amount == 4000.00){ echo "selected"; } ?>>4000</option>
                                <option value="4500.00" <?php if($fu_rate->max_amount == 4500.00){ echo "selected"; } ?>>4500</option>
                                <option value="5000.00" <?php if($fu_rate->max_amount == 5000.00){ echo "selected"; } ?>>5000</option>
                                <option value="5500.00" <?php if($fu_rate->max_amount == 5500.00){ echo "selected"; } ?>>5500</option>
                                <option value="6000.00" <?php if($fu_rate->max_amount == 6000.00){ echo "selected"; } ?>>6000</option>
                                <option value="6500.00" <?php if($fu_rate->max_amount == 6500.00){ echo "selected"; } ?>>6500</option>
                                <option value="7000.00" <?php if($fu_rate->max_amount == 7000.00){ echo "selected"; } ?>>7000</option>
                                <option value="7500.00" <?php if($fu_rate->max_amount == 7500.00){ echo "selected"; } ?>>7500</option>
                                <option value="8000.00" <?php if($fu_rate->max_amount == 8000.00){ echo "selected"; } ?>>8000</option>
                                <option value="8500.00" <?php if($fu_rate->max_amount == 8500.00){ echo "selected"; } ?>>8500</option>
                                <option value="9000.00" <?php if($fu_rate->max_amount == 9000.00){ echo "selected"; } ?>>9000</option>
                                <option value="9500.00" <?php if($fu_rate->max_amount == 9500.00){ echo "selected"; } ?>>9500</option>
                                <option value="10000.00" <?php if($fu_rate->max_amount == 10000.00){ echo "selected"; } ?>>10000</option>

                            </select>
                        </div>
                            </div>
                        </div>
                    </div>
               
                <div class="row mt-3">
                    <div class="col text-center">
                        <button id="update_foreign_rate" class="btn btn-primary px-5" style="background: #2A8BF2; border: 1px solid #2A8BF2; box-sizing: border-box;border-radius: 30px;">Update </button>
                    </div>
                </div>

                </form>
            
        </div>

      </div>
    </div>
  </div>


<!-- The Modal 1 -->
<div class="modal" id="myModalaccepttrade">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
  
        <!-- Modal Header -->
        <div class="modal-header border-0">
          <button type="button" class="close" data-dismiss="modal"><i class="fa fa-times text-danger" style="font-weight:100"></i></button>
        </div>
  
        <!-- Modal body -->
        <div class="modal-body p-5">

            <div class="row">
                <div class="col text-center">
                    <h4 class=" text-dark">Your virtual account will be credited with <span class="offer_id_fu_trade_value"></span> upon acceptance of this transaction.</h4>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col text-center">
                    <p>By clicking on "I agree", you accept all our <a href="/terms" target="_blank">terms</a>  and <a href="/privacy" target="_blank">privacy</a> policies.</p>
                </div>
            </div>
        
            <form action="{{ url('fu/trade/transaction')}}" method="post">
                @csrf
                <div class="row">
                    <div class="col text-center">
                        <input type="hidden" name="transaction_id" id="transaction_id_fu_trade" required>
                        <button class="btn btn-primary px-5" style="background: #2A8BF2; border: 1px solid #2A8BF2; box-sizing: border-box;border-radius: 30px;">I Agree</button>
                    </div>
                </div>
            </form>
            
        </div>

      </div>
    </div>
  </div>


  
  



