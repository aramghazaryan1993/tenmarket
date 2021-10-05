<div class="tab-pane fade" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">
    <div class="contact_tel">
        <p class="blocked">Здесь вы увидите список заблокированных вами пользователей. В настоящее время у вас нет заблокированных пользователей.</p>
    </div>

    @foreach($GetBlockUser as $key => $value)

        <div class="namep name_coment_sec" id='remove_div{{ $value->block_user_id }}'>
            <div>
                <img src="{{ asset('img/users/'.$value->img) }}" alt="img">
                <a href="#">{{ $value->name }}  {{ $value->last_name }}</a>
            </div>
            <div class=" name_coment_img">
                <p>{{ $value->updated_at }}</p>
                <a href="#block{{ $value->id }}" class="fancybox"> <img data-toggle="tooltip" title="Разблокировать" data-placement="top" src="{{ asset('assets/img/blocked.svg') }}" alt="imag"></a>
            </div>
        </div>
        <div id="block{{ $value->id }}" style="display:none" class="modal_block">
            <div>
                <img src="{{ asset('assets/img/blocked.svg') }}" alt="delete">
                <h3> Разблокировать пользователя</h3>
            </div>
            <hr>
            <p>Если вы разблокируете этого пользователя, вы начнете получать новые сообщения и сможете снова общаться с этим пользователем.
            </p>
            <div class="d-flex">
                <button class="btnmodal block_id" id="{{ $value->block_user_id }}" data-fancybox-close>Разблокировать</button>
                <button class="btnmodal" data-fancybox-close>Отменить
                </button></div>
        </div>

    @endforeach
</div>


