
@extends('layout.admin')


@section('title')
<title>List Users</title>
@endsection

@section('content')
<div class="content-wrapper">
    <div class="content">
      <div class="container-fluid">
          <div class="card">
            @include('partials.content-header' , ['name' => 'List Users'])
            
            <div class="card-body">
              <div class="btn-group mb-4">
                <a href="{{ route('users.create') }}" class="btn btn-primary">
                  Add Users
                </a>
              </div>
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Users ID</th>
                  <th>Users Name</th>
                  <th>Users Email</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($users as $item)
                    <tr>
                        <td>
                          {{ $item->id }}
                        </td>
                        <td>
                          {{ $item->name }}
                        </td>
                        <td>
                          {{ $item->email }}
                        </td>
                        <td>
                        <a href="" class="btn btn-primary">Edit</a>
                        <a href="" class="btn btn-danger delete-users">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
              
              <div class="mt-3">
                {!! $users->withQueryString()->links('pagination::bootstrap-5') !!}
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






