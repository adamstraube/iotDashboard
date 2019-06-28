<?php
declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Database\Entities\Data;
use App\Database\Entities\Device;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

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
     * @return Response
     */
    public function index()
    {
        return view('credentials.credentials');
    }

    /**
     * Endpoint for a remote device to send data to this application
     *
     * @param Request $data
     *
     * @return Response
     */
    public function send(Request $data): Response
    {
        try {
            $this->validate($data, [
                'device_mac' => 'required',
                'data' => 'required'
            ]);
        }
        catch (ValidationException $exception) {
            return new Response([
                'reason' => $exception->validator->errors()
            ],
                400);
        }


        $dataArray = $data->toArray();

        $deviceId = $this->checkDeviceExists($dataArray);

        $dataModel = new Data();
        $dataModel->fill([
            'data' => $data['data'],
            'device_id' => $deviceId
        ]);
        $dataModel->save();

        return new Response([
            'statusText' => 'Data Received',
            'device_id' => $deviceId,
            'data' => $data
        ], 200);
    }

    /**
     * Check Device exists and return id
     *
     * @param $data
     *
     * @return string
     */
    private function checkDeviceExists($data): string
    {
        try {
            $device = Device::query()->where('device_mac', $data['device_mac'])->firstOrFail()->toArray(); // Find Device to get id for data
            $id = $device['id'];
        }
        catch (ModelNotFoundException $exception)
        {
            // Create device automatically - until I decide how to deal with unregistered devices
            $device = new Device([
                'device_name' => 'newdevice_'.$data['device_mac'],
                'device_mac' => $data['device_mac']
            ]);
            $device->save();
            $id = $device->toArray()['id'];
        }
        return (string)$id;
    }
}
