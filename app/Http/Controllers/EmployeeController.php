<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        return view('employees.index', ['employees' => Employee::orderBy('surname')->get()]);
    }

    public function create()
    {
        $projects = \App\Models\Project::orderBy('title')->get();
        return view('employees.create', ['projects' => $projects]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'surname' => 'required',
            'project_id' => 'required',
        ]);

        $employee = new Employee();
        $employee->fill($request->all());
        $employee->save();
        return redirect()->route('employee.index');
    }

    public function edit(Employee $employee)
    {
        $projects = \App\Models\Project::orderBy('title')->get();
        return view('employees.edit', ['employee' => $employee, 'projects' => $projects]);
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:employees,name,' . $id . ',id|max:5',
            'surname' => 'required',
            'project_id' => 'required',
        ]);

        $employee = \App\Models\Employee::find($id);
        $employee->title = $request['title'];
        $employee->text = $request['text'];
        return ($employee->save() !== 1) ?
            redirect('/posts/' . $id)->with('status_success', 'Post updated!') :
            redirect('/posts/' . $id)->with('status_error', 'Post was not updated!');
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->route('employee.index');
    }
}
