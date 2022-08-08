<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Order;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::where('user_id', Auth::user()->id)
            ->where('status', 'Waiting')
            ->get();
        return view('customer.cart.index')->with('orders', $orders);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addToCart(Request $request)
    {
        // dd($request->id);
        if ($user = Auth::user()) {
            $already_cart = Cart::where('user_id', $user->id)
                ->where('product_id', $request->id)->first();
            // return $already_cart;
            if ($already_cart) {
                // dd($already_cart);
                $already_cart->quantity = $already_cart->quantity + 1;
                $already_cart->amount = $already_cart->price + $already_cart->amount;
                // return $already_cart->quantity;
                if ($already_cart->product->quantity < $already_cart->quantity || $already_cart->product->quantity <= 0)
                    return response()->json(['error' => 'Stock not sufficient!.']);
                $already_cart->save();
            } else {
                $cart = new Cart;
                $product = Product::find($request->id);
                $cart->user_id = $user->id;
                $cart->product_id = $request->id;
                $cart->price = $product->regular_price;
                $cart->quantity = 1;
                $cart->amount = $cart->price * $cart->quantity;
                if ($cart->product->quantity < $cart->quantity || $cart->product->quantity <= 0)
                    return response()->json(['error' => 'Stock not sufficient!.']);
                $cart->save();
            }
            return response()->json(['success' => 'Item Added to Cart']);
        } else {
            return redirect('login');
        }
    }
    static function cartItem()
    {
        if ($user = Auth::user()) {
            $user_id = $user->id;
            return Cart::where('user_id', $user_id)->count();
        }
    }
    public function cartList()
    {
        $user = Auth::user();
        $cart_lists = Cart::where('user_id', $user->id)
            ->get();

        return view('customer.cart.cart-list', compact('cart_lists', 'user'));
    }

    public function destroy($id)
    {
        // dd($id);
        $cart = Cart::find($id);
        if ($cart) {
            $cart->delete();
            return response()->json(['success' => 'Item Deleted']);
        }
        return response()->json(['error' => 'Please try again']);
    }
}
