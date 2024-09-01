// app/Http/Controllers/CheckInController.php

namespace App\Http\Controllers;

use App\Models\Trainee;
use Illuminate\Http\Request;

class CheckInController extends Controller
{
    public function checkIn(Request $request, Trainee $trainee)
    {
        $trainee->update(['checked_in_at' => now()]);
        return redirect()->back()->with('success', 'Trainee checked in successfully.');
    }

    public function checkOut(Request $request, Trainee $trainee)
    {
        $trainee->update(['checked_out_at' => now()]);
        return redirect()->back()->with('success', 'Trainee checked out successfully.');
    }
}
