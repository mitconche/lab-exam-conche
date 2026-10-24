<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Gate;
use App\Models\Student;
use App\Models\Course;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::with('course')->latest()->get();

        return view('students.index', compact('students'));
    }

    public function create()
    {
        $courses = Course::all();

        return view('students.create', compact('courses'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email',
            'course_id' => 'required|exists:courses,id',
        ]);

        $validated['user_id'] = auth()->id();

        Student::create($validated);

        return redirect()
            ->route('students.index')
            ->with('success', 'Student added successfully.');
    }

    public function show(Student $student)
    {
        $student->load('course');

        return view('students.show', compact('student'));
    }

    public function edit(Student $student)
{
    Gate::authorize('update', $student);

    $courses = Course::all();

    return view('students.edit', compact('student', 'courses'));
}

    public function update(Request $request, Student $student)
{
    Gate::authorize('update', $student);

    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:students,email,' . $student->id,
        'course_id' => 'required|exists:courses,id',
    ]);

    $student->update($validated);

    return redirect()
        ->route('students.index')
        ->with('success', 'Student updated successfully.');
}

    public function destroy(Student $student)
{
    Gate::authorize('delete', $student);

    $student->delete();

    return redirect()
        ->route('students.index')
        ->with('success', 'Student deleted successfully.');
}
}
