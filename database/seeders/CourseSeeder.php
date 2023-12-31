<?php

namespace Database\Seeders;

use App\Models\Backend\Course\Course;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Course::factory()
            ->count(5)
            ->create();
    }
}
