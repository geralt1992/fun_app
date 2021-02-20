<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

     <!-- CSRF Token -->
     <meta name="csrf-token" content="{{ csrf_token() }}">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Nabijem te...</title>

     <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">

     <!-- Styles  CSS-->
     <link href="{{asset('css/main.css')}}" rel="stylesheet" type="text/css"/>
     <link href="{{asset('css/second.css')}}" rel="stylesheet" type="text/css"/>
     
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Merriweather:400,900,900i" rel="stylesheet">


       <!-- AOS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

     <!-- FONTOVI -->
    <link rel="stylesheet" href="https://use:fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Arvo&family=Julius+Sans+One&family=Roboto+Slab:wght@400;531&display=swap" rel="stylesheet">
</head>

<body>
@include('sweetalert::alert')
@yield('content')

<script src="https://use.fontawesome.com/releases/v5.12.0/js/all.js" data-auto-replace-svg="nest"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<!-- AOS -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

<script>
  AOS.init();
</script>


<!-- cookies claimer -->
<script>
var div = $('#no_show');

$(window).scroll(function() {
  if ($(window).scrollTop() > 2000 ) {
    div.addClass('no_show');
  } 
});
</script>


<!-- cookies claimer -->
<script>
  // Key under which name the cookie is saved
const cookieName = 'cookieconsent';
// The value could be used to store different levels of consent
const cookieValue = 'Cookies are acepted';
    
function dismiss() {
    const date = new Date();
    // Cookie is valid 1 year: now + (days x hours x minutes x seconds x milliseconds)
    date.setTime(date.getTime() + (365 * 24 * 60 * 60 * 1000));
    // Set cookie
    document.cookie = `${cookieName}=${cookieValue};expires=${date.toUTCString()};path=/`;

    // You probably want to remove the banner
    document.querySelector('.js-cookie-banner').remove();
}

// Get button element
const buttonElement = document.querySelector('.js-cookie-dismiss');
// Maybe cookie consent is not present
if (buttonElement) {
    // Listen on button click
    buttonElement.addEventListener('click', dismiss);
}
</script>



<!-- RECAPTCHA -->
<script src="https://www.google.com/recaptcha/api.js?render=6LcI9OIZAAAAAIFrTuHYzoj0jnFInPUtBqawfPDT"></script>
   
   <script>
       grecaptcha.ready(function () {
       grecaptcha.execute('6LcI9OIZAAAAAIFrTuHYzoj0jnFInPUtBqawfPDT', { action: 'contact' }).then(function (token) {
       var recaptcha_response = document.getElementById('recaptcha_response');
       recaptcha_response.value = token;
       });
       });
   </script>
</body>
</html>