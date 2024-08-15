<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
  </head>
  <body>
    @include('admin.header')
    @include('admin.sidebar')
   
    <!-- Sidebar Navigation end-->
    <div class="page-content">
      <div class="page-header">
        <div class="container-fluid">
          <h1 class="h3 mb-4 text-gray-800">Update Category</h1>
          
          <div class="card shadow mb-4">
            <div class="card-body">
              <form action="{{ url('edit_product', $data->id) }}" method="post" enctype="multipart/form-data" >
                @csrf
                <div class="form-group">
                  <label for="category">Title</label>
                  <input type="text" class="form-control" id="title" name="title" value="{{ $data->title }}" required>
                </div>
                <div class="form-group">
                  <label for="category">Description	</label>
                  <input type="text" class="form-control" id="description" name="description" value="{{ $data->description }}" required>
                </div>
                <div class="form-group">
                  <label for="category">Price</label>
                  <input type="text" class="form-control" id="price" name="price" value="{{ $data->price }}" required>
                </div>

                <div class="form-group">
                  <label for="category">Category</label>
                    <select name="category" class="form-control" required>
                        <option value="{{ $data->category }}">{{ $data->category }}</option>
                    
                                    @foreach ($category as $category)
                                    <option value="{{$category->category_name}}" >{{$category->category_name}} </option>
                                    @endforeach
                    </select>
                </div>
                <div class="form-group">
                  <label for="category">Quantity</label>
                  <input type="text" class="form-control" id="quantity" name="quantity" value="{{ $data->quantity }}" required>
                  
                </div>
                <div class="form-group">
                  <label for="category">Image</label>
                      <img height="80" width="150" src="/products/{{$data->image}}">
                      <input type="file" class="form-control-file" id="image" name="image">
                </div>
                <div class="form-group">
                  <input type="submit" class="btn btn-primary" value="Update">
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <!-- JavaScript files-->
    <script src="{{ asset('admincss/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admincss/vendor/popper.js/umd/popper.min.js') }}"> </script>
    <script src="{{ asset('admincss/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admincss/vendor/jquery.cookie/jquery.cookie.js') }}"> </script>
    <script src="{{ asset('admincss/vendor/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('admincss/vendor/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('admincss/js/charts-home.js') }}"></script>
    <script src="{{ asset('admincss/js/front.js') }}"></script>
  </body>
</html>
