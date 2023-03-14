@component('mail::message')

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Overdue Task</title>
</head>
<body>
    <div style="color: black">
        <p><strong>Hello,</strong></p>
        <p>Your task <strong>{{ $task->title }}</strong> has been expired</p>
        <p>Thank you!</p>
    </div>
</body>
</html>

@endcomponent


