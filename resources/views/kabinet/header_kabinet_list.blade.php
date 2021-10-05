<div class="kabinetlist">
    <ul>
        <li><a href="{{ route('pradam kabinet') }}" @if(Request::segment(1) == 'PradamKabinet') class="active" @endif>Продам</a></li>
        <li><a href="{{ route('kuplyu kabinet') }}" @if(Request::segment(1) == 'KuplyuKabinet') class="active" @endif>Куплю</a></li>
        <li><a href="{{ route('tenorders kabinet') }}" @if(Request::segment(1) == 'TenordersKabinet') class="active" @endif>Заявки на изготовление ТЭНов</a></li>
        <li><a href="{{ route('arganizacya kabinet') }}" @if(Request::segment(1) == 'ArganizacyaKabinet') class="active" @endif>Список организаций</a></li>
    </ul>
</div>
<hr>
