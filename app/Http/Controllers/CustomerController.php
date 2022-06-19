<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Traits\CustomerTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    use CustomerTrait;

    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index()
    {
        return $this->getProfileCustomer();
    }

    public function update(Request $request)
    {
        return $this->updateProfileCustomer($request);
    }
}
