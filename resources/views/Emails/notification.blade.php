<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Thông báo Email mới</title>
</head>
<body>
    <h2>📧 Bạn có email mới!</h2>
    <p>Email: {{ $email->email }}</p>
    <p>Ngày tạo: {{ $email->created_at }}</p>
</body>
</html>
