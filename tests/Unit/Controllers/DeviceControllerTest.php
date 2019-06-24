<?php
declare(strict_types=1);

namespace Tests\Unit\Controllers;

use App\Database\Entities\Device;
use App\Http\Controllers\DeviceController;
use Illuminate\Http\Request;
use Tests\Base\TestCase;

/**
 * @covers \App\Http\Controllers\DeviceController
 */
class DeviceControllerTest extends TestCase
{
    /**
     * Test if a new user can be created
     */
    public function testListDevices(): void
    {
        $deviceController = new DeviceController();
        $result = $deviceController->list();

        $this->assertIsArray($result);
    }

    /**
     * Test if a new device can be created successfully
     */
    public function testCreateNewDevice(): void
    {
        $deviceController = new DeviceController();
        $result = $deviceController->new(new Request([
            'device_name' => 'test123',
            'device_mac' => 'test456'
        ]));

        $retrieve = Device::query()->findOrFail($result['id'])->toArray();

        $this->assertContains('test123', $retrieve['device_name']);
        $this->assertContains('test456', $retrieve['device_mac']);
    }

    /**
     * Test if a device can be updated successfully
     */
    public function testUpdateDevice(): void
    {
        $deviceController = new DeviceController();
        $result = $deviceController->new(new Request([
            'device_name' => 'test123',
            'device_mac' => 'test456'
        ]));

        $update = $deviceController->update(
            new Request(['device_name' => 'update123', 'device_mac' => 'update456']),
            (string)$result['id']
        );

        $this->assertContains('update123', $update['data']['device_name']);
        $this->assertContains('update456', $update['data']['device_mac']);
    }

    /**
     * Test Deletion of Device
     *
     * @throws \Exception
     */
    public function testDeleteDevice(): void
    {
        $deviceController = new DeviceController();
        $result = $deviceController->new(new Request([
            'device_name' => 'test123',
            'device_mac' => 'test456'
        ]));

        $delete = $deviceController->delete(
            (string)$result['id']
        );

        $this->assertContains('Device Deleted', $delete['message']);
    }
}