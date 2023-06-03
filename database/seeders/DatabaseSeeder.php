<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        DB::table('groups')->insert([
            ['name' => 'Group 1'],
        ]);
        DB::table('courses')->insert([
            ['name' => 'Course 1', 'teacher_id' => 1, 'group_id' => 1],
        ]);

        DB::table('exams')->insert([
            ['course_id' => 1, 'name' => 'Exam 1', 'duration' => 60],

        ]);
    }
}
