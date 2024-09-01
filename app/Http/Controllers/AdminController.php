// app/Http/Controllers/AdminController.php

namespace App\Http\Controllers;

use App\Models\Trainee;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $totalTrainees = Trainee::count();
        $checkedInTrainees = Trainee::whereNotNull('checked_in_at')->count();
        $pendingCheckIns = Trainee::whereNull('checked_in_at')->count();

        return view('admin.dashboard', compact('totalTrainees', 'checkedInTrainees', 'pendingCheckIns'));
    }
}
