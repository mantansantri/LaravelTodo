@extends('layouts.app')

@section('content')

    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2> Contoh tutorial CRUD Laravel 9</h2>
                </div>
                <div class="pull-right mb-2">
                    <a class="btn btn-success" href="{{ route('todos.create') }}"> Create Todo</a>
                </div>
            </div>
        </div>
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif
        <table class="table table-bordered">
            <tr>
                <th>S.No</th>
                <th>Nama Todo</th>
                <th>Tanggal Todo</th>
                <th width="280px">Action</th>
            </tr>
            @foreach ($todos as $todo)
            <tr>
                <td>{{ $todo->id }}</td>
                <td>{{ $todo->nama_todo }}</td>
                <td>{{ $todo->tanggal_todo }}</td>
                <td>
                    <form action="{{ route('todos.destroy',$todo->id) }}" method="Post">
                        <a class="btn btn-primary" href="{{ route('todos.edit',$todo->id) }}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
        {!! $todos->links() !!}
@endsection