@extends('layouts.app')
@section('content')
    <div class="card-body">
        <table class="table">
            <tr>
                <th>Vardas</th>
                <th>Pavardė</th>
                <th>Projektas</th>
                <th>Veiksmai</th>
            </tr>
            @foreach ($employees as $employee)
                <tr>
                    <td>{{ $employee->name }}</td>
                    <td>{{ $employee->surname }}</td>
                    <td>{{ $employee->project->title }}</td>
                    <td>
                        <form action={{ route('employee.destroy', $employee->id) }} method="POST">
                            <a class="btn btn-success" href={{ route('employee.edit', $employee->id) }}>Redaguoti</a>
                            @csrf @method('delete')
                            <input type="submit" class="btn btn-danger" value="Trinti" />
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
        <div>
            <a href="{{ route('employee.create') }}" class="btn btn-success">Pridėti</a>
        </div>
    </div>
@endsection
