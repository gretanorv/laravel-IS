@extends('layouts.app')
@section('content')
    <div class="card-body">
        <table class="table">
            <tr>
                <th>ID</th>
                <th>Pavadinimas</th>
                <th>Aprašas</th>
                <th>Darbuotojai</th>
                <th>Veiksmai</th>
            </tr>
            {{-- {{ dump($projects) }} --}}

            @foreach ($projects as $project)
                <tr>
                    <td>{{ $project->id }}</td>
                    <td>{{ $project->title }}</td>
                    <td>{{ $project->description }}</td>
                    <td>{{ $project->name }} {{ $project->surname }}</td>
                    <td>
                        <form action={{ route('project.destroy', $project->id) }} method="POST">
                            <a class="btn btn-success" href={{ route('project.edit', $project->id) }}>Redaguoti</a>
                            @csrf @method('delete')
                            <input type="submit" class="btn btn-danger" value="Trinti" />
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
        <div>
            <a href="{{ route('project.create') }}" class="btn btn-success">Pridėti</a>
        </div>
    </div>
@endsection
