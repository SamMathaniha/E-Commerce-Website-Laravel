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

  </div>



  <section class="shop_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          
         Product Details
        </h2>
      </div>
      <div class="row">

     
        
        <div class="main">
          <div class="box">
            
              <div class="imgbox">
                <img src="/products/{{$data->image}}" alt="">
              </div>
              <div class="detailbox">
                <h6>Name<span> Rs {{$data->title}}</span></h6>
                <h6>Price<span> Rs {{$data->price}}</span></h6>
                <h6>Category<span> Rs {{$data->category}}</span></h6>
                <h6>Available Quantity<span> Rs {{$data->quantity}}</span></h6>
              
              </div> 
              <div class="detailbox">
                <p>{{$data->description}}</p>
              
              </div>  
            

            

          </div>
        </div>
 

      </div>
      <div class="btn-box">
        <a href="">
          View All Products
        </a>
      </div>
    </div>
  </section>









  @include('home.footer')

  <!-- info section -->

  

</body>

</html>