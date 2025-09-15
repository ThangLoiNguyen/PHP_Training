@extends('layouts.app')

@section('content')
<div class="container mt-8 max-w-lg">
    <h1 class="mb-6 text-3xl font-bold text-indigo-600 flex items-center gap-2">
        <span>📧</span> Thêm Email
    </h1>

    @if(session('success'))
        <div class="mb-4 p-3 bg-green-100 text-green-700 border border-green-300 rounded">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('emails.store') }}" method="POST" class="bg-white p-6 rounded-lg shadow-md">
        @csrf
        <div class="mb-4">
            <label for="email" class="block text-gray-700 mb-2 font-medium">Email</label>
            <input 
                type="text" 
                name="email" 
                id="email"
                placeholder="Nhập email" 
                value="{{ old('email') }}"
                class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-indigo-400"
            >
            @error('email')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" 
            class="w-full py-2 bg-green-500 text-white font-medium rounded hover:bg-green-600 transition">
            Lưu
        </button>
    </form>
</div>
@endsection
