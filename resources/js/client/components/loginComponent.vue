<template>
    <div id="login" class="position-relative d-flex">
        <div class="container d-flex align-items-center justify-content-center justify-content-sm-center flex-column mt-auto mb-auto">
            <div class="login-header d-flex flex-column align-items-center">
                <div class="d-flex mb-n3">
                    <img :src="logo" width="30" height="30" alt="" class="mr-3 mt-2">
                    <p>BOOKINGKU</p>
                </div>
                <p class="sub-title">Welcome back! Please login to your account.</p>
            </div>
            <div class="spacer-50"></div>
            <b-form id="login-form">
                <b-form-group label="Email" label-for="input-email" class="login-label">
                    <b-form-input class="login-input" size="sm" id="input-email" v-model="form.email" required></b-form-input>
                </b-form-group>
                <b-form-group label="Password" label-for="input-password" class="login-label">
                    <b-form-input type="password" class="login-input" size="sm" id="input-password" v-model="form.password" required></b-form-input>
                </b-form-group>
                <!-- <div class="login-checkbox d-flex">
                    <b-form-checkbox id="check-remember" v-model="form.remember" name="check-remember">Remember me</b-form-checkbox>
                    <p class="sub-title ml-auto">Forgot Password</p>
                </div> -->
            </b-form>
            <div class="spacer-20"></div>
            <div class="login-footer d-flex">
                <b-button class="btn login-button" @click="login()">Login</b-button>
                <b-button class="btn signup-button" @click="register()">Sign up</b-button>
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
                    email: '',
                    password: '',
                    // remember: false,
                },
            }
        },
        methods: {
            // login: function() {
            //     var d = new Date(),
            //         month = '' + (d.getMonth() + 1),
            //         day = '' + d.getDate(),
            //         year = d.getFullYear();
            //     window.location.href = window.location.protocol + '//' + window.location.host +
            //         '/$2y$10$MtKIr0/yICTGGEPWGcj0lOGLK9UlSd6hrOiBYgQWlfkym6V52hQSm' + day +
            //         '/locationlist';
            // },
            login(){
                let uri = 'http://localhost:8000/api/v1/auth/login';
                this.axios.post(uri, this.form).then((response) => {
                    // console.log(response.data.serve.access_token);
                    console.log(response);
                    // var d = new Date(),
                    //     month = '' + (d.getMonth() + 1),
                    //     day = '' + d.getDate(),
                    //     year = d.getFullYear();
                    // window.location.href = window.location.protocol + '//' + window.location.host +
                    //     '/api/v1' + '/location';
                });
            },
            register: function() {
                var d = new Date(),
                    month = '' + (d.getMonth() + 1),
                    day = '' + d.getDate(),
                    year = d.getFullYear();
                window.location.href = window.location.protocol + '//' + window.location.host +
                    '/$2y$10$MtKIr0/yICTGGEPWGcj0lOGLK9UlSd6hrOiBYgQWlfkym6V52hQSm' + day +
                    '/register';
            },
        }
    };

</script>
