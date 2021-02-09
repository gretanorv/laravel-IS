@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('messages.create_project') }}</div>
                    <div class="card-body">
                        <form action="{{ route('project.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>{{ __('messages.title') }}: </label>
                                <input type="text" name="title" id="title" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>{{ __('messages.description') }}: </label>
                                <textarea id="mce" name="description" rows=10 cols=100 class="form-control"></textarea>
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
