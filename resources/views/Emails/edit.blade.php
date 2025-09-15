<h1>Sửa Email</h1>

<form action="{{ route('emails.update', $email) }}" method="POST">
    @csrf
    @method('PUT')
    <input type="text" name="email" value="{{ old('email', $email->email) }}">
    @error('email')
        <p style="color: red">{{ $message }}</p>
    @enderror
    <button type="submit">Cập nhật</button>
</form>
