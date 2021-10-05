@extends('layouts.app_home')

@section('title', 'Главная страница')
{{ Auth::user()->name }}


  @section('content')
        <div class="bigContent">
            <div class="seller">
                <div class="seller_hedding">

                <a href="{{  route('pradam')  }}"> <h2>Продам</h2></a>
                </div>
                <div class="seller_main">
        @foreach($ShowPradam as $key => $value)
                    <div class="seller_content">
                        <div class="seller_img">
                            @php $a = $value->ShowImg; $b = $a['img']; @endphp
                                <img src="{{ asset('img/img_pradam/'.$b) }}" alt="img">
                        </div>
                        <div class="seller_text">
                            <p>{{ $value->product_name }}</p>
                            <a href="{{ route('pradam finel product',['id' => $value->id]) }}"> <button>подробнее </button></a>
                        </div>
                    </div>
          @endforeach
                </div>
            </div>



            <div class="bayer">
                <div class="bayer_hedding">
                <a href="{{ route('kuplyu') }}"><h2>Куплю</h2></a>
                </div>
                <div class="bayer_main">
            @foreach($ShowKuplyu as $key => $value)
                    <div class="bayer_content">
                        <div class="bayer_img">
                            @php $a = $value->ShowImg; $b = $a['img']; @endphp
                              <img src="{{ asset('img/img_kuplyu/'.$b) }}" alt="img">
                        </div>
                        <div class="bayer_text">
                            <p>{{ $value->description }}</p>
                            <a href="{{ route('kuplyu finel product',['id' => $value->id]) }}"><button>подробнее </button>
                            </a>
                        </div>
                    </div>
            @endforeach
                </div>
            </div>


            <div class="seller">
                <div class="seller_hedding">
                <a href="{{  route('tenorders')  }}">
                <h2>Заявки на изготовление ТЭНов</h2></a>
                </div>
                <div class="seller_main">
            @foreach($ShowTenOrders as $key => $value)

                    @php
                       // $live=date_create(date("Y-m-d"));
                       // $date2=date_create(date($value->confirmation_date));
                       // $diff=date_diff($date2,$live);
                    @endphp

                {{-- @if($diff->format("%a") > 0  && $diff->format("%a") <= 30) --}}
                    <div class="seller_content">
                        <div class="seller_img">
                         @php $a = $value->ShowImg; $b = $a['img']; @endphp
                            <img src="{{ asset('img/img_ten_orders/'.$b) }}" alt="img">
                        </div>
                        <div class="seller_text">
                            <p>{{ $value->description }}</p>
                            <a href="{{ route('tenorders finel product',['id' => $value->id]) }}"> <button>подробнее </button></a>
                        </div>
                    </div>
                {{-- @endif --}}
            @endforeach
                </div>
            </div>


            <div class="partners">
                <div class="partners_heading">
                <a href="{{ route('arganizacya') }}">   <h1>Список организаций</h1></a>
                </div>
                <div class="partners_content">
                    <div class="partners_block" style="width: 100%;">
            @foreach($ShowArganizacya as $key => $value)
                        <div class="partners_box">
                            <a href="{{ route('arganizacya finel product',['id' => $value->id]) }}">
                                <div class="partners_img">
                                    <img src="{{ asset('img/img_arganizacya/'.$value->img) }}" alt="img">
                                </div>
                                <p class="partners_name">{{ $value->name }}</p>
                                <div class="partners_mail">
                                    <img src="{{ asset('assets/img/emailb.svg') }}" alt="img">
                                    <a href="#">{{ $value->email }}</a>
                                </div>
                                <div class="partners_mail">
                                    <img src="{{ asset('assets/img/telephoneb.svg') }}" alt="img">
                                    <a href="#"> {{ $value->phone_number }} </a>
                                </div>
                            </a>
                        </div>
             @endforeach
                    </div>
                </div>
            </div>
        </div>
  @endsection



