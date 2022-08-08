
@extends('layout.admin')


@section('title')
<title>Edit Settings - {{ $settingDetail->config_key }}</title>
@endsection


@section('content')
<div class="content-wrapper">
    <div class="content">
      <div class="container-fluid">
          <div class="card">
            @include('partials.content-header' , ['name' => 'Create Settings'])
            <div class="card-body">
                <form action="{{ route('setting.update' , ['id' => $settingDetail->id]) }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label>Config key</label>
                        <input type="text" class="form-control @error('config_key') is-invalid @enderror" name="config_key" value="{{ $settingDetail->config_key }}">

                        @error('config_key')
                            <div class="alert alert-danger" role="alert">{{ $message }}</div>
                        @enderror
                    </div>


                    @if($settingDetail->type === 'Text')
                      <div class="form-group">
                        <label>Config value</label>
                        <input type="text" class="form-control @error('config_value') is-invalid @enderror" name="config_value"  value="{{ $settingDetail->config_value }}">
                        @error('config_value')
                            <div class="alert alert-danger" role="alert">{{ $message }}</div>
                        @enderror
                        <input type="text" hidden name="type" value="{{$settingDetail->type }}">
                      </div>
                      @elseif($settingDetail->type === 'Textarea')
                      <div class="form-group">
                        <label>Config value</label>
                        <textarea name="config_value" class="form-control @error('config_value') is-invalid @enderror" name="config_value"  value="" rows="10">{{ $settingDetail->config_value }}</textarea>
                        @error('config_value')
                          <div class="alert alert-danger" role="alert">{{ $message }}</div>
                         @enderror
                         <input type="text" hidden name="type" value="{{ $settingDetail->type }}">
                      </div>
                    @endif

                    

                    
                    

                    <button class="btn btn-primary">Update Settings</button>
                </form>
            </div>
          </div>
      </div>
    </div>
  </div>
@endsection



