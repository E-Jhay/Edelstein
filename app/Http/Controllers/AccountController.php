<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('is_admin', ['except' => ['store', 'update']]);
    }
    public function index()
    {
        $accounts = User::orderBy('created_at', 'desc')->paginate(15);
        return view('admin.accounts', compact('accounts'));
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
        $request->validate([
            'full_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phone' => ['required', 'regex:/^(09)\d{9}$/'],
            'address' => ['required', 'max:255'],
            'image' => ['image', 'mimes:jpg,png,jpeg,gif,svg'],
            'role' => ['required', 'in:admin,customer']
        ]);

        if ($request->hasFile('image')) {
            $file_extention = $request->image->getClientOriginalExtension();
            $file_name = time() . rand(99, 999) . "-profile." . $file_extention;
            $request->image->storeAs('public/images', $file_name);
        } else
            $file_name = 'undraw_profile.svg';

        $account = new User;
        $account->full_name = $request->full_name;
        $account->email = $request->email;
        $account->password = Hash::make($request->password);
        $account->phone = $request->phone;
        $account->address = $request->address;
        $account->image = $file_name;
        $account->role = $request->role;

        $account->save();
        return back()->with('success', 'Account Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $account = User::find($id);
        return view('admin.show-account')->with('account', $account);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $account = User::find($id);
        return view('admin.edit-account')->with('account', $account);
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
            'full_name' => ['required', 'string', 'max:255'],
            'email' => "required|string|email|max:255|unique:users,email,$id",
            'phone' => ['required', 'regex:/^(09)\d{9}$/'],
            'address' => ['required', 'max:255'],
            'image' => ['image', 'mimes:jpg,png,jpeg,gif,svg']
        ]);
        $account = User::find($id);
        if ($request->hasFile('image')) {
            $file_extention = $request->image->getClientOriginalExtension();
            $file_name = time() . rand(99, 999) . "-profile." . $file_extention;
            $request->image->storeAs('public/images', $file_name);
        } else
            $file_name = $account->image;

        $account->full_name = $request->full_name;
        $account->email = $request->email;
        $account->phone = $request->phone;
        $account->address = $request->address;
        $account->image = $file_name;

        $account->save();
        if (Auth::user()->role == "customer")
            return redirect('/profile/' . $id)->with('success', 'Account Updated');
        else
            return redirect('/account')->with('success', 'Account Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $account = User::find($id);
        $account->delete();
        return redirect('/account')->with('success', 'Account Deleted');
    }
}
