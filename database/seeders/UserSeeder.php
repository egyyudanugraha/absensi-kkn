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
            'email' => 'sekretaris@kkn-suradita.com',
            'password' => bcrypt('suradita22'),
            'role' => 'sekretaris',
        ]);

        User::create([
            'name' => 'Ketua',
            'email' => 'ketua@kkn-suradita.com',
            'password' => bcrypt('suradita22'),
            'role' => 'ketua',
        ]);

        User::create([
            'name' => 'Bendahara',
            'email' => 'bendahara@kkn-suradita.com',
            'password' => bcrypt('suradita22'),
            'role' => 'bendahara',
        ]);
    }
}
