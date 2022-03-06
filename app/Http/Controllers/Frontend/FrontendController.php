<?php

namespace App\Http\Controllers\Frontend;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

use App\Models\Product;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Rating;
use App\Models\Review;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){
        $featured_products=Product::where('trending','1')->take(15)->get();
        $category=Category::where('popular','1')->take(15)->get();
        return view('frontend.index',compact('featured_products','category'));
    }

    public function category(){
        $category=Category::where('status','0')->get();
        return view('frontend.category',compact('category'));
    }

    public function viewcategory($slug){
        if (Category::where('slug',$slug)->exists())
        {
            $category=Category::where('slug',$slug)->first();
            $prod=Product::where('cate_id',$category->id)->where('status','0')->get();
            return view('frontend.products.index', compact('category','prod'));
        }
        return redirect('/')->with('status',"Slug doesn't exist");
    }
    public function viewcart(){
        return view('frontend.cart');
    }
    public function productview($cate_slug, $prod_name){
        if (Category::where('slug',$cate_slug)->exists())
        {
            if (Product::where('name',$prod_name)->exists()){
                $products=Product::where('name',$prod_name)->first();
                $ratings=Rating::where('prod_id',$products->id)->get();
                $ratings_sum=Rating::where('prod_id',$products->id)->sum('stars_rated');
                $user_rating=Rating::where('prod_id',$products->id)->where('user_id',Auth::id())->first();
                if($ratings->count() > 0){
                    $rating_value= $ratings_sum/$ratings->count();
                }
                else{
                    $rating_value= 0;
                }
                
                return view('frontend.products.view',compact('products','ratings','rating_value','user_rating'));
            }
            else{
                return redirect('/')->with('status',"The link was broken");
            }
        }
        else
        {
            return redirect('/')->with('status',"No such category found");
        }
    }
}

