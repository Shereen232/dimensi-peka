@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h2 class="text-2xl font-bold mb-4">Edit Data User</h2>

    <form id="user-form" action="{{ route('user.update', $user->id) }}" method="POST" class="bg-white p-6 rounded shadow-md">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="username" class="block font-medium">Username</label>
            <input type="text" name="username" class="w-full border p-2 rounded" value="{{ $user->username }}" required>
        </div>

        <div class="mb-4">
            <label for="email" class="block font-medium">Email</label>
            <input type="email" name="email" class="w-full border p-2 rounded" value="{{ $user->email }}" required>
        </div>

        <div class="mb-4">
            <label for="password" class="block font-medium">Password (Biarkan kosong jika tidak diubah)</label>
            <input type="password" name="password" class="w-full border p-2 rounded">
        </div>

        <div class="mb-4">
            <label for="role" class="block font-medium">Role</label>
            <select name="role" class="w-full border p-2 rounded" required>
                <option value="Admin" {{ $user->role == 'Admin' ? 'selected' : '' }}>Admin</option>
                <option value="Pengguna" {{ $user->role == 'Pengguna' ? 'selected' : '' }}>Pengguna</option>
            </select>
        </div>

        <button type="submit" class="bg-purple-600 text-white px-4 py-2 rounded hover:bg-purple-700">
            Update
        </button>
    </form>
</div>

<script>
    function confirmSubmit() {
        Swal.fire({
            title: 'Simpan data?',
            text: "Pastikan data sudah benar.",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#aaa',
            confirmButtonText: 'Ya, simpan!'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('user-form').submit(); // pastikan form kamu punya id ini
            }
        })
    }
</script>
@endsection
