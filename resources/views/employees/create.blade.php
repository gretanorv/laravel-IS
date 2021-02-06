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
                                <input type="text" name="name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Pavardė: </label>
                                <input type="number" name="surname" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Projektas: </label>
                                <select name="project_id" id="" class="form-control">
                                    <option value="" selected disabled>Pasirinkite šalį</option>
                                    @foreach ($projects as $project)
                                        <option value="{{ $project->id }}">{{ $project->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
