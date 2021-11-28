@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col col-md-6 p-4">
                <div style="text-align: center">
                    <h2>Editar categoría</h2>
                </div>
                <br>
                <div>
                    <form action="{{ route('categories.update', ['category' => $category->id]) }}" method="POST">
                        @method('PATCH')
                        @csrf
                        @if (session('success'))
                            <h6 class="alert alert-success">{{ session('success') }}</h6>
                        @endif
                        @error('title')
                            <h6 class="alert alert-danger">{{ $message }}</h6>
                        @enderror
                        <div class="mb-3">
                            <label for="name" class="form-label"><strong>Nombre</strong></label>
                            <input type="text" name="name" class="form-control" value="{{ $category->name }}">
                        </div>
                        <div class="mb-3">
                            <label for="color" class="form-label"><strong>Color</strong></label>
                            <input type="color" name="color" class="form-control" value="{{ $category->color }}">
                        </div>
                        <button type="submit" class="btn btn-primary">Editar</button>
                    </form>
                </div>
                <div>
                    <br>
                    @if ($category->todos->count() > 0)
                        @foreach ($category->todos as $todo)
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
                    @else
                        <div>
                            <p>No hay tareas en esta categoría</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
