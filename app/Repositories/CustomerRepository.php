<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CustomerRepository
{
    public function getUser()
    {
        $customer = User::where('id', Auth::id())->firstorFail();
        return $customer;
    }
}
