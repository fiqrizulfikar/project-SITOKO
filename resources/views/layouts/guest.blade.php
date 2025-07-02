<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title', 'SITOKO')</title>

  <link href="{{ asset('admin_assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
  <link href="{{ asset('admin_assets/css/sb-admin-2.min.css') }}" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,400,700" rel="stylesheet">


  <style>
    .bg-gradient-success {
      background: linear-gradient(to right, #007BFF, #0056b3);
    }

    .btn-success {
      background-color: #0056b3;
      border-color: #0056b3;
    }

    .btn-success:hover {
      background-color: #004085;
      border-color: #004085;
    }

    .form-control-user {
      border-color: #007bff;
    }

    .bg-login-image {
      background-image: url('https://i.pinimg.com/474x/04/07/7b/04077b584f580d0372eb63f7db77904b.jpg');
      background-size: cover;
      background-position: center;
    }
  
  </style>
</head>
<body class="bg-gradient-success">

  <div class="container mt-5">
    @yield('content')
  </div>

  <script src="{{ asset('admin_assets/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('admin_assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('admin_assets/js/sb-admin-2.min.js') }}"></script>
</body>
</html>
