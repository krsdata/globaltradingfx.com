<!DOCTYPE html>
<html lang="en">
<title> | PASSWORD-RESET-PAGE | </title>
<head>
@include('auth.login-head')

</head>
<style type="text/css">
 .form-control-user {
  font-size: 0.8rem;
  border-radius: 10rem;
  padding: 1.5rem 1rem;
}
</style>

<body class="body-bg">

  <div class="container">

    <!-- Outer Row -->
    <div class="col-xl-6 col-lg-6 col-md-6 mt-2 offset-md-3">
        <div class="col-lg-12 text-center">
            <img class="login-logo" src="{{asset('backend/imgtrading_logo.png')}}">
          </div>

        <div class="card o-hidden border-0 shadow-lg mb-4">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <!-- s -->
              <div class="col-lg-12">
                <div class="p-5">
                  <div class="text-center">
                     <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">{{ __('Reset Password') }}</h1>
                  </div>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                     <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group row">
                            <label for="email" class="col-md-5 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input  id="email" type="email" class="form-control @error('email') is-invalid @enderror form-control-user" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus placeholder="Enter Email Address...">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-5 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror form-control-user " name="password" required autocomplete="new-password" placeholder="Password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-5 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class=" form-control-user  form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-bg">
                                    {{ __('Reset Password') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>
</body>

</html>




