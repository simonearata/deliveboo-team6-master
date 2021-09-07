@extends('layouts.app')

@section('content')

<div class="contenitore">
    <div class="left-box">
        <div class="content-video">

            <video class="video" poster="/video/giphy.gif" autoplay loop muted>
            {{-- <source src="/NomeVideo.mp4" type="video/mp4">
            <source src="/NomeVideo.ogv" type="video/ogg">
            <source src="/NomeVideo.webm" type="video/webm"> --}}
            </video>

        </div><!--/content-video-->
    </div>

    {{-- BOX LOG-IN E REGISTER --}}

    <div class="right-box">


        <div class="box-registerr">
          <h2>REGISTRATI</h2>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="form-group row">
                    <label for="name" {{-- class="col-md-4 col-form-label text-md-right" --}}>{{-- {{ __('Name') }} --}}</label>

                    <div class="col-md-6">
                        <input id="name" type="text" placeholder="Nome" class="name  @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="email" {{-- class="col-md-4 col-form-label text-md-right" --}}>{{-- {{ __('E-Mail Address') }} --}}</label>

                    <div class="col-md-6">
                        <input id="email" type="email" placeholder="Indirizzo e-mail" class="email @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

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
                        <input id="password" type="password" placeholder="Password" class="pwd @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password-confirm" {{-- class="col-md-4 col-form-label text-md-right" --}}>{{-- {{ __('Confirm Password') }} --}}</label>

                    <div class="col-md-6">
                        <input id="password-confirm" placeholder="Conferma password" type="password" class="pwd" name="password_confirmation" required autocomplete="new-password">
                    </div>
                </div>

                {{-- <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Register') }}
                        </button>
                    </div>
                </div> --}}

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

                        <button type="submit" class="register" action="{{ route('register') }}">
                            <span>{{ __('Registrati') }}</span>
                        </button>
                        <button type="submit" class="signin" action="{{ route('login') }}">
                            {{-- <span>{{ __('Accedi') }}</span> --}}
                           <a href="{{ route('login') }}">Accedi</a>
                        </button>
                        <div class="reg"></div>

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