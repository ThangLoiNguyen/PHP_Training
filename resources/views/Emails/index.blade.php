@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4 text-primary">📧 Danh sách Email</h1>

    <div class="mb-3">
        <a href="{{ route('emails.create') }}" class="btn btn-success">+ Thêm email</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered table-hover">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Email</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @forelse($emails as $index => $email)
                <tr @if($email->trashed()) class="table-secondary" @endif>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $email->email }}</td>
                    <td class="d-flex flex-wrap gap-2"> <!-- flex và gap tạo khoảng cách đều -->
                        @if($email->trashed())
                            <form action="{{ route('emails.restore', $email->id) }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-warning btn-sm">Khôi phục</button>
                            </form>
                        @else
                            <a href="{{ route('emails.show', $email) }}" class="btn btn-info btn-sm">Xem</a>
                            <a href="{{ route('emails.edit', $email) }}" class="btn btn-primary btn-sm ml-2">Sửa</a>
                            <form action="{{ route('emails.destroy', $email) }}" method="POST" class="d-inline ml-2">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Xóa</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center text-muted">Chưa có email nào</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
