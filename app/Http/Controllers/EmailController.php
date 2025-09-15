<?php

namespace App\Http\Controllers;
use App\Http\Requests\StoreEmailRequest;
use App\Models\Email;

use Illuminate\Http\Request;

class EmailController extends Controller
{
    // Danh sách email
    public function index()
    {
        $emails = Email::withTrashed()->get();
        return view('emails.index', compact('emails'));
    }

    // Form tạo mới
    public function create()
    {
        return view('emails.create');
    }

    // Lưu email mới
    public function store(StoreEmailRequest $request)
    {
        Email::create($request->validated());
        return redirect()->route('emails.index')->with('success', 'Email đã được thêm!');
    }

    // Xem chi tiết 1 email
    public function show(Email $email)
    {
        return view('emails.show', compact('email'));
    }

    // Form edit email
    public function edit(Email $email)
    {
        return view('emails.edit', compact('email'));
    }

    // Cập nhật email
    public function update(Request $request, Email $email)
    {
        $request->validate([
            'email' => 'required|email|unique:emails,email,' . $email->id,
        ]);

        $email->update($request->all());

        return redirect()->route('emails.index')->with('success', 'Email đã được cập nhật!');
    }

    // Xóa email
    public function destroy(Email $email)
    {
        $email->delete();
        return redirect()->route('emails.index')->with('success', 'Email đã bị xóa!');
    }
    public function restore($id)
{
    $email = Email::withTrashed()->findOrFail($id);
    $email->restore();

    return redirect()->route('emails.index')->with('success', 'Email đã được khôi phục!');
}


}