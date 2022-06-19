<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Repositories\CustomerRepository;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    use ApiResponser;

    protected $customerRepository;

    public function __construct(CustomerRepository $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }

    public function index()
    {
        $customer = $this->customerRepository->getUser();
        return $this->successResponse($customer, 'Success');
    }

    public function update(Request $request)
    {
        return $this->updateProfileCustomer($request);
    }
}
