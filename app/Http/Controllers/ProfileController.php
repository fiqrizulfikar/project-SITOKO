<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\LoginLog;

class ProfileController extends Controller
{
      public function index()
    {
        $adminLogins = User::where('level', 'admin')
            ->with(['loginLogs' => function ($q) {
                $q->latest()->take(1);
            }])
            ->get();

        return view('profile', compact('adminLogins'));
    }
}
