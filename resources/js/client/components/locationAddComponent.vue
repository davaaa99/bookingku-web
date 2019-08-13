<template>
    <div id="location-add">
        <b-form id="location-form">
            <b-form-group>
                <b-row>
                    <b-col class="col-2 mt-2" :class="status($v.form.name)">
                        <label><strong>Nama Lokasi</strong></label>
                    </b-col>
                    <b-col>
                        <b-form-input class="forminput" v-model="$v.form.name.$model" required placeholder="Masukkan nama lokasi"></b-form-input>
                        <div v-if="$v.form.name.$error">
                            <div class="error" v-if="!$v.form.name.required">Nama lokasi harus diisi</div>
                        </div>
                    </b-col>
                </b-row>
            </b-form-group>
            <b-form-group>
                <b-row>
                    <b-col class="col-2 mt-2">
                        <label><strong>Alamat Lokasi</strong></label>
                    </b-col>
                    <b-col>
                        <b-form-input class="forminput" v-model="form.address" required placeholder="Masukkan alamat lokasi"></b-form-input>
                    </b-col>
                </b-row>
            </b-form-group>
            <b-form-group>
                <b-row>
                    <b-col class="col-2 mt-2">
                        <label><strong>Deskripsi Lokasi</strong></label>
                    </b-col>
                    <b-col>
                        <b-form-textarea class="forminput" v-model="form.description" required placeholder="Masukkan deskripsi lapangan" style="height: 100px"></b-form-textarea>
                    </b-col>
                </b-row>
            </b-form-group>
            <b-form-group>
                <b-row>
                    <b-col class="col-2 mt-2">
                        <label><strong>Foto Lokasi</strong></label>
                    </b-col>
                    <b-col>
                        <b-form-file multiple :file-name-formater="formatName"></b-form-file>
                    </b-col>
                </b-row>
            </b-form-group>
            <div class="spacer-20"></div>
            <div class="d-flex">
                <b-button v-b-modal.octime class="btn" style="margin-left: 17.5%">Atur Waktu Buka</b-button>
                <b-modal id="octime" size="lg" centered title="Atur Waktu Buka" :header-bg-variant="headerBgVariant" :header-text-variant="headerTextVariant">
                    <b-row>
                        <p class="col-2 mt-2" style="margin-right: -5%"><strong>Setiap Hari</strong></p>
                        <div class="mt-2 col-2 d-flex">
                            <b-form-checkbox v-model="form.everyday.valstatus" name="check-button" switch></b-form-checkbox>
                            <p :style="{color: changeColor(form.everyday.valstatus)}"><strong>{{ changeStatus(form.everyday.valstatus) }}</strong></p>
                        </div>
                        <div v-if="form.everyday.valstatus" class="col-8">
                            <b-form-select style="border: none; border-bottom: 2px solid #3490DC; background: none" class="ml-3 mb-2 mr-2 col-3" v-model="form.everyday.open_time" :options="otimes"></b-form-select>
                            <i class="fas fa-minus mr-2 mt-2"></i>
                            <b-form-select style="border: none; border-bottom: 2px solid #3490DC; background: none" class="mb-2 mr-2 col-3" v-model="form.everyday.closing_time" :options="ctimes"></b-form-select>
                        </div>
                    </b-row>
                    <div v-if="!form.everyday.valstatus">
                        <b-row>
                            <p class="col-1 mt-2 mr-4"><strong>Senin</strong></p>
                            <div class="mt-2 col-2 d-flex">
                                <b-form-checkbox v-model="form.monday.valstatus" name="check-button" switch></b-form-checkbox>
                                <p :style="{color: changeColor(form.monday.valstatus)}"><strong>{{ changeStatus(form.monday.valstatus) }}</strong></p>
                            </div>
                            <div v-if="form.monday.valstatus" class="col-8">
                                <b-form-select style="border: none; border-bottom: 2px solid #3490DC; background: none" class="ml-3 mb-2 mr-2 col-3" v-model="form.monday.open_time" :options="otimes"></b-form-select>
                                <i class="fas fa-minus mr-2 mt-2"></i>
                                <b-form-select style="border: none; border-bottom: 2px solid #3490DC; background: none" class="mb-2 mr-2 col-3" v-model="form.monday.closing_time" :options="ctimes"></b-form-select>
                            </div>
                        </b-row>
                        <b-row>
                            <p class="col-1 mt-2 mr-4"><strong>Selasa</strong></p>
                            <div class="mt-2 col-2 d-flex">
                                <b-form-checkbox v-model="form.tuesday.valstatus" name="check-button" switch></b-form-checkbox>
                                <p :style="{color: changeColor(form.tuesday.valstatus)}"><strong>{{ changeStatus(form.tuesday.valstatus) }}</strong></p>
                            </div>
                            <div v-if="form.tuesday.valstatus" class="col-8">
                                <b-form-select style="border: none; border-bottom: 2px solid #3490DC; background: none" class="ml-3 mb-2 mr-2 col-3" v-model="form.tuesday.open_time" :options="otimes"></b-form-select>
                                <i class="fas fa-minus mr-2 mt-2"></i>
                                <b-form-select style="border: none; border-bottom: 2px solid #3490DC; background: none" class="mb-2 mr-2 col-3" v-model="form.tuesday.closing_time" :options="ctimes"></b-form-select>
                            </div>
                        </b-row>
                        <b-row>
                            <p class="col-1 mt-2 mr-4"><strong>Rabu</strong></p>
                            <div class="mt-2 col-2 d-flex">
                                <b-form-checkbox v-model="form.wednesday.valstatus" name="check-button" switch></b-form-checkbox>
                                <p :style="{color: changeColor(form.wednesday.valstatus)}"><strong>{{ changeStatus(form.wednesday.valstatus) }}</strong></p>
                            </div>
                            <div v-if="form.wednesday.valstatus" class="col-8">
                                <b-form-select style="border: none; border-bottom: 2px solid #3490DC; background: none" class="ml-3 mb-2 mr-2 col-3" v-model="form.wednesday.open_time" :options="otimes"></b-form-select>
                                <i class="fas fa-minus mr-2 mt-2"></i>
                                <b-form-select style="border: none; border-bottom: 2px solid #3490DC; background: none" class="mb-2 mr-2 col-3" v-model="form.wednesday.closing_time" :options="ctimes"></b-form-select>
                            </div>
                        </b-row>
                        <b-row>
                            <p class="col-1 mt-2 mr-4"><strong>Kamis</strong></p>
                            <div class="mt-2 col-2 d-flex">
                                <b-form-checkbox v-model="form.thrusday.valstatus" name="check-button" switch></b-form-checkbox>
                                <p :style="{color: changeColor(form.thrusday.valstatus)}"><strong>{{ changeStatus(form.thrusday.valstatus) }}</strong></p>
                            </div>
                            <div v-if="form.thrusday.valstatus" class="col-8">
                                <b-form-select style="border: none; border-bottom: 2px solid #3490DC; background: none" class="ml-3 mb-2 mr-2 col-3" v-model="form.thrusday.open_time" :options="otimes"></b-form-select>
                                <i class="fas fa-minus mr-2 mt-2"></i>
                                <b-form-select style="border: none; border-bottom: 2px solid #3490DC; background: none" class="mb-2 mr-2 col-3" v-model="form.thrusday.closing_time" :options="ctimes"></b-form-select>
                            </div>
                        </b-row>
                        <b-row>
                            <p class="col-1 mt-2 mr-4"><strong>Jumat</strong></p>
                            <div class="mt-2 col-2 d-flex">
                                <b-form-checkbox v-model="form.friday.valstatus" name="check-button" switch></b-form-checkbox>
                                <p :style="{color: changeColor(form.friday.valstatus)}"><strong>{{ changeStatus(form.friday.valstatus) }}</strong></p>
                            </div>
                            <div v-if="form.friday.valstatus" class="col-8">
                                <b-form-select style="border: none; border-bottom: 2px solid #3490DC; background: none" class="ml-3 mb-2 mr-2 col-3" v-model="form.friday.open_time" :options="otimes"></b-form-select>
                                <i class="fas fa-minus mr-2 mt-2"></i>
                                <b-form-select style="border: none; border-bottom: 2px solid #3490DC; background: none" class="mb-2 mr-2 col-3" v-model="form.friday.closing_time" :options="ctimes"></b-form-select>
                            </div>
                        </b-row>
                        <b-row>
                            <p class="col-1 mt-2 mr-4"><strong>Sabtu</strong></p>
                            <div class="mt-2 col-2 d-flex">
                                <b-form-checkbox v-model="form.saturday.valstatus" name="check-button" switch></b-form-checkbox>
                                <p :style="{color: changeColor(form.saturday.valstatus)}"><strong>{{ changeStatus(form.saturday.valstatus) }}</strong></p>
                            </div>
                            <div v-if="form.saturday.valstatus" class="col-8">
                                <b-form-select style="border: none; border-bottom: 2px solid #3490DC; background: none" class="ml-3 mb-2 mr-2 col-3" v-model="form.saturday.open_time" :options="otimes"></b-form-select>
                                <i class="fas fa-minus mr-2 mt-2"></i>
                                <b-form-select style="border: none; border-bottom: 2px solid #3490DC; background: none" class="mb-2 mr-2 col-3" v-model="form.saturday.closing_time" :options="ctimes"></b-form-select>
                            </div>
                        </b-row>
                        <b-row>
                            <p class="col-1 mt-2 mr-4"><strong>Minggu</strong></p>
                            <div class="mt-2 col-2 d-flex">
                                <b-form-checkbox v-model="form.sunday.valstatus" name="check-button" switch></b-form-checkbox>
                                <p :style="{color: changeColor(form.sunday.valstatus)}"><strong>{{ changeStatus(form.sunday.valstatus) }}</strong></p>
                            </div>
                            <div v-if="form.sunday.valstatus" class="col-8">
                                <b-form-select style="border: none; border-bottom: 2px solid #3490DC; background: none" class="ml-3 mb-2 mr-2 col-3" v-model="form.sunday.open_time" :options="otimes"></b-form-select>
                                <i class="fas fa-minus mr-2 mt-2"></i>
                                <b-form-select style="border: none; border-bottom: 2px solid #3490DC; background: none" class="mb-2 mr-2 col-3" v-model="form.sunday.closing_time" :options="ctimes"></b-form-select>
                            </div>
                        </b-row>
                    </div>
                </b-modal>
            </div>
            <div class="spacer-50"></div>
            <div class="d-flex">
                <button class="btn btn-primary ml-auto mr-2" @click="save()">Save</button>
                <button class="btn btn-danger mr-auto" @click="cancel()">Cancel</button>
            </div>
        </b-form>
        <div class="spacer-20"></div>
    </div>
