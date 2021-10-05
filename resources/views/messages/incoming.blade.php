@extends('layouts.app_message')

@section('title', 'Входящий')

  @section('content')


   {{-- Active  --}}

     @if(isset($ShowIncomingPradam))

      @foreach($ShowIncomingPradam as $key => $active)

        @if($active->view == null )

            <div class="message message1">
                    <div class="namep namep_one" >
                        <img src="img/users/{{ $active->img }}" alt="img">
                        <a @if(empty($active->view)) style="color:black;font-weight: bold;" @endif  href="#">{{ $active->name }}</a>
                    </div>
                    <div class="message_text message_new">
                        <a  href="{{ route('incoming reply pradam',['id' => $active->product_id,'message_user_id' => $active->user_id]) }}">
                        <h4 @if(empty($active->view)) style="color:black;font-weight: bold;" @endif >{{ $active->product_name }}</h4>
                        <p @if(empty($active->view)) style="color:black;font-weight: bold;" @endif >{{ $active->description }}</p>
                    </a>
                    </div>
                    <div class="message_date">
                        <span @if(empty($active->view)) style="color:black;font-weight: bold;" @endif >{{ $active->updated_at }}</span>
                    </div>
            </div>
        @endif

        @endforeach

  @endif

  @if(isset($ShowIncomingKuplyu))

    @foreach($ShowIncomingKuplyu as $key => $active1)

    @if($active1->view == null )

        <div class="message message1">
                <div class="namep namep_one" >
                    <img src="{{ asset('img/users/'.$active1->img) }}" alt="img">
                    <a @if(empty($active1->view)) style="color:black;font-weight: bold;" @endif  href="#">{{ $active1->name }}</a>
                </div>
                <div class="message_text message_new">
                    <a  href="{{ route('incoming reply kuplyu',['id' => $active1->product_id,'message_user_id' => $active1->user_id]) }}">
                    <h4 @if(empty($active1->view)) style="color:black;font-weight: bold;" @endif >{{ $active1->product_name }}</h4>
                    <p @if(empty($active1->view)) style="color:black;font-weight: bold;" @endif >{{ $active1->description }}</p>
                </a>
                </div>
                <div class="message_date">
                    <span @if(empty($active1->view)) style="color:black;font-weight: bold;" @endif >{{ $active1->updated_at }}</span>
                </div>
        </div>
     @endif
    @endforeach

@endif


    @if(isset($ShowIncomingTenOrders))

        @foreach($ShowIncomingTenOrders as $key => $active2)

            @if($active2->view == null )

                <div class="message message1">
                        <div class="namep namep_one" >
                            <img src="{{ asset('img/users/'.$active2->img) }}" alt="img">
                            <a @if(empty($active2->view)) style="color:black;font-weight: bold;" @endif  href="#">{{ $active2->name }}</a>
                        </div>
                        <div class="message_text message_new">
                            <a  href="{{ route('incoming reply ten orders',['id' => $active2->product_id,'message_user_id' => $active2->user_id]) }}">
                            <h4 @if(empty($active2->view)) style="color:black;font-weight: bold;" @endif >{{ $active2->product_name }}</h4>
                            <p @if(empty($active2->view)) style="color:black;font-weight: bold;" @endif >{{ $active2->description }}</p>
                        </a>
                        </div>
                        <div class="message_date">
                            <span @if(empty($active2->view)) style="color:black;font-weight: bold;" @endif >{{ $active2->updated_at }}</span>
                        </div>
                </div>

            @endif

            @endforeach

    @endif


    {{-- Active------- Request  --}}

    @if(isset($ShowRequestmessages))

    @foreach($ShowRequestmessages as $key => $activeR)

      @if($activeR->view == null )

          <div class="message message1">
                  <div class="namep namep_one" >
                      <img src="img/users/{{ $activeR->img }}" alt="img">
                      <a @if(empty($activeR->view)) style="color:black;font-weight: bold;" @endif  href="#">{{ $activeR->name }}</a>
                  </div>
                  <div class="message_text message_new">
                      <a  href="{{ route('incoming reply request',['message_user_id' => $activeR->id]) }}">
                      <h4 @if(empty($activeR->view)) style="color:black;font-weight: bold;" @endif >Заявка</h4>
                  </a>
                  </div>
                  <div class="message_date">
                      <span @if(empty($activeR->view)) style="color:black;font-weight: bold;" @endif >{{ $activeR->updated_at }}</span>
                  </div>
          </div>
      @endif

      @endforeach

