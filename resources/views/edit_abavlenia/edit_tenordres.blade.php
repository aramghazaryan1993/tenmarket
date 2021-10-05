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
                    <h1>Редактировать объявление
 в разделе  заявки на изготовление ТЭНов
                    </h1>
                </div>
                <div class="reduct_content">
                    <form>
                        <div class="title">
                            <p>Наименование Товара</p>
                            <input type="text">
                        </div>
                        <div class="title">
                            <p>Количество</p>
                            <input type="text">
                        </div>
                        <div class="title">
                            <p>Цена</p>
                            <input type="text">
                        </div>
                        <div class="title">
                            <p>Страна-Производитель</p>
                            <input type="text">
                        </div>
                        <div class="title">
                            <p>Местонахождение</p>
                            <input type="text">
                        </div>
                        <div class="title">
                            <p>E-Mail</p>
                            <input type="email">
                        </div>
                        <div class="title">
                            <p>Веб-сайт</p>
                            <input type="text">
                        </div>
                        <div class="details_textar">
                            <p>Описание</p>
                            <textarea name="" id=""></textarea>
                        </div>
                        <div class="phototitle ">
                            <p>Фотографии</p>
                            <div class="mainfile custom-file">
                                <input type="file" class="custom-file-input  " id="custFile" multiple />
                                <div class="img_file_content" id="thumb">
                                </div>
                                <label class="custom-file-label" for="custFile">Выберите Файл</label>
                            </div>
                        </div>
                        <hr>
                        <div class="contact_mob">
                            <p class="contact_mob_text">
                                Контактная информация</p>
                            <div class="contact_mob_content">
                                <label for="contact">
                                    <input type="checkbox" id="contact">
                                    <div class="d-flex">
                                        Тел.
                                        <a href="tel:123-456-7890">(095) 55 55 55</a>
                                    </div>
                                </label>
                                <label for="contacttel">
                                    <input type="checkbox" id="contacttel">
                                    <div class="d-flex">
                                        <img src="{{ asset('assets/img/viber.svg') }}" alt="img">
                                        <a href="viber://add?number=%2B37495555555"> (095) 55 55 55</a>
                                    </div>
                                </label>
                                <label for="contacttel2">
                                    <input type="checkbox" id="contacttel2">
                                    <div class="d-flex">
                                        <img src="{{ asset('assets/img/whatsapp.svg') }}" alt="img">
                                        <a href="https://api.whatsapp.com/send?phone=+37495551555">(095) 55 55 55</a>
                                    </div>
                                </label>
                            </div>
                        </div>
                        <hr>

                        <div class="agreement ">
                            <div class="agreement_text ">
                                <a href="#">
                                    <label for="agreement">
                                        Условия соглашения
                                    </label>
                                </a>
                                <input type="checkbox" id="agreement">
                            </div>
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
    $('div').on('click', '.closeDiv', function() {
        $(this).prev().remove();
        $(this).remove();
        $('#custFile').val("");

    });

    let fileInput = document.getElementById("custFile");

    fileInput.addEventListener("change", function(e) {

        let filesVAR = this.files;

        showThumbnail(filesVAR);

    }, false);

    function showThumbnail(files) {
        var file = files[0]
        var thumbnail = document.getElementById("thumb");
        var pDiv = document.createElement("div");
        var image = document.createElement("img");
        var div = document.createElement("div");


        pDiv.setAttribute('class', 'pDiv');
        thumbnail.appendChild(pDiv);


        image.setAttribute('class', 'imgKLIK5');
        pDiv.appendChild(image)

        div.innerHTML = "x";
        div.setAttribute('class', 'closeDiv');
        pDiv.appendChild(div)

        image.file = file;
        var reader = new FileReader()
        reader.onload = (function(aImg) {
            return function(e) {
                aImg.src = e.target.result;
            };
        }(image))
        var ret = reader.readAsDataURL(file);

    }
    </script>
<script type="text/javascript" src="{{ asset('assets/js/app.js') }}"></script></body>

</html>
