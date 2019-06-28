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
                                    <b>Device Information</b>
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
                                    <input v-if="device.edit"
                                           v-model="device.device_name"
                                    >
                                    <div v-else>
                                        @{{ device.device_name }}
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <input v-if="device.edit"
                                           v-model="device.device_mac"
                                    >
                                    <div v-else>
                                        @{{ device.device_mac }}
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <a :href="`/device/${device.id}/data`"> View Data </a>
                                </div>
                                <div class="col-md-3">
                                    <div v-if="device.edit">
                                        Edit:
                                        <button class="btn btn-success" @click="editSubmit(device);">
                                            OK
                                            </button>
                                        <button class="btn btn-danger" @click="device.edit = false;">
                                            Cancel
                                            </button>
                                    </div>
                                    <div v-else-if="device.delete">
                                        Del:
                                        <button class="btn btn-success" @click="deleteSubmit(device);">
                                            OK
                                        </button>
                                        <button class="btn btn-danger" @click="device.delete = false;">
                                            Cancel
                                        </button>
                                    </div>
                                    <div v-else>
                                        <button class="btn btn-info" @click="device.edit = true;">
                                            Edit
                                        </button>
                                        <button class="btn btn-danger delete-item" @click="device.delete = true;">
                                            Delete
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div id="new-device">
                            <form method="POST" action="/device/new" @submit.prevent="onSubmit" @keydown="form.errors.clear($event.target.name)">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group" v-bind:class="{'has-error': form.errors.has('device_name')}">
                                            <input id="device_name" type="text" class="form-control" name="device_name" v-model="form.device_name">
                                            <span class="help-block" v-if="form.errors.has('device_name')" v-text="form.errors.get('device_name')"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group" v-bind:class="{'has-error': form.errors.has('device_mac')}">
                                            <input id="device_mac" type="text" class="form-control" name="device_mac" v-model="form.device_mac">
                                            <span class="help-block" v-if="form.errors.has('device_mac')" v-text="form.errors.get('device_mac')"></span>
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


        <script type="module" src="{{ asset('js/devices.js') }}"></script>

    </div>
@endsection
