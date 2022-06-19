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
}
