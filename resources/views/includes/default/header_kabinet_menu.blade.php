<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item">
        <a @if(Request::segment(1) == 'pradam_kabinet') class="nav-link active" @else class="nav-link"  @endif id="home-tab" href="{{ route('pradam kabinet') }}">Мои объявления</a>
    </li>
    <li class="nav-item">
        <a @if(Request::segment(1) == 'incoming') class="nav-link active" @else class="nav-link"  @endif id="profile-tab" href="{{ route('incoming') }}">Сообщение <span style="color:red">@if(isset($ShowCountMessage)){{ $ShowCountMessage }} @endif</span></a>
    </li>

    <li class="nav-item">
        <a @if(Request::segment(1) == 'profile') class="nav-link active" @else class="nav-link"  @endif id="contact-tab" href="{{ route('profile') }}">Настройки</a>
    </li>
</ul>


