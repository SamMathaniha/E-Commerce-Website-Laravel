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
            padding: 5px 12px;
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
            text-align: center;
            width: 100%;
            border-collapse: collapse;
            background-color: #1e1e1e;
            color: #ffffff;
        }
        .CategoryTable th, .CategoryTable td {
            padding: 12px;
            border: 1px solid #444444;
            text-align: center;
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

         .btnPrint {
          padding: 5px 12px;
          background-color: green;
          border-color: greenyellow;
            color: #ffffff;
        }

         .btnPrint:hover {
            background-color: greenyellow;
            border-color: green;
            color: black;
         }

    </style>
  </head>
  <body>
    @include('admin.header')

    @include('admin.sidebar')
   
    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">
             


                <div class="CategoryTableDiv">
                    <table class="CategoryTable">
                        <tr>
                           
                            <th>Name</th>
                            <th>Address</th>
                             <th>Phone</th>
                             <th>Product Name </th>
                             <th>Price
                             <th>Image</th>
                             <th>Status</th>
                             <th>Action</th>
                             <th>Print Record</th>
     
                        </tr>

                        @foreach($data as $orders)
                        <tr>
                           
                            <td>{{$orders->name}}</td>
                            <td>{{$orders->rec_address}}</td>
                            <td>{{$orders->phone}}</td>
                            <td>{{$orders->product->title}}</td>
                            <td>{{$orders->product->price}}</td>
                            <td>
                              <img height="80" width="150" src="/products/{{$orders->product->image}}">
                            </td>
                            <td>
                                @if($orders->status == 'in progress')
                                <span style="color:red">{{$orders->status}}</span>

                                @elseif($orders->status == 'On the way')
                                <span style="color:blue">{{$orders->status}}</span>

                                @else
                                <span style="color:green">{{$orders->status}}</span>

                                @endif
                            </td>
                            <td>
                                <a  href="{{url('on_the_way',$orders->id)}}"><button class="btndanger">On the Way</button></a>
                                <a  href="{{url('order_delivered',$orders->id)}}"><button class="btn-primary">Delivered</button></a>                                
                            </td>
                            <td>
                                <a  href="{{url('print_pdf',$orders->id)}}"><button class="btnPrint">Print</button></a>
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
