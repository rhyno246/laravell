
@extends('layout.admin')


@section('title')
<title>Edit Menu - {{ $menu->name }}</title>
@endsection

@section('content')
<div class="content-wrapper">
    <div class="content">
      <div class="container-fluid">
          <div class="card">
            @include('partials.content-header' , ['name' => 'Edit Menu' ])
            <div class="card-body">
                <form action="{{ URL::to('/menu/update', ['id' => $menu->id]) }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label>Name Category</label>
                        <input type="text" class="form-control" value="{{ $menu->name }}" name="name">
                    </div>
                    <div class="form-group">
                        <select class="form-control select2" name="parent_id" style="width: 100%;">
                          <option selected="selected" value="0">Choose Parent Menu</option>
                          {!! $htmlOption !!}
                        </select>
                    </div>
                    <button class="btn btn-primary">Edit Menu</button>
                </form>
            </div>
          </div>
      </div>
    </div>
  </div>
@endsection



