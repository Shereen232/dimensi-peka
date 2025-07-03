@extends('layouts.app')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Daftar Histori Aktivitas</h3>

                    {{-- Filter Form --}}
                    <form method="GET" action="{{ route('history.index') }}" class="mb-6 bg-gray-50 p-4 rounded-lg shadow-sm">
                        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                            <div>
                                <label for="user_id" class="block text-sm font-medium text-gray-700">Pengguna</label>
                                <select name="user_id" id="user_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-purple-500 focus:ring-purple-500 sm:text-sm">
                                    <option value="">Semua Pengguna</option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}" {{ request('user_id') == $user->id ? 'selected' : '' }}>
                                            {{ $user->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label for="action_type" class="block text-sm font-medium text-gray-700">Jenis Aksi</label>
                                <select name="action_type" id="action_type" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-purple-500 focus:ring-purple-500 sm:text-sm">
                                    <option value="">Semua Aksi</option>
                                    <option value="created" {{ request('action_type') == 'created' ? 'selected' : '' }}>Dibuat</option>
                                    <option value="updated" {{ request('action_type') == 'updated' ? 'selected' : '' }}>Diperbarui</option>
                                    <option value="deleted" {{ request('action_type') == 'deleted' ? 'selected' : '' }}>Dihapus</option>
                                </select>
                            </div>
                            <div>
                                <label for="table_name" class="block text-sm font-medium text-gray-700">Nama Tabel</label>
                                <select name="table_name" id="table_name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-purple-500 focus:ring-purple-500 sm:text-sm">
                                    <option value="">Semua Tabel</option>
                                    @foreach ($tableNames as $tableName)
                                        <option value="{{ $tableName }}" {{ request('table_name') == $tableName ? 'selected' : '' }}>
                                            {{ ucfirst($tableName) }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="md:col-span-2 grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div>
                                    <label for="start_date" class="block text-sm font-medium text-gray-700">Dari Tanggal</label>
                                    <input type="date" name="start_date" id="start_date" value="{{ request('start_date') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-purple-500 focus:ring-purple-500 sm:text-sm">
                                </div>
                                <div>
                                    <label for="end_date" class="block text-sm font-medium text-gray-700">Sampai Tanggal</label>
                                    <input type="date" name="end_date" id="end_date" value="{{ request('end_date') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-purple-500 focus:ring-purple-500 sm:text-sm">
                                </div>
                            </div>
                        </div>
                        <div class="mt-4 flex justify-end space-x-2">
                            <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">
                                <svg class="-ml-1 mr-2 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zm0 4a1 1 0 011-1h16a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1V8zm0 8a1 1 0 011-1h16a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1v-2z" />
                                </svg>
                                Filter
                            </button>
                            <a href="{{ route('history.index') }}" class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md shadow-sm text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                <svg class="-ml-1 mr-2 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                                Reset
                            </a>
                        </div>
                    </form>
                    {{-- End Filter Form --}}

                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Tanggal & Waktu
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Pengguna
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Aksi
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Tabel
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        ID Record
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Detail Perubahan
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse ($histories as $history)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            {{ $history->created_at->format('d M Y H:i:s') }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            {{ $history->user->name ?? 'Sistem / Tidak Diketahui' }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full
                                                @if($history->action_type == 'created') bg-green-100 text-green-800
                                                @elseif($history->action_type == 'updated') bg-blue-100 text-blue-800
                                                @elseif($history->action_type == 'deleted') bg-red-100 text-red-800
                                                @else bg-gray-100 text-gray-800 @endif">
                                                {{ ucfirst($history->action_type) }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            {{ $history->table_name }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            {{ $history->record_id }}
                                        </td>
                                        <td class="px-6 py-4 text-sm text-gray-900">
                                            @if($history->old_data)
                                                <details class="mb-2">
                                                    <summary class="cursor-pointer text-blue-600 hover:underline">Data Lama</summary>
                                                    <pre class="mt-1 p-2 bg-gray-100 rounded-md text-xs overflow-x-auto">{{ json_encode($history->old_data, JSON_PRETTY_PRINT) }}</pre>
                                                </details>
                                            @endif
                                            @if($history->new_data)
                                                <details>
                                                    <summary class="cursor-pointer text-green-600 hover:underline">Data Baru</summary>
                                                    <pre class="mt-1 p-2 bg-gray-100 rounded-md text-xs overflow-x-auto">{{ json_encode($history->new_data, JSON_PRETTY_PRINT) }}</pre>
                                                </details>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="px-6 py-4 text-sm text-gray-500 text-center">Tidak ada histori aktivitas ditemukan.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-4">
                        {{ $histories->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection