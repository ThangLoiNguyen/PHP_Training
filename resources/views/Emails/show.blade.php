<h1>Chi tiết Email</h1>

<p><strong>ID:</strong> {{ $email->id }}</p>
<p><strong>Email:</strong> {{ $email->email }}</p>
<p><strong>Ngày tạo:</strong> {{ $email->created_at }}</p>

<a href="{{ route('emails.index') }}">← Quay lại</a>
