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
                                All Categories
                            </div>
                        </div>


                        <div class="p-lg-1 gap-4 m-lg-5 m-0 justify-content-center align-items-center ">
                            <div class="row justify-content-center align-items-center ">
                                <div class="col-lg-5 col-12 p-4 text-center bg-warning">
                                <a href="{{route('cat.all')}}">
                                    <h2>
                                    All Category
                                    </h2>
                                    
                                </a>
                                </div>
                            </div>
                                            <!-- Search Bar -->
                        <div class="row justify-content-center p-5">
                            <div class="col-lg-5 col-12 p-4 text-center bg-gray">
                                <h2>
                                    Search Category
                                </h2>
                                <form action="{{route('cat.all')}}" method="GET" enctype="multipart/form-data" class="w-full">
                                    <div class="input-group mt-3">
                                        <input type="search" id="default-search" name="query" class="form-control" placeholder="Search category..." required>
                                        <button type="submit" class="btn btn-success">Search</button>
                                    </div>
                                </form>
                            </div>
                         </div>
                <!-- End Search Bar -->
                            <table class="table table-bordered table-stripped table-dark">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th class="text-center">Category Name</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data as $item)
                                    <tr>
                                        <td class="text-center">{{$item->id}}</td>
                                        <td class="text-center">{{$item->cat_name}}</td>
                                        <td class="text-center">{{ $item->cat_status }}</td>
                                        <td class="text-center">
                                            <a href="{{route('cat.edit', $item->id)}}" class="fa fa-edit mx-1"></a>
                                            <a href="{{route('cat.delete',$item->id)}}" class="fa fa-trash mx-1"></a>
                                        </td>
                                    </tr>
                                    @endforeach 
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

<script>
    var msg = "{{ session('alert') }}";
    if (msg) {
        alert(msg);
    }
</script>

@endsection

