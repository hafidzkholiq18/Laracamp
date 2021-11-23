<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Checkout;
use Illuminate\Support\Facades\Auth;


class DashboardController extends Controller
{
    public function dashboard()
    {
        $checkouts = Checkout::with('Camps')->whereUserId(Auth::id())->get();

        return view('user.dashboard', [
            'checkouts' => $checkouts
        ]);
    }
}
