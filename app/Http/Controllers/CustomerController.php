<?php

namespace App\Http\Controllers;

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
        $customer = $this->customerRepository->getUser();
        $customer->name = $request->name;
        $customer->address = $request->address;
        $customer->number_phone = $request->number_phone;

        if ($request->file('image')) {
            $customer->image = $request->file('image')->store('images');
        }

        $customer->save();
        return $this->successResponse($customer, 'User has been updated successfully');
    }
}
