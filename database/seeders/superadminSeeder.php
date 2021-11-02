<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\user;


class superadminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user=user::create([
            'prenom' => 'Trache',
            'nom' => 'pay',
            'boutique' => '',
            'site' => '',
            'ecommerce' => '',
            'email' => '',
            'telephone' => 777777777,
            'password' => bcrypt('7777'),
        ]);
        $user->attachRole('superadmin');
    }
}
