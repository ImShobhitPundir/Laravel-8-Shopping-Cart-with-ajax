<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class HomeController extends Controller
{
    public function index(){
        //$products = json_decode(file_get_contents('https://fakestoreapi.com/products'), true);
        $products = HTTP::get("https://fakestoreapi.com/products");
        $products = json_decode($products);
        $cart_list = \Cart::getContent();
        $cart_total = \Cart::getTotal();
        $cart_quantity = \Cart::getTotalQuantity();
        $data = [
            'products' => $products,
            'cart_list'=>$cart_list,
            'cart_total'=>$cart_total,
            'cart_quantity'=>$cart_quantity
        ];
        return view('home',$data);
        
    }
    public function add_to_cart(Request $request){
        $product_details = HTTP::get("https://fakestoreapi.com/products/".$request->product_id);
        $product_details = json_decode($product_details);

        \Cart::add(array(
            'id' => $request->product_id,
            'name' =>  $product_details->title,
            'price' =>  $product_details->price,
            'quantity' => 1,
            'attributes' => array(
                'image'=>$product_details->image,
            ),
            'associatedModel' => ''
        ));
        $cart_list = \Cart::getContent();
        $cart_total = \Cart::getTotal();
        $data = [
            'cart_list'=>$cart_list,
            'cart_total'=>$cart_total
        ];
        return view('cart_dropdown',$data);        
    }
    public function cart(){
        $cart_list = \Cart::getContent();
        $cart_total = \Cart::getTotal();
        $cart_quantity = \Cart::getTotalQuantity();
        $data = [
            'cart_list'=>$cart_list,
            'cart_total'=>$cart_total,
            'cart_quantity'=>$cart_quantity
        ];
        return view('cart',$data); 
    }

    public function checkout(Request $request){
        \Cart::clear();
        $request->session()->flash('status','Payment is Processed');
        return redirect('/home');
    }
  
   
}
