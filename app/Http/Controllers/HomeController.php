<?php

namespace App\Http\Controllers;

use App\Models\Product;
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

}
