<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class DashboardController extends Controller
{
    public function __invoke()
    {
        $user = Auth::user();

        $user_links = $user->links()->orderBy('position')->get();

        return view('dashboard', compact('user_links'));
    }
}
