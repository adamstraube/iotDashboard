<?php

use App\Database\Entities\Device;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DevicesTableSeeder extends Seeder
{
    /**
     * Seed the Device table with data
     *
     * @return void
     */
    public function run()
    {
        DB::table('devices')->delete();

        Device::create(array('device_name' => 'testDevice', 'device_mac' => 'testDeviceMac'));
    }
}
