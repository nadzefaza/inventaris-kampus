<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display the dashboard.
     */
    public function index()
    {
        return view('dashboard', [
            'totalItems' => \App\Models\Item::count(),
            'totalStock' => \App\Models\Item::sum('stok'),
            'totalRusak' => \App\Models\Item::where('kondisi', 'rusak')->count(),
        ]);
    }
}
