@extends('layouts.app_home')

@section('title', 'Заявки на изготовление ТЭНов')

   @section('content')
        <div class="bayer_order" style="width: 100%;">
            <div class="bayer">
                <div class="bayer_hedding">
                    <h1>Заявки на изготовление ТЭНов</h1>
                </div>
                <div class="bayer_main">

             @foreach($ShowTenOrders as $key => $value)
                    <div class="bayer_content">
                        <div class="bayer_img">
                            <img src="{{ asset('img/img_ten_orders/'.$value->img) }}" alt="img">
                        </div>
                        <div class="bayer_text">
                            <p>{{ $value->description }}</p>
                            <button><a href="{{ route('tenorders finel product',['id' => $value->id]) }}">подробнее </a></button>
                        </div>
                    </div>
             @endforeach
                </div>
            </div>
            <section>
                <div class=" bigcontainer mb-5">
                    <nav aria-label="Page navigation example " class="pagnav">
                        <ul class="pagination">
                            {{ $ShowTenOrders->links() }}
                        </ul>
                    </nav>
                </div>
            </section>
        </div>
   @stop
