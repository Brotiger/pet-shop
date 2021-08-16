<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Дмитрий',
            'email' => 'dimka@bdima.ru',
            'password' => Hash::make('123123'),
        ]);

        $user->assignRole('root');
    }
}
