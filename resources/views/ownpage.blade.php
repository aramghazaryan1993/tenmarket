@include('includes.default.head')
<body>
	<div class="bigcontainer">
        <div class="kabinettop">
            <div class="logo">
                <a href="{{ route('home') }}">
                    <img src="{{ asset('img/img_default/ten.png') }}" alt="logo"></a>
            </div>
            <div class="add">
                <div class="namep">
                    <img src="{{ asset('assets/img/defolt.png') }}" alt="img">
                    <h1>Name</h1>
                </div>
                <a href="addorder.html"><button>Добавить объявление</button></a>
            </div>
        </div>
</div>

<div class="pageowner">
	<div class="bigcontainer">
		<div class="owner_main">

        {{--  Pradam --}}
  @if (Request::segment(1) == 'pradam_ownpage')
    <div class="owner_content">

        @foreach($ShowPradamOwnPage as $key => $value)

            <div class="ownerContent">
                <div class="contentImg">
                    @php $a = $value->ShowImg; $b = $a['img']; @endphp
                    <img src="{{ asset('img/img_pradam/'.$b) }}" alt="imag">
                </div>
                <div class="contentDetail">
                    <a href="{{ route('pradam finel product',['id' => $value->id]) }}"><h3>{{ $value->product_name }}</h3></a>
                    <p>{{ $value->price }}</p>
                    <span>{{ $value->confirmation_date }}</span>
                </div>
            </div>
            <hr>
  @endforeach
  </div>


    <div class="owner_img">
        <div class="ownerImg">
        <img src="{{ asset('img/users/'.$ShowUser->img) }}" alt="img">
        </div>

        <div class="ownerCont">
            <h3>{{ $ShowUser->name }} {{ $ShowUser->last_name }}</h3>
            <a href="#ownercomentkuplyu" class="fancybox"  >
            <button>Написать сообщение</button>
            </a>
        </div>
    </div>
    {{-- <div id="ownercomentkuplyu" style="display:none" class="modal_block">
            <div>
                <h3>Написать сообщение</h3>
            </div>
            <hr>

            <form>
                <textarea placeholder="Ваше сообщение"></textarea>
                <div class="d-flex mx-auto">
                    <button class="btnmodal" type="submit"> Отправить</button></div>
            </form>
        </div> --}}
  @endif




    {{-- Kuplyu --}}
    @if (Request::segment(1) == 'kuplyu_ownpage')
		<div class="owner_content">

            @foreach($ShowKuplyuOwnPage as $key => $value)

				<div class="ownerContent">
					<div class="contentImg">
                        @php $a = $value->ShowImg; $b = $a['img']; @endphp
						<img src="{{ asset('img/img_kuplyu/'.$b) }}" alt="imag">
					</div>
					<div class="contentDetail">
						<a href="{{ route('kuplyu finel product',['id' => $value->id]) }}"><h3>{{ $value->product_name }}</h3></a>
						<p>{{ $value->price }}</p>
						 <span>{{ $value->confirmation_date }}</span>
					</div>
				</div>
                <hr>
            @endforeach
            </div>


         <div class="owner_img">
				<div class="ownerImg">
				<img src="{{ asset('img/users/'.$ShowUser->img) }}" alt="img">
				</div>

				<div class="ownerCont">
					<h3>{{ $ShowUser->name }} {{ $ShowUser->last_name }}</h3>
					<a href="#ownercomentkuplyu" class="fancybox"  >
					<button>Написать сообщение</button>
					</a>
				</div>
			</div>
			 {{-- <div id="ownercomentkuplyu" style="display:none" class="modal_block">
			 	  <div>
                        <h3>Написать сообщение</h3>
                    </div>
                    <hr>

                    <form>
                        <textarea placeholder="Ваше сообщение"></textarea>
                        <div class="d-flex mx-auto">
                            <button class="btnmodal" type="submit"> Отправить</button></div>
                    </form>
              </div> --}}
            @endif


        {{-- tenorders --}}
        @if (Request::segment(1) == 'tenorders_ownpage')
		<div class="owner_content">

            @foreach($ShowTenOrdersOwnPage as $key => $value)

				<div class="ownerContent">
					<div class="contentImg">
                        @php $a = $value->ShowImg; $b = $a['img']; @endphp
						<img src="{{ asset('img/img_ten_orders/'.$b) }}" alt="imag">
					</div>
					<div class="contentDetail">
						<a href="{{ route('tenorders finel product',['id' => $value->id]) }}"><h3>{{ $value->product_name }}</h3></a>
						<p>{{ $value->price }}</p>
						 <span>{{ $value->confirmation_date }}</span>
					</div>
				</div>
                <hr>
            @endforeach
            </div>


         <div class="owner_img">
				<div class="ownerImg">
				<img src="{{ asset('img/users/'.$ShowUser->img) }}" alt="img">
				</div>

				<div class="ownerCont">
					<h3>{{ $ShowUser->name }} {{ $ShowUser->last_name }}</h3>
					<a href="#ownercomentkuplyu" class="fancybox"  >
					<button>Написать сообщение</button>
					</a>
				</div>
			</div>

            @endif

            <div id="ownercomentkuplyu" style="display:none" class="modal_block">
                <div>
                     <h3>Написать сообщение</h3>
                 </div>
                 <hr>

                 <form class="attachform" method="post" enctype="multipart/form-data" action="{{ route('send message request') }}">
                    {{csrf_field()}}
                     <textarea placeholder="Ваше сообщение" name="message_request"></textarea>
                     <input type="hidden" name="to_id" value="{{ $ShowUser->id }}">
                     <br>
                     <img class="imgattach" src="{{ asset('assets/img/attach.png') }}" alt="img">
                     <input type="file" id="attachfile" name="upload_file[]" multiple="">
                      <span class="attachtext"></span>
                     <div class="d-flex mx-auto">
                         <button class="btnmodal" type="submit"> Отправить</button></div>
                 </form>
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
{{-- <script type="text/javascript" src="/assets/js/app.js"></script></body> --}}

</html>
