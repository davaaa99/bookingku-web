<template>
    <div id="list">
        <div class="filter ">
            <div class="filter-item d-flex">
                <date-picker width="200" v-model="filterTanggal" lang="en" input-class="datepicker" format="DD-MM-YYYY">
                </date-picker>
                <!-- <input type="date" v-model="filterTanggal" class="datepicker"> -->
                <div class="filterStatus">
                    <div class="filterTitle d-flex align-items-center " @click="show">
                        {{filterStatus}}
                        <i :class="[{ 'fas fa-caret-down':!status }, { 'fas fa-sort-up':status }]" class="ml-auto"></i>
                    </div>
                    <div v-if="status" class="box d-flex align-items-center justify-content-center">
                        <div class="link">
                            <div class="link-item" v-for="list in statusList">
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
                    <input class="filterSearch" type="text" v-model="search" placeholder="Search">
                    
                        <i class="fa fa-search" style="color:#C0C4CC"></i>
                    
                    </input>
                </div>
            </div>
            <div class="spacer-20"></div>
        </div>
        
        <b-table id="my-table" :filter="search" :fields="fields" :items="VerifyBooking" :per-page="perPage" :current-page="currentPage"
            striped outlined  show-empty>
            <template slot="No" slot-scope="data">
                {{ data.index + 1 }}
            </template>
            <template slot="aksi" slot-scope="data">
                <button class=" btn btn-detail" @click="testing(data.idClient)">Detail</button>
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
    import {
        type
    } from 'os';
    Vue.use(BootstrapVue)

    export default {

        components: {
            DatePicker
        },

        data() {

            return {
                date: '',
                status: false,
                search: "",
                perPage: 10,
                currentPage: 1,
                filterTanggal: "",
                filterStatus: "Semua",
                filterSearch: "",
                statusList: [{
                        id: '001',
                        status: 'status 1'
                    },
                    {
                        id: '001',
                        status: 'status 2'
                    },
                    {
                        id: '001',
                        status: 'status 3'
                    }
                ],

                fields: [
                    "No",
                    {
                        key: "idBooking",
                        label: "ID Booking"
                    },
                    {
                        key: "lokasi",
                        label: "Lokasi"
                    },
                    {
                        key: "lapangan",
                        label: "Lapangan"
                    },
                    {
                        key: "tanggal",
                        label: "Tanggal"
                    },
                    {
                        key: "status",
                        label: "Status"
                    },
                    {
                        key: "aksi",
                        label: "Aksi"
                    }
                ],
                VerifyBooking: [
                    {
                        idBooking: "CLN-001",
                        lokasi: "JL. Telkom ",
                        lapangan: "Lapang Semesta",
                        tanggal: "12-12-2012",
                        status: "can mayar "
                        
                    },{
                        idBooking: "CLN-002",
                        lokasi: "JL. Telkom",
                        lapangan: "Lapang Semesta",
                        tanggal: "12-12-2012",
                        status: "can mayar"
                        
                    },{
                        idBooking: "CLN-003",
                        lokasi: "JL. Telkom",
                        lapangan: "Lapang Semesta",
                        tanggal: "12-12-2012",
                        status: "teu mayar"
                        
                    },{
                        idBooking: "CLN-004",
                        lokasi: "JL. Telkom",
                        lapangan: "Lapang Semesta",
                        tanggal: "12-12-2012",
                        status: "mayar"
                        
                    },{
                        idBooking: "CLN-005",
                        lokasi: "JL. Telkom",
                        lapangan: "Lapang Semesta",
                        tanggal: "12-12-2012",
                        status: "mayar"
                        
                    }

                ],
            };
        },
        methods: {
            show: function () {
                this.status = !this.status;
            },
            click: function (status) {
                this.status = !this.status;
                this.filterStatus = status;
            },
            testing: function (id) {
                alert(id);
            }
        },
        computed: {
            rows() {
                return this.VerifyBooking.length;

            }
        }
    };

</script>
