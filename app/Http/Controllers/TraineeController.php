<?php
// app/Http/Controllers/TraineeController.php

namespace App\Http\Controllers;

use App\Models\Trainee;
use Illuminate\Http\Request;

class TraineeController extends Controller
{
   // Show the admit form
   public function admitForm()
   {
       // Get distinct roles from the database
       $roles = Trainee::distinct()->pluck('role');
       
       // Return the view for the admit form
       return view('trainees.admit', compact('roles'));
   }

   // Show the trainees for a selected role
   public function showByRole(Request $request)
   {
       $role = $request->input('role');
       $trainees = Trainee::where('role', $role)->where('admitted', false)->get();

       // Pass the role and trainees to the view
       return view('trainees.show_by_role', compact('role', 'trainees'));
   }

   // Handle the admission form submission
   public function admit(Request $request)
   {
       $request->validate([
           'trainee_id' => 'required|exists:trainees,id',
       ]);

       $trainee = Trainee::findOrFail($request->trainee_id);
       $trainee->admitted = true;
       $trainee->admitted_by = auth()->id();
       $trainee->save();

       return redirect()->route('trainees.showByRole', ['role' => $trainee->role])
                        ->with('success', 'Trainee admitted successfully.');
   }



    public function create()
    {
        //fetch unique wards and polling stations
        $wards = Trainee::select('ward')->distinct()->get();
        $pollingStations = Trainee::select('polling_station')->distinct()->get();
        return view('trainees.create', compact('wards', 'pollingStations'));

    }

    public function index(Request $request)
    {
        // Retrieve the search query and per_page value from the request
        $search = $request->input('search');
        $perPage = $request->input('per_page', 10); // Default to 10 if not provided
    
        // Modify the query to include the search functionality
        $trainees = Trainee::with('admittedBy')
            ->when($search, function ($query, $search) {
                return $query->where('name', 'like', "%{$search}%")
                             ->orWhere('id_number', 'like', "%{$search}%")
                             ->orWhere('phone_number', 'like', "%{$search}%")
                             ->orWhere('ward', 'like', "%{$search}%")
                             ->orWhere('polling_station', 'like', "%{$search}%")
                             ->orWhere('role', 'like', "%{$search}%");
            })
            ->paginate($perPage);
    
        // Pass the search query and per_page value to the view
        return view('trainees.index', [
            'trainees' => $trainees,
            'search' => $search,
            'perPage' => $perPage, 
        ]);
    }



    // public function create()
    // {
    //     return view('trainees.create');
    // }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'id_number' => 'required|string|unique:trainees',
            'phone_number' => 'required|string|max:15',
            'polling_station' => 'required|string|max:255',
            'role' => 'required|in:polling_clerk,presiding_officer,deputy_presiding_officer,SET',
        ]);

        Trainee::create($request->all());

        return redirect()->route('trainees.index')->with('success', 'Trainee added successfully!');
    }

    public function show(Trainee $trainee)
    {
        return view('trainees.show', compact('trainee'));
    }

    public function edit(Trainee $trainee)
    {
        return view('trainees.edit', compact('trainee'));
    }

    public function update(Request $request, Trainee $trainee)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'id_number' => 'required|string|unique:trainees,id_number,' . $trainee->id,
            'phone_number' => 'required|string|max:15',
            'polling_station' => 'required|string|max:255',
            'role' => 'required|in:polling_clerk,presiding_officer,deputy_presiding_officer,SET',
        ]);

        $trainee->update($request->all());

        return redirect()->route('trainees.index')->with('success', 'Trainee updated successfully!');
    }

    public function destroy(Trainee $trainee)
    {
        $trainee->delete();
        return redirect()->route('trainees.index')->with('success', 'Trainee deleted successfully!');
    }
}
