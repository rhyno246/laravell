
@extends('layout.admin')


@section('title')
<title>Edit Product</title>
@endsection

@section('css')
<link href="{{ asset('backend/dist/css/select2.min.css')}}" rel="stylesheet" />
@endsection


@section('content')
<div class="content-wrapper">
    <div class="content">
      <div class="container-fluid">
          <div class="card">
            @include('partials.content-header' , ['name' => 'Edit Product'])
            <div class="card-body">
                dsadasasdsda
            </div>
          </div>
      </div>
    </div>
  </div>
@endsection

@section('js')
  <script src="{{ asset('backend/dist/js/select2.min.js')}}"></script>
  <script src="https://cdn.tiny.cloud/1/g206zibscsg4symvdigxh4b8rpbbp5oc6rj1r8ceb7p3jncb/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  <script src="{{ asset('backend/admin/product/create/create.js')}}"></script>
@endsection



