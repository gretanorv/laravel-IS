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
            'name' => 'required:employees,name,' . $id . ',id',
            'surname' => 'required',
            'project_id' => 'required',
        ]);

        $employee = \App\Models\Employee::find($id);
        $employee->fill($request->all());
        $employee->save();
        return redirect()->route('employee.index');
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->route('employee.index');
    }
}
