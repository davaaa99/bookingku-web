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
                            <div class="link-item" v-for-key ="list in statusList">
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
            <template slot="payment_status" slot-scope="data">
                {{paid(data.item.payment_status)}}
            </template>
            <template slot="aksi" slot-scope="data">
                <a class=" btn btn-detail" @click="detail(data.VerifyBooking.idBooking)">Detail</a>
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
                fields: [
                    "No",
                    {
                        key: "client_email",
                        label:"Name"
                    },
                    {
                        key: "location_name",
                        label: "Location"
                    },
                    {
                        key: "field_name",
                        label: "Field"
                    },
                    {
                        key: "created_at",
                        label: "Payment Date"
                    },
                    {
                        key: "start_time",
                        label: "Schedule"
                    },
                    {
                        key: "payment_type",
                        label: "Payment Type"
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
                filterData: []
            };
        },
        mounted(){
            this.loadData();
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

            },
            loadData() {
                axios({
                    // url: 'api/v1/bookings/admin/2019-07-31',
                    url: 'api/v1/bookings',
                    method: 'GET'
                }).then(response => {
                    console.log(response);
                    this.VerifyBooking = response.data.serve
                }).catch(error => {
                    console.log(error);
                })
            },paid($status){
                const $key=['Unpaid','Down Payment', 'Full Payment']
                return $key[$status]
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
