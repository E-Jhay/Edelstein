<?php

namespace App\Http\Controllers;

use App\Order;
use App\Product;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('is_admin', ['except' => ['destroy', 'checkout']]);
    }
    public function index()
    {
        $admin = Auth::user();
        $products = Product::all();
        $accounts = User::all();
        $orders = Order::all();
        $pending_orders = Order::where('status', 'pending')->get();
        $month = date('m');
        $released_orders = Order::where('status', 'process')
            ->whereMonth('created_at', $month)
            ->get();
        $earnings = $released_orders->sum('total_price');
        // foreach ($released_orders as $released_order) {
        //     $quantity = $released_order->quantity;
        //     $price = $released_order->product->regular_price;
        //     $ammount = $quantity * $price;
        //     $earnings = $earnings + $ammount;
        // }
        // return $earnings;
        return view('admin.dashboard', compact('admin', 'products', 'accounts', 'orders', 'pending_orders', 'earnings', 'released_orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
