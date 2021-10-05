@include('includes.default.head')

<body>
    <div class="bigcontainer">

        @include('includes.default.header_kabinet')

        <div class="kabinet">
            <div class="kabinet_menu">

                @include('includes.default.header_kabinet_menu')

                @include('kabinet.header_kabinet_list')

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
    </script>
<script type="text/javascript" src="{{ asset('assets/js/app.js') }}"></script></body>

</html>
