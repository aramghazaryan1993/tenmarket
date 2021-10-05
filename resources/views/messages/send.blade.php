@extends('layouts.app_message')

@section('title', 'Отправленные')

    @section('content')


  @if(isset($ShowSendPradam))

    @foreach($ShowSendPradam as $key => $active)

            <div class="message message1">
                    <div class="namep namep_one" >
                        <img src="{{ asset('img/users/'.$active->img) }}" alt="img">
                        <a @if(empty($active->view) && $active->from_id != Auth::id()) style="color:black;font-weight: bold;" @endif  href="#">{{ $active->name }}</a>
                    </div>
                    <div class="message_text message_new">
                        <a  href="{{ route('send reply pradam',['id' => $active->product_id,'message_user_id' => $active->user_id]) }}">
                        <h4 @if(empty($active->view) && $active->from_id != Auth::id()) style="color:black;font-weight: bold;" @endif >{{ $active->product_name }}</h4>
                        <p @if(empty($active->view)  && $active->from_id != Auth::id()) style="color:black;font-weight: bold;" @endif >{{ $active->description }}</p>
                    </a>
                    </div>
                    <div class="message_date">
                        <span @if(empty($active->view) && $active->from_id != Auth::id()) style="color:black;font-weight: bold;" @endif >{{ $active->updated_at }}</span>
                    </div>
            </div>
        @endforeach
   @endif



  @if(isset($ShowSendKuplyu))

        @foreach($ShowSendKuplyu as $key => $active1)

            <div class="message message1">
                    <div class="namep namep_one" >
                        <img src="{{ asset('img/users/'.$active1->img) }}" alt="img">
                        <a @if(empty($active1->view) && $active1->from_id != Auth::id()) style="color:black;font-weight: bold;" @endif  href="#">{{ $active1->name }}</a>
                    </div>
                    <div class="message_text message_new">
                        <a  href="{{ route('send reply kuplyu',['id' => $active1->product_id,'message_user_id' => $active1->user_id]) }}">
                        <h4 @if(empty($active1->view) && $active1->from_id != Auth::id()) style="color:black;font-weight: bold;" @endif >{{ $active1->product_name }}</h4>
                        <p @if(empty($active1->view)  && $active1->from_id != Auth::id()) style="color:black;font-weight: bold;" @endif >{{ $active1->description }}</p>
                    </a>
                    </div>
                    <div class="message_date">
                        <span @if(empty($active1->view) && $active1->from_id != Auth::id()) style="color:black;font-weight: bold;" @endif >{{ $active1->updated_at }}</span>
                    </div>
            </div>
        @endforeach

    @endif

    @if(isset($ShowSendTenOrdres))

        @foreach($ShowSendTenOrdres as $key => $active2)

        <div class="message message1">
                <div class="namep namep_one" >
                    <img src="{{ asset('img/users/'.$active2->img) }}" alt="img">
                    <a @if(empty($active2->view) && $active2->from_id != Auth::id()) style="color:black;font-weight: bold;" @endif  href="#">{{ $active2->name }}</a>
                </div>
                <div class="message_text message_new">
                    <a  href="{{ route('send reply ten orders',['id' => $active2->product_id,'message_user_id' => $active2->user_id]) }}">
                    <h4 @if(empty($active2->view) && $active2->from_id != Auth::id()) style="color:black;font-weight: bold;" @endif >{{ $active2->product_name }}</h4>
                    <p @if(empty($active2->view)  && $active2->from_id != Auth::id()) style="color:black;font-weight: bold;" @endif >{{ $active2->description }}</p>
                </a>
                </div>
                <div class="message_date">
                    <span @if(empty($active2->view) && $active2->from_id != Auth::id()) style="color:black;font-weight: bold;" @endif >{{ $active2->updated_at }}</span>
                </div>
        </div>
    @endforeach

    @endif



         {{-- Request  --}}
         @if(isset($ShowRequestmessages))

         @foreach($ShowRequestmessages as $key => $read3)
               <div class="message message1">
                       <div class="namep namep_one" >
                           <img src="img/users/{{ $read3->img }}" alt="img">
                           <a  @if(empty($read3->view) && $read3->from_id != Auth::id()) style="color:black;font-weight: bold;" @endif  href="#">{{ $read3->name }}</a>
                       </div>
                       <div class="message_text message_new">
                           <a  href="{{ route('send reply request',['message_user_id' => $read3->to_id]) }}">
                           <h4 @if(empty($read3->view) && $read3->from_id != Auth::id()) style="color:black;font-weight: bold;" @endif >Заявка</h4>
                       </a>
                       </div>
                       <div class="message_date">
                           <span @if(empty($read3->view)) style="color:black;font-weight: bold;" @endif >{{ $read3->updated_at }}</span>
                       </div>
               </div>
           @endforeach

     @endif

    @stop
