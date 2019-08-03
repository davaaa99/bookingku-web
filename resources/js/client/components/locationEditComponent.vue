<template>
    <div id="location-add">
        <b-form id="location-form">
            <b-form-group label="Nama Lokasi" label-for="input-name">
                <b-form-input id="input-name" v-model="form.name" required placeholder="Masukkan nama lokasi"></b-form-input>
            </b-form-group>
            <b-form-group label="Alamat Lokasi" label-for="input-address">
                <b-form-input id="input-address" v-model="form.address" required placeholder="Masukkan alamat lokasi"></b-form-input>
            </b-form-group>
            <div class="d-flex">
                <b-button v-b-modal.octime>Atur Waktu Buka</b-button>
                <b-modal id="octime" size="lg" centered title="Atur Waktu Buka">
                    <b-row>
                        <p class="col-2 mt-2"><strong>Senin</strong></p>
                        <b-form-checkbox class="mt-2 col-1" v-model="show.monday" name="check-button" switch></b-form-checkbox>
                        <div v-if="show.monday" class="col-8">
                            <b-form-select class="ml-3 mb-2 mr-2 col-4" v-model="form.open_time" :options="otimes"></b-form-select>
                            <i class="fas fa-minus mr-2 mt-2"></i>
                            <b-form-select class="mb-2 mr-2 col-4" v-model="form.closing_time" :options="ctimes"></b-form-select>
                        </div>
                    </b-row>
                    <b-row>
                        <p class="col-2 mt-2"><strong>Selasa</strong></p>
                        <b-form-checkbox class="mt-2 col-1" v-model="show.tuesday" name="check-button" switch></b-form-checkbox>
                        <div v-if="show.tuesday" class="col-8">
                            <b-form-select class="ml-3 mb-2 mr-2 col-4" v-model="form.open_time" :options="otimes"></b-form-select>
                            <i class="fas fa-minus mr-2 mt-2"></i>
                            <b-form-select class="mb-2 mr-2 col-4" v-model="form.closing_time" :options="ctimes"></b-form-select>
                        </div>
                    </b-row>
                    <b-row>
                        <p class="col-2 mt-2"><strong>Rabu</strong></p>
                        <b-form-checkbox class="mt-2 col-1" v-model="show.wednesday" name="check-button" switch></b-form-checkbox>
                        <div v-if="show.wednesday" class="col-8">
                            <b-form-select class="ml-3 mb-2 mr-2 col-4" v-model="form.open_time" :options="otimes"></b-form-select>
                            <i class="fas fa-minus mr-2 mt-2"></i>
                            <b-form-select class="mb-2 mr-2 col-4" v-model="form.closing_time" :options="ctimes"></b-form-select>
                        </div>
                    </b-row>
                    <b-row>
                        <p class="col-2 mt-2"><strong>Kamis</strong></p>
                        <b-form-checkbox class="mt-2 col-1" v-model="show.thrusday" name="check-button" switch></b-form-checkbox>
                        <div v-if="show.thrusday" class="col-8">
                            <b-form-select class="ml-3 mb-2 mr-2 col-4" v-model="form.open_time" :options="otimes"></b-form-select>
                            <i class="fas fa-minus mr-2 mt-2"></i>
                            <b-form-select class="mb-2 mr-2 col-4" v-model="form.closing_time" :options="ctimes"></b-form-select>
                        </div>
                    </b-row>
                    <b-row>
                        <p class="col-2 mt-2"><strong>Jumat</strong></p>
                        <b-form-checkbox class="mt-2 col-1" v-model="show.friday" name="check-button" switch></b-form-checkbox>
                        <div v-if="show.friday" class="col-8">
                            <b-form-select class="ml-3 mb-2 mr-2 col-4" v-model="form.open_time" :options="otimes"></b-form-select>
                            <i class="fas fa-minus mr-2 mt-2"></i>
                            <b-form-select class="mb-2 mr-2 col-4" v-model="form.closing_time" :options="ctimes"></b-form-select>
                        </div>
                    </b-row>
                    <b-row>
                        <p class="col-2 mt-2"><strong>Sabtu</strong></p>
                        <b-form-checkbox class="mt-2 col-1" v-model="show.saturday" name="check-button" switch></b-form-checkbox>
                        <div v-if="show.saturday" class="col-8">
                            <b-form-select class="ml-3 mb-2 mr-2 col-4" v-model="form.open_time" :options="otimes"></b-form-select>
                            <i class="fas fa-minus mr-2 mt-2"></i>
                            <b-form-select class="mb-2 mr-2 col-4" v-model="form.closing_time" :options="ctimes"></b-form-select>
                        </div>
                    </b-row>
                    <b-row>
                        <p class="col-2 mt-2"><strong>Minggu</strong></p>
                        <b-form-checkbox class="mt-2 col-1" v-model="show.sunday" name="check-button" switch></b-form-checkbox>
                        <div v-if="show.sunday" class="col-8">
                            <b-form-select class="ml-3 mb-2 mr-2 col-4" v-model="form.open_time" :options="otimes"></b-form-select>
                            <i class="fas fa-minus mr-2 mt-2"></i>
                            <b-form-select class="mb-2 mr-2 col-4" v-model="form.closing_time" :options="ctimes"></b-form-select>
                        </div>
                    </b-row>
                </b-modal>
                <!-- <b-form-group id="input-group-open_time" label="Buka" label-for="input-open_time">
                    <b-form-input id="input-open_time" v-model="form.open_time" required></b-form-input>
                </b-form-group>
                <b-form-group id="input-group-closing_time" class="ml-5" label="Tutup" label-for="input-closing_time">
                    <b-form-input id="input-closing_time" v-model="form.closing_time" required></b-form-input>
                </b-form-group> -->
            </div>
            <div class="spacer-20"></div>
            <b-form-group label="Deskripsi" label-for="input-description">
                <b-form-input id="input-description" v-model="form.description" required placeholder="Masukkan deskripsi lapangan"></b-form-input>
            </b-form-group>
            <b-form-file multiple :file-name-formater="formatName"></b-form-file>
        </b-form>
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
                checked:  false,
                status: 'Tutup',
                form: {
                    name: '',
                    address: '',
                    open_time: '',
                    closing_time: '',
                    description: '',
                },
                otimes: [{text: 'Buka', value:null}, '00:00','01:00','02:00','03:00','04:00','05:00','06:00','07:00','08:00','09:00','10:00','11:00','12:00',
                    '13:00','14:00','15:00','16:00','17:00','18:00','19:00','20:00','21:00','22:00','23:00'
                ],
                ctimes: [{text: 'Tutup', value:null}, '00:00','01:00','02:00','03:00','04:00','05:00','06:00','07:00','08:00','09:00','10:00','11:00','12:00',
                    '13:00','14:00','15:00','16:00','17:00','18:00','19:00','20:00','21:00','22:00','23:00'
                ],
                show: {
                    monday: false,
                    tuesday: false,
                    wednesday: false,
                    thrusday: false,
                    friday: false,
                    saturaday: false,
                    sunday: false,
                }
            }
        },
        methods: {
            formatNames(files) {
                if (files.length === 1) {
                return files[0].name
                } else {
                return `${files.length} files selected`
                }
            }
        }
    };

</script>
