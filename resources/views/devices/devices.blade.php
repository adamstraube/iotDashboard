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

                        @if(count($devices)!==0)
                            @foreach($devices as $device)
                                <div class="row">
                                    <div class="col-md-3">
                                        {{$device['device_name']}}
                                    </div>
                                    <div class="col-md-3">
                                        {{$device['device_mac']}}
                                    </div>
                                    <div class="col-md-3">
                                        none
                                    </div>
                                    <div class="col-md-3">
                                        <button id="{{$device['id']}}" class="btn btn-danger delete-item">
                                            Delete Device
                                        </button>
                                    </div>
                                </div>
                            @endforeach
                        @endif

                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group{{ $errors->has('device_name') ? ' has-error' : '' }}">

                                    <div>
                                        <input id="device_name" type="text" class="form-control" name="device_name" value="{{ old('device_name') }}" required autofocus>

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
                                        <input id="device_mac" type="text" class="form-control" name="device_mac" value="{{ old('device_mac') }}" required autofocus>

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
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
