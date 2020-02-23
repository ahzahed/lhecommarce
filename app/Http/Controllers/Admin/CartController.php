<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Cart;
use Gloudemans\Shoppingcart\Facades\Cart as FacadesCart;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function AddCart($id)
    {
    	  $cart=DB::table('products')->where('id',$id)->first();
    	  $data=array();
    	  if ($cart->discount_price == NULL) {
    	  	            $data['id']=$cart->id;
    	                $data['name']=$cart->product_name;
    	                $data['qty']=1;
    	                $data['price']= $cart->selling_price;          
    	 				$data['weight']=1;
						$data['options']['image']=$cart->image_one;
						$data['options']['color']='';
						$data['options']['size']='';
    	               Cart::add($data);
    	               return response()->json(['success' => 'Successfully Added on your Cart']);
    	   }else{
    	                 $data['id']=$cart->id;
    	                $data['name']=$cart->product_name;
    	                $data['qty']=1;
    	                $data['price']= $cart->discount_price;          
    	 				$data['weight']=1;
						$data['options']['image']=$cart->image_one;
						$data['options']['color']='';
						$data['options']['size']='';   
    	                return response()->json($data);  
    	                Cart::add($data);  
    	              return response()->json(['success' => 'Successfully Added on your Cart']);   
    	 }
    }

    public function cartCheck()
    {
    	$content=Cart::content();
    	return response()->json($content);
	}
	
	public function showCart(){
		$cart = Cart::content();
		return view('pages.cart',compact('cart'));
	}

	public function removeCart($rowId){
		Cart::remove($rowId);
		return redirect()->back();
	}

	public function updateCart(Request $request){
		$rowId = $request->product_id;
		$qty = $request->qty;
		Cart::update($rowId,$qty);
		return redirect()->back();

	}

}
