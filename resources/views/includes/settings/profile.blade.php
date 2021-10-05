<div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
    @if(session('success'))
    <div class="alert alert-success">
      {{ session('success') }}
    </div>
    @endif
    <form autocomplete="off" method="post" action="{{route('edit profile')}}" enctype="multipart/form-data" >
                               {{csrf_field()}}
        <div class="d-flex">
            <p>
                Вашa эл. почта </p>
            <input type="email" placeholder="mail"  value="{{$GetProfile->email}}" name="email" readonly>
        </div>
        <div class="d-flex">
            <p> Ваше имя</p>
            <input type="text" placeholder="Ваше имя" value="{{$GetProfile->name}}" name="name">
        </div>
            @error('name')
                    <a style="color:red;" class='contact_validation' >{{ $message }}</a>
            @enderror
        <div class="d-flex">
            <p> Ваше Фамилия</p>
            <input type="text" placeholder="Ваше Фамилия" value="{{$GetProfile->last_name}}" name="last_name">
        </div>
            @error('last_name')
                    <a style="color:red;" class='contact_validation' >{{ $message }}</a>
            @enderror
        <div class="d-flex">
            <p> Регион</p>
            <div class="multiselect">
                <div class="selectBox">
                    <select name="region_id" name="region_id">
                        @foreach($GetRegion as $key => $value)
                                <option value="{{ $value->id }}"  @if($value->id==$GetProfile->region_id) selected @endif>{{ $value->region }}</option>
                        @endforeach
                    </select>
                    @error('region_id')
                        <a style="color:red;" class='contact_validation' >{{ $message }}</a>
                    @enderror
            </div>

        </div>
        </div>
    <div class="d-flex gender">
            <p> Ваш пол</p>
            <label for="female">
            <input type="radio" name="gender" id="female" value="0" @if($GetProfile->gender==0) checked @endif >
            женский
        </label>
        <label for="male" >
            <input type="radio" name="gender" id="male"  value="1" @if($GetProfile->gender==1) checked @endif>
            мужской
        </label>
            @error('gender')
                <a style="color:red;" class='contact_validation' >{{ $message }}</a>
            @enderror
        </div>
        <div class=" last_input">
            <p>Ваш аватар</p>
            <div class="namep">
                @if(empty($GetProfile->img))
                    <img src="@if($GetProfile->gender == 0){{ asset('assets/img/female.png')}} @elseif($GetProfile->gender == 1) {{ asset('assets/img/male.png')}} @endif" alt="img"  id="blabla">
                @else
                    <img src="{{ asset('img/users/'.$GetProfile->img) }}" alt="img"  id="blabla">
                @endif
            </div>
            <input type="file" name="img_profile" id="imgInp"  accept="image/*">
        </div>
        @error('img_profile')
            <a style="color:red;" class='contact_validation' >{{ $message }}</a>
        @enderror
        <hr>
        <div class="last_button">
            <button type="submit">Сохранить</button>
        </div>
    </form>
</div>
