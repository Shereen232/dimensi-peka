@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-100 py-8 px-4">
    <div class="w-full max-w-md bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">Edit Pertanyaan</h2>

        <form action="{{ route('pertanyaan.update', $pertanyaan->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <!-- Kode -->
            <div>
                <label for="kode" class="block text-sm font-medium text-gray-700">Kode</label>
                <input type="text" name="kode" id="kode" required
                       value="{{ old('kode', $pertanyaan->kode) }}"
                       class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-3 py-2 focus:ring-blue-500 focus:border-blue-500">
                @error('kode')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Pertanyaan -->
            <div>
                <label for="pertanyaan" class="block text-sm font-medium text-gray-700">Pertanyaan</label>
                <input type="text" name="pertanyaan" id="pertanyaan" required
                       value="{{ old('pertanyaan', $pertanyaan->pertanyaan) }}"
                       class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-3 py-2 focus:ring-blue-500 focus:border-blue-500">
                @error('pertanyaan')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Kategori -->
            <div>
                <label for="kategori" class="block text-sm font-medium text-gray-700">Kategori</label>
                <select name="kategori" id="kategori" required
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-3 py-2 focus:ring-blue-500 focus:border-blue-500">
                    <option value="">-- Pilih Kategori --</option>
                    <option value="E" {{ old('kategori', $pertanyaan->kategori) == 'E' ? 'selected' : '' }}>E (Emosional)</option>
                    <option value="P" {{ old('kategori', $pertanyaan->kategori) == 'P' ? 'selected' : '' }}>P (Teman Sebaya)</option>
                    <option value="H" {{ old('kategori', $pertanyaan->kategori) == 'H' ? 'selected' : '' }}>H (Hiperaktivitas)</option>
                    <option value="C" {{ old('kategori', $pertanyaan->kategori) == 'C' ? 'selected' : '' }}>C (Perilaku)</option>
                    <option value="Pro" {{ old('kategori', $pertanyaan->kategori) == 'Pro' ? 'selected' : '' }}>Pro (Prososial)</option>
                </select>
                @error('kategori')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Tombol Simpan -->
            <div class="flex justify-end">
                <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-4 py-2 rounded-md shadow">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
