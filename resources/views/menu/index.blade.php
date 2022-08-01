
@extends('layout.admin')


@section('title')
<title>List Menu</title>
@endsection

@section('content')
<div class="content-wrapper">
    <div class="content">
      <div class="container-fluid">
          <div class="card">
            @include('partials.content-header' , ['name' => 'List Menu'])
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Menu Slug</th>
                  <th>Menu Name</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  @foreach ($menus as $item)
                    <tr>
                      <td>{{ $item->slug }}</td>
                      <td>
                        {{ $item->name }}
                      </td>
                      <td>
                        <a href="{{ URL::to('/menu/edit', ['id' => $item->id]) }}" class="btn btn-primary">Edit</a>
                        <a href="{{ URL::to('/menu/delete', ['id' => $item->id]) }}" class="btn btn-danger">Delete</a>
                      </td>
                    </tr>
                  @endforeach
                  
                </tbody>
              </table>
              
              <div class="mt-3">
                {!! $menus->withQueryString()->links('pagination::bootstrap-5') !!}
              </div>
            </div>
          </div>
      </div>
    </div>
  </div>
@endsection






