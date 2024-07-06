@extends('layouts.auth')

@section('content')
<!-- Login form -->
<form method="POST" class="login-form"  action="{{ route('login') }}">
      @csrf
  <div class="card mb-0">
    <div class="card-body">
  
      <div class="text-center mb-3">
        <i class="icon-reading icon-2x text-slate-300 border-slate-300 border-3 rounded-round p-3 mb-3 mt-1"></i>
        <h5 class="mb-0">Login to your account</h5>
        <span class="d-block text-muted">Enter your credentials below</span>
      </div>

      <div class="form-group form-group-feedback form-group-feedback-left">

        <input id="username" type="text" placeholder="Username" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

        @error('username')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

        <div class="form-control-feedback">
          <i class="icon-user text-muted"></i>
        </div>
      </div>

      <div class="form-group form-group-feedback form-group-feedback-left">
         <input id="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

          @error('password')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror

        <div class="form-control-feedback">
          <i class="icon-lock2 text-muted"></i>
        </div>
      </div>

      <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block">{{ __('Login') }} <i class="icon-circle-right2 ml-2"></i></button>
      </div>

      <div class="text-center">
        @if (Route::has('password.request'))
            <a href="{{ route('password.request') }}">
                {{ __('Forgot Your Password?') }}
            </a>
        @endif
      </div>

    </div>
  </div>
</form>
<!-- /login form -->
@endsection
