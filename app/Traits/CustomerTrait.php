<?php

namespace App\Traits;

use App\Models\User;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

trait CustomerTrait
{
    use ApiResponser;

    protected function getProfileCustomer()
    {
        $customer = User::where('id', Auth::id())->first();
        return $this->successResponse($customer, 'Success', 200);
    }

    protected function updateProfileCustomer(Request $request)
    {
        $customer = User::where('id', Auth::id())->first();
        $customer->name = $request->name;
        $customer->address = $request->address;
        $customer->number_phone = $request->number_phone;

        if ($request->file('image')) {
            $customer->image = $request->file('image')->store('images');
        }

        $customer->save();
        return $this->successResponse($customer, 'User has been updated successfully', 204);
    }
}
