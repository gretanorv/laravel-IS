@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Sukurkime darbuotoją:</div>
                    <div class="card-body">
                        <form action="{{ route('employee.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="">Vardas: </label>
                                <input type="text" name="name" id="name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Pavardė: </label>
                                <input type="text" name="surname" id="surname" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Projektas: </label>
                                <select name="project_id" id="project_id" class="form-control">
                                    <option value="" selected disabled>Pasirinkite projektą</option>
                                    @foreach ($projects as $project)
                                        <option value="{{ $project->id }}">{{ $project->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
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
