<?php

namespace App\Repository;

use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;

class EloquentCustomerRepository implements CustomerRepository
{
    protected $model;

    public function __construct(User $user)
    {
        $this->model = $user;
    }

    public function getUser()
    {
        $customer = User::where('id', Auth::id())->first();
        return $this->model->getUser($customer);
    }
}
