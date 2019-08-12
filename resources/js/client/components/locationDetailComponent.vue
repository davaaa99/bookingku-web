<template>
    <div id="location-detail">
        <b-card overlay img-src="https://picsum.photos/900/250/?image=3" 
        img-alt="Gambar Lapangan" text-variant="white" border-variant="dark"
        class="image-header">
            <div class="spacer"></div>
            <div class="spacer-30"></div>
            <b-card-text>
                <h1>Sarijadi Futsal</h1>
                <p>Komp. Pasadena Residence Blok AA No 21, Margahayu Utara, Kec. Babakan Ciparay, Kota Bandung, Jawa Barat 40223</p>
            </b-card-text>
        </b-card>
        <div class="spacer-30"></div>
        <div class="detail d-flex">
            <div class="desc">
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
            </div>
            <div class="time">
                <h3>Waktu Buka</h3>
                <b-row>
                    <ul>
                        <li>Senin</li>
                        <li>Selasa</li>
                        <li>Rabu</li>
                        <li>Kamis</li>
                        <li>Jumat</li>
                        <li>Sabtu</li>
                        <li>Minggu</li>
                    </ul>
                    <ul>
                        <li>07:00 - 22:00</li>
                        <li>07:00 - 22:00</li>
                        <li>07:00 - 22:00</li>
                        <li>07:00 - 22:00</li>
                        <li>07:00 - 22:00</li>
                        <li>07:00 - 22:00</li>
                        <li>07:00 - 22:00</li>
                    </ul>
                </b-row>
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
            };
        },
    };

</script>
