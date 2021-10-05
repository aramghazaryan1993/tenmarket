@extends('layouts.app_authentication')

@section('scripts')
    {!! NoCaptcha::renderJs() !!}
@stop

@section('content')

    <section>
        <div class="for_register">
            <div class="smallcontainer">
                <div class="register_title">
                    <h1>ВХОД НА САЙТ</h1>
                </div>
                <div class="register_content">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form_group">
                            <input type="email" placeholder="E-mail *" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        </div>

                        <div class="col-md-6">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form_group">
                            <input type="password" placeholder="Пароль *" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                        </div>

                        <div class="col-md-6">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
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
                            <div class="form_group mt-5 row" style="text-align:center;">
                                {!! NoCaptcha::display() !!}

                                @error('g-recaptcha-response')
                                    <span class="invalid-feedback d-block justify-content" role="alert">
                                        <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                    </span>
                                @enderror
                            </div>
                        <div class="form_group">
                            <button type="submit">ВХОД</button>
                        </div>
                        <div class="form_group">
                            @if (Route::has('register'))
                            <a href="{{ route('register') }}">Регистрация</a>
                            @endif

                            @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}">Забыли пароль?</a>
                            @endif


                        </div>


                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection
