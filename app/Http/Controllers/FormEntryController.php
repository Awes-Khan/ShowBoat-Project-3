<?php

namespace App\Http\Controllers;

use App\Models\FormEntry;
use Illuminate\Http\Request;

class FormEntryController extends Controller
{
    public function create()
    {
        return view('form-entry.create');
    }

    public function store(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'profile_name' => 'required',
            'profile_image' => 'required|image|mimes:png,jpg',
            'email' => 'required|email',
            'address' => 'nullable',
            'pan_card_number' => 'required',
            'aadhar_card_number' => 'required',
        ]);

        // Handle file upload
        if ($request->hasFile('profile_image')) {
            $image = $request->file('profile_image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->storeAs('profile_images', $imageName, 'public');
            $validatedData['profile_image'] = "profile_images/".$imageName;
        }

        // Create the form entry
        $formEntry = FormEntry::create($validatedData);

        // Redirect to success page
        return view('form-entry.success');
    }
}
?>