<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEmailRequest;
use App\Models\Email;
use App\Mail\NewEmailWithAttachment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Exception;

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

    // Lưu email mới + gửi mail với attachment, dùng DB transaction
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:emails,email',
            'attachment' => 'nullable|file|mimes:pdf,jpg,png,docx|max:2048',
        ]);

        DB::beginTransaction();

        try {
            // Lưu email
            $email = Email::create([
                'email' => $request->email,
            ]);

            // Upload file nếu có
            $filePath = null;
            if ($request->hasFile('attachment')) {
                $filePath = $request->file('attachment')->store('attachments', 'public');
            }

            // Gửi mail kèm attachment
            Mail::to($email->email)->send(
                new NewEmailWithAttachment($email, $filePath ? storage_path('app/public/'.$filePath) : null)
            );

            DB::commit();

            return redirect()->route('emails.index')->with('success', 'Email đã được lưu và gửi thành công!');
        } catch (Exception $e) {
            DB::rollBack();
            Log::error('Lỗi lưu email hoặc gửi mail: '.$e->getMessage());
            return redirect()->route('emails.index')->with('success', 'Email chưa được lưu hoặc gửi mail thất bại!');
        }
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

    // Khôi phục email
    public function restore($id)
    {
        $email = Email::withTrashed()->findOrFail($id);
        $email->restore();

        return redirect()->route('emails.index')->with('success', 'Email đã được khôi phục!');
    }
}
