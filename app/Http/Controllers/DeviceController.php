<?php
declare(strict_types=1);

namespace App\Http\Controllers;

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
}
