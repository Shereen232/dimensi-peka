@extends('layouts.app')

@section('content')

<main class="h-full overflow-y-auto">
    <div class="container mx-auto px-6">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Daftar User
        </h2>

        <!-- Tombol tambah data -->
        <div class="flex justify-end mb-4">
            <a href="{{ route('user.create') }}"
                class="px-3 py-2 text-sm font-medium leading-5 text-white bg-purple-600 rounded-lg shadow-md hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                + Tambah Data
            </a>
        </div>

        <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                        <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase bg-gray-50 dark:bg-gray-800 dark:text-gray-400">
                            <th class="px-4 py-3">no</th>
                            <th class="px-4 py-3">name</th>
                            <th class="px-4 py-3">Email</th>
                            <th class="px-4 py-3">Role</th>
                            <th class="px-4 py-3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                        @foreach($users as $index => $user)
                        <tr class="text-gray-700 dark:text-gray-400">
                            <td class="px-4 py-3 text-sm">{{ $index + 1 }}</td>
                            <td class="px-4 py-3 text-sm">{{ $user->name }}</td>
                            <td class="px-4 py-3 text-sm">{{ $user->email }}</td>
                            <td class="px-4 py-3 text-sm capitalize">{{ $user->role }}</td>
                            <td class="px-4 py-3 text-sm">
                                <div class="flex items-center space-x-2">
                                    <a href="{{ route('user.edit', $user->id) }}" class="px-2 py-1 text-sm text-white bg-blue-600 rounded hover:bg-blue-700">Edit</a>
                                    <form id="toggle-form-{{ $user->id }}" action="{{ route('user.destroy', $user->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button"
                                            onclick="confirmToggle({{ $user->id }}, '{{ $user->deleted_at ? 'aktifkan' : 'nonaktifkan' }}')"
                                            class="px-2 py-1 text-sm text-white rounded transition
                                                {{ $user->deleted_at ? 'bg-green-600 hover:bg-green-700' : 'bg-red-600 hover:bg-red-700' }}">
                                            {{ $user->deleted_at ? 'Aktifkan' : 'Nonaktifkan' }}
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach

                        @if($users->isEmpty())
                        <tr>
                            <td colspan="5" class="px-4 py-3 text-center text-gray-500">Tidak ada data user.</td>
                        </tr>
                        @endif
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
