<section>
    <div class=" bigcontainer">
        <div class="seller_order mb-5">

            @if (Request::segment(1) == 'pradam_finel_product')

                <div class="seller">
                    <div class="seller_hedding mb-5">
                        <h2>Похожие Продукты</h2>
                    </div>
                    <div class="seller_main d-flex justify-content-center"> {{--d-flex
                        justify-content-center --}}
                        @foreach ($ShowSimilarProducts as $value)
                            <div class="seller_content">
                                <div class="seller_img">
                                    <img src="{{ asset('img/img_pradam/'.$value->img) }}" alt="img">
                                </div>
                                <div class="seller_text">
                                    <p>{{ $value->description }}</p>
                                    <a href="{{ route('pradam finel product',['id' => $value->id]) }}"> <button>подробнее </button></a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

            @elseif(Request::segment(1) == 'kuplyu_finel_product')

                <div class="seller">
                    <div class="seller_hedding mb-5">
                        <h2>Похожие Продукты</h2>
                    </div>
                    <div class="seller_main d-flex justify-content-center"> {{--d-flex
                        justify-content-center --}}
                    @foreach ($ShowSimilarProducts as $value)
                        <div class="seller_content">
                            <div class="seller_img">
                                <img src="{{ asset('img/img_kuplyu/'.$value->img) }}" alt="img">
                            </div>
                            <div class="seller_text">
                                <p>{{ $value->description }}</p>
                                <a href="{{ route('kuplyu finel product',['id' => $value->id]) }}"> <button>подробнее </button></a>
                            </div>
                        </div>
                    @endforeach
                    </div>
                </div>

            @elseif(Request::segment(1) == 'tenorders_finel_product')

                <div class="seller">
                    <div class="seller_hedding mb-5">
                        <h2>Похожие Продукты</h2>
                    </div>
                    <div class="seller_main d-flex justify-content-center"> {{--d-flex
                        justify-content-center --}}
                    @foreach ($ShowSimilarProducts as $value)
                        <div class="seller_content">
                            <div class="seller_img">
                                <img src="{{ asset('img/img_ten_orders/'.$value->img) }}" alt="img">
                            </div>
                            <div class="seller_text">
                                <p>{{ $value->description }}</p>
                                <a href="{{ route('kuplyu finel product',['id' => $value->id]) }}"> <button>подробнее </button></a>
                            </div>
                        </div>
                    @endforeach
                    </div>
                </div>
            @endif
        </div>
    </div>
</section>
