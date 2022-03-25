<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->seederAdminAccount();
        $this->seederUserAccount();
    }

    public function seederAdminAccount()
    {
        DB::table('User')->insert([
            'first_name' => 'Nguyen',
            'last_name' => 'Giang',
            'username' => 'Nguyen Trung Giang',
            'isAdmin' => 1,
            'isActive' => 1,
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123456'),
        ]);
    }

    public function seederUserAccount()
    {
        User::factory()->count(10)->create();
    }
}
