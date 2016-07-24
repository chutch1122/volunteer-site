<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Skill;
use Auth;

class SkillsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }
    // List of all skills (view)
    public function index()
    {
        $all = Skill::all();

        return view('skills.index')->with('skills', $all);
    }

    // Create oskill form (view)
    public function create()
    {
        return view('skills.create');
    }

    // Create action (data-storage)
    public function store(Request $request)
    {
        $skill = Skill::create($request->all());


        $skill->save();

        return redirect('/skills')->with('success', 'Skill created!');
    }

    // Show a single skill (view)
    public function show($id)
    {
        $skill = Skill::where('id', $id)->get()->first();

        return view('skills.show')->with('skill', $skill);
    }

    // Modify skill form (view)
    public function edit($id)
    {
        $skill = Skill::where('id', $id)->get()->first();

        return view('skill.edit')->with('skill', $skill);
    }

    // Update a skill (data-storage)
    public function update($id, Request $request)
    {
        $skill = Skill::where('id', $id)->get()->first();

        $skill->name = $request->get('name');

        $skill->save();

        return redirect('/skills/' . $id)->with('success', 'Skill updated!');
    }

    // Delete a skill (data-storage)
    public function destroy($id)
    {
        $skill = Skill::where('id', $id)->get()->first();
        $skill->delete();

        return redirect('/skills')->with('success', 'Skills deleted!');
    }
}
