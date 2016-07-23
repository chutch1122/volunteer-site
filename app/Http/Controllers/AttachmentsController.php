<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class AttachmentsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }
    // List of all attachments (view)
    public function index()
    {
        $all = Attachment::all();

        return view('attachments.index')->with('attachments', $all);
    }

    // Create attachment form (view)
    public function create()
    {
        return view('attachments.create');
    }

    // Create action (data-storage)
    public function store(Request $request)
    {
        $attachment = Attachment::create($request->all());

        $attachment->user_id = Auth::user()->id;

        $attachment->save();

        return redirect('/attachments')->with('success', 'Attachment created!');
    }

    // Show a single attachment (view)
    public function show($id)
    {
        $attachment = Attachment::where('id', $id)->get()->first();

        return view('attachments.show')->with('attachment', $attachment);
    }

    // Modify attachment form (view)
    public function edit($id)
    {
        $attachment = Attachment::where('id', $id)->get()->first();

        return view('attachments.edit')->with('attachment', $attachment);
    }

    // Update a attachment (data-storage)
    public function update($id, Request $request)
    {
        $attachment = Attachment::where('id', $id)->get()->first();

        $attachment->file = $request->get('file');
        $attachment->url = $request->get('url');

        $attachment->save();

        return redirect('/attachments/' . $id)->with('success', 'Attachment updated!');
    }

    // Delete a attachment (data-storage)
    public function destroy($id)
    {
        $attachment = Attachment::where('id', $id)->get()->first();
        $attachment->delete();

        return redirect('/attachments')->with('success', 'Attachment deleted!');
    }
}
