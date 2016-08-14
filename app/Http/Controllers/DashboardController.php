<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class DashboardController extends Controller
{

    public function showDashboard()
    {
        $usersList = User::all();
        return view('dashboard', ['users' => $usersList]);
    }
}
