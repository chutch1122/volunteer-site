<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Listing;
use Auth;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;

class ListingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
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

        return view('listings.show')->with('listing', $listing);
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
