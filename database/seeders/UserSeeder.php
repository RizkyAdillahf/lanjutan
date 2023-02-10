<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $users = [
            [  'name_petugas'  => 'admin',
               'username'      => 'admin',
               'password'      =>  bcrypt('admin'),
               'level'         => 'admin'
           ],
           [
               'name_petugas'      => 'petugas',
               'username'          => 'petugas',
               'password'          => bcrypt('petugas'),
               'level'             => 'petugas'
           ]
           ];
           foreach ($users as $key => $value) {
               User::create($value);
          }
    }
}
