<?php

// ReportController.php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Trainee; // Ensure the correct model is imported

class ReportController extends Controller
{
    public function index()
    {
        // Fetch the trainees data, adjust according to your database setup
        $trainees = Trainee::all(); // Replace with your actual query logic

        // Pass the trainees data to the view
        return view('admin.reports.index', compact('trainees'));
    }
}
