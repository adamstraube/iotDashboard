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
        $this->call(UserTableSeeder::class);
        $this->command->info('users table seeded!');
        $this->call(DevicesTableSeeder::class);
        $this->command->info('devices table seeded!');
        $this->call(DeviceDataTableSeeder::class);
        $this->command->info('device-data table seeded!');
    }
}
