@extends('layouts.app_home')

@section('title', 'Реклама на сайте')


@section('content')

        <div class="confidense">
            <div class="hedding">
                <h1>Реклама на сайте</h1>
            </div>
            <p> {{ $ShowReklama[0]->text_advertising }}</p>

            <div class="iFram">
                <iframe width="100%" height="400" src="{{ $ShowReklama[0]->youtube_link }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe>

            </div>
        </div>
@stop
