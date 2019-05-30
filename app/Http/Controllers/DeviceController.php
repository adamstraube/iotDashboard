<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Database\Entities\Device;
use App\Database\Repositories\DeviceRepository;
use Illuminate\Http\Request;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $devices = $this->deviceRepository->retrieveAllDevices();
        return view('devices.devices', ['devices' => $devices]);
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
}
