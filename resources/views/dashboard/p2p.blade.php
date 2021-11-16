@extends('layouts.master')

@section('content')

<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                  

                    <div>

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
                            <div class="col text-right">
                                <a href="javascript:void" class="btn btn-primary px-5" style="background: #2A8BF2; border: 1px solid #2A8BF2; box-sizing: border-box;border-radius: 30px;"  data-toggle="modal" data-target="#myModal2a" data-backdrop="static">Create your own rate</a>
                             </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card" style="box-shadow: 0px 0.298734px 1.19494px rgba(0, 0, 0, 0.25);">
                                    <div class="card-body">
                                       
                                        <table class="table table-borderless">
                                            <thead>
                                              <tr>
                                                <th>Helpas</th>
                                                <th>Dollar Rate</th>
                                                <th>Limit</th>
                                                <th>Rating</th>
                                                <th>Trade</th>
                                              </tr>
                                             
                                            </thead>
                                            
                                            <tbody>


                                                @foreach ($fu_offers as $offer)
                                                    
                                               
                                              <tr>
                                                <td width="30%">
                                                    <div class="row">
                                                        <div class="col">
                                                            <img src="https://images.pexels.com/photos/762020/pexels-photo-762020.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" alt="" width="50%" class="rounded-circle">
                                                        </div>
                                                        <div class="col">
                                                            <p class="my-0">Daniel Obeng</p>
                                                            <small class="text-muted">93.9% completion</small>
                                                        </div>
                                                    </div>
                                                    
    
                                                </td>
                                                <td>{{$offer->dollar_rate}}</td>
                                                <td>{{$offer->limit_range}}</td>
                                                <td class="text-danger">{{$offer->rating}}</td>
                                               
                                                <td><a href="javascript:void" class="btn text-white connect_lu" style="background: #0ECB81; border: 1px solid #0ECB81; box-sizing: border-box; border-radius: 30px;" data-offer_id="{{$offer->offer_id}}" data-dollar_rate="{{$offer->dollar_rate}}">Connect</a></td>
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
<div class="modal" id="myModal2a">
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
                    <h3 class="text-center text-dark mt-0">Input your own rate</h3>
                    
                </div>
            </div>

            <div class="alert alert-error bg-danger" id="input_rate_error" style="display: none;">
                <strong>Sorry!</strong> Some fields are still empty
              </div>
                <div class="form-group">
                    <label for="amount"><strong> Dollar rate in Naira</strong></label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                        <span class="input-group-text bg-white border border-right-0"  style="padding: .6rem .16rem; padding-left: .7rem">₦</span>
                        </div>
                        <input type="number" min="0.01" name="rate" id="rate_input_rate" class="form-control input_rate_continuex border border-left-0" placeholder="Example: ₦389" style="padding: .6rem .05rem;">
                    </div>
                </div>
                <div class="form-group">
                    <label for="amount">Total amount of Dollar you need help with?</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                        <span class="input-group-text bg-white border border-right-0" style="padding: .6rem .1rem; padding-left: .7rem">$</span>
                        </div>
                        <input type="number" min="0.01" name="dollar_amount" id="dollar_amount_input_rate" class="form-control input_rate_continuex border border-left-0" value="1" min="1" placeholder="Example: $2000" style="padding: .6rem .05rem;">
                    </div>
                </div>
                <div class="form-group">
                    <label for="amount">Total amount in Naira</label>
                    <input type="text" name="naira_amount" id="naira_value_input_rate" class="form-control" placeholder="N778,000.00" readonly>
                    
                </div>
                <div class="row mt-5">
                    <div class="col text-center">
                        <button id="continue_btn" class="btn btn-primary px-5" style="background: #2A8BF2; border: 1px solid #2A8BF2; box-sizing: border-box;border-radius: 30px;">Continue </button>
                    </div>
                </div>
            
        </div>

      </div>
    </div>
  </div>


<!-- The Modal 1 -->
<div class="modal" id="myModal1a">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
  
        <!-- Modal Header -->
        <div class="modal-header border-0">
          <button type="button" class="close" data-dismiss="modal"><i class="fa fa-times text-danger" style="font-weight:100"></i></button>
        </div>
  
        <!-- Modal body -->
        <div class="modal-body p-5">

            <div class="alert alert-error bg-danger" id="input_rate_error_connect_lu" style="display: none;">
                <strong>Sorry!</strong> Sorry! input field cannot be empty
              </div>
            <div class="row">
                <div class="col text-center">
                    <h3 class=" text-muted">Nice to have you here</h3>
                </div>
            </div>
           
            <form id="lu_connect_form">
                
                <div class="form-group">
                    <label for="amount">How much dollar do you need help with?</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                        <span class="input-group-text bg-white border border-right-0" style="padding: .6rem .1rem; padding-left: .7rem">$</span>
                        </div>
                        <input type="number" step="0.01" name="amount" id="amount_connect_lu" class="form-control input_rate_continue border border-left-0" min="1" placeholder="e.g $1000" style="padding: .6rem .05rem;" required>
                    </div>
                    <small class="text-muted">Dollar Rate: ₦<span class="dollar_rate_connect_lu"></span> </small>
                    <input type="hidden" name="offer_id" id="offer_id">
                    <input type="hidden" name="dollar_rate" id="dollar_rate_connect_lu_hidden">
                    
                </div>
                <div class="row mt-5">
                    <div class="col text-center">
                        <button id="buy_now_btn" class="btn btn-primary px-5" style="background: #2A8BF2; border: 1px solid #2A8BF2; box-sizing: border-box;border-radius: 30px;">Buy Now</button>
                    </div>
                </div>
            </form>
            
        </div>

      </div>
    </div>
  </div>


  
  <!-- The Modal 3 -->
<div class="modal" id="myModal2c">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">


        <div class="modal-header border border-0">
            <h4 class="modal-title"><i class="fa fa-angle-left fa-lg cursor" id="back_pay_now"></i></h4>
            {{-- <button type="button" class="close" data-dismiss="modal">&times;</button> --}}
            <svg width="29" height="28" viewBox="0 0 29 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M20 6H4C2.897 6 2 6.897 2 8V20C2 21.103 2.897 22 4 22H7V25.767L13.277 22H20C21.103 22 22 21.103 22 20V8C22 6.897 21.103 6 20 6ZM20 20H12.723L9 22.233V20H4V8H20V20Z" fill="#231F20"/>
                <path d="M7 11H17V13H7V11ZM7 15H14V17H7V15Z" fill="#231F20"/>
                <circle cx="22" cy="7" r="7" fill="#FF8979"/>
            </svg>
            

                 
                
        </div>

        <div class="container">
            <div class="row">
                <div class="col">
                    <h4 style="color:#2A8BF2;">Releasing</h4>

                    <p>Transaction start when money has been released</p>
                </div>
            </div>
        </div>

    
        <div style="border-bottom: 1px solid #dee2e6;"></div>
  
        <!-- Modal body -->
        <div class="modal-body">
            <h4><span class="text-success">Buy</span>  dollar</h4>

            <div class="row mt-4">
                <div class="col">
                    <h4>Current Dollar Rate</h4>
                </div>
                <div class="col text-right">
                    <h4 class="text-dark"> <span class="dollar_rate_releasing_lu"></span></h4>
                </div>
            </div>

            <div class="row mt-2">
                <div class="col">
                    <h4>Quantity</h4>
                </div>
                <div class="col text-right">
                    <h4 class="text-dark"> <span class="amount_releasing_lu"></span></h4>
                </div>
            </div>

            <div class="row mt-2">
                <div class="col">
                    <h4>Amount needed</h4>
                </div>
                <div class="col text-right">
                    <h4 class="text-dark"> <span class="value_releasing_lu"></span></h4>
                </div>
            </div>

       
           
            <div class="row mt-5 mb-4">
                <div class="col text-center">

                    <button class="btn btn-outline-light mx-2 close2c" style="border: 1px solid #3E7BFA52; box-sizing: border-box;border-radius: 30px; color: #3E7BFA52; padding-left: 3.5rem; padding-right: 3.5rem;">Cancel</button>
                    <a id="pay_now_btn" href="javascript:void" class="btn px-5 mx-2" style="background: #2A8BF2; border: 1px solid #2A8BF2; box-sizing: border-box;border-radius: 30px; color: #fff;">Pay Now</a>
                </div>
            </div>
            
        </div>

  
      </div>
    </div>
  </div>

  <!-- The Modal 4 -->
<div class="modal" id="myModal2d">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">


        <div class="modal-header bg-primary text-white">
            <div class="row w-100">
                <div class="col-lg-1">
                    <i class="fa fa-angle-left fa-lg cursor" id="back_pay_with"></i>
                </div>
                <div class="col text-center">
                    <h3>Pay With</h3>
                </div>
            </div>
         
        </div>
        <!-- Modal body -->
        <div class="modal-body">
            
            <div class="row mt-3">
                <div class="col">
                    <a href="javascript:void" id="bank_transfer_lu" class="btn btn-sm pl-5" style="border: 1px solid lightgray;">
                        <p class="text-left py-0 my-0">Bank Transfer</p>
                        <small class="text-left text-muted">Fund your PayHelpa wallet By transferring funds in Naira via local bank</small>
                    </a>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col">
                    <a href="javascript:void" id="card_pay_lu" class="btn btn-sm pl-5" style="border: 1px solid lightgray;">
                        <p class="text-left py-0 my-0">Card Payment</p>
                        <small class="text-left text-muted">Fund your payHelpa wallet using verve, naira mastercard or visa debit card</small>
                    </a>
                </div>
            </div>
       
            <div class="row mt-3 mb-4">
                <div class="col">
                    <a href="javascript:void" class="btn btn-sm pl-5" style="border: 1px solid lightgray;">
                        <p class="text-left py-0 my-0">Pay via Wallet</p>
                        <small class="text-left text-muted">Fund your payHelpa wallet using verve, naira mastercard or visa debit card</small>
                    </a>
                </div>
            </div>

           
            
        </div>

  
      </div>
    </div>
  </div>


<!-- The Modal 2b -->
<div class="modal" id="myModal2b">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">


        <div class="modal-header border-0">
            <i class="fa fa-angle-left fa-lg cursor" id="continue_back_lu"></i>
            <button type="button" class="close cursor close2b"><i class="fa fa-times text-danger" style="font-weight:100"></i></button>
           
          </div>

  
        <!-- Modal body -->
        <div class="modal-body p-5">
            <div class="row">
                <div class="col text-center">
                    <h4 class=" text-dark">For your rate to be considered, you have to transfer money to your virtual account</h4>
                    
                </div>
            </div>
           
            <div class="row mt-5">
                <div class="col text-center">
                    <a href="javascript:void" class="btn btn-outline-light close2b" style="border: 1px solid #3E7BFA52; box-sizing: border-box;border-radius: 30px; color: #3E7BFA52; padding-left: 3.5rem; padding-right: 3.5rem;">Cancel</a>
                    <a id="continue_btn2" href="javascript:void" class="btn px-5" style="background: #2A8BF2; border: 1px solid #2A8BF2; box-sizing: border-box;border-radius: 30px; color: #fff;">Continue</a>
                </div>
            </div>
            
        </div>

  
      </div>
    </div>
</div>


       <!-- The Modal 1b -->
<div class="modal" id="myModal1b">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
  
        <!-- Modal Header -->
        <div class="modal-header border-0">
            <i class="fa fa-angle-left fa-lg cursor" id="buy_now_continue_back"></i>
          <button type="button" class="close" data-dismiss="modal"><i class="fa fa-times text-danger" style="font-weight:100"></i></button>
        </div>
  
        <!-- Modal body -->
        <div class="modal-body p-5">
            <div class="row">
                <div class="col text-center">
                    <h4 class=" text-dark">By clicking on continue you have just <span class="text-danger"> 30 minutes </span> to transfer MONEY TO PayHelpa VIRTUAL ACCOUNT.</h4>
                    
                </div>
            </div>
           
            <div class="row mt-5">
                <div class="col text-center">
                    <a href="javascript:void" class="btn btn-outline-light closemodal1b" style="border: 1px solid #3E7BFA52; box-sizing: border-box;border-radius: 30px; color: #3E7BFA52; padding-left: 3.5rem; padding-right: 3.5rem;">Cancel</a>
                    <a id="buy_now_continue_btn" href="javascript:void" class="btn px-5" style="background: #2A8BF2; border: 1px solid #2A8BF2; box-sizing: border-box;border-radius: 30px; color: #fff;">Continue</a>
                </div>
            </div>
            
        </div>

  
      </div>
    </div>
  </div>


   <!-- The Modal 3 -->
<div class="modal" id="myModal1c">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">


        <div class="modal-header border border-0">
            <h4 class="modal-title"><i class="fa fa-angle-left fa-lg cursor" id="myModal1c_back"></i></h4>
            {{-- <button type="button" class="close" data-dismiss="modal">&times;</button> --}}
            <svg width="29" height="28" viewBox="0 0 29 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M20 6H4C2.897 6 2 6.897 2 8V20C2 21.103 2.897 22 4 22H7V25.767L13.277 22H20C21.103 22 22 21.103 22 20V8C22 6.897 21.103 6 20 6ZM20 20H12.723L9 22.233V20H4V8H20V20Z" fill="#231F20"/>
                <path d="M7 11H17V13H7V11ZM7 15H14V17H7V15Z" fill="#231F20"/>
                <circle cx="22" cy="7" r="7" fill="#FF8979"/>
            </svg>
            

                 
                
        </div>

        <div class="container">
            <div class="row">
                <div class="col">
                    <h4 style="color:#2A8BF2;">Releasing</h4>

                    <p>Transaction start when money has been released</p>
                </div>
            </div>
        </div>

    
        <div style="border-bottom: 1px solid #dee2e6;"></div>
  
        <!-- Modal body -->
        <div class="modal-body">
            <h4><span class="text-success">Buy</span>  dollar</h4>

            <div class="row mt-4">
                <div class="col">
                    <h4>Current Dollar Rate</h4>
                </div>
                <div class="col text-right">
                    <h4 class="text-dark"> <span class="dollar_rate_connect_lu"></span></h4>
                </div>
            </div>

            <div class="row mt-2">
                <div class="col">
                    <h4>Quantity</h4>
                </div>
                <div class="col text-right">
                    <h4 class="text-dark"><span class="amount_connect_lu"></span></h4>
                </div>
            </div>

            <div class="row mt-2">
                <div class="col">
                    <h4>Amount needed</h4>
                </div>
                <div class="col text-right">
                    <h4 class="text-dark"><span class="value_connect_lu"></span></h4>
                </div>
            </div>

       
           
            <div class="row mt-5 mb-4">
                <div class="col text-center">
                    <a href="javascript:void" class="btn btn-outline-light mx-2 closemodal1c" style="border: 1px solid #3E7BFA52; box-sizing: border-box;border-radius: 30px; color: #3E7BFA52; padding-left: 3.5rem; padding-right: 3.5rem;">Cancel</a>
                    <a id="pay_now_btn1" href="javascript:void" class="btn px-5 mx-2" style="background: #2A8BF2; border: 1px solid #2A8BF2; box-sizing: border-box;border-radius: 30px; color: #fff;">Pay Now</a>
                </div>
            </div>
            
        </div>

  
      </div>
    </div>
  </div>


   <!-- The Modal 4 -->
<div class="modal" id="myModal1d">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">


        <div class="modal-header bg-primary text-white">
            <div class="row w-100">
                <div class="col-lg-1">
                    <i class="fa fa-angle-left fa-lg cursor" id="pay_with_connect_lu_back"></i>
                </div>
                <div class="col text-center">
                    <h3>Pay With</h3>
                </div>
            </div>
         
        </div>
        <!-- Modal body -->
        <div class="modal-body">
            
            <div class="row mt-3">
                <div class="col">
                    <a href="javascript:void" id="bank_transfer_connect_lu" class="btn btn-sm pl-5" style="border: 1px solid lightgray;">
                        <p class="text-left py-0 my-0">Bank Transfer</p>
                        <small class="text-left text-muted">Fund your PayHelpa wallet By transferring funds in Naira via local bank</small>
                    </a>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col">
                    <a href="javascript:void" id="card_pay_connect_lu" class="btn btn-sm pl-5" style="border: 1px solid lightgray;">
                        <p class="text-left py-0 my-0">Card Payment</p>
                        <small class="text-left text-muted">Fund your payHelpa wallet using verve, naira mastercard or visa debit card</small>
                    </a>
                </div>
            </div>
       
            <div class="row mt-3 mb-4">
                <div class="col">
                    <a href="javascript:void{{-- route('cardpayment.pay')--}}" class="btn btn-sm pl-5" style="border: 1px solid lightgray;">
                        <p class="text-left py-0 my-0">Pay via Wallet</p>
                        <small class="text-left text-muted">Fund your payHelpa wallet using verve, naira mastercard or visa debit card</small>
                    </a>
                </div>
            </div>

           
            
        </div>

  
      </div>
    </div>
  </div>


      <!-- The Modal 3 -->
<div class="modal" id="myModal1e">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">


        <div class="modal-header border border-0">
            <h4 class="modal-title"><i class="fa fa-angle-left fa-lg cursor" id="made_transfer_back_connect_lu"></i></h4>
            {{-- <button type="button" class="close" data-dismiss="modal">&times;</button> --}}
            <svg width="29" height="28" viewBox="0 0 29 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M20 6H4C2.897 6 2 6.897 2 8V20C2 21.103 2.897 22 4 22H7V25.767L13.277 22H20C21.103 22 22 21.103 22 20V8C22 6.897 21.103 6 20 6ZM20 20H12.723L9 22.233V20H4V8H20V20Z" fill="#231F20"/>
                <path d="M7 11H17V13H7V11ZM7 15H14V17H7V15Z" fill="#231F20"/>
                <circle cx="22" cy="7" r="7" fill="#FF8979"/>
            </svg>
            

                 
                
        </div>

        <div class="container">
            <div class="row">
                <div class="col">
                    <h4 style="color:#2A8BF2;">Releasing</h4>

                    <p>Transaction start when money has been released</p>
                </div>
                <div class="col-lg-2">
                    <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="24" cy="24" r="23.5" stroke="#FFB74F" stroke-dasharray="4 4"/>
                        <text x="50%" y="50%" text-anchor="middle" stroke="#ff8c00" font-size="12"  dy=".1em" id="count4">30</text>
                    </svg>
                </div>
            </div>
        </div>

    
        <div style="border-bottom: 1px solid #dee2e6;"></div>
  
        <!-- Modal body -->
        <div class="modal-body">
            <h4><span class="text-success">Buy</span>  dollar</h4>

            <div class="row mt-4">
                <div class="col">
                    <h4>Account Number</h4>
                </div>
                <div class="col text-right">
                   
                        <h4 class="text-right text-dark">
                            <span id="account_number_box1">7894456332</span>
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg" onclick="copyToClipboard('.account_number_box')">
                            <path d="M5 5.10625V13.125C4.99988 13.9184 5.30154 14.6821 5.8438 15.2613C6.38606 15.8405 7.12831 16.1917 7.92 16.2437L8.125 16.25H13.6425C13.5133 16.6155 13.2739 16.932 12.9574 17.1559C12.6408 17.3797 12.2627 17.4999 11.875 17.5H7.5C6.50544 17.5 5.55161 17.1049 4.84835 16.4017C4.14509 15.6984 3.75 14.7446 3.75 13.75V6.875C3.7498 6.48709 3.86991 6.10867 4.09379 5.79189C4.31766 5.4751 4.63428 5.23555 5 5.10625ZM14.375 2.5C14.8723 2.5 15.3492 2.69754 15.7008 3.04917C16.0525 3.40081 16.25 3.87772 16.25 4.375V13.125C16.25 13.6223 16.0525 14.0992 15.7008 14.4508C15.3492 14.8025 14.8723 15 14.375 15H8.125C7.62772 15 7.15081 14.8025 6.79917 14.4508C6.44754 14.0992 6.25 13.6223 6.25 13.125V4.375C6.25 3.87772 6.44754 3.40081 6.79917 3.04917C7.15081 2.69754 7.62772 2.5 8.125 2.5H14.375ZM14.375 3.75H8.125C7.95924 3.75 7.80027 3.81585 7.68306 3.93306C7.56585 4.05027 7.5 4.20924 7.5 4.375V13.125C7.5 13.2908 7.56585 13.4497 7.68306 13.5669C7.80027 13.6842 7.95924 13.75 8.125 13.75H14.375C14.5408 13.75 14.6997 13.6842 14.8169 13.5669C14.9342 13.4497 15 13.2908 15 13.125V4.375C15 4.20924 14.9342 4.05027 14.8169 3.93306C14.6997 3.81585 14.5408 3.75 14.375 3.75Z" fill="#2A8BF2"/>
                            </svg>
                            
                        </h4>
                </div>
            </div>

            <div class="row mt-2">
                <div class="col">
                    <h4>Account Name</h4>
                </div>
                <div class="col text-right">
                    <h4 class="text-dark">Payhelpa/Payhelp-NGN</h4>
                </div>
            </div>

            <div class="row mt-2">
                <div class="col">
                    <h4>Current Dollar Rate</h4>
                </div>
                <div class="col text-right">
                    <h4 class="text-dark"> <span class="dollar_rate_connect_lu"></span></h4>
                </div>
            </div>

            <div class="row mt-2">
                <div class="col">
                    <h4>Quantity</h4>
                </div>
                <div class="col text-right">
                    <h4 class="text-dark"> <span class="amount_connect_lu"></span></h4>
                </div>
            </div>

            <div class="row mt-2">
                <div class="col">
                    <h4>Amount needed</h4>
                </div>
                <div class="col text-right">
                    <h4 class="text-dark"> <span class="value_connect_lu"></span></h4>
                </div>
            </div>

       
           
            <div class="row mt-5 mb-4">
                <div class="col-lg-4 text-center">
                    <a href="javascript:void" class="btn btn-outline-light mx-2 closemodal1e" style="border: 1px solid #3E7BFA52; box-sizing: border-box;border-radius: 30px; color: #3E7BFA52; padding-left: 3.5rem; padding-right: 3.5rem;">Cancel</a>
                </div>
                <div class="col-lg-8">
                    <form id="made_transfer_connect_lu_form">
                        <input type="hidden" name="transaction_id" class="transaction_id_connect_lu">
                        <button  class="btn px-5 mx-2" style="background: #2A8BF2; border: 1px solid #2A8BF2; box-sizing: border-box;border-radius: 30px; color: #fff;">I have made the transfer</button>
                     </form>
                </div>
            </div>
            
        </div>

  
      </div>
    </div>
  </div>



         <!-- The Modal 3 -->
