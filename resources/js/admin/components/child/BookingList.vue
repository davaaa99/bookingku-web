<template>
    <div id="list">
        <div class="filter ">
            <div class="filter-item d-flex">
                <date-picker width="200" v-model="filterTanggal" lang="en" input-class="datepicker" format="DD-MM-YYYY">
                </date-picker>
                <div class="filterStatus">
                    <div class="filterTitle d-flex align-items-center " @click="show">
                        {{filterStatus}}
                        <i :class="[{ 'fas fa-caret-down':!status }, { 'fas fa-sort-up':status }]" class="ml-auto"></i>
                    </div>
                    <div v-if="status" class="box d-flex align-items-center justify-content-center">
                        <div class="link">
<<<<<<< HEAD
                            <div class="link-item" v-for="list in statusList" :key="list.statusList">
=======
                            <div class="link-item" v-for-key ="list in statusList">
>>>>>>> origin/velia_merge-dev
                                <a @click="click(list.status)">
                                    <div class="link-status">
                                        {{ list.status }}
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="search ml-auto d-flex align-items-center">
                    <input class="filterSearch" type="text" v-model="filterSearch" placeholder="Search">
                    <i class="fa fa-search" style="color:#C0C4CC"></i>
                </div>
            </div>
            <div class="spacer-20"></div>
        </div>
        <div class="d-flex">
            <button @click="getData" class="btn btn-clear btn-success">CLEAR FILTER</button>
        </div>
        <div class="spacer-20"></div>
        <b-table id="my-table" :filter="filterSearch" :fields="fields" :items="VerifyBooking" :per-page="perPage"
            :current-page="currentPage" striped outlined show-empty>
            <template slot="No" slot-scope="data">
                {{ data.index + 1 }}
            </template>
            <template slot="aksi" slot-scope="data">
                <a class=" btn btn-detail" @click="detail(data.item.idBooking)">Detail</a>
            </template>
        </b-table>
        <div class="spacer-20"></div>
        <b-pagination v-model="currentPage" :total-rows="rows" :per-page="perPage" aria-controls="my-table"
            :prev-text="'«'" :next-text="'»'" :hide-goto-end-buttons="true" size="md" align="center">
        </b-pagination>
    </div>
</template>