@endif



     {{-- Deactive Read --}}

    @if(isset($ShowIncomingPradam) )


  @foreach($ShowIncomingPradam as $key => $read)

        @if($read->view != null )

        <div class="message message1">
                <div class="namep namep_one" >
                    <img src="{{ asset('img/users/'.$read->img) }}" alt="img">
                    <a @if(empty($read->view)) style="color:black;font-weight: bold;" @endif  href="#">{{ $read->name }}</a>
                </div>
                <div class="message_text message_new">
                    <a  href="{{ route('incoming reply pradam',['id' => $read->product_id,'message_user_id' => $read->user_id]) }}">
                    <h4 @if(empty($read->view)) style="color:black;font-weight: bold;" @endif >{{ $read->product_name }}</h4>
                    <p @if(empty($read->view)) style="color:black;font-weight: bold;" @endif >{{ $read->description }}</p>
                </a>
                </div>
                <div class="message_date">
                    <span @if(empty($read->view)) style="color:black;font-weight: bold;" @endif >{{ $read->updated_at }}</span>
                </div>
            </div>

        @endif

        @endforeach

    @endif


    @if(isset($ShowIncomingKuplyu))

        @foreach($ShowIncomingKuplyu as $key => $read1)

        @if($read1->view != null )

        <div class="message message1">
                <div class="namep namep_one" >
                    <img src="{{ asset('img/users/'.$read1->img) }}" alt="img">
                    <a @if(empty($read1->view)) style="color:black;font-weight: bold;" @endif  href="#">{{ $read1->name }}</a>
                </div>
                <div class="message_text message_new">
                    <a  href="{{ route('incoming reply kuplyu',['id' => $read1->product_id,'message_user_id' => $read1->user_id]) }}">
                    <h4 @if(empty($read1->view)) style="color:black;font-weight: bold;" @endif >{{ $read1->product_name }}</h4>
                    <p @if(empty($read1->view)) style="color:black;font-weight: bold;" @endif >{{ $read1->description }}</p>
                </a>
                </div>
                <div class="message_date">
                    <span @if(empty($read1->view)) style="color:black;font-weight: bold;" @endif >{{ $read1->updated_at }}</span>
                </div>
            </div>

        @endif

        @endforeach

    @endif


    @if(isset($ShowIncomingTenOrders))

        @foreach($ShowIncomingTenOrders as $key => $read2)

        @if($read2->view != null )

        <div class="message message1">
                <div class="namep namep_one" >
                    <img src="{{ asset('img/users/'.$read2->img) }}" alt="img">
                    <a @if(empty($read2->view)) style="color:black;font-weight: bold;" @endif  href="#">{{ $read2->name }}</a>
                </div>
                <div class="message_text message_new">
                    <a  href="{{ route('incoming reply ten orders',['id' => $read2->product_id,'message_user_id' => $read2->user_id]) }}">
                    <h4 @if(empty($read2->view)) style="color:black;font-weight: bold;" @endif >{{ $read2->product_name }}</h4>
                    <p @if(empty($read2->view)) style="color:black;font-weight: bold;" @endif >{{ $read2->description }}</p>
                </a>
                </div>
                <div class="message_date">
                    <span @if(empty($read2->view)) style="color:black;font-weight: bold;" @endif >{{ $read2->updated_at }}</span>
                </div>
            </div>

            @endif

        @endforeach

    @endif



     {{-- Request  --}}
    @if(isset($ShowRequestmessages))

    @foreach($ShowRequestmessages as $key => $read3)

      @if($read3->view != null )
          <div class="message message1">
                  <div class="namep namep_one" >
                      <img src="img/users/{{ $read3->img }}" alt="img">
                      <a @if(empty($read3->view)) style="color:black;font-weight: bold;" @endif  href="#">{{ $read3->name }}</a>
                  </div>
                  <div class="message_text message_new">
                      <a  href="{{ route('incoming reply request',['message_user_id' => $read3->id]) }}">
                      <h4 @if(empty($read3->view)) style="color:black;font-weight: bold;" @endif >Заявка</h4>
                  </a>
                  </div>
                  <div class="message_date">
                      <span @if(empty($read3->view)) style="color:black;font-weight: bold;" @endif >{{ $read3->updated_at }}</span>
                  </div>
          </div>
      @endif

      @endforeach

@endif


  {{-- @foreach($ShowIncomingPradam as $key => $value)

  @php
    // Chekc view Messages
    //$maxId = \App\MessagesModel::where('to_id',Auth::id())->where('product_id',$value->product_id)->max('id');
   // $b = \App\MessagesModel::where('to_id',Auth::id())->where('product_id',$value->product_id)->where('id',$maxId)->first();
  @endphp

        <div class="message message1">
            <div class="namep namep_one" >
                <img src="img/users/{{ $value->img }}" alt="img">
                <a @if(empty($value->view)) style="color:black;font-weight: bold;" @endif  href="#">{{ $value->name }}</a>
            </div>
            <div class="message_text message_new">
                <a  href="{{ route('incoming reply',['id' => $value->product_id,'message_user_id' => $value->user_id]) }}">
                <h4 @if(empty($value->view)) style="color:black;font-weight: bold;" @endif >{{ $value->product_name }}</h4>
                <p @if(empty($value->view)) style="color:black;font-weight: bold;" @endif >{{ $value->description }}</p>
            </a>
            </div>
            <div class="message_date">
                <span @if(empty($value->view)) style="color:black;font-weight: bold;" @endif >{{ $value->updated_at }}</span>
            </div>
        </div>
  @endforeach --}}
  @stop
