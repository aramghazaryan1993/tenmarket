@include('includes.default.head')
    @if(isset($HiBlockUser->type) && $HiBlockUser->type == 1)
        <style>
            ::placeholder {
            color: red;
            opacity: 1; /* Firefox */
            }

            :-ms-input-placeholder { /* Internet Explorer 10-11 */
            color: red;
            }

            ::-ms-input-placeholder { /* Microsoft Edge */
            color: red;
            }
        </style>
    @endif
<body>
    <div class="bigcontainer">

        @include('includes.default.header_kabinet')

        <div class="kabinet">
            <div class="kabinet_menu">

                @include('includes.default.header_kabinet_menu')

                @include('messages.header_message')


				@yield('content')

            </div>
        </div>
    </div>
    <script>
    $(document).ready(function() {
        $('.fancybox').fancybox({
            beforeShow: function() {
                this.title = $(this.element).data("caption");
            }
        });
    });

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
<script type="text/javascript" src="{{ asset('assets/js/app.js') }}"></script></body>


</html>
