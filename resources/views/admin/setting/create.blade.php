
@extends('layout.admin')


@section('title')
<title>Create Settings</title>
@endsection


@section('content')
<div class="content-wrapper">
    <div class="content">
      <div class="container-fluid">
          <div class="card">
            @include('partials.content-header' , ['name' => 'Create Settings'])
            <div class="card-body">
                <form action="{{ route('setting.store' . '?type=' . request()->type )}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label>Config key</label>
                        <input type="text" class="form-control @error('config_key') is-invalid @enderror" name="config_key" value="{{ old('config_key') }}">

                        @error('config_key')
                            <div class="alert alert-danger" role="alert">{{ $message }}</div>
                        @enderror
                    </div>


                    @if(request()->type === 'Text')
                      <div class="form-group">
                        <label>Config value</label>
                        <input type="text" class="form-control @error('config_value') is-invalid @enderror" name="config_value"  value="{{ old('config_value') }}">
                        @error('config_value')
                            <div class="alert alert-danger" role="alert">{{ $message }}</div>
                        @enderror
                        <input type="text" hidden name="type" value="{{ request()->type }}">
                      </div>
                      @elseif(request()->type === 'Textarea')
                      <div class="form-group">
                        <label>Config value</label>
                        <textarea name="config_value" class="form-control @error('config_value') is-invalid @enderror" name="config_value"  value="{{ old('config_value') }}" rows="10"></textarea>
                        @error('config_value')
                          <div class="alert alert-danger" role="alert">{{ $message }}</div>
                         @enderror
                         <input type="text" hidden name="type" value="{{ request()->type }}">
                      </div>
                    @endif

                    

                    
                    

                    <button class="btn btn-primary">Create Settings</button>
                </form>
            </div>
          </div>
      </div>
    </div>
  </div>
@endsection



