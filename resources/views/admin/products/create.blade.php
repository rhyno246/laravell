
@extends('layout.admin')


@section('title')
<title>Create Product</title>
@endsection

@section('css')

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
                        <label>Content</label>
                        <textarea class="form-control" name="content" rows="3" placeholder="Enter ..."></textarea>
                    </div>


                    <div class="form-group">
                        <select class="form-control select2" name="parent_id" style="width: 100%;">
                          <option selected="selected" value="0">Choose Category Product</option>
                          {!! $htmlOption !!}
                        </select>
                    </div>

                    <div class="form-group choose-input">
                        <label for="exampleInputFile">Feature Image</label>
                        <div class="input-group">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" id="exampleInputFile" name="feature_image_path">
                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                          </div>
                        </div>
                    </div>


                    <div class="form-group choose-input">
                        <label for="exampleInputFile">List Image</label>
                        <div class="input-group">
                          <div class="custom-file">
                            <input type="file" multiple class="custom-file-input" id="exampleInputFile" name="image_path[]">
                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                          </div>
                        </div>
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
    <script>
        $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
    </script>
@endsection



