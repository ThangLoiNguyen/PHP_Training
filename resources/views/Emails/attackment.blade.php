<form action="{{ route('emails.store') }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded-xl shadow-md">
    @csrf
    <div class="mb-5">
        <label for="email" class="block text-gray-700 font-medium mb-2">Email</label>
        <input type="email" name="email" id="email" placeholder="Nhập email" value="{{ old('email') }}"
            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-400 transition">
        @error('email') <p class="text-red-500 text-sm mt-2">{{ $message }}</p> @enderror
    </div>

    <div class="mb-5">
        <label for="attachment" class="block text-gray-700 font-medium mb-2">File đính kèm</label>
        <input type="file" name="attachment" id="attachment" class="w-full">
        @error('attachment') <p class="text-red-500 text-sm mt-2">{{ $message }}</p> @enderror
    </div>

    <button type="submit" class="w-full py-3 bg-green-500 text-white font-semibold rounded-lg hover:bg-green-600 transition">
        Lưu email và gửi
    </button>
</form>
