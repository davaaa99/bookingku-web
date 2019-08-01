<template>
    <div class="list-booking">
        <div class="filter ">
            <div class="filter-item d-flex">
                <date-picker width="200" v-model="dateFilter" lang="en" input-class="datepicker" format="DD-MM-YYYY">
                </date-picker>
                <!-- filterLokasi -->
                <!-- filterLapang -->
            </div>
            <b-table id="" filter="locatiionFilter fieldFilter dateFilter" :fields="fields" :items="filterData" :per-page="perPage"
                :current-page="currentPage" striped outlined show-empty>
                <template slot="aksi" slot-scope="data">
                    <!-- ganti sama update status -->
                    <a class=" btn btn-warning" @click="detail(data.item.idBooking)">Detail</a>
                </template>
            </b-table>
            <b-pagination v-model="currentPage" :total-rows="rows" :per-page="perPage" aria-controls="my-table"
                :prev-text="'«'" :next-text="'»'" :hide-goto-end-buttons="true" size="md" align="center">
            </b-pagination>
        </div>
    </div>
</template>

<script>
    import DatePicker from 'vue2-datepicker'
    import BootstrapVue from 'bootstrap-vue'
    import{
        type
    } from 'os'
    Vue.use(BootstrapVue)

    export default {
        components:{
            DatePicker
        },
        // props:{
        //     idBooking: [string]
        // },
        data(){
            return{
                dateFilter:"",
                filterLokasi:"",
                filterLapang:"",
                date:null,
                locationList:[
                    {value: null},
                    { value: 'a', text: 'This is First option' },
                    { value: 'b', text: 'Selected Option' },
                ],
                fieldList:[
                    {value: null},
                    { value: 'a', text: 'This is First option' },
                    { value: 'b', text: 'Selected Option' },
                ],
                field:[
                    {
                        key:"user",
                        label: "User"
                    },
                    {
                        key:"id_booking",
                        label: "ID Booking"
                    },
                    {
                        key:"location",
                        label: "Location"
                    },
                    {
                        key:"field",
                        label: "Field"
                    },
                    {
                        key:"schedule",
                        label: "Schedule"
                    },
                    {
                        key:"payment_status",
                        label: "Status"
                    }
                ],
                VerifyBooking:[{

                }],
                filterData: []
            };
        },
        mounted(){
            this.getData()
        },
        methods: {
            async getData(){
                this.filterData = this.VerifyBooking;
            },
            show: function(){
                this.date = !this.date;
                this.location = !this.location;
                this.field = !this.field;
            },
            // click: function()
        }
    };
</script>


