@extends('layouts.app_kabinet')

@section('title', 'Мои объявления Куплю')

  @section('content')

  <div class="tab-content tabcont" id="myTabContent">
    <div class="tab-pane  active tabpan" id="home">


    @foreach($ShowKuplyu as $value)

        <div class="kabinet_content">
            <div class="kabinet_content_img">
                <img src="{{ asset('img/img_kuplyu/'.$value->img) }}" alt="img">
            </div>
            <div class="kabinet_text">
                <a target="_blank" href="{{ route('kuplyu finel product',['id' => $value->KuplyuId]) }}">
                <h4>{{ $value->product_name }}</h4></a>
                <div class="kabinet_t">
                    <p>Действительно:<span>120 </span> дней</p>

                    <p>Просмотров:<span>{{ $value->counter }}</span></p>
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
                <h3>  Реклама в разделе куплю</h3>
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
                <div class="reduct_content">
                    <form>
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
                                @foreach($ShowRegionList as $Region)
                                    <label for="first{{ $Region->id }}">
                                        <input class="input_sel" type="checkbox" id="first{{ $Region->id }}" value="{{ $Region->id }}" /> {{ $Region->region }}
                                    </label>
                                @endforeach
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
                 <a href="#time3" class="fancybox">
                    <span class="green p-0" data-toggle="tooltip" title="Продлить на 30 дней " data-placement="top">
                    <img src="{{ asset('assets/img/time.svg') }}" alt="time"></span>
                </a>
                <a href="#generatsection" class="fancybox">
                <span data-toggle="tooltip" title="Обновить" data-placement="top">&#8593;</span> </a>
                <a href="{{ route('edit kuplyu',['id' => $value->KuplyuId]) }}" data-toggle="tooltip" title="Изменить" data-placement="top">
                    <img src="{{ asset('assets/img/edit.svg') }}" alt="img"></a>
                <span data-toggle="tooltip" title="Деактивировать" data-placement="top">X</span>
            </div>
            <div id="time3" style="display:none" class="modal_block">
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
             <div id="generatsection" style="display:none" class="modal_block">
                <h3>  Обновить в разделе куплю</h3>
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
                    <form>

                        <div class="d-flex">
                            <button class="btnmodal">Подтвердить</button>
                            <button class="btnmodal" data-fancybox-close>Отменить
                            </button></div>
                    </form>
                </div>
            </div>

        </div>
        <hr>
        @endforeach

    </div>
</div>
  @stop
