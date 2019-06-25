<?php
declare(strict_types=1);

namespace Tests\Unit\Controllers\Api;

use App\Http\Controllers\Api\DeviceDataApi;
use Tests\Base\TestCase;

/**
 * @covers \App\Http\Controllers\Api\DeviceData
 */
class DeviceDataApiTest extends TestCase
{
    /**
     * Test if this API can be reached
     */
    public function testListDevices(): void
    {
        $deviceDataApi = new DeviceDataApi();
        $result = $deviceDataApi->send([
            'device_mac' => 'test123',
            'data' => 'data'
        ]);

        $this->assertIsArray($result);
    }
}