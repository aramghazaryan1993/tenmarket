@include('includes.default.head')

<body>
        @include('includes.default.header_kabinet')

        <div class="kabinet">
            <div class="kabinet_menu">

                @include('includes.default.header_kabinet_menu')

                <div class="list_group_content">
                    <div class="list_group_first">
                        <div class="list-group" id="list-tab" role="tablist">
                            <a class="list-group-item active list-group-item-action " id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home">Профиль</a>
                            <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="profile">Контактная информация</a>
                            <a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list" href="#list-messages" role="tab" aria-controls="messages">Заблокированные пользователи</a>
                            <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-settings" role="tab" aria-controls="settings">Учетная запись</a>
                            <a class="list-group-item list-group-item-action" href="{{ route('yuridicheskoye') }}" >Юридическое лицо</a>
                           <a class="list-group-item list-group-item-action" href="{{ route('fizicheskoye') }}" >Физическое лицо</a>
                        </div>
                    </div>
                    <div class="list_group_second">
                        <div class="tab-content" id="nav-tabContent">
                            @include('includes.settings.profile')
                            @include('includes.settings.contact_information')
                            @include('includes.settings.blocked_users')
                            @include('includes.settings.account')

                    </div>
                </div>
            </div>
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



    function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function(e) {
      $('#blabla').attr('src', e.target.result);
    }

    reader.readAsDataURL(input.files[0]);
  }
}

$("#imgInp").change(function() {
  readURL(this);
});
});


    </script>
<script type="text/javascript" src="{{ asset('assets/js/app.js') }}"></script>

</body>

</html>
