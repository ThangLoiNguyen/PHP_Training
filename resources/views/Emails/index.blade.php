@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto mt-12 px-4">
    <h1 class="text-3xl font-bold text-indigo-600 mb-8 flex items-center gap-2">
        <span>📧</span> Danh sách Email
    </h1>

    <!-- Thêm email -->
    <div class="mb-6">
        <a href="{{ route('emails.create') }}" 
           class="inline-block px-4 py-2 bg-green-500 text-white font-medium rounded-lg hover:bg-green-600 transition"
           style="text-decoration: none">
            + Thêm email
        </a>
    </div>

    <!-- Thông báo thành công -->
    @if(session('success'))
        <div class="mb-6 px-4 py-3 bg-green-100 text-green-800 border border-green-200 rounded-lg">
            {{ session('success') }}
        </div>
    @endif

    <!-- Danh sách email -->
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-md">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="py-3 px-4 text-left">#</th>
                    <th class="py-3 px-4 text-left">Email</th>
                    <th class="py-3 px-4 text-left">Hành động</th>
                </tr>
            </thead>
            <tbody>
                @forelse($emails as $index => $email)
                    <tr class="{{ $email->trashed() ? 'bg-gray-100 text-gray-400 line-through' : 'hover:bg-gray-50' }}">
                        <td class="py-3 px-4">{{ $index + 1 }}</td>
                        <td class="py-3 px-4">{{ $email->email }}</td>
                        <td class="py-3 px-4 flex flex-wrap gap-2">
                            @if($email->trashed())
                                <form action="{{ route('emails.restore', $email->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" 
                                        class="px-3 py-1 bg-yellow-400 text-white rounded hover:bg-yellow-500 transition text-sm">
                                        Khôi phục
                                    </button>
                                </form>
                            @else
                                <a href="{{ route('emails.show', $email) }}" 
                                   class="px-3 py-1 bg-blue-400 text-white rounded hover:bg-blue-500 transition text-sm">
                                    Xem
                                </a>
                                <a href="{{ route('emails.edit', $email) }}" 
                                   class="px-3 py-1 bg-indigo-500 text-white rounded hover:bg-indigo-600 transition text-sm">
                                    Sửa
                                </a>
                                <form action="{{ route('emails.destroy', $email) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                        class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600 transition text-sm">
                                        Xóa
                                    </button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="py-4 text-center text-gray-500">Chưa có email nào</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection

@vite('resources/css/app.css')
