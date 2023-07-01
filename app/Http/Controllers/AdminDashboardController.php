<?php

namespace App\Http\Controllers;

use App\Models\FormEntry;
use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Http\Request;
use DataTables;

class AdminDashboardController extends Controller
{
    
    public function index()
    {
        $formEntries = FormEntry::all();
        // dd(compact('formEntries'));
        return view('form-entry.admin.dashboard', compact('formEntries'));
    }
    // public function index_datatable()
    public function getFormEntries()
    {
        // dd(FormEntry::all());
        // if (request()->ajax()) {
            $formEntries = FormEntry::all();

            Debugbar::info("Data Passed");
    
            return \Yajra\DataTables\DataTables::of($formEntries)
                ->addColumn('actions', function ($formEntry) {
                    return '<a href="' . route('admin.form-entry.edit', $formEntry->id) . '" class="btn btn-primary btn-sm">Edit</a>
                            <form action="' . route('admin.form-entry.delete', $formEntry->id) . '" id="delete-form-' . $formEntry->id . '" method="POST" style="display: inline">
                                ' . method_field('DELETE') . csrf_field() . '
                                <button type="button" class="delete-entry btn btn-danger btn-sm" onclick="confirmDelete(' . $formEntry->id . ')">Delete</button>
                            </form>';
                })
                ->rawColumns(['actions'])
                ->make(true);
        // }

        // return  redirect()->route('form-entry.create');
    }
    
    public function edit($id)
    {
        $formEntry = FormEntry::findOrFail($id);
        return view('form-entry.admin.edit', compact('formEntry'));
    }

    public function update(Request $request, $id)
    {
        // Step 1: Validate the form data
        $request->validate([
            'profile_name' => 'required',
            'profile_image' => 'required|image|mimes:png,jpg',
            'email' => 'required|email',
            'address' => 'nullable',
            'pan_card_number' => 'required',
            'aadhar_card_number' => 'required',
        ]);

        // Step 2: Find the form entry by ID
        $formEntry = FormEntry::findOrFail($id);

        // Step 3: Update the form entry with the new data
        $formEntry->profile_name = $request->input('profile_name');
        $formEntry->email = $request->input('email');
        $formEntry->address = $request->input('address');
        $formEntry->pan_card_number = $request->input('pan_card_number');
        $formEntry->aadhar_card_number = $request->input('aadhar_card_number');

        // Step 4: Handle the uploaded profile image
        if ($request->hasFile('profile_image')) {
            // Get the uploaded file
            $profileImage = $request->file('profile_image');
            
            // Generate a unique filename for the uploaded image
            $filename = time() . '_' . $profileImage->getClientOriginalName();
            
            // Move the uploaded image to the storage directory
            $profileImage->storeAs('public/profile_images', $filename);
            
            // Update the form entry with the new profile image filename
            $formEntry->profile_image = $filename;
        }

        // Step 5: Save the updated form entry
        $formEntry->save();

        // Step 6: Redirect to the admin dashboard with a success message
        return view('form-entry.success')->with('success', 'Form entry updated successfully.');
    }



    public function delete($id)
    {
        $formEntry = FormEntry::findOrFail($id);
        $formEntry->delete();

        return redirect()->route('admin.dashboard')->with('success', 'Form entry deleted successfully.');
    }
}


?>