<?php

namespace App\Traits;

use App\Models\Booking;
use App\Traits\ApiResponser;

trait AdminTrait
{
    use ApiResponser;

    public function index()
    {
        $admin = Booking::all();
        return $this->successResponse($admin, 'Success');
    }
}
