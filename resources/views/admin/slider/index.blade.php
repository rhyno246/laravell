
@extends('layout.admin')


@section('title')
<title>List Slider</title>
@endsection

@section('content')
<div class="content-wrapper">
    <div class="content">
      <div class="container-fluid">
          <div class="card">
            @include('partials.content-header' , ['name' => 'List Slider'])
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Slider ID</th>
                  <th>Slider Name</th>
                  <th>Slider Image</th>
                  <th>Slider Description</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($slider as $item)
                        <tr>
                            <td>
                                {{ $item->id }}
                            </td>
                            <td>
                                {{ $item->name }}
                            </td>
                            <td>
                                <img src="{{ $item->image_path ? $item->image_path : 'https://dummyimage.com/80x80/000/fff' }}" alt="" style="width: 100px" height="50px">
                            </td>
                            <td>
                                {{ $item->description }}
                            </td>
                            <td>
                            <a href="{{ route('slider.edit', ['id'=> $item->id]) }}" class="btn btn-primary">Edit</a>
                            <a href="{{ route('slider.delete', ['id'=> $item->id]) }}" data-url="{{ route('slider.delete' , ['id' => $item->id ]) }}" class="btn btn-danger delete-slide">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                    
                </tbody>
              </table>
              
              <div class="mt-3">
                {!! $slider->withQueryString()->links('pagination::bootstrap-5') !!}
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