<div class="modal" id="myModal1f">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">


        <div class="modal-header border border-0">
            <h4 class="modal-title"><i class="fa fa-angle-left fa-lg cursor" id="confirm_back_connect_lu"></i></h4>
            {{-- <button type="button" class="close" data-dismiss="modal">&times;</button> --}}
            <svg width="29" height="28" viewBox="0 0 29 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M20 6H4C2.897 6 2 6.897 2 8V20C2 21.103 2.897 22 4 22H7V25.767L13.277 22H20C21.103 22 22 21.103 22 20V8C22 6.897 21.103 6 20 6ZM20 20H12.723L9 22.233V20H4V8H20V20Z" fill="#231F20"/>
                <path d="M7 11H17V13H7V11ZM7 15H14V17H7V15Z" fill="#231F20"/>
                <circle cx="22" cy="7" r="7" fill="#FF8979"/>
            </svg>
          
        </div>

        <div class="container">
            <div class="row">
                <div class="col-lg-10">
                    <h4 style="color:#2A8BF2;">Releasing</h4>

                    <p>Transaction start when money has been released</p>
                </div>
                <div class="col-lg-2">
                    <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="24" cy="24" r="23.5" stroke="#00C305" stroke-dasharray="4 4"/>
                        <text x="50%" y="50%" text-anchor="middle" stroke="#0ECB81" font-size="12"  dy=".1em" fill="#0ECB81" id="count5" >60</text>
                    </svg>
                        
                </div>
            </div>
        </div>

    
        <div style="border-bottom: 1px solid #dee2e6;"></div>
  
        <!-- Modal body -->
        <div class="modal-body">
            <h4><span class="text-success">Buy</span>  dollar</h4>

            <div class="row mt-4">
                <div class="col">
                    <h4>Account Number</h4>
                </div>
                <div class="col text-right">
                   
                        <h4 class="text-right text-dark">
                            <span id="account_number_box2">7894456332</span>
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg" onclick="copyToClipboard('#account_number_box2')">
                            <path d="M5 5.10625V13.125C4.99988 13.9184 5.30154 14.6821 5.8438 15.2613C6.38606 15.8405 7.12831 16.1917 7.92 16.2437L8.125 16.25H13.6425C13.5133 16.6155 13.2739 16.932 12.9574 17.1559C12.6408 17.3797 12.2627 17.4999 11.875 17.5H7.5C6.50544 17.5 5.55161 17.1049 4.84835 16.4017C4.14509 15.6984 3.75 14.7446 3.75 13.75V6.875C3.7498 6.48709 3.86991 6.10867 4.09379 5.79189C4.31766 5.4751 4.63428 5.23555 5 5.10625ZM14.375 2.5C14.8723 2.5 15.3492 2.69754 15.7008 3.04917C16.0525 3.40081 16.25 3.87772 16.25 4.375V13.125C16.25 13.6223 16.0525 14.0992 15.7008 14.4508C15.3492 14.8025 14.8723 15 14.375 15H8.125C7.62772 15 7.15081 14.8025 6.79917 14.4508C6.44754 14.0992 6.25 13.6223 6.25 13.125V4.375C6.25 3.87772 6.44754 3.40081 6.79917 3.04917C7.15081 2.69754 7.62772 2.5 8.125 2.5H14.375ZM14.375 3.75H8.125C7.95924 3.75 7.80027 3.81585 7.68306 3.93306C7.56585 4.05027 7.5 4.20924 7.5 4.375V13.125C7.5 13.2908 7.56585 13.4497 7.68306 13.5669C7.80027 13.6842 7.95924 13.75 8.125 13.75H14.375C14.5408 13.75 14.6997 13.6842 14.8169 13.5669C14.9342 13.4497 15 13.2908 15 13.125V4.375C15 4.20924 14.9342 4.05027 14.8169 3.93306C14.6997 3.81585 14.5408 3.75 14.375 3.75Z" fill="#2A8BF2"/>
                            </svg>
                            
                        </h4>
                </div>
            </div>

            <div class="row mt-2">
                <div class="col">
                    <h4>Account Name</h4>
                </div>
                <div class="col text-right">
                    <h4 class="text-dark">Payhelpa/Payhelp-NGN</h4>
                </div>
            </div>

            <div class="row mt-2">
                <div class="col">
                    <h4>Current Dollar Rate</h4>
                </div>
                <div class="col text-right">
                    <h4 class="text-dark"><span class="dollar_rate_connect_lu"></span></h4>
                </div>
            </div>

            <div class="row mt-2">
                <div class="col">
                    <h4>Quantity</h4>
                </div>
                <div class="col text-right">
                    <h4 class="text-dark"> <span class="amount_connect_lu"></span></h4>
                </div>
            </div>

            <div class="row mt-2">
                <div class="col">
                    <h4>Amount needed</h4>
                </div>
                <div class="col text-right">
                    <h4 class="text-dark"> <span class="value_connect_lu"></span></h4>
                </div>
            </div>

       
           
            <div class="row mt-5 mb-4">
                <div class="col text-center">
                    <a  href="javascript:void" class="btn btn-primary px-5 mx-2 disabled" style="border: 1px solid #2A8BF2; box-sizing: border-box;border-radius: 30px; color: #fff; opacity: 0.1;">Confirming Transfer...</a>
                </div>
            </div>


            <div class="row">
                <div class="col">
                    <svg width="168" height="31" viewBox="0 0 168 31" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0 0H164C166.209 0 168 1.79086 168 4V27C168 29.2091 166.209 31 164 31H0V0Z" fill="#332F67"/>
                        <path d="M52.5753 15.1293C52.2273 12.9517 50.522 11.679 48.3693 11.679C45.7344 11.679 43.7905 13.6527 43.7905 16.9091C43.7905 20.1655 45.7244 22.1392 48.3693 22.1392C50.6065 22.1392 52.2422 20.7372 52.5753 18.7237L51.0241 18.7188C50.7607 20.0213 49.6669 20.7372 48.3793 20.7372C46.6342 20.7372 45.3168 19.3999 45.3168 16.9091C45.3168 14.4382 46.6293 13.081 48.3842 13.081C49.6818 13.081 50.7706 13.8118 51.0241 15.1293H52.5753ZM59.1316 18.8331C59.1365 20.1307 58.1721 20.7472 57.3368 20.7472C56.4171 20.7472 55.7807 20.081 55.7807 19.0419V14.3636H54.2942V19.2209C54.2942 21.1151 55.3333 22.0994 56.7999 22.0994C57.9483 22.0994 58.7289 21.4929 59.0819 20.6776H59.1614V22H60.623V14.3636H59.1316V18.8331ZM68.3427 16.228C68.0344 15.0398 67.1048 14.2642 65.4542 14.2642C63.729 14.2642 62.506 15.174 62.506 16.5263C62.506 17.6101 63.1623 18.331 64.5941 18.6491L65.8867 18.9325C66.6225 19.0966 66.9656 19.4247 66.9656 19.902C66.9656 20.4936 66.3342 20.956 65.3597 20.956C64.4698 20.956 63.8981 20.5732 63.7191 19.8224L62.2823 20.0412C62.5309 21.3935 63.6545 22.1541 65.3697 22.1541C67.2141 22.1541 68.4918 21.1747 68.4918 19.7926C68.4918 18.7138 67.8058 18.0476 66.4038 17.7244L65.1907 17.446C64.3505 17.2472 63.9876 16.9638 63.9925 16.4467C63.9876 15.8601 64.6239 15.4425 65.4691 15.4425C66.3938 15.4425 66.8214 15.9545 66.9954 16.4666L68.3427 16.228ZM73.6909 14.3636H72.1248V12.5341H70.6383V14.3636H69.5197V15.5568H70.6383V20.0661C70.6333 21.4531 71.6923 22.1243 72.8656 22.0994C73.3379 22.0945 73.6561 22.005 73.8301 21.9403L73.5616 20.7124C73.4622 20.7322 73.2782 20.777 73.0396 20.777C72.5574 20.777 72.1248 20.6179 72.1248 19.7578V15.5568H73.6909V14.3636ZM78.4698 22.1541C80.6225 22.1541 82.0295 20.5781 82.0295 18.2166C82.0295 15.8402 80.6225 14.2642 78.4698 14.2642C76.3171 14.2642 74.9102 15.8402 74.9102 18.2166C74.9102 20.5781 76.3171 22.1541 78.4698 22.1541ZM78.4748 20.9062C77.0678 20.9062 76.4116 19.6783 76.4116 18.2116C76.4116 16.75 77.0678 15.5071 78.4748 15.5071C79.8718 15.5071 80.5281 16.75 80.5281 18.2116C80.5281 19.6783 79.8718 20.9062 78.4748 20.9062ZM83.6887 22H85.1752V17.2919C85.1752 16.2628 85.8961 15.5469 86.7413 15.5469C87.5666 15.5469 88.1383 16.0938 88.1383 16.924V22H89.6199V17.1328C89.6199 16.2131 90.1816 15.5469 91.1511 15.5469C91.9366 15.5469 92.5829 15.9844 92.5829 17.0185V22H94.0694V16.8793C94.0694 15.1342 93.095 14.2642 91.7129 14.2642C90.6142 14.2642 89.7889 14.7912 89.421 15.6065H89.3414C89.0083 14.7713 88.3074 14.2642 87.2882 14.2642C86.2789 14.2642 85.5282 14.7663 85.21 15.6065H85.1156V14.3636H83.6887V22ZM99.353 22.1541C101.018 22.1541 102.197 21.3338 102.535 20.0909L101.128 19.8374C100.859 20.5582 100.213 20.9261 99.3679 20.9261C98.0952 20.9261 97.2401 20.1009 97.2003 18.6293H102.629V18.1023C102.629 15.343 100.979 14.2642 99.2486 14.2642C97.1207 14.2642 95.7188 15.8849 95.7188 18.2315C95.7188 20.603 97.1009 22.1541 99.353 22.1541ZM97.2053 17.5156C97.2649 16.4318 98.0504 15.4922 99.2585 15.4922C100.412 15.4922 101.168 16.3473 101.173 17.5156H97.2053ZM104.279 22H105.765V17.3366C105.765 16.3374 106.536 15.6165 107.59 15.6165C107.898 15.6165 108.246 15.6712 108.365 15.706V14.2841C108.216 14.2642 107.923 14.2493 107.734 14.2493C106.839 14.2493 106.073 14.7564 105.795 15.5767H105.715V14.3636H104.279V22ZM121.933 15.1293C121.585 12.9517 119.879 11.679 117.727 11.679C115.092 11.679 113.148 13.6527 113.148 16.9091C113.148 20.1655 115.082 22.1392 117.727 22.1392C119.964 22.1392 121.6 20.7372 121.933 18.7237L120.382 18.7188C120.118 20.0213 119.024 20.7372 117.737 20.7372C115.992 20.7372 114.674 19.3999 114.674 16.9091C114.674 14.4382 115.987 13.081 117.742 13.081C119.039 13.081 120.128 13.8118 120.382 15.1293H121.933ZM125.874 22.169C127.137 22.169 127.848 21.5277 128.131 20.956H128.191V22H129.642V16.929C129.642 14.7067 127.892 14.2642 126.679 14.2642C125.297 14.2642 124.025 14.821 123.527 16.2131L124.924 16.5312C125.143 15.9893 125.7 15.4673 126.699 15.4673C127.659 15.4673 128.151 15.9695 128.151 16.8345V16.8693C128.151 17.4112 127.594 17.4013 126.222 17.5604C124.775 17.7294 123.294 18.1072 123.294 19.8423C123.294 21.3438 124.422 22.169 125.874 22.169ZM126.197 20.9759C125.357 20.9759 124.75 20.598 124.75 19.8622C124.75 19.0668 125.456 18.7834 126.316 18.669C126.799 18.6044 127.942 18.4751 128.156 18.2614V19.2457C128.156 20.1506 127.435 20.9759 126.197 20.9759ZM131.622 22H133.109V17.3366C133.109 16.3374 133.879 15.6165 134.933 15.6165C135.242 15.6165 135.59 15.6712 135.709 15.706V14.2841C135.56 14.2642 135.267 14.2493 135.078 14.2493C134.183 14.2493 133.417 14.7564 133.139 15.5767H133.059V14.3636H131.622V22ZM140.013 22.1541C141.679 22.1541 142.857 21.3338 143.195 20.0909L141.788 19.8374C141.52 20.5582 140.873 20.9261 140.028 20.9261C138.755 20.9261 137.9 20.1009 137.86 18.6293H143.289V18.1023C143.289 15.343 141.639 14.2642 139.909 14.2642C137.781 14.2642 136.379 15.8849 136.379 18.2315C136.379 20.603 137.761 22.1541 140.013 22.1541ZM137.865 17.5156C137.925 16.4318 138.711 15.4922 139.919 15.4922C141.072 15.4922 141.828 16.3473 141.833 17.5156H137.865Z" fill="#FAFAFC"/>
                        <path d="M34 22C34 22 35 22 35 21C35 20 34 17 30 17C26 17 25 20 25 21C25 22 26 22 26 22H34ZM26.022 21C26.0146 20.999 26.0073 20.9976 26 20.996C26.001 20.732 26.167 19.966 26.76 19.276C27.312 18.629 28.282 18 30 18C31.717 18 32.687 18.63 33.24 19.276C33.833 19.966 33.998 20.733 34 20.996L33.992 20.998C33.9874 20.9988 33.9827 20.9995 33.978 21H26.022ZM30 15C30.5304 15 31.0391 14.7893 31.4142 14.4142C31.7893 14.0391 32 13.5304 32 13C32 12.4696 31.7893 11.9609 31.4142 11.5858C31.0391 11.2107 30.5304 11 30 11C29.4696 11 28.9609 11.2107 28.5858 11.5858C28.2107 11.9609 28 12.4696 28 13C28 13.5304 28.2107 14.0391 28.5858 14.4142C28.9609 14.7893 29.4696 15 30 15ZM33 13C33 13.394 32.9224 13.7841 32.7716 14.1481C32.6209 14.512 32.3999 14.8427 32.1213 15.1213C31.8427 15.3999 31.512 15.6209 31.1481 15.7716C30.7841 15.9224 30.394 16 30 16C29.606 16 29.2159 15.9224 28.8519 15.7716C28.488 15.6209 28.1573 15.3999 27.8787 15.1213C27.6001 14.8427 27.3791 14.512 27.2284 14.1481C27.0776 13.7841 27 13.394 27 13C27 12.2044 27.3161 11.4413 27.8787 10.8787C28.4413 10.3161 29.2044 10 30 10C30.7956 10 31.5587 10.3161 32.1213 10.8787C32.6839 11.4413 33 12.2044 33 13ZM25.936 17.28C25.536 17.154 25.1236 17.0712 24.706 17.033C24.4713 17.0107 24.2357 16.9997 24 17C20 17 19 20 19 21C19 21.667 19.333 22 20 22H24.216C24.0678 21.6878 23.9938 21.3455 24 21C24 19.99 24.377 18.958 25.09 18.096C25.333 17.802 25.616 17.527 25.936 17.28ZM23.92 18C23.3282 18.8893 23.0084 19.9318 23 21H20C20 20.74 20.164 19.97 20.76 19.276C21.305 18.64 22.252 18.02 23.92 18.001V18ZM20.5 13.5C20.5 12.7044 20.8161 11.9413 21.3787 11.3787C21.9413 10.8161 22.7044 10.5 23.5 10.5C24.2956 10.5 25.0587 10.8161 25.6213 11.3787C26.1839 11.9413 26.5 12.7044 26.5 13.5C26.5 14.2956 26.1839 15.0587 25.6213 15.6213C25.0587 16.1839 24.2956 16.5 23.5 16.5C22.7044 16.5 21.9413 16.1839 21.3787 15.6213C20.8161 15.0587 20.5 14.2956 20.5 13.5ZM23.5 11.5C22.9696 11.5 22.4609 11.7107 22.0858 12.0858C21.7107 12.4609 21.5 12.9696 21.5 13.5C21.5 14.0304 21.7107 14.5391 22.0858 14.9142C22.4609 15.2893 22.9696 15.5 23.5 15.5C24.0304 15.5 24.5391 15.2893 24.9142 14.9142C25.2893 14.5391 25.5 14.0304 25.5 13.5C25.5 12.9696 25.2893 12.4609 24.9142 12.0858C24.5391 11.7107 24.0304 11.5 23.5 11.5Z" fill="white"/>
                        </svg>
                        
                        
                </div>
            </div>
            
        </div>

  
      </div>
    </div>
  </div>


  <!-- The Modal -->
 <div class="modal" id="myModal1g">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
  
        <!-- Modal body -->
        <div class="modal-body">


            <div class="row">
                <div class="col">
                    <div stryle="position:absolute; top:-5rem; left:5rem" class="text-center">
                    <svg width="384" height="248" viewBox="0 0 384 248" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect width="384" height="247.437" rx="27.0423" fill="url(#paint0_linear)"/>
                        <path d="M349.472 54.084C360.3 54.084 369.126 45.3062 369.126 34.4784C369.126 23.6505 360.3 14.8727 349.472 14.8727L349.472 54.084Z" fill="white"/>
                        <path d="M349.473 24.8062C354.754 24.8062 359.035 29.1365 359.035 34.4783C359.035 39.82 354.754 44.1504 349.473 44.1504L349.473 24.8062Z" fill="#EDEDED"/>
                        <path d="M349.474 24.8062C343.9 24.8062 339.381 29.1365 339.381 34.4783C339.381 39.82 343.9 44.1504 349.474 44.1504L349.474 24.8062Z" fill="white" fill-opacity="0.51"/>
                        <path d="M283.406 32.8408H283.287V37.8598H281.903V30.3096H283.85L285.57 35.3287H285.689V30.3096H287.073V37.8598H285.126L283.406 32.8408Z" fill="white"/>
                        <path d="M290.974 37.9896C290.541 37.9896 290.152 37.9247 289.806 37.7949C289.459 37.6579 289.164 37.4632 288.919 37.2108C288.681 36.9584 288.497 36.6519 288.367 36.2914C288.237 35.9308 288.172 35.5234 288.172 35.0691C288.172 34.6148 288.237 34.2073 288.367 33.8468C288.497 33.4862 288.681 33.1797 288.919 32.9273C289.164 32.6749 289.459 32.4838 289.806 32.354C290.152 32.217 290.541 32.1485 290.974 32.1485C291.406 32.1485 291.796 32.217 292.142 32.354C292.488 32.4838 292.78 32.6749 293.018 32.9273C293.263 33.1797 293.451 33.4862 293.581 33.8468C293.71 34.2073 293.775 34.6148 293.775 35.0691C293.775 35.5234 293.71 35.9308 293.581 36.2914C293.451 36.6519 293.263 36.9584 293.018 37.2108C292.78 37.4632 292.488 37.6579 292.142 37.7949C291.796 37.9247 291.406 37.9896 290.974 37.9896ZM290.974 36.7998C291.334 36.7998 291.616 36.688 291.817 36.4644C292.019 36.2409 292.12 35.9236 292.12 35.5126V34.6256C292.12 34.2145 292.019 33.8972 291.817 33.6737C291.616 33.4501 291.334 33.3384 290.974 33.3384C290.613 33.3384 290.332 33.4501 290.13 33.6737C289.928 33.8972 289.827 34.2145 289.827 34.6256V35.5126C289.827 35.9236 289.928 36.2409 290.13 36.4644C290.332 36.688 290.613 36.7998 290.974 36.7998Z" fill="white"/>
                        <path d="M294.539 37.8598V32.2783H295.826V33.1004H295.902C295.989 32.8408 296.111 32.6172 296.27 32.4297C296.436 32.2422 296.666 32.1485 296.962 32.1485C297.503 32.1485 297.835 32.4658 297.957 33.1004H298.022C298.065 32.9706 298.119 32.848 298.184 32.7326C298.249 32.6172 298.329 32.5163 298.422 32.4297C298.516 32.3432 298.628 32.2747 298.758 32.2242C298.887 32.1737 299.039 32.1485 299.212 32.1485C299.991 32.1485 300.38 32.7218 300.38 33.8684V37.8598H299.093V34.0306C299.093 33.771 299.046 33.5908 298.952 33.4898C298.866 33.3816 298.75 33.3275 298.606 33.3275C298.469 33.3275 298.35 33.3744 298.249 33.4682C298.156 33.5547 298.109 33.6917 298.109 33.8792V37.8598H296.811V34.0306C296.811 33.771 296.767 33.5908 296.681 33.4898C296.602 33.3816 296.49 33.3275 296.346 33.3275C296.201 33.3275 296.079 33.3744 295.978 33.4682C295.877 33.5547 295.826 33.6917 295.826 33.8792V37.8598H294.539Z" fill="white"/>
                        <path d="M304.292 31.5644C303.931 31.5644 303.679 31.4923 303.535 31.348C303.398 31.1966 303.329 31.0163 303.329 30.8072V30.4935C303.329 30.2772 303.398 30.0969 303.535 29.9527C303.679 29.8084 303.931 29.7363 304.292 29.7363C304.652 29.7363 304.901 29.8084 305.038 29.9527C305.182 30.0969 305.254 30.2772 305.254 30.4935V30.8072C305.254 31.0163 305.182 31.1966 305.038 31.348C304.901 31.4923 304.652 31.5644 304.292 31.5644ZM301.717 36.6159H303.491V33.5222H301.717V32.2783H305.092V36.6159H306.736V37.8598H301.717V36.6159Z" fill="white"/>
                        <path d="M308.019 30.3096H310.669C311.412 30.3096 311.978 30.4899 312.368 30.8505C312.764 31.211 312.963 31.7014 312.963 32.3216C312.963 32.7542 312.854 33.1004 312.638 33.36C312.429 33.6124 312.126 33.7963 311.73 33.9117V33.9766C312.198 34.0919 312.559 34.2938 312.811 34.5823C313.071 34.8708 313.201 35.271 313.201 35.783C313.201 36.4176 312.999 36.9224 312.595 37.2973C312.198 37.6723 311.639 37.8598 310.918 37.8598H308.019V30.3096ZM310.421 36.724C310.81 36.724 311.095 36.6591 311.275 36.5293C311.455 36.3995 311.546 36.1616 311.546 35.8154V35.5017C311.546 35.1556 311.455 34.9176 311.275 34.7878C311.095 34.658 310.81 34.5931 310.421 34.5931H309.599V36.724H310.421ZM310.215 33.5114C310.597 33.5114 310.875 33.4501 311.048 33.3275C311.221 33.1977 311.308 32.967 311.308 32.6353V32.3108C311.308 31.979 311.221 31.7519 311.048 31.6293C310.875 31.5067 310.597 31.4454 310.215 31.4454H309.599V33.5114H310.215Z" fill="white"/>
                        <path d="M318.94 37.8598C318.608 37.8598 318.342 37.7769 318.14 37.611C317.938 37.438 317.819 37.1928 317.783 36.8755H317.729C317.628 37.2433 317.426 37.5209 317.123 37.7084C316.827 37.8959 316.463 37.9896 316.03 37.9896C315.49 37.9896 315.053 37.8454 314.722 37.5569C314.397 37.2613 314.235 36.8502 314.235 36.3238C314.235 35.7397 314.448 35.307 314.873 35.0258C315.298 34.7446 315.922 34.6039 316.744 34.6039H317.642V34.3227C317.642 33.991 317.563 33.7422 317.404 33.5763C317.253 33.4033 316.993 33.3167 316.625 33.3167C316.286 33.3167 316.012 33.3816 315.803 33.5114C315.594 33.6412 315.414 33.8107 315.262 34.0198L314.386 33.241C314.574 32.9237 314.866 32.6641 315.262 32.4622C315.666 32.2531 316.182 32.1485 316.809 32.1485C317.574 32.1485 318.169 32.3252 318.594 32.6785C319.027 33.0247 319.243 33.5511 319.243 34.2578V36.7024H319.86V37.8598H318.94ZM316.636 36.9404C316.917 36.9404 317.155 36.8719 317.35 36.7349C317.545 36.5978 317.642 36.3995 317.642 36.1399V35.4693H316.788C316.131 35.4693 315.803 35.6892 315.803 36.1291V36.3455C315.803 36.5402 315.879 36.688 316.03 36.7889C316.182 36.8899 316.384 36.9404 316.636 36.9404Z" fill="white"/>
                        <path d="M320.861 37.8598V32.2783H322.462V33.2951H322.527C322.592 33.1364 322.671 32.9886 322.765 32.8516C322.859 32.7146 322.971 32.5956 323.1 32.4946C323.237 32.3865 323.393 32.3035 323.566 32.2458C323.746 32.1809 323.948 32.1485 324.171 32.1485C324.438 32.1485 324.683 32.1954 324.907 32.2891C325.13 32.3757 325.322 32.5091 325.48 32.6893C325.639 32.8696 325.761 33.0896 325.848 33.3492C325.942 33.6088 325.989 33.908 325.989 34.247V37.8598H324.388V34.4633C324.388 33.7422 324.074 33.3816 323.447 33.3816C323.324 33.3816 323.201 33.3997 323.079 33.4357C322.963 33.4646 322.859 33.515 322.765 33.5871C322.671 33.652 322.596 33.735 322.538 33.8359C322.487 33.9369 322.462 34.0559 322.462 34.1929V37.8598H320.861Z" fill="white"/>
                        <path d="M327.347 29.8553H328.948V34.3984H329.024L329.77 33.5222L330.938 32.2783H332.777L330.614 34.4849L333.005 37.8598H331.101L329.478 35.3936L328.948 35.9236V37.8598H327.347V29.8553Z" fill="white"/>
                        <path d="M316.994 207.647H309.433V206.252L313.213 202.845C313.765 202.347 314.219 201.839 314.576 201.32C314.933 200.79 315.112 200.232 315.112 199.648V199.454C315.112 198.772 314.933 198.248 314.576 197.88C314.219 197.501 313.689 197.312 312.986 197.312C312.294 197.312 311.758 197.49 311.38 197.847C311.012 198.193 310.736 198.659 310.552 199.243L309.335 198.788C309.444 198.453 309.59 198.129 309.773 197.815C309.968 197.49 310.212 197.204 310.504 196.955C310.796 196.706 311.147 196.506 311.558 196.355C311.98 196.203 312.467 196.127 313.019 196.127C313.581 196.127 314.079 196.209 314.511 196.371C314.955 196.533 315.323 196.76 315.615 197.052C315.917 197.344 316.145 197.691 316.296 198.091C316.458 198.491 316.539 198.929 316.539 199.405C316.539 199.838 316.475 200.243 316.345 200.622C316.226 201 316.053 201.363 315.826 201.709C315.609 202.055 315.344 202.396 315.031 202.731C314.728 203.056 314.387 203.38 314.008 203.705L310.844 206.463H316.994V207.647ZM326.723 207.647H319.162V206.252L322.942 202.845C323.494 202.347 323.948 201.839 324.305 201.32C324.662 200.79 324.841 200.232 324.841 199.648V199.454C324.841 198.772 324.662 198.248 324.305 197.88C323.948 197.501 323.418 197.312 322.715 197.312C322.023 197.312 321.487 197.49 321.109 197.847C320.741 198.193 320.465 198.659 320.281 199.243L319.064 198.788C319.172 198.453 319.318 198.129 319.502 197.815C319.697 197.49 319.94 197.204 320.233 196.955C320.525 196.706 320.876 196.506 321.287 196.355C321.709 196.203 322.196 196.127 322.747 196.127C323.31 196.127 323.807 196.209 324.24 196.371C324.684 196.533 325.051 196.76 325.343 197.052C325.646 197.344 325.874 197.691 326.025 198.091C326.187 198.491 326.268 198.929 326.268 199.405C326.268 199.838 326.203 200.243 326.074 200.622C325.955 201 325.782 201.363 325.554 201.709C325.338 202.055 325.073 202.396 324.759 202.731C324.457 203.056 324.116 203.38 323.737 203.705L320.573 206.463H326.723V207.647ZM329.199 209.887L334.845 195.316H336.013L330.367 209.887H329.199ZM342.335 207.842C341.643 207.842 341.048 207.712 340.55 207.453C340.053 207.182 339.642 206.798 339.317 206.301C338.993 205.803 338.755 205.192 338.603 204.467C338.452 203.743 338.376 202.915 338.376 201.985C338.376 201.065 338.452 200.243 338.603 199.519C338.755 198.783 338.993 198.166 339.317 197.669C339.642 197.171 340.053 196.793 340.55 196.533C341.048 196.263 341.643 196.127 342.335 196.127C343.027 196.127 343.622 196.263 344.12 196.533C344.617 196.793 345.028 197.171 345.353 197.669C345.677 198.166 345.915 198.783 346.067 199.519C346.218 200.243 346.294 201.065 346.294 201.985C346.294 202.915 346.218 203.743 346.067 204.467C345.915 205.192 345.677 205.803 345.353 206.301C345.028 206.798 344.617 207.182 344.12 207.453C343.622 207.712 343.027 207.842 342.335 207.842ZM342.335 206.658C342.789 206.658 343.179 206.571 343.503 206.398C343.828 206.214 344.087 205.96 344.282 205.636C344.488 205.311 344.639 204.922 344.736 204.467C344.834 204.002 344.882 203.483 344.882 202.91V201.06C344.882 200.497 344.834 199.984 344.736 199.519C344.639 199.053 344.488 198.659 344.282 198.334C344.087 198.01 343.828 197.761 343.503 197.588C343.179 197.404 342.789 197.312 342.335 197.312C341.881 197.312 341.491 197.404 341.167 197.588C340.842 197.761 340.577 198.01 340.372 198.334C340.177 198.659 340.031 199.053 339.934 199.519C339.836 199.984 339.788 200.497 339.788 201.06V202.91C339.788 203.483 339.836 204.002 339.934 204.467C340.031 204.922 340.177 205.311 340.372 205.636C340.577 205.96 340.842 206.214 341.167 206.398C341.491 206.571 341.881 206.658 342.335 206.658ZM342.335 202.942C341.956 202.942 341.691 202.866 341.54 202.715C341.399 202.564 341.329 202.38 341.329 202.163V201.806C341.329 201.59 341.399 201.406 341.54 201.255C341.691 201.103 341.956 201.028 342.335 201.028C342.714 201.028 342.973 201.103 343.114 201.255C343.265 201.406 343.341 201.59 343.341 201.806V202.163C343.341 202.38 343.265 202.564 343.114 202.715C342.973 202.866 342.714 202.942 342.335 202.942ZM348.575 207.647V206.463H351.82V197.328H351.707L348.851 199.989L348.056 199.129L351.058 196.322H353.183V206.463H356.169V207.647H348.575Z" fill="white"/>
                        <path d="M33.2292 206.49C32.2124 206.49 31.3795 206.306 30.7305 205.938C30.0815 205.559 29.546 205.078 29.1242 204.494L30.1139 203.683C30.5574 204.234 31.0225 204.645 31.5093 204.916C32.0069 205.186 32.5964 205.321 33.2779 205.321C34.1 205.321 34.7273 205.132 35.16 204.754C35.5927 204.375 35.809 203.845 35.809 203.163C35.809 202.612 35.6522 202.184 35.3385 201.882C35.0248 201.568 34.4786 201.346 33.6997 201.216L32.4342 201.005C31.8825 200.908 31.4174 200.762 31.0388 200.567C30.671 200.373 30.3735 200.14 30.1464 199.87C29.9192 199.588 29.757 199.286 29.6596 198.961C29.5623 198.626 29.5136 198.28 29.5136 197.923C29.5136 196.884 29.8543 196.1 30.5358 195.57C31.2173 195.04 32.1367 194.775 33.2941 194.775C34.2027 194.775 34.9653 194.926 35.5819 195.229C36.2093 195.532 36.7122 195.959 37.0908 196.511L36.1335 197.339C35.8198 196.927 35.4413 196.592 34.9978 196.333C34.5543 196.073 33.981 195.943 33.2779 195.943C32.5099 195.943 31.9204 196.105 31.5093 196.43C31.0983 196.754 30.8927 197.241 30.8927 197.89C30.8927 198.399 31.0442 198.815 31.3471 199.14C31.6607 199.453 32.2178 199.68 33.0183 199.821L34.2352 200.032C34.7868 200.129 35.252 200.275 35.6305 200.47C36.0091 200.665 36.312 200.897 36.5392 201.168C36.7771 201.438 36.9448 201.741 37.0422 202.076C37.1395 202.412 37.1882 202.763 37.1882 203.131C37.1882 204.18 36.842 205.002 36.1498 205.597C35.4683 206.192 34.4948 206.49 33.2292 206.49ZM42.9905 206.441C42.547 206.441 42.2333 206.349 42.0495 206.165C41.8764 205.981 41.7898 205.749 41.7898 205.467V205.175C41.7898 204.894 41.8764 204.662 42.0495 204.478C42.2333 204.294 42.547 204.202 42.9905 204.202C43.434 204.202 43.7423 204.294 43.9154 204.478C44.0993 204.662 44.1912 204.894 44.1912 205.175V205.467C44.1912 205.749 44.0993 205.981 43.9154 206.165C43.7423 206.349 43.434 206.441 42.9905 206.441ZM55.2343 200.616V197.03H55.1045L52.7194 202.855L50.3343 197.03H50.2045V200.616V206.295H48.9551V194.97H50.7074L52.7032 199.967H52.8005L54.7962 194.97H56.4837V206.295H55.2343V200.616ZM62.4483 206.49C61.756 206.49 61.1611 206.36 60.6635 206.1C60.1659 205.83 59.7549 205.446 59.4304 204.948C59.1058 204.451 58.8679 203.839 58.7164 203.115C58.565 202.39 58.4893 201.563 58.4893 200.632C58.4893 199.713 58.565 198.891 58.7164 198.166C58.8679 197.43 59.1058 196.814 59.4304 196.316C59.7549 195.819 60.1659 195.44 60.6635 195.181C61.1611 194.91 61.756 194.775 62.4483 194.775C63.1405 194.775 63.7355 194.91 64.2331 195.181C64.7306 195.44 65.1417 195.819 65.4662 196.316C65.7907 196.814 66.0287 197.43 66.1801 198.166C66.3315 198.891 66.4073 199.713 66.4073 200.632C66.4073 201.563 66.3315 202.39 66.1801 203.115C66.0287 203.839 65.7907 204.451 65.4662 204.948C65.1417 205.446 64.7306 205.83 64.2331 206.1C63.7355 206.36 63.1405 206.49 62.4483 206.49ZM62.4483 205.305C62.9026 205.305 63.2866 205.219 63.6003 205.046C63.914 204.862 64.1736 204.607 64.3791 204.283C64.5846 203.958 64.7306 203.569 64.8172 203.115C64.9145 202.65 64.9632 202.13 64.9632 201.557V199.707C64.9632 199.145 64.9145 198.631 64.8172 198.166C64.7306 197.701 64.5846 197.306 64.3791 196.982C64.1736 196.657 63.914 196.408 63.6003 196.235C63.2866 196.051 62.9026 195.959 62.4483 195.959C61.994 195.959 61.61 196.051 61.2963 196.235C60.9826 196.408 60.723 196.657 60.5174 196.982C60.3119 197.306 60.1605 197.701 60.0631 198.166C59.9766 198.631 59.9333 199.145 59.9333 199.707V201.557C59.9333 202.13 59.9766 202.65 60.0631 203.115C60.1605 203.569 60.3119 203.958 60.5174 204.283C60.723 204.607 60.9826 204.862 61.2963 205.046C61.61 205.219 61.994 205.305 62.4483 205.305ZM72.1447 206.49C71.1279 206.49 70.295 206.306 69.646 205.938C68.997 205.559 68.4615 205.078 68.0397 204.494L69.0294 203.683C69.4729 204.234 69.938 204.645 70.4248 204.916C70.9224 205.186 71.5119 205.321 72.1934 205.321C73.0154 205.321 73.6428 205.132 74.0755 204.754C74.5082 204.375 74.7245 203.845 74.7245 203.163C74.7245 202.612 74.5677 202.184 74.254 201.882C73.9403 201.568 73.394 201.346 72.6152 201.216L71.3496 201.005C70.798 200.908 70.3329 200.762 69.9543 200.567C69.5865 200.373 69.289 200.14 69.0619 199.87C68.8347 199.588 68.6725 199.286 68.5751 198.961C68.4778 198.626 68.4291 198.28 68.4291 197.923C68.4291 196.884 68.7698 196.1 69.4513 195.57C70.1327 195.04 71.0522 194.775 72.2096 194.775C73.1182 194.775 73.8808 194.926 74.4974 195.229C75.1247 195.532 75.6277 195.959 76.0063 196.511L75.049 197.339C74.7353 196.927 74.3567 196.592 73.9133 196.333C73.4698 196.073 72.8965 195.943 72.1934 195.943C71.4254 195.943 70.8358 196.105 70.4248 196.43C70.0138 196.754 69.8082 197.241 69.8082 197.89C69.8082 198.399 69.9597 198.815 70.2625 199.14C70.5762 199.453 71.1333 199.68 71.9338 199.821L73.1507 200.032C73.7023 200.129 74.1674 200.275 74.546 200.47C74.9246 200.665 75.2275 200.897 75.4547 201.168C75.6926 201.438 75.8603 201.741 75.9576 202.076C76.055 202.412 76.1037 202.763 76.1037 203.131C76.1037 204.18 75.7575 205.002 75.0653 205.597C74.3838 206.192 73.4103 206.49 72.1447 206.49ZM82.5875 196.154V206.295H81.2245V196.154H77.444V194.97H86.368V196.154H82.5875ZM94.5717 206.295L93.6144 203.066H89.6392L88.6819 206.295H87.2703L90.7425 194.97H92.5435L96.0157 206.295H94.5717ZM91.6998 196.414H91.5538L89.9637 201.882H93.2899L91.6998 196.414ZM97.9564 206.295V194.97H105.096V196.154H99.3194V199.967H104.609V201.151H99.3194V206.295H97.9564ZM114.029 206.295L113.072 203.066H109.097L108.14 206.295H106.728L110.2 194.97H112.001L115.473 206.295H114.029ZM111.158 196.414H111.012L109.421 201.882H112.748L111.158 196.414ZM127.143 206.295V194.97H134.12V196.154H128.506V199.967H133.925V201.151H128.506V205.11H134.12V206.295H127.143ZM140.247 206.49C139.23 206.49 138.397 206.306 137.748 205.938C137.099 205.559 136.564 205.078 136.142 204.494L137.132 203.683C137.575 204.234 138.04 204.645 138.527 204.916C139.024 205.186 139.614 205.321 140.295 205.321C141.118 205.321 141.745 205.132 142.178 204.754C142.61 204.375 142.827 203.845 142.827 203.163C142.827 202.612 142.67 202.184 142.356 201.882C142.042 201.568 141.496 201.346 140.717 201.216L139.452 201.005C138.9 200.908 138.435 200.762 138.056 200.567C137.689 200.373 137.391 200.14 137.164 199.87C136.937 199.588 136.775 199.286 136.677 198.961C136.58 198.626 136.531 198.28 136.531 197.923C136.531 196.884 136.872 196.1 137.553 195.57C138.235 195.04 139.154 194.775 140.312 194.775C141.22 194.775 141.983 194.926 142.599 195.229C143.227 195.532 143.73 195.959 144.108 196.511L143.151 197.339C142.837 196.927 142.459 196.592 142.015 196.333C141.572 196.073 140.999 195.943 140.295 195.943C139.527 195.943 138.938 196.105 138.527 196.43C138.116 196.754 137.91 197.241 137.91 197.89C137.91 198.399 138.062 198.815 138.365 199.14C138.678 199.453 139.235 199.68 140.036 199.821L141.253 200.032C141.804 200.129 142.27 200.275 142.648 200.47C143.027 200.665 143.33 200.897 143.557 201.168C143.795 201.438 143.962 201.741 144.06 202.076C144.157 202.412 144.206 202.763 144.206 203.131C144.206 204.18 143.86 205.002 143.167 205.597C142.486 206.192 141.512 206.49 140.247 206.49ZM152.523 200.616V197.03H152.393L150.008 202.855L147.623 197.03H147.493V200.616V206.295H146.244V194.97H147.996L149.992 199.967H150.089L152.085 194.97H153.772V206.295H152.523V200.616ZM162.674 206.295L161.716 203.066H157.741L156.784 206.295H155.372L158.845 194.97H160.646L164.118 206.295H162.674ZM159.802 196.414H159.656L158.066 201.882H161.392L159.802 196.414ZM166.059 206.295V194.97H173.035V196.154H167.421V199.967H172.841V201.151H167.421V205.11H173.035V206.295H166.059ZM175.69 206.295V205.208H178.513V196.057H175.69V194.97H182.699V196.057H179.876V205.208H182.699V206.295H175.69ZM186.003 206.295V194.97H187.366V205.11H192.737V206.295H186.003ZM195.148 206.295V205.208H197.971V196.057H195.148V194.97H202.157V196.057H199.334V205.208H202.157V206.295H195.148Z" fill="white"/>
                        <path d="M33.8019 172.687C33.1205 172.687 32.5093 172.584 31.9685 172.379C31.4384 172.162 30.9895 171.859 30.6218 171.47C30.254 171.07 29.9727 170.594 29.778 170.042C29.5833 169.49 29.486 168.874 29.486 168.192C29.486 167.403 29.6104 166.656 29.8592 165.953C30.108 165.239 30.427 164.585 30.8165 163.99C31.2167 163.384 31.6602 162.844 32.1469 162.368C32.6445 161.892 33.1367 161.491 33.6234 161.167H36.9821C36.279 161.654 35.6462 162.124 35.0837 162.578C34.5321 163.022 34.0453 163.471 33.6234 163.925C33.2124 164.369 32.8717 164.828 32.6012 165.304C32.3416 165.78 32.1523 166.294 32.0334 166.846L32.1794 166.894C32.2767 166.678 32.3957 166.467 32.5363 166.262C32.677 166.056 32.85 165.878 33.0556 165.726C33.2611 165.564 33.499 165.434 33.7695 165.337C34.0507 165.239 34.3752 165.191 34.743 165.191C35.2189 165.191 35.6624 165.277 36.0735 165.45C36.4845 165.613 36.8361 165.851 37.1281 166.164C37.431 166.467 37.669 166.835 37.842 167.268C38.0151 167.7 38.1016 168.187 38.1016 168.728C38.1016 169.301 37.9989 169.831 37.7934 170.318C37.5878 170.805 37.2958 171.227 36.9172 171.584C36.5494 171.93 36.1005 172.2 35.5705 172.395C35.0405 172.59 34.4509 172.687 33.8019 172.687ZM33.7857 170.789C34.3698 170.789 34.8133 170.637 35.1162 170.334C35.419 170.021 35.5705 169.582 35.5705 169.02V168.793C35.5705 168.23 35.4136 167.803 35.1 167.511C34.7971 167.208 34.359 167.057 33.7857 167.057C33.234 167.057 32.8014 167.208 32.4877 167.511C32.174 167.803 32.0171 168.23 32.0171 168.793V169.02C32.0171 169.582 32.1632 170.021 32.4552 170.334C32.7581 170.637 33.2016 170.789 33.7857 170.789ZM53.0118 172.492H44.8667V170.269L48.4363 167.3C49.0528 166.77 49.4963 166.31 49.7667 165.921C50.0372 165.532 50.1724 165.12 50.1724 164.688V164.526C50.1724 164.05 50.0318 163.693 49.7505 163.455C49.4693 163.206 49.0907 163.081 48.6147 163.081C48.0739 163.081 47.6574 163.238 47.3654 163.552C47.0733 163.866 46.8678 164.239 46.7488 164.672L44.6233 163.86C44.7531 163.471 44.9316 163.103 45.1587 162.757C45.3859 162.4 45.6725 162.092 46.0187 161.832C46.3756 161.573 46.7867 161.367 47.2518 161.216C47.7169 161.053 48.2524 160.972 48.8581 160.972C49.4747 160.972 50.0263 161.059 50.5131 161.232C50.9999 161.405 51.4109 161.643 51.7462 161.946C52.0816 162.249 52.3358 162.611 52.5088 163.033C52.6819 163.444 52.7684 163.893 52.7684 164.38C52.7684 164.855 52.6873 165.294 52.525 165.694C52.3736 166.083 52.1573 166.451 51.876 166.797C51.6056 167.143 51.2811 167.479 50.9025 167.803C50.5347 168.128 50.1399 168.452 49.7181 168.777L47.5601 170.448H53.0118V172.492ZM60.6692 172.492V170.529H63.7196V162.935H63.5736L61.2696 165.953L59.7119 164.736L62.4216 161.167H66.1534V170.529H68.5548V172.492H60.6692ZM83.4 165.467C83.4 166.267 83.2756 167.019 83.0269 167.722C82.7781 168.425 82.4536 169.079 82.0533 169.685C81.6639 170.28 81.2204 170.816 80.7229 171.292C80.2361 171.767 79.7493 172.168 79.2626 172.492H75.9039C76.607 172.005 77.2344 171.54 77.7861 171.097C78.3485 170.642 78.8353 170.194 79.2463 169.75C79.6682 169.296 80.0089 168.831 80.2685 168.355C80.539 167.879 80.7337 167.365 80.8527 166.813L80.7066 166.765C80.6093 166.981 80.4849 167.192 80.3334 167.397C80.1928 167.603 80.0198 167.787 79.8142 167.949C79.6195 168.101 79.3816 168.225 79.1003 168.322C78.8299 168.42 78.5108 168.468 78.143 168.468C77.6671 168.468 77.2236 168.387 76.8125 168.225C76.4015 168.052 76.0445 167.814 75.7417 167.511C75.4496 167.197 75.217 166.824 75.044 166.391C74.8709 165.959 74.7844 165.472 74.7844 164.931C74.7844 164.358 74.8871 163.828 75.0927 163.341C75.2982 162.854 75.5848 162.438 75.9526 162.092C76.3312 161.735 76.7855 161.459 77.3155 161.264C77.8456 161.07 78.4351 160.972 79.0841 160.972C79.7656 160.972 80.3713 161.08 80.9013 161.297C81.4422 161.502 81.8965 161.805 82.2643 162.205C82.632 162.595 82.9133 163.065 83.108 163.617C83.3027 164.169 83.4 164.785 83.4 165.467ZM79.1003 166.602C79.652 166.602 80.0847 166.456 80.3983 166.164C80.712 165.861 80.8689 165.429 80.8689 164.866V164.639C80.8689 164.077 80.7174 163.644 80.4146 163.341C80.1225 163.027 79.6844 162.871 79.1003 162.871C78.5162 162.871 78.0727 163.027 77.7698 163.341C77.467 163.644 77.3155 164.077 77.3155 164.639V164.866C77.3155 165.429 77.467 165.861 77.7698 166.164C78.0835 166.456 78.527 166.602 79.1003 166.602ZM124.561 172.687C123.88 172.687 123.274 172.606 122.744 172.444C122.214 172.27 121.765 172.038 121.397 171.746C121.029 171.454 120.748 171.108 120.553 170.707C120.369 170.296 120.277 169.853 120.277 169.377C120.277 168.641 120.488 168.052 120.91 167.608C121.332 167.154 121.873 166.835 122.533 166.651V166.521C121.97 166.316 121.511 166.002 121.154 165.58C120.797 165.158 120.618 164.617 120.618 163.958C120.618 163.525 120.705 163.125 120.878 162.757C121.051 162.389 121.305 162.076 121.64 161.816C121.976 161.545 122.387 161.34 122.874 161.199C123.36 161.048 123.923 160.972 124.561 160.972C125.188 160.972 125.745 161.048 126.232 161.199C126.73 161.34 127.146 161.545 127.482 161.816C127.817 162.076 128.071 162.389 128.244 162.757C128.417 163.125 128.504 163.525 128.504 163.958C128.504 164.617 128.325 165.158 127.968 165.58C127.611 166.002 127.152 166.316 126.589 166.521V166.651C127.249 166.835 127.79 167.154 128.212 167.608C128.634 168.052 128.844 168.641 128.844 169.377C128.844 169.853 128.747 170.296 128.552 170.707C128.369 171.108 128.093 171.454 127.725 171.746C127.357 172.038 126.908 172.27 126.378 172.444C125.848 172.606 125.242 172.687 124.561 172.687ZM124.561 170.821C125.123 170.821 125.551 170.691 125.843 170.432C126.146 170.172 126.297 169.82 126.297 169.377V169.052C126.297 168.598 126.151 168.247 125.859 167.998C125.567 167.738 125.134 167.608 124.561 167.608C123.988 167.608 123.555 167.738 123.263 167.998C122.971 168.247 122.825 168.598 122.825 169.052V169.377C122.825 169.82 122.971 170.172 123.263 170.432C123.566 170.691 123.998 170.821 124.561 170.821ZM124.561 165.824C125.102 165.824 125.513 165.699 125.794 165.45C126.075 165.202 126.216 164.866 126.216 164.444V164.201C126.216 163.779 126.07 163.449 125.778 163.211C125.497 162.962 125.091 162.838 124.561 162.838C124.031 162.838 123.62 162.962 123.328 163.211C123.047 163.449 122.906 163.779 122.906 164.201V164.444C122.906 164.866 123.047 165.202 123.328 165.45C123.609 165.699 124.02 165.824 124.561 165.824ZM139.763 172.687C139.082 172.687 138.471 172.584 137.93 172.379C137.4 172.162 136.951 171.859 136.583 171.47C136.215 171.07 135.934 170.594 135.739 170.042C135.545 169.49 135.447 168.874 135.447 168.192C135.447 167.403 135.572 166.656 135.82 165.953C136.069 165.239 136.388 164.585 136.778 163.99C137.178 163.384 137.621 162.844 138.108 162.368C138.606 161.892 139.098 161.491 139.585 161.167H142.943C142.24 161.654 141.607 162.124 141.045 162.578C140.493 163.022 140.007 163.471 139.585 163.925C139.174 164.369 138.833 164.828 138.563 165.304C138.303 165.78 138.114 166.294 137.995 166.846L138.141 166.894C138.238 166.678 138.357 166.467 138.498 166.262C138.638 166.056 138.811 165.878 139.017 165.726C139.222 165.564 139.46 165.434 139.731 165.337C140.012 165.239 140.336 165.191 140.704 165.191C141.18 165.191 141.624 165.277 142.035 165.45C142.446 165.613 142.797 165.851 143.089 166.164C143.392 166.467 143.63 166.835 143.803 167.268C143.976 167.7 144.063 168.187 144.063 168.728C144.063 169.301 143.96 169.831 143.755 170.318C143.549 170.805 143.257 171.227 142.878 171.584C142.511 171.93 142.062 172.2 141.532 172.395C141.002 172.59 140.412 172.687 139.763 172.687ZM139.747 170.789C140.331 170.789 140.775 170.637 141.077 170.334C141.38 170.021 141.532 169.582 141.532 169.02V168.793C141.532 168.23 141.375 167.803 141.061 167.511C140.758 167.208 140.32 167.057 139.747 167.057C139.195 167.057 138.763 167.208 138.449 167.511C138.135 167.803 137.978 168.23 137.978 168.793V169.02C137.978 169.582 138.124 170.021 138.416 170.334C138.719 170.637 139.163 170.789 139.747 170.789ZM151.493 172.492V170.529H154.544V162.935H154.398L152.094 165.953L150.536 164.736L153.246 161.167H156.977V170.529H159.379V172.492H151.493ZM169.973 172.687C168.459 172.687 167.339 172.173 166.614 171.145C165.9 170.118 165.543 168.679 165.543 166.83C165.543 164.98 165.9 163.541 166.614 162.514C167.339 161.486 168.459 160.972 169.973 160.972C171.487 160.972 172.601 161.486 173.315 162.514C174.04 163.541 174.402 164.98 174.402 166.83C174.402 168.679 174.04 170.118 173.315 171.145C172.601 172.173 171.487 172.687 169.973 172.687ZM169.973 170.772C170.698 170.772 171.201 170.518 171.482 170.01C171.774 169.501 171.92 168.793 171.92 167.884V165.775C171.92 164.866 171.774 164.158 171.482 163.649C171.201 163.141 170.698 162.887 169.973 162.887C169.248 162.887 168.74 163.141 168.448 163.649C168.167 164.158 168.026 164.866 168.026 165.775V167.884C168.026 168.793 168.167 169.501 168.448 170.01C168.74 170.518 169.248 170.772 169.973 170.772ZM169.973 167.787C169.594 167.787 169.329 167.711 169.178 167.56C169.037 167.408 168.967 167.224 168.967 167.008V166.651C168.967 166.435 169.037 166.251 169.178 166.099C169.329 165.948 169.594 165.872 169.973 165.872C170.352 165.872 170.611 165.948 170.752 166.099C170.903 166.251 170.979 166.435 170.979 166.651V167.008C170.979 167.224 170.903 167.408 170.752 167.56C170.611 167.711 170.352 167.787 169.973 167.787ZM219.522 172.492H211.377V170.269L214.947 167.3C215.563 166.77 216.007 166.31 216.277 165.921C216.548 165.532 216.683 165.12 216.683 164.688V164.526C216.683 164.05 216.542 163.693 216.261 163.455C215.98 163.206 215.601 163.081 215.125 163.081C214.584 163.081 214.168 163.238 213.876 163.552C213.584 163.866 213.378 164.239 213.259 164.672L211.134 163.86C211.264 163.471 211.442 163.103 211.669 162.757C211.896 162.4 212.183 162.092 212.529 161.832C212.886 161.573 213.297 161.367 213.762 161.216C214.228 161.053 214.763 160.972 215.369 160.972C215.985 160.972 216.537 161.059 217.024 161.232C217.51 161.405 217.921 161.643 218.257 161.946C218.592 162.249 218.846 162.611 219.019 163.033C219.192 163.444 219.279 163.893 219.279 164.38C219.279 164.855 219.198 165.294 219.036 165.694C218.884 166.083 218.668 166.451 218.387 166.797C218.116 167.143 217.792 167.479 217.413 167.803C217.045 168.128 216.65 168.452 216.229 168.777L214.071 170.448H219.522V172.492ZM230.522 172.687C229.841 172.687 229.235 172.606 228.705 172.444C228.175 172.27 227.726 172.038 227.358 171.746C226.991 171.454 226.709 171.108 226.515 170.707C226.331 170.296 226.239 169.853 226.239 169.377C226.239 168.641 226.45 168.052 226.872 167.608C227.293 167.154 227.834 166.835 228.494 166.651V166.521C227.932 166.316 227.472 166.002 227.115 165.58C226.758 165.158 226.579 164.617 226.579 163.958C226.579 163.525 226.666 163.125 226.839 162.757C227.012 162.389 227.266 162.076 227.602 161.816C227.937 161.545 228.348 161.34 228.835 161.199C229.322 161.048 229.884 160.972 230.522 160.972C231.15 160.972 231.707 161.048 232.193 161.199C232.691 161.34 233.107 161.545 233.443 161.816C233.778 162.076 234.032 162.389 234.205 162.757C234.378 163.125 234.465 163.525 234.465 163.958C234.465 164.617 234.287 165.158 233.93 165.58C233.573 166.002 233.113 166.316 232.55 166.521V166.651C233.21 166.835 233.751 167.154 234.173 167.608C234.595 168.052 234.806 168.641 234.806 169.377C234.806 169.853 234.708 170.296 234.514 170.707C234.33 171.108 234.054 171.454 233.686 171.746C233.318 172.038 232.869 172.27 232.339 172.444C231.809 172.606 231.204 172.687 230.522 172.687ZM230.522 170.821C231.085 170.821 231.512 170.691 231.804 170.432C232.107 170.172 232.258 169.82 232.258 169.377V169.052C232.258 168.598 232.112 168.247 231.82 167.998C231.528 167.738 231.096 167.608 230.522 167.608C229.949 167.608 229.516 167.738 229.224 167.998C228.932 168.247 228.786 168.598 228.786 169.052V169.377C228.786 169.82 228.932 170.172 229.224 170.432C229.527 170.691 229.96 170.821 230.522 170.821ZM230.522 165.824C231.063 165.824 231.474 165.699 231.755 165.45C232.037 165.202 232.177 164.866 232.177 164.444V164.201C232.177 163.779 232.031 163.449 231.739 163.211C231.458 162.962 231.052 162.838 230.522 162.838C229.992 162.838 229.581 162.962 229.289 163.211C229.008 163.449 228.867 163.779 228.867 164.201V164.444C228.867 164.866 229.008 165.202 229.289 165.45C229.57 165.699 229.981 165.824 230.522 165.824ZM245.66 172.687C244.978 172.687 244.372 172.606 243.842 172.444C243.312 172.27 242.863 172.038 242.496 171.746C242.128 171.454 241.847 171.108 241.652 170.707C241.468 170.296 241.376 169.853 241.376 169.377C241.376 168.641 241.587 168.052 242.009 167.608C242.431 167.154 242.972 166.835 243.631 166.651V166.521C243.069 166.316 242.609 166.002 242.252 165.58C241.895 165.158 241.717 164.617 241.717 163.958C241.717 163.525 241.803 163.125 241.976 162.757C242.149 162.389 242.404 162.076 242.739 161.816C243.074 161.545 243.485 161.34 243.972 161.199C244.459 161.048 245.021 160.972 245.66 160.972C246.287 160.972 246.844 161.048 247.331 161.199C247.828 161.34 248.245 161.545 248.58 161.816C248.915 162.076 249.17 162.389 249.343 162.757C249.516 163.125 249.602 163.525 249.602 163.958C249.602 164.617 249.424 165.158 249.067 165.58C248.71 166.002 248.25 166.316 247.688 166.521V166.651C248.348 166.835 248.888 167.154 249.31 167.608C249.732 168.052 249.943 168.641 249.943 169.377C249.943 169.853 249.846 170.296 249.651 170.707C249.467 171.108 249.191 171.454 248.823 171.746C248.456 172.038 248.007 172.27 247.477 172.444C246.947 172.606 246.341 172.687 245.66 172.687ZM245.66 170.821C246.222 170.821 246.649 170.691 246.941 170.432C247.244 170.172 247.396 169.82 247.396 169.377V169.052C247.396 168.598 247.25 168.247 246.958 167.998C246.666 167.738 246.233 167.608 245.66 167.608C245.086 167.608 244.654 167.738 244.362 167.998C244.069 168.247 243.923 168.598 243.923 169.052V169.377C243.923 169.82 244.069 170.172 244.362 170.432C244.664 170.691 245.097 170.821 245.66 170.821ZM245.66 165.824C246.2 165.824 246.611 165.699 246.893 165.45C247.174 165.202 247.315 164.866 247.315 164.444V164.201C247.315 163.779 247.169 163.449 246.876 163.211C246.595 162.962 246.19 162.838 245.66 162.838C245.13 162.838 244.718 162.962 244.426 163.211C244.145 163.449 244.005 163.779 244.005 164.201V164.444C244.005 164.866 244.145 165.202 244.426 165.45C244.708 165.699 245.119 165.824 245.66 165.824ZM260.797 172.687C260.115 172.687 259.51 172.606 258.98 172.444C258.45 172.27 258.001 172.038 257.633 171.746C257.265 171.454 256.984 171.108 256.789 170.707C256.605 170.296 256.513 169.853 256.513 169.377C256.513 168.641 256.724 168.052 257.146 167.608C257.568 167.154 258.109 166.835 258.769 166.651V166.521C258.206 166.316 257.746 166.002 257.39 165.58C257.033 165.158 256.854 164.617 256.854 163.958C256.854 163.525 256.941 163.125 257.114 162.757C257.287 162.389 257.541 162.076 257.876 161.816C258.212 161.545 258.623 161.34 259.109 161.199C259.596 161.048 260.159 160.972 260.797 160.972C261.424 160.972 261.981 161.048 262.468 161.199C262.966 161.34 263.382 161.545 263.717 161.816C264.053 162.076 264.307 162.389 264.48 162.757C264.653 163.125 264.74 163.525 264.74 163.958C264.74 164.617 264.561 165.158 264.204 165.58C263.847 166.002 263.388 166.316 262.825 166.521V166.651C263.485 166.835 264.026 167.154 264.448 167.608C264.869 168.052 265.08 168.641 265.08 169.377C265.08 169.853 264.983 170.296 264.788 170.707C264.604 171.108 264.329 171.454 263.961 171.746C263.593 172.038 263.144 172.27 262.614 172.444C262.084 172.606 261.478 172.687 260.797 172.687ZM260.797 170.821C261.359 170.821 261.787 170.691 262.079 170.432C262.382 170.172 262.533 169.82 262.533 169.377V169.052C262.533 168.598 262.387 168.247 262.095 167.998C261.803 167.738 261.37 167.608 260.797 167.608C260.224 167.608 259.791 167.738 259.499 167.998C259.207 168.247 259.061 168.598 259.061 169.052V169.377C259.061 169.82 259.207 170.172 259.499 170.432C259.802 170.691 260.234 170.821 260.797 170.821ZM260.797 165.824C261.338 165.824 261.749 165.699 262.03 165.45C262.311 165.202 262.452 164.866 262.452 164.444V164.201C262.452 163.779 262.306 163.449 262.014 163.211C261.733 162.962 261.327 162.838 260.797 162.838C260.267 162.838 259.856 162.962 259.564 163.211C259.282 163.449 259.142 163.779 259.142 164.201V164.444C259.142 164.866 259.282 165.202 259.564 165.45C259.845 165.699 260.256 165.824 260.797 165.824ZM306.209 172.687C305.527 172.687 304.922 172.606 304.392 172.444C303.862 172.27 303.413 172.038 303.045 171.746C302.677 171.454 302.396 171.108 302.201 170.707C302.017 170.296 301.925 169.853 301.925 169.377C301.925 168.641 302.136 168.052 302.558 167.608C302.98 167.154 303.521 166.835 304.181 166.651V166.521C303.618 166.316 303.158 166.002 302.802 165.58C302.445 165.158 302.266 164.617 302.266 163.958C302.266 163.525 302.353 163.125 302.526 162.757C302.699 162.389 302.953 162.076 303.288 161.816C303.624 161.545 304.035 161.34 304.521 161.199C305.008 161.048 305.571 160.972 306.209 160.972C306.836 160.972 307.393 161.048 307.88 161.199C308.378 161.34 308.794 161.545 309.129 161.816C309.465 162.076 309.719 162.389 309.892 162.757C310.065 163.125 310.152 163.525 310.152 163.958C310.152 164.617 309.973 165.158 309.616 165.58C309.259 166.002 308.8 166.316 308.237 166.521V166.651C308.897 166.835 309.438 167.154 309.86 167.608C310.281 168.052 310.492 168.641 310.492 169.377C310.492 169.853 310.395 170.296 310.2 170.707C310.016 171.108 309.741 171.454 309.373 171.746C309.005 172.038 308.556 172.27 308.026 172.444C307.496 172.606 306.89 172.687 306.209 172.687ZM306.209 170.821C306.771 170.821 307.199 170.691 307.491 170.432C307.794 170.172 307.945 169.82 307.945 169.377V169.052C307.945 168.598 307.799 168.247 307.507 167.998C307.215 167.738 306.782 167.608 306.209 167.608C305.636 167.608 305.203 167.738 304.911 167.998C304.619 168.247 304.473 168.598 304.473 169.052V169.377C304.473 169.82 304.619 170.172 304.911 170.432C305.214 170.691 305.646 170.821 306.209 170.821ZM306.209 165.824C306.75 165.824 307.161 165.699 307.442 165.45C307.723 165.202 307.864 164.866 307.864 164.444V164.201C307.864 163.779 307.718 163.449 307.426 163.211C307.145 162.962 306.739 162.838 306.209 162.838C305.679 162.838 305.268 162.962 304.976 163.211C304.694 163.449 304.554 163.779 304.554 164.201V164.444C304.554 164.866 304.694 165.202 304.976 165.45C305.257 165.699 305.668 165.824 306.209 165.824ZM321.346 172.687C319.832 172.687 318.712 172.173 317.988 171.145C317.274 170.118 316.917 168.679 316.917 166.83C316.917 164.98 317.274 163.541 317.988 162.514C318.712 161.486 319.832 160.972 321.346 160.972C322.861 160.972 323.975 161.486 324.689 162.514C325.413 163.541 325.776 164.98 325.776 166.83C325.776 168.679 325.413 170.118 324.689 171.145C323.975 172.173 322.861 172.687 321.346 172.687ZM321.346 170.772C322.071 170.772 322.574 170.518 322.855 170.01C323.147 169.501 323.293 168.793 323.293 167.884V165.775C323.293 164.866 323.147 164.158 322.855 163.649C322.574 163.141 322.071 162.887 321.346 162.887C320.621 162.887 320.113 163.141 319.821 163.649C319.54 164.158 319.399 164.866 319.399 165.775V167.884C319.399 168.793 319.54 169.501 319.821 170.01C320.113 170.518 320.621 170.772 321.346 170.772ZM321.346 167.787C320.968 167.787 320.703 167.711 320.551 167.56C320.41 167.408 320.34 167.224 320.34 167.008V166.651C320.34 166.435 320.41 166.251 320.551 166.099C320.703 165.948 320.968 165.872 321.346 165.872C321.725 165.872 321.984 165.948 322.125 166.099C322.276 166.251 322.352 166.435 322.352 166.651V167.008C322.352 167.224 322.276 167.408 322.125 167.56C321.984 167.711 321.725 167.787 321.346 167.787ZM334.277 172.492L338.171 163.146H334.504V165.207H332.443V161.167H340.588V163.276L336.84 172.492H334.277ZM355.272 163.292H350.031L349.771 166.878H349.917C350.036 166.619 350.171 166.381 350.323 166.164C350.474 165.937 350.653 165.748 350.858 165.596C351.064 165.434 351.302 165.31 351.572 165.223C351.843 165.137 352.151 165.093 352.497 165.093C352.962 165.093 353.4 165.175 353.811 165.337C354.233 165.499 354.601 165.737 354.915 166.051C355.239 166.354 355.493 166.732 355.677 167.186C355.861 167.63 355.953 168.133 355.953 168.695C355.953 169.269 355.856 169.799 355.661 170.286C355.466 170.772 355.18 171.194 354.801 171.551C354.433 171.908 353.973 172.189 353.422 172.395C352.87 172.59 352.243 172.687 351.54 172.687C350.988 172.687 350.496 172.627 350.063 172.508C349.631 172.389 349.247 172.233 348.911 172.038C348.587 171.832 348.3 171.6 348.051 171.34C347.813 171.07 347.608 170.794 347.435 170.513L349.203 169.117C349.333 169.334 349.468 169.539 349.609 169.734C349.76 169.929 349.928 170.102 350.112 170.253C350.307 170.394 350.517 170.507 350.745 170.594C350.983 170.67 351.253 170.707 351.556 170.707C352.162 170.707 352.616 170.545 352.919 170.221C353.233 169.885 353.389 169.442 353.389 168.89V168.76C353.389 168.23 353.233 167.814 352.919 167.511C352.605 167.208 352.172 167.057 351.621 167.057C351.167 167.057 350.788 167.149 350.485 167.333C350.193 167.506 349.971 167.679 349.82 167.852L347.824 167.576L348.246 161.167H355.272V163.292Z" fill="white"/>
                        <path d="M48.6033 26.016L41.1687 43.753H36.318L32.6598 29.596C32.4374 28.7253 32.2457 28.4058 31.569 28.0391C30.4664 27.4404 28.6444 26.8797 27.0425 26.5295L27.1513 26.016H34.9598C35.47 26.0155 35.9637 26.1974 36.3516 26.5289C36.7395 26.8604 36.9961 27.3197 37.0752 27.8238L39.0083 38.0883L43.7833 26.016H48.6033ZM67.6109 37.9629C67.6299 33.2802 61.137 33.0223 61.182 30.9306C61.1962 30.2941 61.8019 29.6173 63.127 29.4446C64.6799 29.2971 66.2438 29.5718 67.6535 30.2397L68.458 26.4774C67.0856 25.9614 65.632 25.6946 64.1658 25.6895C59.6297 25.6895 56.4377 28.103 56.4094 31.5553C56.381 34.1084 58.688 35.5305 60.4272 36.3823C62.216 37.2507 62.817 37.8091 62.8076 38.5852C62.7957 39.7778 61.3831 40.3007 60.0628 40.322C57.7557 40.3575 56.4188 39.6997 55.3493 39.2028L54.5188 43.0881C55.5907 43.5803 57.5688 44.0109 59.6203 44.0298C64.4402 44.0298 67.5944 41.6495 67.6109 37.9629ZM79.5863 43.753H83.8312L80.1281 26.016H76.2097C75.791 26.0121 75.3808 26.1341 75.0323 26.3662C74.6838 26.5982 74.4131 26.9296 74.2552 27.3174L67.3719 43.753H72.1895L73.1478 41.1029H79.0349L79.5863 43.753ZM74.4682 37.4684L76.8817 30.8075L78.273 37.4684H74.4682ZM55.16 26.016L51.367 43.753H46.7766L50.5743 26.016H55.16Z" fill="white"/>
                        <rect x="28.6902" y="88.1839" width="30.5062" height="23.1018" rx="4.44266" fill="url(#paint1_linear)" stroke="#666666" stroke-width="0.592354"/>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M48.3153 93.0878C47.2526 90.9653 45.5829 89.2986 44.4846 88.6473C44.412 88.6053 44.359 88.5362 44.3374 88.4551C44.3157 88.374 44.3272 88.2877 44.3692 88.2151C44.4112 88.1425 44.4803 88.0895 44.5614 88.0678C44.6424 88.0462 44.7287 88.0576 44.8014 88.0996C46.2401 88.9433 47.9127 90.8794 48.8719 92.7918C48.895 92.8284 48.9097 92.8697 48.9152 92.9126C48.9206 92.9556 48.9165 92.9992 48.9032 93.0404C48.89 93.0816 48.8678 93.1194 48.8384 93.1511C48.8089 93.1829 48.7729 93.2077 48.7327 93.224C48.69 93.2471 48.6422 93.2593 48.5936 93.2595C48.5358 93.2596 48.4792 93.2436 48.4301 93.2132C48.3809 93.1829 48.3412 93.1395 48.3153 93.0878ZM38.6931 103.245C38.7139 106.188 41.4818 109.696 43.3883 110.829C43.4251 110.849 43.4574 110.875 43.4832 110.908C43.509 110.94 43.5277 110.978 43.538 111.018C43.5483 111.058 43.5501 111.1 43.5431 111.141C43.5362 111.182 43.5208 111.221 43.4978 111.256C43.4699 111.302 43.4304 111.341 43.3832 111.368C43.3361 111.395 43.2827 111.409 43.2284 111.41C43.173 111.41 43.1186 111.395 43.0715 111.365C41.0377 110.166 38.255 106.661 38.0774 103.523H28.7049C28.6273 103.516 28.5553 103.48 28.5029 103.422C28.4505 103.364 28.4215 103.289 28.4215 103.211C28.4215 103.133 28.4505 103.058 28.5029 103C28.5553 102.942 28.6273 102.906 28.7049 102.899H38.1366C38.7273 100.828 38.7273 98.6339 38.1366 96.5635H28.7049C28.6224 96.5635 28.5434 96.5308 28.4851 96.4725C28.4268 96.4142 28.394 96.3351 28.394 96.2527C28.394 96.1702 28.4268 96.0912 28.4851 96.0329C28.5434 95.9746 28.6224 95.9418 28.7049 95.9418H38.0774C38.255 92.792 41.0496 89.2988 43.0715 88.0998C43.1441 88.0578 43.2305 88.0464 43.3115 88.0681C43.3926 88.0897 43.4617 88.1427 43.5037 88.2153C43.5457 88.2879 43.5572 88.3743 43.5355 88.4553C43.5139 88.5364 43.4609 88.6055 43.3883 88.6475C41.4818 89.7665 38.7139 93.2775 38.6931 96.2231C39.3712 98.5146 39.3712 100.953 38.6931 103.245ZM59.1817 102.899H49.7322C49.1415 100.828 49.1415 98.6339 49.7322 96.5635H59.1817C59.2641 96.5635 59.3432 96.5307 59.4015 96.4724C59.4597 96.4141 59.4925 96.3351 59.4925 96.2526C59.4925 96.1702 59.4597 96.0911 59.4015 96.0328C59.3432 95.9745 59.2641 95.9418 59.1817 95.9418H49.4924C49.425 95.9426 49.3597 95.9652 49.3063 96.0063C49.2529 96.0474 49.2143 96.1048 49.1964 96.1697C48.5081 98.4779 48.5081 100.937 49.1964 103.245C49.1756 106.188 46.4077 109.696 44.5012 110.829C44.4635 110.848 44.43 110.874 44.403 110.906C44.376 110.938 44.3561 110.975 44.3446 111.015C44.3331 111.056 44.3303 111.098 44.3364 111.139C44.3425 111.181 44.3573 111.22 44.3799 111.256C44.4078 111.302 44.4472 111.341 44.4944 111.368C44.5416 111.395 44.5949 111.409 44.6492 111.41C44.7047 111.41 44.759 111.394 44.8061 111.365C46.8281 110.181 49.6227 106.661 49.8003 103.523H59.1817C59.2592 103.516 59.3312 103.48 59.3836 103.422C59.436 103.364 59.465 103.289 59.465 103.211C59.465 103.133 59.436 103.058 59.3836 103C59.3312 102.942 59.2592 102.906 59.1817 102.899ZM43.6257 89.7938C43.7172 89.7327 43.8248 89.7 43.9349 89.7C44.0825 89.7 44.224 89.7587 44.3284 89.8631C44.4328 89.9674 44.4914 90.109 44.4914 90.2566C44.4914 90.3667 44.4588 90.4743 44.3976 90.5658C44.3365 90.6573 44.2495 90.7286 44.1478 90.7708C44.0461 90.8129 43.9342 90.8239 43.8263 90.8024C43.7183 90.781 43.6192 90.728 43.5413 90.6501C43.4635 90.5723 43.4105 90.4731 43.389 90.3652C43.3675 90.2572 43.3786 90.1453 43.4207 90.0436C43.4628 89.9419 43.5341 89.855 43.6257 89.7938Z" fill="#666666"/>
                        <defs>
                        <linearGradient id="paint0_linear" x1="363.718" y1="5.05596e-06" x2="37.8591" y2="251.493" gradientUnits="userSpaceOnUse">
                        <stop stop-color="#06B6B6"/>
                        <stop offset="1" stop-color="#6594DB"/>
                        </linearGradient>
                        <linearGradient id="paint1_linear" x1="25.4323" y1="87.8877" x2="62.0101" y2="111.582" gradientUnits="userSpaceOnUse">
                        <stop stop-color="#DDD9D6"/>
                        <stop offset="0.212761" stop-color="#8A868C"/>
                        <stop offset="0.548384" stop-color="#F2F3F3" stop-opacity="0.8"/>
                        <stop offset="0.914316" stop-color="#807C80"/>
                        <stop offset="1" stop-color="#A6A8AB"/>
                        </linearGradient>
                        </defs>
                        </svg>
                    </div>

                    <form id="card_pay_form_connect_lu" styfle="margin-top:4rem">

                        <div class="form-group">
                            <label for="">Card Number</label>
                            <input type="hidden" name="transaction_id" class="transaction_id_connect_lu">
                            <input type="text" name="card_no" class="form-control border border-right-0 border-top-0 border-left-0" maxlength="16" onkeypress="return onlyNumber(event)" required>
                        </div>
            
                        <div class="row form-group">
                            <div class="col">
                                <label for="">MM/YY</label>
                                <input maxlength='5' type="text" name="card_expiry" class="form-control border border-right-0 border-top-0 border-left-0" onkeyup="formatString(event);" required>
                            </div>
                            <div class="col">
                                <label for="">CVV</label>
                                <input type="text" name="card_cvv" class="form-control border border-right-0 border-top-0 border-left-0" maxlength="3" onkeypress="return onlyNumber(event)" required>
                            </div>
                        </div>
            
                        <div class="row mt-3">
                            <div class="col text-center">
                                <button id="pay_card_btn_connect_lu" class="btn px-5" style="background: #2A8BF2; border: 1px solid #2A8BF2; box-sizing: border-box;border-radius: 30px; color: #fff;">Pay</button>
                            </div>
                        </div>
                        
                    </form>


                </div>
            </div>

        

        </div>

  
      </div>
    </div>
  </div>


      <!-- The Modal 3 -->
      <div class="modal" id="myModal1h">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
      
            <!-- Modal body -->
            <div class="modal-body">
                      
                <div class="row py-5">
                    <div class="col text-center">
                        <svg width="96" height="96" viewBox="0 0 96 96" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M47.9999 0.333313C21.6749 0.333313 0.333252 21.675 0.333252 48C0.333252 74.325 21.6749 95.6666 47.9999 95.6666C74.3249 95.6666 95.6666 74.325 95.6666 48C95.6666 21.675 74.3249 0.333313 47.9999 0.333313ZM68.6612 39.94C69.0417 39.5051 69.3313 38.9985 69.5131 38.45C69.6949 37.9016 69.7652 37.3223 69.7198 36.7462C69.6744 36.1702 69.5142 35.6091 69.2487 35.0959C68.9833 34.5826 68.6178 34.1277 68.174 33.7578C67.7301 33.3879 67.2167 33.1105 66.664 32.9419C66.1113 32.7733 65.5305 32.717 64.9557 32.7762C64.381 32.8354 63.8238 33.009 63.3171 33.2867C62.8104 33.5644 62.3644 33.9407 62.0052 34.3933L43.3719 56.749L33.7302 47.103C32.913 46.3136 31.8184 45.8769 30.6822 45.8867C29.546 45.8966 28.4591 46.3523 27.6557 47.1558C26.8523 47.9592 26.3965 49.0461 26.3867 50.1822C26.3768 51.3184 26.8136 52.413 27.6029 53.2303L40.6029 66.2303C41.0287 66.6558 41.5385 66.988 42.0997 67.2056C42.661 67.4232 43.2614 67.5214 43.8627 67.4941C44.4641 67.4668 45.0531 67.3145 45.5924 67.0469C46.1316 66.7793 46.6091 66.4023 46.9946 65.94L68.6612 39.94Z" fill="#06C270"/>
                            </svg>
                        
                        <h4 class="mt-5" style="font-style: normal; font-weight: 600; font-size: 36px; line-height: 43.57px; text-align: center; color: #231F20;">Transaction Successful</h4>
                        <p class="mt-3" style="font-style: normal; font-weight: 400; font-size: 16px; line-height: 25.57px; text-align: center; color: #979797">Kindly wait for your Helpa to comfirm rate.</p>

                        <a id="transactionid_link_connect_lu" class="btn btn-primary px-5 mt-2" style="background: #2A8BF2; border: 1px solid #2A8BF2; box-sizing: border-box;border-radius: 30px;">Transaction details</a>
                    </div>
                    </div>
                           
                   
                </div>
      
            </div>
        </div>
      </div>



     <!-- The Modal 3 -->
