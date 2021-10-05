@if(Request::segment(1) == 'send' || Request::segment(1) == 'incoming')
                    <div class="kabinetlist">
                        <ul>
                            <li><a href="{{ route('incoming') }}" @if(Request::segment(1) == 'incoming') class="active" @endif >Входящий</a></li>
                            <li><a href="{{ route('send') }}" @if(Request::segment(1) == 'send') class="active" @endif>Отправленные</a></li>
                        </ul>
                    </div>
                @else
                    <div class="coment_arrow">
                        <div class="arrow_back"><a href="javascript:history.back()"> ←</a>
                        </div>
                        <div>
                            <a data-toggle="tooltip" title="" data-placement="top" href="#one" class="fancybox" data-original-title="@if(!isset($CheckBlockUser->type))блокировать@elseif($CheckBlockUser->type == 1)Заблокировать@endif">
                                <img src="{{ asset('assets/img/blocked.svg') }}" alt="blocked"></a>
                            <a data-toggle="tooltip" title="" data-placement="top" href="#two" class="fancybox" data-original-title="Удалить">
                                <img src="{{ asset('assets/img/trash.svg') }}" alt="delete"></a>
                        </div>
                    </div>
                    <div id="one" style="display:none" class="modal_block">
                        <div>
                            <img src="{{ asset('assets/img/blocked.svg') }}" alt="delete">
                            <h3> Заблокировать пользователя</h3>
                        </div>
                        <hr>
                        <p>Вы уверены, что хотите заблокировать этого пользователя? Заблокированные пользователи не смогут посылать вам сообщения или получать от вас сообщения.
                        </p>

                        <div class="d-flex">

                        @if(!isset($CheckBlockUser->type))
                            <form method="post" action="{{ route('block user') }}">
                              @csrf
                                @if(Request::segment(1) == 'IncomingReplyPradam'|| Request::segment(1) == 'sendReplyPradam')
                                    <input type="hidden" name="block_user_id" value="@if($IncomingReplyProductPradam->to_id == Auth::id()){{$IncomingReplyProductPradam->from_id}}@elseif($IncomingReplyProductPradam->from_id == Auth::id()){{$IncomingReplyProductPradam->to_id}}@endif">
                                @elseif(Request::segment(1) == 'incomingReplykuplyu' || Request::segment(1) == 'sendReplyKuplyu')
                                    <input type="hidden" name="block_user_id" value="@if($IncomingReplyProductKuplyu->to_id == Auth::id()){{$IncomingReplyProductKuplyu->from_id}}@elseif($IncomingReplyProductKuplyu->from_id == Auth::id()){{$IncomingReplyProductKuplyu->to_id}}@endif">
                                @elseif(Request::segment(1) == 'incomingReplyTenOrders' || Request::segment(1) == 'sendReplyTenOrders')
                                    <input type="hidden" name="block_user_id" value="@if($IncomingReplyProductTenOrders->to_id == Auth::id()){{$IncomingReplyProductTenOrders->from_id}}@elseif($IncomingReplyProductTenOrders->from_id == Auth::id()){{$IncomingReplyProductTenOrders->to_id}}@endif">
                                @elseif(Request::segment(1) == 'IncomingReplyRequest')
                                    <input type="hidden" name="block_user_id" value="@if($IncomingReplMessageRequest[0]->to_id == Auth::id()){{$IncomingReplMessageRequest[0]->from_id}}@elseif($IncomingReplMessageRequest[0]->from_id == Auth::id()){{$IncomingReplMessageRequest[0]->to_id}}@endif">
                                @elseif(Request::segment(1) == 'SendReplyRequest')
                                    <input type="hidden" name="block_user_id" value="@if($SendReplMessageRequest[0]->to_id == Auth::id()){{$SendReplMessageRequest[0]->from_id}}@elseif($SendReplMessageRequest[0]->from_id == Auth::id()){{$SendReplMessageRequest[0]->to_id}}@endif">
                                @endif
                                <div class="d-flex">
                                    <button class="btnmodal">блокировать</button>
                                    <button class="btnmodal" data-fancybox-close>Отменить</button>
                                </div>
                            </form>
                        @elseif($CheckBlockUser->type == 1)
                            <form method="post" action="{{ route('razblock user') }}">
                                @csrf
                                @if(Request::segment(1) == 'IncomingReplyPradam' || Request::segment(1) == 'sendReplyPradam')
                                    <input type="hidden" name="block_user_id" value="@if($IncomingReplyProductPradam->to_id == Auth::id()){{$IncomingReplyProductPradam->from_id}}@elseif($IncomingReplyProductPradam->from_id == Auth::id()){{$IncomingReplyProductPradam->to_id}}@endif">
                                @elseif(Request::segment(1) == 'incomingReplykuplyu' || Request::segment(1) == 'sendReplyKuplyu')
                                    <input type="hidden" name="block_user_id" value="@if($IncomingReplyProductKuplyu->to_id == Auth::id()){{$IncomingReplyProductKuplyu->from_id}}@elseif($IncomingReplyProductKuplyu->from_id == Auth::id()){{$IncomingReplyProductKuplyu->to_id}}@endif">
                                @elseif(Request::segment(1) == 'incomingReplyTenOrders' || Request::segment(1) == 'sendReplyTenOrders')
                                    <input type="hidden" name="block_user_id" value="@if($IncomingReplyProductTenOrders->to_id == Auth::id()){{$IncomingReplyProductTenOrders->from_id}}@elseif($IncomingReplyProductTenOrders->from_id == Auth::id()){{$IncomingReplyProductTenOrders->to_id}}@endif">
                                @elseif(Request::segment(1) == 'IncomingReplyRequest')
                                    <input type="hidden" name="block_user_id" value="@if($IncomingReplMessageRequest[0]->to_id == Auth::id()){{$IncomingReplMessageRequest[0]->from_id}}@elseif($IncomingReplMessageRequest[0]->from_id == Auth::id()){{$IncomingReplMessageRequest[0]->to_id}}@endif">
                                @elseif(Request::segment(1) == 'SendReplyRequest')
                                    <input type="hidden" name="block_user_id" value="@if($SendReplMessageRequest[0]->to_id == Auth::id()){{$SendReplMessageRequest[0]->from_id}}@elseif($SendReplMessageRequest[0]->from_id == Auth::id()){{$SendReplMessageRequest[0]->to_id}}@endif">
                                @endif
                                <div class="d-flex">
                                    <button class="btnmodal">Заблокировать</button>
                                    <button class="btnmodal" data-fancybox-close>Отменить</button>
                                </div>
                            </form>
                        @endif
                        </div>
                    </div>
                    <div id="two" style="display:none" class="modal_block">
                        <div>
                            <img src="{{ asset('assets/img/trash.svg') }}" alt="delete">
                            <h3> Удалить сообщение</h3>
                        </div>
                        <hr>
                        <p>Вы уверены, что хотите удалить это сообщение? Удаленные сообщения не могут быть восстановлены.
                        </p>
                        <div class="d-flex">
                          @if(Request::segment(1) == 'incomingReplykuplyu' || Request::segment(1) == 'sendReplyKuplyu')
                            <button class="btnmodal"><a href="{{ route('delete message kuplyu',['message_user_id' => Request::segment(3),'url' => Request::segment(1), 'product_id' => Request::segment(2)]) }}">Удалить</a></button>
                          @elseif(Request::segment(1) == 'incomingReplyTenOrders' || Request::segment(1) == 'sendReplyTenOrders')
                            <button class="btnmodal"><a href="{{ route('delete message ten orders',['message_user_id' => Request::segment(3),'url' => Request::segment(1), 'product_id' => Request::segment(2)]) }}">Удалить</a></button>
                          @elseif(Request::segment(1) == 'IncomingReplyPradam' || Request::segment(1) == 'sendReplyPradam')
                            <button class="btnmodal"><a href="{{ route('delete message pradam',['message_user_id' => Request::segment(3),'url' => Request::segment(1), 'product_id' => Request::segment(2)]) }}">Удалить</a></button>
                          @elseif(Request::segment(1) == 'IncomingReplyRequest' || Request::segment(1) == 'SendReplyRequest')
                            <button class="btnmodal"><a href="{{ route('delete message request',['message_user_id' => Request::segment(2),'url' => Request::segment(1)]) }}">Удалить</a></button>
                          @endif
                            <button class="btnmodal" data-fancybox-close>Отменить</button></div>
                    </div>
                @endif
