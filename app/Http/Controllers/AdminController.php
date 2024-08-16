<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Order;
use Barryvdh\DomPDF\Facade\Pdf;

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

        //message
        toastr()->timeOut(5000)->closeButton()->success('Category Deleted Successfully!!!');

        return redirect()->back();
       
    }

    public function edit_category($id)
    {
        $data = Category::find($id);

        return view('admin.edit_category',compact('data'));
    }

    public function update_category(Request $request,$id)
    {
        $data = Category::find($id);
        $data->category_name = $request->category;
        $data->save();
        //message
        toastr()->timeOut(5000)->closeButton()->success('Category Updated Successfully!!!');
        return redirect('/view_category');
    }

    public function add_product()
    {
        $category = Category::all();

        return view('admin.add_product', compact('category'));
        
    }
                    //For the post methods we add Request like this
    public function upload_product(Request $request)
    {
        
        $data = new Product;
       
        $data->title = $request-> title;
        $data->description = $request-> description;
        $data->price = $request-> price;
        $data->category = $request-> category;
        $data->quantity = $request-> quantity;

        //A variable = requestVariable assign to -> InputName
        $image = $request->image;
        if($image)  //if the image is available 
        {
            //a variable = timeFunction  assignVariable ->method which represents a file that has been uploaded via a form submission.
            $imagename = time().'.'.$image->getClientOriginalExtension();

            //Assignedvariable->coloumName->move the image to products file [this will be in the public folder], assigned variable
            $request->image->move('products',$imagename);             //in here Products folder will create automatically 
            
            //Assigned variable -> coloumName = AssignedVariable
            $data->image = $imagename;
        }

        $data-> save();

        toastr()->timeOut(5000)->closeButton()->success('Product Added Successfully');

        return redirect()->back();
       
        
    }


    public function view_product()
    {
        //Variable = Model::pagination shows only the number of products [all() -> this takes all the data]
        $data = Product::paginate(5);
        return view('admin.view_product', compact('data'));
    }

    public function delete_product($id)
    {
        $data = Product::find($id);

        //variable =  the path of the folder . Getting the ColoumName
        $image_path = public_path('products/'. $data->image);

        if(file_exists($image_path))
        {
            //delete the image by its filename 
            unlink($image_path);
        }

        $data->delete();

        //message
        toastr()->timeOut(5000)->closeButton()->success('Product Deleted Successfully!!!');

        return redirect()->back();
       
    }

    public function update_product($id)
    {
        $data = Product::find($id);

        $category = Category::all();

        return view('admin.update_page',compact('data','category'));
    }

    public function edit_product(Request $request,$id)
    {
 
        $data = Product::find($id);
        $data->title = $request-> title;
        $data->description = $request-> description;
        $data->price = $request-> price;
        $data->category = $request-> category;
        $data->quantity = $request-> quantity;

        //A variable = requestVariable assign to -> InputName
        $image = $request->image;
        if($image)  //if the image is available 
        {
            //a variable = timeFunction  assignVariable ->method which represents a file that has been uploaded via a form submission.
            $imagename = time().'.'.$image->getClientOriginalExtension();

            //Assignedvariable->coloumName->move the image to products file [this will be in the public folder], assigned variable
            $request->image->move('products',$imagename);             //in here Products folder will create automatically 
            
            //Assigned variable -> coloumName = AssignedVariable
            $data->image = $imagename;
        }



        $data->save();
        //message
        toastr()->timeOut(5000)->closeButton()->success('Category Updated Successfully!!!');
        return redirect('/view_product');
    }


    public function product_search(Request $request)
    {
        //Variable = RequestVariable -> inputNameInTheForm
        $search = $request->search;

        //The variable thats inside the view form form [$data as $datas] = Model::where(search) -> pagination (if u use pagination use it)
        $data = Product::where('title','LIKE','%'.$search.'%') -> paginate(5);

        return view ('admin.view_product',compact('data'));
    }



    public function view_orders()
    {
        $data = Order::all();
        return view('admin.order',compact('data'));
    }


    public function on_the_way($id)
    {
        //Finding with the id 
        $data= Order::find($id);
        $data->status = 'On the way';  //changing the status
        $data->save();                 //save it

        toastr()->timeOut(5000)->closeButton()->success('Order status Updated !!');
        return redirect('/view_orders'); // return to this location

    }
    
    public function order_delivered($id)
    {
        $data= Order::find($id);
        $data->status = 'Delivered';
        $data->save();
        toastr()->timeOut(5000)->closeButton()->success('Order status Updated !!');
        return redirect('/view_orders'); 
    }
    public function print_pdf($id)
    {
        $data = Order::find($id);

        $pdf = Pdf::loadView('admin.invoice',compact('data'));
        return $pdf->download('invoice.pdf');
    }


}
