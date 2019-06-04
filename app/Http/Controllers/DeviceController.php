<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Database\Entities\Device;
use App\Database\Repositories\DeviceRepository;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DeviceController extends Controller
{
    /**
     * @var DeviceRepository
     */
    private $deviceRepository;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');

        $this->deviceRepository = new DeviceRepository();
    }

    /**
     * Show the devices dashboard
     *
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
        return view('devices.devices');
    }

    /**
     * Retrieve all devices from DB
     *
     * @return array|mixed[]
     */
    public function list()
    {
        return $this->deviceRepository->retrieveAllDevices();
    }

    /**
     * Create new device in DB
     *
     * @param Request $data
     *
     * @return array
     */
    public function new(Request $data): array
    {
        $this->validate($data, [
            'device_name' => 'required',
            'device_mac' => 'required'
        ]);

        $device = new Device([
            'device_name' => $data['device_name'],
            'device_mac' => $data['device_mac']
        ]);

        $device->save();

        return ['message' => 'Device Created'];
    }

    /**
     * Update device in DB
     *
     * @param string $id
     * @param Request $data
     *
     * @return array
     */
    public function update(Request $data, string $id): array
    {
        $device = Device::findOrFail($id);

        $this->validate($data, [
            'device_name' => 'required',
            'device_mac' => 'required'
        ]);

        $device->fill($data->all());
        $device->save();

        return ['message' => 'Device Updated'];
    }

    public function delete(string $id): array
    {
        $device = Device::findOrFail($id);

        $device->delete();

        return ['message' => 'Device Deleted'];
    }
}
