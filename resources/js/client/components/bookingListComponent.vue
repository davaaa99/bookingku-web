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
        <b-table fixed bordered small :items="items" :fields="fields" class="thead-light" id="bookinglist" primary-key="id_booking" >
            <template slot="payment_status" slot-scope="data">
                <!-- <b-button v-model="data.item.status" class="btn btn-detail paid" v-bind:style="paid(data.item.status)" v-on:click="handleClick" @click="paidAction()">{{ paid(data.item.status) }}</b-button> -->
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
                        key: 'id_schedule',
                        label:'Schedule',
                        sortable: true
                    },

                    payment_status: {
                        key: 'payment_status',
                        label: 'Status',
                        sortable: true
                    },
                    payment: {
                        label: 'Payment',
                        sortable: true
                    }
                },
                items:[]
            }
        },
        mounted(){
            this.loadData();
            console.log(this.items);
            
        },
        methods:{
            paid($status){
                const $key=['Unpaid','Down Payment', 'Full Payment']
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
            },

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
    }
</script>