<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Manager</title>
</head>
<body>
    <h1>Student Manager</h1>

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit">Logout</button>
    </form>

    @if (session('success'))
        <p style="color: green;">
            {{ session('success') }}
        </p>
    @endif

    <p>
        <a href="{{ route('students.create') }}">Add New Student</a>
    </p>

    @if ($students->isEmpty())
        <p>No students found.</p>
    @else
        <table border="1" cellpadding="8">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Course</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($students as $student)
                    <tr>
                        <td>{{ $student->id }}</td>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->email }}</td>
                        <td>{{ $student->course->name ?? 'No course' }}</td>

                        <td>
                            <a href="{{ route('students.show', $student) }}">
                                View
                            </a>

                            @can('update', $student)
                                |
                                <a href="{{ route('students.edit', $student) }}">
                                    Edit
                                </a>
                            @endcan

                            @can('delete', $student)
                                <form
                                    method="POST"
                                    action="{{ route('students.destroy', $student) }}"
                                    style="display: inline;"
                                >
                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        onclick="return confirm('Delete this student?')"
                                    >
                                        Delete
                                    </button>
                                </form>
                            @endcan
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</body>
</html>
