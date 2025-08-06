@extends('layouts.app')

@section('content')
<main class="h-full overflow-y-auto">
  <div class="container px-6 py-8 mx-auto">
    <h2 class="text-2xl font-bold text-gray-700 dark:text-gray-100 mb-6">Detail User</h2>

    {{-- <div class="mb-4">
      <a href="{{ route('user.create') }}" class="bg-purple-600 hover:bg-purple-700 text-white px-4 py-2 rounded">
        + Tambah Data
      </a>
    </div> --}}

    <div class="w-full overflow-hidden rounded-lg shadow-xs">
      <div class="w-full overflow-x-auto">
        <table class="w-full text-sm text-left text-gray-700 dark:text-gray-300 border rounded-lg overflow-hidden">
          <thead class="text-xs uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-300">
            <tr
              class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-300">
              <th class="px-4 py-3">No</th>
              <th class="px-4 py-3">NIK</th>
              <th class="px-4 py-3">Nama</th>
              <th class="px-4 py-3">Jenis Kelamin</th>
              <th class="px-4 py-3">Alamat</th>
              <th class="px-4 py-3">Kelurahan</th>
              <th class="px-4 py-3">Sekolah</th>
              <th class="px-4 py-3">Action</th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
            @foreach($users as $i => $user)
            <tr class="text-gray-700 dark:text-gray-300">
              <td class="px-4 py-3 text-sm">{{ $i + 1 }}</td>
              <td class="px-4 py-3 text-sm">{{ $user->nik }}</td>
              <td class="px-4 py-3 text-sm">{{ $user->name }}</td>
              <td class="px-4 py-3 text-sm">{{ $user->jenis_kelamin }}</td>
              <td class="px-4 py-3 text-sm">{{ $user->alamat }}</td>
              <td class="px-4 py-3 text-sm">{{ $user->kelurahan }}</td>
              <td class="px-4 py-3 text-sm">{{ $user->sekolah }}</td>
              <td class="px-4 py-3">
                <div class="flex items-center gap-2 justify-center">
                  <!-- Edit Button -->
                  <a href="{{ route('user.edit', $user->id) }}"
                    class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1.5 rounded text-xs font-medium transition">
                    ✏️ Edit
                  </a>

                  <!-- Aktif/Nonaktif Button -->
                  <form id="toggle-form-{{ $user->id }}" action="{{ route('user.destroy', $user->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="button"
                            onclick="confirmToggle({{ $user->id }}, '{{ $user->deleted_at ? 'aktifkan' : 'nonaktifkan' }}')"
                            class="px-3 py-1.5 text-xs font-medium text-white rounded transition
                                  {{ $user->deleted_at ? 'bg-green-600 hover:bg-green-700' : 'bg-red-600 hover:bg-red-700' }}">
                      {{ $user->deleted_at ? 'Aktifkan' : 'Nonaktifkan' }}
                    </button>
                  </form>
                </div>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function confirmToggle(userId, actionText) {
        Swal.fire({
            title: 'Yakin ingin ' + actionText + ' user ini?',
            text: "Tindakan ini dapat dibatalkan.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Ya, ' + actionText + '!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('toggle-form-' + userId).submit();
            }
        });
    }
</script>
@endsection
