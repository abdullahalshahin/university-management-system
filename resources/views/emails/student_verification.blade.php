<!DOCTYPE html>
<html>
<head>
    <title>{{ $data['subject'] }}</title>
</head>
<body>
    <h2>{{ $data['subject'] }}</h2>
    <p>Dear {{ $data['student_name'] }},</p>
    <p>{{ $data['body'] }}</p>
    <p>Thank you!</p>
</body>
</html>
