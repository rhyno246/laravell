
@extends('layout.admin')


@section('title')
<title>Edit Users - {{ $user->id }}</title>
@endsection
@section('css')
<link href="{{ asset('backend/dist/css/select2.min.css')}}" rel="stylesheet" />
@endsection

@section('content')
<div class="content-wrapper">
    <div class="content">
      <div class="container-fluid">
          <div class="card">
            @include('partials.content-header' , ['name' => 'Edit Users'])
            <div class="card-body">
                <form action="{{ route('users.update' , ['id'=> $user->id]) }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label>Name Users</label>
                        <input type="text" class="form-control" name="name" value="{{ $user->name }}">
                    </div>

                    <div class="form-group">
                        <label>Email Users</label>
                        <input type="email" class="form-control" name="email" value="{{ $user->email }}">
                    </div>

                    <div class="form-group">
                        <label>Password Users</label>
                        <input type="password" class="form-control" name="password" value="{{ $user->password }}">
                    </div>
 
                    <div class="form-group">
                        <label>Choose Role</label>
                        <select class="form-control choose-role" name="role_id[]" multiple="multiple">
                            <option value=""></option>
                            @foreach ($role as $item)
                                {{-- laravel colections --}}
                                <option {{ $roleOfUser->contains('id', $item->id) ? 'selected' : '' }}  value="{{ $item->id }}">{{ $item->display_name }}</option>
                            @endforeach
                        </select>
                      </div>
                    
                    <button class="btn btn-primary">Update Users</button>
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
