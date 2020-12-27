@extends('layouts.master_container')

@section('styles')

@endsection

@section('contents')
<table class="table mt-2">
    <thead class="thead-dark">
        <tr>
            <th></th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($permisos as $p)
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
