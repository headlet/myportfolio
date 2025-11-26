<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Project;
use App\Models\Skills;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $users = User::where('first_name', 'like', "Ajay")
            ->orwhere('last_name', 'like', "Bhayadyo")
            ->get();

        $user = $users->first();
        $project = Project::all();

        return view('admin.Profile.account', compact('user', 'project'));
    }

    public function indexdata(Request $request)
    {
        $users = User::where('first_name', 'like', "Ajay")
            ->orwhere('last_name', 'like', "Bhayadyo")
            ->get();

        $user = $users->first();

        $user_project = $user->project;
        $featured_proj = Project::FindorFail($user_project);
        $project = Project::all();
        $skill = Skills::all();
        return view('front_end.main', compact('user', 'project', 'skill', 'featured_proj'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function project() {
        $project = Project::all();
        return view('front_end.allproject', compact('project'));
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
    public function show(User $user)
    {
        return view("users.user_view", compact("user"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        
        return view('users.edit_user', compact("user"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $validation = $request->validate(
            [
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'username' => 'required|string|max:255',
                'email' => 'required|email',
                'introduction' => 'string|required',
                'description' => 'string|required',
                'github' => 'string|required',
                'facebook' => 'string|required',
                'linkedin' => 'string|required',
                // 'password' => 'required',
                'location' => 'string|required',
                'profile_picture' => 'nullable|mimes:jpg,jpeg,png,gif|max:2048',
                'project' => 'required|string',
                'experience' => 'required|string',





            ]
        );

        if ($request->hasFile('profile_picture')) {
            if ($user->profile_picture && Storage::disk('public')->exists($user->profile_picture)) {
                Storage::disk('public')->delete($user->profile_picture);
            }

            $path = $request->file('profile_picture')->store('User', "public");
            $validation['profile_picture'] = $path;
        }

        // if ($request->hasFile('profile_picture')) {

        //     $filePath = public_path('image/' . $user->profile_picture);

        //     if ($user->profile_picture && file_exists($filePath)) {
        //         unlink($filePath);
        //     }


        //     $file = $request->file('profile_picture');
        //     $filename = time() . '.' . $file->getClientOriginalExtension();
        //     $file->move(public_path('image'), $filename);
        //     $validation['profile_picture'] = $filename;
        // }

        $user->update($validation);

        return redirect()->route('profile')->with('success', 'User data updated successfully');
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        $user = User::where('fullname', 'like', "%{$query}%")->orWhere('username', 'like', "%{$query}%")->get();
        return response()->json($user);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();

        return response()->json(['success' => true]);
    }
}
