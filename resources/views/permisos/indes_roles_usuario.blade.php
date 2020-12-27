@extends('layouts.master_container')

@section('styles')

@endsection

@section('contents')
<table class="table mt-2">
    <thead class="thead-dark">
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Ir a</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($permisos_roles_usuario as $p)
            <tr>
                <td>{{$p->}}</td>
                <td>{{$p->}}</td>
                <td>{{$p->}}</td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection

@section('scripts')

@endsection
