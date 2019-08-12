<template>
    <div id="bookinglist">
        <b-form-group>
            <b-row>
                <b-col cols="4">
                    <label for="location">Lokasi</label>
                    <b-form-select v-model="selectedLocation" :options="location"></b-form-select>
                </b-col>
                <b-col cols="4">
                    <label for="field">Lapang</label>
                    <b-form-select v-model="selectedField" :options="field"></b-form-select>
                </b-col>
                <b-col cols="4">
                    <b-row>
                        <label for="date">Tanggal</label>
                    </b-row>
                    <b-row>
                        <date-picker v-model="selectedDate" lang="en" :config="date"></date-picker>
                    </b-row>
                </b-col>
            </b-row>
        </b-form-group>
        <div class="spacer-20"></div>
        <b-col offset="10">
            <b-button variant="primary" class="btn btn-detail" href="addbooking" >Add</b-button>
        </b-col>
        <div class="spacer-20"></div>
        <b-table striped hover small :items="items" :fields="fields" class="thead-light" id="bookinglist">
            <template slot="status" slot-scope="data">
                <b-button v-model="data.item.status" class=" btn btn-detail paid" v-bind:style="paid" v-on:click="handleClick" @click="paidAction()">{{ paid(data.item.status) }}</b-button>
            </template>    
        </b-table>
        <div class="spacer-20"></div>
        <b-pagination v-model="currentPage" :total-rows="rows" :per-page="perPage" aria-controls="bookinglist"
            :prev-text="'«'" :next-text="'»'" :hide-goto-end-buttons="true" size="md" align="center">
        </b-pagination>
    </div>
</template>

<script>
    import BootstrapVue from 'bootstrap-vue'
    import datePicker from 'vue-date-picker'
    import { type } from "os";
    Vue.use(BootstrapVue)

    export default {
        data() {
            return {
                // Note 'age' is left out and will not appear in the rendered table
                perPage:20,
                currentPage:1,
                selectedLocation: null,
                location:[{text:'Pilih Lokasi', value:null},'Ciwarug Futsal', 'Sarijadi Futsal'],
                selectedField: null,
                field:[{text:'Pilih Lokasi', value:null},'Vinyl', 'Syntetic', 'Semen'],
                selectedDate: new Date(),
                date:{
                    format: 'YYYY/MM/DD',
                    useCurrent:false,
                },
                fields:{
                    user: {
                        label: 'User',
                        sortable: true
                    },
                    bookingCode: {
                        label: 'Booking Code',
                        sortable: false
                    },
                    schedule: {
                        key: 'schedule',
                        sortable: true
                    },

                    status: {
                        key: 'status',
                        label: 'Status',
                        sortable: true
                    },
                    payment: {
                        label: 'Payment',
                        sortable: true
                    }
                },
                items:[
                    {
                        user: "Tedy Subagjo",
                        bookingCode: "BKN-001",
                        schedule: "11.00-12.00",
                        status: true,
                        payment: "DP"
                    },
                    {
                        user: "Tedy Subagjo",
                        bookingCode: "BKN-001",
                        schedule: "11.00-12.00",
                        status: false,
                        payment: "DP"
                    },
                    {
                        user: "Tedy Subagjo",
                        bookingCode: "BKN-001",
                        schedule: "11.00-12.00",
                        status: false,
                        payment: "DP"
                    },
                    {
                        user: "Tedy Subagjo",
                        bookingCode: "BKN-001",
                        schedule: "11.00-12.00",
                        status: false,
                        payment: "DP"
                    }
                ]
            }
        },
        methods:{
            paid(status){
                if(!status){
                    return 'Unpaid'
                } else return 'Paid'
            },
            changeStatus(status){
                if(status){
                    let newStatus = status
                    return paid(newStatus)
                }
            },
            handleClick: function() {
                console.log(event)
            },
            paidAction(status) {
                if(status==true){
                    return 'paidbutton'
                } else{
                    return 'unpaidbutton'
                }
            }
        },
        watch:{
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

            filterLokasi: function (fal) {
                var self = this;
                const data = self.filterData.filter(function (project) {
                    return project.status === fal;
                });
                self.filterData = data;
            },
            filterLapang: function (fal) {
                var self = this;
                const data = self.filterData.filter(function (project) {
                    return project.status === fal;
                });
                self.filterData = data;
            }
        },
        // computed: {
        //     rows() {
        //         return this.filterData.length;
        //     }
        // }
    }
</script>