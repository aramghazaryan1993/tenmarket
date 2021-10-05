@include('includes.default.head')


<body>
    <div class="bigcontainer">
        <div class="logo mt-5 mb-5">
            <a href="{{  route('home')  }}">
                <img src="{{ asset('assets/img/ten.png') }}" alt="logo" width="120px"></a>
        </div>
    </div>
    @if (Session::has('success'))
        <div style='width:60%;margin:auto;text-align:center;'  class='alert alert-success contact_info alert_close'>
            <a  href='#' class='close' data-dismiss='alert'  aria-label='close'>&times; </a>Ваш запрос был успешно выполнен
        </div>
   @endif
    <section>
        <div class="fizlico">
            <div class="bigcontainer">
                <div class="fizlico_hedding">
                    <h1>Физическое лицо</h1>
                </div>
                <div class="fiz_content">
                    <form method="post" action="{{ route('fizicheskoye edit') }}">
                        {{csrf_field()}}
                        <div class="fiz_title">
                            <p>Фамилия</p>
                            <input type="text" placeholder="Фамилия" value="{{$GetFizicheskoye->last_name}}" name="lastname" id="lastname" required>
                        </div>
                        <div class="fiz_title">
                            <p>Имя</p>
                            <input type="text" placeholder="Имя" value="{{$GetFizicheskoye->first_name}}" name="username" id="username" required>
                        </div>
                        <div class="fiz_title">
                            <p>Отчество</p>
                            <input type="text" placeholder="Отчество" value="{{$GetFizicheskoye->middle_name}}" name="surname" id="surname" required>
                        </div>
                        <div class="fiz_title">
                            <p>Телефон</p>
                            <input type="tel" class="tel" placeholder="Телефон" value="{{$GetFizicheskoye->phone_number }}" name="phone_number" id="phone_number" required>
                        </div>
                        <div class="fiz_title">
                            <p>Электронная почта</p>
                            <input type="email" placeholder="Электронная почта" value="{{$GetFizicheskoye->email}}" name="email" id="email" required>
                        </div>
                        <div class="fiz_title">
                            <p>Почтовый индекс</p>
                            <input type="number" placeholder="Почтовый индекс" value="{{$GetFizicheskoye->post_code }}" name="post_code" id="post_code" required>
                            <lable class="post_code"></lable>
                        </div>
                        <div class="fiz_title">
                            <p>Город</p>
                            <input type="text" placeholder="Город" value="{{$GetFizicheskoye->city}}" name="city" id="city" required>
                        </div>
                        <hr>
                        <div class="span_text">
                            <p> <span>*</span> - обязательные для заполнения поля</p>
                        </div>
                        <div class="fiz_buttons">
                            <button type="submit">Сохранить изменения</button>
                            <button>Отмена</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
<script type="text/javascript" src="{{ asset('assets/js/app.js') }}"></script></body>

</html>
