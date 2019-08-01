<template>
    <div>
        <b-form @submit="onSubmit" @reset="onReset">
            <b-form-group>
                <b-row>
                    <b-col cols="4">
                        <label for="location">Lokasi</label>
                        <b-form-select v-model="selecteLocation" :option="location"></b-form-select>
                    </b-col>
                    <b-col cols="4">
                        <label for="field">Lapang</label>
                        <b-form-select v-model="selecteField" :option="field"></b-form-select>
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
                <b-card-group deck>
                    <!-- foreach field -->
                    <b-card border-variant="secondary" header="Lapang A" header-border-variant="white" align="center">
                        <!-- foreach schedule where field -->
                        <b-button>08.00-09.00</b-button>
                        <b-button>09.00-10.00</b-button>
                        <b-button>10.00-11.00</b-button>
                        <b-button>11.00-12.00</b-button>
                    </b-card>
                    <b-card border-variant="secondary" header="Lapang B" header-border-variant="white" align="center">
                        <!-- foreach schedule where field -->
                        <b-button>08.00-09.00</b-button>
                        <b-button>09.00-10.00</b-button>
                        <b-button>10.00-11.00</b-button>
                        <b-button>11.00-12.00</b-button>
                    </b-card>
                    <b-card border-variant="secondary" header="Lapang C" header-border-variant="white" align="center">
                        <!-- foreach schedule where field -->
                        <b-button>08.00-09.00</b-button>
                        <b-button>09.00-10.00</b-button>
                        <b-button>10.00-11.00</b-button>
                        <b-button>11.00-12.00</b-button>
                    </b-card>
                </b-card-group>
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
                    <b-button pill type="reset" variant="outline-primary">
                        <i class="fas fa-arrow-left"></i>
                    </b-button>
                    <b-button pill type="submit" variant="primary">Continue</b-button>
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
                
                selectedDate: new Date(),
                date:{
                    format: 'YYYY/MM/DD',
                    useCurrent:false,
                },
                components:{
                    datePicker
                },
                selectedField:null,
                field:[
                    { value: null, text: 'Please select an option' },
                    { value: 'a', text: 'This is First option' },
                    { value: 'b', text: 'Selected Option' },
                    { value: { C: '3PO' }, text: 'This is an option with object value' },
                    { value: 'd', text: 'This one is disabled', disabled: true }
                ],
                selectedFieldType:null,
                fieldType:[
                    { value: null, text: 'Please select an option' },
                    { value: 'a', text: 'This is First option' },
                    { value: 'b', text: 'Selected Option' },
                    { value: { C: '3PO' }, text: 'This is an option with object value' },
                    { value: 'd', text: 'This one is disabled', disabled: true }
                ],
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
            }
        }
    }
</script>

