@extends('layouts.app_kabinet')

@section('title', 'Мои объявления Список организаций')


    @section('content')
    <div class="tab-content tabcont" id="myTabContent">
        <div class="tab-pane fade show active tabpan" id="home" role="tabpanel" aria-labelledby="home-tab">


         @foreach($ShowArganizacya as $key => $value)
            <div class="kabinet_content">
                <div class="kabinet_content_img">
                    <img src="{{ asset('img/img_arganizacya/'.$value->img) }}" alt="img">
                </div>
                <div class="kabinet_text">
                   <a href="{{ route('arganizacya finel product',['id' => $value->id]) }}"> <h4>{{ $value->name }}</h4></a>


                    <p class="textfororg">Телефон:<a href="tel:123-456-7890">{{ $value->phone_number }}</a> </p>
                    <p class="textfororg">Email:
                  <a href="mailto:someone@yoursite.com">{{ $value->email }}</a>
                   </p>

                </div>

                <div class="three_icons">
                   <a href="#time{{ $value->id }}" class="fancybox">
                        <span class="green " data-toggle="tooltip" title="Продлить на 30 дней " data-placement="top">
                        <img src="{{ asset('assets/img/time.svg') }}" alt="time"></span>
                    </a>
                    <a href="{{ route('edit arganizacya',['id' => $value->id]) }}" data-toggle="tooltip" title="Изменить" data-placement="top">
                        <img src="{{ asset('assets/img/edit.svg') }}" alt="img"></a>
                    <span data-toggle="tooltip" title="Деактивировать" data-placement="top">X</span>
                </div>
                <div id="time{{ $value->id }}" style="display:none" class="modal_block">
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
            </div>
            <hr>
        @endforeach

        </div>

        <section>
            <div class=" bigcontainer mb-5">
                <nav aria-label="Page navigation example " class="pagnav">
                    <ul class="pagination">
                        {{ $ShowArganizacya->links() }}
                    </ul>
                </nav>
            </div>
        </section>
    </div>
    @stop
