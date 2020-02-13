<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Model\Admin\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function category(){
        $category = Category::all();
        return view('admin.category.category',compact('category'));
    }

    public function storecategory(Request $request){
        $validatedData = $request->validate([
            'category_name' => 'required|unique:categories|max:55',
        ]);
        //DB Query
        // $data = array();
        // $data['category_name']=$request->category_name;
        // DB::table('categories')->insert($data);

        //Using Model
        $category = new Category();
        $category->category_name = $request->category_name;
        $category->save();
        $notification=array(
            'messege'=>'Category Inserted',
            'alert-type'=>'success'
             );
           return Redirect()->back()->with($notification);
    }
    public function deletecategory($id){
        DB::table('categories')->where('id',$id)->delete();
        $notification=array(
            'messege'=>'Category Successfully Deleted',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }
    public function editcategory($id){
        $category=DB::table('categories')->where('id',$id)->first();
        return view('Admin.Category.edit_category',compact('category'));
    }
    
    public function updatecategory(Request $request,$id){
        $validatedData = $request->validate([
            'category_name' => 'required|unique:categories|max:55',
        ]);
        $data = array();
        $data['category_name']=$request->category_name;
        $update=DB::table('categories')->where('id',$id)->update($data);

        if($update){
            $notification=array(
                'messege'=>'Successfully Category Updated',
                'alert-type'=>'success'
                 );
               return Redirect()->route('categories')->with($notification);
        }
        else{
            $notification=array(
                'messege'=>'Nothing to update',
                'alert-type'=>'success'
                 );
               return Redirect()->route('categories')->with($notification);
        }
    }
}
