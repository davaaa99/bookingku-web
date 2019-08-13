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
                <b-form-group label="Email" label-for="input-email" class="login-label" :class="status($v.form.email)">
                    <b-form-input class="login-input" size="sm" id="input-email" v-model="$v.form.email.$model" required></b-form-input>
                    <div v-if="$v.form.email.$error">
                        <div class="error" v-if="!$v.form.email.required">Email is required</div>
                        <div class="error" v-if="!$v.form.email.vemail">Please enter a valid email</div>
                    </div>
                </b-form-group>
                <b-form-group label="Password" label-for="input-password" class="login-label">
                    <b-form-input type="password" class="login-input" size="sm" id="input-password" v-model="form.password" required></b-form-input>
                </b-form-group>
                <div class="login-checkbox d-flex">
                    <b-form-checkbox id="check-remember" v-model="form.remember" name="check-remember">Remember me</b-form-checkbox>
                    <p class="sub-title ml-auto">Forgot Password</p>
                </div>
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
    import { required, helpers } from 'vuelidate/lib/validators'
    import {
        type
    } from 'os';
    Vue.use(BootstrapVue)

    const vemail = helpers.regex('vemail', /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/)
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
        validations: {
            form: {
                email: {
                    required,
                    vemail
                }   
            }
        },
        methods: {
            status(validation) {
                return {
                    error: validation.$error
                }
            },
            login(){
                let uri = 'http://localhost:8000/v1/auth/login';
                this.axios.post(uri, this.form).then((response) => {
                    if (response.data.serve.user.user_type == '2') {
                        window.location.href = window.location.protocol + '//' + window.location.host +
                            '/locationlist';
                    } else window.location.href = window.location.protocol + '//' + window.location.host +
                            '/verifybooking';
                });
            },
            register: function() {
                window.location.href = window.location.protocol + '//' + window.location.host +
                    '/clientregister';
            },
        }
    };

</script>
