<!DOCTYPE html>
<html>

<head>
  @include('home.css')

  <style>
    table {
        width: 80%;
        border-collapse: collapse;
        font-family: Arial, sans-serif;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        margin: 20px auto; /* Centered the table horizontally */
        text-align: center; /* Centered text in the table */
    }
    th, td {
        padding: 12px;
        border-bottom: 1px solid #ddd;
        text-align: center; /* Centered text in table cells */
    }
    th {
        background-color: #f2f2f2;
        font-weight: bold;
    }
    img {
        height: 100px;
        width: 200px;
        display: block; /* Ensures image is treated as a block element */
        margin: 0 auto; /* Centers the image within its cell */
    }
    tr:hover {
        background-color: #f9f9f9;
    }
</style>

</head>

<body>
  <div class="hero_area">
    <!-- header section strats -->
     @include('home.header')
    <!-- end header section -->
    <!-- slider section -->



    <div>
        <table>
            <tr>
                <th>Product Title</th>
                <th>Price</th>
                <th>Category</th>
               
                <th>Quantity Left</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
            @foreach ($cart as $cart) <!-- using forloop because there will be lots of id's -->
            <tr>
           
                <td>{{$cart->product->title}}</td>
                <td>{{$cart->product->price}}</td>
                <td>{{$cart->product->category}}</td>
                
                <td style="color:red;">{{$cart->product->quantity}}</td>
                <td> <img   src="products/{{$cart->product->image}}" alt=""></td>
                <td><a href="{{url('remove_cartProduct', $cart->id)}}"><button class="btn btn-danger">Remove</button></a></td>
            </tr>

            @endforeach
        </table>
    </div>



  @include('home.footer')

  <!-- info section -->

  

</body>

</html>