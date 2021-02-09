<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = DB::table('projects')
            ->leftJoin('employees', 'projects.id', '=', 'employees.project_id')
            ->select('projects.id', 'projects.title', 'projects.description', DB::raw('group_concat(" ", employees.name, " ", employees.surname) as names'))
            ->groupBy('projects.id')
            ->get();
        return view('projects.index', ['projects' => $projects]);
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
            'title' => 'required|unique:projects,title,' . $id . ',id',
        ]);

        $project = \App\Models\Project::find($id);
        $project->fill($request->all());
        $project->save();
        return redirect()->route('project.index');
    }

    public function destroy(Project $project)
    {
        if (count($project->employees)) {
            return back()->withErrors(['error' => ['Negalima ištrinti pojekto su priskirtais darbuotojais!']]);
        }

        $project->delete();
        return redirect()->route('project.index');
    }
}
