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

        return view('home.index',compact('product'));
    }

    public function login_home()
    {
        //variable = model::send all()
        $product = Product::all();

        return view('home.index',compact('product'));
    }

    public function product_details($id)
    {

        $data = Product::find($id);
        return view('home.product_details',compact('data'));
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

        return  redirect()->back();
    }

    

}
