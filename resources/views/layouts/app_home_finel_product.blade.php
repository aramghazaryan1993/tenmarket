@include('includes.default.head')

<body>
    @include('includes.home.header')

    <section>
        <div class="bigcontainer">
            <div class="contentBigbayer">
                    @include('includes.home.reklam_left')

                         @yield('content')

                    @include('includes.home.reklam_right')
            </div>
        </div>
    </section>

    <script type="text/javascript" src="{{ asset('assets/js/getregion.js') }}"></script>

    @include('includes.home.finel_product')


  @include('includes.home.footer')

  @yield('scripts')
<script>

    $(document).ready(function() {
        $('.fancybox').fancybox({
            beforeShow: function() {
                this.title = $(this.element).data("caption");
            }
        });

 document.querySelector('.tags').oninput=function() {
 let val=this.value.trim();

 let chos = document.querySelectorAll('.input-group ul li a');

 if( val != ''){
  chos.forEach(function(elem){
    if(elem.innerText.search(val)==-1){

      elem.classList.add('hidelem');
      elem.innerHTML = elem.innerText;

    }
    else{
      elem.classList.remove('hidelem');
      let str = elem.innerText;

      elem.innerHTML = innerMark(str,elem.innerText.search(val), val.length)
    }
  })
 }else{
   chos.forEach(function(elem){

      elem.classList.remove('hidelem')
       elem.innerHTML = elem.innerText;

    })
 }
}
function innerMark(string,pos,len){
  return string.slice(0,pos)+`<mark>`+string.slice(pos, pos+len)
  + `</mark>`+ string.slice(pos+len);


}
   });

</script>

<script type="text/javascript" src="{{ asset('assets/js/app.js') }}"></script>

</body>

</html>
