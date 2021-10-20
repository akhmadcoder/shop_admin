@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Customer Page.</h1>
@stop

@section('content')

@if (count($errors) > 0)
    <div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if(session()->has('message'))
    <div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    
        {{ session()->get('message') }}
    </div>
@endif


<!-- Profile starts here     -->
<div class="row">
    <div class="col-md-4">


<div class="card card-primary card-outline">
    <div class="card-body box-profile">
    <div class="text-center">
        <img class="profile-user-img img-fluid img-circle" src="{{$customer->image}}" alt="User profile picture">
    </div>

    <h3 class="profile-username text-center">{{$customer->fullname}}</h3>

    <ul class="list-group list-group-unbordered mb-3">
        <li class="list-group-item">
        <b>Phone number: </b> <a class="float-right">{{$customer->phone}}</a>
        </li>
        <li class="list-group-item">
        <b>Email: </b> <a class="float-right">{{$customer->email}}</a>
        </li>
        <li class="list-group-item">
        <b>Created at: </b> <a class="float-right">{{$customer->created_at}}</a>
        </li>
        <li class="list-group-item">
        <b>Updated at: </b> <a class="float-right">{{$customer->updated_at}}</a>
        </li>
        
    </ul>

    <a href="/edit_customer/{{$customer->id}}" class="btn btn-primary btn-block"><b>Edit Customer</b></a>
    </div>
    <!-- /.card-body -->
</div>
        
    </div>
</div>


<!-- profile ands here  -->
<!-- purchases starts here      -->
<h3> Customer Purchases </h3>
<hr>
<table class="table table-bordered" id="purchases-table">
    <thead>
        <tr>
            <th>Id</th>
            <th>Image</th>
            <th>Name</th>
            <th>SKU</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Measure</th>
            <th>Total Price</th>
            <th>Created At</th>
        </tr>
    </thead>
</table>


<!-- purchases ends here  -->
@stop

@section('css')
    <!-- <link rel="stylesheet" href="/css/admin_custom.css"> -->
    <link rel="stylesheet" href="{{ asset('//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css') }}">
@stop

@section('js')
<!-- DataTables -->
<script src="{{ asset('//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js') }}" defer ></script>

<script> 

$(document).ready(function()
{
    var path = window.location.pathname;
    var customer_id = path.split("/").pop();

    $('#purchases-table').DataTable({

        processing: true,
        serverSide: true,
        ajax: '{!! route('purchaselist') !!}',

        columns: [
            { data: 'id', name: 'id' },
            { data: 'image', name: 'image'},
            { data: 'name', name: 'name'},
            { data: 'SKU', name: 'SKU' },
            { data: 'price', name: 'price' },
            { data: 'quantity', name: 'quantity'},
            { data: 'measure', name: 'measure'},
            { data: 'total_price', name: 'total_price'},
            { data: 'created_at', name: 'created_at' },
            
        ]
    });
});

</script>
@stop
