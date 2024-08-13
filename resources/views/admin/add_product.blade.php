<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
    <style>
      body {
        background-color: #2c2c2c;
        color: #e0e0e0;
      }
      .page-header {
        background-color: #343a40;
        border-bottom: 1px solid #444;
      }
      .card {
        background-color: #3a3a3a;
        border: 1px solid #444;
      }
      .card-body {
        color: #e0e0e0;
      }
      .form-control, .form-control-file {
        background-color: #444;
        color: #e0e0e0;
        border: 1px solid #555;
      }
      .form-control::placeholder {
        color: #b0b0b0;
      }
      .form-control:focus {
        background-color: #555;
        color: #fff;
        border-color: #777;
      }
      .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
      }
      .btn-primary:hover {
        background-color: #0056b3;
        border-color: #004085;
      }
    </style>
  </head>
  <body>
    @include('admin.header')
    @include('admin.sidebar')
   
    <!-- Sidebar Navigation end-->
    <div class="page-content">
      <div class="page-header">
        <div class="container-fluid">
          <h1 class="h3 mb-4 text-white">Add Products</h1>

          <div class="card shadow mb-4">
            <div class="card-body">
              <form action="{{ url('add_product') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label for="title">Product Title</label>
                  <input type="text" class="form-control" id="title" name="title" placeholder="Enter product title" required>
                </div> 
                <div class="form-group">
                  <label for="description">Description</label>
                  <textarea class="form-control" id="description" name="description" rows="3" placeholder="Enter product description" required></textarea>
                </div> 
                <div class="form-group">
                  <label for="price">Price</label>
                  <input type="text" class="form-control" id="price" name="price" placeholder="Enter product price" required>
                </div> 
                <div class="form-group">
                  <label for="quantity">Quantity</label>
                  <input type="text" class="form-control" id="quantity" name="quantity" placeholder="Enter product quantity" required>
                </div>  

                <div class="form-group">
                  <label for="category">Product Category</label>
                  <select class="form-control" id="category" name="category">
                    <option value="">Select category</option>
                        @foreach ($category as $category)
                        <option>{{$category->category_name}} </option>
                        @endforeach
                  </select>
                </div>

                <div class="form-group">
                  <label for="image">Product Image</label>
                  <input type="file" class="form-control-file" id="image" name="image" required>
                </div> 
                <div class="form-group">
                  <input type="submit" class="btn btn-primary" value="Add Product">
                </div>
              </form>
            </div>
          </div>

        </div>
      </div>
    </div>
    
    <!-- JavaScript files-->
    <script src="{{asset('admincss/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/popper.js/umd/popper.min.js')}}"> </script>
    <script src="{{asset('admincss/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/jquery.cookie/jquery.cookie.js')}}"> </script>
    <script src="{{asset('admincss/vendor/chart.js/Chart.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('admincss/js/charts-home.js')}}"></script>
    <script src="{{asset('admincss/js/front.js')}}"></script>
  </body>
</html>
