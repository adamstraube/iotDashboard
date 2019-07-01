let data_list = new Vue({
    el: '#device-data-list',

    data: {
        dataList: {},
        deviceId: ''
    },

    created() {
        console.log(this.deviceId);
    },

    mounted() {
        this.deviceId = this.$refs.deviceId.innerHTML;
        console.log(this.deviceId);
        this.refresh(this.deviceId);
    },

    methods: {
        refresh(deviceId) {
            axios.get('/device/'+deviceId+'/data/list').then(response => {
                this.dataList = response.data;
            });
        },
    }
});

