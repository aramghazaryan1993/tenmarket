<div class="reklama" style="width:24%;">
    <div class="reklamamain" >

              <!-- GetBuyAdvertising Kuplyu  -->
    @if(isset($GetBuyAdvertising) && !empty($GetBuyAdvertising))
            @foreach($GetBuyAdvertising as $key => $value)
              @if($value->type_position == 2)
                    <div class="reklama_content">
                        <div class="seller_main">
                            <div class="seller_content">
                                <div class="seller_img">
                                    <img src="{{ asset('img/img_kuplyu/'.$value->img) }}" alt="img">
                                </div>
                                <div class="seller_text">
                                    <p>Описание продукта:{{ $value->description }}
                                    </p>
                                    <a href="{{ route('kuplyu finel product',['id' => $value->id]) }}">
                                        <button>подробнее</button></a>
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
               @if($value->type_position == 2)
                     <div class="reklama_content">
                         <div class="seller_main">
                             <div class="seller_content">
                                 <div class="seller_img">
                                     <img src="{{ asset('img/img_pradam/'.$value->img) }}" alt="img">
                                 </div>
                                 <div class="seller_text">
                                     <p>Описание продукта:{{ $value->description }}
                                     </p>
                                     <a href="{{ route('pradam finel product',['id' => $value->id]) }}">
                                         <button>подробнее</button></a>
                                 </div>
                             </div>
                         </div>
                     </div>
                @endif
             @endforeach
      @endif

            <!-- GetSellAdvertising Pradam  -->
      @if(isset($GetTenOrdersAdvertising) && !empty($GetTenOrdersAdvertising))
              @foreach($GetTenOrdersAdvertising as $key => $value)
                @if($value->type_position == 2)
                      <div class="reklama_content">
                          <div class="seller_main">
                              <div class="seller_content">
                                  <div class="seller_img">
                                      <img src="{{ asset('img/img_ten_orders/'.$value->img) }}" alt="img">
                                  </div>
                                  <div class="seller_text">
                                      <p>Описание продукта:{{ $value->description }}
                                      </p>
                                      <a href="{{ route('tenorders finel product',['id' => $value->id]) }}">
                                          <button>подробнее</button></a>
                                  </div>
                              </div>
                          </div>
                      </div>
                 @endif
              @endforeach
       @endif
{{--  {{ dd($GetArganizacyaAdvertising) }}  --}}
    </div>
</div>
