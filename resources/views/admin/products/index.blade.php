
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
                    <tr>
                        <td>ssaddsasa</td>
                        <td>
                          product name
                        </td>
                        <td>
                            product price
                        </td>
                        <td>
                            product image
                        </td>
                        <td>
                            product category
                        </td>
                        <td>
                          <a href="" class="btn btn-primary">Edit</a>
                          <a href="" class="btn btn-danger">Delete</a>
                        </td>
                      </tr>
                </tbody>
              </table>
              
              <div class="mt-3">
                {{-- {!! $categories->withQueryString()->links('pagination::bootstrap-5') !!} --}}
              </div>
            </div>
          </div>
      </div>
    </div>
  </div>
@endsection






