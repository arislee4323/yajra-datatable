<?php

namespace Database\Seeders;
use App\Models\teacher;
use Illuminate\Database\Seeder;

class teacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        teacher::factory()->count(100)->create();
    }
}
