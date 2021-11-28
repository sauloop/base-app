@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col col-md-6 p-4">
                <div style="text-align: center">
                    <h2>Editar tarea</h2>
                </div>
                <br>
                <div>
                    <form action="{{ route('todos.update', ['todo' => $todo->id]) }}" method="POST">
                        @method('PATCH')
                        @csrf
                        @if (session('success'))
                            <h6 class="alert alert-success">{{ session('success') }}</h6>
                        @endif
                        @error('title')
                            <h6 class="alert alert-danger">{{ $message }}</h6>
                        @enderror
                        <div class="mb-3">
                            <label for="title" class="form-label"><strong>Título</strong></label>
                            <input type="text" name="title" class="form-control" value="{{ $todo->title }}">
                        </div>
                        <button type="submit" class="btn btn-primary">Editar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
