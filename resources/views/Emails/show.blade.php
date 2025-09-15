@extends('layouts.app')

@section('content')
    <div class="max-w-lg mx-auto mt-12 px-4">
        <h1 class="text-3xl font-bold text-indigo-600 mb-8 flex items-center gap-2">
            <span>📧</span> Chi tiết Email
        </h1>

        <div class="bg-white p-6 rounded-xl shadow-md space-y-4">
            <div>
                <p class="text-gray-700 font-medium">ID:</p>
                <p class="text-gray-900">{{ $email->id }}</p>
            </div>
            <div>
                <p class="text-gray-700 font-medium">Email:</p>
                <p class="text-gray-900">{{ $email->email }}</p>
            </div>
            <div>
                <p class="text-gray-700 font-medium">Ngày tạo:</p>
                <p class="text-gray-900">{{ $email->created_at }}</p>
            </div>
        </div>

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