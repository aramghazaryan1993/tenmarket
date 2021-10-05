@extends('layouts.app_home')

@section('title', 'Куплю')

  @section('content')
        <div class="bayer_order" style="width: 100%;">
            <div class="bayer">
                <div class="bayer_hedding">
                    <h1>Куплю</h1>
                </div>
                <div class="bayer_main">

                @foreach($ShowKuplyu as $key => $value)
                    <div class="bayer_content">
                        <div class="bayer_img">
                            <img src="{{ asset('img/img_kuplyu/'.$value->img) }}" alt="img">
                        </div>
                        <div class="bayer_text">
                            <p>{{ $value->description }}</p>
                            <button><a href="{{ route('kuplyu finel product',['id' => $value->id]) }}">подробнее </a></button>
                        </div>
                    </div>
                @endforeach
                </div>
            </div>
            <section>
                <div class=" bigcontainer mb-5">
                    <nav aria-label="Page navigation example " class="pagnav">
                        <ul class="pagination">
                            {{ $ShowKuplyu->links() }}
                        </ul>
                    </nav>
                </div>
            </section>
        </div>
  @stop
