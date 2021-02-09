@extends('layouts.app')
@section('content')
    <div class="card-body">
        <table class="table">
            <tr>
                <th>{{ __('messages.name') }}</th>
                <th>{{ __('messages.surname') }}</th>
                <th>{{ __('messages.project') }}</th>
                <th>{{ __('messages.actions') }}</th>
            </tr>
            @foreach ($employees as $employee)
                <tr>
                    <td>{{ $employee->name }}</td>
                    <td>{{ $employee->surname }}</td>
                    <td>{{ $employee->project->title }}</td>
                    <td>
                        <form action={{ route('employee.destroy', $employee->id) }} method="POST">
                            <a class="btn btn-success"
                                href={{ route('employee.edit', $employee->id) }}>{{ __('messages.edit') }}</a>
                            @csrf @method('delete')
                            <input type="submit" class="btn btn-danger" value="{{ __('messages.delete') }}" />
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
        <div>
            <a href="{{ route('employee.create') }}" class="btn btn-success">{{ __('messages.add') }}</a>
        </div>
    </div>
@endsection
