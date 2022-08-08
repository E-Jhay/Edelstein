<?php

namespace App\Http\Controllers;

use App\Category;
use App\Order;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('is_admin');
    }
    public function index()
    {
        $categories = Category::all();
        $products = Product::all();
        return view('admin.products', compact('products', 'categories'));
    }

    // public function search(Request $request)
    // {
    //     $search = $request->search;
    //     $products = Product::where('name', 'like', '%' . $search . '%')->get();
    //     return view('customer.shop')->with('search_products', $products);
    // }
    // public function fetchData()
    // {
    //     $users = User::all();
    //     return response()->json([
    //         'users' => $users,
    //     ]);
    // }

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
        $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'description' => ['string'],
            'regular_price' => ['required', 'numeric'],
            'sale_price' => 'numeric',
            'quantity' => 'required|numeric',
            'category' => 'required',
            'condition' => 'required|in:new,default,hot',
            'image1' => ['image', 'mimes:jpg,png,jpeg,gif,svg'],
            'image2' => ['image', 'mimes:jpg,png,jpeg,gif,svg']
        ]);
        // dd($request->image1->getClientOriginalName());
        if ($request->hasFile('image1')) {
            $file_extention1 = $request->image1->getClientOriginalExtension();
            $file_name1 = time() . rand(99, 999) . "-product-image." . $file_extention1;
            $request->image1->storeAs('public/images', $file_name1);
        } else
            $file_name1 = 'logo_large.png';

        if ($request->hasFile('image2')) {
            $file_extention2 = $request->image2->getClientOriginalExtension();
            $file_name2 = time() . rand(99, 999) . "-product-image." . $file_extention2;
            $request->image2->storeAs('public/images', $file_name2);
        } else
            $file_name2 = 'logo_large.png';
        $product = new Product;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->regular_price = $request->regular_price;
        $product->quantity = $request->quantity;
        $product->category_id = $request->category;
        $product->condition = $request->condition;
        $product->image1 = $file_name1;
        $product->image2 = $file_name2;

        // return $request->file('image1')->storeAs();
        $product->save();
        return back()->with('success', 'Product Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        // $order = Order::where('product_id', $id)->get();
        return view('admin.show-product', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all();
        $product = Product::find($id);
        return view('admin.edit-product', compact('product', 'categories'));
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
        $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'description' => ['string'],
            'regular_price' => ['required', 'numeric'],
            'sale_price' => 'numeric',
            'quantity' => 'numeric',
            'category' => 'required',
            'image1' => ['image', 'mimes:jpg,png,jpeg,gif,svg'],
            'image2' => ['image', 'mimes:jpg,png,jpeg,gif,svg']

        ]);
        $product = Product::find($id);
        if ($request->hasFile('image1')) {
            $file_extention1 = $request->image1->getClientOriginalExtension();
            $file_name1 = time() . rand(99, 999) . "-product-image." . $file_extention1;
            $request->image1->storeAs('public/images', $file_name1);
        } else
            $file_name1 = $product->image1;

        if ($request->hasFile('image2')) {
            $file_extention2 = $request->image2->getClientOriginalExtension();
            $file_name2 = time() . rand(99, 999) . "-product-image." . $file_extention2;
            $request->image2->storeAs('public/images', $file_name2);
        } else
            $file_name2 = $product->image2;

        $product->name = $request->name;
        $product->description = $request->description;
        $product->regular_price = $request->regular_price;
        $product->quantity = $request->quantity;
        $product->category_id = $request->category;
        $product->image1 = $file_name1;
        $product->image2 = $file_name2;

        // return $request->file('image1')->storeAs();
        $product->save();
        return redirect('/product')->with('success', 'Product Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect('/product')->with('success', 'Product Deleted');
    }
}
