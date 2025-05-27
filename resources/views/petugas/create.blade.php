@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto mt-12 bg-white p-10 rounded-xl shadow-lg">

    <h5 class="text-xl font-semibold mb-8 text-center text-gray-700">Tambah Petugas</h5>

    @if ($errors->any())
        <div class="bg-red-100 text-red-800 p-5 rounded-md mb-8 border border-red-400">
            <strong class="block mb-2 text-lg">Oops!</strong> Ada kesalahan saat input data:
            <ul class="list-disc pl-7 mt-3 space-y-1 text-base">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Form Tambah User 2 kolom -->
    <form action="{{ route('petugas.store') }}" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-8">
        @csrf

        <div>
            <label for="name" class="block font-semibold text-gray-700 text-lg mb-2">Nama</label>
            <input type="text" name="name" id="name"
                class="w-full border border-gray-300 rounded-lg px-5 py-3 text-lg focus:outline-none focus:ring-3 focus:ring-blue-500"
                value="{{ old('name') }}" required>
        </div>
        
        <div>
            <label for="status" class="block font-semibold text-gray-700 text-lg mb-2">Status</label>
            <select name="status" id="status"
                class="w-full border border-gray-300 rounded-lg px-5 py-3 text-lg bg-white focus:outline-none focus:ring-3 focus:ring-blue-500"
                required>
                <option value="">-- Pilih Status --</option>
                <option value="umum" {{ old('status') == 'umum' ? 'selected' : '' }}>Petugas Umum</option>
                <option value="rpl" {{ old('status') == 'rpl' ? 'selected' : '' }}>RPL</option>
                <option value="tkr" {{ old('status') == 'tkr' ? 'selected' : '' }}>TKR</option>
                <option value="tsm" {{ old('status') == 'tsm' ? 'selected' : '' }}>TSM</option>
            </select>
        </div>

        <div>
            <label for="email" class="block font-semibold text-gray-700 text-lg mb-2">Email</label>
            <input type="email" name="email" id="email"
                class="w-full border border-gray-300 rounded-lg px-5 py-3 text-lg focus:outline-none focus:ring-3 focus:ring-blue-500"
                value="{{ old('email') }}" required>
        </div>

        <div>
            <label for="password" class="block font-semibold text-gray-700 text-lg mb-2">Password</label>
            <input type="password" name="password" id="password"
                class="w-full border border-gray-300 rounded-lg px-5 py-3 text-lg focus:outline-none focus:ring-3 focus:ring-blue-500"
                required>
        </div>

        <div class="md:col-span-2 flex items-center gap-4 mt-6">
            <a href="{{ route('petugas.index') }}"
                class="flex-1 text-center py-3 rounded-lg text-lg font-semibold border border-transparent bg-gray-400 text-white hover:bg-gray-700 transition duration-300">
                Batal
            </a>
            <button type="submit"
                class="flex-1 bg-blue-600 text-white py-3 rounded-lg text-lg font-semibold hover:bg-blue-700 transition duration-300">
                Tambah
            </button>
        </div>

    </form>
</div>
@endsection
