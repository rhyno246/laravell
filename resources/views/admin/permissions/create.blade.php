
@extends('layout.admin')


@section('title')
<title>Create Permissions</title>
@endsection

@section('css')
<link href="{{ asset('backend/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}" rel="stylesheet" />
@endsection

@section('content')
<div class="content-wrapper">
    <div class="content">
      <div class="container-fluid">
          <div class="card">
            @include('partials.content-header' , ['name' => 'Create Permissions'])
            <div class="card-body">
                <form action="{{ route('permissions.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <select class="form-control select2" name="module_parent" style="width: 100%;">
                            <option selected="selected" value="0">Choose Name Module</option>
                            @foreach (config('permissions.table_module') as $moduleItem)
                            <option value="{{ $moduleItem }}">{{ $moduleItem }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            @foreach (config('permissions.module_child') as $item)
                            <div class="col-md-3">
                                    <div class="icheck-primary d-inline">
                                        <input type="checkbox" id="{{ $item }}" class="checkbox_wrapper" value="{{ $item }}" name="module_child[]">
                                        <label for="{{ $item }}">
                                            {{$item}}
                                        </label>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <button class="btn btn-primary">Create Permissions</button>
                </form>
            </div>
          </div>
      </div>
    </div>
  </div>
@endsection



