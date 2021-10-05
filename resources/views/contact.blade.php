@extends('layouts.app_home')

@section('title', 'Обратная связь')

@if ($message = Session::get('success'))
<div class="alert alert-success alert-block" style="text-align:center;">
 <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
</div>
@endif

@section('content')
            <div class="contacMaintContent">
                <div>
                    <div class="contactHead">
                        <h1>Обратная связь</h1>
                    </div>
                    <div class="contactContent">
                        <div class="contacttitle">
                            <h3>ПРИГЛАШАЕМ К СОТРУДНИЧЕСТВУ</h3>
                            <p>{{ $ShowContact[0]->text_contact }}</p>
                            <div class="contactimg ">
                                <img src="{{ asset('assets/img/telephoneb.svg') }}" alt="tel">
                                <a href="tel: {{ $ShowContact[0]->phone }}">
                                    <p>Tel: <span>{{ $ShowContact[0]->phone }}</span></p>
                                </a>
                            </div>
                            <div class="contactimg">
                                <img src="{{ asset('assets/img/emailb.svg') }}" alt="email">
                                <p>E-mail <a href="#">{{ $ShowContact[0]->email }}</a> </p>
                            </div>
                        </div>
                    </div>
                    <div class="formcontent">
                        <h2>Свяжитесь с нами</h2>
                        <div class="overform">
                            <form method="POST" action="{{ route('contact') }}">
                                {{csrf_field()}}
                                <input id="title" type="text" placeholder="Заглавие" name="title" value="{{ old('title') }}" required>

                                   @error('title')
                                        <a style="color:red;" class='contact_validation' >{{ $message }}</a>
                                   @enderror

                                <input type="text" placeholder="ФИО" name="full_name" value="{{ old('full_name') }}" required>

                                   @error('full_name')
                                       <a style="color:red;" class="contact_validation">{{ $message }}</a>
                                   @enderror

                                <input class="tel" type="tel" placeholder="Телефон" name="phone" value="{{ old('phone') }}" required>

                                   @error('phone')
                                        <a style="color:red;" class="contact_validation">{{ $message }}</a>
                                   @enderror

                                <input type="email" placeholder="Электронный адрес" name="email" value="{{ old('email') }}" required>

                                   @error('email')
                                        <a style="color:red;" class="contact_validation">{{ $message }}</a>
                                   @enderror

                                <textarea placeholder="Вопросы/комментарии" name="comment" >{{ old('comment') }}</textarea>
                                <button type="submit">Отправить</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
@stop
