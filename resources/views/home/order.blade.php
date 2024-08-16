<!DOCTYPE html>
<html>

<head>
  @include('home.css')

  <style>
    .order-history-container {
    width: 100%;
    max-width: 1000px;
    margin: 0 auto;
    padding: 20px;
    box-sizing: border-box;
}

.order-history-table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
    background-color: #f9f9f9;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.order-history-table th, .order-history-table td {
    padding: 12px 15px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

.order-history-table th {
    background-color: #007bff;
    color: white;
    font-weight: bold;
}

.order-history-table tr:nth-child(even) {
    background-color: #f2f2f2;
}

.order-history-table tr:hover {
    background-color: #f1f1f1;
}

.product-image {
    height: 80px;
    width: 150px;
    object-fit: cover;
    border-radius: 5px;
    border: 1px solid #ccc;
}

  </style>
</head>

<body>
  <div class="hero_area">
    <!-- header section strats -->
     @include('home.header')
    <!-- end header section -->

    <div class="order-history-container">
    <table class="order-history-table">
        <thead>
            <tr>
                <th>Product Name</th>
                <th>Price</th>
                <th>Delivery Status</th>
                <th>Product Image</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($order as $order)
            <tr>
                <td>{{$order->product->title}}</td>
                <td>${{$order->product->price}}</td>
                <td>{{$order->status}}</td>
                <td>
                    <img class="product-image" src="/products/{{$order->product->image}}" alt="Product Image">
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>






    

  @include('home.footer')



  

</body>

</html>





    

  @include('home.footer')



  

</body>

</html>