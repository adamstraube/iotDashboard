@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Data for {{ $deviceName }}</div>

                    <div class="panel-body">

                            <div class="row">
                                <div class="col-md-3">
                                    <b>Received</b>
                                </div>
                                <div class="col-md-3">
                                    <b>Data</b>
                                </div>
                            </div>
                    </div>
                    <div class="panel-body">

                    </div>

                </div>
            </div>
        </div>
        <script type="text/javascript">
            window.onload = function() {Vue.config.devtools = true;};
        </script>


        <script type="module" src="{{ asset('js/devices.js') }}"></script>

    </div>
@endsection
