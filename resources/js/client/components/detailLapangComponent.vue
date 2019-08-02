<template>
    <div id="lapang-detail">
        <b-card overlay img-src="https://picsum.photos/900/250/?image=3" img-alt="Gambar Lapangan" 
        text-variant="white" border-variant="dark"class="image-header">
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
            <b-table :hover="hover" :items="items" :fields="fields">
                
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
                dataLocation: [
                    {
                        id_location: "001",
                        location_name: "Sarijadi Futsal",
                        location_address: "Komp. Pasadena Residence Blok AA No 21, Margahayu Utara, Kec. Babakan Ciparay, Kota Bandung, Jawa Barat 40223",
                        description: "Lapangan Baru",
                        open_time: "07:00",
                        closing_time: "22:00",
                    },
                    {
                        id_location: "002",
                        location_name: "Ciwaruga Futsal",
                        location_address: "Komp. Pasadena Residence Blok AA No 21, Margahayu Utara, Kec. Babakan Ciparay, Kota Bandung, Jawa Barat 40223",
                        description: "Lapangan Baru",
                        open_time: "07:00",
                        closing_time: "22:00",
                    },
                    {
                        id_location: "001",
                        location_name: "Sarijadi Futsal",
                        location_address: "Komp. Pasadena Residence Blok AA No 21, Margahayu Utara, Kec. Babakan Ciparay, Kota Bandung, Jawa Barat 40223",
                        description: "Lapangan Baru",
                        open_time: "07:00",
                        closing_time: "22:00",
                    },
                    {
                        id_location: "002",
                        location_name: "Ciwaruga Futsal",
                        location_address: "Komp. Pasadena Residence Blok AA No 21, Margahayu Utara, Kec. Babakan Ciparay, Kota Bandung, Jawa Barat 40223",
                        description: "Lapangan Baru",
                        open_time: "07:00",
                        closing_time: "22:00",
                    },
                    {
                        id_location: "001",
                        location_name: "Sarijadi Futsal",
                        location_address: "Komp. Pasadena Residence Blok AA No 21, Margahayu Utara, Kec. Babakan Ciparay, Kota Bandung, Jawa Barat 40223",
                        description: "Lapangan Baru",
                        open_time: "07:00",
                        closing_time: "22:00",
                    },
                    {
                        id_location: "002",
                        location_name: "Ciwaruga Futsal",
                        location_address: "Komp. Pasadena Residence Blok AA No 21, Margahayu Utara, Kec. Babakan Ciparay, Kota Bandung, Jawa Barat 40223",
                        description: "Lapangan Baru",
                        open_time: "07:00",
                        closing_time: "22:00",
                    },
                    {
                        id_location: "001",
                        location_name: "Sarijadi Futsal",
                        location_address: "Komp. Pasadena Residence Blok AA No 21, Margahayu Utara, Kec. Babakan Ciparay, Kota Bandung, Jawa Barat 40223",
                        description: "Lapangan Baru",
                        open_time: "07:00",
                        closing_time: "22:00",
                    },
                 
                ],
            };
        },
        computed: {
            rows() {
                return this.dataLocation.length;

            }
        },
        methods: {
            detail: function (id) {
                var self = this;
                var d = new Date(),
                    month = '' + (d.getMonth() + 1),
                    day = '' + d.getDate(),
                    year = d.getFullYear();

                if (month.length < 2) month = '0' + month;
                if (day.length < 2) day = '0' + day;

                window.location.href = window.location.protocol + '//' + window.location.host +
                    '/$2y$10$MtKIr0/yICTGGEPWGcj0lOGLK9UlSd6hrOiBYgQWlfkym6V52hQSm' + day +
                    '/clientlist/detaillokasi/' +
                    btoa(id);
            }
        }
    };

</script>
