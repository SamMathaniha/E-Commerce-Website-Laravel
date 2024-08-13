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
              <form action="{{ url('update_category', $data->id) }}" method="post">
                @csrf
                <div class="form-group">
                  <label for="category">Category Name</label>
                  <input type="text" class="form-control" id="category" name="category" value="{{ $data->category_name }}">
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
