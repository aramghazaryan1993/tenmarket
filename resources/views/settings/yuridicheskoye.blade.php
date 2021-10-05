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
                    <h1>Юридическое лицо</h1>
                </div>
                <div class="fiz_content">
                    <form  method="post" action="{{ route('yuridicheskoye edit') }}">
                                                     {{csrf_field()}}
                        <div class="fiz_title">
                            <p>ИНН</p>
                            <input type="number" placeholder="ИНН" value="{{$GetYuridicheskoye->INN}}" name="inn" id="inn"  required>
                        </div>
                        <div class="fiz_title">
                            <p>Краткое название организации</p>
                            <input type="text" placeholder="Краткое название организации" value="{{$GetYuridicheskoye->company_name}}" name="kno" id="kno" required>
                        </div>
                        <div class="fiz_title">
                            <p>Полное название организации</p>
                            <input type="text" placeholder="Полное название организации" value="{{$GetYuridicheskoye->company_full_name}}" name="pno" id="pno" required>
                        </div>
                        <div class="fiz_title">
                            <p>КПП</p>
                            <input type="number" placeholder="КПП" value="{{$GetYuridicheskoye->KPP}}" name="kpp" id="kpp" required>
                        </div>
                        <div class="fiz_title">
                            <p class="outspan">ОГРН</p>
                            <input type="number" placeholder="ОГРН" value="{{$GetYuridicheskoye->OGRN}}" name="ogrn" id="ogrn" required>
                        </div>
                        <div class="fiz_title">
                            <p>Телефон</p>
                            <input type="tel" class="tel" placeholder="Телефон" value="{{$GetYuridicheskoye->phone_number }}" name="telephone" id="telephone" required>
                        </div>
                        <div class="fiz_title">
                            <p>Электронная почта</p>
                            <input type="email" placeholder="Электронная почта" value="{{$GetYuridicheskoye->email }}" name="mail" id="mail" required>
                        </div>
                        <div class="fiz_title">
                            <p class="outspan">Контактное лицо</p>
                            <input type="text" placeholder="Контактное лицо" value="{{$GetYuridicheskoye->contact_person }}" name="contact_person" id="contact_person">
                        </div>
                        <h4>Юридический адрес</h4>
                        <div class="fiz_title">
                            <p>Юридический адрес</p>
                            <input type="text" placeholder="Юридический адрес" value="{{$GetYuridicheskoye->legal_address }}" name="legal_address" id="legal_address" required>
                        </div>
                        <h4>Почтовый адрес</h4>
                        <div class="fiz_title">
                            <p>Выберите вариант доставки </p>
                            <div class="mailadd">
                                <label for="mailadd">
                                    <input type="radio" name="mailadd" id="mailadd" value="0" @if($GetYuridicheskoye->delivery_type==0) checked @endif>
                                    абонентский ящик
                                </label>
                                <label for="mailadd2">
                                    <input type="radio" name="mailadd" id="mailadd2" value="1" @if($GetYuridicheskoye->delivery_type==1) checked @endif>
                                    по адресу
                                </label>
                            </div>
                        </div>
                        <div id="hiddenel1">
                            <div class="fiz_title">
                                <p>Почтовый индекс</p>
                                <input type="number" placeholder="Почтовый индекс" value="{{$GetYuridicheskoye->post_index }}" name="post_index1" id="post_index1"  >
                            </div>
                            <div class="fiz_title">
                                <p>Абонентский ящик</p>
                                <input type="text" placeholder="Абонентский ящик" value="{{$GetYuridicheskoye->customer_box }}" name="customer_box1" id="customer_box1">
                            </div>
                            <div class="fiz_title">
                                <p class="outspan">Почтовый адрес</p>
                                <textarea name="post_address1" name="post_address1" id="post_address1">{{$GetYuridicheskoye->post_address }}</textarea>
                            </div>
                        </div>
                        <div id="hiddenel">
                            <div class="fiz_title">
                                <p>Населенный пункт</p>
                                <input type="text" placeholder="Населенный пункт" value="{{$GetYuridicheskoye->locality }}" name="locality" id="locality" >
                            </div>
                            <div class="fiz_title">
                                <p>Улица</p>
                                <input type="text" placeholder="Улица" value="{{$GetYuridicheskoye->street }}" name="street" id="street" >
                            </div>
                            <div class="fiz_title">
                                <p>Почтовый индекс</p>
                                <input type="number" placeholder="Почтовый индекс" value="{{$GetYuridicheskoye->to_post_index }}" name="to_post_index" id="to_post_index" >
                            </div>
                            <div class="fiz_title">
                                <p>Дом/корпус</p>
                                <input type="text" placeholder="Дом/корпус" value="{{$GetYuridicheskoye->house }}" name="house" id="house" >
                            </div>
                            <div class="fiz_title">
                                <p class="outspan">Почтовый адрес</p>
                                <textarea name="to_post_address" name="to_post_address" id="to_post_address" >{{$GetYuridicheskoye->to_post_address }}</textarea>
                            </div>
                        </div>
                        <h4>Платежные реквизиты и дополнительная информация</h4>
                        <div class="fiz_title">
                            <p class="outspan">БИК</p>
                            <input type="number" placeholder="БИК" value="{{$GetYuridicheskoye->BIK }}" name="bik" id="bik">
                        </div>
                        <div class="fiz_title">
                            <p class="outspan">Расчетный счет</p>
                            <input type="number" placeholder="04544884" value="{{$GetYuridicheskoye->check_account }}" name="check_account" id="check_account">
                        </div>
                        <h4>Гос. учреждения</h4>
                        <div class="fiz_title">
                            <p class="outspan">КБК</p>
                            <input type="number" value="{{$GetYuridicheskoye->KBK }}" name="kbk" id="kbk">
                        </div>
                        <div class="fiz_title">
                            <p class="outspan">ОКТМО</p>
                            <input type="number" value="{{$GetYuridicheskoye->OKTMO }}" name="oktmo" id="oktmo">
                        </div>
                        <hr>
                        <div class="span_text">
                            <p> <span>*</span> - обязательные для заполнения поля</p>
                        </div>
                        <div class="fiz_buttons">
                            <button type="submit" >Сохранить изменения</button>
                            <button>Отмена</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
<script type="text/javascript" src="{{ asset('assets/js/app.js') }}"></script></body>

</html>
