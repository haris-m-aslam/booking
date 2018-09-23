<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Film;
use App\Seat;
use App\ShowTime;
use App\Booking;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');

        User::truncate();
        Film::truncate();
        Seat::truncate();
        ShowTime::truncate();
        Booking::truncate();

        $usersQuantity = 10;
        $seatQuantity = 15;
        $filmQuantity = 5;
        $showQuantity = 20;

        factory(User::class, $usersQuantity)->create();
        factory(Seat::class, $seatQuantity)->create();
        factory(Film::class, $filmQuantity)->create();
        factory(ShowTime::class, $showQuantity)->create();
    }

}
