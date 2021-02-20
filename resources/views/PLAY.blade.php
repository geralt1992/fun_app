@extends('master.master')


@section('content')


<div class="container" style="background:silver;">



<button id="btnShow" type="btn btn-lg btn-primary">STISNI ME</button>


<div id="out"></div>

</div>





<script>


    document.getElementById('btnShow').addEventListener('click' , (e) => {
        e.preventDefault();

        let url = '{{route("get_api")}}';

       fetch(url)
       .then( (res) => res.json())
       .then( (parsed) => {
           console.log("u prasedu");

        console.log(parsed.length);

        let out = ''
        parsed.forEach( (user) => {

            out+= `<div>${user.id} - ${user.user}</div>`;
          
        });
        document.getElementById('out').innerHTML = out;
       })
    
    
   


    })




</script>

@endsection


