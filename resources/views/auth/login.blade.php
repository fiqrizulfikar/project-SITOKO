<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Masuk - SITOKO</title>

  <!-- fonts-->
  <link href="{{ asset('admin_assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- styles-->
  <link href="{{ asset('admin_assets/css/sb-admin-2.min.css') }}" rel="stylesheet">
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
  <div class="container">
    <!-- Outer Row -->
    <div class="row justify-content-center">
      <div class="col-xl-10 col-lg-12 col-md-9">
        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <!-- Sisi gambar -->
              <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>

              <!-- Sisi form login -->
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Selamat Datang!</h1>
                  </div>
                  <form action="{{ route('login') }}" method="POST" class="user">
                    @csrf

                    {{-- Tampilkan pesan error --}}
                    @if ($errors->any())
                      <div class="alert alert-danger">
                        <ul class="mb-0">
                          @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                          @endforeach
                        </ul>
                      </div>
                    @endif

                    <div class="form-group">
                      <input name="email" type="email" class="form-control form-control-user" value="{{ old('email') }}" required autofocus placeholder="Email Anda...">
                    </div>
                    <div class="form-group">
                      <input name="password" type="password" class="form-control form-control-user" required placeholder="Password">
                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input name="remember" type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck">Ingat Saya</label>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-success btn-block btn-user">Masuk</button>
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="{{ route('password.request') }}">Lupa Password?</a>
                  </div>
                  <div class="text-center">
                    <a class="small" href="{{ route('register') }}">Buat akun baru!</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="{{ asset('admin_assets/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('admin_assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <!-- Core plugin JavaScript-->
  <script src="{{ asset('admin_assets/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
  <!-- scripts for all pages-->
  <script src="{{ asset('admin_assets/js/sb-admin-2.min.js') }}"></script>
</body>
</html>
