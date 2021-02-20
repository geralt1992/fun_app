@extends('master.master')
@section('content')

<section id="main" style="min-height: 100vh;">
<a id="oranment2" class="hide" href="{{route('show_main_page')}}" style="text-decoration:none;"></a>
    <div class="subtitle5">
        <h1 data-aos="fade-right" data-aos-delay="300"   data-aos-once="true"  data-aos-duration="1000">Rezultati pretrage...</h1>
    </div>

  

  @isset($no_results)
    <div class="subtitle6">
      <h1>{{$no_results}}</h1>
    </div>
  @endisset



  @isset($search_results)
  <div class="container">
    <div class="row" >

    <table class="table table-hover table-striped table-borderless table-responsive-sm">
          <thead>
            <tr style="text-transform:uppercase;" >
              <th scope="col">#</th>
              <th scope="col">Nabijeni</th>
              <th scope="col">Puta Nabijen</th>
              <th scope="col">Zadnje nabijanje</th>
              <th scope="col">Zadnji put nabijen</th>
              <th scope="col">Vidi sva nabijanja</th>
            </tr>
          </thead>

          <tbody>
          <?php $i=1 ?>
   @if(is_array($search_results) || is_object($search_results))
    @foreach($search_results as $search)
            <tr>
              <th scope="row"><?php echo $i++ ?></th>
              <td>{{$search->nabijem_koga}}</td>
              <td> @if($search->number > 0)  
                      {{$search->number}} puta 
                   @else    
                  <a class="btn btn-danger" href="{{route('show_second_page' , [ $search->nabijem_koga])}}">Pogledaj</a>  
                  @endif
              </td>
              <td>{{$search->nabijem_zbog}}</td>
              <td> {{ Carbon\Carbon::parse($search->created_at)->format('d. M. Y. - H:i:s ') }}</td>
              <td> <a class="btn btn-danger" href="{{route('show_second_page' , [ $search->nabijem_koga])}}">Pogledaj</a></td>
            </tr>
    @endforeach
  </tbody >

          <tfoot>
              <tr style="text-transform:uppercase;">
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col">{{$search_results->appends(request()->input())->links('mobile-pagination-template') }}</th>
                <th scope="col"></th>
                <th scope="col"></th>
              </tr>
            </tfoot>
      </table >
    </div>   
  </div>


 
  @endisset
  @endif
   
   








</section>
    <section id="footer3">
  <a id="button" href="#" style="text-decoration:none;"></a> 
</section>

@endsection


<style>
/*-------------------------------------------------------------------GENERAL---------------------------------------------------------------------------------------------*/
*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

html {
  scroll-behavior: smooth;
}

body{
    width: 100%;
    height: 100%;
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-position: center;
    background-size: cover;
    background-color:  #F0A07C !important;
}

/*-------------------------------------------------------------------ALL---------------------------------------------------------------------------------------------*/

.container{
  background: white; 
  margin-top: 12%;
  height: auto;
  margin-bottom: 5%;
  min-height: auto;
  -webkit-box-shadow: 13px 19px 19px -8px rgba(0,0,0,0.75);
  -moz-box-shadow: 13px 19px 19px -8px rgba(0,0,0,0.75);
  box-shadow: 13px 19px 19px -8px rgba(0,0,0,0.75);
}

.subtitle5 {
  position: relative;
  top: 15%;
  color: white;
  text-transform: uppercase;
  text-align: center;
  left: 30%;
  transform: translate(-50%, 150%);
}

.subtitle5 h1{
  font-size:4.5rem; 
  font-weight:900; 
  letter-spacing: 3px;
}

.subtitle6 {
  position: relative;
  top: 10%;
  color: white;
  text-transform: uppercase;
  text-align: center;
  left: 50%;
  transform: translate(-50%, 100%);
}

.subtitle6 h1{
  font-size:3rem; 
  font-weight:900; 
  letter-spacing: 3px;
}

table{
  overflow: scroll;
  margin-bottom: -.001rem !important;
}

thead{
  background-color: #281E36;
  color: white;
  opacity: .8;
}

tfoot{
  background-color: #281E36!important;
  color: white!important;
  opacity: .8;
}

td{
  padding: 2rem !important;
}

th{
  padding: 1.5rem !important;
}

#footer3{
  height:20vh; 
  background-color: #281E36;
  clip-path: polygon(0 70%, 100% 11%, 100% 100%, 0 100%);
  opacity: .9;
}


/*-------------------------------------------------------------------responsive---------------------------------------------------------------------------------------------*/
@media screen and (max-width: 1440px) {
  .subtitle5 h1{
  font-size:2.5rem; 
}
}

@media screen and (max-width: 1024px) {
  .subtitle5 h1{
  font-size:1.5rem; 
}
}

@media screen and (max-width: 320px) {
  .subtitle5 h1{
  font-size:1rem; 
}

.subtitle5 {
  left: 50%;
}
}

@media screen and (max-width: 425px) {
.subtitle5 {
left: 50%;
}

.hide{
  visibility: hidden !important;
}
}
</style>