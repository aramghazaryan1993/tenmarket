
 <div class="tab-pane fade contact_info" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
    <div class="contact_tel">
        <p class="viberwhot">Телефоны</p>
        <p><img src="{{ asset('assets/img/telephoneb.svg') }}" alt="contact" class="contimg">
            <a class="phone_number" id="pn">{{ $GetProfile->phone_number}}</a>
            <a href="#add_tel" class="add_tell fancybox onmodal" >@if(empty($GetProfile->phone_number))Добавить номер телефона @else Редактировать номер телефона @endif</a></p>

                                {{csrf_field()}}
        <div id="add_tel" style="display:none" class="modal_block" autocomplete="off">
    <form  autocomplete="off">
            <input type="text" autocomplete="off"  placeholder="номер телефона" value="{{ $GetProfile->phone_number}}" id="phone_number_input" name="phone_number" class="teladd tel">
        </form>
            <div class="d-flex">
                <button class="btnmodal"  data-fancybox-close id="phone_number_save">Сохранить</button>
                <button class="btnmodal" data-fancybox-close>Отменить
                </button></div>
        </div>


        <a href="#deltel" class="fancybox"  id="del_tel">
            <img data-toggle="tooltip" title="Удалить" data-placement="top" src="{{ asset('assets/img/trash.svg') }}" alt="delete" class="delphone"></a>
    </div>
    <div id="deltel" style="display:none" class="modal_block">
        <div>
            <img src="{{ asset('assets/img/trash.svg') }}" alt="delete">
            <h3>Удалить номер телефона</h3>
        </div>
        <hr>
        <strong class="phone_number">{{ $GetProfile->phone_number}}</strong>
        <p>Эта контактная информация будет удалена из всех активных объявлений.
            <span>После удаления номер телефона нельзя будет снова использовать в этом или другом аккаунте в течение 30 дней.</span>
        </p>
            <input type="hidden" value="" id="phone_number_delete_value">
        <div class="d-flex">
            <button class="btnmodal" data-fancybox-close id="phone_number_delete">Удалить</button>
            <button class="btnmodal" data-fancybox-close>Отменить
            </button></div>
    </div>
    <hr>
    <div class="contact_tel">
        <p class="viberwhot">Viber</p>
        <p><img src="{{ asset('assets/img/viber.svg') }}" alt="contact">
            <a class="viber" id="vb">{{ $GetProfile->viber}}</a>
            <a href="#add_viber" class="add_tell fancybox">Добавить </a></p>
             <a href="#delviber" class="fancybox">
            <img data-toggle="tooltip" title="Удалить" data-placement="top" src="{{ asset('assets/img/trash.svg') }}" alt="delete" class="delphone"></a>
    </div>
        <div id="delviber" style="display:none" class="modal_block">
        <div>
            <img src="{{ asset('assets/img/trash.svg') }}" alt="delete">
            <h3>Удалить номер телефона</h3>
        </div>
        <hr>
        <strong>{{ $GetProfile->viber}}</strong>
        <p>Эта контактная информация будет удалена из всех активных объявлений.
            <span>После удаления номер телефона нельзя будет снова использовать в этом или другом аккаунте в течение 30 дней.</span>
        </p>
        <input type="hidden" value="" id="viber_delete_value">
        <div class="d-flex">
            <button class="btnmodal" data-fancybox-close id="viber_delete">Удалить</button>
            <button class="btnmodal" data-fancybox-close>Отменить
            </button></div>
    </div>

      <div id="add_viber" style="display:none" class="modal_block">
    <form  autocomplete="off">
        <input type="text" placeholder="номер телефона" value="{{ $GetProfile->viber}}" name="viber" id="viber_input" class="teladd tel">
    </form>
        <div class="d-flex">
            <button class="btnmodal" data-fancybox-close id="viber_save">Сохранить
        </button>
            <button class="btnmodal" data-fancybox-close>Отменить
            </button></div>
    </div>
    <hr>
    <div class="contact_tel">
        <p class="viberwhot">WhatsApp</p>
        <p><img src="{{ asset('assets/img/whatsapp.svg') }}" alt="contact">
            <a class="whatsapp" id="wp">{{ $GetProfile->whatsapp }}</a>
            <a href="#add_watsap" class="add_tell fancybox">Добавить </a> </p>
             <a href="#delwatsap" class="fancybox">
            <img data-toggle="tooltip" title="Удалить" data-placement="top" src="{{ asset('assets/img/trash.svg') }}" alt="delete" class="delphone"></a>
    </div>
         <div id="delwatsap" style="display:none" class="modal_block">
        <div>
            <img src="{{ asset('assets/img/trash.svg') }}" alt="delete">
            <h3>Удалить номер телефона</h3>
        </div>
        <hr>
        <strong>{{ $GetProfile->whatsapp}}</strong>
        <p>Эта контактная информация будет удалена из всех активных объявлений.
            <span>После удаления номер телефона нельзя будет снова использовать в этом или другом аккаунте в течение 30 дней.</span>
        </p>
        <input type="hidden" value="" id="whatsapp_delete_value">
        <div class="d-flex">
            <button class="btnmodal" data-fancybox-close id="whatsapp_delete">Удалить</button>
            <button class="btnmodal" data-fancybox-close>Отменить
            </button></div>
    </div>
          <div id="add_watsap" style="display:none" class="modal_block">
    <form  autocomplete="off">
        <input type="text" placeholder="номер телефона" value="{{ $GetProfile->whatsapp}}" name="whatsapp" id="whatsapp_input" class="teladd tel">
    </form>
        <div class="d-flex">
            <button class="btnmodal" data-fancybox-close id="whatsapp_save">Сохранить
        </button>
            <button class="btnmodal" data-fancybox-close>Отменить
            </button></div>
    </div>
    <hr>
</div>


