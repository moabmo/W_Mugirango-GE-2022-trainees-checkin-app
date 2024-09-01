<?php
// app/Http/Controllers/Admin/DashboardController.php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Trainee;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $totalTrainees = Trainee::count();
        $checkedInTrainees = Trainee::where('admitted', true)->count();
        $pendingCheckIns = $totalTrainees - $checkedInTrainees;

        // Example data for charts
        $dates = [];
        $checkInCounts = [];
        for ($i = 6; $i >= 0; $i--) {
            $date = Carbon::now()->subDays($i)->format('Y-m-d');
            $dates[] = $date;
            $checkInCounts[] = Trainee::whereDate('created_at', $date)->count();
        }

        // Example recent activities data
        $recentActivities = [
            (object) ['description' => 'Trainee John Doe checked in', 'created_at' => now()->subMinutes(10)],
            (object) ['description' => 'Trainee Jane Smith admitted', 'created_at' => now()->subHours(2)],
            (object) ['description' => 'Trainee Alice Johnson checked in', 'created_at' => now()->subHours(5)],
        ];

        return view('admin.dashboard', [
            'totalTrainees' => $totalTrainees,
            'checkedInTrainees' => $checkedInTrainees,
            'pendingCheckIns' => $pendingCheckIns,
            'dates' => $dates,
            'checkInCounts' => $checkInCounts,
            'recentActivities' => $recentActivities,
        ]);
    }
}
