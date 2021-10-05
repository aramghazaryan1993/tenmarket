@extends('layouts.app_home')

@section('title', 'Политика конфиденциальности')



    @section('content')
    <div class="confidense">
        <div class="hedding">
            <h1>Политика конфиденциальности</h1>
        </div>
        <p> {{ $ShowPrivacyPolicy[0]->privacy_policy }}</p>
    </div>
    @endsection


