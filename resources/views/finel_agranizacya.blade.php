@extends('layouts.app_home')

@section('title', $ShowFinelArganizacya->name)

  @section('content')
            <div class="contact">
                <div class="order_head">
                    <h1>Список организаций</h1>
                </div>
                <div class="partnerMain">
                    <div class="partnImg"><img src="{{ asset('img/img_arganizacya/'.$ShowFinelArganizacya->img) }}" alt="partner"></div>
                    <div class="contact_content">
                        <p><span>Имя:</span>{{ $ShowFinelArganizacya->name }} </p>
                        <a href="tel:{{ $ShowFinelArganizacya->phone_number  }}">
                            <p><span>Телефон:</span>{{ $ShowFinelArganizacya->phone_number }}</p>
                        </a>
                        <a href="tel:{{ $ShowFinelArganizacya->viber }}">
                            <p><img class="pr-2" src="{{ asset('img/img_default/viber.svg') }}" alt="viber">{{ $ShowFinelArganizacya->viber }} </p>
                        </a>
                        <a href="tel:{{ $ShowFinelArganizacya->whatsapp  }}">
                            <p><img class="pr-2" src="{{ asset('img/img_default/whatsapp.svg') }}" alt="whatsapp">{{ $ShowFinelArganizacya->whatsapp  }} </p>
                        </a>
                        <p><span>Описание:</span>{{ $ShowFinelArganizacya->description }}</p>
                        <p><span>E-mail:</span><a href="mailto:{{ $ShowFinelArganizacya->email }}"> {{ $ShowFinelArganizacya->email }}</a></p>
                        <p><span>Веб Страница</span><a href="{{ $ShowFinelArganizacya->website }}">
                            {{ ltrim($ShowFinelArganizacya->website,'https://') }}
                            </a></p>
                        <p><span>Адрес:</span>{{ $ShowFinelArganizacya->address }}</p>
                        <p><span>Время работы</span>пн-чт {{ $ShowFinelArganizacya->working_hours_start }}-{{ $ShowFinelArganizacya->working_hours_end }}</p>
                    </div>
                </div>
                <div class="contact_map">
                    <iframe src="{{ $ShowFinelArganizacya->map_location }}" frameborder="1" allowfullscreen="true"></iframe></div>
                </div>
  @stop
