@php
    $isEdit = isset($category);
    $action = $isEdit
        ? route('categories.update', $category)
        : route('categories.store');

    $method = $isEdit ? 'PUT' : 'POST';
@endphp

<form method="POST" action="{{ $action }}" class="bg-white p-6 rounded shadow">
    @csrf
    @if($isEdit) @method('PUT') @endif

    <div>
        <label>Nombre</label>
        <input type="text" name="name"
               value="{{ old('name', $category->name ?? '') }}"
               class="border w-full p-2">
    </div>

    <div class="mt-3">
        <label>Color</label>
        <input type="color" name="color"
               value="{{ old('color', $category->color ?? '#000000') }}">
    </div>

    <button class="mt-4 bg-indigo-600 text-white px-4 py-2 rounded">
        Guardar
    </button>
</form>