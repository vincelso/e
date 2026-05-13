<?php

// app/Http/Controllers/RecordController.php
// Handles all CRUD operations: Create, Read, Update, Delete

namespace App\Http\Controllers;

use App\Models\Record;
use Illuminate\Http\Request;

class RecordController extends Controller
{
    /**
     * INDEX - Show all records.
     * Route: GET /records
     */
    public function index()
    {
        // Fetch all records from the database, latest first
        $records = Record::latest()->paginate(10);

        // Pass records to the view
        return view('records.index', compact('records'));
    }

    /**
     * CREATE - Show the form to add a new record.
     * Route: GET /records/create
     */
    public function create()
    {
        return view('records.create');
    }

    /**
     * STORE - Save the new record to the database.
     * Route: POST /records
     */
    public function store(Request $request)
    {
        // Validate the incoming form data
        $validated = $request->validate([
            'name'       => 'required|string|max:255',
            'email'      => 'required|email|unique:records,email',
            'course'     => 'required|string|max:255',
            'year_level' => 'required|string',
            'grade'      => 'nullable|numeric|min:0|max:100',
            'status'     => 'required|in:active,inactive',
        ]);

        // Create and save the record using mass assignment
        Record::create($validated);

        // Redirect back to the list with a success message
        return redirect()->route('records.index')
                         ->with('success', 'Record added successfully!');
    }

    /**
     * EDIT - Show the form to edit an existing record.
     * Route: GET /records/{id}/edit
     */
    public function edit(Record $record)
    {
        // Laravel auto-fetches the record via Route Model Binding
        return view('records.edit', compact('record'));
    }

    /**
     * UPDATE - Save the edited record to the database.
     * Route: PUT /records/{id}
     */
    public function update(Request $request, Record $record)
    {
        // Validate — ignore the current record's email in the unique check
        $validated = $request->validate([
            'name'       => 'required|string|max:255',
            'email'      => 'required|email|unique:records,email,' . $record->id,
            'course'     => 'required|string|max:255',
            'year_level' => 'required|string',
            'grade'      => 'nullable|numeric|min:0|max:100',
            'status'     => 'required|in:active,inactive',
        ]);

        // Update the record fields
        $record->update($validated);

        return redirect()->route('records.index')
                         ->with('success', 'Record updated successfully!');
    }

    /**
     * DESTROY - Delete a record from the database.
     * Route: DELETE /records/{id}
     */
    public function destroy(Record $record)
    {
        $record->delete();

        return redirect()->route('records.index')
                         ->with('success', 'Record deleted successfully!');
    }
}