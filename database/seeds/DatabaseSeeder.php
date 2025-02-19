<?php

use Illuminate\Database\Seeder;



class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//         $this->call(UsersTableSeeder::class);
         $this->call(NotificationTableSeeder::class);
         $this->call(HomeTableSeeder::class);
         $this->call(ContactsTableSeeder::class);
         $this->call(AboutTableSeeder::class);
         $this->call(PartnerTableSeeder::class);
    }
}
