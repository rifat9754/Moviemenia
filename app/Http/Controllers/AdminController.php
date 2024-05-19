<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    //login
    public function login(Request $request)
    {
        if($request->method() == "POST"){
            $data=$request->only(['email','password']);

            if(Auth::guard('admin')->attempt($data)){
                return redirect()->route('admin.dashboard');

            }else{
                return redirect()->back()->with("alert","Please enternvalid credentials");
            }
        }
        return view('admin.login');
    }
    public function index()
    {
        return view('admin.dashboard');
    }
    public function logout()
{
    Auth::guard('admin')->logout();
    return redirect()->route('admin.login');
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admin $admin)
    {
        //
    }
}
