<?php
declare(strict_types=1);

namespace Tests\Unit\Database\Entities;

use App\Database\Entities\Device;
use App\Database\Entities\DeviceData;
use Tests\Base\TestCase;

/**
 * @covers \App\Database\Entities\DeviceData
 */
class DataTest extends TestCase
{
    /**
     * Test if data relations are returned via device table
     *
     * @return void
     */
    public function testDeviceData(): void
    {
        // Set up test data
        $device = new Device([
            'device_name' => 'test123',
            'device_mac' => 'test456'
        ]);
        $device->save();
        $data = new DeviceData([
           'data' => 'This is test data'
        ]);
        $data->device()->associate($device);
        $data->save();

        $result = $device->data()->getResults()->toArray();

        $this->assertEquals('This is test data', $result[0]['data']);
    }
}