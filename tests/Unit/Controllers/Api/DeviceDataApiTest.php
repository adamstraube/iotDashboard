<?php
declare(strict_types=1);

namespace Tests\Unit\Controllers\Api;

use App\Http\Controllers\Api\DeviceDataApi;
use Illuminate\Http\Request;
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
        $return = $deviceDataApi->send(new Request([
            'device_mac' => 'testDeviceMac',
            'data' => 'data'
        ]));

        $result = json_decode($return->getContent());

        $this->assertEquals('200', $return->getStatusCode());

    }

    /**
     * Test if this sending data for a non existent device works
     */
    public function testCreateDeviceFromData(): void
    {
        $deviceDataApi = new DeviceDataApi();
        $return = $deviceDataApi->send(new Request([
            'device_mac' => 'new_mac',
            'data' => 'data'
        ]));

        $result = json_decode($return->getContent());

        $this->assertEquals('200', $return->getStatusCode());
        $this->assertEquals('2', $result->device_id);
    }

    /**
     * Test if not sending a device_mac throws an exception
     */
    public function testNoDeviceMacCreatesException(): void
    {
        $deviceDataApi = new DeviceDataApi();
        $return = $deviceDataApi->send(new Request([
            'data' => 'data'
        ]));

        $result = $return->getContent();

        $this->assertEquals('400', $return->getStatusCode());
        $this->assertEquals('{"reason":{"device_mac":["The device mac field is required."]}}', $result);
    }
}