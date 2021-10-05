@extends('layouts.app_authentication')

@section('scripts')
    {!! NoCaptcha::renderJs() !!}
@stop

@section('content')
    <section>
        <div class="for_register">
            <div class="smallcontainer">
                <div class="register_title">
                    <h1>Сброс пароля</h1>
                </div>
                <div class="register_content">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form_group row">
                            <input  type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" placeholder="E-mail *" required  autocomplete="email"  autofocus>

                                    @error('email')
                                        <p class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </p>
                                    @enderror

                        </div>
                        <div class="form_group row">
                                <input  type="password" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="new-password" required placeholder="Пароль *" >

                                        @error('password')
                                                <p class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </p>
                                        @enderror

                            </div>

                            <div class="form_group row">
                                    <input  type="password" class="form-control" name="password_confirmation"  autocomplete="new-password" required placeholder="Подтвердите пароль *" >
                            </div>

                        <div class="form_group row" style="text-align:center;">

                            {!! NoCaptcha::display() !!}

                            @error('g-recaptcha-response')
                                <span class="invalid-feedback d-block justify-content" role="alert">
                                    <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form_group">
                            <button type="submit">Сброс пароля</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
