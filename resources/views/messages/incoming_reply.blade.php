@extends('layouts.app_message')

@section('title', 'Входящий ответ')

  @section('content')


            {{-- Pradam --}}

  @if(isset($IncomingReplyProductPradam))


        <div class="comment_img">
                <img src="{{ asset('img/img_pradam/'.$IncomingReplyProductPradam->img) }}" alt="img">
                <h1>{{ $IncomingReplyProductPradam->product_name }}</h1>
        </div>

        <hr class="hr">
        <div class="forscroll">
     @if(!isset($CheckBlockUser->type))
        @foreach($IncomingReplMessagePradam as $key => $value)
             @if($value->delete_id != Auth::id())
                <div class="message  message2">
                    <div class="namep name_coment">
                        <img src="{{ asset('img/users/'.$value->img) }}" alt="img">
                            <div>
                            <a  href="#">{{ $value->name }}</a>
                            <p>{{ $value->massages}}</p>
                            <p><a style="font-weight: bolder;" href="{{ asset('UploadFiles/'.$value->files) }}" download="{{ asset('UploadFiles/'.$value->files) }}" >{{ $value->files}}</a></p>
                            </div>
                    </div>
                <div class="message_date">
                        <span>{{ $value->created_at }}</span>
                </div>
                </div>
      @endif
        @endforeach
        </div>

            <form method="POST" enctype="multipart/form-data" action="{{ route('incoming reply message pradam') }}" class="one_form">
                {{csrf_field()}}
                <div>
                  <textarea name="send_name" placeholder="@if(!isset($HiBlockUser->type))Ваш текст  @elseif($HiBlockUser->type == 1) inq@ qez chyornia qcel @endif"></textarea>
                  <br>
                  <img src="{{ asset('assets/img/attach.png') }}" alt="img">
                             <input name="upload_file[]" type="file" id="attachfile" multiple="">
                             <span class="attachtext"></span>

                  <input type="hidden" name="product_id" value="{{ $IncomingReplyProductPradam->product_id }}"  required>
                  <input type="hidden" name="from_id" value="{{ Auth::id() }}"  required>
                  <input type="hidden" name="to_id" value="{{ $IncomingReplyProductPradam->from_id }}"  required>
                </div>
                  <button type="submit">
                      Отправить
                  </button>
              </form>

    @elseif($CheckBlockUser->type == 1)
        <div class="bigcontainer">
            <div class="lastadd">
                <h4>Du iran chyorni es qcel</h4>
                <img class="lstimg" src="{{ asset('assets/img/userblock.webp') }}"  alt="img">
            </div>
        </div>
    @endif

  @endif


        {{-- Kuplyu --}}

 @if(isset($IncomingReplyProductKuplyu))

 {{-- @if(!isset($HiBlockUser->type))Ваш текст  @elseif($HiBlockUser->type == 1) inq@ qez chyornia qcel @endif --}}

        <div class="comment_img">
                <img src="{{ asset('img/img_kuplyu/'.$IncomingReplyProductKuplyu->img) }}" alt="img">
                <h1>{{ $IncomingReplyProductKuplyu->product_name }}</h1>
        </div>

        <hr class="hr">
        <div class="forscroll">
