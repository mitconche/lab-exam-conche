<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Details</title>
</head>
<body>
    <h1>Student Details</h1>

    <p><strong>ID:</strong> {{ $student->id }}</p>
    <p><strong>Name:</strong> {{ $student->name }}</p>
    <p><strong>Email:</strong> {{ $student->email }}</p>
    <p><strong>Course:</strong> {{ $student->course->name ?? 'No course' }}</p>

    <p><a href="{{ route('students.index') }}">Back to Students</a></p>
    <p><a href="{{ route('students.edit', $student) }}">Edit Student</a></p>
</body>
</html>
