<template>
  <div id="register" class="position-relative d-flex">
    <div
      class="container d-flex align-items-center justify-content-center justify-content-sm-center justify-content-lg-start flex-column mt-auto mb-auto"
    >
      <div class="spacer-20"></div>
      <div class="register-header d-flex flex-column align-items-center">
        <div class="d-flex mb-n3">
          <img src="/images/logo.png" width="30" height="30" alt class="mr-3 mt-2" />
          <p>BOOKINGKU</p>
        </div>
        <p class="sub-title">Please complete to create your account.</p>
      </div>
      <b-form id="register-form">
        <b-form-group
          label="Name"
          label-for="input-name"
          class="register-label"
          :class="status($v.form.name)"
        >
          <b-form-input
            class="register-input"
            size="sm"
            id="input-name"
            v-model="$v.form.name.$model"
            required
          ></b-form-input>
          <div v-if="$v.form.name.$error">
            <div class="error" v-if="!$v.form.name.required">Name is required</div>
            <div
              class="error"
              v-if="!$v.form.name.minLength"
            >Name must have at least {{$v.form.name.$params.minLength.min}} characters.</div>
          </div>
        </b-form-group>
        <b-form-group
          label="Email"
          label-for="input-email"
          class="register-label"
          :class="status($v.form.email)">
          <b-form-input
            class="register-input"
            size="sm"
            id="input-email"
            v-model="$v.form.email.$model"
            required
          ></b-form-input>
          <div v-if="$v.form.email.$error">
            <div class="error" v-if="!$v.form.email.required">Email is required</div>
          </div>
        </b-form-group>
        <b-form-group
          label="Password"
          label-for="input-password"
          class="register-label"
          :class="status($v.form.password)"
        >
          <b-form-input
            type="password"
            class="register-input"
            size="sm"
            id="input-password"
            v-model="$v.form.password.$model"
            required
          ></b-form-input>
          <div v-if="$v.form.password.$error">
            <div class="error" v-if="!$v.form.password.required">Password is required</div>
            <div
              class="error"
              v-if="!$v.form.password.minLength"
            >Password must have at least {{$v.form.password.$params.minLength.min}} characters.</div>
          </div>
        </b-form-group>
        <b-form-group
          label="Confirm Password"
          label-for="input-conf-password"
          class="register-label"
        >
          <b-form-input
            type="password"
            class="register-input"
            size="sm"
            id="input-conf-password"
            v-model="$v.form.confirm_password.$model"
            required
          ></b-form-input>
          <div v-if="$v.form.confirm_password.$error">
            <div class="error" v-if="!$v.form.confirm_password.sameAsPassword">Password and Confirm Password do not match</div>
          </div>
        </b-form-group>
        <b-form-group
          label="Account Number"
          label-for="input-account_number"
          class="register-label d-flex flex-column"
        >
          <div class="d-flex">
            <b-form-select size="sm" class="col-3 mr-1" v-model="account_type" :options="bank" style="border: none; border-bottom: 1px solid #C7C7DB; background: none"></b-form-select>
            <b-form-input
              class="register-input"
              size="sm"
              id="input-account_number"
              v-model="account_number"
              required
            ></b-form-input>
          </div>
        </b-form-group>
        <b-form-group
          label="Phone Number"
          label-for="input-phone_number"
          class="register-label"
          :class="status($v.form.phone_number)"
        >
          <b-form-input
            class="register-input"
            size="sm"
            id="input-phone_number"
            v-model="$v.form.phone_number.$model"
            required
          ></b-form-input>
          <div v-if="$v.form.phone_number.$error">
            <div
              class="error"
              v-if="!$v.form.phone_number.minLength"
            >Phone number must have at least {{$v.form.phone_number.$params.minLength.min}} characters.</div>
          </div>
        </b-form-group>
        <b-form-group class="register-checkbox">
          <b-form-checkbox
            id="check-agreement"
            v-model="$v.agreement.$model"
            name="check-agreement"
          >I agree with terms and conditions</b-form-checkbox>
          <div v-if="$v.agreement.required">
            <div
              class="error"
              v-if="!agreement"
            >Please check this box if you want to proceed</div>
          </div>
        </b-form-group>
      </b-form>
      <div class="spacer-20"></div>
      <div class="register-footer d-flex flex-column">
        <b-button class="btn register-button" @click="register()" :disabled="$v.$invalid || !agreement">Sign up</b-button>
        <div class="spacer-10"></div>
        <a class="sub-title" href="/login">Already have an account? Sign in.</a>
      </div>
    </div>
  </div>
</template>

<script>
import BootstrapVue from "bootstrap-vue";
import { required, minLength, sameAs } from "vuelidate/lib/validators";
import { type } from "os";

Vue.use(BootstrapVue);

export default {
  data() {
    return {
      checked: false,
      colorstatus: "#5C5C5C",
      account_type: "",
      account_number: "",
      form: {
        name: "",
        email: "",
        password: "",
        confirm_password: "",
        account_number: "",
        phone_number: ""
      },
      agreement: "",
      bank: [
        { text: "Bank", value: "", disabled: true },
        {text: "BNI", value: "009"},
        {text: "BRI", value: "002"},
        {text: "BTN", value: "200"},
        {text: "BCA", value: "014"}
      ]
    };
  },
  validations: {
    form: {
      name: {
        required,
        minLength: minLength(3)
      },
      email: {
        required
      },
      password: {
        required,
        minLength: minLength(8)
      },
      confirm_password: {
        sameAsPassword: sameAs("password")
      },
      phone_number: {
        minLength: minLength(10)
      }
    },
    agreement: {
      required
    }
  },
  methods: {
    status(validation) {
      if (validation.$error) return "error";
    },
    isDisable(error) {
      this.$v.$touch();
      return error.$error;
    },
    register() {
      this.form.account_number = this.account_type + this.account_number
      axios({
        url: "/v1/auth/register",
        method: "POST",
        data: this.form
      })
        .then(response => {
          alert("Successfully registered");
          window.location.href =
            window.location.protocol + "//" + window.location.host + "/login";
        })
        .catch(error => {
          alert("Unable to save data. Bad config.");
          window.location.href =
            window.location.protocol + "//" + window.location.host + "/v1/auth/register";
        });
    }
  }
};
</script>
