@extends('adminlte::page')

@section('title', 'Products')

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

    <h1>Products Page</h1>
    <a href="/add_product/" class="btn btn-sm btn-primary float-right mb-3"><i class="glyphicon glyphicon-edit"></i> Add Product</a>
@stop

@section('content')

    <table class="table table-bordered" id="products-table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Image</th>
                <th>Name</th>
                <th>SKU</th>
                <th>Price</th>
                <th>Measure</th>
                <th>Created At</th>
            </tr>
        </thead>
    </table>

@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css') }}">
@stop

@section('js')
    <!-- DataTables -->
    <script src="{{ asset('//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js') }}" defer ></script>

    <script> 
    
    $(document).ready(function()
    {
        $('#products-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('productlist') !!}',
            columns: [
                { data: 'id', name: 'id' },
                { data: 'image', name: 'image'},
                { data: 'name', name: 'name' },
                { data: 'SKU', name: 'SKU' },
                { data: 'price', name: 'price' },
                { data: 'measure', name: 'measure'},
                { data: 'created_at', name: 'created_at' },
            ]
        });
    });

    </script>
@stop
