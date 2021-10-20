@extends('adminlte::page')

@section('title', 'Add Product')

@section('content_header')
    <h1>Add product.</h1>
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

    <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Add Product</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="/create_product" method="POST" enctype="multipart/form-data" class="form-horizontal" >
              @csrf  
              <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Product Name</label>
                    <div class="col-sm-10">
                      <input required type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Product Name">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">SKU</label>
                    <div class="col-sm-10">
                      <input required type="text" class="form-control" name="sku" value="{{ old('sku') }}" placeholder="SKU">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Price</label>
                    <div class="col-sm-10">
                      <input required type="text" class="form-control" name="price" value="{{ old('price') }}" placeholder="Price">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Measure</label>
                    <div class="col-sm-10">
                      <select name="measure_id" class="custom-select">
                        <option value="1">kg</option>
                        <option value="2">piece</option>
                      </select>
                    
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Image</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                        <div class="custom-file">
                            <input value="" type="file" class="custom-file-input" name="image" value="{{ old('image') }}" >
                            <label class="custom-file-label" for="exampleInputFile"></label>
                        </div>
                        </div>
                    </div>
                  </div>

                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="reset" class="btn btn-default float-right">Reset</button>
                  <button type="submit" class="btn btn-info float-right">Add Product</button>
                </div>
                <!-- /.card-footer -->
              </form>

              

            </div>


    
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">

@stop

@section('js')

<script>


</script>
@stop
