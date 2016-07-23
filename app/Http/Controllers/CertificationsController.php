<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class CertificationsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }
    // List of all certifications (view)
    public function index()
    {
        $all = Certification::all();

        return view('certification.index')->with('certifications', $all);
    }

    // Create certification form (view)
    public function create()
    {
        return view('certifications.create');
    }

    // Create action (data-storage)
    public function store(Request $request)
    {
        $certification = Certification::create($request->all());

        $certification->user_id = Auth::user()->id;

        $certification->save();

        return redirect('/certifications')->with('success', 'Certification created!');
    }

    // Show a single certification (view)
    public function show($id)
    {
        $certification = Certification::where('id', $id)->get()->first();

        return view('certifications.show')->with('certification', $certification);
    }

    // Modify certification form (view)
    public function edit($id)
    {
        $certification = certification::where('id', $id)->get()->first();

        return view('certifications.edit')->with('certification', $certification);
    }

    // Update a certification (data-storage)
    public function update($id, Request $request)
    {
        $certification = certification::where('id', $id)->get()->first();

        $certification->name = $request->get('name');
        $certification->name = $request->get('certified_by');

        $certification->save();

        return redirect('/certifications/' . $id)->with('success', 'certification updated!');
    }

    // Delete a certification (data-storage)
    public function destroy($id)
    {
        $certification = certification::where('id', $id)->get()->first();
        $certification->delete();

        return redirect('/certifications')->with('success', 'certification deleted!');
    }
}
