<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // $user = User::all()->count();  //this to get all the users.
        
        $user = User::where('usertype','user')->get()->count(); // this to get only user using userType without admin count

        //products
        $product = Product::all()->count(); 

        //orders
        $order = Order::all()->count(); 

        //delivered

        $orderDelivered = Order::where('status','Delivered')->get()->count();

        
        return view('admin.index',compact('user','product','order','orderDelivered'));
    }

    public function home()
    {
        //variable = model::send all()
        $product = Product::all();

        if (Auth::id())
        {
            $user = Auth::user();
            $userid = $user->id; // from the user getting the user id
            
            $count = Cart::where('user_id', $userid)->count(); 
    
        }
        else 
        {
            $count = '';
        }

      
        return view('home.index',compact('product','count'));
    }

    public function login_home()
    {
        //variable = model::send all()
        $product = Product::all();

        if (Auth::id())
        {
            $user = Auth::user();
            $userid = $user->id; // from the user getting the user id
            
            $count = Cart::where('user_id', $userid)->count(); 
    
        }
        else 
        {
            $count = '';
        }

        return view('home.index',compact('product','count'));
    }

    public function product_details($id)
    {

        $data = Product::find($id);
        //to get the count of the cart
    
        if (Auth::id())
        {
            $user = Auth::user();
            $userid = $user->id; // from the user getting the user id
            
            $count = Cart::where('user_id', $userid)->count(); 
    
        }
        else 
        {
            $count = '';
        }

        return view('home.product_details',compact('data','count'));
    }

    public function add_cart($id)
    {
        // product id will already on it
       $product_id = $id;

       // in here we are getting all the details of logged in user and storing in the variable
       $user = Auth::user();

        //getting the user id
       $user_id = $user->id;

       
        $data = new Cart;           // variable = model
        $data->user_id = $user_id ;  // variable -> ColumnName = user_idVariable 
        $data->product_id = $product_id ;  // variable -> ColumnName = product_idVariable 
        $data->save(); 

        toastr()->timeOut(5000)->closeButton()->success('Product added to the cart !!!');

        return  redirect()->back();
    }

    public function mycart()
    {
        if (Auth::id())
        {
            $user = Auth::user();
            $userid = $user->id; // from the user getting the user id
            
            $count = Cart::where('user_id', $userid)->count(); 

            // to get the details.. we aleardy got some in above 3lines
           
            $cart = Cart::where('user_id',$userid)->get(); //get function
    
        }
        else 
        {
            $count = '';
        }
        return view ('home.mycart',compact('count','cart'));
    }


    public function remove_cartProduct($id)
    {
        $cart = Cart::find($id);
        $cart->delete();

        toastr()->timeOut(5000)->closeButton()->success('Product Successfully removed from cart!!!');

        return redirect()->back();
    }

    public function confirm_order(Request $request)
    {
        //variable = requestVariable -> name(get input field name what user inserted/ in the textbox)
         $name = $request->name;
         $address = $request->address;
         $phone = $request->phone;

         
        //get the current users id
         $userid = Auth::user()->id;
         $cart = Cart::where('user_id', $userid)->get(); // using that get all the details of the user


        foreach($cart as $carts)
        {
            $order = new Order();

            //Variable->column name = Assigned variable above
            $order->name= $name;
            $order->rec_address= $address;
            $order->phone= $phone;
            $order->user_id = $userid;
            $order->product_id =  $carts-> product_id;
            $order->save();
 
        }

        //after order placed the cart listed items should get delete
        $cart_remove = Cart::where('user_id',$userid)->get();

        foreach($cart_remove as $remove)
        {
            $data = Cart::find($remove->id);
            $data->delete();
        }

        toastr()->timeOut(5000)->closeButton()->success('Order Placed Successfully');


        return redirect()->back();
        
    }

    

}
