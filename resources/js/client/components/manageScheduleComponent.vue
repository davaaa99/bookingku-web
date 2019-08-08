<template>
  <div>
    <b-form @submit="onSubmit" @reset="onReset" v-if="show">
      <b-form-group id="input-group-2" label="Location:" label-for="input-2">
        <b-form-select
          id="input-2"
          v-model="form.location"
          :options="locations"
          required
        ></b-form-select>
      </b-form-group>

      <b-form-group id="input-group-3" label="Field:" label-for="input-3">
        <b-form-select
          id="input-3"
          v-model="form.field"
          :options="fields"
          required
        ></b-form-select>
      </b-form-group>

      <b-form-group id="input-group-1" label="Price:" label-for="input-1">
        <b-form-input
          id="input-1"
          v-model="form.price"
          required
          placeholder="Enter Price"
        ></b-form-input>
      </b-form-group>

      <b-form-group id="input-group-4" label="Down Payment:" label-for="input-4">
        <b-form-input
          id="input-4"
          v-model="form.dp"
          required
          placeholder="Enter Down Payment"
        ></b-form-input>
      </b-form-group>
        <b-form-group id="input-group-5" label="Day :" label-for="input-5">
        <b-form-checkbox-group
            v-model="form.day"
            :options="options"
            switches
        ></b-form-checkbox-group>
        </b-form-group>

        <b-form-group id="input-group-8" label="Time Start:" label-for="input-8">
        <b-form-select
          id="input-8"
          v-model="form.t_start"
          :options="t_starts"
          required
        ></b-form-select>
        </b-form-group>

         <b-form-group id="input-group-9" label="Time Finish:" label-for="input-9">
        <b-form-select
          id="input-8"
          v-model="form.t_finish"
          :options="t_finishs"
          required
        ></b-form-select>
        </b-form-group>

      <b-button type="add" variant="primary">Add</b-button>
        
        <b-form-group id="input-group-6" label=" " label-for="input-6">
        <b-table striped hover :items="items">
        </b-table>
        </b-form-group>

        <b-button type="save" variant="primary">Save</b-button>
        <b-button type="back" variant="primary">Back</b-button>
    </b-form>
    <b-card class="mt-3" header="Form Data Result">
      <pre class="m-0">{{ form }}</pre>
    </b-card>
  </div>
</template>

<script>
  export default {
    data() {
      return {
        form: {
          location: null,
          field: null,
          price: '',
          dp:'',
          day: [],
          t_start : null,
          t_finish : null
        },
        fields: [{ text: 'Select One', value: null }, 'Progresif', 'D groove', 'Queen', 'Bikasoga'],
        locations: [{ text: 'Select One', value: null }, 'Bandung', 'Jakarta', 'Karawang', 'Bekasi'],
        t_starts: [{ text: 'Select One', value: null }, '00:00', '00:01', '00:02', '00:03'],
        t_finishs: [{ text: 'Select One', value: null }, '00:00', '00:01', '00:02', '00:03'],
          options: [
          { text: 'Monday', value: 'monday' },
          { text: 'Tueday', value: 'tuesday' },
          { text: 'Wednesday', value: 'wednesday' },
          { text: 'Thursday', value: 'thursday' },
          {text: 'Friday', value: 'friday' },
          {text: 'Saturday', value: 'saturday' },
          {text: 'Sunday', value: 'sunday' }
        ],
        items: [
          { location: 'Bandung', field: 'D groove', day: 'Monday', time: '15:00 - 16:00', price: 'Rp.200.000', dp: '50%'},
          { location: 'Bekasi', field: 'Progresif', day: 'Sunday', time: '20:00 - 22:00', price: 'Rp.150.000', dp: '25%'},
          { location: 'Jakarta', field: 'Queen', day: 'Wednesday', time: '07:00 - 09:00', price: 'Rp.300.000', dp: '75%' },
          {  location: 'Bandung', field: 'Bikasoga', day: 'Thrusday', time: '18:00 - 19:00', price: 'Rp.400.000', dp: '50%' }
        ],
        show: true
      }
    },
    methods: {
      onSubmit(evt) {
        evt.preventDefault()
        alert(JSON.stringify(this.form))
      },
      onReset(evt) {
        evt.preventDefault()
        // Reset our form values
        this.form.location = null
        this.form.field = null
        this.form.price = ''
        this.form.dp = ''
        this.form.day = []
        // Trick to reset/clear native browser form validation state
        this.show = false
        this.$nextTick(() => {
          this.show = true
        })
      }
    }
  }
</script>