@if(!isset($CheckBlockUser->type))
  @foreach($IncomingReplMessageKuplyu as $key => $value)
     @if($value->delete_id != Auth::id())
        <div class="message  message2">
            <div class="namep name_coment">
                <img src="{{ asset('img/users/'.$value->img) }}" alt="img">
                    <div>
                    <a  href="#">{{ $value->name }}</a>
                    <p>{{ $value->massages}}</p>
                    <p><a href="{{ asset('UploadFiles/'.$value->files) }}"  download="{{ asset('UploadFiles/'.$value->files) }}">{{ $value->files}}</a></p>
                    </div>
            </div>
            <div class="message_date">
                    <span>{{ $value->created_at }}</span>
            </div>
            </div>
    @endif
 @endforeach
        </div>
     <form method="POST" enctype="multipart/form-data" action="{{ route('incoming reply message kuplyu') }}" class="one_form">
        {{csrf_field()}}
        <div>
          {{--  <input type="text" name="send_name" placeholder="@if(!isset($HiBlockUser->type))Ваш текст  @elseif($HiBlockUser->type == 1) inq@ qez chyornia qcel @endif">  --}}
          <textarea name="send_name" placeholder="@if(!isset($HiBlockUser->type))Ваш текст  @elseif($HiBlockUser->type == 1) inq@ qez chyornia qcel @endif"></textarea>
          <br>
          <img src="{{ asset('assets/img/attach.png') }}" alt="img">
                     <input name="upload_file[]" type="file" id="attachfile" multiple="">
                     <span class="attachtext"></span>

          <input type="hidden" name="product_id" value="{{ $IncomingReplyProductKuplyu->product_id }}"  required>
          <input type="hidden" name="from_id" value="{{ Auth::id() }}"  required>
          <input type="hidden" name="to_id" value="{{ $IncomingReplyProductKuplyu->from_id }}"  required>
        </div>
          <button type="submit">
              Отправить
          </button>
      </form>

    @elseif($CheckBlockUser->type == 1)
        <div class="bigcontainer">
            <div class="lastadd">
                <h4>Du iran chyorni es qcel</h4>
                <img class="lstimg" src="{{ asset('assets/img/userblock.webp') }}"  alt="img">
            </div>
        </div>
    @endif

 @endif


            {{-- Ten Orders--}}

 @if(!empty($IncomingReplyProductTenOrders))

 {{-- @if(!isset($HiBlockUser->type))Ваш текст  @elseif($HiBlockUser->type == 1) inq@ qez chyornia qcel @endif --}}

        <div class="comment_img">
                <img src="{{ asset('img/img_ten_orders/'.$IncomingReplyProductTenOrders->img) }}" alt="img">
                <h1>{{ $IncomingReplyProductTenOrders->product_name }}</h1>
        </div>

        <hr class="hr">
        <div class="forscroll">
 @if(!isset($CheckBlockUser->type))
    @foreach($IncomingReplMessageTenOrders as $key => $value)
        <div class="message  message2">
            <div class="namep name_coment">
                <img src="{{ asset('img/users/'.$value->img) }}" alt="img">
                    <div>
                    <a  href="#">{{ $value->name }}</a>
                    <p>{{ $value->massages}}</p>
                    <p><a href="{{ asset('UploadFiles/'.$value->files) }}"  download="{{ asset('UploadFiles/'.$value->files) }}">{{ $value->files}}</a></p>
                    </div>
            </div>
        <div class="message_date">
                <span>{{ $value->created_at }}</span>
        </div>
        </div>
    @endforeach
        </div>
    <form method="POST" enctype="multipart/form-data" action="{{ route('incoming reply message ten orders') }}" class="one_form">
        {{csrf_field()}}
        <div>
          {{--  <input type="text" name="send_name" placeholder="@if(!isset($HiBlockUser->type))Ваш текст  @elseif($HiBlockUser->type == 1) inq@ qez chyornia qcel @endif">  --}}
          <textarea name="send_name" placeholder="@if(!isset($HiBlockUser->type))Ваш текст  @elseif($HiBlockUser->type == 1) inq@ qez chyornia qcel @endif"></textarea>
          <br>
          <img src="{{ asset('assets/img/attach.png') }}" alt="img">
                     <input name="upload_file[]" type="file" id="attachfile" multiple="">
                     <span class="attachtext"></span>

          <input type="hidden" name="product_id" value="{{ $IncomingReplyProductTenOrders->product_id }}"  required>
          <input type="hidden" name="from_id" value="{{ Auth::id() }}"  required>
          {{--  <input type="file" name="upload_file">  --}}
          <input type="hidden" name="to_id" value="{{ $IncomingReplyProductTenOrders->from_id }}"  required>
        </div>
          <button type="submit">
              Отправить
          </button>
      </form>

    @elseif($CheckBlockUser->type == 1)
        <div class="bigcontainer">
            <div class="lastadd">
                <h4>Du iran chyorni es qcel</h4>
                <img class="lstimg" src="{{ asset('assets/img/userblock.webp') }}"  alt="img">
            </div>
        </div>
    @endif

 @endif


          {{-- Request--}}

          @if(!empty($IncomingReplMessageRequest))

                 <div class="comment_img">
                         <h1>Заявка</h1>
                 </div>

                 <hr class="hr">
                 <div class="forscroll">
          @if(!isset($CheckBlockUser->type))
             @foreach($IncomingReplMessageRequest as $key => $value)
              @if($value->delete_id != Auth::id())
                    <div class="message  message2">
                        <div class="namep name_coment">
                            <img src="{{ asset('img/users/'.$value->img) }}" alt="img">
                                <div>
                                <a  href="#">{{ $value->name }}</a>
                                <p>{{ $value->massages}}</p>
                                <p><a href="{{ asset('UploadFiles/'.$value->files) }}"  download="{{ asset('UploadFiles/'.$value->files) }}">{{ $value->files}}</a></p>
                                </div>
                        </div>
                    <div class="message_date">
                            <span>{{ $value->created_at }}</span>
                    </div>
                    </div>
                @endif
             @endforeach
                 </div>
             <form method="POST" enctype="multipart/form-data" action="{{ route('incoming reply message request') }}" class="one_form">
                 {{csrf_field()}}
                 <div>
                   <textarea name="send_name" placeholder="@if(!isset($HiBlockUser->type))Ваш текст  @elseif($HiBlockUser->type == 1) inq@ qez chyornia qcel @endif"></textarea>
                   <br>
                   <img src="{{ asset('assets/img/attach.png') }}" alt="img">
                              <input name="upload_file[]" type="file" id="attachfile" multiple="">
                              <span class="attachtext"></span>

                   <input type="hidden" name="from_id" value="{{ Auth::id() }}"  required>
                   {{--  <input type="file" name="upload_file">  --}}
                   <input type="hidden" name="to_id" value="{{ Request::segment(2) }}"  required>
                 </div>
                   <button type="submit">
                       Отправить
                   </button>
               </form>

             @elseif($CheckBlockUser->type == 1)
                 <div class="bigcontainer">
                     <div class="lastadd">
                         <h4>Du iran chyorni es qcel</h4>
                         <img class="lstimg" src="{{ asset('assets/img/userblock.webp') }}"  alt="img">
                     </div>
                 </div>
             @endif

          @endif



@error('upload_file') <strong style="color:red;">{{ $message }}</strong> @enderror


@stop

