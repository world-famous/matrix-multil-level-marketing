<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    // public function run()
    // {
    //     // $this->call(UsersTableSeeder::class);

    // }
    public function run()
    {
        // DB::table('users')->insert([
        //     'username' => 'adminuser',
        //     'fName' => 'John',
        //     'lName' => 'Doe',
        //     'gender' => 'Male',
        //     'join_date' => '2017-1-1',
        //     'mobile_number' => '1234567890',
        //     'upline_id' => 0,
        //     'level_no' => 1,
        //     'sameline_no' => 1,
        //     'path'=>'0',
        //     'email' =>'admin@gmail.com',
        //     'password' => bcrypt('admin'),
        //     'is_admin' => '1',
        // ]);
        DB::table('transactiontypes')->insert([
            'type'=>'bonus',
        ]);
        DB::table('transactiontypes')->insert([
            'type'=>'membership purchase',
        ]);
        DB::table('transactiontypes')->insert([
            'type'=>'income from membership',
        ]);
    }
}
