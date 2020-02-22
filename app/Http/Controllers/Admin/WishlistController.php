<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class WishlistController extends Controller
{
    public function AddWishlist($id){
          $userid=Auth::id();
          $check=DB::table('wishlists')->where('user_id',$userid)->where('product_id',$id)->first();

          $data = array(
              'user_id' =>$userid,
              'product_id' =>$id
            );

          if(Auth::check()){
              if($check){
                return \Response::json(['error'=>'Already has your wishlist']);
                // $notification=array(
                //     'messege'=>'Already has your wishlist',
                //     'alert-type'=>'error'
                //         );
                // return Redirect()->back()->with($notification);
              }else{
                  DB::table('wishlists')->insert($data);
                  return \Response::json(['success'=>'Product added on wishlist']);
                //   $notification=array(
                //     'messege'=>'Add to wishlist',
                //     'alert-type'=>'success'
                //         );
                // return Redirect()->back()->with($notification);
              }
          }else{
            return \Response::json(['error'=>'At first log in your account']);
            // $notification=array(
            //     'messege'=>'At first log in your account',
            //     'alert-type'=>'warning'
            //         );
            // return Redirect()->back()->with($notification);
          }
    }
}
