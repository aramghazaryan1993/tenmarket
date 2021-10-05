@include('includes.default.head')

<body>
    <div class="bigcontainer">
        <div class="logo mt-5 mb-5">
            <a href="{{  route('home')  }}">
                <img src="{{ asset('assets/img/ten.png') }}" alt="logo" width="120px"></a>
        </div>
    </div>
    <section>
        <div class="kabinet_details">
            <div class="bigcontainer">
                <div class="reduct">
                    <h1>Редактировать объявление в разделе  список организаций</h1>
                </div>
                <div class="reduct_content">
                    <form method="post" action="{{ route('edit arganizacya',['id' => $Edit->id]) }}" enctype="multipart/form-data">
                                                {{csrf_field()}}
                        <div class="title">
                            <p>Имя:</p>
                            <input type="text" name="name" placeholder="Изменить  название Вашей компании" value="{{ $Edit->name }}">
                        </div>

                        <div class="title">
                            <p>E-Mail</p>
                            <input type="email" name="email"  placeholder="Изменить E-Mail Вашей компании" value="{{ $Edit->email }}">
                        </div>
                        <div class="title">
                            <p>Веб-сайт</p>
                            <input type="text" name="website" placeholder="Изменить веб-сайт Вашей компании" value="{{ $Edit->website }}">
                        </div>
                         <div class="title">
                            <p>Телефон:</p>
                            <input type="tel" name="phone_number" class="tel" placeholder="Изменить телефон Вашей компании" value="{{ $Edit->phone_number }}">
                        </div>
                        <div class="title">
                            <p>Viber</p>
                            <input type="tel" name="viber" class="tel" placeholder="Изменить номер вайбера Вашей компании" value="{{ $Edit->viber }}">
                        </div>
                        <div class="title">
                            <p>Whatsapp</p>
                            <input type="tel" name="whatsapp" class="tel" placeholder="Изменить номер вотсапа Вашей компании" value="{{ $Edit->whatsapp }}">
                        </div>
                         <div class="title">
                            <p>Адрес:</p>
                            <input type="text" name="address" placeholder="Изменить адрес Вашей компании" value="{{ $Edit->address }}">
                        </div>
                        <div class="title">
                            <p>Время работы</p>
                            <input type="text" name="working_days" placeholder="Изменить рабочие дни Вашей компании" value="{{ $Edit->working_days }}">
                        </div>
                        <div class="title">
                            <p>С</p>
                            <input type="time" name="working_hours_start"  placeholder="Изменить время работы Вашей компании" value="{{ $Edit->working_hours_start }}">

                        </div>
                        <div class="title">
                            <p>До</p>
                            <input type="time" name="working_hours_end"  placeholder="Изменить время работы Вашей компании" value="{{ $Edit->working_hours_end }}">
                        </div>



                        <div class="details_textar">
                            <p>Описание</p>
                            <textarea name="description" id="">{{ $Edit->description }}</textarea>
                        </div>
                       <div class="title">
                            <p>Фотография</p>
                            <input type="file" name="img" placeholder="Изменить фото Вашей компании" id="imgInp" accept="image/*">

                        </div>
                        <div class="title">
                            <p></p>
                        <img id="blah" @if(!empty($Edit->img)) style="opacity:1" @endif  src="{{ asset('img/img_arganizacya/'.$Edit->img) }}" alt="your image" />
                       @if(isset($Edit->img) and $Edit->img != 'default.jfif') <div class="closeDiv" id="{{ $Edit->id }}">x</div> @endif
                    </div>

                        <hr>
                        <div class="two_buttons">
                            <button type="submit">Сохранить</button>
                            <button>Удалить</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
<script>

    $('div').on('click', '.closeDiv', function() {
        $(this).prev().remove();
        $(this).remove();
        $('#custFile').val("");

    });

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
    <script type="text/javascript" src="{{ asset('assets/js/app.js') }}"></script></body>

</html>
