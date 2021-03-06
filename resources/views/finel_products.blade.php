@extends('layouts.app_home_finel_product')

@if(Request::segment(1) == 'pradam_finel_product')
    @section('title',$ShowPradam[0]->product_name)
@elseif(Request::segment(1) == 'kuplyu_finel_product')
    @section('title',$Showkuplyu[0]->product_name)
@elseif(Request::segment(1) == 'tenorders_finel_product')
    @section('title',$ShowTenOrders[0]->product_name)
@endif


@section('content')

    @if (Request::segment(1) == 'pradam_finel_product')
        <div class="order">
            @error('upload_file') <strong style="color:red;">{{ $message }}</strong> @enderror
            <div class="order_head">
                <h1>{{ $ShowPradam[0]->product_name }}</h1>
            </div>
            <div class="orderBcontent">
                <div class="swiper-container gallery-top swiper-container-initialized swiper-container-horizontal">
                    <div class="swiper-wrapper"
                        style="transform: translate3d(-2040px, 0px, 0px); transition-duration: 0ms;">
                            @foreach ($ShowImg as $val)
                                <div class="swiper-slide swiper-slide-active" data-swiper-slide-index="{{ $val->id }}"
                                    style="width: 500px; margin-right: 10px;"><img
                                        src="{{ asset('img/img_pradam/' . $val->img) }}" alt="img"></div>
                            @endforeach
                    </div>
                    <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                </div>
                <div
                    class="swiper-container gallery-thumbs swiper-container-initialized swiper-container-horizontal swiper-container-free-mode swiper-container-thumbs">
                    <div class="swiper-wrapper" style="transform: translate3d(-410px, 0px, 0px); transition-duration: 0ms;">
                            @foreach ($ShowImg as $val)
                                <div class="swiper-slide swiper-slide-visible swiper-slide-active swiper-slide-thumb-active"
                                    data-swiper-slide-index="{{ $val->id }}" style="width: 92.5px; margin-right: 10px;"><img
                                        src="{{ asset('img/img_pradam/' . $val->img) }}" alt="img"></div>
                            @endforeach
                    </div>
                    <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                </div>
            </div>
            <div class="order_content">
                <a href="{{ route('pradam ownpage',['id'=>$ShowPradam[0]->id]) }}" class="center_img">
                    <p>
                        <img src="{{ asset('img/users/' . $ShowPradam[0]->img) }}" alt="name555">
                        {{ $ShowPradam[0]->name }}
                        {{ $ShowPradam[0]->last_name }}
                    </p>
                </a>
                <h2><span>????????????????????????
                        ????????????</span> {{ $ShowPradam[0]->product_name }}</h2>
                <p> <span>????????????????:</span> {{ $ShowPradam[0]->description }}</p>
                <p><span>????????????????????:</span> {{ $ShowPradam[0]->count }}</p>
                <p><span>????????:</span>{{ $ShowPradam[0]->price }}</p>
                <p><span>????????????-??????????????????????????:</span>{{ $ShowPradam[0]->manufacturer_country }} </p>
                <p><span>??????????????????????????????: </span>{{ $ShowPradam[0]->location }} </p>


                <a href="tel:123-456-7890">
                    <p><span>??????????????: </span>{{ $ShowPradam[0]->phone_number }}</p>
                </a>
                <p><img src="{{ asset('assets/img/viber.svg') }}" alt="img"> &nbsp; <a
                        href="viber://add?number={{ $ShowPradam[0]->viber }}">{{ $ShowPradam[0]->viber }}</a></p>
                <p><img src="{{ asset('assets/img/whatsapp.svg') }}" alt="img">&nbsp;<a
                        href="https://api.whatsapp.com/send?phone={{ $ShowPradam[0]->whatsapp }}">{{ $ShowPradam[0]->whatsapp }}
                    </a></p>
                <p><span>E-mail:</span><a href="#">{{ $ShowPradam[0]->email }}</a></p>
                <p><span>??????-????????:</span><a href="{{ $ShowPradam[0]->website }}">{{ ltrim($ShowPradam[0]->website,'https://') }}</a></p>
                <a href="#sentmail" class="fancybox">
                    <button>?????????????? ??????????????????</button>
                </a>
            </div>
        </div>

        {{-- //massig modal --}}
        <div id="sentmail" style="display:none" class="modal_block">
            <div>
                <h3>?????????????? ??????????????????</h3>
            </div>
            <hr>
            <div class="sentmail">
                <img src="{{ asset('img/users/' . $ShowPradam[0]->img) }}" alt="img">
                <a href="#">{{ $ShowPradam[0]->name }} {{ $ShowPradam[0]->last_name }}</a>
            </div>
            <form class="attachform" method="post" enctype="multipart/form-data" action="{{ route('send message') }}">
                {{csrf_field()}}
                <input type="hidden"  name="product_id" value="{{ $ShowPradam[0]->product_id }}">
                <input type="hidden"  name="to_id" value="{{ $ShowPradam[0]->user_id }}">
                {{-- <input type="hidden"  name="form_type" value="1"> --}}
                <textarea placeholder="???????? ??????????????????" name="massage"></textarea>
                <br>
                <img class="imgattach" src="{{ asset('assets/img/attach.png') }}" alt="img">
                <input type="file" id="attachfile" name="upload_file[]" multiple="">
                 <span class="attachtext"></span>
                <div class="d-flex mx-auto">
                    <button class="btnmodal" type="submit"> ??????????????????</button></div>
            </form>
        </div>


    @elseif(Request::segment(1) == 'kuplyu_finel_product')
    <div class="order">
        <div class="order_head">
            <h1>{{ $Showkuplyu[0]->product_name }}</h1>
        </div>
        <div class="orderBcontent">
            <div class="swiper-container gallery-top swiper-container-initialized swiper-container-horizontal">
                <div class="swiper-wrapper"
                    style="transform: translate3d(-2040px, 0px, 0px); transition-duration: 0ms;">
                        @foreach ($ShowImg as $val)
                            <div class="swiper-slide swiper-slide-active" data-swiper-slide-index="{{ $val->id }}"
                                style="width: 500px; margin-right: 10px;"><img
                                    src="{{ asset('img/img_kuplyu/' . $val->img) }}" alt="img"></div>
                        @endforeach
                </div>
                <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
            </div>
            <div
                class="swiper-container gallery-thumbs swiper-container-initialized swiper-container-horizontal swiper-container-free-mode swiper-container-thumbs">
                <div class="swiper-wrapper" style="transform: translate3d(-410px, 0px, 0px); transition-duration: 0ms;">
                    @foreach ($ShowImg as $val)
                        <div class="swiper-slide swiper-slide-visible swiper-slide-active swiper-slide-thumb-active"
                            data-swiper-slide-index="{{ $val->id }}" style="width: 92.5px; margin-right: 10px;"><img
                                src="{{ asset('img/img_kuplyu/'.$val->img) }}" alt="img"></div>
                    @endforeach
                </div>
                <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
            </div>
        </div>
        <div class="order_content">
            <a href="{{ route('kuplyu ownpage',['id'=>$Showkuplyu[0]->id]) }}" class="center_img">
                <p>
                    <img src="{{ asset('img/users/' . $Showkuplyu[0]->img) }}" alt="name555">
                    {{ $Showkuplyu[0]->name }}
                    {{ $Showkuplyu[0]->last_name }}
                </p>
            </a>
            <h2><span>????????????????????????
                    ????????????</span> {{ $Showkuplyu[0]->product_name }}</h2>
            <p> <span>????????????????:</span> {{ $Showkuplyu[0]->description }}</p>
            <p><span>????????????????????:</span> {{ $Showkuplyu[0]->count }}</p>
            <p><span>????????:</span>{{ $Showkuplyu[0]->price }}</p>
            <p><span>????????????-??????????????????????????:</span>{{ $Showkuplyu[0]->manufacturer_country }} </p>
            <p><span>??????????????????????????????: </span>{{ $Showkuplyu[0]->location }} </p>


            <a href="tel:123-456-7890">
                <p><span>??????????????: </span>{{ $Showkuplyu[0]->phone_number }}</p>
            </a>
            <p><img src="{{ asset('assets/img/viber.svg') }}" alt="img"> &nbsp; <a
                    href="viber://add?number={{ $Showkuplyu[0]->viber }}">{{ $Showkuplyu[0]->viber }}</a></p>
            <p><img src="{{ asset('assets/img/whatsapp.svg') }}" alt="img">&nbsp;<a
                    href="https://api.whatsapp.com/send?phone={{ $Showkuplyu[0]->whatsapp }}">{{ $Showkuplyu[0]->whatsapp }}
                </a></p>
            <p><span>E-mail:</span><a href="#">{{ $Showkuplyu[0]->email }}</a></p>
            <p><span>??????-????????:</span><a href="{{ $Showkuplyu[0]->website }}">{{ ltrim($Showkuplyu[0]->website,'https://') }}</a></p>
            <a href="#sentmail" class="fancybox">
                <button>?????????????? ??????????????????</button>
            </a>
        </div>
    </div>

        {{-- //massig modal --}}
        <div id="sentmail" style="display:none" class="modal_block">
            <div>
                <h3>?????????????? ??????????????????</h3>
            </div>
            <hr>
            <div class="sentmail">
                <img src="{{ asset('img/users/' . $Showkuplyu[0]->img) }}" alt="img">
                <a href="#">{{ $Showkuplyu[0]->name }} {{ $Showkuplyu[0]->last_name }}</a>
            </div>
            <form class="attachform" method="post" enctype="multipart/form-data" action="{{ route('send message kuplyu') }}">
                {{csrf_field()}}
                <input type="hidden"  name="product_id" value="{{ $Showkuplyu[0]->product_id }}">
                <input type="hidden"  name="to_id" value="{{ $Showkuplyu[0]->user_id }}">
                {{-- <input type="hidden"  name="form_type" value="1"> --}}
                <textarea placeholder="???????? ??????????????????" name="massage"></textarea>
                <br>
                <img class="imgattach" src="{{ asset('assets/img/attach.png') }}" alt="img">
                <input type="file" id="attachfile" name="upload_file[]" multiple="">
                 <span class="attachtext"></span>
                <div class="d-flex mx-auto">
                    <button class="btnmodal" type="submit"> ??????????????????</button></div>
            </form>
        </div>


    @elseif(Request::segment(1) == 'tenorders_finel_product')
    <div class="order">
        <div class="order_head">
            <h1>{{ $ShowTenOrders[0]->product_name }}</h1>
        </div>
        <div class="orderBcontent">
            <div class="swiper-container gallery-top swiper-container-initialized swiper-container-horizontal">
                <div class="swiper-wrapper"
                    style="transform: translate3d(-2040px, 0px, 0px); transition-duration: 0ms;">
                        @foreach ($ShowImg as $val)
                            <div class="swiper-slide swiper-slide-active" data-swiper-slide-index="{{ $val->id }}"
                                style="width: 500px; margin-right: 10px;"><img
                                    src="{{ asset('img/img_ten_orders/' . $val->img) }}" alt="img"></div>
                        @endforeach
                </div>
                <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
            </div>
            <div
                class="swiper-container gallery-thumbs swiper-container-initialized swiper-container-horizontal swiper-container-free-mode swiper-container-thumbs">
                <div class="swiper-wrapper" style="transform: translate3d(-410px, 0px, 0px); transition-duration: 0ms;">
                    @foreach ($ShowImg as $val)
                        <div class="swiper-slide swiper-slide-visible swiper-slide-active swiper-slide-thumb-active"
                            data-swiper-slide-index="{{ $val->id }}" style="width: 92.5px; margin-right: 10px;"><img
                                src="{{ asset('img/img_ten_orders/' . $val->img) }}" alt="img"></div>
                    @endforeach
                </div>
                <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
            </div>
        </div>
        <div class="order_content">
            <a href="{{ route('tenorders ownpage',['id'=>$ShowTenOrders[0]->id]) }}" class="center_img">
                <p>
                    <img src="{{ asset('img/users/' . $ShowTenOrders[0]->img) }}" alt="name555">
                    {{ $ShowTenOrders[0]->name }}
                    {{ $ShowTenOrders[0]->last_name }}
                </p>
            </a>
            <h2><span>????????????????????????
                    ????????????</span> {{ $ShowTenOrders[0]->product_name }}</h2>
            <p> <span>????????????????:</span> {{ $ShowTenOrders[0]->description }}</p>
            <p><span>????????????????????:</span> {{ $ShowTenOrders[0]->count }}</p>
            <p><span>????????:</span>{{ $ShowTenOrders[0]->price }}</p>
            <p><span>????????????-??????????????????????????:</span>{{ $ShowTenOrders[0]->manufacturer_country }} </p>
            <p><span>??????????????????????????????: </span>{{ $ShowTenOrders[0]->location }} </p>


            <a href="tel:123-456-7890">
                <p><span>??????????????: </span>{{ $ShowTenOrders[0]->phone_number }}</p>
            </a>
            <p><img src="{{ asset('assets/img/viber.svg') }}" alt="img"> &nbsp; <a
                    href="viber://add?number={{ $ShowTenOrders[0]->viber }}">{{ $ShowTenOrders[0]->viber }}</a></p>
            <p><img src="{{ asset('assets/img/whatsapp.svg') }}" alt="img">&nbsp;<a
                    href="https://api.whatsapp.com/send?phone={{ $ShowTenOrders[0]->whatsapp }}">{{ $ShowTenOrders[0]->whatsapp }}
                </a></p>
            <p><span>E-mail:</span><a href="#">{{ $ShowTenOrders[0]->email }}</a></p>
            <p><span>??????-????????:</span><a href="{{ $ShowTenOrders[0]->website }}">{{ ltrim($ShowTenOrders[0]->website,'https://') }}</a></p>
            <a href="#sentmail" class="fancybox">
                <button>?????????????? ??????????????????</button>
            </a>
        </div>
    </div>

        {{-- //massig modal --}}
        <div id="sentmail" style="display:none" class="modal_block">
            <div>
                <h3>?????????????? ??????????????????</h3>
            </div>
            <hr>
            <div class="sentmail">
                <img src="{{ asset('img/users/' . $ShowTenOrders[0]->img) }}" alt="img">
                <a href="#">{{ $ShowTenOrders[0]->name }} {{ $ShowTenOrders[0]->last_name }}</a>
            </div>
            <form class="attachform" method="post" enctype="multipart/form-data" action="{{ route('send message ten orders') }}">
                {{csrf_field()}}
                <input type="hidden"  name="product_id" value="{{ $ShowTenOrders[0]->product_id }}">
                <input type="hidden"  name="to_id" value="{{ $ShowTenOrders[0]->user_id }}">
                {{-- <input type="hidden"  name="form_type" value="1"> --}}
                <textarea placeholder="???????? ??????????????????" name="massage"></textarea>
                <br>
                <img class="imgattach" src="{{ asset('assets/img/attach.png') }}" alt="img">
                <input type="file" id="attachfile" name="upload_file[]" multiple="">
                 <span class="attachtext"></span>
                <div class="d-flex mx-auto">
                    <button class="btnmodal" type="submit"> ??????????????????</button></div>
            </form>
        </div>
@endif

@endsection
