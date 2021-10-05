<footer>
    <div class="footer">
        <div class=" bigcontainer
    footer_content">
            <div class="footer_menu">
                <ul>
                    <li><a href="{{ route('profile') }}">Разместить объявление</a></li>
                    <li><a href="{{ route('privacypolicy') }}">Политика конфиденциальности</a></li>
                    <li><a href="{{ route('reklama') }}">Реклама на сайте</a></li>
                    <li><a href="{{ route('contact') }}">
                            Обратная связь</a></li>
                    <li class="social"><a target="_blank" href="{{ $ShowSocialNetworks->instagram }}"> <img src="{{ asset('assets/img/inst.svg') }}" alt="imag"></a>
                        <a target="_blank" href="{{ $ShowSocialNetworks->facebook }}"> <img src="{{ asset('assets/img/facebook(4).svg') }}" alt="imag"></a>
                        <a target="_blank" href="{{ $ShowSocialNetworks->youtube }}"> <img src="{{ asset('assets/img/telephoneb.svg') }}" alt="imag"></a>
                        <a target="_blank" href="{{ $ShowSocialNetworks->twitter }}"> <img src="{{ asset('assets/img/emailb.svg') }}" alt="imag"></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="copyright">
        <div class="bigcontainer">
            <div class="copyright">
                <p>Copyright &#169; <span class="year"></span></p>
            </div>
        </div>
    </div>
</footer>

<script>
    $(function () {
        $("#attachfile").bind("change", function () {
            if (typeof ($("#attachfile")[0].files) != "undefined") {
                var size = parseFloat($("#attachfile")[0].files[0].size / 1024).toFixed(2);
                if(size > 2048)
                {
                    $('.attachtext').text('Объем файла не должен превышать 2МБ.').css({'color': '#ff0000', 'textAlign': 'center'})
                } else {
                    $('.attachtext').text(' Файл выбран').css({'color': '#1e8440'})
                }
            } else {
                alert("This browser does not support HTML5.");
            }
        });
    });
</script>
