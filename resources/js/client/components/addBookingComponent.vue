<template>
    <div id="addbooking">
        <b-form @submit="onSubmit" @reset="onReset">
            <b-form-group>
                <div id="v-carousel" type="x/template">
                    <div class="card-carousel-wrapper">
                        <div class="card-carousel--nav__left" @click="moveCarousel(-1)" :disabled="atHeadOfList"></div>
                        <div class="card-carousel">
                        <div class="card-carousel--overflow-container">
                            <div class="card-carousel-cards" :style="{ transform: 'translateX' + '(' + currentOffset + 'px' + ')'}">
                            <b-card border-variant="secondary" header="Lapang A" header-border-variant="white" align="center">
                                    <b-button class="available">08.00-09.00</b-button>
                                    <b-button class="available">09.00-10.00</b-button>
                                    <b-button class="unavailable">10.00-11.00</b-button>
                                    <b-button class="unavailable">11.00-12.00</b-button>
                                    <b-button class="available">12.00-13.00</b-button>
                                    <b-button class="available">13.00-14.00</b-button>
                                    <b-button class="available">14.00-15.00</b-button>
                                    <b-button class="available">15.00-16.00</b-button>
                                    <b-button class="unavailable">16.00-17.00</b-button>
                                    <b-button class="unavailable">17.00-17.00</b-button>
                                    <b-button class="unavailable">18.00-19.00</b-button>
                                    <b-button class="unavailable">19.00-20.00</b-button>
                                    <b-button class="available">20.00-21.00</b-button>
                                    <b-button class="available">21.00-22.00</b-button>
                            </b-card>
                            <b-card border-variant="secondary" header="Lapang B" header-border-variant="white" align="center">
                                        <!-- foreach schedule where field -->
                                        <b-button class="available">08.00-09.00</b-button>
                                        <b-button class="available">09.00-10.00</b-button>
                                        <b-button class="unavailable">10.00-11.00</b-button>
                                        <b-button class="unavailable">11.00-12.00</b-button>
                                        <b-button class="available">12.00-13.00</b-button>
                                        <b-button class="available">13.00-14.00</b-button>
                                        <b-button class="available">14.00-15.00</b-button>
                                        <b-button class="choosed">15.00-16.00</b-button>
                                        <b-button class="unavailable">16.00-17.00</b-button>
                                        <b-button class="unavailable">17.00-17.00</b-button>
                                        <b-button class="unavailable">18.00-19.00</b-button>
                                        <b-button class="unavailable">19.00-20.00</b-button>
                                        <b-button class="available">20.00-21.00</b-button>
                                        <b-button class="available">21.00-22.00</b-button>
                                    </b-card>
                                    <b-card border-variant="secondary" header="Lapang C" header-border-variant="white" align="center">
                                        <!-- foreach schedule where field -->
                                        <b-button class="available">08.00-09.00</b-button>
                                        <b-button class="available">09.00-10.00</b-button>
                                        <b-button class="unavailable">10.00-11.00</b-button>
                                        <b-button class="unavailable">11.00-12.00</b-button>
                                        <b-button class="available">12.00-13.00</b-button>
                                        <b-button class="available">13.00-14.00</b-button>
                                        <b-button class="available">14.00-15.00</b-button>
                                        <b-button class="available">15.00-16.00</b-button>
                                        <b-button class="unavailable">16.00-17.00</b-button>
                                        <b-button class="unavailable">17.00-17.00</b-button>
                                        <b-button class="unavailable">18.00-19.00</b-button>
                                        <b-button class="unavailable">19.00-20.00</b-button>
                                        <b-button class="available">20.00-21.00</b-button>
                                        <b-button class="available">21.00-22.00</b-button>
                                    </b-card>
                            </div>
                        </div>
                        </div>
                        <div class="card-carousel--nav__right" @click="moveCarousel(1)" :disabled="atEndOfList"></div>
                    </div>
                </div>
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
                        <date-picker v-model="selectedDate" lang="en" :config="dateFormat"></date-picker>                        
                    </b-row>
                </b-col>
            </b-row>
            </b-form-group>
            <b-form-group id="input-name"  Label="Nama / Email Pelaggan" label-for="input-name">
                <b-form-row class="justify-content-md-right">
                    <b-col cols=2>
                        <label for="input-name">Nama / Email Pemesan</label>
                    </b-col>
                    <b-col cols=6>
                        <b-form-input id="input-name" v-model="user_email" type="string" required placeholder="Enter Name or Email" ></b-form-input>
                    </b-col>
                </b-form-row>    
            </b-form-group>
            <b-form-group id="input-price" label-align-md="Price" label-for="input-price">
                <b-row class="justify-content-md-right">
                    <div class="col-md-2">
                        <label for="input-price">Harga</label>
                    </div>
                    <div class="col-md-6">
                        <b-form-input id="input-price" v-model="price" type="number" required></b-form-input>
                    </div>
                </b-row>
            </b-form-group>
            <b-form-group>
                <b-row class="justify-content-md-right">
                    <div class="col-md-2">
                        <label for="payment_menthod">Tipe Pembayaran</label>
                    </div>
                    <div class="col-md-6">
                        <b-button margin="1" variant="primary">Down Payment</b-button>
                        <b-button margin="1" variant="primary">Fulll Payment</b-button>   
                    </div>
                    <b-col class="justify-content-md-right">
                        <p>Rp. xxx.xxxx</p>
                    </b-col>
                </b-row>
            </b-form-group>
            <b-row class="justify-content-md-right">
                <div class="col-md-6 col-md-offset-8">
                    <b-button type="reset" variant="outline-primary" href="bookinglist">
                        <i class="fas fa-arrow-left"></i>
                    </b-button>
                    <b-button type="submit" variant="primary">Continue</b-button>
                </div>
            </b-row>
        </b-form>
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
        data(){
            return{
                selectedLocation: "",
                locationList:[],
                location:[],
                selectedField: "",
                fieldlist:[],
                field:[],
                currentOffset: 0,
                windowSize: 3,
                paginationFactor: 220,
                items: [
                    {name: 'Tycoon Thai', tag: "Thai"},
                    {name: 'Ippudo', tag: "Japanese"},
                    {name: 'Milano', tag: "Pizza"},
                    {name: 'Tsing Tao', tag: "Chinese"},
                    {name: 'Frances', tag: "French"},
                    {name: 'Burma Superstar', tag: "Burmese"},
                    {name: 'Salt and Straw', tag: "Ice cream"},
                ],
                perPage:20,
                currentPage:1,
                selectedDate: new Date(),
                dateFormat:{
                    format: 'YYYY/MM/DD',
                    useCurrent:false,
                },
                // components:{
                //     datePicker
                // },
                "user_email":"",
                "price":"", //ambil dari db
                "paymentType":"", 
                "paymentValue":"",//ambil dari db
            }
        },
        computed: {
            atEndOfList() {
            return this.currentOffset <= (this.paginationFactor * -1) * (this.items.length - this.windowSize);
            },
            atHeadOfList() {
            return this.currentOffset === 0;
            },
        },
        mounted(){
            this.loadLocation();
        },
        methods:{
            onSubmit(book){
                book.preventDefault()
                alert(JSON.stringify(this.form))

                var d = new Date(),
                    month = '' + (d.getMonth() + 1),
                    day = '' + d.getDate(),
                    year = d.getFullYear();
                window.location.href = window.location.protocol + '//' + window.location.host +
                    '/$2y$10$MtKIr0/yICTGGEPWGcj0lOGLK9UlSd6hrOiBYgQWlfkym6V52hQSm' + day +
                    '/bookinglist';
            },
            onReset(book){
                book.preventDefault()
                //reset value
                this.form.field=''
                this.form.fieldType=''
                this.form.user_email=''
                this.form.price=''
                this.form.paymentType=''
                this.form.paymentValue=''
                //cleare native browser
                this.show=false
                this.$nextTick(()=>{
                    this.show=true
                })

                var d = new Date(),
                    month = '' + (d.getMonth() + 1),
                    day = '' + d.getDate(),
                    year = d.getFullYear();
                window.location.href = window.location.protocol + '//' + window.location.host +
                    '/$2y$10$MtKIr0/yICTGGEPWGcj0lOGLK9UlSd6hrOiBYgQWlfkym6V52hQSm' + day +
                    '/bookinglist';

            },
            moveCarousel(direction) {
            // Find a more elegant way to express the :style. consider using props to make it truly generic
                if (direction === 1 && !this.atEndOfList) {
                    this.currentOffset -= this.paginationFactor;
                } else if (direction === -1 && !this.atHeadOfList) {
                    this.currentOffset += this.paginationFactor;
                }
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
            }
        },
        watch:{
            selectedLocation:function(){
                this.loadField()
                this.loadByLocation()
            },
            selectedField:function(){
                this.loadByField()
            }
        }
    }
</script>

