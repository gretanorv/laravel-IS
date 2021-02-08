<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        return view('projects.index', ['projects' => Project::orderBy('title')->get()]);
    }

    public function create()
    {
        return view('projects.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|unique:projects',
        ]);

        $project = new Project();
        $project->fill($request->all());
        $project->save();
        return ($project->save() !== 1) ?
            redirect('/posts')->with('status_success', 'Post created!') :
            redirect('/posts')->with('status_error', 'Post was not saved in DB!');
    }

    public function edit(Project $project)
    {
        return view('projects.edit', ['project' => $project]);
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
            'title' => 'required|unique:projects,title,' . $id . ',id|max:5',
        ]);

        $project = \App\Models\Project::find($id);
        $project->title = $request['title'];
        $project->text = $request['text'];
        return ($project->save() !== 1) ?
            redirect('/posts/' . $id)->with('status_success', 'Post updated!') :
            redirect('/posts/' . $id)->with('status_error', 'Post was not updated!');
    }

    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('project.index');
    }
}
