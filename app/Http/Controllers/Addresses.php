<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Addresses;
use Auth;

class AddressesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }
    // List of all addresses (view)
    public function index()
    {
        return view('addresses.index');
    }

    // Create address form (view)
    public function create()
    {
        return view('addresses.create');
    }

    // Create action (data-storage)
    public function store(Request $request)
    {
        $address = Address::create($request->all());

        $address->save();

        return redirect('/addresses')->with('success', 'Address created!');
    }

    // Show a single address (view)
    public function show($id)
    {
        $address = Addresses::where('id', $id)->get()->first();

        return view('addresses.show')->with('addresses', $address);
    }

    // Modify organization form (view)
    public function edit($id)
    {
        $address = Addresses::where('id', $id)->get()->first();

        return view('addresses.edit')->with('addresses', $address);
    }

    // Update an address (data-storage)
    public function update($id, Request $request)
    {
        $address = Addresses::where('id', $id)->get()->first();

        $address->address_line_1 = $request->get('address_line_1');
        $address->address_line_2 = $request->get('address_line_2');
        $address->city = $request->get('city');
        $address->state = $request->get('state');
        $address->zip = $request->get('zip');

        $address->save();

        return redirect('/addresses/' . $id)->with('success', 'Address updated!');
    }

    // Delete an address (data-storage)
    public function destroy($id)
    {
        $address = Addresses::where('id', $id)->get()->first();
        $address->delete();

        return redirect('/addresses')->with('success', 'Address deleted!');
    }
}