</template>

<script>
    import BootstrapVue from 'bootstrap-vue'
    import { required } from 'vuelidate/lib/validators'
    import {
        type
    } from 'os';
    Vue.use(BootstrapVue)

    export default {
        data() {
            return {
                headerBgVariant: 'primary',
                headerTextVariant: 'light',
                colorstatus: '#5C5C5C',
                form: {
                    name: '',
                    address: '',
                    everyday: {
                        status: 'Tutup',
                        valstatus: false,
                        open_time: '',
                        closing_time: ''
                    },
                    monday: {
                        status: 'Tutup',
                        valstatus: false,
                        open_time: '',
                        closing_time: ''
                    },
                    tuesday: {
                        status: 'Tutup',
                        valstatus: false,
                        open_time: '',
                        closing_time: ''
                    },
                    wednesday: {
                        status: 'Tutup',
                        valstatus: false,
                        open_time: '',
                        closing_time: ''
                    },
                    thrusday: {
                        status: 'Tutup',
                        valstatus: false,
                        open_time: '',
                        closing_time: ''
                    },
                    friday: {
                        status: 'Tutup',
                        valstatus: false,
                        open_time: '',
                        closing_time: ''
                    },
                    saturday: {
                        status: 'Tutup',
                        valstatus: false,
                        open_time: '',
                        closing_time: ''
                    },
                    sunday: {
                        status: 'Tutup',
                        valstatus: false,
                        open_time: '',
                        closing_time: ''
                    },
                    description: '',
                    images: '',
                },
                otimes: [{text: '- Jam Buka -', value:'', disabled: true}, '00:00','01:00','02:00','03:00','04:00','05:00','06:00','07:00','08:00','09:00','10:00','11:00','12:00',
                    '13:00','14:00','15:00','16:00','17:00','18:00','19:00','20:00','21:00','22:00','23:00'
                ],
                ctimes: [{text: '- Jam Tutup -', value:'', disabled: true}, '00:00','01:00','02:00','03:00','04:00','05:00','06:00','07:00','08:00','09:00','10:00','11:00','12:00',
                    '13:00','14:00','15:00','16:00','17:00','18:00','19:00','20:00','21:00','22:00','23:00'
                ],
            }
        },
        validations: {
            form: {
                name: {
                    required
                }
            }
        },
        methods: {
            status(validation) {
                return {
                    error: validation.$error
                }
            },
            save : function (){
                var d = new Date(),
                    month = '' + (d.getMonth() + 1),
                    day = '' + d.getDate(),
                    year = d.getFullYear();
                window.location.href = window.location.protocol + '//' + window.location.host +
                    '/locationlist';
            },
            cancel : function (){
                var d = new Date(),
                    month = '' + (d.getMonth() + 1),
                    day = '' + d.getDate(),
                    year = d.getFullYear();
                window.location.href = window.location.protocol + '//' + window.location.host +
                    '/locationlist';
            },
            formatNames(files) {
                if (files.length === 1) {
                return files[0].name
                } else {
                return `${files.length} files selected`
                }
            },
            changeStatus(valstatus){
                if(valstatus){
                    return 'Buka'
                }else{
                    return 'Tutup'
                }
            },
            changeColor(valstatus){
                if(valstatus){
                    return '#0032E7'
                }else{
                    return 'darkgray'
                }
            }
        }
    };

</script>
