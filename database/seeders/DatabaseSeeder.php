<?php

namespace Database\Seeders;

use App\Models\Employee;
use Database\Factories\EmployeeFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            Employee::factory(10)->create()
        ]);
    }
}
