<template>
    <div id="addbooking">
        <b-form @submit="onSubmit" @reset="onReset">
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
            <b-form-group>
                <b-carousel id="schedule" v-model="schedule" controls indikator @sliding-start="onSlideStart" @sliding-end="onSlideEnd">
                    <b-card-group deck>
                        <!-- foreach field -->
                        <b-carousel-slide>
                            <b-card border-variant="secondary" header="Lapang A" header-border-variant="white" align="center">
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
                        </b-carousel-slide>
                        <b-carousel-slide>
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
                        </b-carousel-slide>
                        <b-carousel-slide>
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
                        </b-carousel-slide> 
                    </b-card-group>
                </b-carousel>
            </b-form-group>
            <b-form-group id="input-name"  Label="Nama / Email Pelaggan" label-for="input-name">
                <b-form-row class="justify-content-md-right">
                    <b-col cols="2">
                        <label for="input-name">Nama / Email Pemesan</label>
                    </b-col>
                    <b-col cols="6">
                        <b-form-input id="input-name" v-model="user_email" type="string" required placeholder="Enter Name or Email" ></b-form-input>
                    </b-col>
                </b-form-row>    
            </b-form-group>
            <b-form-group id="input-price" label-align-md="Price" label-for="input-price">
                <b-row class="justify-content-md-right">
                    <b-col cols="2">
                        <label for="input-price">Harga</label>
                    </b-col>
                    <b-col cols="6">
                        <b-form-input id="input-price" v-model="price" type="number" required></b-form-input>
                    </b-col>
                </b-row>
            </b-form-group>
            <b-form-group>
                <b-row class="justify-content-md-right">
                    <b-col cols="2">
                        <label for="payment_menthod">Tipe Pembayaran</label>
                    </b-col>
                    <b-col cols="6">
                        <b-button margin="1" variant="primary">Down Payment</b-button>
                        <b-button margin="1" variant="primary">Fulll Payment</b-button>   
                    </b-col>
                    <b-col class="justify-content-md-right">
                        <p>Rp. xxx.xxxx</p>
                    </b-col>
                </b-row>
            </b-form-group>
            <b-row class="justify-content-md-right">
                <b-col col="6" offset="8">
                    <b-button type="reset" variant="outline-primary" href="bookinglist">
                        <i class="fas fa-arrow-left"></i>
                    </b-button>
                    <b-button type="submit" variant="primary">Continue</b-button>
                </b-col>
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
                perPage:20,
                currentPage:1,
                selectedLocation: null,
                location:[{text:'Pilih Lokasi', value:null},'Ciwarug Futsal', 'Sarijadi Futsal'],
                selectedField: null,
                field:[{text:'Pilih Lokasi', value:null},'Vinyl', 'Sintetis','Semen'],
                selectedDate: new Date(),
                date:{
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

            }
        }
    }
</script>

