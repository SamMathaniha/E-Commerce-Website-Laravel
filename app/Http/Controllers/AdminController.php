<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Flasher\Toastr\Prime\ToastrInterface;

class AdminController extends Controller
{
    public function view_category()
    {
        return view('admin.category');
    }
    
    public function add_category(Request $request)
    {
        $category = new Category;
        //$AssignedVariable->columnName = $requestVariable -> InputFieldsName 
        $category->category_name = $request-> category;
        $category-> save();

        toastr()->timeOut(5000)->closeButton()->success('Category Added Successfully...');

        return redirect()->back();
    }
}
