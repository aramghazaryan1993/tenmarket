@extends('layouts.app_authentication')

@section('scripts')
    {!! NoCaptcha::renderJs() !!}
@stop

@section('content')

<section>
    <div class="for_register">
        <div class="smallcontainer">
            <div class="register_title">
                <h1>Регистрация</h1>
            </div>
            <div class="register_content">
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="form_group">
                        <input type="text" placeholder="Имя *" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required  autocomplete="name" autofocus>
                    </div>

                    {{-- @error('name')
                            <strong style="color:red;">{{ $message }}</strong>
                    @enderror --}}

                    <div class="form_group">
                        <input name="lastname" type="text" placeholder="Фамилия *" class="form-control @error('lastname') is-invalid @enderror" value="{{ old('lastname') }}" required>
                    </div>

                    {{-- @error('lastname')
                    <strong style="color:red;">{{ $message }}</strong>
                    @enderror --}}

                    <div class="form_group">
                        <input type="password" placeholder="Пароль *" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="new-password" required>
                    </div>
                    {{-- @error('password')
                            <strong style="color:red;">{{ $message }}</strong>
                    @enderror --}}

                    <div class="form_group">
                        <input type="password" placeholder="Повторите пароль *" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation"  autocomplete="new-password" required>
                    </div>

                    <div class="form_group">
                        <input type="email" placeholder="E-mail *"  class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  autocomplete="email" required>
                    </div>
                    {{-- @error('email')
                            <strong style="color:red;">{{ $message }}</strong>
                    @enderror --}}


                    <div class="form_group">
                        <input type="tel" class='tel form-control  @error("phone") is-invalid @enderror' placeholder="Мобильный телефон *" value="{{ old('phone') }}" name="phone" required>
                    </div>
                    <div class="form_group mt-5 row" style="text-align:center;">
                        {!! NoCaptcha::display() !!}

                        @error('g-recaptcha-response')
                            <span class="invalid-feedback d-block justify-content" role="alert"><br>
                                <p><strong>{{ $errors->first('g-recaptcha-response') }}</p></strong><br>
                            </span><br>
                        @enderror
                    </div>
                    <div class="form_group">
                        <button type="submit">Регистрация</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
