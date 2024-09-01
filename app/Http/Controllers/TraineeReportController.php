<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trainee;
use PDF; // Import the PDF facade

class TraineeReportController extends Controller
{
    public function preview()
    {
        // Fetch trainees who are admitted
        $trainees = Trainee::where('admitted', 0)
        ->with('admittedBy') // Eager load the admittedBy relationship
        ->get();

        // Load the view and pass the data
        return view('reports.trainee_preview', compact('trainees'));
    }

    public function download()
    {
        // Fetch trainees who are admitted
        $trainees = Trainee::where('admitted', 1)->get();

        // Generate PDF
        $pdf = PDF::loadView('reports.trainee_pdf', compact('trainees'));

        // Generate a timestamp
        $timestamp = now()->format('Y-m-d_H-i-s'); // Example: 2024-08-31_15-30-00

        // Create the filename with the timestamp
        $filename = 'admitted_trainees_report_' . $timestamp . '.pdf';

        // Download the PDF
        return $pdf->download($filename);
    }
}
