<?php
declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Database\Entities\Device;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DeviceDataApi extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the Credentials modify dashboard
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('credentials.credentials');
    }

    /**
     * Endpoint for a remote device to send data to this application
     *
     * @param string[] $data
     *
     * @return string[]
     */
    public function send(array $data): array
    {
        $device = Device::query()->find(); // Find Device to get id for data

        $this->validate($data, [
            'device_mac' => 'required',
            'data' => 'required'
        ]);

        $device->fill($data->all());
        $device->save();

        return [
            'message' => 'Device Updated',
            'data' => $device
        ];
    }
}
