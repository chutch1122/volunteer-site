<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Organization;

class OrganizationsController extends Controller
{
    // List of all organizations (view)
    public function index()
    {
        return view('organizations.index');
    }

    // Create organization form (view)
    public function create()
    {
        return view('organizations.create');
    }

    // Create action (data-storage)
    public function store(Request $request)
    {

    }

    // Show a single organization (view)
    public function show($id)
    {
        $organization = Organization::where('id', $id)->get()->first();

        return view('organizations.show')->with('organization', $organization);
    }

    // Modify organization form (view)
    public function edit($id)
    {
        $organization = Organization::where('id', $id)->get()->first();

        return view('organizations.edit')->with('organization', $organization);
    }

    // Update a organization (data-storage)
    public function update($id, Request $request)
    {

    }

    // Delete a organization (data-storage)
    public function destroy($id)
    {

    }
}
