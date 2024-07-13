<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\Room;
use App\Models\Rent;
use App\Models\User;

class DashboardIndexController extends Controller
{
    /**
     * Display the dashboard index page.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        // Add your code here

        return view('dashboard.index.index', [
            'title' => 'Index',
            'roles' => Role::all(),
            'role' => auth()->user()->role->name,
            'email' => auth()->user()->email,
            'name' => auth()->user()->name,
            'totalRooms' => Room::count(),
            'rentRooms' => Rent::where('status', 'dipinjam')->count(),
            'totalUsers' => User::count(),
            'availableRooms' => Room::count() - Rent::where('status', 'dipinjam')->count(),

        ]);
    }
}
