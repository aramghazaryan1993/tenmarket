@extends('layouts.app_kabinet')

@section('title', 'Мои объявления Продам')

 @section('content')
        <div class="tab-content tabcont" id="myTabContent">
            <div class="tab-pane fade show active tabpan" id="home" role="tabpanel" aria-labelledby="home-tab">

            {{-- dd($ShowPradam) --}}
                <div class="kabinet_content">
                    <div class="kabinet_content_img">
                        <img src="{{ asset('assets/img/34.jpg') }}" alt="img">
                    </div>
                    <div class="kabinet_text">
                        <a href="{{ route('pradam finel product',['id' => 25]) }}">
                        <h4>Заявки ТЭНов</h4></a>
                        <div class="kabinet_t">

                            <p>Просмотров:<span>16</span></p>
                            <p>Действительно:<span>120 </span> дней</p>
                            <p>Рекламе осталось:<span>12 </span> дней</p>
                        </div>
                        <div class="kabinet_svg">
                            <div class="kabinet_img">
                                <a href="#general" class="fancybox">
                                    <div>
                                        <img src="{{ asset('assets/img/home.svg') }}" alt="img">
                                    </div>
                                    <span>Реклама</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div id="general" style="display:none" class="modal_block">
                        <h3>  Реклама в разделе продам</h3>
                        <br>
                        <div>
                            <p> Объявление будет размещено на главной странице ------------- в ротации с другими объявлениями.
                                Первым, что увидят посетители - это ваше объявление.
                            </p>
                        </div>
                        <hr>
                        <div class="agreement ">
                            <div class="agreement_text radiobtn ">
                                <a href="#">
                                    <label for="text_agr">
                                        Оплату производит
                                    </label>
                                </a>
                                <div class="fizyurradio">
                                    <label>
                                        <input type="radio" class="radio paymantcheck" name="agrement">
                                        Физическое лицо
                                    </label>
                                    <label>
                                        <input type="radio" class="radio secondcheck " name="agrement">
                                        Юридическое лицо
                                    </label>
                                </div>
                            </div>
                        </div>
                <div class="paymant">
                            <img src="{{ asset('assets/img/rbk.png') }}" alt="paymant">
                            <img src="{{ asset('assets/img/sberbank.png') }}" alt="paymant">
                        </div>

                        <div class="reduct_content">
                            <form >
                                <div class="region">
                                    <p>Регион</p>
                                    <div class="multiselect">
                                        <div class="selectBox">
                                            <select>
                                                <option>Россия</option>
                                            </select>
                                            <div class="overSelect"></div>
                                        </div>
                                        <div id="checkboxes">
                                            <label for="first">
                                                <input class="input_sel" type="checkbox" id="first" /> Россия </label>
                                            <label for="one">
                                                <input class="input_sel" type="checkbox" id="one" /> Адыгея </label>
                                            <label for="two">
                                                <input class="input_sel" type="checkbox" id="two" />Алтайский край</label>
                                            <label for="three">
                                                <input class="input_sel" type="checkbox" id="three" />Амурская область
                                            </label>
                                            <label for="three1">
                                                <input class="input_sel" type="checkbox" id="three1" />Архангельская область </label>
                                            <label for="three2">
                                                <input class="input_sel" type="checkbox" id="three2" />Астраханская область</label>
                                            <label for="three3">
                                                <input class="input_sel" type="checkbox" id="three3" />Башкортостан </label>
                                            <label for="four">
                                                <input class="input_sel" type="checkbox" id="four" />
                                                Белгородская область</label>
                                            <label for="three4">
                                                <input class="input_sel" type="checkbox" id="three4" />
                                                Брянская область</label>
                                            <label for="three5">
                                                <input class="input_sel" type="checkbox" id="three5" />
                                                Бурятия Республика</label>
                                            <label for="three6">
                                                <input class="input_sel" type="checkbox" id="three6" />Владимирская область</label>
                                            <label for="three7">
                                                <input class="input_sel" type="checkbox" id="three7" />Волгоградская область</label>
                                            <label for="three8">
                                                <input class="input_sel" type="checkbox" id="three8" />
                                                Вологодская область </label>
                                            <label for="three9">
                                                <input class="input_sel" type="checkbox" id="three9" />
                                                Воронежская область </label>
                                            <label for="three10">
                                                <input class="input_sel" type="checkbox" id="three10" />
                                                Дагестан </label>
                                            <label for="three11">
                                                <input class="input_sel" type="checkbox" id="three11" />
                                                Еврейская АО </label>
                                            <label for="three12">
                                                <input class="input_sel" type="checkbox" id="three12" />
                                                Ивановская область </label>
                                            <label for="three13">
                                                <input class="input_sel" type="checkbox" id="three13" />
                                                Ингушетия </label>
                                            <label for="three14">
                                                <input class="input_sel" type="checkbox" id="three14" />
                                                Иркутская область </label>
                                            <label for="three15">
                                                <input class="input_sel" type="checkbox" id="three15" />
                                                Кабардино-Балкария </label>
                                            <label for="three16">
                                                <input class="input_sel" type="checkbox" id="three16" />
                                                Калининградская область </label>
                                            <label for="three17">
                                                <input class="input_sel" type="checkbox" id="three17" />
                                                Калмыкия </label>
                                            <label for="three18">
                                                <input class="input_sel" type="checkbox" id="three18" />
                                                Калужская область </label>
                                            <label for="three19">
                                                <input class="input_sel" type="checkbox" id="three19" />
                                                Камчатка </label>
                                            <label for="three20">
                                                <input class="input_sel" type="checkbox" id="three20" />
                                                Карачаево-Черкессия </label>
                                            <label for="three21">
                                                <input class="input_sel" type="checkbox" id="three21" />
                                                Карелия </label>
                                            <label for="three22">
                                                <input class="input_sel" type="checkbox" id="three22" />
                                                Кемеровская область </label>
                                            <label for="three23">
                                                <input type="checkbox" id="three23" />
                                                Кировская область </label>
                                            <label for="three24">
                                                <input class="input_sel" type="checkbox" id="three24" />
                                                Коми Республика </label>
                                            <label for="three25">
                                                <input class="input_sel" type="checkbox" id="three25" />
                                                Коми-Пермяцкий АО </label>
                                            <label for="three26">
                                                <input class="input_sel" type="checkbox" id="three26" />
                                                Костромская область </label>
                                            <label for="three27">
                                                <input class="input_sel" type="checkbox" id="three27" />
                                                Краснодарский край </label>
                                            <label for="three28">
                                                <input class="input_sel" type="checkbox" id="three28" />
                                                Красноярский край </label>
                                            <label for="three29">
                                                <input class="input_sel" type="checkbox" id="three29" />
                                                Курганская область </label>
                                            <label for="three30">
                                                <input type="checkbox" id="three30" />
                                                Курская область </label>
                                            <label for="three31">
                                                <input class="input_sel" type="checkbox" id="three31" />
                                                Ленинградская область </label>
                                            <label for="three32">
                                                <input class="input_sel" type="checkbox" id="three32" />
                                                Липецкая область </label>
                                            <label for="three33">
                                                <input class="input_sel" type="checkbox" id="three33" />
                                                Магаданская область </label>
                                            <label for="three34">
                                                <input class="input_sel" type="checkbox" id="three34" />
                                                Мари-Эл </label>
                                            <label for="three35">
                                                <input class="input_sel" type="checkbox" id="three35" />
                                                Мордовия </label>
                                            <label for="three36">
                                                <input class="input_sel" type="checkbox" id="three36" />
                                                Московская область </label>
                                            <label for="three37">
                                                <input class="input_sel" type="checkbox" id="three37" />
                                                Мурманская область </label>
                                            <label for="three38">
                                                <input class="input_sel" type="checkbox" id="three38" />
                                                Нижегородская область </label>
                                            <label for="three39">
                                                <input class="input_sel" type="checkbox" id="three39" />
                                                Новгородская область </label>
                                            <label for="three40">
                                                <input class="input_sel" type="checkbox" id="three40" />
                                                Новосибирская область </label>
                                            <label for="three41">
                                                <input class="input_sel" type="checkbox" id="three41" />
                                                Омская область</label>
                                            <label for="three42">
                                                <input class="input_sel" type="checkbox" id="three42" />
                                                Оренбургская область </label>
                                            <label for="three43">
                                                <input class="input_sel" type="checkbox" id="three43" />
                                                Орловская область </label>
                                            <label for="three44">
                                                <input class="input_sel" type="checkbox" id="three44" />
                                                Пензенская область </label>
                                            <label for="three45">
                                                <input type="checkbox" id="three45" />
                                                Пермская область </label>
                                            <label for="three46">
                                                <input class="input_sel" type="checkbox" id="three46" />
                                                Приморский край </label>
                                            <label for="three47">
                                                <input class="input_sel" type="checkbox" id="three47" />
                                                Псковская область </label>
                                            <label for="three48">
                                                <input type="checkbox" id="three48" />
                                                Ростовская область </label>
                                            <label for="three49">
                                                <input class="input_sel" type="checkbox" id="three49" />
                                                Рязанская область </label>
                                            <label for="three50">
                                                <input class="input_sel" type="checkbox" id="three50" />
                                                Самарская область </label>
                                            <label for="three51">
                                                <input class="input_sel" type="checkbox" id="three51" />
                                                Саратовская область </label>
                                            <label for="three52">
                                                <input class="input_sel" type="checkbox" id="three52" />
                                                Сахалин </label>
                                            <label for="three53">
                                                <input class="input_sel" type="checkbox" id="three53" />
                                                Свердловская область </label>
                                            <label for="three54">
                                                <input class="input_sel" type="checkbox" id="three54" />
                                                Северная Осетия </label>
                                            <label for="three55">
                                                <input class="input_sel" type="checkbox" id="three55" />
                                                Смоленская область </label>
                                            <label for="three56">
                                                <input class="input_sel" type="checkbox" id="three56" />
                                                Ставропольский край </label>
                                            <label for="three57">
                                                <input class="input_sel" type="checkbox" id="three57" />
                                                Таймыр </label>
                                            <label for="three58">
                                                <input class="input_sel" type="checkbox" id="three58" />
                                                Тамбовская область </label>
                                            <label for="three59">
                                                <input class="input_sel" type="checkbox" id="three59" />
                                                Татарстан </label>
                                            <label for="three60">
                                                <input class="input_sel" type="checkbox" id="three60" />
                                                Тверская область </label>
                                            <label for="three61">
                                                <input class="input_sel" type="checkbox" id="three61" />
                                                Томская область </label>
                                            <label for="three62">
                                                <input class="input_sel" type="checkbox" id="three62" />
                                                Тува </label>
                                            <label for="three63">
                                                <input class="input_sel" type="checkbox" id="three63" />
                                                Тульская область</label>
                                            <label for="three64">
                                                <input class="input_sel" type="checkbox" id="three64" />
                                                Тюменская область </label>
                                            <label for="three65">
                                                <input class="input_sel" type="checkbox" id="three65" />
                                                Удмуртия </label>
                                            <label for="three66">
                                                <input class="input_sel" type="checkbox" id="three66" />
                                                Ульяновская область </label>
                                            <label for="three67">
                                                <input class="input_sel" type="checkbox" id="three67" />
                                                Усть-Ордынский АО </label>
                                            <label for="three68">
                                                <input class="input_sel" type="checkbox" id="three68" />
                                                Хабаровский край </label>
                                            <label for="three69">
                                                <input class="input_sel" type="checkbox" id="three69" />
                                                Хакассия </label>
                                            <label for="three70">
                                                <input class="input_sel" type="checkbox" id="three70" />
                                                Ханты-Мансийск </label>
                                            <label for="three71">
                                                <input class="input_sel" type="checkbox" id="three71" />
                                                Челябинская область </label>
                                            <label for="three72">
                                                <input class="input_sel" type="checkbox" id="three72" />
                                                Чеченская Республика </label>
                                            <label for="three73">
                                                <input class="input_sel" type="checkbox" id="three73" />
                                                Читинская область </label>
                                            <label for="three74">
                                                <input class="input_sel" type="checkbox" id="three74" />
                                                Чувашская Республика </label>
                                            <label for="three75">
                                                <input class="input_sel" type="checkbox" id="three75" />
                                                Якутия (Саха) </label>
                                            <label for="three76">
                                                <input class="input_sel" type="checkbox" id="three76" />
                                                Ямало-Ненецкий АО</label>
                                            <label for="three77">
                                                <input class="input_sel" type="checkbox" id="three77" /> Ярославская область </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="gen_count">
                                    <p class="generalval">Общая сумма
                                        <label><input type="text" name="total" class="num" size="6" value="0.00" readonly="readonly" />рублей</label>
                                    </p>
                                </div>
                                <div class="d-flex">
                                    <button class="btnmodal">Подтвердить</button>
                                    <button class="btnmodal" data-fancybox-close>Отменить
                                    </button></div>
                            </form>
                        </div>
                    </div>
                    <div class="three_icons">
                        <a href="#time1" class="fancybox">
                            <span class="green p-0" data-toggle="tooltip" title="Продлить на 30 дней " data-placement="top">
                            <img src="{{ asset('assets/img/time.svg') }}" alt="time"></span>
                        </a>
                        <a href="#generat" class="fancybox">
                        <span class="green" data-toggle="tooltip" title="Обновить" data-placement="top">&#8593;</span></a>
                        <a href="{{ route('edit pradam') }}" data-toggle="tooltip" title="Изменить" data-placement="top">
                            <img src="{{ asset('assets/img/edit.svg') }}" alt="img"></a>
                        <span data-toggle="tooltip" title="Деактивировать" data-placement="top">X</span>
                    </div>
                    <div id="time1" style="display:none" class="modal_block">
                        <h3> Продлить на 30 дней</h3>
                        <br>
                        <div>

                            <p> Ваше объявление будет продлено на 30 дней
                            </p>
                        </div>
                        <div class="agreement ">
                            <div class="agreement_text radiobtn ">
                                <a href="#">
                                    <label for="text_agr">
                                        Оплату производит
                                    </label>
                                </a>
                                <div class="fizyurradio">
                                    <label>
                                        <input type="radio" class="radio paymantcheck" name="agrement">
                                        Физическое лицо
                                    </label>
                                    <label>
                                        <input type="radio" class="radio secondcheck" name="agrement">
                                        Юридическое лицо
                                    </label>
                                </div>
                            </div>

                        </div>
                        <div class="paymant">
                            <img src="{{ asset('assets/img/rbk.png') }}" alt="paymant">
                            <img src="{{ asset('assets/img/sberbank.png') }}" alt="paymant">
                        </div>
                        <hr>

                        <div class="reduct_content">
                            <form>

                                <div class="d-flex">
                                    <button class="btnmodal">Подтвердить</button>
                                    <button class="btnmodal" data-fancybox-close>Отменить
                                    </button></div>
                            </form>
                        </div>
                    </div>
                    <div id="generat" style="display:none" class="modal_block">
                        <h3>  Обновить в разделе продам</h3>
                        <br>
                        <div>
                            <p> Объявление будет размещено на главной странице ------------- в ротации с другими объявлениями.
                                Первым, что увидят посетители - это ваше объявление.
                            </p>
                        </div>

                        <div class="agreement ">
                            <div class="agreement_text radiobtn ">
                                <a href="#">
                                    <label for="text_agr">
                                        Оплату производит
                                    </label>
                                </a>
                                <div class="fizyurradio">
                                    <label>
                                        <input type="radio" class="radio paymantcheck" name="agrement">
                                        Физическое лицо
                                    </label>
                                    <label>
                                        <input type="radio" class="radio secondcheck" name="agrement">
                                        Юридическое лицо
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="paymant">
                            <img src="{{ asset('assets/img/rbk.png') }}" alt="paymant">
                            <img src="{{ asset('assets/img/sberbank.png') }}" alt="paymant">
                        </div>
                        <hr>
                        <div class="reduct_content">
                            <form action="yurcontent.html">

                                <div class="d-flex">
                                    <button class="btnmodal">Подтвердить</button>
                                    <button class="btnmodal" data-fancybox-close>Отменить
                                    </button></div>
                            </form>
                        </div>
                    </div>

                </div>
                <hr>



            </div>
        </div>
 @stop
