@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
@if(session()->has('message'))
    <div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    
        {{ session()->get('message') }}
    </div>
@endif
@if(session()->has('error'))
    <div class="alert alert-danger">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    
        {{ session()->get('error') }}
    </div>
@endif

    <h1>Customers Page</h1>
    <a href="/add_customer/" class="btn btn-sm btn-primary float-right mb-3"><i class="glyphicon glyphicon-edit"></i> Add New Customer</a>
@stop

@section('content')

    <table class="table table-bordered" id="buyers-table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Image</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Total Purchases</th>
                <th>Total Price</th>
                <th>Created At</th>
                <th>Actions</th>
                
            </tr>
        </thead>
    </table>



@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="{{ asset('//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css') }}">
@stop

@section('js')
    <!-- DataTables -->
    <script src="{{ asset('//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js') }}" defer ></script>

    <script> 
    
    $(document).ready(function()
    {
        $('#buyers-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('customerlist') !!}',
            columns: [
                { data: 'id', name: 'id' },
                { data: 'image', name: 'image'},
                { data: 'fullname', name: 'fullname' },
                { data: 'phone', name: 'phone' },
                { data: 'email', name: 'email' },
                { data: 'total_purchases', name: 'total_purchases'},
                { data: 'total_price', name: 'total_price'},
                { data: 'created_at', name: 'created_at' },
                { data: 'action', name: 'action' },
                
            ]
        });
    });

    </script>
@stop
