@extends('layouts.app')

@section('content')
<div class="container">
    <table class="table" >
        <thead class="thead-dark">
            <tr>
                <th scope="col">Model</th>
                <th scope="col">ID</th>
                <th scope="col">Ação</th>
                <th scope="col">ID Usuário</th>
                <th scope="col">Usuário</th>
                <th scope="col">Data/Hora</th>
                <th scope="col">Anterior</th>
                <th scope="col">Atual</th>
            </tr>
        </thead>
        <tbody id="audits">
            @foreach($audits as $audit)
            <tr>
                <td>{{ $audit->auditable_type }}</td>
                <td>{{ $audit->auditable_id }}</td>
                <td>{{ $audit->event }}</td>
                <td>{{ $audit->user->id }}</td>
                <td>{{ $audit->user->name }}</td>
                <td>{{ $audit->created_at->format('d/m/Y H:i:s') }}</td>
                <td>
                    <table class="table">
                        @foreach($audit->old_values as $attribute => $value)
                        <tr>
                            <td><b>{{ $attribute }}</b></td>
                            <td>{{ $value }}</td>
                        </tr>
                        @endforeach
                    </table>
                </td>
                <td>
                    <table class="table">
                        @foreach($audit->new_values as $attribute => $value)
                        <tr>
                            <td><b>{{ $attribute }}</b></td>
                            <td>{{ $value }}</td>
                        </tr>
                        @endforeach
                    </table>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
</div>
@endsection