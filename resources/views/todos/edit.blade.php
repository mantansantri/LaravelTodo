<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Edit Company Form – Tutorial CRUD Laravel 9 </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Edit Todo</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('todos.index') }}" enctype="multipart/form-data">Kembali</a>
                </div>
            </div>
        </div>
        @if(session('status'))
        <div class="alert alert-success mb-1 mt-1">
            {{ session('status') }}
        </div>
        @endif
        <form action="{{ route('todos.update',$todo->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Todo Name:</strong>
                        <input type="text" name="nama_todo" value="{{ $todo->nama_todo }}" class="form-control" placeholder="Nama Todo">
                        @error('nama_todo')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Todo Date:</strong>
                        <input type="date" name="tanggal_todo" class="form-control" placeholder="Tanggal Todo" value="{{ $todo->tanggal_todo }}">
                        @error('tanggal_todo')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <button type="submit" class="btn btn-primary ml-3">Submit</button>
            </div>
        </form>
    </div>
</body>

</html>