<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')

    <style type="text/css">
        body {
            background-color: #121212;
            color: #ffffff;
        }
        .CateforyFormHead {
            color: #ffffff;
        }
        input[type='text'] {
            width: 400px;
            height: 50px;
            background-color: #333333;
            color: #ffffff;
            border: 1px solid #555555;
            padding: 10px;
        }
        input[type='text']::placeholder {
            color: #bbbbbb;
        }
        .btn-primary {
            background-color: #1a73e8;
            border-color: #1a73e8;
            color: #ffffff;
        }
        .btn-primary:hover {
            background-color: #1558b0;
            border-color: #1558b0;
        }
        .CategoryTableDiv {
            margin-top: 20px;
        }
        .CategoryTable {
            width: 100%;
            border-collapse: collapse;
            background-color: #1e1e1e;
            color: #ffffff;
        }
        .CategoryTable th, .CategoryTable td {
            padding: 12px;
            border: 1px solid #444444;
            text-align: left;
        }
        .CategoryTable th {
            background-color: #333333;
        }
        .CategoryTable tr:nth-child(even) {
            background-color: #2a2a2a;
        }
        .CategoryTable tr:hover {
            background-color: #444444;
        }
        .btndanger {
          padding: 5px 12px;
            background-color: #e74c3c;
            border-color: #e74c3c;
            color: #ffffff;
        }

         .btndanger:hover {
            background-color: #c0392b;
            border-color: #c0392b;
            color: gold;
         }

    </style>
  </head>
  <body>
    @include('admin.header')

    @include('admin.sidebar')
   
    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">
                <form action="{{url('add_category')}}" method="POST" class="AddCateforyForm">
                    @csrf
                    <h2 class="CateforyFormHead">Add Category</h2>
                    <div class="CateforyFormInput">
                        <input type="text" name="category" placeholder="Enter category name">
                        <input class="btn btn-primary" type="submit" value="Add Category">
                    </div>
                </form>

                <br><br>

                <div class="CategoryTableDiv">
                    <table class="CategoryTable">
                        <tr>
                            <th>ID</th>
                            <th>Category Name</th>
                            <th>Created At</th>
                             <th>Action</th>
                        </tr>
                        @foreach ($data as $data)
                        <tr>
                            <td>{{$data->id}}</td>
                            <td>{{$data->category_name}}</td> 
                            <td>{{$data->created_at}}</td> 
                            <td >
                            <a  href="{{url('edit_category', $data->id)}}"><button class="btn btn-success">Edit</button></a>
                              <a  href="{{url('delete_category', $data->id)}}" onclick="confirmation(event)"><button class="btn btn-danger">Delete</button></a>
                            </td> 
                        </tr>
                        @endforeach
                    </table>
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


    <!-- sweetalert -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script type="text/JavaScript">
        function confirmation(ev) {
          ev.preventDefault();
          var urlToRedirect = ev.currentTarget.getAttribute('href'); 
           console.log(urlToRedirect);

              swal({
                  title: "Are you sure you want to delete this?",
                  text: "This delete will be permanent.",
                  icon: "warning",
                  buttons: true,
                  dangerMode: true,
              })
              .then((willDelete) => {
                  if (willDelete) {
                      window.location.href = urlToRedirect;
                  }
              });
          }

    </script>
  </body>
</html>
