<template>
    <div id="lapang-detail">
        <b-card overlay img-src="https://rumus.web.id/wp-content/uploads/2018/08/lapangan-futsal.jpg" img-alt="Gambar Lapangan" 
        text-variant="white" border-variant="dark" class="image-header">
            <div class="spacer"></div>
            <div class="spacer-30"></div>
            <b-card-text>
                <h1> {{namalapang}}</h1>
                <p>{{tipelapang}}</p>
            </b-card-text>
        </b-card>
        
        <div class="spacer-30"></div>
        <div class="hari">
            <b-form-select v-model="selected" :options="options"></b-form-select>
        </div>
        <div class="tabel-jadwal">
            <b-table stripped hover :items="items" :fields="fields">
                <template slot="Action" slot-scope="data">
                    <b-button variant="light"  class=" btn btn-detail" @click="detail(data.item.idClient)">Edit</b-button>
                    ||
                    <b-button variant="danger" class=" btn btn-detail" @click="detail(data.item.idClient)">Delete</b-button>
                </template>
            </b-table>
        </div>
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
                namalapang: 'Lapang A',
                tipelapang: 'Sintetis',
                fields: ['Jam', 'Down_Payment', 'Harga', 'Action'],
                items: [
                    {Jam:"07.00-12.00",Down_Payment:"50%",Harga:"Rp.120.000",Action:""},
                    {Jam:"12.00-18.00",Down_Payment:"50%",Harga:"Rp.125.000",Action:""},
                    {Jam:"18.00-22.00",Down_Payment:"50%",Harga:"Rp.130.000",Action:""},
                ],
                selected: null,
                options: [
                { value: null, text: 'Pilih Hari ' },
                { value: 'Senin', text: 'Senin' },
                { value: 'Selasa', text: 'Selasa' },
                { value: 'Rabu', text: 'Rabu' },
                { value: 'Kamis', text: 'Kamis' },
                { value: 'Jumat', text: 'Jumat' },
                { value: 'Sabtu', text: 'Sabtu' },
                { value: 'Minggu', text: 'Minggu' }
                ],
                perPage: 10,
                filterSearch: "",
                url: window.location.origin + window.location.pathname,
                datafoto: {},
            };
        },
        computed: {
            rows() {
                return this.dataLocation.length;

            }
        },
        methods: {
            
        }
    };

</script>
