<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Your Account Has Been Created</title>
</head>
<body>
    <h2>Hello {{ $user->name }},</h2>
    <p>Your account has been created successfully.</p>
    <p><strong>Email:</strong> {{ $user->email }}</p>
    <p><strong>Password:</strong> {{ $generatedPassword }}</p>
    <p>You can now log in to your account.</p>
    <br>
    <p>Best regards,<br>Pix Coders Team</p>
</body>
</html>
