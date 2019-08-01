<template>
    <div id="location-list">
        <div id="list">
            <div class="filter ">
                <div class="filter-item d-flex">
                    <div class="search  d-flex align-items-center">
                        <input class="filterSearch" type="text" v-model="filterSearch" placeholder="Search">
                            <i class="fa fa-search" style="color:#C0C4CC"></i>
                        </input>
                    </div>
                    <button @click="getData" class="btn btn-add btn-primary ml-auto">add</button>
                </div>
                <div class="spacer-20"></div>
            </div>
        </div>
        <!-- @click="detail(data.item.id_location)" -->
        <div class="item-list">
            <div class="card mt-3" v-for="location in dataLocation" :key="location.id_location" >
                <div class="horizontal" >
                    <b-card no-body class="overflow-hidden">
                        <b-row no-gutters class="d-flex">
                            <b-col class="col-lg-2 col-md-4 col-sm-12">
                                <b-card-img src="https://picsum.photos/400/400/?image=20" class="rounded-0"></b-card-img>
                            </b-col>
                            <b-col md="6">
                                <b-card-body>
                                    <h2>{{location.location_name}}</h2>
                                    <b-card-text>
                                        {{location.open_time}} - {{location.closing_time}}
                                    </b-card-text>
                                    <b-card-text>
                                        {{location.location_address}}
                                    </b-card-text>
                                </b-card-body>
                            </b-col>
                            <div class="ml-auto mt-2 igroup">
                                <i class="material-icons ic">edit</i>
                                <i class="material-icons mr-3 ic">close</i>
                            </div>
                        </b-row>
                    </b-card>
                </div>
            </div>
        </div>
        <div class="spacer-20"></div>
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
                        id_location: "003",
                        location_name: "Sarijadi Futsal",
                        location_address: "Komp. Pasadena Residence Blok AA No 21, Margahayu Utara, Kec. Babakan Ciparay, Kota Bandung, Jawa Barat 40223",
                        description: "Lapangan Baru",
                        open_time: "07:00",
                        closing_time: "22:00",
                    },
                    {
                        id_location: "004",
                        location_name: "Ciwaruga Futsal",
                        location_address: "Komp. Pasadena Residence Blok AA No 21, Margahayu Utara, Kec. Babakan Ciparay, Kota Bandung, Jawa Barat 40223",
                        description: "Lapangan Baru",
                        open_time: "07:00",
                        closing_time: "22:00",
                    },
                    {
                        id_location: "005",
                        location_name: "Sarijadi Futsal",
                        location_address: "Komp. Pasadena Residence Blok AA No 21, Margahayu Utara, Kec. Babakan Ciparay, Kota Bandung, Jawa Barat 40223",
                        description: "Lapangan Baru",
                        open_time: "07:00",
                        closing_time: "22:00",
                    },
                    {
                        id_location: "006",
                        location_name: "Ciwaruga Futsal",
                        location_address: "Komp. Pasadena Residence Blok AA No 21, Margahayu Utara, Kec. Babakan Ciparay, Kota Bandung, Jawa Barat 40223",
                        description: "Lapangan Baru",
                        open_time: "07:00",
                        closing_time: "22:00",
                    },
                    {
                        id_location: "007",
                        location_name: "Sarijadi Futsal",
                        location_address: "Komp. Pasadena Residence Blok AA No 21, Margahayu Utara, Kec. Babakan Ciparay, Kota Bandung, Jawa Barat 40223",
                        description: "Lapangan Baru",
                        open_time: "07:00",
                        closing_time: "22:00",
                    },
                    {
                        id_location: "008",
                        location_name: "Ciwaruga Futsal",
                        location_address: "Komp. Pasadena Residence Blok AA No 21, Margahayu Utara, Kec. Babakan Ciparay, Kota Bandung, Jawa Barat 40223",
                        description: "Lapangan Baru",
                        open_time: "07:00",
                        closing_time: "22:00",
                    },
                    {
                        id_location: "009",
                        location_name: "Sarijadi Futsal",
                        location_address: "Komp. Pasadena Residence Blok AA No 21, Margahayu Utara, Kec. Babakan Ciparay, Kota Bandung, Jawa Barat 40223",
                        description: "Lapangan Baru",
                        open_time: "07:00",
                        closing_time: "22:00",
                    },
                    {
                        id_location: "010",
                        location_name: "Ciwaruga Futsal",
                        location_address: "Komp. Pasadena Residence Blok AA No 21, Margahayu Utara, Kec. Babakan Ciparay, Kota Bandung, Jawa Barat 40223",
                        description: "Lapangan Baru",
                        open_time: "07:00",
                        closing_time: "22:00",
                    },
                    {
                        id_location: "011",
                        location_name: "Sarijadi Futsal",
                        location_address: "Komp. Pasadena Residence Blok AA No 21, Margahayu Utara, Kec. Babakan Ciparay, Kota Bandung, Jawa Barat 40223",
                        description: "Lapangan Baru",
                        open_time: "07:00",
                        closing_time: "22:00",
                    },
                    {
                        id_location: "012",
                        location_name: "Ciwaruga Futsal",
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
                // if (day.length < 2) day = '0' + day;

                window.location.href = window.location.protocol + '//' + window.location.host +
                    '/$2y$10$MtKIr0/yICTGGEPWGcj0lOGLK9UlSd6hrOiBYgQWlfkym6V52hQSm' + day +
                    '/locationlist/detail/' +
                    btoa(id);
            }
        }
    };

</script>
