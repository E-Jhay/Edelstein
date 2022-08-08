<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;
use App\Product;
use App\User;
use Illuminate\Support\Facades\Auth;
// use Yajra\Datatables\Datatables;

class CustomerController extends Controller
{
    public function show_product($id)
    {
        $product = Product::find($id);
        return view('customer.show-product', compact('product'));
    }

    public function shop()
    {
        $products = Product::all();
        return view('customer.shop', compact('products'));
    }

    public function profile($id)
    {
        $account = User::find($id);
        return view('customer.profile')->with('account', $account);
    }

    public function editProfile($id)
    {
        $account = User::find($id);
        return view('customer.edit-profile')->with('account', $account);
    }

    public function dashboard()
    {
        $orders = Order::where('user_id', Auth::user()->id)->get();
        return view('customer.dashboard', compact('orders'));
    }

    // public function getOrders()
    // {
    //     return Datatables::of(Order::query())->make(true);
    // }
    // public function search(Request $request)
    // {
    //     if ($request->ajax()) {
    //         $output = '';
    //         $search = $request->get('search');
    //         if ($search != '') {
    //             $products = Product::where('name', 'like', '%' . $search . '%')
    //                 ->orWhere('description', 'like', '%' . $search . '%')
    //                 ->orWhere('regular_price', 'like', '%' . $search . '%')
    //                 ->orWhere('category', 'like', '%' . $search . '%')
    //                 ->orderBy('id', 'desc')
    //                 ->get();
    //         } else {
    //             $products = Product::orderBy('id', 'desc')->get();
    //         }
    //         $total_row = $products->count();
    //         if ($total_row > 0) {
    //             foreach ($products as $product) {
    //                 $output .= '
    //                     <div class="col-md-3 col-sm-6">
    //                     <div class="product-grid3">
    //                         <div class="product-image3">
    //                             <a href="/show-product">
    //                                 <img class="pic-1" src="{{url(" / storage / images / "' . $product->image1 . ')}}">
    //                                 <img class="pic-2" src="{{url(" / storage / images / "' . $product->image2 . ')}}">
    //                             </a>
    //                             <ul class="social">
    //                                 <li><a href="/show-product"><i class="fa fa-eye"></i></a></li>
    //                                 <li><a href="/cart"><i class="fa fa-shopping-cart"></i></a></li>
    //                             </ul>
    //                             <span class="product-new-label">New</span>
    //                         </div>
    //                         <div class="product-content">
    //                             <h3 class="title"><a href="/show-product">' . $product->name . '</a></h3>
    //                             <div class="price">
    //                                 ' . $product->regular_price . '
    //                                 <span>' . $product->sale_price . '</span>
    //                             </div>
    //                         </div>
    //                     </div>
    //                 </div>
    //                 ';
    //             }
    //         } else {
    //             $output = `<h1>No Products Available</h1>`;
    //         }
    //         $data = array(
    //             'products'  => $output,
    //             'total_products'  => $total_row
    //         );

    //         echo json_encode($data);
    //     }
    // }

    public function search(Request $request)
    {
        $search = $request->search;
        if ($search != '') {
            $products = Product::where('name', 'like', '%' . $search . '%')
                ->orWhere('description', 'like', '%' . $search . '%')
                ->orderBy('id', 'desc')
                ->get();
        } else {
            $products = Product::orderBy('id', 'desc')->get();
        }

        return view('customer.search')->with('products', $products);
    }
}
