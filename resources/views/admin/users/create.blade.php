
@extends('layout.admin')


@section('title')
<title>Create Users</title>
@endsection
@section('css')
<link href="{{ asset('backend/dist/css/select2.min.css')}}" rel="stylesheet" />
@endsection

@section('content')
<div class="content-wrapper">
    <div class="content">
      <div class="container-fluid">
          <div class="card">
            @include('partials.content-header' , ['name' => 'Create Users'])
            <div class="card-body">
                <form action="{{ route('users.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label>Name Users</label>
                        <input type="text" class="form-control" name="name">
                    </div>

                    <div class="form-group">
                        <label>Email Users</label>
                        <input type="email" class="form-control" name="email">
                    </div>

                    <div class="form-group">
                        <label>Password Users</label>
                        <input type="password" class="form-control" name="password">
                    </div>
 
                    <div class="form-group">
                        <label>Choose Role</label>
                        <select class="form-control choose-role" name="role_id[]" multiple="multiple">
                            <option value=""></option>

                            @foreach ($roles as $item)
                                <option value="{{ $item->id }}">{{ $item->display_name }}</option>
                            @endforeach
                        </select>
                      </div>
                    
                    <button class="btn btn-primary">Create Users</button>
                </form>
            </div>
          </div>
      </div>
    </div>
  </div>
@endsection



@section('js')
  <script src="{{ asset('backend/dist/js/select2.min.js')}}"></script>
  <script src="{{ asset('backend/admin/product/create/create.js')}}"></script>
@endsection
