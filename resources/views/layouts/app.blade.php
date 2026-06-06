<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Inicio') - Biblioteca</title>

    {{-- Tailwind CSS --}}
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-slate-50 text-slate-800 min-h-screen flex flex-col">

    {{-- NAVBAR --}}
    <nav class="bg-slate-900 text-white shadow-md">
        <div class="container mx-auto px-4 py-3 flex items-center justify-between">

            <a href="{{ route('books.index') }}" class="font-bold text-lg">
                Biblioteca
            </a>

            <div class="flex gap-4">
                <a href="{{ route('books.index') }}">Catálogo</a>
                <a href="{{ route('authors.index') }}">Autores</a>
            </div>

        </div>
    </nav>

    {{-- CONTENIDO PRINCIPAL (ESTO ES LO QUE TE PIDIERON) --}}
    <main class="py-8">
        <div class="max-w-7xl mx-auto px-4">
            @include('partials._alerts')
        </div>

        @yield('content')
    </main>

    {{-- FOOTER --}}
    <footer class="bg-slate-900 text-white text-center p-4 mt-10">
        © {{ date('Y') }} Biblioteca
    </footer>

</body>
</html>