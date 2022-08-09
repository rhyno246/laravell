
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
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-header">
                                    <div class="icheck-primary d-inline">
                                        <input type="checkbox" id="checkboxPrimary1">
                                        <label for="checkboxPrimary1">
                                            Module Product Config
                                        </label>
                                    </div>
                                </div>
                                <div class="card-body">
                                    @for ( $i = 0 ; $i <= 4 ; $i++)
                                        <div class="icheck-primary" style="margin-bottom : 20px !important;">
                                            <input type="checkbox" id="checkboxPrimary-{{$i}}">
                                            <label for="checkboxPrimary-{{$i}}">
                                                Create Product
                                            </label>
                                        </div>
                                    @endfor
                                </div>
                            </div>
                        </div>
                    </div>


                    <button class="btn btn-primary mt-3">Create Role</button>
                </form>
            </div>
          </div>
      </div>
    </div>
  </div>
@endsection




