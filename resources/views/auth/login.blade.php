@extends('layouts.app')

@section('content')

<div class="contenitore">
    <div class="left-box">
        <div class="content-video">

            <video class="video" poster="/video/giphy.gif" autoplay loop muted></video>

        </div><!--/content-video-->
    </div>

    {{-- BOX LOG-IN E REGISTER --}}

    <div class="right-box">


        <div class="box-loginn">
          <h2>LOGIN</h2>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group row">
                    <label for="email" {{-- class="col-md-4 col-form-label text-md-right" --}}>{{-- {{ __('Indirizzo E-Mail') }} --}}</label>

                    <div class="col-md-6">
                        <input id="email" {{-- type="email" --}}  placeholder="Email" class="email @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password" {{-- class="col-md-4 col-form-label text-md-right" --}}>{{-- {{ __('Password') }} --}}</label>

                    <div class="col-md-6">
                        <input id="password" type="password" placeholder="Password" class="pwd @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                {{-- <div class="form-group row">
                    <div class="col-md-6 offset-md-4">
                        <div class="form-check">
                            <input class="form-check-input link" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>
                </div> --}}

                <div class="form-group row mb-0">

                        <button type="submit" class="signin" action="{{ route('login') }}">
                            <span>{{ __('Accedi') }}</span>
                        </button>

                        <button  class="register" action="{{ route('register') }}">
                            {{-- <span>{{ __('Registrati') }}</span> --}}
                           <a href="{{ route('register') }}">Registrati</a>
                        </button>

                        {{-- <a href="{{ route('register') }}"><button type="submit" class="register"><span>Register</span></button></a> --}}

                        {{-- <button type="submit" class="signin" action="{{ route('login') }}">
                            <span>{{ __('Accedi') }}</span>
                        </button> --}}


                        @if (Route::has('password.request'))
                            <a class="link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif

                </div>
            </form>

        </div>



    </div>
</div>

<script>

</script>

@endsection