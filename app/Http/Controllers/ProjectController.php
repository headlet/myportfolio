<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $sort = $request->get('sort', 'id');
        $direction = $request->get('direction', 'asc');

        $datas = Project::when($search, function ($query, $search) {
            $query->where('name', 'like', "%{$search}%")
                ->orWhere('description', 'like', "%{$search}%")
                ->orWhere('status', 'like', "%{$search}%");
        })
            ->orderBy($sort, $direction)
            ->get();

        return view('admin.projects', compact('datas'));
    }



    public function create_form()
    {
        return view('admin.projects.create');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'status' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'source' => 'required|string|max:255',
            'live' => 'string|max:255|nullable',
            'start_date' => 'required|date|before:end_date',
            'end_date' => 'nullable|date|after:start_date',
        ]);

        $filename = null;

        if ($request->hasFile('image')) {
            // save in storage/app/public/uploads/projects
            $filename = $request->file('image')->store('uploads/projects', 'public');
        }

        Project::create([
            'name' => $request->name,
            'description' => $request->description,
            'status' => $request->status,
            'image' => $filename,
            'source' => $request->source,
            'live' => $request->live,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);

        return redirect()->route('project')->with('message', 'New project added successfully');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $edit = Project::findOrFail($id);
        return view('admin.projects.view', compact('edit'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $edit = Project::findOrFail($id);
        return view('admin.projects.edit', compact('edit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Project::findOrFail($id);
        $filename = $data->image;
        //
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'status' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'source' => 'required|string|max:255',
            'live' => 'string|max:255|nullable',
            'start_date' => 'required|date|before:end_date',
            'end_date' => 'nullable|date|after:start_date',
        ]);

        if ($request->hasFile('image')) {
            if ($data->image && Storage::disk('public')->exists($data->image)) {
                Storage::disk('public')->delete($data->image);
            }
            $filename = $request->file('image')->store('uploads/projects', 'public');
        }

        $data->update([
            'name' => $request->name,
            'description' => $request->description,
            'status' => $request->status,
            'image' => $filename,
            'source' => $request->source,
            'live' => $request->live,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);

        return redirect()->route('project')->with('message', 'Projects info updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $project = Project::findOrFail($id);

        // If project has image, delete it too
        if ($project->image && file_exists(public_path('uploads/projects/' . $project->image))) {
            unlink(public_path('uploads/projects/' . $project->image));
        }

        $project->delete();

        return response()->json(['status' => 'success', 'message' => 'Project deleted successfully']);
    }
}
