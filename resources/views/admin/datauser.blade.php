@extends('layouts.admin')

@section('content')
    <div class="flex flex-wrap gap-2 items-center mb-6">
        <button class="px-4 py-2 bg-gray-200 rounded-full">All</button>
        <button class="px-4 py-2 bg-gray-200 rounded-full">Verified</button>
        <button class="px-4 py-2 bg-gray-200 rounded-full">Not Verified</button>
        <button class="px-4 py-2 bg-gray-100 border rounded-full">Export PDF</button>
        <a href="{{ route('auth.register.create') }}">
            <button class="px-4 py-2 bg-green-100 text-green-700 border rounded-full"> Tambah</button>

        </a>

    </div>

    <div class="bg-white rounded shadow p-4 ">
        <table class="w-full table-auto text-sm">
            <thead class="bg-gray-50 hidden md:table-header-group">
                <tr
                    class="block md:table-row mb-4 md:mb-0 border border-gray-200 md:border-none rounded-lg shadow-sm md:shadow-none">
                    <th class="py-2 px-3">No</th>
                    <th class="py-2 px-3">Name</th>
                    <th class="py-2 px-3">Email</th>
                    <th class="py-2 px-3">Role</th>
                    <th class="py-2 px-3 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $index => $user)
                    <tr class="block md:table-row mb-4 md:mb-0 border border-gray-200 md:border-none rounded-lg shadow-sm md:shadow-none">
                        <td class="px-6 py-4 text-sm text-gray-900 block md:table-cell" data-label="No"><span
                            class=" md:hidden font-semibold text-gray-600">No : </span>{{ $index + 1 }}.</td>
                        <td class="px-6 py-4 text-sm text-gray-900 block md:table-cell" data-label="Name"><span
                            class=" md:hidden font-semibold text-gray-600">Name : </span>{{ $user->name }}</td>
                        <td class="px-6 py-4 text-sm text-gray-900 block md:table-cell" data-label="Email"><span
                            class=" md:hidden font-semibold text-gray-600">Email : </span>{{ $user->email }}</td>
                        <td class="px-6 py-4 text-sm text-gray-900 block md:table-cell" data-label="Role"><span
                            class=" md:hidden font-semibold text-gray-600">Role : </span>
                            <span class="inline-block {{ $user->role == 'admin' ? 'bg-green-100 text-green-700' : 'bg-yellow-100 text-yellow-700' }} px-3 py-1 rounded-full font-semibold text-sm">
                                {{ ucfirst($user->role) }}
                            </span>
                        </td>
                        <td class="py-2 px-3 text-center">
                            <div class="inline-flex gap-2">
                                <a href="/edit/{{ $user->id }}/DataUser" class="bg-blue-500 text-white px-3 py-1 rounded-md text-sm hover:bg-blue-600 transition">
                                    Edit
                                </a>
                                <a onclick="return confirm('Yakin ingin menghapus?')" href="/hapus/{{ $user->id }}/DataUser" class="bg-red-500 text-white px-3 py-1 rounded-md text-sm hover:bg-red-600 transition">Hapus</a>

                            </div>
                        </td>
                    </tr>
                @endforeach

            </tbody>

        </table>
    </div>
@endsection
