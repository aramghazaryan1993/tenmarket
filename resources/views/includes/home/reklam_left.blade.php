<div class="btn_group">
    <div class="reklamamain">
        <div class="mainreklam">
            <a href="#">Здесь может быть ваша реклама</a> <br>
            <a href="tel:123-456-7890">
                <p>Tel: <span>+374-99-00-00-00</span></p>
            </a>
            <p>E-mail <span>your@gmail.ru</span> </p>
        </div>

              <!-- GetBuyAdvertising Kuplyu  -->
    @if(isset($GetBuyAdvertising) && !empty($GetBuyAdvertising))
            @foreach($GetBuyAdvertising as $key => $value)
                @if($value->type_position == 1)
                        <div class="reklama_content">
                            <div class="seller_main">
                                <div class="seller_content">
                                    <div class="seller_img">
                                        <img src="{{ asset('img/img_kuplyu/'.$value->img) }}" alt="img">
                                    </div>
                                    <div class="seller_text">
                                        <p>Описание продукта:{{ $value->description }}
                                        </p>
                                        <a href="{{ route('kuplyu finel product',['id' => $value->id]) }}"> <button>подробнее</button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
            @endforeach
    @endif

             <!-- GetSellAdvertising Pradam  -->
    @if(isset($GetSellAdvertising) && !empty($GetSellAdvertising))
            @foreach($GetSellAdvertising as $key => $value)
                @if($value->type_position == 1)
                        <div class="reklama_content">
                            <div class="seller_main">
                                <div class="seller_content">
                                    <div class="seller_img">
                                        <img src="{{ asset('img/img_pradam/'.$value->img) }}" alt="img">
                                    </div>
                                    <div class="seller_text">
                                        <p>Описание продукта:{{ $value->description }}
                                        </p>
                                        <a href="{{ route('pradam finel product',['id' => $value->id]) }}"> <button>подробнее</button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
            @endforeach
    @endif

             <!-- GetTenOrdersAdvertising Заявки на изготовление ТЭНов  -->
             {{--  {{ dd($GetTenOrdersAdvertising) }}  --}}
    @if(isset($GetTenOrdersAdvertising) && !empty($GetTenOrdersAdvertising))
            @foreach($GetTenOrdersAdvertising as $key => $value)
                @if($value->type_position == 1)
                        <div class="reklama_content">
                            <div class="seller_main">
                                <div class="seller_content">
                                    <div class="seller_img">
                                        <img src="{{ asset('img/img_ten_orders/'.$value->img) }}" alt="img">
                                    </div>
                                    <div class="seller_text">
                                        <p>Описание продукта:{{ $value->description }}
                                        </p>
                                        <a href="{{ route('tenorders finel product',['id' => $value->id]) }}"> <button>подробнее</button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
            @endforeach
    @endif
    </div>
</div>
