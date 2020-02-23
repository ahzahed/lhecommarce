<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Cart;
use Response;
use Gloudemans\Shoppingcart\Facades\Cart as FacadesCart;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function AddCart($id)
    {
    	  $product=DB::table('products')->where('id',$id)->first();
    	  $data=array();
    	  if ($product->discount_price == NULL) {
    	  	            $data['id']=$product->id;
    	                $data['name']=$product->product_name;
    	                $data['qty']=1;
    	                $data['price']= $product->selling_price;          
    	 				$data['weight']=1;
    	                $data['options']['image']=$product->image_one;
    	               Cart::add($data);
    	               return \Response::json(['success' => 'Successfully Added on your Cart']);
    	   }else{
    	                 $data['id']=$product->id;
    	                $data['name']=$product->product_name;
    	                $data['qty']=1;
    	                $data['price']= $product->discount_price;          
    	 				$data['weight']=1;
    	                $data['options']['image']=$product->image_one;   
    	                return response()->json($data);  
    	                Cart::add($data);  
						return \Response::json(['success' => 'Successfully Added on your Cart']);  
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

	public function ViewProduct($id)
    {
         $product=DB::table('products')
			->join('categories','products.category_id','categories.id')
			->join('subcategories','products.subcategory_id','subcategories.id')
			->join('brands','products.brand_id','brands.id')
			->select('products.*','categories.category_name','subcategories.subcategory_name','brands.brand_name')
			->where('products.id',$id)->first();

        $color=$product->product_color;
        $product_color = explode(',', $color);

        $size=$product->product_size;
        $product_size = explode(',', $size);
        
       // return response()->json($product_color);
        return response::json(array(
                'product' => $product,
                'color' => $product_color,
                 'size' => $product_size,
         ));

    }

    public function InsertCart(Request $request)
    {
         $id=$request->product_id;
          $product=DB::table('products')->where('id',$id)->first();
          $data=array();
          if ($product->discount_price == NULL) {
                        $data['id']=$product->id;
                        $data['name']=$product->product_name;
                        $data['qty']=$request->qty;;
                        $data['price']= $product->selling_price;          
                        $data['weight']=1;
                        $data['options']['image']=$product->image_one;
                        $data['options']['color']=$request->color;
                        $data['options']['size']=$request->size;
                      Cart::add($data);
                       $notification=array(
                              'messege'=>'Successfully Done',
                               'alert-type'=>'success'
                         );
                       return Redirect()->back()->with($notification);
           }else{
                       $data['id']=$product->id;
                        $data['name']=$product->product_name;
                        $data['qty']=$request->qty;;
                        $data['price']= $product->discount_price;          
                        $data['weight']=1;
                        $data['options']['image']=$product->image_one;  
                        $data['options']['color']=$request->color;
                        $data['options']['size']=$request->size;
                        Cart::add($data);  
                      $notification=array(
                              'messege'=>'Successfully Done',
                               'alert-type'=>'success'
                         );
                       return Redirect()->back()->with($notification);
         }
    }


}
