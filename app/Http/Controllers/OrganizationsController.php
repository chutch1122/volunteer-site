<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Organization;
use App\User;
use Auth;

class OrganizationsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }
    // List of all organizations (view)
    public function index()
    {
        $all = Organization::all();
        
        return view('organizations.index')->with('organizations', $all);
    }

    // Create organization form (view)
    public function create()
    {
        return view('organizations.create');
    }

    // Create action (data-storage)
    public function store(Request $request)
    {
        $user = Auth::user();
        
        $organization = Organization::create($request->all());
        $organization->user_id = $user->id;
        $organization->save();

        $user->organization_id = $organization->id;
        $user->save();

        return redirect('/organizations')->with('success', 'Organization created!');
    }

    // Show a single organization (view)
    public function show($id)
    {
        $organization = Organization::where('id', $id)->first();

        return view('organizations.show')->with('organization', $organization);
    }

    // Modify organization form (view)
    public function edit($id)
    {
        $organization = Organization::where('id', $id)->first();

        return view('organizations.edit')->with('organization', $organization);
    }

    // Update a organization (data-storage)
    public function update($id, Request $request)
    {
        $organization = Organization::where('id', $id)->first();

        $organization->name = $request->get('name');
        $organization->website = $request->get('website');
        $organization->mission_statement = $request->get('mission_statement');
        $organization->description = $request->get('description');

        $organization->save();

        return redirect('/organizations/' . $id)->with('success', 'Organization updated!');
    }

    // Delete a organization (data-storage)
    public function destroy($id)
    {
        $organization = Organization::where('id', $id)->first();
        $organization->delete();

        return redirect('/organizations')->with('success', 'Organization deleted!');
    }
}
