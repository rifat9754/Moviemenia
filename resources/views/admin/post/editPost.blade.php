
@extends('admin.layout.base')

@section('contents')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Edit Post</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit Post</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
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
                <form action="{{ route('post.update', $data['id']) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST') <!-- Include this line to send PUT request -->

                <div class="row justify-content-center align-items-center">
                    {{-- title --}}
                    <div class="col-lg-11 col-12 p-3 mt-5">
                        <label for="title">Post Title</label>
                        <input type="text" id="title" name="title" class="form-control" value="{{ $data->title }}">
                        @error('title')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    {{-- date --}}
                    <div class="col-lg-4 col-10 p-3">
                        <label for="date">Date</label>
                        <input type="date" id="date" name="date" class="form-control" value="{{ $data->date }}">
                        @error('date')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Category --}}
                <div class="col-lg-4 col-10 p-3">
                        <label for="category">Category</label>
                        <select name="category" id="category" class="form-control">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ $category->id == $data->category1_id ? 'selected' : '' }}>
                                    {{ $category->cat_name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Video Type --}}
                    <div class="col-lg-5 col-10 p-3">
                        <label for="video_type">Video Type(HD,Pre Dvd etc...)</label>
                        <input type="text" id="video_type" name="video_type" class="form-control" value="{{ $data->video_type }}">
                        @error('video_type')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    {{-- Description --}}
                    <div class="col-lg-5 col-10 p-3">
                        <label for="description">Description</label>
                        <textarea type="text"  id="editor" name="description" class="form-control">{{ $data->description }}</textarea>
                        @error('description')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Thumbnail --}}
                    <div class="col-lg-5 col-10 p-3">
                        <label for="thumbnail">Thumbnail</label>
                        <input type="file"  id="thumbnail" name="thumbnail" class="form-control">
                        <img src="{{ asset('thumbnails/' . $data->thumbnail) }}" alt="Thumbnail" style="max-width: 100px;">
                        @error('thumbnail')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    {{-- SEO Section --}}
                    <div class="row w-100 mt-1 d-flex">
                        <div class="w-100 text-danger">
                             😊 SEO Section
                        </div>
                        {{-- meta_title --}}
                        <div class="col-lg-5 col-10 p-3">
                            <label for="meta_title">Meta Title</label>
                            <input type="text"  id="meta_title" name="meta_title" class="form-control" value="{{ $data->meta_title }}">
                            @error('meta_title')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        {{-- meta_description --}}
                        <div class="col-lg-5 col-10 p-3">
                            <label for="meta_description">Meta Description</label>
                            <input type="text"  id="meta_description" name="meta_description" class="form-control" value="{{ $data->meta_description }}">
                            @error('meta_description')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        {{-- meta_keywords --}}
                        <div class="col-lg-5 col-10 p-3">
                            <label for="meta_keywords">Meta Keywords</label>
                            <input type="text"  id="meta_keywords" name="meta_keywords" class="form-control" value="{{ $data->meta_keywords }}">
                            @error('meta_keywords')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="mt-2 col-lg-12 col-12 tect-center justify-content-center align-items-center flex p-5">
                    <input type="submit" class="btn btn-success w-100 flex">
                </div>
            </form>
        </div>
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
    var msg = '{{ Session::get('alert') }}';
    var exist = '{{ Session::has('alert') }}';

    if(exist){
        alert(msg);
    }



@endsection
