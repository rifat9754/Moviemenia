@extends('admin.layout.base')

@section('contents')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Category</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-12 col-12">
            <div class="card w-100">
                <div class="card-header">
                    <div class="card-title">
                        <i class="icon icon-clipboard mr-1"></i>
                        Fill form and submit
                    </div>
                </div>
                <div class="p-lg-5 gap-4 m-lg-5 m-0 justify-content-center align-items-center">
                <form action="{{route('cat.update',$data['id'])}}" method="POST" enctype="multipart/form-data" >
                @csrf
               
                <div class="row justify-content-center align-items-center" >
                    <div class="col-lg-5 col-12 p-4 text-center bg-warning ">
                        <h2>
                            Edit Category
                        </h2>
                    </div>
                <div class="col-lg-11 col-12 p-3 mt-5">
                    <label for="cat_name">Category Name</label>
                    <input type="text" id="cat_name" name="cat_name" class="form-control" value="{{$data->cat_name}}">
                    @error('cat_name')
                      <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                </div>

                <div class="mt-2 col-lg-10 col-10 tect-center justify-content-center align-items-center flex p-5">
                    <input type="submit" class="btn btn-success w-100 flex">
                </div>
            </form>
                </div>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->

        
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

  <script>
    var msg=Session::get('alert');
    var exist=Session::has('alert');

    if(exist){
        alert(msg);
    }
  </script>

@endsection