<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<style>
  .cartBtn {
    font-size: 18px; 
    padding: 10px;
    position: absolute;
    right: 10px;
    top: 10px;
    background-color: #f8f9fa;
    border: 1px solid #ddd;
    border-radius: 50%;
    color: #333;
    text-decoration: none;
  }

  .box {
    position: relative;
    overflow: hidden;
    border: 1px solid #ddd;
    border-radius: 8px;
    padding: 10px;
    margin: 10px;
  }
</style>

<section class="shop_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>Latest Products</h2>
      </div>
      <div class="row">

        @foreach ($product as $products)
        
        <div class="col-sm-6 col-md-4 col-lg-3">
          <div class="box">
            <a href="{{url('product_details',$products->id)}}">
              <div class="img-box">
                <img src="products/{{$products->image}}" alt="">
              </div>
              <div class="detail-box">
                <h6>{{$products->title}}</h6>
                <h6>Price<span> Rs {{$products->price}}</span></h6>
              </div>  
            </a>

            <a href="{{url('add_cart',$products->id)}}" class="cartBtn">
              <i class="fas fa-shopping-cart"> +</i>
            </a>

          </div>
        </div>
        @endforeach

      </div>
      <div class="btn-box">
        <a href="">View All Products</a>
      </div>
    </div>
  </section>
