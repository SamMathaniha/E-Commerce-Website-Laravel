<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Flasher\Toastr\Prime\ToastrInterface;

class AdminController extends Controller
{
    public function view_category()
    {
        //Variable = Model:: [all() -> this takes all the data]
        $data = Category::all();
        return view('admin.category', compact('data'));
    }
    
    public function add_category(Request $request)
    {
        $category = new Category;
        //$AssignedVariable->columnName = $requestVariable -> InputFieldsName 
        $category->category_name = $request-> category;
        $category-> save();

        toastr()->timeOut(5000)->closeButton()->success('Category Deleted Successfully');

        return redirect()->back();
    }

    public function delete_category($id)
    {
        $data = Category::find($id);
        $data->delete();
        toastr()->timeOut(5000)->closeButton()->success('Category Deleted Successfully!!!');
        return redirect()->back();
       
    }

}
