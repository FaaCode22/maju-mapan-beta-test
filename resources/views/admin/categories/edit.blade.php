@extends('layouts.admin')

@section('title', 'Edit Kategori')

@section('content')
<h1 class="text-2xl font-bold">Edit Kategori</h1>

<form action="{{ route('admin.categories.update', $category) }}" method="POST" class="mt-8 max-w-lg rounded-2xl bg-white p-8 shadow space-y-5">
    @csrf @method('PUT')
    <div>
        <label class="block font-medium mb-2">Nama *</label>
        <input type="text" name="name" value="{{ old('name', $category->name) }}" required class="w-full rounded-xl border border-gray-200 px-4 py-3">
    </div>
    <div>
        <label class="block font-medium mb-2">Slug</label>
        <input type="text" name="slug" value="{{ old('slug', $category->slug) }}" class="w-full rounded-xl border border-gray-200 px-4 py-3">
    </div>
    <div>
        <label class="block font-medium mb-2">Icon</label>
        <select name="icon" class="w-full rounded-xl border border-gray-200 px-4 py-3">
            @foreach(['temperature','humidity','ph','barn','pond','pump','sensor'] as $icon)
                <option value="{{ $icon }}" @selected(old('icon', $category->icon) === $icon)>{{ $icon }}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="rounded-xl bg-brand-500 px-8 py-3 font-semibold text-white hover:bg-brand-600">Perbarui</button>
</form>
@endsection
