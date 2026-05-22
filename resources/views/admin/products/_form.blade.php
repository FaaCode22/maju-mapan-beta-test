<div class="grid gap-6 md:grid-cols-2">
    <div class="md:col-span-2">
        <label class="block font-medium mb-2">Nama Produk *</label>
        <input type="text" name="name" value="{{ old('name', $product->name ?? '') }}" required
               class="w-full rounded-xl border border-gray-200 px-4 py-3">
    </div>
    <div>
        <label class="block font-medium mb-2">Slug</label>
        <input type="text" name="slug" value="{{ old('slug', $product->slug ?? '') }}" placeholder="Auto dari nama"
               class="w-full rounded-xl border border-gray-200 px-4 py-3">
    </div>
    <div>
        <label class="block font-medium mb-2">Kategori *</label>
        <select name="category_id" required class="w-full rounded-xl border border-gray-200 px-4 py-3">
            @foreach($categories as $cat)
                <option value="{{ $cat->id }}" @selected(old('category_id', $product->category_id ?? '') == $cat->id)>{{ $cat->name }}</option>
            @endforeach
        </select>
    </div>
    <div>
        <label class="block font-medium mb-2">Harga (Rp) *</label>
        <input type="number" name="price" value="{{ old('price', $product->price ?? 0) }}" required min="0"
               class="w-full rounded-xl border border-gray-200 px-4 py-3">
    </div>
    <div class="flex items-center gap-2 pt-8">
        <input type="checkbox" name="is_featured" value="1" id="is_featured" @checked(old('is_featured', $product->is_featured ?? false))>
        <label for="is_featured">Produk Unggulan</label>
    </div>
    <div class="md:col-span-2">
        <label class="block font-medium mb-2">Deskripsi Singkat *</label>
        <textarea name="short_description" rows="2" required class="w-full rounded-xl border border-gray-200 px-4 py-3">{{ old('short_description', $product->short_description ?? '') }}</textarea>
    </div>
    <div class="md:col-span-2">
        <label class="block font-medium mb-2">Deskripsi Lengkap *</label>
        <textarea name="description" rows="5" required class="w-full rounded-xl border border-gray-200 px-4 py-3">{{ old('description', $product->description ?? '') }}</textarea>
    </div>
    <div class="md:col-span-2">
        <label class="block font-medium mb-2">Spesifikasi</label>
        <textarea name="specification" rows="4" class="w-full rounded-xl border border-gray-200 px-4 py-3">{{ old('specification', $product->specification ?? '') }}</textarea>
    </div>
    <div class="md:col-span-2">
        <label class="block font-medium mb-2">Manfaat</label>
        <textarea name="benefits" rows="4" class="w-full rounded-xl border border-gray-200 px-4 py-3">{{ old('benefits', $product->benefits ?? '') }}</textarea>
    </div>
    <div>
        <label class="block font-medium mb-2">Thumbnail</label>
        <input type="file" name="thumbnail" accept="image/*" class="w-full">
        @if(isset($product) && $product->thumbnail)
            <img src="{{ $product->thumbnail_url }}" class="mt-2 h-24 rounded-lg object-cover">
        @endif
    </div>
    <div>
        <label class="block font-medium mb-2">Galeri (multiple)</label>
        <input type="file" name="images[]" accept="image/*" multiple class="w-full">
        @if(isset($product) && $product->images->count())
            <div class="mt-4 flex flex-wrap gap-3">
                @foreach($product->images as $image)
            {{-- SESUDAH --}}
            <div class="relative">
            <img src="{{ $image->url }}" class="h-20 w-20 rounded-lg object-cover">
            <button
                type="button"
                class="absolute -right-2 -top-2 rounded-full bg-red-500 px-2 text-xs text-white"
                onclick="deleteImage('{{ route('admin.product-images.destroy', $image) }}', this)">
        ×
            </button>
    </div>
                @endforeach
            </div>
        @endif
    </div>
</div>
