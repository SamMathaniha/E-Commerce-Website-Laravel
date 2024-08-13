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

         <h1>Add Products</h1>

         <div>
            <form>
               <div>
                    <label>Product Title</label>
                    <input type="text" name="title" required>
               </div> 
               <div>
                    <label>Description</label>
                    <textarea name="description" required> </textarea>
               </div> 
               <div>
                    <label>Price</label>
                    <input type="text" name="price" required>
               </div> 
               <div>
                    <label>Quantity</label>
                    <input type="text" name="quantity" required>
               </div> 
               <div>
                    <label>Product Category</label>
                    <input type="text" name="category" required>
               </div> 
               <div>
                    <label>Quantity</label>
                    <select>
                        <option>abc</option>
                    </select>
               </div> 
               <div>
                    <label>Product Image</label>
                    <input type="file" name="image" required>
               </div> 
            </form>
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