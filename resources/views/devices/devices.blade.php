@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Devices</div>

                    <div class="panel-body">

                            <div class="row">
                                <div class="col-md-3">
                                    <b>Device Name</b>
                                </div>
                                <div class="col-md-3">
                                    <b>Device Hardware Address</b>
                                </div>
                                <div class="col-md-3">
                                    <b>Device Group</b>
                                </div>
                                <div class="col-md-3">
                                    <b>Functions</b>
                                </div>
                            </div>
                    </div>
                    <div class="panel-body">
                        <div id="devices-list">
                            <div v-for="device in devices" class="row">
                                <div class="col-md-3">
                                    @{{ device.device_name }}
                                </div>
                                <div class="col-md-3">
                                    @{{ device.device_mac }}
                                </div>
                                <div class="col-md-3">
                                    none
                                </div>
                                <div class="col-md-3">
                                    <button v-bind:id="device.id" class="btn btn-danger delete-item">
                                        Delete Device
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div id="new-device">
                            <form method="POST" action="/device/new" @submit.prevent="onsubmit">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group{{ $errors->has('device_name') ? ' has-error' : '' }}">

                                            <div>
                                                <input id="device_name" type="text" class="form-control" name="device_name" v-model="device_name">

                                                @if ($errors->has('device_name'))
                                                    <span class="help-block">
                                                <strong>{{ $errors->first('device_name') }}</strong>
                                            </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group{{ $errors->has('device_mac') ? ' has-error' : '' }}">

                                            <div>
                                                <input id="device_mac" type="text" class="form-control" name="device_mac" v-model="device_mac">

                                                @if ($errors->has('device_mac'))
                                                    <span class="help-block">
                                                <strong>{{ $errors->first('device_mac') }}</strong>
                                            </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        none
                                    </div>
                                    <div class="col-md-3">
                                        <button type="submit" class="btn btn-primary">
                                            Add Device
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            window.onload = function() {Vue.config.devtools = true;};
        </script>



        <script src="{{ asset('js/devices.js') }}"></script>

    </div>
@endsection
