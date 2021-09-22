<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    public function index()
    {
        $data = Product::all();
        return view('product', [
            'products' => $data
        ]);
    }

    public function detail($id)
    {
        $data = Product::find($id);
        return view('detail', [
            'product' => $data
        ]);
    }

    public function addToCart(Request $req)
    {
        if($req->session()->has('user')){
          $cart = new Cart();
          $cart->user_id = $req->session()->get('user')['id'];
          $cart->product_id = $req->product_id;
          $cart->save();
          return redirect('/');
        }else{
            return redirect('/login');
        }
    }

    static public function cartItem()
    {
        $user_id = Session::get('user')['id'];
        return Cart::where('user_id', $user_id)->count();
    }

    public function cartList()
    {
        $user_id = Session::get('user')['id'];
        $products = DB::table('cart')
            ->join('products', 'cart.product_id', '=', 'products.id')
        ->where('cart.user_id', $user_id)
        ->select('products.*', 'cart.id as cart_id')
        ->get();

        return view('cartlist', ['products' => $products]);
    }

    public function removeCart($id)
    {
        Cart::destroy($id);
        return redirect('/');
    }

    public function orderNow()
    {
        $user_id = Session::get('user')['id'];
        $totalPrice = DB::table('cart')
            ->join('products', 'cart.product_id', '=', 'products.id')
            ->where('cart.user_id', $user_id)
            ->sum('products.price');

        return view('ordernow', ['totalPrice' => $totalPrice]);
    }
}
