@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto">

    <div class="flex justify-between mb-4">
        <h1 class="text-2xl font-bold">Categorías</h1>
        <a href="{{ route('categories.create') }}" class="bg-indigo-600 text-white px-4 py-2 rounded">
            Nueva categoría
        </a>
    </div>

    @foreach($categories as $category)
        <div class="flex justify-between p-3 bg-white shadow mb-2 rounded">
            <div class="flex items-center gap-2">
                <span class="w-4 h-4 rounded-full" style="background-color: {{ $category->color }}"></span>
                {{ $category->name }}
            </div>

            <div class="flex gap-2">
                <a href="{{ route('categories.edit', $category) }}">Editar</a>

                <form method="POST" action="{{ route('categories.destroy', $category) }}">
                    @csrf @method('DELETE')
                    <button>Eliminar</button>
                </form>
            </div>
        </div>
    @endforeach

</div>
@endsection