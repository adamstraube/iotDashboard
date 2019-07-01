<?php

use App\Database\Entities\DeviceData;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DeviceDataTableSeeder extends Seeder
{
    /**
     * Seed the Device table with data
     *
     * @return void
     */
    public function run()
    {
        DB::table('device_data')->delete();

        $deviceIds = DB::table('devices')->pluck('id')->toArray();
        $faker = Faker::create();

        foreach (range(1,5) as $index) {
            DeviceData::create([
                'device_id' => $faker->randomElement($deviceIds),
                'data' => $faker->text
            ]);
        }
    }
}
