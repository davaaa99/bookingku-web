<template>
<div id="location select">
    <b-form-select v-model="selected" :options="options"></b-form-select>
    <b-form-select v-model="selected" :options="options" size="sm" class="mt-3"></b-form-select>
    <div class="mt-3">Selected: <strong>{{ selected }}</strong></div>

  <!-- <div id="detail-lapangan">
    <div class="lapangan" v-for="lapangan in detailLapangan" :key="lapangan.detailLapangan">
      <div class="col-md-12 col-lg-6 col-sm-12">
        <div class="image" :style="{ 'background-image': 'url(' + lapangan.img + ')' }"></div>
      </div>
      <div class="col-md-12 col-lg-6">
        <div class="nama-lapangan">{{lapangan.namaLapangan}}</div>
      </div>
    </div> -->
</div>
</template>

<script>
import DatePicker from "vue2-datepicker";
export default {
  props: {
    idLokasi: {
      type: String,
      required: true
    }
  },
  data() {
    return {
      selected: null,
        options: [
          { value: null, text: 'Please select an option' },
          { value: 'a', text: 'This is First option' },
          { value: 'b', text: 'Selected Option' },
          { value: { C: '3PO' }, text: 'This is an option with object value' },
          { value: 'd', text: 'This one is disabled', disabled: true }
        ]
    };
  }
};
</script>
