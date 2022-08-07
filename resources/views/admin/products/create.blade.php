
@extends('layout.admin')


@section('title')
<title>Create Product</title>
@endsection

@section('css')
<link href="{{ asset('backend/dist/css/select2.min.css')}}" rel="stylesheet" />
@endsection


@section('content')
<div class="content-wrapper">
    <div class="content">
      <div class="container-fluid">
          <div class="card">
            @include('partials.content-header' , ['name' => 'Create Product'])
            <div class="card-body">
                <form action="{{ route('prodducts.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Name Product</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}">
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Price Product</label>
                        <input type="text" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') }}">
                        @error('price')
                          <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <select class="form-control select-category @error('categories_id') is-invalid @enderror" name="categories_id" style="width: 100%;">
                          <option selected="selected" value="">Choose Category Product</option>
                          {!! $htmlOption !!}
                        </select>
                        @error('categories_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>


                    <div class="form-group">
                      <label>Content</label>
                      <textarea class="form-control tinymce_editor_init" name="content" rows="15"></textarea>
                    </div>

                    <div class="form-group">
                      <label>Choose Tags</label>
                      <select class="form-control choose-tags" name="tags[]" multiple="multiple">
                      </select>
                    </div>


                    <div class="form-group choose-input">
                        <label for="exampleInputFile">Feature Image</label>
                        <input type="file" class="form-control-file" id="exampleInputFile" name="feature_image_path">
                    </div>

                    <div class="form-group choose-input">
                        <label>List Image</label>
                        <input type="file" multiple class="form-control-file" id="exampleInputFile" name="image_path[]">
                    </div>

                    
                    
                    <button class="btn btn-primary">Create Product</button>
                </form>
            </div>
          </div>
      </div>
    </div>
  </div>
@endsection

@section('js')
  <script src="{{ asset('backend/dist/js/select2.min.js')}}"></script>
  <script src="https://cdn.tiny.cloud/1/g206zibscsg4symvdigxh4b8rpbbp5oc6rj1r8ceb7p3jncb/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  <script src="{{ asset('backend/admin/product/create/create.js')}}"></script>
@endsection



