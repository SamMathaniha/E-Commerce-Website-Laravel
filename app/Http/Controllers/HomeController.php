<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('admin.index');
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

        toastr()->timeOut(5000)->closeButton()->success('Product added to Cart Successfully!!!');

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
    

}
