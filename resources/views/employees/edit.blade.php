@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('messages.edit_employee') }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('employee.update', $employee->id) }}">
                            @csrf @method("PUT")
                            <div class="form-group">
                                <label for="">{{ __('messages.name') }}: </label>
                                <input type="text" name="name" id="name" class="form-control"
                                    value="{{ $employee->name }}">
                            </div>
                            <div class="form-group">
                                <label for="">{{ __('messages.surname') }}: </label>
                                <input type="text" name="surname" id="surname" class="form-control"
                                    value="{{ $employee->surname }}">
                            </div>
                            <div class="form-group">
                                <label>{{ __('messages.project') }}: </label>
                                <select name="project_id" id="project_id" class="form-control">
                                    @foreach ($projects as $project)
                                        <option value="{{ $project->id }}" @if ($project->id == $employee->project_id) selected="selected" @endif>
                                            {{ $project->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">{{ __('messages.save') }}</button>
                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            @error('surname')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            @error('project_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
