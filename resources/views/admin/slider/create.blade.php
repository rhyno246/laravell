
@extends('layout.admin')


@section('title')
<title>Create Slider</title>
@endsection


@section('content')
<div class="content-wrapper">
    <div class="content">
      <div class="container-fluid">
          <div class="card">
            @include('partials.content-header' , ['name' => 'Create Slider'])
            <div class="card-body">
                <form action="{{ route('slider.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Name Slider</label>
                        <input type="text" class="form-control" name="name">
                    </div>
 
                    <div class="form-group">
                        <label>Description Slider</label>
                        <input type="text" class="form-control" name="description">
                    </div>


                    <div class="form-group choose-input">
                        <label>Feature Image</label>
                        <input type="file" multiple class="form-control-file" id="exampleInputFile" name="feature_image_path">
                    </div>

                    
                    <button class="btn btn-primary">Create Slider</button>
                </form>
            </div>
          </div>
      </div>
    </div>
  </div>
@endsection



