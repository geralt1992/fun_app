@extends('master.master')
@section('content')
  
    <header class="masthead text-white text-center" style="background-color: #F0A07C;">
      <a id="oranment2" href="{{route('show_main_page')}}" style="text-decoration:none;"></a>
        <div class="container d-flex align-items-center flex-column">
            <img class="masthead-avatar mb-5" src="{{url('/avatars/avataaars.svg')}}" style="border-radius:50%;" alt="placeholder - avatar of man" />
            
            <h1 class="masthead-heading text-uppercase my_name" >{{$name}}</h1>
            <p class="masthead-subheading" style="margin-top: 3rem;" data-aos="fade-down" data-aos-delay="300"   data-aos-once="true"  data-aos-duration="1000">Nabijen - {{$count}} puta! </p>
        </div>
    </header>
       
    <section class="page-section  text-dark mb-0" id="about">
      <div class="container">

        <div class="subtitlee1">
        <h1 data-aos="fade-down" data-aos-delay="300"   data-aos-once="true"  data-aos-duration="1000">Razlozi nabijanja</h1>
        </div>

          @isset($results)
             <?php $i=1 ?>
          @if(is_array($results) || is_object($results))
              @foreach($results as $result)
              <div  style="margin-top: 5rem; line-height: 30px; font-weight:900; font-size:8vw !important;">
                    <p class="lead">#<?php echo $i++ ?> - {{$result->nabijem_zbog}}
                    <small style="float:right; margin-top: 2rem;">NABIO - {{$result->user}} | {{ Carbon\Carbon::parse($result->created_at)->format('d. M. Y. - H:i ')  }} sati</small></p>
                </div>
          @endforeach
          @endisset
          @endif
   
      </div>

    </section>

    <section style="height:15vh; margin-top: 8rem;">
      <div class="container">
        <div class="row">
        {{$results->appends(request()->input())->links('mobile-pagination-template') }}
        </div>  
      </div>
    </section>

    <section id="footer2">
      <a id="button" href="#" style="text-decoration:none;"></a> 
    </section>
@endsection