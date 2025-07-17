@extends('layouts.app')

@section('content')
<main class="h-full overflow-y-auto">
  <div class="container px-6 py-8 mx-auto">
    <h2 class="text-2xl font-bold text-center text-gray-800 dark:text-gray-100 mb-6">
      Kelola Data Kelurahan
    </h2>

    {{-- Tombol Tambah Kelurahan --}}
    <div class="flex justify-end mb-4">
      <a href="{{ route('kelurahan.create') }}"
         class="px-4 py-2 bg-purple-600 text-white rounded hover:bg-purple-700">
        ➕ Tambah Kelurahan
      </a>
    </div>

    {{-- Tabel --}}
    <div class="overflow-auto bg-white dark:bg-gray-800 rounded-lg shadow">
      <table class="w-full text-sm text-center">
        <thead class="bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-200 uppercase">
          <tr>
            <th class="px-3 py-2">No</th>
            <th class="px-3 py-2">Nama Kelurahan</th>
            <th class="px-3 py-2">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($kelurahan as $index => $item)
            <tr class="border-t dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700">
              <td class="px-3 py-2">{{ $index + 1 }}</td>
              <td class="px-3 py-2">{{ $item->nama }}</td>
              <td class="px-3 py-2 space-x-2">
                <a href="{{ route('kelurahan.edit', $item->id) }}"
                   class="px-2 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600">
                  ✏️ Edit
                </a>
                <form id="delete-form-{{ $item->id }}" action="{{ route('kelurahan.destroy', $item->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin ingin menghapus kelurahan ini?')">
                  @csrf
                  @method('DELETE')
                  <button type="button"
                        class="px-2 py-1 bg-red-600 text-white rounded hover:bg-red-700"
                        onclick="confirmDelete({{ $item->id }})">
                    🗑️ Hapus
                  </button>

                </form>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="3" class="px-3 py-4 text-center text-gray-500 dark:text-gray-400">Belum ada data kelurahan.</td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
</main>

<script>
  function confirmDelete(id) {
    Swal.fire({
      title: 'Yakin ingin menghapus?',
      text: "Data kelurahan yang dihapus tidak bisa dikembalikan!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#e3342f',
      cancelButtonColor: '#6c757d',
      confirmButtonText: 'Ya, hapus!',
      cancelButtonText: 'Batal'
    }).then((result) => {
      if (result.isConfirmed) {
        document.getElementById('delete-form-' + id).submit();
      }
    });
  }
</script>

@endsection
