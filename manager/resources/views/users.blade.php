<x-app-layout>
    <x-slot name="header">
        <!--<h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>-->
    </x-slot>

<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from ventura.dreamguystech.com/template/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 12 Jul 2021 00:16:17 GMT -->
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
<title>PayHelpa - Dashboard</title>

<link rel="shortcut icon" type="image/x-icon" href="{{asset('public/assets/img/favicon.png')}}">

<link rel="stylesheet" href="{{asset('public/assets/css/bootstrap.min.css')}}">

<link rel="stylesheet" href="{{asset('public/assets/css/font-awesome.min.css')}}">

<link rel="stylesheet" href="{{asset('public/assets/css/feathericon.min.css')}}">
<link rel="stylesheet" href="{{asset('public/assets/plugins/morris/morris.css')}}">

<link rel="stylesheet" href="{{asset('public/assets/css/style.css')}}">
<!--[if lt IE 9]>
            <script src="{{asset('public/assets/js/html5shiv.min.js')}}"></script>
            <script src="{{asset('public/assets/js/respond.min.js')}}"></script>
        <![endif]-->
</head>
<body>
<div class="page-wrapper">
<div class="content container-fluid">

<div class="page-header">
<div class="row">
<div class="col">
<h3 class="page-title">Users </h3>
<ul class="breadcrumb">
<li class="breadcrumb-item"><a href="index">Dashboard</a></li>
<li class="breadcrumb-item active">Users</li>
</ul>
</div>

</div>
<div class="d-flex justify-content-center">
      
      <a href="#" ></a>      
</div>
</div>
 
<div class="row">
<div class="col-sm-12">
<div class="card">
<div class="card-header">
<h4 class="card-title">List of Users</h4>
<!--<p class="card-text">
This is the most basic example of the datatables with zero configuration. Use the <code>.datatable</code> class to initialize datatables.
</p>-->
<div class="d-flex flex-row-reverse">

</div>
</div>
<div class="card-body">
<div class="table-responsive">
<table class="datatable table table-stripped">
<thead>
<tr>
<th>Name</th>
<th>Email</th>
<th>Phone Number</th>
<th>Created at</th>
<th class="text-right">Action</th>
</tr>
</thead>
<tbody>
    @foreach ($userss as $key)
    <tr> 
     
        
        <td><a href="{{route('user_details',$key->id)}}">{{$key->name}}</a></td>
        <td>{{$key->email}}</td>
        <td>{{$key->phone}}</td>
        <td>{{$key->created_at}}</td>
        
            <td class="text-right">
            <div class="actions">
                
                    @if($key->active_status == '0')
                        <a href="{{route('update_status',$key->id)}}" class="btn btn-sm bg-success-light mr-2"></i>Unsuspend</a>
                @else
                    <a href="{{route('update_status',$key->id)}}" class="btn btn-sm bg-danger-light">Suspend</a>
                @endif  
                
                
            </div>
        </td>
        
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


<script src="{{asset('public/assets/js/jquery-3.2.1.min.js')}}"></script>

<script src="{{asset('public/assets/js/popper.min.js')}}"></script>
<script src="{{asset('public/assets/js/bootstrap.min.js')}}"></script>

<script src="{{asset('public/assets/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>

<script src="{{asset('public/assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('public/assets/plugins/datatables/datatables.min.js')}}"></script>

<script src="{{asset('public/assets/js/script.js')}}"></script>
</body>
</html>
</x-app-layout>
