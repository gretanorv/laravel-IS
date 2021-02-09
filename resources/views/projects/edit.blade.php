@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('messages.edit_project') }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('project.update', $project->id) }}">
                            @csrf @method("PUT")
                            <div class="form-group">
                                <label for="">{{ __('messages.title') }}</label>
                                <input type="text" name="title" id="title" class="form-control"
                                    value="{{ $project->title }}">
                            </div>
                            <div class="form-group">
                                <label for="">{{ __('messages.description') }}</label>
                                <textarea type="text" name="description" rows=10 cols=100
                                    class="form-control">{{ $project->description }}</textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">{{ __('messages.save') }}</button>
                            @error('title')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
