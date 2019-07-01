<?php
declare(strict_types=1);

namespace Tests\Unit\Controllers;

use App\Database\Entities\Device;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\DeviceDataController;
use Illuminate\Http\Request;
use Tests\Base\TestCase;

/**
 * @covers \App\Http\Controllers\DeviceDataController
 */
class DeviceControllerTest extends TestCase
{
    /**
     * Test view is returned from single device view
     */
    public function testListDeviceDataView(): void
    {
        $deviceDataController = new DeviceDataController();
        $result = $deviceDataController->index('1');

        $this->assertInstanceOf('Illuminate\View\View', $result);
        $this->assertArrayHasKey('deviceName', $result->data);
        $this->assertArrayHasKey('deviceId', $result->data);
    }

    /**
     * Test if a new user can be created
     */
    public function testListDeviceData(): void
    {
        $deviceDataController = new DeviceDataController();
        $result = $deviceDataController->list('1');

        $this->assertIsArray($result);
    }
}