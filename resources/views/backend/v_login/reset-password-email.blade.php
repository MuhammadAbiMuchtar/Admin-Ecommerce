<!DOCTYPE html>
<html>
<head>
    <title>Reset Password</title>
</head>
<body>
    <h2>Reset Password</h2>
    <p>Anda menerima email ini karena kami menerima permintaan reset password untuk akun Anda.</p>
    <p>Silakan klik link di bawah ini untuk mereset password Anda:</p>
    <a href="{{ route('backend.reset-password-form', ['token' => $token]) }}">Reset Password</a>
    <p>Link ini akan kadaluarsa dalam 60 menit.</p>
    <p>Jika Anda tidak meminta reset password, abaikan email ini.</p>
    <br>
    <p>Terima kasih,</p>
    <p>Tim Admin Ecommerce</p>
</body>
</html> 