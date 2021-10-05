@include('includes.default.head')

<body>
    <div class="bigcontainer">
        <div class="logo mt-5 mb-5">
            <a href="{{ route('home') }}">
                <img src="{{ asset('assets/img/ten.png') }}" alt="logo" width="120px"></a>
        </div>
    </div>
    <section>
        <div class="kabinet_details">
            <div class="bigcontainer">
                <div class="reduct">
                    <h1>Добавить организацию в разделе список организаций</h1>
                </div>
                <div class="reduct_content">
                    <form>
                        <div class="title">
                            <p>Имя:</p>
                            <input type="text" placeholder="Укажите  название Вашей компании">
                        </div>

                        <div class="title">
                            <p>E-Mail</p>
                            <input type="email"placeholder="Укажите E-Mail Вашей компании" >
                        </div>
                        <div class="title">
                            <p>Веб-сайт</p>
                            <input type="text" placeholder="Укажите веб-сайт Вашей компании">
                        </div>
                         <div class="title">
                            <p>Телефон:</p>
                            <input type="tel" class="tel" placeholder="Укажите телефон Вашей компании">
                        </div>
                        <div class="title">
                            <p>Viber</p>
                            <input type="tel" class="tel" placeholder="Укажите номер вайбера Вашей компании">
                        </div>
                        <div class="title">
                            <p>Whatsapp</p>
                            <input type="tel" class="tel" placeholder="Укажите номер вотсапа Вашей компании">
                        </div>
                         <div class="title">
                            <p>Адрес:</p>
                            <input type="text" placeholder="Укажите адрес Вашей компании">
                        </div>
                       <div class="title">
                            <p>Время работы</p>
                            <input type="text" placeholder="Изменить рабочие дни Вашей компании">
                        </div>
                        <div class="title">
                            <p>С</p>
                            <input type="time"  placeholder="Изменить время работы Вашей компании">

                        </div>
                        <div class="title">
                            <p>До</p>
                            <input type="time"  placeholder="Изменить время работы Вашей компании">
                        </div>

                        <div class="details_textar">
                            <p>Описание</p>
                            <textarea name="" id=""></textarea>
                        </div>

                       <div class="title">
                            <p>Фотография</p>
                            <input type="file" placeholder="Изменить фото Вашей компании" id="imgInp">

                        </div>
                        <div class="title">
                            <p></p>
                        <img id="blah" src="#" alt="your image" />
                      </div>

                        <hr>
                        <div class="two_buttons">
                            <button>Сохранить</button>
                            <button>Удалить</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
<script>
    function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function(e) {
      $('#blah').attr('src', e.target.result).css('opacity', 1);
    }

    reader.readAsDataURL(input.files[0]);
  }
}

$("#imgInp").change(function() {
  readURL(this);
});


</script>
    <script type="text/javascript" src="/assets/js/app.js"></script></body>

</html>
