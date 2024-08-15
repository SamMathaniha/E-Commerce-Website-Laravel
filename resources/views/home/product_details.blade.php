<!DOCTYPE html>
<html>

<head>
  @include('home.css')

  <style>
  .main {
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: column;
  padding: 20px;
  background-color: #f9f9f9;
  border-radius: 8px;
  box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
  max-width: 1000px; /* Increased width from 800px to 1000px */
  margin: 0 auto;
}

.box {
  width: 100%;
  display: flex;
  flex-direction: column;
  align-items: center;
  text-align: center;
}

.imgbox {
  width: 100%;
  max-width: 400px;
  margin-bottom: 20px;
}

.imgbox img {
  width: 100%;
  border-radius: 8px;
}

.detailbox {
  width: 100%;
  margin: 10px 0;
  text-align: left;
  display: grid;
  grid-template-columns: auto auto; /* Creates two columns */
  gap: 15px 30px; /* Adds space between the items */
  align-items: center; /* Vertically centers the items */
}

.detailbox h6 {
  font-size: 18px;
  font-weight: 600;
  color: #333;
  margin: 0; /* Removes extra margin */
}

.detailbox h6 span {
  color: #555;
  text-align: right;
}


.btn-box {
  margin-top: 30px;
  text-align: center;
}

.btn-box a {
  background-color: #ff6f61;
  color: #fff;
  padding: 10px 20px;
  border-radius: 5px;
  text-decoration: none;
  transition: background-color 0.3s;
}

.btn-box a:hover {
  background-color: #ff3f2a;
}


  </style>
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
                <h6>Name :<span> {{$data->title}}</span></h6>
                <h6>Price :<span> Rs. {{$data->price}}</span></h6>
                <h6>Category :<span> {{$data->category}}</span></h6>
                <h6>Available Quantity :<span> {{$data->quantity}}</span></h6>
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