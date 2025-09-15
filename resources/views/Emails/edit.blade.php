@extends('layouts.app')

@section('content')
    <div class="max-w-lg mx-auto mt-12 px-4">
        <h1 class="text-3xl font-bold text-indigo-600 mb-8 flex items-center gap-2">
            <span>✏️</span> Sửa Email
        </h1>

        <!-- Form chỉnh sửa -->
        <form action="{{ route('emails.update', $email) }}" method="POST" class="bg-white p-6 rounded-xl shadow-md">
            @csrf
            @method('PUT')

            <!-- Input email -->
            <div class="mb-5">
                <label for="email" class="block text-gray-700 font-medium mb-2">Email</label>
                <input type="email" name="email" id="email" placeholder="Nhập email"
                    value="{{ old('email', $email->email) }}"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:border-indigo-400 transition">
                @error('email')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <!-- Cập nhật -->
            <button type="submit"
                class="w-full py-3 bg-indigo-500 text-white font-semibold rounded-lg hover:bg-indigo-600 transition">
                Cập nhật
            </button>
        </form>

        <!-- Quay lại -->
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