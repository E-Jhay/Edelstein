<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Order;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\Datatables\Datatables;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('is_admin', ['except' => ['destroy', 'checkout', 'store', 'update']]);
    }
    public function index()
    {
        return view('admin.orders');
    }

    public function getAllOrders()
    {
        return Datatables::of(Order::query())->make(true);
    }
    public function pendingOrder()
    {
        $pending_orders = Order::where('status', 'pending')->get();
        return view('admin.pending-orders')->with('pending_orders', $pending_orders);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        // return $request;
        $request->validate([
            'shipping_address' => 'required|string',
            'payment_method' => 'required|in:cod,paypal'
        ]);
        $prodid = $request->prodid;
        foreach ($prodid as $key => $value) {
            $order = new Order;
            $order->user_id = Auth::user()->id;
            $order->product_id = $request->prodid[$key];
            $order->quantity = $request->quantity[$key];
            $order->total_price = $request->price[$key] - 2.99;
            $order->shipping_address = $request->shipping_address;
            $order->payment_method = $request->payment_method;
            $order->status = 'pending';
            $order->save();
        }
        return response()->json(['success' => 'Order Successful']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $pending_order = Order::find($id);
        $pending_order->status = 'process';
        $pending_order->save();

        return response()->json(['success' => 'Order Accepted']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // return response()->json(['success' => 'Order Declined']);
        $order = Order::find($id);
        $order->delete();
        if (Auth::user()->role == 'admin')
            return response()->json(['success' => 'Order Declined']);
        else
            return response()->json(['success' => 'Order Cancelled']);
    }

    public function checkout(Request $request)
    {
        // dd($request->all());
        if (empty($request->cart_id)){
            return \Redirect::back()->withErrors(['message' => 'Select an item to proceed to checkout']);
        }
        $checked_array = $request->cart_id;
        $quantity = array();
        $images = array();
        $product_name = array();
        $product_category = array();
        $total_price = array();
        $prodid = array();
        foreach ($request->prodname as $key => $value) {
            $cart = Cart::find($value);
            if (in_array($request->prodname[$key], $checked_array)) {
                $available = $cart->product->quantity - Order::where('product_id', $request->prodid[$key])->sum('quantity');
                if ($request->quantity[$key] <= $available) {
                    array_push($quantity, $request->quantity[$key]);
                    array_push($images, $cart->product->image1);
                    array_push($product_name, $cart->product->name);
                    array_push($prodid, $request->prodid[$key]);
                    array_push($product_category, $cart->product->category->category_name);
                    $temp_price = $request->quantity[$key] * $cart->price;
                    array_push($total_price, $temp_price);
                    // return response()->json(['success' => 'The Product ' . $cart->product->name . ' Insufficient']);
                } else {
                    return redirect('/cart_list')->with('error', 'Insufficient Item');
                }
            }
        }
        $shipping_fee = 2.99;
        $sub_total = 0;
        foreach ($total_price as $single_price) {
            $sub_total += $single_price;
        }
        $total_all = $sub_total - $shipping_fee;
        return view('customer.cart.checkout', compact('checked_array', 'quantity', 'images', 'product_name', 'product_category', 'total_price', 'prodid', 'sub_total', 'total_all', 'shipping_fee'));
        // $checked_array = $request->cart_id;
        // $quantity = array();
        // foreach ($request->prodname as $key => $value) {
        //     $cart = Cart::find($value);
        //     if (in_array($request->prodname[$key], $checked_array)) {
        //         array_push($quantity, $request->quantity[$key]);
        //     } else {
        //         return $request;
        //     }
        // }
    }
}
