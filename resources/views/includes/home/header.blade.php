<header>
    <div class="header">
        <div class="bigcontainer top_head">
            <p>НАГРЕВАТЕЛЬНЫЕ ЭЛЕМЕТЫ И ЭЛЕКТРОННЫЕ КОМПОНЕНТЫ-ПОКУПКА И ПРОДАЖА</p>
        </div>
    </div>
    <section>
        <div class="second">
            <div class="second_img">
                <img src="{{ asset('assets/img/39.jpg') }}" alt="img">
                <img src="{{ asset('assets/img/35.jpg') }}" alt="img">
                <img src="{{ asset('assets/img/30.jpg') }}" alt="img">
                <img src="{{ asset('assets/img/36.jpg') }}" alt="img">
                <img src="{{ asset('assets/img/33.jpg') }}" alt="img">
                <img src="{{ asset('assets/img/39.jpg') }}" alt="img">
            </div>
            <div class="second_inp">
                <form>
                    <div class="input-group ">
                        <input type="text" id="myInput" placeholder="Поиск" class="tags" autocomplete="off">
                        <ul id="selcont">
                            <li><a href="seldetail.html">TEN1</a></li>
                            <li><a href="seldetail.html">TEN2</a></li>
                            <li><a href="seldetail.html">TEN3</a></li>
                            <li><a href="seldetail.html">TEN4</a></li>
                            <li><a href="seldetail.html">TEN5</a></li>
                            <li><a href="seldetail.html">TEN6</a></li>
                        </ul>
                        <ul id="baycont">
                            <li><a href="bayers.html">ten ten3</a></li>
                            <li><a href="bayers.html">TEN3</a></li>
                            <li><a href="bayers.html">TEN4</a></li>
                            <li><a href="bayers.html">TEN5</a></li>
                            <li><a href="bayers.html">TEN6</a></li>
                        </ul>
                        <ul id="partnercont">
                            <li><a href="partnercontact.html">TEN2 TEN2 TEN2</a></li>
                            <li><a href="partnercontact.html">TEN3</a></li>
                            <li><a href="partnercontact.html">TEN4</a></li>
                            <li><a href="partnercontact.html">TEN5</a></li>
                            <li><a href="partnercontact.html">TEN6</a></li>
                        </ul>
                        <div class="input-group-append">
                            <span class="input-group-text custom-select">
                                <select id="tenop">
                                    <option value="chooseval">Выбирать</option>
                                    <option value="sell">Продам</option>
                                    <option value="bay">Куплю</option>
                                    <option value="partner">Справочник</option>
                                </select>
                            </span>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <div class="main_menu">
        <div class=" bigcontainer menu_content">
            <div class="logo"> <a href="{{ route('home') }}">
                    <img src="{{ asset('assets/img/ten.png') }}" alt="logo"></a>
            </div>
            <div class="for-mobile-bg"></div>
            <div class="open-menu">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>
            <div class=" mobile-bg-1">
                <div id="mySidenav" class="sidenav">
                    <ul>
                        <li><a href="{{  route('home')  }}" >Главная</a></li>
                        <li><a href="{{  route('pradam')  }}">Продам</a></li>
                        <li><a href="{{  route('kuplyu') }}">Куплю</a></li>
                        <li><a href="{{  route('tenorders')  }}">Заявки на изготовление ТЭНов</a></li>
                        <li><a href="{{  route('arganizacya')  }}">Список организаций</a></li>
                        @if (Route::has('login'))
                            @auth
                                <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();"> Выход</a>
                            @endauth
                        @endif
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                          <li><a href="">Добавить объявление</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>
