
@extends('layout.admin')


@section('title')
<title>List Products</title>
@endsection

@section('content')
<div class="content-wrapper">
    <div class="content">
      <div class="container-fluid">
          <div class="card">
            @include('partials.content-header' , ['name' => 'List Products'])
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Products ID</th>
                  <th>Products Name</th>
                  <th>Products Price</th>
                  <th>Products Image</th>
                  <th>Products Category</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($products as $item)
                      <tr>
                        <td>{{ $item->id }}</td>
                        <td>
                          {{ $item->name }}
                        </td>
                        <td>
                            {{ number_format((float)$item->price , 0) }}
                        </td>
                        <td>
                            <img src="{{ $item->feature_image_path ? $item->feature_image_path : 'https://dummyimage.com/80x80/000/fff' }}" alt="" style="width: 80px" height="80px">
                        </td>
                        <td>
                            {{ optional($item->categoriesInstance)->name }}
                        </td>
                        <td>
                          <a href="{{ route('prodducts.edit', ['id'=> $item->id]) }}" class="btn btn-primary">Edit</a>
                          <a href="{{ route('prodducts.delete' , ['id' => $item->id ]) }}" data-url="{{ route('prodducts.delete' , ['id' => $item->id ]) }}" class="btn btn-danger delete-items">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                    
                </tbody>
              </table>
              
              <div class="mt-3">
                {!! $products->withQueryString()->links('pagination::bootstrap-5') !!}
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






