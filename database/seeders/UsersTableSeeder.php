<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // reset the users table
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('users')->truncate();

        // generate 3 users/author
        $date=Carbon\Carbon::now()->modify('-1 year');
        DB::table('users')->insert([
            [
                'name'=>"John Doe",
                'email'=>"johndoe@test.com",
                'date_of_entry'=>"2023-04-03",
                'password'=>bcrypt('password'),
                'game_time'=>clone($date),
                'color'=>"",
                'opponents_id'=>"",
                'result'=>"",
                'number_of_wins'=>"",
                'number_of_losses'=>"",
                'number_of_moves'=>"",


            ],
                ['name'=>"Otto Mark",
                'email'=>"oto@test.com",
                'date_of_entry'=>"2023-05-25",
                'password'=>bcrypt('password'),
                'game_time'=>clone($date),
                'color'=>"black",
                'opponents_id'=>"k",
                'result'=>"l",
                'number_of_wins'=>"2",
                'number_of_losses'=>"1",
                'number_of_moves'=>"3",
                ],



            [   'name'=>"Jacob Thorton",
                'email'=>"jac@test.com",
                'date_of_entry'=>"2023-05-25",
                'password'=>"12345",
                'game_time'=>clone($date),
                'color'=>"black",
                'opponents_id'=>"d",
                'result'=>"p",
                'number_of_wins'=>"3",
                'number_of_losses'=>"1",
                'number_of_moves'=>"4",

                ],


            [   'name'=>"Jarek Patrny",
                'email'=>"jarek.patrny@gmail.com",
                'date_of_entry'=>clone($date),
                'password'=>"123456",
                'game_time'=>clone($date),
                'color'=>"white",
                'opponents_id'=>"w",
                'result'=>"w",
                'number_of_wins'=>"1",
                'number_of_losses'=>"3",
                'number_of_moves'=>"4",

            ],
            ]);
    }
}
