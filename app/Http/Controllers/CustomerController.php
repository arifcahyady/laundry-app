<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index()
    {
        $customer = User::where('id', Auth::id())->first();
        return response()->json(['customer' => $customer]);
    }

    public function update(Request $request)
    {
        $customer = User::where('id', Auth::id())->first();
        $customer->name = $request->name;
        $customer->address = $request->address;
        $customer->number_phone = $request->number_phone;

        if ($request->file('image')) {
            $customer->image = $request->file('image')->store('images');
        }

        $customer->save();

        return response()->json([
            'message' => 'User successfully updated',
            'customer' => $customer,
        ]);
    }
}
