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
                                    <div class="card-title text-dark">Withdraw fund</div>
                                    <p class="mt-2">Use the form below to withdraw from your Naira Wallet Instantly</p>
                                    <div class="row" style="margin-top: 1rem;">
                                        <div class="col-md-6">
                                           
                                            <div class="form-group">
												<button class="btn btn-outline-dark">Your funds will be sent to your {{ ucfirst($user->bank_name) }} ({{ $user->bank_account_number }}). <a href="javascript:void" data-toggle="modal" data-target="#myModal"> Change </a></button>
											</div>
											<div class="form-group">
												<label for="amount">Amount to be withdraw for now</label>
												<input type="text" class="form-control" placeholder="e.g 80, 000">
											</div>
                                            
                                            <div id="loadotpwithdraw">
                                                
                                            </div>
                                           
                                            <div class="form-group">
												<label for="amount">For Security Reasons, Please Enter Your password</label>
												<input type="text" class="form-control" placeholder="Enter your password">
											</div>

                                            <button href="" class="btn btn-primary px-5" style="background: #2A8BF2; border: 1px solid #2A8BF2; box-sizing: border-box;border-radius: 30px;">Withdraw to bank(free)</button>
                                                
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
        <div class="modal-header border border-bottom-0">
          <h4 class="modal-title">Change Bank Details</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
  
        <!-- Modal body -->
        <div class="modal-body">
            

            <form action="{{ url('changebank')}}" method="POST">
                @csrf
                <div class="form-group">
                  <label for="email">Bank Name</label>
                  <select name="bank" class="custom-select">
                    <option selected>Select one</option>
                        <option value="access">Access Bank</option>
                                  <option value="citibank">Citibank</option>
                                  <option value="diamond">Diamond Bank</option>
                                  <option value="ecobank">Ecobank</option>
                                  <option value="fidelity">Fidelity Bank</option>
                                  <option value="firstbank">First Bank</option>
                                  <option value="fcmb">First City Monument Bank (FCMB)</option>
                                  <option value="gtb">Guaranty Trust Bank (GTB)</option>
                                  <option value="heritage">Heritage Bank</option>
                                  <option value="keystone">Keystone Bank</option>
                                  <option value="polaris">Polaris Bank</option>
                                  <option value="providus">Providus Bank</option>
                                  <option value="stanbic">Stanbic IBTC Bank</option>
                                  <option value="standard">Standard Chartered Bank</option>
                                  <option value="sterling">Sterling Bank</option>
                                  <option value="suntrust">Suntrust Bank</option>
                                  <option value="union">Union Bank</option>
                                  <option value="uba">United Bank for Africa (UBA)</option>
                                  <option value="unity">Unity Bank</option>
                                  <option value="wema">Wema Bank</option>
                                  <option value="zenith">Zenith Bank</option>
                       
                  </select>
                </div>
                <div class="form-group">
                  <label for="pwd">Account Number</label>
                  <input type="number" name="acc_no" class="form-control" placeholder="Account number">
                </div>

                <div class="form-group">
                    <label for="pwd">Account Name</label>
                    <input type="text" name="acc_name" class="form-control" placeholder="Account Name">
                  </div>


                  <div class="row mt-1">
                      <div class="col">
                        <button type="submit" class="btn btn-success float-right" style="box-sizing: border-box;border-radius: 30px;">Update</button>
                      </div>
                  </div>
               
               
              </form>

        </div>
  
      </div>
    </div>
  </div>

