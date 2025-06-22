@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h2 class="text-2xl font-bold mb-4">Tambah Data User</h2>

    <form id="user-form" action="{{ route('user.store') }}" method="POST" class="bg-white p-6 rounded shadow-md">
        @csrf

        <div class="mb-4">
            <label for="nik" class="block font-medium">NIK</label>
            <input type="text" name="nik" class="w-full border p-2 rounded" 
                required pattern="\d{16}" maxlength="16" minlength="16" 
                title="NIK harus terdiri dari 16 angka" 
                oninput="this.value=this.value.replace(/[^0-9]/g,'')">
        </div>


        <div class="mb-4">
            <label for="name" class="block font-medium">Nama</label>
            <input type="text" name="name" class="w-full border p-2 rounded" required>
        </div>

        <div class="mb-4">
            <label for="email" class="block font-medium">Email</label>
            <input type="email" name="email" class="w-full border p-2 rounded" required>
        </div>

        <div class="mb-4">
            <label for="password" class="block font-medium">Password</label>
            <input type="password" name="password" class="w-full border p-2 rounded" required>
        </div>

        <div class="mb-4">
            <label for="role" class="block font-medium">Role</label>
            <select name="role" class="w-full border p-2 rounded" required>
                <option value="admin">Admin</option>
                <option value="responden">Responden</option>
            </select>
        </div>

        <div class="mb-4">
            <label for="umur" class="block font-medium">Umur</label>
            <input type="number" name="umur" class="w-full border p-2 rounded" required>
        </div>

        <div class="mb-4">
            <label for="kelurahan" class="block font-medium">Kelurahan</label>
            <select name="kelurahan" class="w-full border p-2 rounded" required>
                <option value="" disabled selected>Pilih kelurahan</option>
                <option value="Bendan">Bendan</option>
                <option value="Kramatsari">Kramatsari</option>
                <option value="Tirto">Tirto</option>
                <option value="Medono">Medono</option>
                <option value="Sokorejo">Sokorejo</option>
                <option value="Noyontaan">Noyontaan</option>
                <option value="Tondano">Tondano</option>
                <option value="Klego">Klego</option>
                <option value="Pekalongan Selatan">Pekalongan Selatan</option>
                <option value="Jenggot">Jenggot</option>
                <option value="Buaran">Buaran</option>
                <option value="Kusuma Bangsa">Kusuma Bangsa</option>
                <option value="Krapyak Kidul">Krapyak Kidul</option>
                <option value="Dukuh">Dukuh</option>
            </select>
        </div>


        <div class="mb-4">
            <label for="alamat" class="block font-medium">Alamat</label>
            <textarea name="alamat" class="w-full border p-2 rounded" rows="2" required></textarea>
        </div>

        <div class="mb-4">
            <label for="kelas" class="block font-medium">Kelas</label>
            <input type="text" name="kelas" class="w-full border p-2 rounded">
        </div>

        <div class="mb-4">
            <label for="sekolah" class="block font-medium">Sekolah</label>
            <input type="text" name="sekolah" class="w-full border p-2 rounded">
        </div>

        <div class="mb-4">
            <label for="jenis_kelamin" class="block font-medium">Jenis Kelamin</label>
            <select name="jenis_kelamin" class="w-full border p-2 rounded" required>
                <option value="">-- Pilih --</option>
                <option value="L">Laki-laki</option>
                <option value="P">Perempuan</option>
            </select>
        </div>

        <button type="submit" class="bg-purple-600 text-white px-4 py-2 rounded hover:bg-purple-700">
            Simpan
        </button>
    </form>
</div>
@endsection
