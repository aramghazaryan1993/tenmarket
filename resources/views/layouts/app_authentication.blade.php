@include('includes.default.head')

<body>
    <div class="bigcontainer">
        <div class="kabinettop">
            <div class="logo ">
                <a href="{{ route('home') }}">
                    <img src="{{ asset('assets/img/ten.png') }}" alt="logo" width="120px"></a>
            </div>
            <div class="add">
                <div class="namep">

                 @if (Route::has('login'))
                 @auth
                     <a href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"> Выход</a>
                 @else

                 @if (Route::has('register'))
                     <a href="{{ route('register') }}">Регистрация</a>
                 @endif
                     <a class="underline_text" href="{{ route('login') }}">Вход</a>
                     @endauth
                 @endif
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                </div>
                <a href="addorder.html"><button>Добавить объявление</button></a>
            </div>
        </div>
    </div>
                 @yield('content')

  @yield('scripts')
<script type="text/javascript" src="{{ asset('assets/js/app.js') }}"></script>

</body>

</html>
