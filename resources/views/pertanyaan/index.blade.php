@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-100 py-8 px-4">
    <div class="w-full max-w-5xl bg-white p-6 rounded-lg shadow-md">
        
        <!-- Judul -->
        <div class="mb-4">
            <h2 class="text-3xl font-bold text-center text-gray-800">Daftar Pertanyaan</h2>
        </div>

        <!-- Tombol Tambah -->
        <div class="flex justify-end mb-4">
            <a href="{{ route('pertanyaan.create') }}"
               class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md shadow inline-flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                     viewBox="0 0 24 24" stroke="currentColor">
                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                           d="M12 4v16m8-8H4"/>
                </svg>
                Tambah Pertanyaan
            </a>
        </div>

        <!-- Tabel -->
        <div class="overflow-x-auto">
            <table class="min-w-full border border-gray-300 rounded-md">
                <thead class="bg-gray-200 text-gray-700">
                    <tr>
                        <th class="py-3 px-4 text-left border-b">ID</th>
                        <th class="py-3 px-4 text-left border-b">Kode</th>
                        <th class="py-3 px-4 text-left border-b">Pertanyaan</th>
                        <th class="py-3 px-4 text-left border-b">Kategori</th>
                        <th class="py-3 px-4 text-left border-b">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-gray-800">
                    @forelse($pertanyaans as $p)
                    <tr class="hover:bg-gray-50">
                        <td class="py-2 px-4 border-b">{{ $loop->iteration }}</td>
                        <td class="py-2 px-4 border-b">{{ $p->kode }}</td>
                        <td class="py-2 px-4 border-b">{{ $p->pertanyaan }}</td>
                        <td class="py-2 px-4 border-b">{{ $p->kategori }}</td>
                        <td class="py-2 px-4 border-b">
                            <div class="flex items-center gap-2">
                                <!-- Tombol Edit -->
                                <a href="{{ route('pertanyaan.edit', $p->id) }}"
                                class="inline-flex items-center px-3 py-1.5 text-sm font-medium text-white bg-indigo-500 rounded hover:bg-indigo-600 transition">
                                    ✏️ Edit
                                </a>

                                <!-- Tombol Aktif / Nonaktif -->
                                <form action="{{ route('pertanyaan.destroy', $p->id) }}" method="POST"
                                    onsubmit="return confirm('Yakin ingin mengubah status pertanyaan ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="inline-flex items-center px-3 py-1.5 text-sm font-medium text-white rounded transition
                                                {{ $p->deleted_at ? 'bg-green-600 hover:bg-green-700' : 'bg-red-600 hover:bg-red-700' }}">
                                        {{ $p->deleted_at ? '🟢 Aktifkan' : '🔴 Nonaktifkan' }}
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="py-4 text-center text-gray-500">Belum ada pertanyaan tersedia.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
