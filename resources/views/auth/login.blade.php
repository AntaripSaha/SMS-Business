@extends('layouts.app')

@section('content')

<style>
body  {
  background-image: url("/assets/smartphone.jpg");
  background-color: #cccccc;
  
}

#grad1 {
  height: 415px;
  width: 495px;
  background-image: linear-gradient(to left, rgb(0 255 196 / 33%), rgb(0 149 255 / 26%));
  background-color: #fff0;
}

#login{
    margin-bottom: 37px;
    font-weight: 600 ;
    margin-left: 174px ;
    margin-top: 3px;
    font-size: 45px;
}

#reg{
    margin-top: 8px;
    width: 140px;
    height: 45px;
    margin-left: 162px;
}
@media only screen and (max-width: 500px) {
    body  {
    background-image: url("/assets/smartphone.jpg" ) no-repeat center center fixed;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
    background-color: #cccccc;
    }
    #grad1 {
    height: 421px;
    width: 388px;
    background-image: linear-gradient(to left, rgb(0 255 196 / 33%), rgb(0 149 255 / 26%));
    background-color: #fff0;
    margin-bottom: 447px;
    }
    #login{
        margin-bottom: 25px;
        font-weight: 800;
        margin-left: 112px;
        margin-top: 3px;
        font-size: 47px;
    }
    #reg{
        margin-top: -70px;
        width: 140px;
        height: 45px;
        margin-left: 195px;

    }
}

</style>
<div class="container">
<!-- Flush Messages -->
    @include('layouts/flash-msg')
    @yield('content')  
<!-- Flush Messages -->
    <div class="row justify-content-center">
        <div class="col-md-8">
        <div class="card" id="grad1" >
                <div class="card-body">
                    <div id="login">
                        Login
                    </div>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <!-- <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> -->

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">Phone</label>

                            <div class="col-md-6">
                                <input id="phone" type="phone" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus>

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-sm" style="height: 45px; width: 140px; background-color: #bc23cf42;">
                                    {{ __('Login') }}
                                </button>

                                <!-- @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif -->
                            </div>
                        </div>
                    </form>
                    <form action="{{ route('register') }}">
                        <button type="submit" class="btn btn-info btn-sm"  id="reg">
                            Register
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
