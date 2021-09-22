<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
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

    public function orderPlace(Request $req){
        $user_id = Session::get('user')['id'];
        $allCart = Cart::where('user_id', $user_id)->get();
        foreach ($allCart as $cart){
           $order = new Order();
           $order->product_id = $cart['product_id'];
           $order->user_id = $cart['user_id'];
           $order->status = 'pendding';
           $order->payment_method = $req->payment;
           $order->payment_status = 'pendding';
           $order->address = $req->address;
           $order->save();
           Cart::where('user_id', $user_id)->delete();
        };
        return redirect('/');
    }

    public function myOrders()
    {
        $user_id = Session::get('user')['id'];
        $orders = DB::table('orders')
            ->join('products', 'orders.product_id', '=', 'products.id')
            ->where('orders.user_id', $user_id)
            ->get();
        return view('myorders', [
            'orders' => $orders
        ]);
    }
}
