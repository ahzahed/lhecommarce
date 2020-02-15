<?php

namespace App\Http\Controllers\Admin\Newslater;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewslaterController extends Controller
{
    public function StoreNewslater(Request $request){
        $validatedData = $request->validate([
            'email' => 'required|unique:newslaters|max:55',
        ]);

        $data = array();
        $data['email']=$request->email;
        DB::table('newslaters')->insert($data);
        $notification=array(
            'messege'=>'Thanks for Subscription',
            'alert-type'=>'success'
             );
           return Redirect()->back()->with($notification);
    }

    public function Newslater(){
        $newslater=DB::table('newslaters')->get();
        return view('admin.newslater.newslater',compact('newslater'));
    }
    
    public function deleteNewslater($id){
        DB::table('newslaters')->where('id',$id)->delete();
        $notification=array(
            'messege'=>'Subscriber Deleted',
            'alert-type'=>'success'
             );
           return Redirect()->back()->with($notification);
    }
}
