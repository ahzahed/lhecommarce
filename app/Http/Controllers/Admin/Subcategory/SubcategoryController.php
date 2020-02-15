<?php

namespace App\Http\Controllers\Admin\Subcategory;

use App\Http\Controllers\Controller;
use App\Model\Admin\Category;
use App\Model\Admin\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubcategoryController extends Controller
{
    public function subcategory(){
        $category = Category::all();
        $subcategory = DB::table('subcategories')
            ->join('categories','subcategories.category_id','categories.id')
            ->select('subcategories.*','categories.category_name')
            ->get();
        return view('admin.subcategory.subcategory',compact('category','subcategory'));
    }
    public function storesubcategory(Request $request){
        $validatedData = $request->validate([
            'subcategory_name' => 'required|unique:subcategories|max:55',
            'category_id' => 'required',
        ]);
        $data = array();
        $data['category_id']=$request->category_id;
        $data['subcategory_name']=$request->subcategory_name;
        DB::table('subcategories')->insert($data);

        $notification=array(
            'messege'=>'Sub-Category Inserted',
            'alert-type'=>'success'
             );
           return Redirect()->back()->with($notification);
    }
    public function deletesubcategory($id){
        DB::table('subcategories')->where('id',$id)->delete();
        $notification=array(
            'messege'=>'Category Successfully Deleted',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }
    public function editsubcategory($id){
        $subcategory=DB::table('subcategories')->where('id',$id)->first();
        $category = Category::all();
        return view('Admin.Subcategory.edit_subcategory',compact('subcategory','category'));
    }
    
    public function updatesubcategory(Request $request,$id){
        $data = array();
        $data['category_id']=$request->category_id;
        $data['subcategory_name']=$request->subcategory_name;
        $update=DB::table('subcategories')->where('id',$id)->update($data);
            $notification=array(
                'messege'=>'Successfully Sub-Category Updated',
                'alert-type'=>'success'
                 );
               return Redirect()->route('subcategories')->with($notification);
    }
}
