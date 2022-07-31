
@extends('layout.admin')


@section('title')
<title>Create Menu</title>
@endsection

@section('content')
<div class="content-wrapper">
    <div class="content">
      <div class="container-fluid">
          <div class="card">
            @include('partials.content-header' , ['name' => 'Create Menu'])
            <div class="card-body">
                <form action="{{ URL::to('menu/store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label>Name Menu</label>
                        <input type="text" class="form-control" name="name">
                    </div>
                    <div class="form-group">
                        <select class="form-control select2" name="parent_id" style="width: 100%;">
                          <option selected="selected" value="0">Choose Parent Category</option>
                          {!! $htmlOption !!}
                        </select>
                    </div>
                    <button class="btn btn-primary">Create Menu</button>
                </form>
            </div>
          </div>
      </div>
    </div>
  </div>
@endsection



