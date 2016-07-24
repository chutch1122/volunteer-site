<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Listing;
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
        $all = Listing::with('organization')->get();

        return view('listings.index')->with('listings', $all);
    }

    // Create listing form (view)
    public function create()
    {
        return view('listings.create');
    }

    // Create action (data-storage)
    public function store(Request $request)
    {
        DB::transaction(function() use ($request) {
            $listing = Listing::create($request->all());

            $user = Auth::user();

            $listing->creator_id =  $user->id;

            $listing->organization_id =  $user->organization_id;

            $listing->save();
        });

        return redirect('/listings')->with('success', 'Listing created!');
    }

    // Show a single listing (view)
    public function show($id)
    {
        $listing = Listing::where('id', $id)->get()->first();
        $volunteers = Volunteer::where('listing_id', $id)->with('user')->get();

        $hasVolunteered = false;
        $user = Auth::user();
        if ($user){
            $count = Volunteer::where('user_id', $user->id)->where('listing_id', $listing->id)->count();
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

        return view('listings.edit')->with('listing', $listing);
    }

    // Update a listing (data-storage)
    public function update($id, Request $request)
    {
        $listing = Listing::where('id', $id)->first();

        $listing->title = $request->get('title');
        $listing->description = $request->get('description');
        //$listing->address_id = $request->get('address_id');
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
}
