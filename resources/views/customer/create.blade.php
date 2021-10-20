@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Create new customer.</h1>
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
                <h3 class="card-title">Create new customer</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="/create_new_customer" method="POST" enctype="multipart/form-data" class="form-horizontal" >
              @csrf  
              <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Fullname</label>
                    <div class="col-sm-10">
                      <input required type="text" class="form-control" name="fullname" value="{{ old('fullname') }}" placeholder="Fullname">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Phone</label>
                    <div class="col-sm-10">
                      <input required type="number" class="form-control" name="phone" value="{{ old('phone') }}" placeholder="Phone">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                      <input required type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email">
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
                  <button type="submit" class="btn btn-info float-right">Create customer</button>
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
