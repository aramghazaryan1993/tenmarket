@extends('layouts.app_home')

@section('title', 'Продам')

  @section('content')
        <div class="seller_order" style="width: 100%;">
            <div class="seller">
                <div class="seller_hedding">
                    <h1>Продам</h1>
                </div>
                <div class="seller_main">
                @foreach($ShowPradam as $key => $value)
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
            <section>
                <div class=" bigcontainer mb-5">
                    <nav aria-label="Page navigation example " class="pagnav">
                        <ul class="pagination">
                            {{ $ShowPradam->links() }}
                        </ul>
                    </nav>
                </div>
            </section>
        </div>


  @stop
