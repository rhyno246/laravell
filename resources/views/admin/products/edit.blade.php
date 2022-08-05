
@extends('layout.admin')


@section('title')
<title>Edit Product - {{ $productSingle->name }}</title>
@endsection

@section('css')
<link href="{{ asset('backend/dist/css/select2.min.css')}}" rel="stylesheet" />
@endsection


@section('content')
<div class="content-wrapper">
    <div class="content">
      <div class="container-fluid">
          <div class="card">
            @include('partials.content-header' , ['name' => 'Edit Product'])
            <div class="card-body">
              <form action="{{ route('prodducts.update' , ['id' => $productSingle->id]) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Name Product</label>
                    <input type="text" class="form-control" name="name" value="{{ $productSingle->name }}">
                </div>
                <div class="form-group">
                    <label>Price Product</label>
                    <input type="text" class="form-control" name="price" value="{{ number_format((float)$productSingle->price, 0)}}">
                </div>

                <div class="form-group">
                    <select class="form-control select-category" name="categories_id" style="width: 100%;">
                      <option selected="selected" value="">Choose Category Product</option>
                      {!! $htmlOption !!}
                    </select> 
                </div>


                <div class="form-group">
                  <label>Content</label>
                  <textarea class="form-control tinymce_editor_init" name="content" rows="15">{{ $productSingle->content }}</textarea>
                </div>

                <div class="form-group">
                  <label>Choose Tags</label>
                  <select class="form-control choose-tags" name="tags[]" multiple="multiple">
                    @foreach ($productSingle->tags as $item)
                      <option value="{{ $item->name }}" selected>{{ $item->name }}</option>
                    @endforeach
                  </select>
                </div>


                <div class="form-group choose-input">
                    <label for="exampleInputFile">Feature Image</label>
                    <input type="file" class="form-control-file" id="exampleInputFile" name="feature_image_path">
                    <div class="img-feature" style="max-width: 200px; margin: 40px 0">
                      <img src="{{ $productSingle->feature_image_path }}" alt="" class="img-fluid">
                    </div>
                </div>

                <div class="form-group choose-input">
                    <label>List Image</label>
                    <input type="file" multiple class="form-control-file" id="exampleInputFile" name="image_path[]">
                    <div class="img-feature" style="margin: 40px 0">
                        <div class="row">
                          @foreach ($productSingle->images as $item)
                          <div class="col-md-3">
                            <img src="{{ $item->image_path }}" alt="" class="img-fluid">
                          </div>
                          @endforeach
                        </div>
                    </div>
                </div>

                
                
                <button class="btn btn-primary">Update Product</button>
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



