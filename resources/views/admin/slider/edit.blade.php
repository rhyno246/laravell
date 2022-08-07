
@extends('layout.admin')


@section('title')
<title>Edit Slider - {{ $sliderDetail->name }}</title>
@endsection


@section('content')
<div class="content-wrapper">
    <div class="content">
      <div class="container-fluid">
          <div class="card">
            @include('partials.content-header' , ['name' => 'Edit Slider'])
            <div class="card-body">
                <form action="{{ route('slider.update' , ['id' => $sliderDetail->id]) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Name Slider</label>
                        <input type="text" class="form-control" name="name" value="{{ $sliderDetail->name }}">
                    </div>
 
                    <div class="form-group">
                        <label>Description Slider</label>
                        <input type="text" class="form-control" name="description" value="{{ $sliderDetail->description }}">
                    </div>


                    <div class="form-group choose-input">
                        <label>Feature Image</label>
                        <input type="file" multiple class="form-control-file" id="exampleInputFile" name="feature_image_path">
                        <div class="row">
                            <div class="col-md-3">
                                <img src="{{ $sliderDetail->image_path }}" alt="" class="mt-3 img-fluid">
                            </div>
                        </div>
                    </div>

                    
                    <button class="btn btn-primary">Update Slider</button>
                </form>
            </div>
          </div>
      </div>
    </div>
  </div>
@endsection



