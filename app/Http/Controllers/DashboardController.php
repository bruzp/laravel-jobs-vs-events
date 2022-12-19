<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Events\DashboardEvent;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        DashboardEvent::dispatch(Auth::user(), 'hello dashy');

        return Inertia::render('Dashboard', [
            'message' => 'Dashboard event is triggered. (Log and Email)'
        ]);
    }
}
