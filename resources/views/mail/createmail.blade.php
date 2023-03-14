@component('mail::message')

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>New Task Created</title>
</head>
<body>
    <div style="color: black">
        <p><strong>Hello,</strong></p>
        <p>A new task has been created:</p>
        <ul>
            <li><strong>Title:</strong> {{ $task->title }}</li>
            <li><strong>Description:</strong> {{ $task->description }}</li>
            <li><strong>Due Date:</strong> {{ $task->duedate }}</li>
        </ul>
        <p>Thank you!</p>
    </div>
</body>
</html>

@endcomponent


