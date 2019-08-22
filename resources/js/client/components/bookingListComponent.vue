<template>
    <div id="bookinglist">
        <b-form-group>
            <b-row>
                <b-col cols="4">
                    <label for="location">Location</label>
                    <b-form-select v-model="selectedLocation" :options="location" ></b-form-select>
                </b-col>
                <b-col cols="4">
                    <label for="field">Field</label>
                    <b-form-select v-model="selectedField" :options="field"></b-form-select>
                </b-col>
                <b-col cols="4">
                    <b-row>
                        <label for="date">Date</label>
                    </b-row>
                    <b-row>
                        <date-picker v-model="selectedDate" lang="en" :config="dateFormat"></date-picker>
                    </b-row>
                </b-col>
            </b-row>
        </b-form-group>
        <div class="spacer-20"></div>
        <b-col offset="10">
            <b-button variant="primary" class="btn btn-detail" href="addbooking" >Add</b-button>
        </b-col>
        <div class="spacer-20"></div>
        <b-table fixed bordered small :items="items" :fields="fields" class="thead-light" id="bookinglist" primary-key="id_booking" >
            <template slot="schedule" slot-scope="scheduleList">
                {{scheduleList.start_time}}-{{scheduleList.end_time}}
            </template>
            <template slot="payment_status" slot-scope="data">
                <button class="btn button badge" :class="classStatus(data.item.payment_status)" v-on:click="changeStatus(data.index)" :disabled="disableButton(data.item.payment_status)">{{paid(data.item.payment_status)}}</button>
            </template>
        </b-table>
        <div class="spacer-20"></div>
        <!-- <b-pagination v-model="currentPage" :total-rows="rows" :per-page="perPage" aria-controls="bookinglist"
            :prev-text="'«'" :next-text="'»'" :hide-goto-end-buttons="true" size="md" align="center">
        </b-pagination> -->
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
                selectedLocation: "",
                locationList:[],
                location:[],
                selectedField: "",
                fieldlist:[],
                field:[],
                scheduleList:[],
                selectedDate:"",
                dateFormat:{
                    format: 'YYYY-MM-DD',
                    useCurrent:false,
                },
                componen:{
                    datePicker
                },
                filter:{
                    locaton:'',
                    field: '',
                    date:''
                },
                fields:{
                    user: {
                        key: 'client_email',
                        label: 'User',
                        sortable: true
                    },
                    bookingCode: {
                        key: 'id_booking',
                        label: 'Booking Code',
                        sortable: false
                    },
                    schedule: {
                        label:'Schedule',
                        sortable: true
                    },
                    payment_status: {
                        key: 'payment_status',
                        label: 'Status',
                        sortable: true
                    },
                    payment: {
                        key: 'payment_type',
                        label: 'Payment',
                        sortable: true
                    }
                },
                items:[]
            }
        },
        mounted(){
            this.loadData();
            this.loadLocation();
        },
        methods:{
            test(){
                console.log(this.locationList);
            },
            paid($status){
                const $key=['Unpaid','Down Payment', 'Paid']
                return $key[$status]
            },
            classStatus($status){
                switch(parseInt($status)){
                    case 0:
                        return 'unpaid'
                        break;
                    case 1:
                        return 'down-payment'
                        break;
                    case 2:
                        return 'full-payment'
                        break;
                }
            },
            changeStatus(index) {
                const data = {
                    // id_booking:this.items[index].id_booking,
                    payment_status:this.items[index].payment_status += 1
                }
                axios({
                    url: 'api/v1/bookings/'+this.items[index].id_booking,
                    method:'PUT',
                    data: data
                }).then(response=>{
                    console.log(response);
                    this.items[index].payment_status = response.data.serve
                    window.location.href = window.location.protocol +'//'+ window.location.host + '/bookinglist';
                }).catch(error=>{
                    console.log(error);                    
                })
            },
            disableButton($status){
                return $status === 2;
            },
            loadData() {
                axios({
                    url: 'api/v1/bookings',
                    method: 'GET'
                }).then(response => {
                    console.log(response);
                    this.items = response.data.serve
                    console.log(this.items);
                }).catch(error => {
                    console.log(error);
                })
                console.log(this.items.id_schedule);
                
                for (let index = 0; index < this.items.length; index++) {
                    this.loadSchedule(this.items.id_schedule);
                }
                console.log(this.scheduleList);
                
            },
            loadSchedule(index){
                id_schedule= this.items[index].id_schedule
                axios({
                    url: 'api/v1/bookings/schedule/'+id_schedule,
                    method: 'GET'
                }).then(response => {
                    console.log(response);
                    this.scheduleList = response.data.serve
                    console.log(this.scheduleList);
                }).catch(error => {
                    console.log(error);
                })
            },
            loadLocation(){
                let index=0;
                axios({
                    url: 'api/v1/location',
                    methods:'GET',
                }).then(response=>{
                    this.locationList = response.data.serve
                    console.log(response.data.serve);
                    for (index=0; index<= this.locationList.length; index++) {
                        this.location.push({value: this.locationList[index].id_location, text: this.locationList[index].location_name})
                    }
                    console.log(this.location);
                }).catch(error=>{
                    console.log(error);
                })
            },
            loadField(){
                console.log();
                
                let index=0;
                axios({
                    url: 'api/v1/field/data/'+this.selectedLocation,
                    methods:'GET',
                }).then(response=>{
                    console.log(response);
                    this.fieldlist = response.data.serve
                    console.log(response.data.serve);
                    this.field = []
                    for (index=0; index<= this.fieldlist.length; index++) {
                        this.field.push({value: this.fieldlist[index].id_field, text: this.fieldlist[index].field_name})
                    }
                    console.log(this.fieldlist);
                }).catch(error=>{
                    console.log(error);
                })
            },
            loadByLocation(){
                axios({
                    url: 'api/v1/bookings/location/'+this.selectedLocation,
                    method: 'GET'
                }).then(response => {
                    console.log(response);
                    this.items = response.data.serve
                    console.log(this.items);
                }).catch(error => {
                    console.log(error);
                })
            },
            loadByField(){
                console.log(this.selectedDate);
                // format: {
                //     toValue: function (date, format, language) {
                //     var d = new Date(date);
                //     d.setDate(d.getDate() + 7);
                //     return new Date(d);
                //     }
                // }
                 axios({
                    url: 'api/v1/bookings/field',
                    method: 'POST',
                    data: {
                        id_field : this.selectedField,
                        date : this.selectedDate
                    }
                }).then(response => {
                    console.log(response);
                    this.items = response.data.serve
                    console.log(this.items);
                }).catch(error => {
                    console.log(error);
                })
            }
        },
        watch:{
            selectedLocation:function(){
                this.loadField()
                this.loadByLocation()
            },
            selectedField:function(){
                this.loadByField()
            },
            selectedDate:function(){
                this.loadByField()
            }
        }
    }
</script>