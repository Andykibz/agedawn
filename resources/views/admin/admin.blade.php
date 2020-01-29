<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>SB Admin - Dashboard</title>


  <link href="{{ asset('css/sb-admin.css') }}" rel="stylesheet">
  <link href="{{ asset('vendor/css/all.min.css') }}" rel="stylesheet">

</head>

<body id="page-top">
    <div id="admin">
        <admin></admin>
    </div>

  {{-- @include('admin.components.nav') --}}

  {{-- <div id="wrapper">

    @include('admin.components.sidebar')

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        @include('admin.components.breadcrumb')

        <!-- Icon Cards-->
        @include('admin.components.cards')

        


      </div>
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->
      @include('admin.components.footer')

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper --> --}}

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  @include('admin.components.logoutmodal')

  <script src="{{ asset('js/admin.js') }}" defer></script>


</body>

</html>
