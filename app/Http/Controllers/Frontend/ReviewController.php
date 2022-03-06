<?php

namespace App\Http\Controllers\Frontend;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Order;
use App\Models\Review;
use App\Models\Rating;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function add(Request $request, $product_slug){
        // $product_check=Product::where('slug',$product_slug)->where('status','0')->first();
        
        $product_id=$request->input('product_id');
        $product_check=Product::where('id',$product_id)->where('status','0')->first();

        if ($product_check){
            $verified_purchase=Order::where('orders.user_id',Auth::id())
             ->join('order_items','orders.id','order_items.order_id')
                ->where('order_items.prod_id',$product_id)->get();
            return view('frontend.reviews.index',compact('product_check','verified_purchase'));
        }
        else
        {
            return redirect()->back()->with('status','The link you followed was broken');
        }
    }

    public function create(Request $request){
        $product_id=$request->input('id');
        $product=Product::where('name',$product_id)->where('status','0')->first();
        if ($product){
            $user_review=$request->input('user_review');
            $new_review=Review::create([
                'user_id'=>Auth::id(),
                'prod_id'=>$product_id,
                'user_review'=>$user_review
            ]);
            $category_slug=$product->slug;
            $prod_slug=$product->name;
            if($new_review){
                return redirect('/')->with('status','Thanks for the review');
                
            }
        }
        else{
            return redirect('/')->with('status','Link Broken');
        }
    }
}
