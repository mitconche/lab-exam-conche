<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Course;

class CourseSeeder extends Seeder
{
    public function run(): void
    {
        $courses = [
            'BS Information Technology',
            'BS Computer Science',
            'BS Information Systems',
        ];

        foreach ($courses as $course) {
            Course::firstOrCreate([
                'name' => $course,
            ]);
        }
    }
}
