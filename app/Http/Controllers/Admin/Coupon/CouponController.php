<?php

namespace App\Http\Controllers\Admin\Coupon;

use App\Http\Controllers\Controller;
use Cart;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CouponController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function coupon(){
        $coupon = DB::table('coupons')->get();
        return view('admin.coupon.coupon',compact('coupon'));
    }
    public function StoreCoupon(Request $request){
        $validatedData = $request->validate([
            'coupon' => 'required|unique:coupons|max:55',
        ]);
        $data = array();
        $data['coupon']=$request->coupon;
        $data['discount']=$request->discount;
        DB::table('coupons')->insert($data);
        $notification=array(
            'messege'=>'Category Inserted',
            'alert-type'=>'success'
             );
           return Redirect()->back()->with($notification);
    }
    public function deleteCoupon($id){
        DB::table('coupons')->where('id',$id)->delete();
        $notification=array(
            'messege'=>'Coupon Successfully Deleted',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }
    public function editCoupon($id){
        $coupon=DB::table('coupons')->where('id',$id)->first();
        return view('admin.coupon.edit_coupon',compact('coupon'));
    }

    public function updateCoupon(Request $request,$id){
        $data = array();
        $data['coupon']=$request->coupon;
        $data['discount']=$request->discount;
        $update=DB::table('coupons')->where('id',$id)->update($data);
        $notification=array(
            'messege'=>'Successfully Coupon Updated',
            'alert-type'=>'success'
                );
            return Redirect()->route('coupons')->with($notification);
    }

    public function userCoupon(Request $request)
    {
        $coupon=$request->coupon;
        $check=DB::table('coupons')->where('coupon',$coupon)->first();
        if ($check) {
              session::put('coupon',[
                  'name' => $check->coupon,
                  'discount' => $check->discount,
                  'balance' => Cart::Subtotal() - $check->discount
              ]);
              $notification=array(
                              'messege'=>'Successfully Coupon Applied',
                               'alert-type'=>'success'
                         );
            return redirect()->back()->with($notification);
        }else{
            $notification=array(
                              'messege'=>'Invalid Coupon',
                               'alert-type'=>'error'
                         );
            return redirect()->back()->with($notification);
        }

    }

    public function removeCoupon(){
        session::forget('coupon');
        return redirect()->back();
    }


}
