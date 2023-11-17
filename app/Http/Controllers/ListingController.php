<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;
use App\Models\User;

class ListingController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function index_user()
    {
        $user_id = auth()->id();

        return view('listings.index', [
            'listings' => Listing::where('user_id', $user_id)->paginate(4)
        ]);
    }

    public function show(Listing $listing)
    {
        return view('listings.show', [
            'listing' => $listing
        ]);
    }

    public function create()
    {
        return view('listings.create');
    }

    public function store(Request $request)
    {
        $formFields = $request->validate([
            'subject' => 'required',
            'location' => 'required',
            'phone_number' => 'required',
            'type_of_complaint' => 'required|string|max:500',
            'picture' => 'nullable',
            'description' => 'required'
        ]);

        if ($request->hasFile('picture')) {
            $formFields['picture'] = $request->file('picture')->store('pictures', 'public');
        }

        $formFields['user_id'] = auth()->id();

        Listing::create($formFields);

        return redirect('/user_dashboard')->with('message', 'Complaint submitted successfully!');
    }

    public function edit(Listing $listing)
    {
        // dd(auth()->user());
        if (auth()->user()->role_as != 1 && auth()->user()->role_as != 0) {
            abort(403, 'Unauthorized Action');
        }

        return view('listings.edit', ['listing' => $listing]);
    }

    public function update(Request $request, Listing $listing)
    {
        if (auth()->user()->role_as != 1 && auth()->user()->role_as != 0) {
            abort(403, 'Unauthorized Action');
        }

        $formFields = $request->validate([
            'subject' => 'required',
            'location' => 'required',
            'phone_number' => 'required',
            'type_of_complaint' => 'required|string|max:500',
            'picture' => 'nullable',
            'description' => 'required'
        ]);

        if ($request->hasFile('picture')) {
            $formFields['picture'] = $request->file('picture')->store('pictures', 'public');
        }

        $listing->update($formFields);

        return redirect('/user_dashboard')->with('message', 'Complaint updated successfully!');
    }

    public function destroy(Listing $listing)
    {
        if (!auth()->user()->isAdmin() && $listing->user_id != auth()->id()) {
            abort(403, 'Unauthorized Action');
        }

        $listing->delete();

        return redirect('/')->with('message', 'Listing deleted successfully');
    }

    // Manage Listings
    public function manage()
    {
        if (!auth()->user()->isAdmin()) {
            abort(403, 'Unauthorized Action');
        }

        $listings = Listing::all();

        return view('admin.manage', ['listings' => $listings]);

    }
    

    // Manage Listings
    public function admin_manage()
    {
        if (auth()->user()->role_as != 1) {
            abort(403, 'Unauthorized Action');
        }

        $listings = Listing::all();

        return view('admin.manage_listing', ['listings' => Listing::latest()->paginate(4)]);

    }

    public function admin_show(Listing $listing)
    {
        if (auth()->user()->role_as != 1) {
            abort(403, 'Unauthorized Action');
        }

        return view('admin.show_listing', [
            'listing' => $listing
        ]);
    }
    

    public function admin_edit(Listing $listing)
    {
        // dd(auth()->user());
        if (auth()->user()->role_as != 1) {
            abort(403, 'Unauthorized Action');
        }

        return view('admin.edit_listing', ['listing' => $listing]);
    }

    public function admin_update(Request $request, Listing $listing)
    {
        if (auth()->user()->role_as != 1) {
            abort(403, 'Unauthorized Action');
        }

        $formFields = $request->validate([
            'subject' => 'required',
            'location' => 'required',
            'phone_number' => 'required',
            'type_of_complaint' => 'required|string|max:500',
            'picture' => 'nullable',
            'description' => 'required',
            'status' => 'required'
        ]);

        if ($request->hasFile('picture')) {
            $formFields['picture'] = $request->file('picture')->store('pictures', 'public');
        }

        $listing->update($formFields);

        return redirect()->route('admin.manage')->with('message', 'Complaint updated successfully!');
    }

    public function admin_delete(Listing $listing)
    {
        if (auth()->user()->role_as != 1) {
            abort(403, 'Unauthorized Action');
        }

        $listing->delete();

        return redirect()->route('admin.manage')->with('message', 'Complaint deleted successfully');
    }

}
