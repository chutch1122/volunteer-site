<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ContactsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }
    // List of all contacts (view)
    public function index()
    {
        $all = Contact::all();

        return view('contacts.index')->with('contacts', $all);
    }

    // Create Contact form (view)
    public function create()
    {
        return view('contacts.create');
    }

    // Create action (data-storage)
    public function store(Request $request)
    {
        $Contact = Contact::create($request->all());

        $Contact->user_id = Auth::user()->id;

        $Contact->save();

        return redirect('/contacts')->with('success', 'Contact created!');
    }

    // Show a single Contact (view)
    public function show($id)
    {
        $Contact = Contact::where('id', $id)->get()->first();

        return view('contacts.show')->with('Contact', $Contact);
    }

    // Modify Contact form (view)
    public function edit($id)
    {
        $Contact = Contact::where('id', $id)->get()->first();

        return view('contacts.edit')->with('Contact', $Contact);
    }

    // Update a Contact (data-storage)
    public function update($id, Request $request)
    {
        $Contact = Contact::where('id', $id)->get()->first();

        $Contact->address_id = $request->get('address_id');
        $Contact->name = $request->get('name');
        $Contact->email = $request->get('email');
        $Contact->phone_number = $request->get('phone_number');
        $Contact->fax_number = $request->get('fax_number');

        $Contact->save();

        return redirect('/contacts/' . $id)->with('success', 'Contact updated!');
    }

    // Delete a Contact (data-storage)
    public function destroy($id)
    {
        $Contact = Contact::where('id', $id)->get()->first();
        $Contact->delete();

        return redirect('/contacts')->with('success', 'Contact deleted!');
    }
}
