<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Database\Entities\Data;
use App\Database\Entities\Device;
use Illuminate\View\View;

class DeviceDataController extends Controller
{
    /**
     * Show the data from a single device view
     *
     * @param string $device_id Device Id
     *
     * @return View
     */
    public function index(string $device_id): View
    {
        $device = Device::query()->where(['id' => $device_id])->firstOrFail(['device_name'])->toArray();
        return view('devices.device.data', ['deviceName' => $device['device_name']]);
    }

    /**
     * Retrieve all data for a device from DB
     *
     * @param string $device_id Device Id
     *
     * @return mixed[]
     */
    public function list(string $device_id): array
    {
        return Data::query()->where(['device_id', $device_id])->get(['created_at', 'data'])->toArray();
    }
}
