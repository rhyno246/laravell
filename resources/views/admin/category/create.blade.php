
@extends('layout.admin')


@section('title')
<title>Create Category</title>
@endsection

@section('content')
<div class="content-wrapper">
    <div class="content">
      <div class="container-fluid">
          <div class="card">
            @include('partials.content-header' , ['name' => 'Create Category'])
            <div class="card-body">
                <form action="{{ route('category.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label>Name Category</label>
                        <input type="text" class="form-control" name="name">
                    </div>
                    <div class="form-group">
                        <select class="form-control select2" name="parent_id" style="width: 100%;">
                          <option selected="selected" value="0">Choose Parent Category</option>
                          {!! $htmlOption !!}
                        </select>
                    </div>
                    <button class="btn btn-primary">Create Category</button>
                </form>
            </div>
          </div>
      </div>
    </div>
  </div>
@endsection