<div class="modal" id="myModal2e">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">


        <div class="modal-header border border-0">
            <h4 class="modal-title"><i class="fa fa-angle-left fa-lg cursor" id="made_transfer_back_lu"></i></h4>
            {{-- <button type="button" class="close" data-dismiss="modal">&times;</button> --}}
            <svg width="29" height="28" viewBox="0 0 29 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M20 6H4C2.897 6 2 6.897 2 8V20C2 21.103 2.897 22 4 22H7V25.767L13.277 22H20C21.103 22 22 21.103 22 20V8C22 6.897 21.103 6 20 6ZM20 20H12.723L9 22.233V20H4V8H20V20Z" fill="#231F20"/>
                <path d="M7 11H17V13H7V11ZM7 15H14V17H7V15Z" fill="#231F20"/>
                <circle cx="22" cy="7" r="7" fill="#FF8979"/>
            </svg>
            

                 
                
        </div>

        <div class="container">
            <div class="row">
                <div class="col">
                    <h4 style="color:#2A8BF2;">Releasing</h4>

                    <p>Transaction start when money has been released</p>
                </div>
                <div class="col-lg-2">
                    <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="24" cy="24" r="23.5" stroke="#FFB74F" stroke-dasharray="4 4"/>
                        <text x="50%" y="50%" text-anchor="middle" stroke="#ff8c00" font-size="12"  dy=".1em" id="count2">30</text>
                    </svg>
                </div>
            </div>
        </div>

    
        <div style="border-bottom: 1px solid #dee2e6;"></div>
  
        <!-- Modal body -->
        <div class="modal-body">
            <h4><span class="text-success">Buy</span>  dollar</h4>

            <div class="row mt-4">
                <div class="col">
                    <h4>Account Number</h4>
                </div>
                <div class="col text-right">
                   
                        <h4 class="text-right text-dark">
                            <span id="account_number_box1">7894456332</span>
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg" onclick="copyToClipboard('.account_number_box')">
                            <path d="M5 5.10625V13.125C4.99988 13.9184 5.30154 14.6821 5.8438 15.2613C6.38606 15.8405 7.12831 16.1917 7.92 16.2437L8.125 16.25H13.6425C13.5133 16.6155 13.2739 16.932 12.9574 17.1559C12.6408 17.3797 12.2627 17.4999 11.875 17.5H7.5C6.50544 17.5 5.55161 17.1049 4.84835 16.4017C4.14509 15.6984 3.75 14.7446 3.75 13.75V6.875C3.7498 6.48709 3.86991 6.10867 4.09379 5.79189C4.31766 5.4751 4.63428 5.23555 5 5.10625ZM14.375 2.5C14.8723 2.5 15.3492 2.69754 15.7008 3.04917C16.0525 3.40081 16.25 3.87772 16.25 4.375V13.125C16.25 13.6223 16.0525 14.0992 15.7008 14.4508C15.3492 14.8025 14.8723 15 14.375 15H8.125C7.62772 15 7.15081 14.8025 6.79917 14.4508C6.44754 14.0992 6.25 13.6223 6.25 13.125V4.375C6.25 3.87772 6.44754 3.40081 6.79917 3.04917C7.15081 2.69754 7.62772 2.5 8.125 2.5H14.375ZM14.375 3.75H8.125C7.95924 3.75 7.80027 3.81585 7.68306 3.93306C7.56585 4.05027 7.5 4.20924 7.5 4.375V13.125C7.5 13.2908 7.56585 13.4497 7.68306 13.5669C7.80027 13.6842 7.95924 13.75 8.125 13.75H14.375C14.5408 13.75 14.6997 13.6842 14.8169 13.5669C14.9342 13.4497 15 13.2908 15 13.125V4.375C15 4.20924 14.9342 4.05027 14.8169 3.93306C14.6997 3.81585 14.5408 3.75 14.375 3.75Z" fill="#2A8BF2"/>
                            </svg>
                            
                        </h4>
                </div>
            </div>

            <div class="row mt-2">
                <div class="col">
                    <h4>Account Name</h4>
                </div>
                <div class="col text-right">
                    <h4 class="text-dark">Payhelpa/Payhelp-NGN</h4>
                </div>
            </div>

            <div class="row mt-2">
                <div class="col">
                    <h4>Current Dollar Rate</h4>
                </div>
                <div class="col text-right">
                    <h4 class="text-dark"> <span class="dollar_rate_releasing_lu"></span></h4>
                </div>
            </div>

            <div class="row mt-2">
                <div class="col">
                    <h4>Quantity</h4>
                </div>
                <div class="col text-right">
                    <h4 class="text-dark"> <span class="amount_releasing_lu"></span></h4>
                </div>
            </div>

            <div class="row mt-2">
                <div class="col">
                    <h4>Amount needed</h4>
                </div>
                <div class="col text-right">
                    <h4 class="text-dark"> <span class="value_releasing_lu"></span></h4>
                </div>
            </div>

       
           
            <div class="row mt-5 mb-4">
                <div class="col-lg-4 text-center">
                    <a href="javascript:void" class="btn btn-outline-light mx-2 close2e" style="border: 1px solid #3E7BFA52; box-sizing: border-box;border-radius: 30px; color: #3E7BFA52; padding-left: 3.5rem; padding-right: 3.5rem;">Cancel</a>
                </div>
                <div class="col-lg-8 text-center">
                    <form id="made_transfer_form">
                        <input type="hidden" name="dollar_rate" id="dollar_rate_releasing_lu">
                        <input type="hidden" name="amount" id="amount_releasing_lu">
                        <button  href="javascript:void" class="btn px-5 mx-2" style="background: #2A8BF2; border: 1px solid #2A8BF2; box-sizing: border-box;border-radius: 30px; color: #fff;">I have made the transfer</button>
                     </form>
                </div>
            </div>
            
        </div>

  
      </div>
    </div>
  </div>


       <!-- The Modal 3 -->
