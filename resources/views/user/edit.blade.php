@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h2 class="text-2xl font-bold mb-4">Edit Data User</h2>

    <form id="user-form" action="{{ route('user.update', $user->id) }}" method="POST" class="bg-white p-6 rounded shadow-md">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="nik" class="block font-medium">NIK</label>
             <input type="text" name="name" class="w-full border p-2 rounded" value="{{ $user->nik }}" required>
        </div>

        <div class="mb-4">
            <label for="name" class="block font-medium">Nama</label>
            <input type="text" name="name" class="w-full border p-2 rounded" value="{{ $user->name }}" required>
        </div>

        <div class="mb-4">
            <label for="email" class="block font-medium">Email</label>
            <input type="email" name="email" class="w-full border p-2 rounded" value="{{ $user->email }}" required>
        </div>

        <div class="mb-4">
            <label for="password" class="block font-medium">Password (biarkan kosong jika tidak diubah)</label>
            <input type="password" name="password" class="w-full border p-2 rounded">
        </div>

        <div class="mb-4">
            <label for="umur" class="block font-medium">Umur</label>
            <input type="number" name="umur" class="w-full border p-2 rounded" value="{{ $user->umur }}">
        </div>

        <div class="mb-4">
            <label for="kelurahan" class="block font-medium">Kelurahan</label>
            <select name="kelurahan" class="w-full border p-2 rounded" required>
                <option value="" disabled>Pilih kelurahan</option>
                @foreach ([
                    'Bendan', 'Kramatsari', 'Tirto', 'Medono', 'Sokorejo', 'Noyontaan',
                    'Tondano', 'Klego', 'Pekalongan Selatan', 'Jenggot', 'Buaran',
                    'Kusuma Bangsa', 'Krapyak Kidul', 'Dukuh'
                ] as $kel)
                    <option value="{{ $kel }}" {{ $user->kelurahan == $kel ? 'selected' : '' }}>{{ $kel }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="alamat" class="block font-medium">Alamat</label>
            <textarea name="alamat" class="w-full border p-2 rounded" rows="2" required>{{ $user->alamat }}</textarea>
        </div>

        <div class="mb-4">
            <label for="kelas" class="block font-medium">Kelas</label>
            <input type="text" name="kelas" class="w-full border p-2 rounded" value="{{ $user->kelas }}">
        </div>

        <div class="mb-4">
            <label for="sekolah" class="block font-medium">Sekolah</label>
            <input type="text" name="sekolah" class="w-full border p-2 rounded" value="{{ $user->sekolah }}">
        </div>

        <div class="mb-4">
            <label for="jenis_kelamin" class="block font-medium">Jenis Kelamin</label>
            <select name="jenis_kelamin" class="w-full border p-2 rounded" required>
                <option value="">-- Pilih --</option>
                <option value="L" {{ $user->jenis_kelamin == 'L' ? 'selected' : '' }}>Laki-laki</option>
                <option value="P" {{ $user->jenis_kelamin == 'P' ? 'selected' : '' }}>Perempuan</option>
            </select>
        </div>

        <div class="mb-4">
            <label for="role" class="block font-medium">Role</label>
            <select name="role" class="w-full border p-2 rounded" required>
                <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="responden" {{ $user->role == 'responden' ? 'selected' : '' }}>Responden</option>
            </select>
        </div>

        <button type="button" onclick="confirmSubmit()" class="bg-purple-600 text-white px-4 py-2 rounded hover:bg-purple-700">
            Update
        </button>
    </form>
</div>

{{-- SweetAlert Confirm --}}
<script>
    function confirmSubmit() {
        Swal.fire({
            title: 'Simpan perubahan?',
            text: "Pastikan semua data sudah benar.",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#4f46e5',
            cancelButtonColor: '#aaa',
            confirmButtonText: 'Ya, simpan!'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('user-form').submit();
            }
        });
    }
</script>
@endsection
