@extends('layouts.app_home')

@section('title', 'Список организаций')

  @section('content')
        <div class="mainPartners">
            <div class="partnersBoxes">
                <div class="partners_heading">
                    <h1>Список организаций</h1>
                </div>
                <div class="partners_content">
                    <div class="partners_block" style="width: 100%;" >
                    @foreach($ShowArganizacya as $key => $value)
                        <div class="partners_box" > <a href="{{ route('arganizacya finel product',['id'=>$value->id]) }}">
                                <div class="partners_img">
                                    <img src="{{ asset('img/img_arganizacya/'.$value->img) }}" alt="img">
                                </div>
                                <p class="partners_name">{{ $value->name }}</p>
                                <div class="partners_mail">
                                    <img src="{{ asset('assets/img/emailb.svg') }}" alt="img">
                                    <a href="#">{{ $value->email }}</a>
                                </div>
                                <div class="partners_mail">
                                    <img src="{{ asset('assets/img/telephoneb.svg') }}" alt="img">
                                    <a href="#"> {{ $value->phone_number }}</a>
                                </div>
                            </a>
                        </div>
                    @endforeach
                    </div>
                </div>
            </div>
            <section>
                <div class=" bigcontainer mb-5">
                    <nav aria-label="Page navigation example " class="pagnav">
                        <ul class="pagination">
                            {{ $ShowArganizacya->links() }}
                        </ul>
                    </nav>
                </div>
            </section>
        </div>
  @stop
