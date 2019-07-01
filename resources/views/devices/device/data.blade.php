@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"> Data for {{ $deviceName }} <a style="float: right;" href="/devices">Go back to device listing</a></div>
                    <div class="panel-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <b>Received</b>
                                </div>
                                <div class="col-md-7">
                                    <b>Data</b>
                                </div>
                            </div>
                    </div>
                    <div class="panel-body">
                        <div id="device-data-list">
                            <div class="hidden" ref="deviceId">{{$deviceId}}</div>
                            <div v-for="data in dataList" class="row">
                                <div class="col-md-3">
                                    @{{ data.created_at }}
                                </div>
                                <div class="col-md-7">
                                    @{{ data.data }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            window.onload = function() {Vue.config.devtools = true;};
        </script>


        <script type="module" src="{{ asset('js/device/data.js') }}"></script>

    </div>
@endsection
