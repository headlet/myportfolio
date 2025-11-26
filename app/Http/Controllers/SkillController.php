<?php

namespace App\Http\Controllers;

use App\Models\Skills;
use App\Models\User;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Skills::all();

        return view('admin.skills', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create_form()
    {
        $users = User::where('first_name', 'like', "Ajay")
            ->orwhere('last_name', 'like', "Bhayadyo")
            ->get();

        $user = $users->first();
        return view('admin.skills.create', compact('user'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validation = $request->validate([
            'skill_name' => 'required|string|max:255',
            'skill_level' => 'required|string',
            'skill_category' => 'required|string',
        ]);

        Skills::create($validation);

        return redirect('/skills')->with(['message' => "success on adding new skill"]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $view = Skills::findOrFail($id);
        return view('admin.skills.view', compact('view'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        // $edit = Skills::findOrFail($id);
        // return view('admin.skills.edit', compact('edit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $data = Skills::findOrFail($id);
        $request->validate([
            'skill_name' => 'required|string',
            'level' => 'required',
            'category' => 'required'
        ]);
        $data->update([
            'skill_name' => $request->skill_name,
            'skill_level' => $request->level,
            'skill_category' => $request->category,
        ]);

        return redirect()->route('skills');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Skills $skills)
    {
        $skills->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'Skill deleted successfully'
        ]);
    }
}
