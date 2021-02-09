@extends('layouts.app')
@section('content')
    <div class="card-body">
        <table class="table">
            <tr>
                <th>{{ __('messages.title') }}</th>
                <th>{{ __('messages.description') }}</th>
                <th>{{ __('messages.employees') }}</th>
                <th>{{ __('messages.actions') }}</th>
            </tr>
            @foreach ($projects as $project)
                <tr>
                    <td>{{ $project->title }}</td>
                    <td>{{ $project->description }}</td>
                    <td class="max-width">{{ $project->names }}</td>
                    <td>
                        <form action={{ route('project.destroy', $project->id) }} method="POST">
                            <a class="btn btn-success"
                                href={{ route('project.edit', $project->id) }}>{{ __('messages.edit') }}</a>
                            @csrf @method('delete')
                            <input type="submit" class="btn btn-danger" value="{{ __('messages.delete') }}" />
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
        <div>
            <a href="{{ route('project.create') }}" class="btn btn-success">{{ __('messages.add') }}</a>
        </div>
        @if ($errors->any())
            <h4 class="error">{{ $errors->first() }}</h4>
        @endif
    </div>
@endsection
