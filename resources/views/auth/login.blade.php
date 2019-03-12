@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="national_id" class="col-md-4 col-form-label text-md-right">{{ __('National ID') }}</label>

                            <div class="col-md-6">
                                <input id="national_id" type="number" class="form-control{{ $errors->has('national_id') ? ' is-invalid' : '' }}" name="national_id" value="{{ old('national_id') }}" required autofocus>

                                @if ($errors->has('national_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('national_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                            </div>
                            <hr>
                            <div class="form-group">
                            <label class="col-md-4 control-label">Or Login with</label>
                            <div class="row">
                            </div>
                            <div class="col-md-8 offset-md-2">
                            <a href="{{ url('login/twitter')}}" class="btn btn-social-icon btn-twitter"><i class="fa fa-twitter"></i> Twitter</a>
                            <br><a href="{{ url('login/facebook')}}" class="btn btn-social-icon btn-facebook"><i class="fa fa-facebook"></i> Facebook</a>
                            <br><a href="{{ url('login/google')}}" class="btn btn-social-icon btn-google"><i class="fa fa-google"></i> Google</a>
                            <br><a href="{{ url('login/linkedin')}}" class="btn btn-social-icon btn-linkedin"><i class="fa fa-linkedin"></i> Linkedin</a>
                            <br><a href="{{ url('login/github')}}" class="btn btn-social-icon btn-github"><i class="fa fa-facebook"></i> Github</a>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
