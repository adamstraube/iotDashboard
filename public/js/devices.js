import Form from './form.js';

let devices_list = new Vue({
    el: '#devices-list',

    data: {
        devices: {}
    },

    watch: {
        devices: {
            deep: true
        }
    },

    mounted() {
        this.refresh();
    },

    methods: {
        refresh() {
            axios.get('/devices/list').then(response => {
                for (var id in response.data) {
                    response.data[id].edit = false;
                    response.data[id].delete = false;
                    response.data[id].index = id;
                }
                this.devices = response.data;
            });
        },
        cancel() {
            this.refresh();
        },
        editSubmit(device) {
            axios.put('/devices/update/'+device.id, device).then(response => {
                device.edit = false;
            });
        },
        deleteSubmit(device) {
            axios.delete('/devices/delete/'+device.id).then(response => {

                this.devices.splice(device.index, 1);
            });
        }
    }
});

let new_device = new Vue({
    el: '#new-device',

    data: {
        form: new Form({
            device_name: '',
            device_mac: ''
        })
    },

    methods: {
        onSubmit() {
            this.form.post('/devices/new')
                .then(response => devices_list.refresh())
                .catch(error => alert('failed'));
        }
    }
});

