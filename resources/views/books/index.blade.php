@extends('layouts.app')
 
@section('title', 'Catálogo')
 
@section('content')
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-3xl font-bold text-slate-900">Catálogo de Libros</h1>
        <a href="{{ route('books.create') }}"
           class="bg-slate-900 hover:bg-slate-800 text-white px-4 py-2 rounded
                  text-sm font-medium">
            + Registrar Libro
        </a>
    </div>
 
    @if($books->isEmpty())
        <p class="text-slate-500 italic">Aún no hay libros registrados.</p>
    @else
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @foreach($books as $book)
                <x-book-card :book="$book" />
            @endforeach
        </div>
 
        <div class="mt-8">
            {{ $books->links() }}
        </div>
    <a href="{{ route('books.trash') }}"
        class="inline-flex items-center gap-2 bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg shadow-md transition duration-200">

        {{-- Ícono --}}
        <svg xmlns="http://www.w3.org/2000/svg"
            class="h-5 w-5"
            viewBox="0 0 24 24"
            fill="currentColor">
            <path d="M9 3V4H4V6H5V19C5 20.1 5.9 21 7 21H17C18.1 21 19 20.1 19 19V6H20V4H15V3H9ZM7 6H17V19H7V6Z"/>
        </svg>

        Papelera
    </a>
@endsection
