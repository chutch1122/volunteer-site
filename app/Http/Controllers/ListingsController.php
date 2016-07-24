<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests;
use App\Listing;
use App\Organization;
use App\Volunteer;
use Auth;
use DB;
use Illuminate\Http\Request;

class ListingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    public function doApply($id, Request $request)
    {
        $volunteer = new Volunteer();
        $volunteer->user_id = Auth::user()->id;
        $volunteer->listing_id = $id;
        $volunteer->pitch = $request->get('pitch');
        $volunteer->save();

        return redirect('/listings/'.$id)->with('success', 'Your volunteer application has been submitted!');
    }

    public function withdraw($id)
    {
        $user = Auth::user();
        $volunteer = Volunteer::where('user_id', $user->id)->where('listing_id', $id)->first();
        $volunteer->delete();

        return redirect('/listings/'.$id)->with('success', 'Your volunteer application has been retracted.');
    }

    public function apply($id)
    {
        $listing = Listing::where('id', $id)->with('organization')->first();
        
        return view('listings.volunteer')->with('listing', $listing);
    }

    public function approveVolunteer($id, $volunteerId)
    {
        $volunteer = Volunteer::where('id', $volunteerId)->with('user')->first();
        $volunteer->approve();
        
        return redirect('/listings/' . $volunteer->listing_id)->with('success', $volunteer->use['name'] . ' has been approved!');
    }

    public function rejectVolunteer($id, $volunteerId)
    {
        $volunteer = Volunteer::where('id', $volunteerId)->with('user')->first();
        $volunteer->reject();

        return redirect('/listings/' . $volunteer->listing_id)->with('success', $volunteer->user['name'] . ' has been rejected!');
    }
    
    public function close($id)
    {
        $listing = Listing::where('id', $id)->first();
        $listing->close();

        return redirect('/listings/' . $id)->with('success', $listing->title . " has been closed!");
    }

    public function open($id)
    {
        $listing = Listing::where('id', $id)->first();
        $listing->open();

        return redirect('/listings/' . $id)->with('success', $listing->title . " has been opened!");
    }

    // List of all listings (view)
    public function index()
    {
        $all = Listing::with('organization')->with('category')->get();

        return view('listings.index')->with('listings', $all);
    }

    // Create listing form (view)
    public function create()
    {
        $organizationId = Auth::user()->organization->id;

        return view('listings.create')
            ->with('categories', $this->getCategoriesForDropdown())
            ->with('contacts', $this->getContactsForOrganizationDropdown($organizationId));
    }

    // Create action (data-storage)
    public function store(Request $request)
    {
        $listing = null;

        if (!$request->get('category_id')) {
            return redirect()
                ->back()
                ->with('errors', ['category_id' => 'Category must be selected!'])
                ->withInput();
        }

        if (!$request->get('contact_id')) {
            return redirect()
                ->back()
                ->with('errors', ['contact_id' => 'Contact must be selected!'])
                ->withInput();
        }

        DB::transaction(function() use ($request) {
            $listing = Listing::create($request->all());

            $user = Auth::user();

            $listing->creator_id =  $user->id;
            $listing->organization_id =  $user->organization_id;

            $listing->save();
        });

        return redirect('/listings/'); // CHANGE TO REDIRECT TO NEWLY CREATED ENTRY
    }

    // Show a single listing (view)
    public function show($id)
    {
        $listing = Listing::where('id', $id)->with('category')->with('contact')->first();
        $volunteers = Volunteer::where('listing_id', $id)->where('rejected_at', null)->with('user')->get();

        $hasVolunteered = false;
        $user = Auth::user();
        if ($user){
            $count = Volunteer::where('user_id', $user->id)->where('rejected_at', null)->where('listing_id', $listing->id)->count();
            $hasVolunteered = ($count > 0);
        }

        return view('listings.show')
            ->with('listing', $listing)
            ->with('has_volunteered', $hasVolunteered)
            ->with('volunteers', $volunteers);
    }

    // Modify listing form (view)
    public function edit($id)
    {
        $listing = Listing::where('id', $id)->get()->first();

        return view('listings.edit')
            ->with('listing', $listing)
            ->with('categories', $this->getCategoriesForDropdown())
            ->with('contacts', $this->getContactsForOrganizationDropdown($listing->organization_id));
    }

    // Update a listing (data-storage)
    public function update($id, Request $request)
    {
        if (!$request->get('category_id')) {
            return redirect()
                ->back()
                ->with('errors', ['category_id' => 'Category must be selected!'])
                ->withInput();
        }

        if (!$request->get('contact_id')) {
            return redirect()
                ->back()
                ->with('errors', ['contact_id' => 'Contact must be selected!'])
                ->withInput();
        }
        
        $listing = Listing::where('id', $id)->first();
        $listing->title = $request->get('title');
        $listing->description = $request->get('description');
        $listing->category_id = $request->get('category_id');
        $listing->contact_id = $request->get('contact_id');
        $listing->starts_at = $request->get('starts_at');
        $listing->ends_at = $request->get('ends_at');

        $listing->save();

        return redirect('/listings/' . $id)->with('success', 'Listing updated!');
    }

    // Delete a listing (data-storage)
    public function destroy($id)
    {
        $listing = Listing::where('id', $id)->get()->first();
        $listing->delete();

        return redirect('/listings')->with('success', 'Listing deleted!');
    }

    private function getCategoriesForDropdown()
    {
        $categories = Category::all()->sortBy('name');
        $mappedCategories = [];

        foreach ($categories as $category) {
            $mappedCategories[$category->id] = $category->name;
        }
        return $mappedCategories;
    }

    private function getContactsForOrganizationDropdown($organizationId)
    {
        $contacts = Organization::where('id', $organizationId)->first()->contacts()->get();
        $mapped = [];

        foreach ($contacts as $contact) {
            $mapped[$contact->id] = $contact->name . " | " . $contact->email;
        }

        return $mapped;
    }
}
