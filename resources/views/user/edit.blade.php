@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h2 class="text-2xl font-bold mb-4">Edit Data User</h2>

    <form id="user-form" action="{{ route('user.update', $user->id) }}" method="POST" class="bg-white p-6 rounded shadow-md">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block font-medium">Nama</label>
            <input type="text" name="name" class="w-full border p-2 rounded" value="{{ $user->name }}" required>
        </div>

        <div class="mb-4">
            <label class="block font-medium">Email</label>
            <input type="email" name="email" class="w-full border p-2 rounded" value="{{ $user->email }}" required>
        </div>

        <div class="mb-4">
            <label class="block font-medium">Password (biarkan kosong jika tidak diubah)</label>
            <input type="password" name="password" class="w-full border p-2 rounded">
        </div>

        <div class="mb-4">
            <label class="block font-medium">Jenis Kelamin</label>
            <select name="jenis_kelamin" class="w-full border p-2 rounded">
                <option value="L" {{ $user->jenis_kelamin == 'L' ? 'selected' : '' }}>Laki-laki</option>
                <option value="P" {{ $user->jenis_kelamin == 'P' ? 'selected' : '' }}>Perempuan</option>
            </select>
        </div>

        <div class="mb-4">
            <label class="block font-medium">Umur</label>
            <input type="number" name="umur" class="w-full border p-2 rounded" value="{{ $user->umur }}">
        </div>

        <div class="mb-4">
            <label class="block font-medium">Alamat</label>
                <textarea name="alamat" rows="2" class="w-full border p-2 rounded">{{ $user->alamat }}</textarea>
            </div>

        <div class="mb-4">
            <label class="block font-medium">Kelas</label>
            <input type="text" name="kelas" class="w-full border p-2 rounded" value="{{ $user->kelas }}">
        </div>

        <div class="mb-4">
            <label class="block font-medium">Sekolah</label>
            <input type="text" name="sekolah" class="w-full border p-2 rounded" value="{{ $user->sekolah }}">
        </div>

        <div class="mb-4">
            <label class="block font-medium">Role</label>
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
