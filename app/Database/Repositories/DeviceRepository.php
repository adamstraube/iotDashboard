<?php
declare(strict_types=1);

namespace App\Database\Repositories;

use App\Database\Entities\Device;
use Illuminate\Config\Repository;

class DeviceRepository extends Repository
{
    /**
     * Return all devices
     *
     * @return mixed[]
     */
    public function retrieveAllDevices(): array
    {
        return Device::all('id', 'device_name', 'device_mac')->toArray();
    }
}
