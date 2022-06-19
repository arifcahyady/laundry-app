<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CustomerRepository
{
    public function all()
    {
        $customer = User::where('id', Auth::id())->first();
        return $customer;
    }
}
