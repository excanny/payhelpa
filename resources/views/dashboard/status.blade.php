@php use \App\Http\Controllers\UserController; @endphp

@extends('layouts.master')

@section('content')

<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                           
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row mb-1">
                                            <div class="col-md-12">
                    
                                                <div class="row pt-3 px-3 pb-0">
                                                    <div class="col">
                                                        <a class="cursor mx-3 font-weight-bold" style="color:#59588D" href="{{ route('status')}}">All</a>   <a class="cursor mx-3" style="color:#979797;" href="{{ route('status.pending')}}">Pending</a> <a style="color:#979797;" class="cursor mx-3" href="{{ route('status.ongoing')}}">Ongoing</a> <a class="cursor mx-3" style="color:#979797;" href="{{ route('status.completed')}}">Completed</a>
                                                        
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <form>
                                                            <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text bg-white "><i class="fa fa-search"></i></span>
                                                            </div>
                                                            <input type="text" class="form-control border border-left-0" placeholder="Search">
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

                    <div id="P2P">

                       
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card" style="box-shadow: 0px 0.298734px 1.19494px rgba(0, 0, 0, 0.25);">
                                    <div class="card-body">
                                       
                                        <table class="table table-borderless datatable">
                                            <thead>
                                              <tr>
                                                <th>Helpas</th>
                                                <th>Dollar Rate</th>
                                                <th>Total Amount</th>
                                                <th>Status</th>
                                              </tr>
                                             
                                            </thead>
                                            
                                            <tbody>

                                                @foreach ($transactions as $transaction)
                                                    
                                               
                                              <tr>
                                                <td width="30%">
                                                    <div class="row">
                                                        <div class="col">
                                                           
                                                            @if(empty($user->profile_image))
                                                                <span class='fa fa-user-circle' style="font-size: 2rem;"></span> 
                                                                <span class="pb-5 ml-2">
                                                                    @if (!is_null($transaction->fu_id))
                                                                        {{ ucfirst(strtolower(UserController::GetUserName($transaction->fu_id)))}}
                                                                    @else
                                                                        {{"Not taken yet by any Helpa"}}
                                                                    @endif
                                                                </span>
                                                            @else
                                                                <img src='https://payhelpa.s3.eu-west-3.amazonaws.com/uploads/profile_pictures/{{$user->profile_image}}' class='rounded-circle' width='30px' height='30px'> <span class="pb-5 ml-2">{{ ucfirst(strtolower(UserController::GetUserName($transaction->fu_id)))}}</span>
                                                            @endif

                                                        </div>

                                                    </div>
                                                    
    
                                                </td>
                                                <td>₦ {{ number_format($transaction->rate) }}</td>
                                                <td>${{ number_format($transaction->max_amount) }}</td>
                                                <td><a href="{{ url('/dashboard/transaction/'.$transaction->transaction_id.'/details') }}" class="btn btn-primary" style="background: #2A8BF2; border: 1px solid #2A8BF2; box-sizing: border-box;border-radius: 30px;">See Details</a></td>
                                              </tr>

                                              @endforeach
                                              
                                            </tbody>
                                          </table>
                                        
                                    </div>
                                </div>
                            </div>
                           
                        </div>

                    </div>


                    <div id="Express" style="display:none">

                        <div class="row">
                            <div class="col">
                                <form>
                                    <div class="custom-control custom-radio custom-control-inline">
                                      <input type="radio" class="custom-control-input" id="customRadio3" name="example" value="customEx">
                                      <label class="custom-control-label" for="customRadio">I am looking for item Helpa</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                      <input type="radio" class="custom-control-input" id="customRadio4" name="example" value="customEx">
                                      <label class="custom-control-label" for="customRadio2">I am looking for dollar Helpa</label>
                                    </div>
                                  </form>
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
                                                <th>Price</th>
                                                <th>Limit</th>
                                                <th>Available for</th>
                                                <th>Payment</th>
                                                <th>Trade</th>
                                              </tr>
                                             
                                            </thead>
                                            
                                            <tbody>
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
                                                <td>N20,000</td>
                                                <td>N200,000 - 500,000</td>
                                                <td>Housing</td>
                                                <td>Bank Transfer</td>
                                                <td><a href="" class="btn text-white" style="background: #0ECB81; border: 1px solid #0ECB81; box-sizing: border-box; border-radius: 30px;">Connect</a></td>
                                              </tr>

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
                                                <td>N20,000</td>
                                                <td>N200,000 - 500,000</td>
                                                <td>Housing</td>
                                                <td>Bank Transfer</td>
                                                <td><a href="" class="">Succesful</a></td>
                                              </tr>

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
                                                <td>N20,000</td>
                                                <td>N200,000 - 500,000</td>
                                                <td>Housing</td>
                                                <td>Bank Transfer</td>
                                                <td><a href="" class="">Succesful</a></td>
                                              </tr>

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
                                                <td>N20,000</td>
                                                <td>N200,000 - 500,000</td>
                                                <td>Housing</td>
                                                <td>Bank Transfer</td>
                                                <td><a href="" class="">Succesful</a></td>
                                              </tr>
                                              
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
                <label for="max_amount">Helpa’s ID</label>
                <input type="text" class="form-control" placeholder="Enter Helpa's ID">
            </div>
        </div>
  
        <!-- Modal footer -->
        <div class="modal-footer border-0">
          
        </div>
  
      </div>
    </div>
  </div>

