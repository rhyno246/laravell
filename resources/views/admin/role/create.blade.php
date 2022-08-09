
@extends('layout.admin')


@section('title')
<title>Create Role</title>
@endsection


@section('css')
<link href="{{ asset('backend/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}" rel="stylesheet" />
@endsection




@section('content')
<div class="content-wrapper">
    <div class="content">
      <div class="container-fluid">
          <div class="card">
            @include('partials.content-header' , ['name' => 'Create Role'])
            <div class="card-body">
                <form action="{{ route('role.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label>Name Role</label>
                        <input type="text" class="form-control" name="name">
                    </div>

                    <div class="form-group">
                        <label>Display Name</label>
                        <textarea type="text" class="form-control" name="display_name" rows="5"></textarea>
                    </div>
                    

                    <div class="row">

                        @foreach ($permissionParent as $item)
                            <div class="col-md-12">
                                <div class="card mt-4">
                                    <div class="card-header bg-secondary">
                                        <div class="icheck-primary d-inline">
                                            <input type="checkbox" id="{{$item->name}}">
                                            <label for="{{ $item->name }}">
                                                {{ $item->name }}
                                            </label>
                                        </div>
                                    </div>
                                    <div class="card-body row">
                                        @foreach ($item->permissionChild as $childItem)
                                            <div class="col-md-3">
                                                <div class="icheck-primary" style="margin-bottom : 20px !important;">
                                                    <input type="checkbox" name="permission_id[]" id="checkboxPrimary-{{$childItem->name}}" value="{{ $childItem->id }}">
                                                    <label for="checkboxPrimary-{{$childItem->name}}">
                                                        {{ $childItem->name }}
                                                    </label>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>


                    <button class="btn btn-primary mt-3">Create Role</button>
                </form>
            </div>
          </div>
      </div>
    </div>
  </div>
@endsection




