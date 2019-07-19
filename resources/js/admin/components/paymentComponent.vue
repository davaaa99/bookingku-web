<template>
    <div id="list">
        <div class="filter ">
            <div class="filter-item d-flex">
                <div class="search  ml-auto d-flex align-items-center">
                    <input class="filterSearch" type="text" v-model="search" placeholder="Search">
                    
                        <i class="fa fa-search" style="color:#C0C4CC"></i>
                    
                    </input>
                </div>
            </div>
            <div class="spacer-50"></div>
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
    import BootstrapVue from 'bootstrap-vue'
    import {
        type
    } from 'os';
    Vue.use(BootstrapVue)

    export default {

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
                        label: "ID Clients"
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
                        lokasi: "JL. Telkom",
                        lapangan: "Lapang Semesta",
                        tanggal: "12-12-2012",
                        status: "can mayar"
                        
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
                        
                    }

                ],
            };
        },
        computed: {
            rows() {
                return this.VerifyBooking.length;

            }
        }
    };

</script>
