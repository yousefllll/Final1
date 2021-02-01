<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;

class AdminDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         Admin::create([
              'name'  => 'Yousef Nader',
              'email'  => 'yousefnader1971@gmail.com',
              'password'  => bcrypt('yousefnader20031971'),

         ]);
    }
}
