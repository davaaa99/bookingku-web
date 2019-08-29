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
                        <!-- <date-picker v-model="selectedDate" lang="en" format="MM/DD/YYYY"></date-picker> -->
                        <input type="date" v-model="selectedDate" class="dateclass">
                    </b-row>
                </b-col>
            </b-row>
        </b-form-group>
        <div class="spacer-20"></div>
        <b-col offset="10">
            <b-button variant="primary" class="btn btn-detail" href="addbooking" >Add</b-button>
        </b-col>
        <div class="spacer-20"></div>
        <table class="table">
            <thead>
                <th>Name</th>
                <th>Booking Code</th>
                <th>Schedule</th>
                <th>Payment Status</th>
                <th>Payment Method</th>
            </thead>
            <tbody>
                <tr v-for="(data,index) in dataBooking" :key="data.id_booking">
                    <td>{{data.user_name}}</td>
                    <td>{{data.id_booking}}</td>
                    <td>{{data.start_time}}-{{data.end_time}}</td>
                    <td>
                        <button class="btn button badge" :class="classStatus(data.payment_status)" v-on:click="changeStatus(index)" :disabled="disableButton(data.payment_status)">{{paid(data.payment_status)}}</button>
                    </td>
                    <td>{{data.payment_type}}</td>
                </tr>
            </tbody>
        </table>
        <div class="spacer-20"></div>
        <b-pagination v-model="currentPage" :per-page="perPage" aria-controls="bookinglist"
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
                selectedLocation: "",
                locationList:[],
                location:[],
                selectedField: "",
                fieldlist:[],
                field:[],
                scheduleList:[],
                userList:[],
                selectedDate:"",
                dateFormat:{
                    format: 'MMM/DD/YYYY',
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
                dataBooking:[]
            }
        },
        mounted(){
            this.loadData();
            this.loadLocation();
        },
        methods:{
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
                    payment_status:this.dataBooking[index].payment_status += 1
                }
                axios({
                    url: '/bookings/'+this.dataBooking[index].id_booking,
                    method:'PUT',
                    data: data
                }).then(response=>{
                    this.dataBooking[index].payment_status = response.data.serve
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
                    url: '/bookings',
                    method: 'GET'
                }).then(response => {
                    this.dataBooking = response.data.serve
                    console.log(this.dataBooking);
                }).catch(error => {
                    console.log(error);
                })
                
            },
            loadLocation(){
                let index=0;
                axios({
                    url: '/location',
                    methods:'GET',
                }).then(response=>{
                    this.locationList = response.data.serve
                    for (index=0; index< this.locationList.length; index++) {
                        this.location.push({value: this.locationList[index].id_location, text: this.locationList[index].location_name})
                    }
                    console.log(this.location);
                    
                }).catch(error=>{
                    console.log(error);
                })
            },
            loadField(){
                let index=0;
                axios({
                    url: '/field/data/'+this.selectedLocation,
                    methods:'GET',
                }).then(response=>{
                    console.log(response);
                    
                    this.fieldlist = response.data.serve
                    this.field = []
                    for (index=0; index< this.fieldlist.length; index++) {
                        this.field.push({value: this.fieldlist[index].id_field, text: this.fieldlist[index].field_name})
                    }                    
                }).catch(error=>{
                    console.log(error);
                })
            },
            loadByLocation(){
                axios({
                    url: '/bookings/location/'+this.selectedLocation,
                    method: 'GET'
                }).then(response => {
                    this.dataBooking = response.data.serve
                    console.log(this.dataBooking);
                }).catch(error => {
                    console.log(error);
                })
            },
            loadByField(){
                var d = this.selectedDate
                 axios({
                    url: '/bookings/field',
                    method: 'POST',
                    data: {
                        id_field : this.selectedField,
                        date: this.selectedDate
                    }
                }).then(response => {
                    this.dataBooking = response.data.serve
                    console.log(this.dataBooking);
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

