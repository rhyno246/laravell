
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
                <form action="" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Name Product</label>
                        <input type="text" class="form-control" name="name">
                    </div>
                    <div class="form-group">
                        <label>Price Product</label>
                        <input type="text" class="form-control" name="price">
                    </div>

                    <div class="form-group">
                        <select class="form-control select-category" name="parent_id" style="width: 100%;">
                          <option selected="selected" value="">Choose Category Product</option>
                          {!! $htmlOption !!}
                        </select>
                    </div>


                    <div class="form-group">
                      <label>Content</label>
                      <textarea class="form-control tinymce_editor_init" name="content" rows="15"></textarea>
                    </div>

                    <div class="form-group">
                      <label>Choose Tags</label>
                      <select class="form-control choose-tags" name="tags[]" multiple="multiple">
                        <option selected="selected">orange</option>
                        <option>white</option>
                        <option selected="selected">purple</option>
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
  <script src="{{ asset('backend/admin/product/create/tinymce.min.js')}}"></script>
  <script src="{{ asset('backend/admin/product/create/create.js')}}"></script>
@endsection



