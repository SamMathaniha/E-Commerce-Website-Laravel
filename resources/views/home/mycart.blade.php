<!DOCTYPE html>
<html>

<head>
  @include('home.css')
</head>

<body>
  <div class="hero_area">
    <!-- header section strats -->
     @include('home.header')
    <!-- end header section -->
    <!-- slider section -->

  @foreach ($cart as $cart)   <!-- using forloop because there will be lots of id's -->

  {{$cart->user_id}}

  <h1>{{$cart->product_id}}</h1>
  
  @endforeach

  @include('home.footer')

  <!-- info section -->

  

</body>

</html>