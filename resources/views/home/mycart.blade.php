<!DOCTYPE html>
<html>

<head>
  @include('home.css')

  <style>
    .cart-container {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        margin: 20px;
    }

    .cart-form, .cart-table {
        width: 48%;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        padding: 20px; /* Increased padding for better spacing */
        background-color: #f9f9f9;
        border-radius: 10px;
    }

    .cart-form div {
        margin-bottom: 15px; /* Increased margin between form fields */
    }

    .cart-form label {
        display: block;
        margin-bottom: 8px;
        font-weight: bold;
        color: #333; /* Darker text color for better readability */
    }

    .cart-form input[type="text"], .cart-form textarea {
        width: 100%;
        padding: 10px; /* Increased padding for input fields */
        border: 1px solid #ccc;
        border-radius: 5px;
        background-color: #fff; /* Lighter background for input fields */
        box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1); /* Subtle inner shadow for depth */
        transition: all 0.3s ease; /* Smooth transition for hover/focus effects */
    }

    .cart-form input[type="text"]:focus, .cart-form textarea:focus {
        border-color: #007bff; /* Blue border on focus */
        box-shadow: 0 0 5px rgba(0, 123, 255, 0.5); /* Blue glow on focus */
    }

    .cart-form textarea {
        height: 80px; /* Fixed height for the textarea */
        resize: vertical; /* Allows vertical resizing */
    }

    .cart-form .btn {
        width: 100%;
        padding: 10px 0;
        font-size: 1em;
        background-color: #007bff; /* Bootstrap primary color */
        border: none;
        border-radius: 5px;
        color: #fff;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .cart-form .btn:hover {
        background-color: #0056b3; /* Darker blue on hover */
    }

    table {
        width: 100%; /* Ensure the table takes up full width of the container */
        border-collapse: collapse;
        font-family: Arial, sans-serif;
        text-align: center;
    }

    th, td {
        padding: 10px; /* Reduced padding to avoid overflow */
        border-bottom: 1px solid #ddd;
        text-align: center;
    }

    th {
        background-color: #f2f2f2;
        font-weight: bold;
    }

    img {
        height: 100px;
        width: 200px;
        display: block;
        margin: 0 auto;
    }

    tr:hover {
        background-color: #f9f9f9;
    }

    .ProducttotalValue {
        text-align: center;
        margin-top: 20px;
        font-family: Arial, sans-serif;
        font-size: 1.5em;
        font-weight: bold;
    }

    .ProducttotalValue span {
        color: green;
        text-shadow: -1px 0 blue, 0 1px blue, 1px 0 blue, 0 -1px blue;
    }
  </style>

</head>

<body>
  <div class="hero_area">
    <!-- header section starts -->
     @include('home.header')
    <!-- end header section -->

    <div class="cart-container">
        <!-- Receiver Information Form -->
        <div class="cart-form">
            <form  action="{{url('confirm_order')}}" method="post">

            @csrf
                <div>
                    <label>Receiver Name</label>
                    <input type="text" name="name" value="{{Auth::user()->name}}">
                </div>
                <div>
                    <label>Receiver Address</label>
                    <textarea name="address" > {{Auth::user()->address}}</textarea>
                </div>
                <div>
                    <label>Receiver Phone</label>
                    <input type="text" name="phone" value="{{Auth::user()->phone}}">
                </div>
                <div>
                    <input class="btn btn-primary" type="submit" value="Place Order">
                </div>
            </form>
        </div>

        <!-- Cart Details Table -->
        <div class="cart-table">
            <table>
                <tr>
                    <th>Product Title</th>
                    <th>Price</th>
                    <th>Category</th>
                    <th>Quantity Left</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>

                <?php
                    $value = 0;
                ?>

                @foreach ($cart as $cart)
                <tr>
                    <td>{{$cart->product->title}}</td>
                    <td>{{$cart->product->price}}</td>
                    <td>{{$cart->product->category}}</td>
                    <td style="color:red;">{{$cart->product->quantity}}</td>
                    <td><img src="products/{{$cart->product->image}}" alt=""></td>
                    <td><a href="{{url('remove_cartProduct', $cart->id)}}"><button class="btn btn-danger">Remove</button></a></td>
                </tr>

                <?php
                    $value += $cart->product->price;
                ?>

                @endforeach
            </table>
        </div>
    </div>

    <!-- Total Value Display -->
    <div class="ProducttotalValue">
        <h3>Total value of the Cart is : <span>Rs. {{$value}}</span></h3>
    </div>

  @include('home.footer')

</body>

</html>
