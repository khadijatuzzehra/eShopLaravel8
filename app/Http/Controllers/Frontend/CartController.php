<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
class CartController extends Controller
{
    public function addProduct(Request $request){
        $cart=new Cart();
        $user_id=Auth::id();
        $cart->prod_id=$request->input('product_id');
        $cart->user_id=$user_id;
        $cart->prod_qty=$request->input('qty');
        $cart->save();
        return redirect('/')->with('status',"Added Successfully");
        
    }
    public function viewcart(){
        $cartitems=Cart::where('user_id',Auth::id())->get();
        return view('frontend.cart',compact('cartitems'));
    }

    public function removeProd($id){
        $product=Cart::find($id);
        $product->delete();
        return redirect('cart')->with('status','Product Deleted from Cart');
    }
}
