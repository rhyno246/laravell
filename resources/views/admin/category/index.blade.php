
@extends('layout.admin')


@section('title')
<title>List Category</title>
@endsection

@section('content')
<div class="content-wrapper">
    <div class="content">
      <div class="container-fluid">
          <div class="card">
            @include('partials.content-header' , ['name' => 'List Category'])
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Category Slug</th>
                  <th>Category Name</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  @foreach ($categories as $item)
                    <tr>
                      <td>{{ $item->slug }}</td>
                      <td>
                        {{ $item->name }}
                      </td>
                      <td>
                        <a href="{{ URL::to('/categories/edit', ['id' => $item->id]) }}" class="btn btn-primary">Edit</a>
                        <a href="{{ URL::to('/categories/delete', ['id' => $item->id]) }}" class="btn btn-danger">Delete</a>
                      </td>
                    </tr>
                  @endforeach
                  
                </tbody>
              </table>
              
              <div class="mt-3">
                {!! $categories->withQueryString()->links('pagination::bootstrap-5') !!}
              </div>
            </div>
          </div>
      </div>
    </div>
  </div>
@endsection