<script>
    import DatePicker from 'vue2-datepicker'
    import BootstrapVue from 'bootstrap-vue'
    import Axios from 'axios'
    import {
        type
    } from 'os';
    Vue.use(BootstrapVue)

    export default {
        components: {
            DatePicker
        },
        props: {
            idBooking: [String]
        },
        data() {
            return {
                status: false,
                perPage: 5,
                currentPage: 1,
                filterTanggal: "",
                filterStatus: "Filter Status",
                filterSearch: "",
                statusList: [{
                        id: '001',
                        status: 'Waiting'
                    },
                    {
                        id: '002',
                        status: 'Confirmed'
                    },
                    {
                        id: '003',
                        status: 'Rejected'
                    }
                ],
                fields: [
                    "No",
                    {
                        key: "id_booking",
                        label: "ID Booking"
                    },
                    {
                        key: "id_schedule",
                        label: "Schedule"
                    },
                    {
                        key: "client_email",
                        label:"Client"
                    },
                    // {
                    //     key: "lokasi",
                    //     label: "Lokasi"
                    // },
                    // {
                    //     key: "lapangan",
                    //     label: "Lapangan"
                    // },
                    {
                        key: "created_at",
                        label: "Tanggal"
                    },
                    {
                        key: "payment_status",
                        label: "Status"
                    },
                    {
                        key: "aksi",
                        label: "Aksi"
                    }
                ],
                VerifyBooking:[

                ],
                // VerifyBooking: [{
                //         idBooking: "BKN-001",
                //         nama: "Tedy Subagjo",
                //         lokasi: "JL. Telkom ",
                //         lapangan: "Lapang Semesta",
                //         tglBayar: "12-12-2012",
                //         jamBooking: "12.00",
                //         jenisPembayaran: "DP",
                //         status: "Confirmed",
                //         buktiPembayaran: "/images/avatar.jpg"
                //     }, {
                //         idBooking: "BKN-002",
                //         nama: "Masrum",
                //         lokasi: "JL. Telkom ",
                //         lapangan: "Lapang Semesta",
                //         tglBayar: "12-12-2012",
                //         jamBooking: "12.00",
                //         jenisPembayaran: "DP",
                //         status: "Confirmed",
                //         buktiPembayaran: "/images/avatar.jpg"
                //     },
                //     {
                //         idBooking: "BKN-003",
                //         nama: "Mokhan",
                //         lokasi: "JL. Telkom ",
                //         lapangan: "Lapang Semesta",
                //         tglBayar: "12-12-2012",
                //         jamBooking: "12.00",
                //         jenisPembayaran: "DP",
                //         status: "Confirmed",
                //         buktiPembayaran: "/images/avatar.jpg"
                //     },
                //     {
                //         idBooking: "BKN-004",
                //         nama: "Abnes",
                //         lokasi: "JL. Telkom ",
                //         lapangan: "Lapang Semesta",
                //         tglBayar: "12-12-2012",
                //         jamBooking: "12.00",
                //         jenisPembayaran: "DP",
                //         status: "Confirmed",
                //         buktiPembayaran: "/images/avatar.jpg"
                //     },
                //     {
                //         idBooking: "BKN-005",
                //         nama: "Rendy",
                //         lokasi: "JL. Telkom ",
                //         lapangan: "Lapang Semesta",
                //         tglBayar: "12-12-2012",
                //         jamBooking: "12.00",
                //         jenisPembayaran: "DP",
                //         status: "Confirmed",
                //         buktiPembayaran: "/images/avatar.jpg"
                //     },
                //     {
                //         idBooking: "BKN-006",
                //         nama: "Hammad",
                //         lokasi: "JL. Telkom ",
                //         lapangan: "Lapang Semesta",
                //         tglBayar: "12-12-2012",
                //         jamBooking: "12.00",
                //         jenisPembayaran: "DP",
                //         status: "Confirmed",
                //         buktiPembayaran: "/images/avatar.jpg"
                //     }

                // ],
                filterData: []
            };
        },
        mounted(){
        //    await Axios.get('http://localhost:8000/api/v1/clients')
        //     .then(function(rest){
        //         this.ClientList = rest;
        //         console.log(this.ClientList)
        //     }).catch(function(error){
        //         console.log('Error :',error);
        //     })
        let uri='http://localhost:8000/api/v1/bookings';
        this.axios.get(uri).then(response=>{
            this.VerifyBooking=response.data.data;
            console.log(response.data.data);
        });
        },
        methods: {
            async getData() {
                this.filterData = this.VerifyBooking;
            },
            show: function () {
                this.status = !this.status;
            },
            click: function (status) {
                this.status = !this.status;
                this.filterStatus = status;
            },
            detail: function (id) {
                var self = this;
                var d = new Date(),
                    month = '' + (d.getMonth() + 1),
                    day = '' + d.getDate(),
                    year = d.getFullYear();

                if (month.length < 2) month = '0' + month;
                if (day.length < 2) day = '0' + day;


                window.location.href = window.location.protocol + '//' + window.location.host +
                    '/$2y$10$MtKIr0/yICTGGEPWGcj0lOGLK9UlSd6hrOiBYgQWlfkym6V52hQSm' + day + '/verifydetail/' +
                    btoa(id);

            }
        },
        watch: {
            filterTanggal: function (fal) {
                var self = this;
                var d = new Date(fal),
                    month = '' + (d.getMonth() + 1),
                    day = '' + d.getDate(),
                    year = d.getFullYear();

                if (month.length < 2) month = '0' + month;
                if (day.length < 2) day = '0' + day;

                var realdate = [day, month, year].join('-');

                const data = self.filterData.filter(function (project) {
                    return project.tglBayar === realdate;
                });

                self.filterData = data;
            },

            filterStatus: function (fal) {
                var self = this;
                const data = self.filterData.filter(function (project) {
                    return project.status === fal;
                });
                self.filterData = data;
            }
        },
        computed: {
            rows() {
                return this.filterData.length;
            }
        }
    };

</script>
