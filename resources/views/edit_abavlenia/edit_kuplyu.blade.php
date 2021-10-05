
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
 в разделе  куплю
                    </h1>
                </div>
                <div class="reduct_content">
                    <form method="post" action="{{ route('edit kuplyu',['id' => Request::segment(2)]) }}" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="title">
                            <p>Наименование Товара</p>
                            <input name="product_name" type="text" value="{{ $Edit->product_name }}">
                        </div>
                        <div class="title">
                            <p>Количество</p>
                            <input name="count" type="number" value="{{ $Edit->count }}">
                        </div>
                        <div class="title">
                            <p>Цена</p>
                            <input  name="price" type="number" value="{{ $Edit->price }}">
                        </div>
                        <div class="title">
                            <p>Страна-Производитель</p>
                            <input name="manufacturer_country" type="text" value="{{ $Edit->manufacturer_country }}">
                        </div>
                        <div class="title">
                            <p>Местонахождение</p>
                            <input name="location" type="text" value="{{ $Edit->location }}">
                        </div>
                        <div class="title">
                            <p>Веб-сайт</p>
                            <input name="website" type="text" value="{{ $Edit->website }}">
                        </div>
                        <div class="details_textar">
                            <p>Описание</p>
                            <textarea name="description" id="">{{ $Edit->description }}</textarea>
                        </div>
                        <div class="phototitle ">
                            <p>Фотографии</p>
                            <div class="mainfile custom-file">
                                <input type="file" class="custom-file-input  " name="img[]" accept="image/gif, image/jpeg,image/png, image/webp" id="custFile" multiple @php  if(count($ShowImg) >= 6) echo 'disabled'; @endphp />
                                <div class="img_file_content" id="thumb">
                                  {{-- avelacrac  --}}
                                    @foreach($ShowImg as $Img)
                                     <div class="pDiv">
                                        <input type="radio" name="chek" class="inpt" value="{{ $Img->id }}" @if($Img->home_image == 1) checked  @endif>
                                            <img class="imgKLIK5" src="{{ asset('img/img_kuplyu/'.$Img->img) }}">
                                        <div class="closeDiv rkuplyu" id="{{ $Img->id }}">x</div>
                                     </div>
                                    @endforeach
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
                                    <input name="phone_permission" type="checkbox" value="2" id="contact"  @if($Edit->phone_permission == 2) checked="checked" @endif>
                                    <div class="d-flex">
                                        Тел.
                                        <a href="tel:{{ $User->phone_number }}">{{ $User->phone_number }}</a>
                                    </div>
                                </label>
                                <label for="contacttel">
                                    <input name="viber_permission" type="checkbox" id="contacttel" value="2" @if($Edit->viber_permission == 2) checked="checked" @endif>
                                    <div class="d-flex">
                                        <img src="{{ asset('assets/img/viber.svg') }}" alt="img">
                                        <a href="viber://add?number=%2B{{ $User->viber }}"> {{ $User->viber }}</a>
                                    </div>
                                </label>
                                <label for="contacttel2">
                                    <input name="whatsapp_permission" type="checkbox" id="contacttel2" value="2" @if($Edit->whatsapp_permission == 2) checked="checked" @endif>
                                    <div class="d-flex">
                                        <img src="{{ asset('assets/img/whatsapp.svg') }}" alt="img">
                                        <a href="https://api.whatsapp.com/send?phone={{ $User->whatsapp }}">{{ $User->whatsapp }}</a>
                                    </div>
                                </label>
                            </div>
                        </div>
                        <hr>

                        <div class="agreement ">
                            <div class="agreement_text ">
                                <a href="#">
                                    <label for="agreement">
                                        <a target="_blank" href="{{ route('privacypolicy') }}">Условия соглашения</a>
                                    </label>
                                </a>
                                <input name="confirm" type="checkbox" id="agreement" value="1" required>
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


       var container_div = document.getElementById('thumb');
       var count = container_div.getElementsByClassName('pDiv').length;

       if(count >= 6)
       {
          document.getElementById("custFile").disabled = true;
       }else{
          document.getElementById("custFile").disabled = false;
       }



       //Count Delete image
       $('.closeDiv').on('click',function() {
        var thumb = document.getElementById('thumb');
        var pDivCount = thumb.getElementsByClassName('pDiv').length;

       // alert(pDivCount);

        if(pDivCount >= 7)
        {
            //alert(pDivCount)
            document.getElementById("custFile").disabled = true;
        }else{
            document.getElementById("custFile").disabled = false;
        }



    });

    $('#custFile').change(function(){
        let ele =document.getElementById("custFile");
       var SelectCount = ele.files.length;

      //  alert(SelectCount);
    })

    $('div').on('click', '.closeDiv', function() {
        $(this).prev().remove();
        $(this).parent().remove();
        $(this).remove();
        $('#custFile').val("");

    });

    let fileInput = document.getElementById("custFile");

    fileInput.addEventListener("change", function(e) {

        let filesVAR = this.files;

        showThumbnail(filesVAR);

    }, false);


        // Zapret upload image
        var countImgDiv = $("#thumb .pDiv").length;

        if(countImgDiv >= 6)
        {
           document.getElementById("custFile").disabled = true;
        }else{
            document.getElementById("custFile").disabled = false;
        }

    function showThumbnail(files) {

    var a = files.length;

    // Upload zapret
    if(a >= 6){
        document.getElementById("custFile").disabled = true;
     }else{
        document.getElementById("custFile").disabled = false;
    }

    //alert(count);

      for(var b = 0; b<a; b++)
      {

        var file = files[b];
        var thumbnail = document.getElementById("thumb");
        var pDiv = document.createElement("div");
        var image = document.createElement("img");
        var div = document.createElement("div");
        var inp = document.createElement("input");
        inp.setAttribute('type', 'radio');
        inp.setAttribute('name', 'chek');
        inp.setAttribute('class', 'inpt');
        pDiv.appendChild(inp);


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
}
    </script>
<script type="text/javascript" src="{{ asset('assets/js/app.js') }}"></script></body>

</html>
