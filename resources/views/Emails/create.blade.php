@extends('layouts.app')

@section('content')
    <div class="max-w-lg mx-auto mt-12 px-4">
        <!-- Tiêu đề -->
        <h1 class="text-3xl font-bold text-indigo-600 mb-8 flex items-center gap-2">
            <span>📧</span> Thêm Email
        </h1>

        <!-- Thông báo thành công -->
        @if(session('success'))
            <div class="mb-6 px-4 py-3 bg-green-100 text-green-800 border border-green-200 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        <!-- Form -->
        <form action="{{ route('emails.store') }}" method="POST" class="bg-white p-6 rounded-xl shadow-md">
            @csrf
            <!-- Email -->
            <div class="mb-5">
                <label for="email" class="block text-gray-700 font-medium mb-2">Email</label>
                <input type="email" name="email" id="email" placeholder="Nhập email" value="{{ old('email') }}"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:border-indigo-400 transition">
                @error('email')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <!-- Submit button -->
            <button type="submit"
                class="w-full py-3 bg-green-500 text-white font-semibold rounded-lg hover:bg-green-600 transition">
                Lưu email
            </button>
        </form>
        <!-- Nút quay lại -->
        <div class="mt-6">
            <a href="{{ route('emails.index') }}"
                class="inline-block px-4 py-2 bg-gray-200 text-gray-800 rounded-lg hover:bg-gray-300 transition"
                style="text-decoration: none">
                ← Quay lại
            </a>
        </div>
    </div>
@endsection

@vite('resources/css/app.css')