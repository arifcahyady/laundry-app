<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Traits\AdminTrait;
use Illuminate\Http\Request;
use App\Traits\ApiResponser;
use Illuminate\Support\Facades\Redis;

use function Symfony\Component\String\b;

class AdminController extends Controller
{
    use ApiResponser, AdminTrait;

    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index()
    {
        return $this->getBooking();
    }

    public function confirm(Request $request, $id)
    {
        return $this->confirmBooking($request, $id);
    }
}
