<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @yield('title')
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset('backend/plugins/fontawesome-free/css/all.min.css')}}">
    {{-- <link rel="stylesheet" href="{{ asset('backend/plugins/jsgrid/jsgrid.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/plugins/jsgrid/jsgrid-theme.min.css')}}"> --}}
    <link rel="stylesheet" href="{{ asset('backend/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/dist/css/custom.css') }}">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    @include('partials.header')
    @include('partials.slidebar')
    @yield('content')
</div>
<!-- ./wrapper -->
<script src="{{ asset('backend/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('backend/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
{{-- <script src="{{ asset('backend/plugins/jsgrid/demos/db.js') }}"></script>
<script src="{{ asset('backend/plugins/jsgrid/jsgrid.min.js') }}"></script> --}}
<script src="{{ asset('backend/dist/js/adminlte.min.js') }}"></script>
{{-- <script>
    $(function () {
      $("#jsGrid1").jsGrid({
          height: "100%",
          width: "100%",
          sorting: true,
          paging: true,
          data: db.clients,
          fields: [
              { name: "Name", type: "text", width: 150 },
              { name: "Age", type: "number", width: 50 },
              { name: "Address", type: "text", width: 200 },
              { name: "Country", type: "select", items: db.countries, valueField: "Id", textField: "Name" },
              { name: "Action", type: "control"}
          ]
      });
    });
  </script> --}}

</body>
</html>
