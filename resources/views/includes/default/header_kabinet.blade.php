<div class="kabinettop">
    <div class="logo">
        <a href="{{ route('home') }}">
            <img src="{{ asset('assets/img/ten.png') }}" alt="logo"></a>
    </div>
    <div class="add">
        <div class="namep">
            <img src="{{ asset('img/users/'.Auth::user()->img) }}" alt="img">
            <h1>{{ Auth::user()->name }} {{ Auth::user()->last_name }}</h1>
        </div>
        <a href="@if(Request::segment(1) == 'pradam_kabinet')
                    {{ route('add pradam') }}
                @elseif(Request::segment(1) == 'kuplyu_kabinet')
                    {{ route('add kuplyu') }}
                @elseif(Request::segment(1) == 'tenorders_kabinet')
                    {{ route('add tenorders') }}
                @elseif(Request::segment(1) == 'arganizacya_kabinet')
                    {{ route('add arganizacya') }}
                @endif">
        <button>Добавить объявление</button></a>
    </div>
</div>
