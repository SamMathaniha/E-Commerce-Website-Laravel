<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            color: #333;
        }

        .invoice-container {
            width: 80%;
            margin: 50px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            background-color: #fff;
        }

        .invoice-header {
            text-align: center;
            margin-bottom: 40px;
            border-bottom: 2px solid #333;
            padding-bottom: 10px;
        }

        .invoice-header h1 {
            margin: 0;
            font-size: 28px;
            color: #000;
        }

        .invoice-details {
            margin-bottom: 30px;
        }

        .invoice-details table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .invoice-details th, .invoice-details td {
            padding: 10px;
            text-align: left;
        }

        .invoice-details th {
            background-color: #f0f0f0;
            color: #000;
            font-weight: bold;
        }

        .invoice-details td {
            background-color: #fafafa;
        }

        .invoice-product {
            margin-top: 20px;
        }

        .invoice-product table {
            width: 100%;
            border-collapse: collapse;
        }

        .invoice-product th, .invoice-product td {
            padding: 15px;
            text-align: left;
            border: 1px solid #ddd;
        }

        .invoice-product th {
            background-color: #007bff;
            color: #fff;
            font-weight: bold;
        }

        .invoice-product td {
            background-color: #f9f9f9;
        }

        .invoice-product img {
            border: 1px solid #ddd;
            border-radius: 5px;
            display: block;
            margin: 10px 0;
        }

        .invoice-footer {
            text-align: center;
            margin-top: 50px;
            font-size: 14px;
            color: #777;
            border-top: 1px solid #333;
            padding-top: 10px;
        }
    </style>
</head>
<body>
    <div class="invoice-container">
        <div class="invoice-header">
            <h1>Invoice</h1>
        </div>

        <div class="invoice-details">
            <table>
                <tr>
                    <th>Customer Name</th>
                    <td>{{$data->name}}</td>
                </tr>
                <tr>
                    <th>Customer Address</th>
                    <td>{{$data->rec_address}}</td>
                </tr>
                <tr>
                    <th>Customer Phone Number</th>
                    <td>{{$data->phone}}</td>
                </tr>
            </table>
        </div>

        <div class="invoice-product">
            <table>
                <tr>
                    <th>Product Title</th>
                    <td>{{$data->Product->title}}</td>
                </tr>
                <tr>
                    <th>Product Price</th>
                    <td>${{$data->Product->price}}</td>
                </tr>
                <tr>
                    <th>Product Image</th>
                    <td><img height="80" width="150" src="products/{{$data->Product->image}}" alt="Product Image"></td>
                </tr>
            </table>
        </div>

        <div class="invoice-footer">
            <p>Thank you for your purchase!</p>
        </div>
    </div>
</body>
</html>
