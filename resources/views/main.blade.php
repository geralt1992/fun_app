@extends('master.master')
@section('content')


<section id="top">
<a id="oranment" href="#info" style="text-decoration:none;"></a>
</section>

<section class="banner-area" id="banner">

    <div class="banner-wraper">
       
        <div class="title">
            <h1>NABIJEM TE NA<h1>
        </div>

        <div class="banner-search">

          <form method="POST" action="{{route('save')}}" >
                        @csrf

              <div class="form-row" data-aos="fade-down" data-aos-delay="300"   data-aos-once="true"  data-aos-duration="1000">
                <div class="form-group col-md-6" >
                  <label for="who" data-aos="fade-down" data-aos-delay="300" data-aos-duration="1000">TI SI?</label>
                  <input style="border-radius: 0!important;" type="text" id="who" name="who" class="form-control" placeholder="TVOJE IME - NIJE OBVEZNO">
                </div>

                <div class="form-group col-md-6">
                  <label for="whome" data-aos="fade-down" data-aos-delay="300" data-aos-duration="1000">IME</label>
                  <input required style="border-radius: 0!important;" type="text" id="whome" name="whome" class="form-control" placeholder="IME KOGA NABIJAŠ">
                </div>
              </div>

            <div class="form-col" data-aos="fade-down" data-aos-delay="300"   data-aos-once="true"  data-aos-duration="1000">
              <div class="col">
                <label for="why" data-aos="fade-down" data-aos-delay="300" data-aos-duration="1000">RAZLOG</label>
                <input style="border-radius: 0!important;" required type="text" id="why" name="why" class="form-control" placeholder="OPIŠI ZAŠTO GA/JU NABIJAŠ">
              </div>
            </div>
            
             <!-- RECAPTCHA -->
             <input type="hidden" name="recaptcha_response" id="recaptcha_response">

              <div class="center" style="margin-top: 1rem;">
                  <button type="submit" class="btn  btn-lg"  style=" margin-top: 2rem; border-radius: 0!important; padding: 20px !important; font-size: 1.7rem; color:white; background-color:crimson ;">NABIJ</button>
              </div>
          </form>

        </div>
    </div>
</section>

<section id="info">
  <div class="subtitle1" >
      <h1 data-aos="fade-right" data-aos-delay="300"   data-aos-once="true"  data-aos-duration="1000">Što je Nabijem te ...</h1>
  </div>
    <p class="sub1_text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio optio quia aut veritatis voluptatem aperiam voluptatum corporis eum quaerat
      ipsum fugiat error aliquid nostrum dolorem distinctio, rerum quis culpa placeat molestias libero impedit minus! Non consectetur reiciendis quod illum 
      necessitatibus enim aliquam, voluptatibus velit harum magnam dolores nihil mollitia ex. 
    </p>
</section>


<section id="top_table">

<div class="subtitle3">
    <h1 data-aos="fade-left" data-aos-delay="300"   data-aos-once="true"  data-aos-duration="1000">Top 5 nabijenih</h1>
</div>

		<div class="container-table100">
			<div class="wrap-table100">

				<div class="table100 ver1 ">
					<div class="table100-head">
						<table style=" margin-top: 5rem;">
							<thead>
								<tr  >
									<th style="padding:30px;" class="column1">Mjesto</th>
									<th class="column2">Tko je nabijen</th>
									<th class="column3">Broj nabijanja</th>
									<th class="column4">Glavni Razlog</th>
								</tr>
							</thead>
						</table>
					</div>

					<div class="table100-body">
						<table>
							<tbody>
              <?php $i=1 ?>
              @isset($table)
              @if(is_array($table) || is_object($table))
              @foreach($table as $result)
								<tr>
									<td class="cell100 column1"><a style="text-decoration: none !important; color: black !important; font-size: 1.2rem; opacity:.6; padding:1.2rem;" href="{{route('show_second_page' , [ $result->nabijem_koga])}}"> #<?php echo $i++ ?>. </a></td>
									<td class="cell100 column2"><a style="text-decoration: none !important; color: black !important; font-size: 1.2rem; opacity:.6; padding:1.2rem;" href="{{route('show_second_page' , [ $result->nabijem_koga])}}">{{$result->nabijem_koga}}</a></td>
									<td class="cell100 column3"><a style="text-decoration: none !important; color: black !important; font-size: 1.2rem; opacity:.6; padding:1.2rem;" href="{{route('show_second_page' , [ $result->nabijem_koga])}}">{{$result->count}} puta</a></td>
									<td class="cell100 column4"><a style="text-decoration: none !important; color: black !important; font-size: 1.2rem; opacity:.6; padding:1.2rem;" href="{{route('show_second_page' , [ $result->nabijem_koga])}}">{{$result->nabijem_zbog}}.</a></td>
								</tr>
              @endforeach
              @endisset
              @endif
							</tbody>
						</table>
					</div>
        </section>



<section id="search_users">

  <div class="subtitle2">
    <h1 data-aos="fade-up" data-aos-delay="300"  data-aos-duration="1000">Pretraži nabijene</h1>
      <small class="form-text text-muted" data-aos="fade-up" data-aos-delay="300"   data-aos-once="true"  data-aos-duration="1000">
      Dovoljno je pretražiti po imenu ili po ključnoj riječi!
      </small>
  </div>


    <div class="user_search">
    <div class="form-row">
      <form class="form-inline" method="GET" action="{{route('search')}}" >
      @csrf
        <div class="form-group mx-sm-3 mb-3">
          <input type="text" class="form-control ime" name="ime" id="ime" placeholder="Unesi ime nabijenog">
        </div>
        <div class="form-group mx-sm-3 mb-3 la">
          <input type="text" class="form-control razlog" name="razlog" id="razlog" placeholder="Unesi ključnu riječ - razlog nabijanja">
        </div>
          <!-- RECAPTCHA -->
          <input type="hidden" name="recaptcha_response" id="recaptcha_response">
        <div class="form-group mx-sm-3 mb-3">
        <button type="submit" class="btn btn-dark btn-lg" style="border-radius: 0!important; padding: 1.5rem !important;  background-color: #281E36 !important; opacity: .9;   box-shadow: none !important;"> PRETRAŽI</button></div>
      </form>
      </div>
    </div>

</section>

<section id="footer">
  <a id="button" href="#" style="text-decoration:none;"></a> 

  <div class="js-cookie-banner" id="no_show" data-aos="fade-right"data-aos-offset="300" data-aos-easing="ease-in-sine" style="z-index: 999;">
        <p class="conditions_text">Ova web stranica koristi kolačiće kako bi osigurala najbolje iskustvo na našoj web stranici <a href="{{route('show_disclaimer')}}"> Saznajte više - Uvjeti korištenja </a>  
            <button class="btn-danger rounded js-cookie-dismiss" style="float:right;">Slažem se</button>
        </p>
    </div>
</section>

@endsection



