<template>
    <div id="register" class="position-relative d-flex">
        <div class="container d-flex align-items-center justify-content-center justify-content-sm-center justify-content-lg-start flex-column mt-auto mb-auto">
            <div class="spacer-20"></div>
            <div class="register-header d-flex flex-column align-items-center">
                <div class="d-flex mb-n3">
                    <img :src="logo" width="30" height="30" alt="" class="mr-3 mt-2">
                    <p>BOOKINGKU</p>
                </div>
                <p class="sub-title">Please complete to create your account.</p>
            </div>
            <b-form id="register-form">
                <b-form-group label="Name" label-for="input-name" class="register-label">
                    <b-form-input class="register-input" size="sm" id="input-name" v-model="form.name" required></b-form-input>
                </b-form-group>
                <b-form-group label="Email" label-for="input-email" class="register-label">
                    <b-form-input class="register-input" size="sm" id="input-email" v-model="form.email" required></b-form-input>
                </b-form-group>
                <b-form-group label="Password" label-for="input-password" class="register-label">
                    <b-form-input type="password" class="register-input" size="sm" id="input-password" v-model="form.password" required></b-form-input>
                </b-form-group>
                <b-form-group label="Confirm Password" label-for="input-conf-password" class="register-label">
                    <b-form-input type="password" class="register-input" size="sm" id="input-conf-password" v-model="form.password" required></b-form-input>
                </b-form-group>
                <b-form-group label="Account Number" label-for="input-account_number" class="register-label d-flex flex-column">
                    <div class="d-flex">
                        <b-form-select size="sm" class="col-3 mr-1" v-model="form.account_type" :options="bank" style="border: none; border-bottom: 1px solid #C7C7DB; background: none"></b-form-select>
                        <b-form-input class="register-input" size="sm" id="input-account_number" v-model="form.account_number" required></b-form-input>
                    </div>
                </b-form-group>
                <b-form-group label="Phone Number" label-for="input-phone_number" class="register-label">
                    <b-form-input class="register-input" size="sm" id="input-phone_number" v-model="form.phone_number" required></b-form-input>
                </b-form-group>
                <b-form-group class="register-checkbox">
                    <b-form-checkbox id="check-agreement" v-model="form.agreement" name="check-agreement">I agree with terms and conditions</b-form-checkbox>
                </b-form-group>
            </b-form>
            <div class="spacer-20"></div>
            <div class="register-footer d-flex flex-column">
                <b-button class="btn register-button">Sign up</b-button>
                <div class="spacer-10"></div>
                <p class="sub-title" @click="login()">Already have an account? Sign in.</p>
            </div>
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
                logo: require('../images/logo.png'),
                checked:  false,
                colorstatus: '#5C5C5C',
                form: {
                    name: '',
                    email: '',
                    password: '',
                    account_type: '',
                    account_number: '',
                    phone_number: '',
                    agreement: false,
                },
                bank: [{text: 'Bank', value:'', disabled: true}, 'BI', 'BNI', 'BRI', 'BTN', 'BCA' ],
            }
        },
        methods: {
            login : function (){
                var d = new Date(),
                    month = '' + (d.getMonth() + 1),
                    day = '' + d.getDate(),
                    year = d.getFullYear();
                window.location.href = window.location.protocol + '//' + window.location.host +
                    '/$2y$10$MtKIr0/yICTGGEPWGcj0lOGLK9UlSd6hrOiBYgQWlfkym6V52hQSm' + day +
                    '/login';
            },
        }
    };

</script>
