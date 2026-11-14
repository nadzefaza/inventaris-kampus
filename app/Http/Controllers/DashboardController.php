<?php

namespace App\Http\Controllers;
use App\Models\Item;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display the dashboard.
     */
    public function index()
    {
        return view('dashboard', [
            'totalItem' => \App\Models\Item::count(),
            'totalStok' => \App\Models\Item::sum('stok'),
            'totalRusak' => \App\Models\Item::where('kondisi', 'rusak')->count(),
        ]);
    }
}
