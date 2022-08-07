
@extends('layout.admin')


@section('title')
<title>Settings</title>
@endsection

@section('content')
<div class="content-wrapper">
    <div class="content">
      <div class="container-fluid">
          <div class="card">
            @include('partials.content-header' , ['name' => 'Settings'])
            <div class="card-body">
              <div class="btn-group mb-4">
                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Add Settings
                </button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="{{ route('setting.create') . '?type=Text' }}">Add Text</a>
                  <a class="dropdown-item" href="{{ route('setting.create') . '?type=Textarea' }}">Add Textarea</a>
                </div>
              </div>


              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Config Key</th>
                  <th>Config value</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  @foreach ($settings as $item)
                  <tr>
                    <td>
                       {{ $item->id }}
                    </td>
                    <td>
                      {{ $item->config_key }}
                    </td>
                    <td>
                      {{ $item->config_value }}
                  </td>
                    <td>
                      
                      <a href="{{ route('setting.edit' , ['id' => $item->id ]) }}" class="btn btn-primary">Edit</a>
                      <a href="" class="btn btn-danger delete-slide">Delete</a>
                    </td>
                  @endforeach
                </tr>
                </tbody>
              </table>
              
              <div class="mt-3">
                {!! $settings->withQueryString()->links('pagination::bootstrap-5') !!}
              </div>
            </div>
          </div>
      </div>
    </div>
  </div>
@endsection








