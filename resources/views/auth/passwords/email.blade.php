@extends('layouts.app_authentication')

@section('scripts')
    {!! NoCaptcha::renderJs() !!}
@stop


@section('content')
<section>
    <div class="for_register">
        <div class="smallcontainer">
            <div class="register_title">
                <h1>ВОССТАНОВИТЬ ПАРОЛЬ</h1>
            </div>

            @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
            @endif

            <div class="register_content">
                <form method="POST" action="{{ route('password.email') }}" >
                    @csrf
                    <div class="form_group row">
                        <input type="email" placeholder="E-mail *" id="email"  class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  autocomplete="email" autofocus required>

                        @error('email')
                                    <p class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </p>
                        @enderror
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
                        <button type="submit">Отправить ссылку для сброса пароля</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
