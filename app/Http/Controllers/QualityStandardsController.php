<?php

namespace App\Http\Controllers;

use App\Models\QualityStandard;
use Illuminate\Http\Request;

class QualityStandardsController extends Controller
{
    // Show all quality standards (Read)
    public function index()
    {
        // Fetch all quality standards from the database
        $standards = QualityStandard::all();

        // Now you can use $standards for further processing or passing to the view
        return view('app.DemandForecasts.quality-standard', compact('standards'));
    }

    // Show a specific quality standard (Read)
    public function show($id)
    {
        $standard = QualityStandard::findOrFail($id);
        return view('qualitystandards.show', compact('standard'));
    }

    // Create a new quality standard (Create)
    public function create(Request $request)
    {
        // Validation (optional)
        $request->validate([
            'name' => 'required|string|max:255',
            'purpose_scope' => 'required|string',
            // ... other validation rules
        ]);

        $standard = QualityStandard::create($request->all());
        return redirect('/quality-standards')->with('success', 'Quality standard created successfully!');
    }

    // Update a quality standard (Update)
    public function update(Request $request, $id)
    {
        // Validation (optional)
        $request->validate([
            'name' => 'required|string|max:255',
            'purpose_scope' => 'required|string',
            // ... other validation rules
        ]);

        $standard = QualityStandard::findOrFail($id);
        $standard->update($request->all());
        return redirect('/quality-standards')->with('success', 'Quality standard updated successfully!');
    }

    // Delete a quality standard (Delete)
    public function destroy($id)
    {
        $standard = QualityStandard::findOrFail($id);
        $standard->delete();
        return redirect('/quality-standards')->with('success', 'Quality standard deleted successfully!');
    }
}
