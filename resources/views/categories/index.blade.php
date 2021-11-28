@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col col-md-6 p-4">
                <div style="text-align: center">
                    <h2>Categorías</h2>
                </div>
                <br>
                <div>
                    <form action="{{ route('categories.store') }}" method="POST">
                        @csrf
                        @if (session('success'))
                            <h6 class="alert alert-success">{{ session('success') }}</h6>
                        @endif
                        @error('title')
                            <h6 class="alert alert-danger">{{ $message }}</h6>
                        @enderror
                        <div class="mb-3">
                            <label for="name" class="form-label"><strong>Nombre</strong></label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="color" class="form-label"><strong>Color</strong></label>
                            <input type="color" name="color" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary">Crear</button>
                    </form>
                </div>
                <div>
                    <br>
                    @foreach ($categories as $category)
                        <div class="row py-1">
                            <div class="col-md-9 d-flex align-items-center">

                                <a href="{{ route('categories.edit', ['category' => $category->id]) }}">
                                    <span class="color-container"
                                        style="background-color: {{ $category->color }};"></span>
                                    {{ $category->name }}</a>
                            </div>
                            <div class="col-md-3 d-flex justify-content-end">
                                <!-- Button trigger modal -->
                                <button class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#modal-{{ $category->id }}">Borrar</button>
                                <!-- Modal -->
                                <div class="modal fade" id="modal-{{ $category->id }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Confirmar borrado</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Se borrarán las tareas asociadas a la categoría.
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Cancelar</button>
                                                <form
                                                    action="{{ route('categories.destroy', ['category' => $category->id]) }}"
                                                    method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger">Borrar</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
