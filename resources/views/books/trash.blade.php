@extends('layouts.app')

@section('title', 'Papelera de libros')

@section('content')
<div class="max-w-5xl mx-auto px-4 py-8">

    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-slate-800">
            📚 Papelera de libros
        </h1>

        <a href="{{ route('books.index') }}"
           class="text-sm text-slate-600 hover:text-slate-900">
            ← Volver al catálogo
        </a>
    </div>

    {{-- SI NO HAY LIBROS ELIMINADOS --}}
    @if($books->isEmpty())
        <div class="bg-yellow-50 border border-yellow-200 text-yellow-800 p-4 rounded">
            No hay libros eliminados todavía.
        </div>
    @else

        {{-- LISTA DE LIBROS ELIMINADOS --}}
        @foreach($books as $book)
            <div class="bg-white shadow rounded p-4 mb-3 flex justify-between items-center">

                <div>
                    <h2 class="font-bold text-lg">
                        {{ $book->title }}
                    </h2>

                    <p class="text-sm text-gray-600">
                        ISBN: {{ $book->isbn }}
                    </p>

                    <p class="text-xs text-red-500">
                        Eliminado el: {{ $book->deleted_at }}
                    </p>
                </div>

                {{-- BOTÓN RESTAURAR --}}
                <form method="POST" action="{{ route('books.restore', $book) }}">
                    @csrf
                    <button class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded">
                        Restaurar
                    </button>
                </form>

            </div>
        @endforeach

    @endif

</div>
@endsection