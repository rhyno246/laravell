
@extends('layout.admin')


@section('title')
<title>List Role</title>
@endsection

@section('content')
<div class="content-wrapper">
    <div class="content">
      <div class="container-fluid">
          <div class="card">
            @include('partials.content-header' , ['name' => 'List Role'])
            
            <div class="card-body">
              <div class="btn-group mb-4">
                <a href="{{ route('role.create') }}" class="btn btn-primary">
                  Add Role
                </a>
              </div>
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Role</th>
                  <th>Users Name</th>
                  <th>Users Display_Name</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $item)
                    <tr>
                        <td>
                          {{ $item->id }}
                        </td>
                        <td>
                          {{ $item->name }}
                        </td>
                        <td>
                          {{ $item->display_name }}
                        </td>
                        <td>
                        <a href="{{ route('role.edit' , [ 'id'=> $item->id ]) }}" class="btn btn-primary">Edit</a>
                        {{-- <a href="{{ route('users.delete', ['id'=> $item->id]) }}" data-url="{{ route('users.delete' , ['id' => $item->id ]) }}" class="btn btn-danger delete-users">Delete</a> --}}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
              
              <div class="mt-3">
                {!! $roles->withQueryString()->links('pagination::bootstrap-5') !!}
              </div>
            </div>
          </div>
      </div>
    </div>
  </div>
@endsection


@section('js')
  <script src="{{ asset('backend/admin/product/create/sweetalert2@11.js')}}"></script>
  <script src="{{ asset('backend/admin/product/create/alert.js')}}"></script>
@endsection






