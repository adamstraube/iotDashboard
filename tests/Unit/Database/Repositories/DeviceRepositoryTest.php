<?php
declare(strict_types=1);

namespace Tests\Unit\Database\Repositories;

use App\Database\Repositories\DeviceRepository;
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
        $deviceRepository = new DeviceRepository();
        $result = $deviceRepository->retrieveAllDevices();

        $this->assertIsArray($result);
        $this->assertContains('testDevice', $result[0]['device_name']);
        $this->assertContains('testDeviceMac', $result[0]['device_mac']);
    }
}