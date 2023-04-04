<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'title' => 'mr',
                'first_name' => 'Leo',
                'last_name' => 'Derin',
                'birthday' => '1990-01-01',
                'gender' => 'male',
                'email' => 'leo@gmail.com',
                'is_active' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'mr',
                'first_name' => 'Jan',
                'last_name' => 'Doe',
                'birthday' => '1995-05-05',
                'gender' => 'female',
                'email' => 'jan@gmail.com',
                'is_active' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'mr',
                'first_name' => 'Nicole',
                'last_name' => 'Smith',
                'birthday' => '1992-03-15',
                'gender' => 'male',
                'email' => 'nicole@gmail.com',
                'is_active' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        DB::table('users')->insert($users);
    }

}
