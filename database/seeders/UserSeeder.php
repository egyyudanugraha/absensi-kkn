<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Sekretaris',
            'username' => 'sekretaris',
            'password' => bcrypt('suradita22'),
            'role' => 'sekretaris',
        ]);

        User::create([
            'name' => 'Bendahara',
            'username' => 'bendahara',
            'password' => bcrypt('suradita22'),
            'role' => 'bendahara',
        ]);
    }
}
