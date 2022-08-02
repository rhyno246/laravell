
@extends('layout.admin')


@section('title')
<title>Edit Category - {{ $category->name }}</title>
@endsection

@section('content')
<div class="content-wrapper">
    <div class="content">
      <div class="container-fluid">
          <div class="card">
            @include('partials.content-header' , ['name' => 'Edit Category' ])
            <div class="card-body">
                <form action="{{ route('category.update', ['id' => $category->id]) }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label>Name Category</label>
                        <input type="text" class="form-control" value="{{ $category->name }}" name="name">
                    </div>
                    <div class="form-group">
                        <select class="form-control select2" name="parent_id" style="width: 100%;">
                          <option selected="selected" value="0">Choose Parent Category</option>
                          {!! $htmlOption !!}
                        </select>
                    </div>
                    <button class="btn btn-primary">Edit Category</button>
                </form>
            </div>
          </div>
      </div>
    </div>
  </div>
@endsection



