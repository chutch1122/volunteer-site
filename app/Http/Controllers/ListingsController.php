<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ListingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['only' => ['create', 'store', 'update', 'destroy']]);
    }

    // List of all listings (view)
    public function index()
    {

    }

    // Create listing form (view)
    public function create()
    {

    }

    // Create action (data-storage)
    public function store(Request $request)
    {

    }

    // Show a single listing (view)
    public function show($id)
    {

    }

    // Modify listing form (view)
    public function edit($id)
    {

    }

    // Update a listing (data-storage)
    public function update($id, Request $request)
    {

    }

    // Delete a listing (data-storage)
    public function destroy($id)
    {

    }
}
