@extends('layouts.guest')

@section('title', 'Reset Password - SITOKO')

@section('content')
<div class="row justify-content-center">

  <div class="col-xl-6 col-lg-8 col-md-9">
    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <div class="p-5">
          <div class="text-center">
            <h1 class="h4 text-gray-900 mb-4">Reset Password</h1>
          </div>

          <form method="POST" action="{{ route('password.update') }}" class="user">
            @csrf

            <input type="hidden" name="token" value="{{ request()->route('token') }}">

            <div class="form-group">
              <input id="email" type="email" name="email" value="{{ $email ?? old('email') }}"
                class="form-control form-control-user @error('email') is-invalid @enderror"
                placeholder="Email Anda..." required autofocus>
              @error('email')
                <div class="invalid-feedback d-block">{{ $message }}</div>
              @enderror
            </div>

            <div class="form-group">
              <input id="password" type="password"
                class="form-control form-control-user @error('password') is-invalid @enderror"
                name="password" required placeholder="Password Baru">
              @error('password')
                <div class="invalid-feedback d-block">{{ $message }}</div>
              @enderror
            </div>

            <div class="form-group">
              <input id="password-confirm" type="password" class="form-control form-control-user"
                name="password_confirmation" required placeholder="Konfirmasi Password Baru">
            </div>

            <button type="submit" class="btn btn-success btn-user btn-block">
              Reset Password
            </button>
          </form>

          <hr>
          <div class="text-center">
            <a class="small" href="{{ route('login') }}">Kembali ke Login</a>
          </div>

        </div>
      </div>
    </div>
  </div>

</div>
@endsection
