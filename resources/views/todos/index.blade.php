@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col col-md-6 p-4">
                <div style="text-align: center">
                    <h2>Tareas</h2>
                </div>
                <br>
                <div>
                    <form action="{{ route('todos.store') }}" method="POST">
                        @csrf
                        @if (session('success'))
                            <h6 class="alert alert-success">{{ session('success') }}</h6>
                        @endif
                        @error('title')
                            <h6 class="alert alert-danger">{{ $message }}</h6>
                        @enderror
                        <div class="mb-3">
                            <label for="title" class="form-label"><strong>Título</strong></label>
                            <input type="text" name="title" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="category_id" class="form-label"><strong>Categoría</strong></label>
                            <select name="category_id" class="form-select">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Crear</button>
                    </form>
                </div>
                <div>
                    <br>
                    @foreach ($todos as $todo)
                        <div class="row py-1">
                            <div class="col-md-9 d-flex align-items-center">
                                <a href="{{ route('todos.edit', ['todo' => $todo->id]) }}">{{ $todo->title }}</a>
                            </div>
                            <div class="col-md-3 d-flex justify-content-end">
                                <form action="{{ route('todos.destroy', ['todo' => $todo->id]) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-danger btn-sm">Borrar</button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
