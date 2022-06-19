<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\BookingTrait;

class BookingController extends Controller
{
    use BookingTrait;

    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index()
    {
        return $this->getUserBooking();
    }

    public function store(Request $request)
    {
        return $this->createBooking($request);
    }
}
