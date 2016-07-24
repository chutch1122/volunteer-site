<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Contact;
use App\Organization;
use App\Listing;

class ContactsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    // Create Contact form (view)
    public function create($organizationId)
    {   
        return view('contacts.create')->with('organization_id', $organizationId);
    }

    // Create action (data-storage)
    public function store($organizationId, Request $request)
    {
        $contact = new Contact();

        $contact->name = $request->get('name');
        $contact->email = $request->get('email');
        $contact->phone_number = $request->get('phone_1') . $request->get('phone_2') . $request->get('phone_3');
        $contact->fax_number = $request->get('fax_number');

        $contact->save();

        $contact->organizations()->attach($organizationId);

        return redirect('/organizations/' . $organizationId)->with('success', 'Contact created!');
    }

    // Modify Contact form (view)
    public function edit($organizationId, $contactId)
    {
        $contact = Contact::where('id', $contactId)->first();

        return view('contacts.edit')->with('contact', $contact)->with('organization_id', $organizationId);
    }

    // Update a Contact (data-storage)
    public function update($organizationId, $contactId, Request $request)
    {
        $contact = Contact::where('id', $contactId)->first();

        $contact->name = $request->get('name');
        $contact->email = $request->get('email');
        $contact->phone_number = $request->get('phone_1') . $request->get('phone_2') . $request->get('phone_3');
        $contact->fax_number = $request->get('fax_number');

        $contact->save();

        return redirect('/organizations/' . $organizationId)->with('success', 'Contact updated!');
    }

    // Delete a Contact (data-storage)
    public function destroy($organizationId, $contactId)
    {
        $listings = Listing::where('organization_id', $organizationId)->get();
        $contact = Contact::where('id', $contactId)->first();

        $canDelete = true;
        foreach ($listings as $listing){
            if ($listing->contact_id == $contactId){
                return redirect('/organizations/' . $organizationId)
                    ->with('errors',
                        [
                            'contact_in_use' =>
                            'The contact is currently assigned to a listing. Please remove ' . $contact->name . ' from all listings and try again.'
                        ]
                    );
            }
        }

        $contact->delete();

        return redirect('/organizations/' . $organizationId)->with('success', 'Contact deleted!');
    }
}
