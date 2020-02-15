<?php

namespace App\Http\Controllers\Admin\Brand;

use App\Http\Controllers\Controller;
use App\Model\Admin\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class BrandController extends Controller
{
    public function brand(){
        $brand = Brand::all();
        return view('admin.brand.brand',compact('brand'));
    }

    public function storebrand(Request $request){
        $validatedData = $request->validate([
            'brand_name' => 'required|unique:brands|max:55',
            'brand_logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:9048',
        ]);
        $data = array();
        $data['brand_name']=$request->brand_name;
        $image=$request->file('brand_logo');
        if($image){
            // $image_name = hexdec(uniqid());
            // $image_name = str_random(5);
            $image_name = date('d_m_y_H_s_i');
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path='public/media/brand/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            $data['brand_logo']=$image_url;
            DB::table('brands')->insert($data);
            $notification=array(
                'messege' => 'Successfully Post Inserted',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        }
        else{
            DB::table('brands')->insert($data);
            $notification=array(
                'messege' => 'Successfully Post Inserted',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        }
    }
    public function deletebrand($id){
        $data = DB::table('brands')->where('id',$id)->first();
        $image=$data->brand_logo;
        unlink($image);
        $brand=DB::table('brands')->where('id',$id)->delete();
            $notification=array(
                'messege'=>'Successfully Deleted',
                'alert-type'=>'success'
            );
        return Redirect()->back()->with($notification);
    }
    public function editbrand($id){
        $brand=DB::table('brands')->where('id',$id)->first();
        return view('Admin.Brand.edit_brand',compact('brand'));
    }
    public function updatebrand(Request $request, $id){
        $oldlogo=$request->old_logo;
        $data = array();
        $data['brand_name']=$request->brand_name;
        $image=$request->file('brand_logo');
        if($image){
            // $image_name = hexdec(uniqid());
            // $image_name = str_random(5);
            unlink($oldlogo);
            $image_name = date('d_m_y_H_s_i');
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path='public/media/brand/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            $data['brand_logo']=$image_url;
            $brand=DB::table('brands')->where('id',$id)->update($data);
            $notification=array(
                'messege' => 'Successfully Brand Updated',
                'alert-type' => 'success'
            );
            return Redirect()->route('brands')->with($notification);
        }
        else{
            DB::table('brands')->where('id',$id)->update($data);
            $notification=array(
                'messege' => 'Update without image',
                'alert-type' => 'success'
            );
            return Redirect()->route('brands')->with($notification);
        }
    }
}
