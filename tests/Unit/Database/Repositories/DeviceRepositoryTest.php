<?php
declare(strict_types=1);

namespace Tests\Unit\Database\Repositories;

use App\Database\Entities\Device;
use App\Database\Entities\User;
use App\Database\Repositories\DeviceRepository;
use App\Http\Controllers\Auth\RegisterController;
use Tests\Base\TestCase;

/**
 * @covers \App\Database\Repositories\DeviceRepository
 */
class DeviceRepositoryTest extends TestCase
{
    /**
     * Test if a new user can be created
     *
     * @return void
     *
     * @throws \Exception
     */
    public function testRetrieveDevice(): void
    {
        $device = $this->generateDevice();
        $device->save();

        $deviceRepository = new DeviceRepository();
        $result = $deviceRepository->retrieveAllDevices();

        $this->assertIsArray($result);
        $this->assertContains('testDevice', $result[0]);
    }

    /**
     * Generates device details and persists in DB for test
     *
     * @return User
     *
     * @throws \Exception
     */
    private function generateDevice(): Device
    {
        $name = 'testDevice';
        $macAddress = random_bytes(8);

        $device = new Device([
            'device_name' => $name,
            'device_mac' => $macAddress
        ]);
        return $device;
    }
}