<div class="modal" id="myModal2f">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">


        <div class="modal-header border border-0">
            <h4 class="modal-title"><i class="fa fa-angle-left fa-lg cursor" id="confirm_back_lu"></i></h4>
            {{-- <button type="button" class="close" data-dismiss="modal">&times;</button> --}}
            <svg width="29" height="28" viewBox="0 0 29 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M20 6H4C2.897 6 2 6.897 2 8V20C2 21.103 2.897 22 4 22H7V25.767L13.277 22H20C21.103 22 22 21.103 22 20V8C22 6.897 21.103 6 20 6ZM20 20H12.723L9 22.233V20H4V8H20V20Z" fill="#231F20"/>
                <path d="M7 11H17V13H7V11ZM7 15H14V17H7V15Z" fill="#231F20"/>
                <circle cx="22" cy="7" r="7" fill="#FF8979"/>
            </svg>
          
        </div>

        <div class="container">
            <div class="row">
                <div class="col-lg-10">
                    <h4 style="color:#2A8BF2;">Releasing</h4>

                    <p>Transaction start when money has been released</p>
                </div>
                <div class="col-lg-2">
                    <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="24" cy="24" r="23.5" stroke="#00C305" stroke-dasharray="4 4"/>
                        <text x="50%" y="50%" text-anchor="middle" stroke="#0ECB81" font-size="12"  dy=".1em" fill="#0ECB81" id="count3" >60</text>
                    </svg>
                        
                </div>
            </div>
        </div>

    
        <div style="border-bottom: 1px solid #dee2e6;"></div>
  
        <!-- Modal body -->
        <div class="modal-body">
            <h4><span class="text-success">Buy</span>  dollar</h4>

            <div class="row mt-4">
                <div class="col">
                    <h4>Account Number</h4>
                </div>
                <div class="col text-right">
                   
                        <h4 class="text-right text-dark">
                            <span id="account_number_box2">7894456332</span>
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg" onclick="copyToClipboard('#account_number_box2')">
                            <path d="M5 5.10625V13.125C4.99988 13.9184 5.30154 14.6821 5.8438 15.2613C6.38606 15.8405 7.12831 16.1917 7.92 16.2437L8.125 16.25H13.6425C13.5133 16.6155 13.2739 16.932 12.9574 17.1559C12.6408 17.3797 12.2627 17.4999 11.875 17.5H7.5C6.50544 17.5 5.55161 17.1049 4.84835 16.4017C4.14509 15.6984 3.75 14.7446 3.75 13.75V6.875C3.7498 6.48709 3.86991 6.10867 4.09379 5.79189C4.31766 5.4751 4.63428 5.23555 5 5.10625ZM14.375 2.5C14.8723 2.5 15.3492 2.69754 15.7008 3.04917C16.0525 3.40081 16.25 3.87772 16.25 4.375V13.125C16.25 13.6223 16.0525 14.0992 15.7008 14.4508C15.3492 14.8025 14.8723 15 14.375 15H8.125C7.62772 15 7.15081 14.8025 6.79917 14.4508C6.44754 14.0992 6.25 13.6223 6.25 13.125V4.375C6.25 3.87772 6.44754 3.40081 6.79917 3.04917C7.15081 2.69754 7.62772 2.5 8.125 2.5H14.375ZM14.375 3.75H8.125C7.95924 3.75 7.80027 3.81585 7.68306 3.93306C7.56585 4.05027 7.5 4.20924 7.5 4.375V13.125C7.5 13.2908 7.56585 13.4497 7.68306 13.5669C7.80027 13.6842 7.95924 13.75 8.125 13.75H14.375C14.5408 13.75 14.6997 13.6842 14.8169 13.5669C14.9342 13.4497 15 13.2908 15 13.125V4.375C15 4.20924 14.9342 4.05027 14.8169 3.93306C14.6997 3.81585 14.5408 3.75 14.375 3.75Z" fill="#2A8BF2"/>
                            </svg>
                            
                        </h4>
                </div>
            </div>

            <div class="row mt-2">
                <div class="col">
                    <h4>Account Name</h4>
                </div>
                <div class="col text-right">
                    <h4 class="text-dark">Payhelpa/Payhelp-NGN</h4>
                </div>
            </div>

            <div class="row mt-2">
                <div class="col">
                    <h4>Current Dollar Rate</h4>
                </div>
                <div class="col text-right">
                    <h4 class="text-dark">₦ <span class="dollar_rate_releasing_lu"></span></h4>
                </div>
            </div>

            <div class="row mt-2">
                <div class="col">
                    <h4>Quantity</h4>
                </div>
                <div class="col text-right">
                    <h4 class="text-dark"> <span class="amount_releasing_lu"></span></h4>
                </div>
            </div>

            <div class="row mt-2">
                <div class="col">
                    <h4>Amount needed</h4>
                </div>
                <div class="col text-right">
                    <h4 class="text-dark"> <span class="value_releasing_lu"></span></h4>
                </div>
            </div>

       
           
            <div class="row mt-5 mb-4">
                <div class="col text-center">
                    <a  href="javascript:void" class="btn px-5 mx-2 disabled" style="background: #2A8BF2; border: 1px solid #2A8BF2; box-sizing: border-box;border-radius: 30px; color: #fff;">Confirming Transfer...</a>
                </div>
            </div>


            <div class="row">
                <div class="col">
                    <svg width="168" height="31" viewBox="0 0 168 31" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0 0H164C166.209 0 168 1.79086 168 4V27C168 29.2091 166.209 31 164 31H0V0Z" fill="#332F67"/>
                        <path d="M52.5753 15.1293C52.2273 12.9517 50.522 11.679 48.3693 11.679C45.7344 11.679 43.7905 13.6527 43.7905 16.9091C43.7905 20.1655 45.7244 22.1392 48.3693 22.1392C50.6065 22.1392 52.2422 20.7372 52.5753 18.7237L51.0241 18.7188C50.7607 20.0213 49.6669 20.7372 48.3793 20.7372C46.6342 20.7372 45.3168 19.3999 45.3168 16.9091C45.3168 14.4382 46.6293 13.081 48.3842 13.081C49.6818 13.081 50.7706 13.8118 51.0241 15.1293H52.5753ZM59.1316 18.8331C59.1365 20.1307 58.1721 20.7472 57.3368 20.7472C56.4171 20.7472 55.7807 20.081 55.7807 19.0419V14.3636H54.2942V19.2209C54.2942 21.1151 55.3333 22.0994 56.7999 22.0994C57.9483 22.0994 58.7289 21.4929 59.0819 20.6776H59.1614V22H60.623V14.3636H59.1316V18.8331ZM68.3427 16.228C68.0344 15.0398 67.1048 14.2642 65.4542 14.2642C63.729 14.2642 62.506 15.174 62.506 16.5263C62.506 17.6101 63.1623 18.331 64.5941 18.6491L65.8867 18.9325C66.6225 19.0966 66.9656 19.4247 66.9656 19.902C66.9656 20.4936 66.3342 20.956 65.3597 20.956C64.4698 20.956 63.8981 20.5732 63.7191 19.8224L62.2823 20.0412C62.5309 21.3935 63.6545 22.1541 65.3697 22.1541C67.2141 22.1541 68.4918 21.1747 68.4918 19.7926C68.4918 18.7138 67.8058 18.0476 66.4038 17.7244L65.1907 17.446C64.3505 17.2472 63.9876 16.9638 63.9925 16.4467C63.9876 15.8601 64.6239 15.4425 65.4691 15.4425C66.3938 15.4425 66.8214 15.9545 66.9954 16.4666L68.3427 16.228ZM73.6909 14.3636H72.1248V12.5341H70.6383V14.3636H69.5197V15.5568H70.6383V20.0661C70.6333 21.4531 71.6923 22.1243 72.8656 22.0994C73.3379 22.0945 73.6561 22.005 73.8301 21.9403L73.5616 20.7124C73.4622 20.7322 73.2782 20.777 73.0396 20.777C72.5574 20.777 72.1248 20.6179 72.1248 19.7578V15.5568H73.6909V14.3636ZM78.4698 22.1541C80.6225 22.1541 82.0295 20.5781 82.0295 18.2166C82.0295 15.8402 80.6225 14.2642 78.4698 14.2642C76.3171 14.2642 74.9102 15.8402 74.9102 18.2166C74.9102 20.5781 76.3171 22.1541 78.4698 22.1541ZM78.4748 20.9062C77.0678 20.9062 76.4116 19.6783 76.4116 18.2116C76.4116 16.75 77.0678 15.5071 78.4748 15.5071C79.8718 15.5071 80.5281 16.75 80.5281 18.2116C80.5281 19.6783 79.8718 20.9062 78.4748 20.9062ZM83.6887 22H85.1752V17.2919C85.1752 16.2628 85.8961 15.5469 86.7413 15.5469C87.5666 15.5469 88.1383 16.0938 88.1383 16.924V22H89.6199V17.1328C89.6199 16.2131 90.1816 15.5469 91.1511 15.5469C91.9366 15.5469 92.5829 15.9844 92.5829 17.0185V22H94.0694V16.8793C94.0694 15.1342 93.095 14.2642 91.7129 14.2642C90.6142 14.2642 89.7889 14.7912 89.421 15.6065H89.3414C89.0083 14.7713 88.3074 14.2642 87.2882 14.2642C86.2789 14.2642 85.5282 14.7663 85.21 15.6065H85.1156V14.3636H83.6887V22ZM99.353 22.1541C101.018 22.1541 102.197 21.3338 102.535 20.0909L101.128 19.8374C100.859 20.5582 100.213 20.9261 99.3679 20.9261C98.0952 20.9261 97.2401 20.1009 97.2003 18.6293H102.629V18.1023C102.629 15.343 100.979 14.2642 99.2486 14.2642C97.1207 14.2642 95.7188 15.8849 95.7188 18.2315C95.7188 20.603 97.1009 22.1541 99.353 22.1541ZM97.2053 17.5156C97.2649 16.4318 98.0504 15.4922 99.2585 15.4922C100.412 15.4922 101.168 16.3473 101.173 17.5156H97.2053ZM104.279 22H105.765V17.3366C105.765 16.3374 106.536 15.6165 107.59 15.6165C107.898 15.6165 108.246 15.6712 108.365 15.706V14.2841C108.216 14.2642 107.923 14.2493 107.734 14.2493C106.839 14.2493 106.073 14.7564 105.795 15.5767H105.715V14.3636H104.279V22ZM121.933 15.1293C121.585 12.9517 119.879 11.679 117.727 11.679C115.092 11.679 113.148 13.6527 113.148 16.9091C113.148 20.1655 115.082 22.1392 117.727 22.1392C119.964 22.1392 121.6 20.7372 121.933 18.7237L120.382 18.7188C120.118 20.0213 119.024 20.7372 117.737 20.7372C115.992 20.7372 114.674 19.3999 114.674 16.9091C114.674 14.4382 115.987 13.081 117.742 13.081C119.039 13.081 120.128 13.8118 120.382 15.1293H121.933ZM125.874 22.169C127.137 22.169 127.848 21.5277 128.131 20.956H128.191V22H129.642V16.929C129.642 14.7067 127.892 14.2642 126.679 14.2642C125.297 14.2642 124.025 14.821 123.527 16.2131L124.924 16.5312C125.143 15.9893 125.7 15.4673 126.699 15.4673C127.659 15.4673 128.151 15.9695 128.151 16.8345V16.8693C128.151 17.4112 127.594 17.4013 126.222 17.5604C124.775 17.7294 123.294 18.1072 123.294 19.8423C123.294 21.3438 124.422 22.169 125.874 22.169ZM126.197 20.9759C125.357 20.9759 124.75 20.598 124.75 19.8622C124.75 19.0668 125.456 18.7834 126.316 18.669C126.799 18.6044 127.942 18.4751 128.156 18.2614V19.2457C128.156 20.1506 127.435 20.9759 126.197 20.9759ZM131.622 22H133.109V17.3366C133.109 16.3374 133.879 15.6165 134.933 15.6165C135.242 15.6165 135.59 15.6712 135.709 15.706V14.2841C135.56 14.2642 135.267 14.2493 135.078 14.2493C134.183 14.2493 133.417 14.7564 133.139 15.5767H133.059V14.3636H131.622V22ZM140.013 22.1541C141.679 22.1541 142.857 21.3338 143.195 20.0909L141.788 19.8374C141.52 20.5582 140.873 20.9261 140.028 20.9261C138.755 20.9261 137.9 20.1009 137.86 18.6293H143.289V18.1023C143.289 15.343 141.639 14.2642 139.909 14.2642C137.781 14.2642 136.379 15.8849 136.379 18.2315C136.379 20.603 137.761 22.1541 140.013 22.1541ZM137.865 17.5156C137.925 16.4318 138.711 15.4922 139.919 15.4922C141.072 15.4922 141.828 16.3473 141.833 17.5156H137.865Z" fill="#FAFAFC"/>
                        <path d="M34 22C34 22 35 22 35 21C35 20 34 17 30 17C26 17 25 20 25 21C25 22 26 22 26 22H34ZM26.022 21C26.0146 20.999 26.0073 20.9976 26 20.996C26.001 20.732 26.167 19.966 26.76 19.276C27.312 18.629 28.282 18 30 18C31.717 18 32.687 18.63 33.24 19.276C33.833 19.966 33.998 20.733 34 20.996L33.992 20.998C33.9874 20.9988 33.9827 20.9995 33.978 21H26.022ZM30 15C30.5304 15 31.0391 14.7893 31.4142 14.4142C31.7893 14.0391 32 13.5304 32 13C32 12.4696 31.7893 11.9609 31.4142 11.5858C31.0391 11.2107 30.5304 11 30 11C29.4696 11 28.9609 11.2107 28.5858 11.5858C28.2107 11.9609 28 12.4696 28 13C28 13.5304 28.2107 14.0391 28.5858 14.4142C28.9609 14.7893 29.4696 15 30 15ZM33 13C33 13.394 32.9224 13.7841 32.7716 14.1481C32.6209 14.512 32.3999 14.8427 32.1213 15.1213C31.8427 15.3999 31.512 15.6209 31.1481 15.7716C30.7841 15.9224 30.394 16 30 16C29.606 16 29.2159 15.9224 28.8519 15.7716C28.488 15.6209 28.1573 15.3999 27.8787 15.1213C27.6001 14.8427 27.3791 14.512 27.2284 14.1481C27.0776 13.7841 27 13.394 27 13C27 12.2044 27.3161 11.4413 27.8787 10.8787C28.4413 10.3161 29.2044 10 30 10C30.7956 10 31.5587 10.3161 32.1213 10.8787C32.6839 11.4413 33 12.2044 33 13ZM25.936 17.28C25.536 17.154 25.1236 17.0712 24.706 17.033C24.4713 17.0107 24.2357 16.9997 24 17C20 17 19 20 19 21C19 21.667 19.333 22 20 22H24.216C24.0678 21.6878 23.9938 21.3455 24 21C24 19.99 24.377 18.958 25.09 18.096C25.333 17.802 25.616 17.527 25.936 17.28ZM23.92 18C23.3282 18.8893 23.0084 19.9318 23 21H20C20 20.74 20.164 19.97 20.76 19.276C21.305 18.64 22.252 18.02 23.92 18.001V18ZM20.5 13.5C20.5 12.7044 20.8161 11.9413 21.3787 11.3787C21.9413 10.8161 22.7044 10.5 23.5 10.5C24.2956 10.5 25.0587 10.8161 25.6213 11.3787C26.1839 11.9413 26.5 12.7044 26.5 13.5C26.5 14.2956 26.1839 15.0587 25.6213 15.6213C25.0587 16.1839 24.2956 16.5 23.5 16.5C22.7044 16.5 21.9413 16.1839 21.3787 15.6213C20.8161 15.0587 20.5 14.2956 20.5 13.5ZM23.5 11.5C22.9696 11.5 22.4609 11.7107 22.0858 12.0858C21.7107 12.4609 21.5 12.9696 21.5 13.5C21.5 14.0304 21.7107 14.5391 22.0858 14.9142C22.4609 15.2893 22.9696 15.5 23.5 15.5C24.0304 15.5 24.5391 15.2893 24.9142 14.9142C25.2893 14.5391 25.5 14.0304 25.5 13.5C25.5 12.9696 25.2893 12.4609 24.9142 12.0858C24.5391 11.7107 24.0304 11.5 23.5 11.5Z" fill="white"/>
                        </svg>
                        
                        
                </div>
            </div>
            
        </div>

  
      </div>
    </div>
  </div>



      <!-- The Modal -->
        <div class="modal" id="myModal2g">
            <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
        
                <!-- Modal body -->
                <div class="modal-body">


                    <div class="row">
                        <div class="col">
                            <div stryle="position:absolute; top:-5rem; left:5rem" class="text-center">
                                <svg width="384" height="248" viewBox="0 0 384 248" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect width="384" height="247.437" rx="27.0423" fill="url(#paint0_linear)"/>
                                    <path d="M349.472 54.084C360.3 54.084 369.126 45.3062 369.126 34.4784C369.126 23.6505 360.3 14.8727 349.472 14.8727L349.472 54.084Z" fill="white"/>
                                    <path d="M349.473 24.8062C354.754 24.8062 359.035 29.1365 359.035 34.4783C359.035 39.82 354.754 44.1504 349.473 44.1504L349.473 24.8062Z" fill="#EDEDED"/>
                                    <path d="M349.473 24.8062C343.899 24.8062 339.381 29.1365 339.381 34.4783C339.381 39.82 343.899 44.1504 349.473 44.1504L349.473 24.8062Z" fill="white" fill-opacity="0.51"/>
                                    <path d="M283.406 32.8398H283.287V37.8588H281.902V30.3086H283.849L285.569 35.3277H285.688V30.3086H287.073V37.8588H285.126L283.406 32.8398Z" fill="white"/>
                                    <path d="M290.973 37.9886C290.541 37.9886 290.151 37.9237 289.805 37.7939C289.459 37.6569 289.163 37.4622 288.918 37.2098C288.68 36.9574 288.496 36.651 288.367 36.2904C288.237 35.9298 288.172 35.5224 288.172 35.0681C288.172 34.6138 288.237 34.2063 288.367 33.8458C288.496 33.4852 288.68 33.1787 288.918 32.9263C289.163 32.6739 289.459 32.4828 289.805 32.353C290.151 32.216 290.541 32.1475 290.973 32.1475C291.406 32.1475 291.796 32.216 292.142 32.353C292.488 32.4828 292.78 32.6739 293.018 32.9263C293.263 33.1787 293.451 33.4852 293.58 33.8458C293.71 34.2063 293.775 34.6138 293.775 35.0681C293.775 35.5224 293.71 35.9298 293.58 36.2904C293.451 36.651 293.263 36.9574 293.018 37.2098C292.78 37.4622 292.488 37.6569 292.142 37.7939C291.796 37.9237 291.406 37.9886 290.973 37.9886ZM290.973 36.7988C291.334 36.7988 291.615 36.687 291.817 36.4635C292.019 36.2399 292.12 35.9226 292.12 35.5116V34.6246C292.12 34.2135 292.019 33.8963 291.817 33.6727C291.615 33.4492 291.334 33.3374 290.973 33.3374C290.613 33.3374 290.332 33.4492 290.13 33.6727C289.928 33.8963 289.827 34.2135 289.827 34.6246V35.5116C289.827 35.9226 289.928 36.2399 290.13 36.4635C290.332 36.687 290.613 36.7988 290.973 36.7988Z" fill="white"/>
                                    <path d="M294.539 37.8588V32.2773H295.826V33.0994H295.902C295.988 32.8398 296.111 32.6163 296.27 32.4288C296.435 32.2413 296.666 32.1475 296.962 32.1475C297.503 32.1475 297.834 32.4648 297.957 33.0994H298.022C298.065 32.9696 298.119 32.847 298.184 32.7316C298.249 32.6163 298.328 32.5153 298.422 32.4288C298.516 32.3422 298.628 32.2737 298.757 32.2232C298.887 32.1728 299.039 32.1475 299.212 32.1475C299.991 32.1475 300.38 32.7208 300.38 33.8674V37.8588H299.093V34.0297C299.093 33.7701 299.046 33.5898 298.952 33.4888C298.866 33.3806 298.75 33.3266 298.606 33.3266C298.469 33.3266 298.35 33.3734 298.249 33.4672C298.155 33.5537 298.108 33.6907 298.108 33.8782V37.8588H296.81V34.0297C296.81 33.7701 296.767 33.5898 296.681 33.4888C296.601 33.3806 296.489 33.3266 296.345 33.3266C296.201 33.3266 296.078 33.3734 295.977 33.4672C295.877 33.5537 295.826 33.6907 295.826 33.8782V37.8588H294.539Z" fill="white"/>
                                    <path d="M304.291 31.5634C303.931 31.5634 303.679 31.4913 303.534 31.3471C303.397 31.1956 303.329 31.0154 303.329 30.8062V30.4925C303.329 30.2762 303.397 30.0959 303.534 29.9517C303.679 29.8075 303.931 29.7354 304.291 29.7354C304.652 29.7354 304.901 29.8075 305.038 29.9517C305.182 30.0959 305.254 30.2762 305.254 30.4925V30.8062C305.254 31.0154 305.182 31.1956 305.038 31.3471C304.901 31.4913 304.652 31.5634 304.291 31.5634ZM301.717 36.6149H303.491V33.5213H301.717V32.2773H305.092V36.6149H306.736V37.8588H301.717V36.6149Z" fill="white"/>
                                    <path d="M308.019 30.3086H310.669C311.412 30.3086 311.978 30.4889 312.367 30.8495C312.764 31.2101 312.962 31.7004 312.962 32.3206C312.962 32.7533 312.854 33.0994 312.638 33.359C312.429 33.6114 312.126 33.7953 311.729 33.9107V33.9756C312.198 34.091 312.559 34.2929 312.811 34.5813C313.071 34.8698 313.2 35.27 313.2 35.782C313.2 36.4166 312.998 36.9214 312.595 37.2964C312.198 37.6714 311.639 37.8588 310.918 37.8588H308.019V30.3086ZM310.42 36.7231C310.81 36.7231 311.095 36.6582 311.275 36.5284C311.455 36.3986 311.545 36.1606 311.545 35.8145V35.5008C311.545 35.1546 311.455 34.9166 311.275 34.7868C311.095 34.657 310.81 34.5921 310.42 34.5921H309.598V36.7231H310.42ZM310.215 33.5105C310.597 33.5105 310.875 33.4492 311.048 33.3266C311.221 33.1968 311.307 32.966 311.307 32.6343V32.3098C311.307 31.9781 311.221 31.7509 311.048 31.6283C310.875 31.5057 310.597 31.4444 310.215 31.4444H309.598V33.5105H310.215Z" fill="white"/>
                                    <path d="M318.94 37.8588C318.608 37.8588 318.341 37.7759 318.139 37.6101C317.938 37.437 317.819 37.1918 317.783 36.8745H317.728C317.627 37.2423 317.426 37.5199 317.123 37.7074C316.827 37.8949 316.463 37.9886 316.03 37.9886C315.489 37.9886 315.053 37.8444 314.721 37.556C314.397 37.2603 314.235 36.8493 314.235 36.3228C314.235 35.7387 314.447 35.3061 314.873 35.0248C315.298 34.7436 315.922 34.603 316.744 34.603H317.642V34.3217C317.642 33.99 317.563 33.7412 317.404 33.5754C317.252 33.4023 316.993 33.3157 316.625 33.3157C316.286 33.3157 316.012 33.3806 315.803 33.5105C315.594 33.6403 315.414 33.8097 315.262 34.0188L314.386 33.24C314.573 32.9227 314.866 32.6631 315.262 32.4612C315.666 32.2521 316.182 32.1475 316.809 32.1475C317.573 32.1475 318.168 32.3242 318.594 32.6775C319.026 33.0237 319.243 33.5501 319.243 34.2568V36.7014H319.859V37.8588H318.94ZM316.636 36.9394C316.917 36.9394 317.155 36.8709 317.35 36.7339C317.545 36.5969 317.642 36.3986 317.642 36.139V35.4683H316.787C316.131 35.4683 315.803 35.6883 315.803 36.1281V36.3445C315.803 36.5392 315.879 36.687 316.03 36.788C316.182 36.8889 316.384 36.9394 316.636 36.9394Z" fill="white"/>
                                    <path d="M320.861 37.8588V32.2773H322.462V33.2941H322.527C322.592 33.1355 322.671 32.9876 322.765 32.8506C322.859 32.7136 322.97 32.5946 323.1 32.4937C323.237 32.3855 323.392 32.3026 323.565 32.2449C323.746 32.18 323.948 32.1475 324.171 32.1475C324.438 32.1475 324.683 32.1944 324.907 32.2881C325.13 32.3747 325.321 32.5081 325.48 32.6884C325.639 32.8686 325.761 33.0886 325.848 33.3482C325.941 33.6078 325.988 33.9071 325.988 34.246V37.8588H324.387V34.4623C324.387 33.7412 324.074 33.3806 323.446 33.3806C323.324 33.3806 323.201 33.3987 323.079 33.4347C322.963 33.4636 322.859 33.5141 322.765 33.5862C322.671 33.6511 322.595 33.734 322.538 33.835C322.487 33.9359 322.462 34.0549 322.462 34.1919V37.8588H320.861Z" fill="white"/>
                                    <path d="M327.347 29.8543H328.948V34.3974H329.024L329.77 33.5213L330.938 32.2773H332.777L330.614 34.484L333.004 37.8588H331.1L329.478 35.3926L328.948 35.9226V37.8588H327.347V29.8543Z" fill="white"/>
                                    <path d="M316.993 207.648H309.432V206.253L313.213 202.846C313.764 202.348 314.219 201.84 314.576 201.321C314.933 200.791 315.111 200.233 315.111 199.649V199.455C315.111 198.773 314.933 198.249 314.576 197.881C314.219 197.502 313.689 197.313 312.986 197.313C312.293 197.313 311.758 197.491 311.379 197.848C311.012 198.194 310.736 198.66 310.552 199.244L309.335 198.789C309.443 198.454 309.589 198.13 309.773 197.816C309.968 197.491 310.211 197.205 310.503 196.956C310.795 196.707 311.147 196.507 311.558 196.356C311.98 196.204 312.466 196.128 313.018 196.128C313.581 196.128 314.078 196.21 314.511 196.372C314.954 196.534 315.322 196.761 315.614 197.053C315.917 197.345 316.144 197.691 316.296 198.092C316.458 198.492 316.539 198.93 316.539 199.406C316.539 199.839 316.474 200.244 316.344 200.623C316.225 201.001 316.052 201.364 315.825 201.71C315.609 202.056 315.344 202.397 315.03 202.732C314.727 203.057 314.386 203.381 314.008 203.706L310.844 206.464H316.993V207.648ZM326.722 207.648H319.161V206.253L322.942 202.846C323.493 202.348 323.948 201.84 324.305 201.321C324.662 200.791 324.84 200.233 324.84 199.649V199.455C324.84 198.773 324.662 198.249 324.305 197.881C323.948 197.502 323.418 197.313 322.714 197.313C322.022 197.313 321.487 197.491 321.108 197.848C320.74 198.194 320.465 198.66 320.281 199.244L319.064 198.789C319.172 198.454 319.318 198.13 319.502 197.816C319.697 197.491 319.94 197.205 320.232 196.956C320.524 196.707 320.876 196.507 321.287 196.356C321.709 196.204 322.195 196.128 322.747 196.128C323.309 196.128 323.807 196.21 324.24 196.372C324.683 196.534 325.051 196.761 325.343 197.053C325.646 197.345 325.873 197.691 326.024 198.092C326.187 198.492 326.268 198.93 326.268 199.406C326.268 199.839 326.203 200.244 326.073 200.623C325.954 201.001 325.781 201.364 325.554 201.71C325.338 202.056 325.073 202.397 324.759 202.732C324.456 203.057 324.115 203.381 323.737 203.706L320.573 206.464H326.722V207.648ZM329.198 209.888L334.845 195.317H336.013L330.367 209.888H329.198ZM342.334 207.843C341.642 207.843 341.047 207.713 340.55 207.454C340.052 207.183 339.641 206.799 339.317 206.302C338.992 205.804 338.754 205.193 338.603 204.468C338.451 203.744 338.376 202.916 338.376 201.986C338.376 201.066 338.451 200.244 338.603 199.52C338.754 198.784 338.992 198.167 339.317 197.67C339.641 197.172 340.052 196.794 340.55 196.534C341.047 196.264 341.642 196.128 342.334 196.128C343.027 196.128 343.622 196.264 344.119 196.534C344.617 196.794 345.028 197.172 345.352 197.67C345.677 198.167 345.915 198.784 346.066 199.52C346.218 200.244 346.293 201.066 346.293 201.986C346.293 202.916 346.218 203.744 346.066 204.468C345.915 205.193 345.677 205.804 345.352 206.302C345.028 206.799 344.617 207.183 344.119 207.454C343.622 207.713 343.027 207.843 342.334 207.843ZM342.334 206.659C342.789 206.659 343.178 206.572 343.503 206.399C343.827 206.215 344.087 205.961 344.282 205.636C344.487 205.312 344.638 204.923 344.736 204.468C344.833 204.003 344.882 203.484 344.882 202.911V201.061C344.882 200.498 344.833 199.985 344.736 199.52C344.638 199.054 344.487 198.66 344.282 198.335C344.087 198.011 343.827 197.762 343.503 197.589C343.178 197.405 342.789 197.313 342.334 197.313C341.88 197.313 341.491 197.405 341.166 197.589C340.842 197.762 340.577 198.011 340.371 198.335C340.177 198.66 340.03 199.054 339.933 199.52C339.836 199.985 339.787 200.498 339.787 201.061V202.911C339.787 203.484 339.836 204.003 339.933 204.468C340.03 204.923 340.177 205.312 340.371 205.636C340.577 205.961 340.842 206.215 341.166 206.399C341.491 206.572 341.88 206.659 342.334 206.659ZM342.334 202.943C341.956 202.943 341.691 202.867 341.539 202.716C341.399 202.564 341.329 202.381 341.329 202.164V201.807C341.329 201.591 341.399 201.407 341.539 201.256C341.691 201.104 341.956 201.028 342.334 201.028C342.713 201.028 342.973 201.104 343.113 201.256C343.265 201.407 343.34 201.591 343.34 201.807V202.164C343.34 202.381 343.265 202.564 343.113 202.716C342.973 202.867 342.713 202.943 342.334 202.943ZM348.575 207.648V206.464H351.82V197.329H351.706L348.851 199.99L348.056 199.13L351.057 196.323H353.183V206.464H356.168V207.648H348.575Z" fill="white"/>
                                    <path d="M33.2292 206.491C32.2124 206.491 31.3795 206.307 30.7305 205.939C30.0815 205.56 29.546 205.079 29.1242 204.495L30.1139 203.684C30.5574 204.235 31.0225 204.646 31.5093 204.917C32.0069 205.187 32.5964 205.322 33.2779 205.322C34.1 205.322 34.7273 205.133 35.16 204.754C35.5927 204.376 35.809 203.846 35.809 203.164C35.809 202.613 35.6522 202.185 35.3385 201.883C35.0248 201.569 34.4786 201.347 33.6997 201.217L32.4342 201.006C31.8825 200.909 31.4174 200.763 31.0388 200.568C30.671 200.374 30.3735 200.141 30.1464 199.871C29.9192 199.589 29.757 199.287 29.6596 198.962C29.5623 198.627 29.5136 198.281 29.5136 197.924C29.5136 196.885 29.8543 196.101 30.5358 195.571C31.2173 195.041 32.1367 194.776 33.2941 194.776C34.2027 194.776 34.9653 194.927 35.5819 195.23C36.2093 195.533 36.7122 195.96 37.0908 196.512L36.1335 197.34C35.8198 196.928 35.4413 196.593 34.9978 196.334C34.5543 196.074 33.981 195.944 33.2779 195.944C32.5099 195.944 31.9204 196.106 31.5093 196.431C31.0983 196.755 30.8927 197.242 30.8927 197.891C30.8927 198.4 31.0442 198.816 31.3471 199.141C31.6607 199.454 32.2178 199.681 33.0183 199.822L34.2352 200.033C34.7868 200.13 35.252 200.276 35.6305 200.471C36.0091 200.666 36.312 200.898 36.5392 201.169C36.7771 201.439 36.9448 201.742 37.0422 202.077C37.1395 202.413 37.1882 202.764 37.1882 203.132C37.1882 204.181 36.842 205.003 36.1498 205.598C35.4683 206.193 34.4948 206.491 33.2292 206.491ZM42.9905 206.442C42.547 206.442 42.2333 206.35 42.0495 206.166C41.8764 205.982 41.7898 205.75 41.7898 205.468V205.176C41.7898 204.895 41.8764 204.663 42.0495 204.479C42.2333 204.295 42.547 204.203 42.9905 204.203C43.434 204.203 43.7423 204.295 43.9154 204.479C44.0993 204.663 44.1912 204.895 44.1912 205.176V205.468C44.1912 205.75 44.0993 205.982 43.9154 206.166C43.7423 206.35 43.434 206.442 42.9905 206.442ZM55.2343 200.617V197.031H55.1045L52.7194 202.856L50.3343 197.031H50.2045V200.617V206.296H48.9551V194.971H50.7074L52.7032 199.968H52.8005L54.7962 194.971H56.4837V206.296H55.2343V200.617ZM62.4483 206.491C61.756 206.491 61.1611 206.361 60.6635 206.101C60.1659 205.831 59.7549 205.447 59.4304 204.949C59.1058 204.452 58.8679 203.84 58.7164 203.116C58.565 202.391 58.4893 201.564 58.4893 200.633C58.4893 199.714 58.565 198.892 58.7164 198.167C58.8679 197.431 59.1058 196.815 59.4304 196.317C59.7549 195.82 60.1659 195.441 60.6635 195.182C61.1611 194.911 61.756 194.776 62.4483 194.776C63.1405 194.776 63.7355 194.911 64.2331 195.182C64.7306 195.441 65.1417 195.82 65.4662 196.317C65.7907 196.815 66.0287 197.431 66.1801 198.167C66.3315 198.892 66.4073 199.714 66.4073 200.633C66.4073 201.564 66.3315 202.391 66.1801 203.116C66.0287 203.84 65.7907 204.452 65.4662 204.949C65.1417 205.447 64.7306 205.831 64.2331 206.101C63.7355 206.361 63.1405 206.491 62.4483 206.491ZM62.4483 205.306C62.9026 205.306 63.2866 205.22 63.6003 205.047C63.914 204.863 64.1736 204.608 64.3791 204.284C64.5846 203.959 64.7306 203.57 64.8172 203.116C64.9145 202.651 64.9632 202.131 64.9632 201.558V199.708C64.9632 199.146 64.9145 198.632 64.8172 198.167C64.7306 197.702 64.5846 197.307 64.3791 196.983C64.1736 196.658 63.914 196.409 63.6003 196.236C63.2866 196.052 62.9026 195.96 62.4483 195.96C61.994 195.96 61.61 196.052 61.2963 196.236C60.9826 196.409 60.723 196.658 60.5174 196.983C60.3119 197.307 60.1605 197.702 60.0631 198.167C59.9766 198.632 59.9333 199.146 59.9333 199.708V201.558C59.9333 202.131 59.9766 202.651 60.0631 203.116C60.1605 203.57 60.3119 203.959 60.5174 204.284C60.723 204.608 60.9826 204.863 61.2963 205.047C61.61 205.22 61.994 205.306 62.4483 205.306ZM72.1447 206.491C71.1279 206.491 70.295 206.307 69.646 205.939C68.997 205.56 68.4615 205.079 68.0397 204.495L69.0294 203.684C69.4729 204.235 69.938 204.646 70.4248 204.917C70.9224 205.187 71.5119 205.322 72.1934 205.322C73.0154 205.322 73.6428 205.133 74.0755 204.754C74.5082 204.376 74.7245 203.846 74.7245 203.164C74.7245 202.613 74.5677 202.185 74.254 201.883C73.9403 201.569 73.394 201.347 72.6152 201.217L71.3496 201.006C70.798 200.909 70.3329 200.763 69.9543 200.568C69.5865 200.374 69.289 200.141 69.0619 199.871C68.8347 199.589 68.6725 199.287 68.5751 198.962C68.4778 198.627 68.4291 198.281 68.4291 197.924C68.4291 196.885 68.7698 196.101 69.4513 195.571C70.1327 195.041 71.0522 194.776 72.2096 194.776C73.1182 194.776 73.8808 194.927 74.4974 195.23C75.1247 195.533 75.6277 195.96 76.0063 196.512L75.049 197.34C74.7353 196.928 74.3567 196.593 73.9133 196.334C73.4698 196.074 72.8965 195.944 72.1934 195.944C71.4254 195.944 70.8358 196.106 70.4248 196.431C70.0138 196.755 69.8082 197.242 69.8082 197.891C69.8082 198.4 69.9597 198.816 70.2625 199.141C70.5762 199.454 71.1333 199.681 71.9338 199.822L73.1507 200.033C73.7023 200.13 74.1674 200.276 74.546 200.471C74.9246 200.666 75.2275 200.898 75.4547 201.169C75.6926 201.439 75.8603 201.742 75.9576 202.077C76.055 202.413 76.1037 202.764 76.1037 203.132C76.1037 204.181 75.7575 205.003 75.0653 205.598C74.3838 206.193 73.4103 206.491 72.1447 206.491ZM82.5875 196.155V206.296H81.2245V196.155H77.444V194.971H86.368V196.155H82.5875ZM94.5717 206.296L93.6144 203.067H89.6392L88.6819 206.296H87.2703L90.7425 194.971H92.5435L96.0157 206.296H94.5717ZM91.6998 196.415H91.5538L89.9637 201.883H93.2899L91.6998 196.415ZM97.9564 206.296V194.971H105.096V196.155H99.3194V199.968H104.609V201.152H99.3194V206.296H97.9564ZM114.029 206.296L113.072 203.067H109.097L108.14 206.296H106.728L110.2 194.971H112.001L115.473 206.296H114.029ZM111.158 196.415H111.012L109.421 201.883H112.748L111.158 196.415ZM127.143 206.296V194.971H134.12V196.155H128.506V199.968H133.925V201.152H128.506V205.111H134.12V206.296H127.143ZM140.247 206.491C139.23 206.491 138.397 206.307 137.748 205.939C137.099 205.56 136.564 205.079 136.142 204.495L137.132 203.684C137.575 204.235 138.04 204.646 138.527 204.917C139.024 205.187 139.614 205.322 140.295 205.322C141.118 205.322 141.745 205.133 142.178 204.754C142.61 204.376 142.827 203.846 142.827 203.164C142.827 202.613 142.67 202.185 142.356 201.883C142.042 201.569 141.496 201.347 140.717 201.217L139.452 201.006C138.9 200.909 138.435 200.763 138.056 200.568C137.689 200.374 137.391 200.141 137.164 199.871C136.937 199.589 136.775 199.287 136.677 198.962C136.58 198.627 136.531 198.281 136.531 197.924C136.531 196.885 136.872 196.101 137.553 195.571C138.235 195.041 139.154 194.776 140.312 194.776C141.22 194.776 141.983 194.927 142.599 195.23C143.227 195.533 143.73 195.96 144.108 196.512L143.151 197.34C142.837 196.928 142.459 196.593 142.015 196.334C141.572 196.074 140.999 195.944 140.295 195.944C139.527 195.944 138.938 196.106 138.527 196.431C138.116 196.755 137.91 197.242 137.91 197.891C137.91 198.4 138.062 198.816 138.365 199.141C138.678 199.454 139.235 199.681 140.036 199.822L141.253 200.033C141.804 200.13 142.27 200.276 142.648 200.471C143.027 200.666 143.33 200.898 143.557 201.169C143.795 201.439 143.962 201.742 144.06 202.077C144.157 202.413 144.206 202.764 144.206 203.132C144.206 204.181 143.86 205.003 143.167 205.598C142.486 206.193 141.512 206.491 140.247 206.491ZM152.523 200.617V197.031H152.393L150.008 202.856L147.623 197.031H147.493V200.617V206.296H146.244V194.971H147.996L149.992 199.968H150.089L152.085 194.971H153.772V206.296H152.523V200.617ZM162.674 206.296L161.716 203.067H157.741L156.784 206.296H155.372L158.845 194.971H160.646L164.118 206.296H162.674ZM159.802 196.415H159.656L158.066 201.883H161.392L159.802 196.415ZM166.059 206.296V194.971H173.035V196.155H167.421V199.968H172.841V201.152H167.421V205.111H173.035V206.296H166.059ZM175.69 206.296V205.209H178.513V196.058H175.69V194.971H182.699V196.058H179.876V205.209H182.699V206.296H175.69ZM186.003 206.296V194.971H187.366V205.111H192.737V206.296H186.003ZM195.148 206.296V205.209H197.971V196.058H195.148V194.971H202.157V196.058H199.334V205.209H202.157V206.296H195.148Z" fill="white"/>
                                    <path d="M33.8019 172.688C33.1205 172.688 32.5093 172.585 31.9685 172.38C31.4384 172.163 30.9895 171.86 30.6218 171.471C30.254 171.071 29.9727 170.595 29.778 170.043C29.5833 169.491 29.486 168.875 29.486 168.193C29.486 167.404 29.6104 166.657 29.8592 165.954C30.108 165.24 30.427 164.586 30.8165 163.991C31.2167 163.385 31.6602 162.844 32.1469 162.369C32.6445 161.893 33.1367 161.492 33.6234 161.168H36.9821C36.279 161.655 35.6462 162.125 35.0837 162.579C34.5321 163.023 34.0453 163.472 33.6234 163.926C33.2124 164.37 32.8717 164.829 32.6012 165.305C32.3416 165.781 32.1523 166.295 32.0334 166.847L32.1794 166.895C32.2767 166.679 32.3957 166.468 32.5363 166.263C32.677 166.057 32.85 165.879 33.0556 165.727C33.2611 165.565 33.499 165.435 33.7695 165.338C34.0507 165.24 34.3752 165.192 34.743 165.192C35.2189 165.192 35.6624 165.278 36.0735 165.451C36.4845 165.614 36.8361 165.852 37.1281 166.165C37.431 166.468 37.669 166.836 37.842 167.269C38.0151 167.701 38.1016 168.188 38.1016 168.729C38.1016 169.302 37.9989 169.832 37.7934 170.319C37.5878 170.806 37.2958 171.228 36.9172 171.585C36.5494 171.931 36.1005 172.201 35.5705 172.396C35.0405 172.591 34.4509 172.688 33.8019 172.688ZM33.7857 170.79C34.3698 170.79 34.8133 170.638 35.1162 170.335C35.419 170.022 35.5705 169.583 35.5705 169.021V168.794C35.5705 168.231 35.4136 167.804 35.1 167.512C34.7971 167.209 34.359 167.058 33.7857 167.058C33.234 167.058 32.8014 167.209 32.4877 167.512C32.174 167.804 32.0171 168.231 32.0171 168.794V169.021C32.0171 169.583 32.1632 170.022 32.4552 170.335C32.7581 170.638 33.2016 170.79 33.7857 170.79ZM53.0118 172.493H44.8667V170.27L48.4363 167.301C49.0528 166.771 49.4963 166.311 49.7667 165.922C50.0372 165.532 50.1724 165.121 50.1724 164.689V164.527C50.1724 164.051 50.0318 163.694 49.7505 163.456C49.4693 163.207 49.0907 163.082 48.6147 163.082C48.0739 163.082 47.6574 163.239 47.3654 163.553C47.0733 163.867 46.8678 164.24 46.7488 164.673L44.6233 163.861C44.7531 163.472 44.9316 163.104 45.1587 162.758C45.3859 162.401 45.6725 162.093 46.0187 161.833C46.3756 161.574 46.7867 161.368 47.2518 161.217C47.7169 161.054 48.2524 160.973 48.8581 160.973C49.4747 160.973 50.0263 161.06 50.5131 161.233C50.9999 161.406 51.4109 161.644 51.7462 161.947C52.0816 162.25 52.3358 162.612 52.5088 163.034C52.6819 163.445 52.7684 163.894 52.7684 164.38C52.7684 164.856 52.6873 165.295 52.525 165.695C52.3736 166.084 52.1573 166.452 51.876 166.798C51.6056 167.144 51.2811 167.48 50.9025 167.804C50.5347 168.129 50.1399 168.453 49.7181 168.778L47.5601 170.449H53.0118V172.493ZM60.6692 172.493V170.53H63.7196V162.936H63.5736L61.2696 165.954L59.7119 164.737L62.4216 161.168H66.1534V170.53H68.5548V172.493H60.6692ZM83.4 165.468C83.4 166.268 83.2756 167.02 83.0269 167.723C82.7781 168.426 82.4536 169.08 82.0533 169.686C81.6639 170.281 81.2204 170.817 80.7229 171.292C80.2361 171.768 79.7493 172.169 79.2626 172.493H75.9039C76.607 172.006 77.2344 171.541 77.7861 171.098C78.3485 170.643 78.8353 170.195 79.2463 169.751C79.6682 169.297 80.0089 168.832 80.2685 168.356C80.539 167.88 80.7337 167.366 80.8527 166.814L80.7066 166.766C80.6093 166.982 80.4849 167.193 80.3334 167.398C80.1928 167.604 80.0198 167.788 79.8142 167.95C79.6195 168.102 79.3816 168.226 79.1003 168.323C78.8299 168.421 78.5108 168.469 78.143 168.469C77.6671 168.469 77.2236 168.388 76.8125 168.226C76.4015 168.053 76.0445 167.815 75.7417 167.512C75.4496 167.198 75.217 166.825 75.044 166.392C74.8709 165.96 74.7844 165.473 74.7844 164.932C74.7844 164.359 74.8871 163.829 75.0927 163.342C75.2982 162.855 75.5848 162.439 75.9526 162.093C76.3312 161.736 76.7855 161.46 77.3155 161.265C77.8456 161.071 78.4351 160.973 79.0841 160.973C79.7656 160.973 80.3713 161.081 80.9013 161.298C81.4422 161.503 81.8965 161.806 82.2643 162.206C82.632 162.596 82.9133 163.066 83.108 163.618C83.3027 164.17 83.4 164.786 83.4 165.468ZM79.1003 166.603C79.652 166.603 80.0847 166.457 80.3983 166.165C80.712 165.862 80.8689 165.43 80.8689 164.867V164.64C80.8689 164.078 80.7174 163.645 80.4146 163.342C80.1225 163.028 79.6844 162.872 79.1003 162.872C78.5162 162.872 78.0727 163.028 77.7698 163.342C77.467 163.645 77.3155 164.078 77.3155 164.64V164.867C77.3155 165.43 77.467 165.862 77.7698 166.165C78.0835 166.457 78.527 166.603 79.1003 166.603ZM124.561 172.688C123.88 172.688 123.274 172.607 122.744 172.444C122.214 172.271 121.765 172.039 121.397 171.747C121.029 171.455 120.748 171.109 120.553 170.708C120.369 170.297 120.277 169.854 120.277 169.378C120.277 168.642 120.488 168.053 120.91 167.609C121.332 167.155 121.873 166.836 122.533 166.652V166.522C121.97 166.317 121.511 166.003 121.154 165.581C120.797 165.159 120.618 164.618 120.618 163.959C120.618 163.526 120.705 163.126 120.878 162.758C121.051 162.39 121.305 162.076 121.64 161.817C121.976 161.546 122.387 161.341 122.874 161.2C123.36 161.049 123.923 160.973 124.561 160.973C125.188 160.973 125.745 161.049 126.232 161.2C126.73 161.341 127.146 161.546 127.482 161.817C127.817 162.076 128.071 162.39 128.244 162.758C128.417 163.126 128.504 163.526 128.504 163.959C128.504 164.618 128.325 165.159 127.968 165.581C127.611 166.003 127.152 166.317 126.589 166.522V166.652C127.249 166.836 127.79 167.155 128.212 167.609C128.634 168.053 128.844 168.642 128.844 169.378C128.844 169.854 128.747 170.297 128.552 170.708C128.369 171.109 128.093 171.455 127.725 171.747C127.357 172.039 126.908 172.271 126.378 172.444C125.848 172.607 125.242 172.688 124.561 172.688ZM124.561 170.822C125.123 170.822 125.551 170.692 125.843 170.433C126.146 170.173 126.297 169.821 126.297 169.378V169.053C126.297 168.599 126.151 168.248 125.859 167.999C125.567 167.739 125.134 167.609 124.561 167.609C123.988 167.609 123.555 167.739 123.263 167.999C122.971 168.248 122.825 168.599 122.825 169.053V169.378C122.825 169.821 122.971 170.173 123.263 170.433C123.566 170.692 123.998 170.822 124.561 170.822ZM124.561 165.825C125.102 165.825 125.513 165.7 125.794 165.451C126.075 165.203 126.216 164.867 126.216 164.445V164.202C126.216 163.78 126.07 163.45 125.778 163.212C125.497 162.963 125.091 162.839 124.561 162.839C124.031 162.839 123.62 162.963 123.328 163.212C123.047 163.45 122.906 163.78 122.906 164.202V164.445C122.906 164.867 123.047 165.203 123.328 165.451C123.609 165.7 124.02 165.825 124.561 165.825ZM139.763 172.688C139.082 172.688 138.471 172.585 137.93 172.38C137.4 172.163 136.951 171.86 136.583 171.471C136.215 171.071 135.934 170.595 135.739 170.043C135.545 169.491 135.447 168.875 135.447 168.193C135.447 167.404 135.572 166.657 135.82 165.954C136.069 165.24 136.388 164.586 136.778 163.991C137.178 163.385 137.621 162.844 138.108 162.369C138.606 161.893 139.098 161.492 139.585 161.168H142.943C142.24 161.655 141.607 162.125 141.045 162.579C140.493 163.023 140.007 163.472 139.585 163.926C139.174 164.37 138.833 164.829 138.563 165.305C138.303 165.781 138.114 166.295 137.995 166.847L138.141 166.895C138.238 166.679 138.357 166.468 138.498 166.263C138.638 166.057 138.811 165.879 139.017 165.727C139.222 165.565 139.46 165.435 139.731 165.338C140.012 165.24 140.336 165.192 140.704 165.192C141.18 165.192 141.624 165.278 142.035 165.451C142.446 165.614 142.797 165.852 143.089 166.165C143.392 166.468 143.63 166.836 143.803 167.269C143.976 167.701 144.063 168.188 144.063 168.729C144.063 169.302 143.96 169.832 143.755 170.319C143.549 170.806 143.257 171.228 142.878 171.585C142.511 171.931 142.062 172.201 141.532 172.396C141.002 172.591 140.412 172.688 139.763 172.688ZM139.747 170.79C140.331 170.79 140.775 170.638 141.077 170.335C141.38 170.022 141.532 169.583 141.532 169.021V168.794C141.532 168.231 141.375 167.804 141.061 167.512C140.758 167.209 140.32 167.058 139.747 167.058C139.195 167.058 138.763 167.209 138.449 167.512C138.135 167.804 137.978 168.231 137.978 168.794V169.021C137.978 169.583 138.124 170.022 138.416 170.335C138.719 170.638 139.163 170.79 139.747 170.79ZM151.493 172.493V170.53H154.544V162.936H154.398L152.094 165.954L150.536 164.737L153.246 161.168H156.977V170.53H159.379V172.493H151.493ZM169.973 172.688C168.459 172.688 167.339 172.174 166.614 171.146C165.9 170.119 165.543 168.68 165.543 166.831C165.543 164.981 165.9 163.542 166.614 162.515C167.339 161.487 168.459 160.973 169.973 160.973C171.487 160.973 172.601 161.487 173.315 162.515C174.04 163.542 174.402 164.981 174.402 166.831C174.402 168.68 174.04 170.119 173.315 171.146C172.601 172.174 171.487 172.688 169.973 172.688ZM169.973 170.773C170.698 170.773 171.201 170.519 171.482 170.011C171.774 169.502 171.92 168.794 171.92 167.885V165.776C171.92 164.867 171.774 164.159 171.482 163.65C171.201 163.142 170.698 162.888 169.973 162.888C169.248 162.888 168.74 163.142 168.448 163.65C168.167 164.159 168.026 164.867 168.026 165.776V167.885C168.026 168.794 168.167 169.502 168.448 170.011C168.74 170.519 169.248 170.773 169.973 170.773ZM169.973 167.788C169.594 167.788 169.329 167.712 169.178 167.561C169.037 167.409 168.967 167.225 168.967 167.009V166.652C168.967 166.436 169.037 166.252 169.178 166.1C169.329 165.949 169.594 165.873 169.973 165.873C170.352 165.873 170.611 165.949 170.752 166.1C170.903 166.252 170.979 166.436 170.979 166.652V167.009C170.979 167.225 170.903 167.409 170.752 167.561C170.611 167.712 170.352 167.788 169.973 167.788ZM219.522 172.493H211.377V170.27L214.947 167.301C215.563 166.771 216.007 166.311 216.277 165.922C216.548 165.532 216.683 165.121 216.683 164.689V164.527C216.683 164.051 216.542 163.694 216.261 163.456C215.98 163.207 215.601 163.082 215.125 163.082C214.584 163.082 214.168 163.239 213.876 163.553C213.584 163.867 213.378 164.24 213.259 164.673L211.134 163.861C211.264 163.472 211.442 163.104 211.669 162.758C211.896 162.401 212.183 162.093 212.529 161.833C212.886 161.574 213.297 161.368 213.762 161.217C214.228 161.054 214.763 160.973 215.369 160.973C215.985 160.973 216.537 161.06 217.024 161.233C217.51 161.406 217.921 161.644 218.257 161.947C218.592 162.25 218.846 162.612 219.019 163.034C219.192 163.445 219.279 163.894 219.279 164.38C219.279 164.856 219.198 165.295 219.036 165.695C218.884 166.084 218.668 166.452 218.387 166.798C218.116 167.144 217.792 167.48 217.413 167.804C217.045 168.129 216.65 168.453 216.229 168.778L214.071 170.449H219.522V172.493ZM230.522 172.688C229.841 172.688 229.235 172.607 228.705 172.444C228.175 172.271 227.726 172.039 227.358 171.747C226.991 171.455 226.709 171.109 226.515 170.708C226.331 170.297 226.239 169.854 226.239 169.378C226.239 168.642 226.45 168.053 226.872 167.609C227.293 167.155 227.834 166.836 228.494 166.652V166.522C227.932 166.317 227.472 166.003 227.115 165.581C226.758 165.159 226.579 164.618 226.579 163.959C226.579 163.526 226.666 163.126 226.839 162.758C227.012 162.39 227.266 162.076 227.602 161.817C227.937 161.546 228.348 161.341 228.835 161.2C229.322 161.049 229.884 160.973 230.522 160.973C231.15 160.973 231.707 161.049 232.193 161.2C232.691 161.341 233.107 161.546 233.443 161.817C233.778 162.076 234.032 162.39 234.205 162.758C234.378 163.126 234.465 163.526 234.465 163.959C234.465 164.618 234.287 165.159 233.93 165.581C233.573 166.003 233.113 166.317 232.55 166.522V166.652C233.21 166.836 233.751 167.155 234.173 167.609C234.595 168.053 234.806 168.642 234.806 169.378C234.806 169.854 234.708 170.297 234.514 170.708C234.33 171.109 234.054 171.455 233.686 171.747C233.318 172.039 232.869 172.271 232.339 172.444C231.809 172.607 231.204 172.688 230.522 172.688ZM230.522 170.822C231.085 170.822 231.512 170.692 231.804 170.433C232.107 170.173 232.258 169.821 232.258 169.378V169.053C232.258 168.599 232.112 168.248 231.82 167.999C231.528 167.739 231.096 167.609 230.522 167.609C229.949 167.609 229.516 167.739 229.224 167.999C228.932 168.248 228.786 168.599 228.786 169.053V169.378C228.786 169.821 228.932 170.173 229.224 170.433C229.527 170.692 229.96 170.822 230.522 170.822ZM230.522 165.825C231.063 165.825 231.474 165.7 231.755 165.451C232.037 165.203 232.177 164.867 232.177 164.445V164.202C232.177 163.78 232.031 163.45 231.739 163.212C231.458 162.963 231.052 162.839 230.522 162.839C229.992 162.839 229.581 162.963 229.289 163.212C229.008 163.45 228.867 163.78 228.867 164.202V164.445C228.867 164.867 229.008 165.203 229.289 165.451C229.57 165.7 229.981 165.825 230.522 165.825ZM245.66 172.688C244.978 172.688 244.372 172.607 243.842 172.444C243.312 172.271 242.863 172.039 242.496 171.747C242.128 171.455 241.847 171.109 241.652 170.708C241.468 170.297 241.376 169.854 241.376 169.378C241.376 168.642 241.587 168.053 242.009 167.609C242.431 167.155 242.972 166.836 243.631 166.652V166.522C243.069 166.317 242.609 166.003 242.252 165.581C241.895 165.159 241.717 164.618 241.717 163.959C241.717 163.526 241.803 163.126 241.976 162.758C242.149 162.39 242.404 162.076 242.739 161.817C243.074 161.546 243.485 161.341 243.972 161.2C244.459 161.049 245.021 160.973 245.66 160.973C246.287 160.973 246.844 161.049 247.331 161.2C247.828 161.341 248.245 161.546 248.58 161.817C248.915 162.076 249.17 162.39 249.343 162.758C249.516 163.126 249.602 163.526 249.602 163.959C249.602 164.618 249.424 165.159 249.067 165.581C248.71 166.003 248.25 166.317 247.688 166.522V166.652C248.348 166.836 248.888 167.155 249.31 167.609C249.732 168.053 249.943 168.642 249.943 169.378C249.943 169.854 249.846 170.297 249.651 170.708C249.467 171.109 249.191 171.455 248.823 171.747C248.456 172.039 248.007 172.271 247.477 172.444C246.947 172.607 246.341 172.688 245.66 172.688ZM245.66 170.822C246.222 170.822 246.649 170.692 246.941 170.433C247.244 170.173 247.396 169.821 247.396 169.378V169.053C247.396 168.599 247.25 168.248 246.958 167.999C246.666 167.739 246.233 167.609 245.66 167.609C245.086 167.609 244.654 167.739 244.362 167.999C244.069 168.248 243.923 168.599 243.923 169.053V169.378C243.923 169.821 244.069 170.173 244.362 170.433C244.664 170.692 245.097 170.822 245.66 170.822ZM245.66 165.825C246.2 165.825 246.611 165.7 246.893 165.451C247.174 165.203 247.315 164.867 247.315 164.445V164.202C247.315 163.78 247.169 163.45 246.876 163.212C246.595 162.963 246.19 162.839 245.66 162.839C245.13 162.839 244.718 162.963 244.426 163.212C244.145 163.45 244.005 163.78 244.005 164.202V164.445C244.005 164.867 244.145 165.203 244.426 165.451C244.708 165.7 245.119 165.825 245.66 165.825ZM260.797 172.688C260.115 172.688 259.51 172.607 258.98 172.444C258.45 172.271 258.001 172.039 257.633 171.747C257.265 171.455 256.984 171.109 256.789 170.708C256.605 170.297 256.513 169.854 256.513 169.378C256.513 168.642 256.724 168.053 257.146 167.609C257.568 167.155 258.109 166.836 258.769 166.652V166.522C258.206 166.317 257.746 166.003 257.39 165.581C257.033 165.159 256.854 164.618 256.854 163.959C256.854 163.526 256.941 163.126 257.114 162.758C257.287 162.39 257.541 162.076 257.876 161.817C258.212 161.546 258.623 161.341 259.109 161.2C259.596 161.049 260.159 160.973 260.797 160.973C261.424 160.973 261.981 161.049 262.468 161.2C262.966 161.341 263.382 161.546 263.717 161.817C264.053 162.076 264.307 162.39 264.48 162.758C264.653 163.126 264.74 163.526 264.74 163.959C264.74 164.618 264.561 165.159 264.204 165.581C263.847 166.003 263.388 166.317 262.825 166.522V166.652C263.485 166.836 264.026 167.155 264.448 167.609C264.869 168.053 265.08 168.642 265.08 169.378C265.08 169.854 264.983 170.297 264.788 170.708C264.604 171.109 264.329 171.455 263.961 171.747C263.593 172.039 263.144 172.271 262.614 172.444C262.084 172.607 261.478 172.688 260.797 172.688ZM260.797 170.822C261.359 170.822 261.787 170.692 262.079 170.433C262.382 170.173 262.533 169.821 262.533 169.378V169.053C262.533 168.599 262.387 168.248 262.095 167.999C261.803 167.739 261.37 167.609 260.797 167.609C260.224 167.609 259.791 167.739 259.499 167.999C259.207 168.248 259.061 168.599 259.061 169.053V169.378C259.061 169.821 259.207 170.173 259.499 170.433C259.802 170.692 260.234 170.822 260.797 170.822ZM260.797 165.825C261.338 165.825 261.749 165.7 262.03 165.451C262.311 165.203 262.452 164.867 262.452 164.445V164.202C262.452 163.78 262.306 163.45 262.014 163.212C261.733 162.963 261.327 162.839 260.797 162.839C260.267 162.839 259.856 162.963 259.564 163.212C259.282 163.45 259.142 163.78 259.142 164.202V164.445C259.142 164.867 259.282 165.203 259.564 165.451C259.845 165.7 260.256 165.825 260.797 165.825ZM306.209 172.688C305.527 172.688 304.922 172.607 304.392 172.444C303.862 172.271 303.413 172.039 303.045 171.747C302.677 171.455 302.396 171.109 302.201 170.708C302.017 170.297 301.925 169.854 301.925 169.378C301.925 168.642 302.136 168.053 302.558 167.609C302.98 167.155 303.521 166.836 304.181 166.652V166.522C303.618 166.317 303.158 166.003 302.802 165.581C302.445 165.159 302.266 164.618 302.266 163.959C302.266 163.526 302.353 163.126 302.526 162.758C302.699 162.39 302.953 162.076 303.288 161.817C303.624 161.546 304.035 161.341 304.521 161.2C305.008 161.049 305.571 160.973 306.209 160.973C306.836 160.973 307.393 161.049 307.88 161.2C308.378 161.341 308.794 161.546 309.129 161.817C309.465 162.076 309.719 162.39 309.892 162.758C310.065 163.126 310.152 163.526 310.152 163.959C310.152 164.618 309.973 165.159 309.616 165.581C309.259 166.003 308.8 166.317 308.237 166.522V166.652C308.897 166.836 309.438 167.155 309.86 167.609C310.281 168.053 310.492 168.642 310.492 169.378C310.492 169.854 310.395 170.297 310.2 170.708C310.016 171.109 309.741 171.455 309.373 171.747C309.005 172.039 308.556 172.271 308.026 172.444C307.496 172.607 306.89 172.688 306.209 172.688ZM306.209 170.822C306.771 170.822 307.199 170.692 307.491 170.433C307.794 170.173 307.945 169.821 307.945 169.378V169.053C307.945 168.599 307.799 168.248 307.507 167.999C307.215 167.739 306.782 167.609 306.209 167.609C305.636 167.609 305.203 167.739 304.911 167.999C304.619 168.248 304.473 168.599 304.473 169.053V169.378C304.473 169.821 304.619 170.173 304.911 170.433C305.214 170.692 305.646 170.822 306.209 170.822ZM306.209 165.825C306.75 165.825 307.161 165.7 307.442 165.451C307.723 165.203 307.864 164.867 307.864 164.445V164.202C307.864 163.78 307.718 163.45 307.426 163.212C307.145 162.963 306.739 162.839 306.209 162.839C305.679 162.839 305.268 162.963 304.976 163.212C304.694 163.45 304.554 163.78 304.554 164.202V164.445C304.554 164.867 304.694 165.203 304.976 165.451C305.257 165.7 305.668 165.825 306.209 165.825ZM321.346 172.688C319.832 172.688 318.712 172.174 317.988 171.146C317.274 170.119 316.917 168.68 316.917 166.831C316.917 164.981 317.274 163.542 317.988 162.515C318.712 161.487 319.832 160.973 321.346 160.973C322.861 160.973 323.975 161.487 324.689 162.515C325.413 163.542 325.776 164.981 325.776 166.831C325.776 168.68 325.413 170.119 324.689 171.146C323.975 172.174 322.861 172.688 321.346 172.688ZM321.346 170.773C322.071 170.773 322.574 170.519 322.855 170.011C323.147 169.502 323.293 168.794 323.293 167.885V165.776C323.293 164.867 323.147 164.159 322.855 163.65C322.574 163.142 322.071 162.888 321.346 162.888C320.621 162.888 320.113 163.142 319.821 163.65C319.54 164.159 319.399 164.867 319.399 165.776V167.885C319.399 168.794 319.54 169.502 319.821 170.011C320.113 170.519 320.621 170.773 321.346 170.773ZM321.346 167.788C320.968 167.788 320.703 167.712 320.551 167.561C320.41 167.409 320.34 167.225 320.34 167.009V166.652C320.34 166.436 320.41 166.252 320.551 166.1C320.703 165.949 320.968 165.873 321.346 165.873C321.725 165.873 321.984 165.949 322.125 166.1C322.276 166.252 322.352 166.436 322.352 166.652V167.009C322.352 167.225 322.276 167.409 322.125 167.561C321.984 167.712 321.725 167.788 321.346 167.788ZM334.277 172.493L338.171 163.147H334.504V165.208H332.443V161.168H340.588V163.277L336.84 172.493H334.277ZM355.272 163.293H350.031L349.771 166.879H349.917C350.036 166.62 350.171 166.382 350.323 166.165C350.474 165.938 350.653 165.749 350.858 165.597C351.064 165.435 351.302 165.311 351.572 165.224C351.843 165.138 352.151 165.094 352.497 165.094C352.962 165.094 353.4 165.176 353.811 165.338C354.233 165.5 354.601 165.738 354.915 166.052C355.239 166.355 355.493 166.733 355.677 167.187C355.861 167.631 355.953 168.134 355.953 168.696C355.953 169.27 355.856 169.8 355.661 170.287C355.466 170.773 355.18 171.195 354.801 171.552C354.433 171.909 353.973 172.19 353.422 172.396C352.87 172.591 352.243 172.688 351.54 172.688C350.988 172.688 350.496 172.628 350.063 172.509C349.631 172.39 349.247 172.234 348.911 172.039C348.587 171.833 348.3 171.601 348.051 171.341C347.813 171.071 347.608 170.795 347.435 170.514L349.203 169.118C349.333 169.335 349.468 169.54 349.609 169.735C349.76 169.93 349.928 170.103 350.112 170.254C350.307 170.395 350.517 170.508 350.745 170.595C350.983 170.671 351.253 170.708 351.556 170.708C352.162 170.708 352.616 170.546 352.919 170.222C353.233 169.886 353.389 169.443 353.389 168.891V168.761C353.389 168.231 353.233 167.815 352.919 167.512C352.605 167.209 352.172 167.058 351.621 167.058C351.167 167.058 350.788 167.15 350.485 167.334C350.193 167.507 349.971 167.68 349.82 167.853L347.824 167.577L348.246 161.168H355.272V163.293Z" fill="white"/>
                                    <path d="M48.6033 26.016L41.1687 43.753H36.318L32.6598 29.596C32.4374 28.7253 32.2457 28.4058 31.569 28.0391C30.4664 27.4404 28.6444 26.8797 27.0425 26.5295L27.1513 26.016H34.9598C35.47 26.0155 35.9637 26.1974 36.3516 26.5289C36.7395 26.8604 36.9961 27.3197 37.0752 27.8238L39.0083 38.0883L43.7833 26.016H48.6033ZM67.6109 37.9629C67.6299 33.2802 61.137 33.0223 61.182 30.9306C61.1962 30.2941 61.8019 29.6173 63.127 29.4446C64.6799 29.2971 66.2438 29.5718 67.6535 30.2397L68.458 26.4774C67.0856 25.9614 65.632 25.6946 64.1658 25.6895C59.6297 25.6895 56.4377 28.103 56.4094 31.5553C56.381 34.1084 58.688 35.5305 60.4272 36.3823C62.216 37.2507 62.817 37.8091 62.8076 38.5852C62.7957 39.7778 61.3831 40.3007 60.0628 40.322C57.7557 40.3575 56.4188 39.6997 55.3493 39.2028L54.5188 43.0881C55.5907 43.5803 57.5688 44.0109 59.6203 44.0298C64.4402 44.0298 67.5944 41.6495 67.6109 37.9629ZM79.5863 43.753H83.8312L80.1281 26.016H76.2097C75.791 26.0121 75.3808 26.1341 75.0323 26.3662C74.6838 26.5982 74.4131 26.9296 74.2552 27.3174L67.3719 43.753H72.1895L73.1478 41.1029H79.0349L79.5863 43.753ZM74.4682 37.4684L76.8817 30.8075L78.273 37.4684H74.4682ZM55.16 26.016L51.367 43.753H46.7766L50.5743 26.016H55.16Z" fill="white"/>
                                    <rect x="28.6902" y="88.1839" width="30.5062" height="23.1018" rx="4.44266" fill="url(#paint1_linear)" stroke="#666666" stroke-width="0.592354"/>
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M48.3153 93.0883C47.2526 90.9657 45.5829 89.2991 44.4846 88.6478C44.412 88.6058 44.359 88.5366 44.3374 88.4556C44.3157 88.3745 44.3272 88.2882 44.3692 88.2156C44.4112 88.1429 44.4803 88.09 44.5614 88.0683C44.6424 88.0467 44.7287 88.0581 44.8014 88.1001C46.2401 88.9438 47.9127 90.8799 48.8719 92.7923C48.895 92.8289 48.9097 92.8702 48.9152 92.9131C48.9206 92.9561 48.9165 92.9997 48.9032 93.0409C48.89 93.0821 48.8678 93.1199 48.8384 93.1516C48.8089 93.1834 48.7729 93.2082 48.7327 93.2245C48.69 93.2476 48.6422 93.2598 48.5936 93.26C48.5358 93.2601 48.4792 93.2441 48.4301 93.2137C48.3809 93.1834 48.3412 93.14 48.3153 93.0883ZM38.6931 103.246C38.7139 106.188 41.4818 109.696 43.3883 110.83C43.4251 110.849 43.4574 110.876 43.4832 110.908C43.509 110.941 43.5277 110.979 43.538 111.019C43.5483 111.059 43.5501 111.101 43.5431 111.142C43.5362 111.183 43.5208 111.222 43.4978 111.256C43.4699 111.303 43.4304 111.342 43.3832 111.368C43.3361 111.395 43.2827 111.41 43.2284 111.41C43.173 111.41 43.1186 111.395 43.0715 111.366C41.0377 110.167 38.255 106.662 38.0774 103.524H28.7049C28.6273 103.516 28.5553 103.48 28.5029 103.422C28.4505 103.365 28.4215 103.289 28.4215 103.211C28.4215 103.134 28.4505 103.058 28.5029 103.001C28.5553 102.943 28.6273 102.907 28.7049 102.899H38.1366C38.7273 100.829 38.7273 98.6344 38.1366 96.564H28.7049C28.6224 96.564 28.5434 96.5313 28.4851 96.473C28.4268 96.4147 28.394 96.3356 28.394 96.2532C28.394 96.1707 28.4268 96.0917 28.4851 96.0334C28.5434 95.9751 28.6224 95.9423 28.7049 95.9423H38.0774C38.255 92.7925 41.0496 89.2993 43.0715 88.1003C43.1441 88.0583 43.2305 88.0469 43.3115 88.0685C43.3926 88.0902 43.4617 88.1432 43.5037 88.2158C43.5457 88.2884 43.5572 88.3747 43.5355 88.4558C43.5139 88.5369 43.4609 88.606 43.3883 88.648C41.4818 89.767 38.7139 93.278 38.6931 96.2236C39.3712 98.5151 39.3712 100.954 38.6931 103.246ZM59.1817 102.899H49.7322C49.1415 100.829 49.1415 98.6344 49.7322 96.564H59.1817C59.2641 96.564 59.3432 96.5312 59.4015 96.4729C59.4597 96.4146 59.4925 96.3356 59.4925 96.2531C59.4925 96.1707 59.4597 96.0916 59.4015 96.0333C59.3432 95.975 59.2641 95.9423 59.1817 95.9423H49.4924C49.425 95.943 49.3597 95.9657 49.3063 96.0068C49.2529 96.0479 49.2143 96.1053 49.1964 96.1702C48.5081 98.4784 48.5081 100.937 49.1964 103.245C49.1756 106.188 46.4077 109.696 44.5012 110.83C44.4635 110.848 44.43 110.874 44.403 110.906C44.376 110.938 44.3561 110.975 44.3446 111.016C44.3331 111.056 44.3303 111.098 44.3364 111.14C44.3425 111.181 44.3573 111.221 44.3799 111.256C44.4078 111.303 44.4472 111.341 44.4944 111.368C44.5416 111.395 44.5949 111.41 44.6492 111.41C44.7047 111.41 44.759 111.395 44.8061 111.366C46.8281 110.182 49.6227 106.662 49.8003 103.524H59.1817C59.2592 103.516 59.3312 103.48 59.3836 103.422C59.436 103.365 59.465 103.289 59.465 103.211C59.465 103.133 59.436 103.058 59.3836 103.001C59.3312 102.943 59.2592 102.907 59.1817 102.899ZM43.6257 89.7943C43.7172 89.7332 43.8248 89.7005 43.9349 89.7005C44.0825 89.7005 44.224 89.7592 44.3284 89.8635C44.4328 89.9679 44.4914 90.1095 44.4914 90.2571C44.4914 90.3672 44.4588 90.4748 44.3976 90.5663C44.3365 90.6578 44.2495 90.7291 44.1478 90.7713C44.0461 90.8134 43.9342 90.8244 43.8263 90.8029C43.7183 90.7815 43.6192 90.7285 43.5413 90.6506C43.4635 90.5728 43.4105 90.4736 43.389 90.3657C43.3675 90.2577 43.3786 90.1458 43.4207 90.0441C43.4628 89.9424 43.5341 89.8555 43.6257 89.7943Z" fill="#666666"/>
                                    <defs>
                                    <linearGradient id="paint0_linear" x1="363.718" y1="5.05596e-06" x2="37.8591" y2="251.493" gradientUnits="userSpaceOnUse">
                                    <stop stop-color="#06B6B6"/>
                                    <stop offset="1" stop-color="#6594DB"/>
                                    </linearGradient>
                                    <linearGradient id="paint1_linear" x1="25.4323" y1="87.8877" x2="62.0101" y2="111.582" gradientUnits="userSpaceOnUse">
                                    <stop stop-color="#DDD9D6"/>
                                    <stop offset="0.212761" stop-color="#8A868C"/>
                                    <stop offset="0.548384" stop-color="#F2F3F3" stop-opacity="0.8"/>
                                    <stop offset="0.914316" stop-color="#807C80"/>
                                    <stop offset="1" stop-color="#A6A8AB"/>
                                    </linearGradient>
                                    </defs>
                                    </svg>
                                    
                            </div>

                            <form id="card_pay_form" styfle="margin-top:4rem">

                                <div class="form-group">
                                    <label for="">Card Number</label>
                                    <input type="hidden" name="dollar_rate" class="dollar_rate_releasing_lu">
                                    <input type="hidden" name="amount" class="amount_releasing_lu">
                                    <input type="text" name="card_no" class="form-control border border-right-0 border-top-0 border-left-0" maxlength="16" onkeypress="return onlyNumber(event)" required>
                                </div>
                    
                                <div class="row form-group">
                                    <div class="col">
                                        <label for="">MM/YY</label>
                                        <input maxlength='5' type="text" name="card_expiry" class="form-control border border-right-0 border-top-0 border-left-0" onkeyup="formatString(event);" required>
                                    </div>
                                    <div class="col">
                                        <label for="">CVV</label>
                                        <input type="text" name="card_cvv" class="form-control border border-right-0 border-top-0 border-left-0" maxlength="3" onkeypress="return onlyNumber(event)" required>
                                    </div>
                                </div>
                    
                                <div class="row mt-3">
                                    <div class="col text-center">
                                        <button id="pay_card_btn" class="btn px-5" style="background: #2A8BF2; border: 1px solid #2A8BF2; box-sizing: border-box;border-radius: 30px; color: #fff;">Pay</button>
                                    </div>
                                </div>
                                
                            </form>


                        </div>
                    </div>

                

                </div>

        
            </div>
            </div>
        </div>



      <!-- The Modal 3 -->
      <div class="modal" id="myModal2h">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
      
            <!-- Modal body -->
            <div class="modal-body">
                      
                <div class="row py-5">
                    <div class="col text-center">
                        <svg width="96" height="96" viewBox="0 0 96 96" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M47.9999 0.333313C21.6749 0.333313 0.333252 21.675 0.333252 48C0.333252 74.325 21.6749 95.6666 47.9999 95.6666C74.3249 95.6666 95.6666 74.325 95.6666 48C95.6666 21.675 74.3249 0.333313 47.9999 0.333313ZM68.6612 39.94C69.0417 39.5051 69.3313 38.9985 69.5131 38.45C69.6949 37.9016 69.7652 37.3223 69.7198 36.7462C69.6744 36.1702 69.5142 35.6091 69.2487 35.0959C68.9833 34.5826 68.6178 34.1277 68.174 33.7578C67.7301 33.3879 67.2167 33.1105 66.664 32.9419C66.1113 32.7733 65.5305 32.717 64.9557 32.7762C64.381 32.8354 63.8238 33.009 63.3171 33.2867C62.8104 33.5644 62.3644 33.9407 62.0052 34.3933L43.3719 56.749L33.7302 47.103C32.913 46.3136 31.8184 45.8769 30.6822 45.8867C29.546 45.8966 28.4591 46.3523 27.6557 47.1558C26.8523 47.9592 26.3965 49.0461 26.3867 50.1822C26.3768 51.3184 26.8136 52.413 27.6029 53.2303L40.6029 66.2303C41.0287 66.6558 41.5385 66.988 42.0997 67.2056C42.661 67.4232 43.2614 67.5214 43.8627 67.4941C44.4641 67.4668 45.0531 67.3145 45.5924 67.0469C46.1316 66.7793 46.6091 66.4023 46.9946 65.94L68.6612 39.94Z" fill="#06C270"/>
                            </svg>
                        
                        <h4 class="mt-5" style="font-style: normal; font-weight: 600; font-size: 36px; line-height: 43.57px; text-align: center; color: #231F20;">Payment Successful</h4>
                        <p class="mt-3" style="font-style: normal; font-weight: 400; font-size: 16px; line-height: 25.57px; text-align: center; color: #979797">Kindly wait for a Helpa to accept your rate.</p>

                        <a class="btn btn-primary px-5 mt-2 text-white" style="background: #2A8BF2; border: 1px solid #2A8BF2; box-sizing: border-box;border-radius: 30px;">View  details</a>
                    </div>
                    </div>
                           
                   
                </div>
      
            </div>
        </div>
      </div>


     <!-- The Modal 3 -->
     <div class="modal" id="myModal2i">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
    
    
            <div class="modal-header border border-0">
                <h4 class="modal-title"><i class="fa fa-angle-left fa-lg cursor" id="card_pay_back_lu"></i></h4>
                {{-- <button type="button" class="close" data-dismiss="modal">&times;</button> --}}
                <svg width="29" height="28" viewBox="0 0 29 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M20 6H4C2.897 6 2 6.897 2 8V20C2 21.103 2.897 22 4 22H7V25.767L13.277 22H20C21.103 22 22 21.103 22 20V8C22 6.897 21.103 6 20 6ZM20 20H12.723L9 22.233V20H4V8H20V20Z" fill="#231F20"/>
                    <path d="M7 11H17V13H7V11ZM7 15H14V17H7V15Z" fill="#231F20"/>
                    <circle cx="22" cy="7" r="7" fill="#FF8979"/>
                </svg>    
            </div>
    
            <div class="container">
                <div class="row">
                    <div class="col-lg-10">
                        <h4 style="color:#0ECB81;">Successful</h4>
    
                        <p>Transaction start when money has been released</p>
                    </div>
                    <div class="col-lg-2">
                        <span>60.00</span>
                        
                    </div>
                </div>
            </div>
    
        
            <div style="border-bottom: 1px solid #dee2e6;"></div>
      
            <!-- Modal body -->
            <div class="modal-body">
                <h4><span class="text-success">Buy</span>  dollar</h4>
    
                <div class="row mt-4">
                    <div class="col">
                        <h4>Account Number</h4>
                    </div>
                    <div class="col text-right">
                       
                            <h4 class="text-right text-dark">
                           <span id="account_number_box3"> 7894456332</span> 
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg" onclick="copyToClipboard('#account_number_box3')">
                                <path d="M5 5.10625V13.125C4.99988 13.9184 5.30154 14.6821 5.8438 15.2613C6.38606 15.8405 7.12831 16.1917 7.92 16.2437L8.125 16.25H13.6425C13.5133 16.6155 13.2739 16.932 12.9574 17.1559C12.6408 17.3797 12.2627 17.4999 11.875 17.5H7.5C6.50544 17.5 5.55161 17.1049 4.84835 16.4017C4.14509 15.6984 3.75 14.7446 3.75 13.75V6.875C3.7498 6.48709 3.86991 6.10867 4.09379 5.79189C4.31766 5.4751 4.63428 5.23555 5 5.10625ZM14.375 2.5C14.8723 2.5 15.3492 2.69754 15.7008 3.04917C16.0525 3.40081 16.25 3.87772 16.25 4.375V13.125C16.25 13.6223 16.0525 14.0992 15.7008 14.4508C15.3492 14.8025 14.8723 15 14.375 15H8.125C7.62772 15 7.15081 14.8025 6.79917 14.4508C6.44754 14.0992 6.25 13.6223 6.25 13.125V4.375C6.25 3.87772 6.44754 3.40081 6.79917 3.04917C7.15081 2.69754 7.62772 2.5 8.125 2.5H14.375ZM14.375 3.75H8.125C7.95924 3.75 7.80027 3.81585 7.68306 3.93306C7.56585 4.05027 7.5 4.20924 7.5 4.375V13.125C7.5 13.2908 7.56585 13.4497 7.68306 13.5669C7.80027 13.6842 7.95924 13.75 8.125 13.75H14.375C14.5408 13.75 14.6997 13.6842 14.8169 13.5669C14.9342 13.4497 15 13.2908 15 13.125V4.375C15 4.20924 14.9342 4.05027 14.8169 3.93306C14.6997 3.81585 14.5408 3.75 14.375 3.75Z" fill="#2A8BF2"/>
                                </svg>
                                
                            </h4>
                    </div>
                </div>
    
                <div class="row mt-2">
                    <div class="col">
                        <h4>Account Name</h4>
                    </div>
                    <div class="col text-right">
                        <h4 class="text-dark">Payhelpa/Payhelp-NGN</h4>
                    </div>
                </div>
    
                <div class="row mt-2">
                    <div class="col">
                        <h4>Current Dollar Rate</h4>
                    </div>
                    <div class="col text-right">
                        <h4 class="text-dark"> <span class="dollar_rate_releasing_lu"></span></h4>
                    </div>
                </div>
    
                <div class="row mt-2">
                    <div class="col">
                        <h4>Quantity</h4>
                    </div>
                    <div class="col text-right">
                        <h4 class="text-dark"> <span class="amount_releasing_lu"></span></h4>
                    </div>
                </div>
    
                <div class="row mt-2">
                    <div class="col">
                        <h4>Amount needed</h4>
                    </div>
                    <div class="col text-right">
                        <h4 class="text-dark"> <span class="value_releasing_lu"></span></h4>
                    </div>
                </div>
    
           
               
                <div class="row mt-5 mb-4">
                    <div class="col text-center">
                       
                        <a href="javascript:void" class="btn px-5 mx-2" style="background: #0ECB81; border: 1px solid #2A8BF2; box-sizing: border-box;border-radius: 30px; color: #fff;">Transaction successful</a>
                    </div>
                </div>


                <div class="row">
                    <div class="col">
                        <svg width="168" height="31" viewBox="0 0 168 31" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0 0H164C166.209 0 168 1.79086 168 4V27C168 29.2091 166.209 31 164 31H0V0Z" fill="#332F67"/>
                            <path d="M52.5753 15.1293C52.2273 12.9517 50.522 11.679 48.3693 11.679C45.7344 11.679 43.7905 13.6527 43.7905 16.9091C43.7905 20.1655 45.7244 22.1392 48.3693 22.1392C50.6065 22.1392 52.2422 20.7372 52.5753 18.7237L51.0241 18.7188C50.7607 20.0213 49.6669 20.7372 48.3793 20.7372C46.6342 20.7372 45.3168 19.3999 45.3168 16.9091C45.3168 14.4382 46.6293 13.081 48.3842 13.081C49.6818 13.081 50.7706 13.8118 51.0241 15.1293H52.5753ZM59.1316 18.8331C59.1365 20.1307 58.1721 20.7472 57.3368 20.7472C56.4171 20.7472 55.7807 20.081 55.7807 19.0419V14.3636H54.2942V19.2209C54.2942 21.1151 55.3333 22.0994 56.7999 22.0994C57.9483 22.0994 58.7289 21.4929 59.0819 20.6776H59.1614V22H60.623V14.3636H59.1316V18.8331ZM68.3427 16.228C68.0344 15.0398 67.1048 14.2642 65.4542 14.2642C63.729 14.2642 62.506 15.174 62.506 16.5263C62.506 17.6101 63.1623 18.331 64.5941 18.6491L65.8867 18.9325C66.6225 19.0966 66.9656 19.4247 66.9656 19.902C66.9656 20.4936 66.3342 20.956 65.3597 20.956C64.4698 20.956 63.8981 20.5732 63.7191 19.8224L62.2823 20.0412C62.5309 21.3935 63.6545 22.1541 65.3697 22.1541C67.2141 22.1541 68.4918 21.1747 68.4918 19.7926C68.4918 18.7138 67.8058 18.0476 66.4038 17.7244L65.1907 17.446C64.3505 17.2472 63.9876 16.9638 63.9925 16.4467C63.9876 15.8601 64.6239 15.4425 65.4691 15.4425C66.3938 15.4425 66.8214 15.9545 66.9954 16.4666L68.3427 16.228ZM73.6909 14.3636H72.1248V12.5341H70.6383V14.3636H69.5197V15.5568H70.6383V20.0661C70.6333 21.4531 71.6923 22.1243 72.8656 22.0994C73.3379 22.0945 73.6561 22.005 73.8301 21.9403L73.5616 20.7124C73.4622 20.7322 73.2782 20.777 73.0396 20.777C72.5574 20.777 72.1248 20.6179 72.1248 19.7578V15.5568H73.6909V14.3636ZM78.4698 22.1541C80.6225 22.1541 82.0295 20.5781 82.0295 18.2166C82.0295 15.8402 80.6225 14.2642 78.4698 14.2642C76.3171 14.2642 74.9102 15.8402 74.9102 18.2166C74.9102 20.5781 76.3171 22.1541 78.4698 22.1541ZM78.4748 20.9062C77.0678 20.9062 76.4116 19.6783 76.4116 18.2116C76.4116 16.75 77.0678 15.5071 78.4748 15.5071C79.8718 15.5071 80.5281 16.75 80.5281 18.2116C80.5281 19.6783 79.8718 20.9062 78.4748 20.9062ZM83.6887 22H85.1752V17.2919C85.1752 16.2628 85.8961 15.5469 86.7413 15.5469C87.5666 15.5469 88.1383 16.0938 88.1383 16.924V22H89.6199V17.1328C89.6199 16.2131 90.1816 15.5469 91.1511 15.5469C91.9366 15.5469 92.5829 15.9844 92.5829 17.0185V22H94.0694V16.8793C94.0694 15.1342 93.095 14.2642 91.7129 14.2642C90.6142 14.2642 89.7889 14.7912 89.421 15.6065H89.3414C89.0083 14.7713 88.3074 14.2642 87.2882 14.2642C86.2789 14.2642 85.5282 14.7663 85.21 15.6065H85.1156V14.3636H83.6887V22ZM99.353 22.1541C101.018 22.1541 102.197 21.3338 102.535 20.0909L101.128 19.8374C100.859 20.5582 100.213 20.9261 99.3679 20.9261C98.0952 20.9261 97.2401 20.1009 97.2003 18.6293H102.629V18.1023C102.629 15.343 100.979 14.2642 99.2486 14.2642C97.1207 14.2642 95.7188 15.8849 95.7188 18.2315C95.7188 20.603 97.1009 22.1541 99.353 22.1541ZM97.2053 17.5156C97.2649 16.4318 98.0504 15.4922 99.2585 15.4922C100.412 15.4922 101.168 16.3473 101.173 17.5156H97.2053ZM104.279 22H105.765V17.3366C105.765 16.3374 106.536 15.6165 107.59 15.6165C107.898 15.6165 108.246 15.6712 108.365 15.706V14.2841C108.216 14.2642 107.923 14.2493 107.734 14.2493C106.839 14.2493 106.073 14.7564 105.795 15.5767H105.715V14.3636H104.279V22ZM121.933 15.1293C121.585 12.9517 119.879 11.679 117.727 11.679C115.092 11.679 113.148 13.6527 113.148 16.9091C113.148 20.1655 115.082 22.1392 117.727 22.1392C119.964 22.1392 121.6 20.7372 121.933 18.7237L120.382 18.7188C120.118 20.0213 119.024 20.7372 117.737 20.7372C115.992 20.7372 114.674 19.3999 114.674 16.9091C114.674 14.4382 115.987 13.081 117.742 13.081C119.039 13.081 120.128 13.8118 120.382 15.1293H121.933ZM125.874 22.169C127.137 22.169 127.848 21.5277 128.131 20.956H128.191V22H129.642V16.929C129.642 14.7067 127.892 14.2642 126.679 14.2642C125.297 14.2642 124.025 14.821 123.527 16.2131L124.924 16.5312C125.143 15.9893 125.7 15.4673 126.699 15.4673C127.659 15.4673 128.151 15.9695 128.151 16.8345V16.8693C128.151 17.4112 127.594 17.4013 126.222 17.5604C124.775 17.7294 123.294 18.1072 123.294 19.8423C123.294 21.3438 124.422 22.169 125.874 22.169ZM126.197 20.9759C125.357 20.9759 124.75 20.598 124.75 19.8622C124.75 19.0668 125.456 18.7834 126.316 18.669C126.799 18.6044 127.942 18.4751 128.156 18.2614V19.2457C128.156 20.1506 127.435 20.9759 126.197 20.9759ZM131.622 22H133.109V17.3366C133.109 16.3374 133.879 15.6165 134.933 15.6165C135.242 15.6165 135.59 15.6712 135.709 15.706V14.2841C135.56 14.2642 135.267 14.2493 135.078 14.2493C134.183 14.2493 133.417 14.7564 133.139 15.5767H133.059V14.3636H131.622V22ZM140.013 22.1541C141.679 22.1541 142.857 21.3338 143.195 20.0909L141.788 19.8374C141.52 20.5582 140.873 20.9261 140.028 20.9261C138.755 20.9261 137.9 20.1009 137.86 18.6293H143.289V18.1023C143.289 15.343 141.639 14.2642 139.909 14.2642C137.781 14.2642 136.379 15.8849 136.379 18.2315C136.379 20.603 137.761 22.1541 140.013 22.1541ZM137.865 17.5156C137.925 16.4318 138.711 15.4922 139.919 15.4922C141.072 15.4922 141.828 16.3473 141.833 17.5156H137.865Z" fill="#FAFAFC"/>
                            <path d="M34 22C34 22 35 22 35 21C35 20 34 17 30 17C26 17 25 20 25 21C25 22 26 22 26 22H34ZM26.022 21C26.0146 20.999 26.0073 20.9976 26 20.996C26.001 20.732 26.167 19.966 26.76 19.276C27.312 18.629 28.282 18 30 18C31.717 18 32.687 18.63 33.24 19.276C33.833 19.966 33.998 20.733 34 20.996L33.992 20.998C33.9874 20.9988 33.9827 20.9995 33.978 21H26.022ZM30 15C30.5304 15 31.0391 14.7893 31.4142 14.4142C31.7893 14.0391 32 13.5304 32 13C32 12.4696 31.7893 11.9609 31.4142 11.5858C31.0391 11.2107 30.5304 11 30 11C29.4696 11 28.9609 11.2107 28.5858 11.5858C28.2107 11.9609 28 12.4696 28 13C28 13.5304 28.2107 14.0391 28.5858 14.4142C28.9609 14.7893 29.4696 15 30 15ZM33 13C33 13.394 32.9224 13.7841 32.7716 14.1481C32.6209 14.512 32.3999 14.8427 32.1213 15.1213C31.8427 15.3999 31.512 15.6209 31.1481 15.7716C30.7841 15.9224 30.394 16 30 16C29.606 16 29.2159 15.9224 28.8519 15.7716C28.488 15.6209 28.1573 15.3999 27.8787 15.1213C27.6001 14.8427 27.3791 14.512 27.2284 14.1481C27.0776 13.7841 27 13.394 27 13C27 12.2044 27.3161 11.4413 27.8787 10.8787C28.4413 10.3161 29.2044 10 30 10C30.7956 10 31.5587 10.3161 32.1213 10.8787C32.6839 11.4413 33 12.2044 33 13ZM25.936 17.28C25.536 17.154 25.1236 17.0712 24.706 17.033C24.4713 17.0107 24.2357 16.9997 24 17C20 17 19 20 19 21C19 21.667 19.333 22 20 22H24.216C24.0678 21.6878 23.9938 21.3455 24 21C24 19.99 24.377 18.958 25.09 18.096C25.333 17.802 25.616 17.527 25.936 17.28ZM23.92 18C23.3282 18.8893 23.0084 19.9318 23 21H20C20 20.74 20.164 19.97 20.76 19.276C21.305 18.64 22.252 18.02 23.92 18.001V18ZM20.5 13.5C20.5 12.7044 20.8161 11.9413 21.3787 11.3787C21.9413 10.8161 22.7044 10.5 23.5 10.5C24.2956 10.5 25.0587 10.8161 25.6213 11.3787C26.1839 11.9413 26.5 12.7044 26.5 13.5C26.5 14.2956 26.1839 15.0587 25.6213 15.6213C25.0587 16.1839 24.2956 16.5 23.5 16.5C22.7044 16.5 21.9413 16.1839 21.3787 15.6213C20.8161 15.0587 20.5 14.2956 20.5 13.5ZM23.5 11.5C22.9696 11.5 22.4609 11.7107 22.0858 12.0858C21.7107 12.4609 21.5 12.9696 21.5 13.5C21.5 14.0304 21.7107 14.5391 22.0858 14.9142C22.4609 15.2893 22.9696 15.5 23.5 15.5C24.0304 15.5 24.5391 15.2893 24.9142 14.9142C25.2893 14.5391 25.5 14.0304 25.5 13.5C25.5 12.9696 25.2893 12.4609 24.9142 12.0858C24.5391 11.7107 24.0304 11.5 23.5 11.5Z" fill="white"/>
                            </svg>
                            
                            
                    </div>
                </div>
                
            </div>
    
      
          </div>
        </div>
      </div>
    



