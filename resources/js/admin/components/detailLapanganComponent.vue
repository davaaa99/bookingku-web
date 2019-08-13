<template>
  <div id="detail-lapangan">
    <div class="lapangan" v-for="lapangan in detailLapangan" :key="lapangan.detailLapangan">
      <div class="col-md-12 col-lg-6 col-sm-12">
        <div class="image" :style="{ 'background-image': 'url(' + lapangan.field_photo + ')' }"></div>
      </div>
      <div class="col-md-12 col-lg-6">
        <div class="nama-lapangan">{{lapangan.field_name}}</div>
        <div class="jadwal">
          <date-picker
            width="200"
            v-model="filterTanggal"
            lang="en"
            input-class="datepicker"
            format="DD-MM-YYYY"  
          ></date-picker>
          <div class="row">
            <div
              class="col-5 list-jam d-flex align-items-center justify-content-center"
              v-for="jam in lapangan.jamBooking">{{jam.jam}}</div>
          </div>
        </div>
      </div>
    </div>
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
      filterTanggal: "",
        detailLapang:[],
    //   detailLapangan: [
    //     {
    //       id: "001",
    //       img: "/images/avatar.jpg",
    //       namaLapangan: "Amir",
    //       jamBooking: [
    //         {
    //           jam: "07.00 - 12.00"
    //         },
    //         {
    //           jam: "07.00 - 12.00"
    //         },
    //         {
    //           jam: "07.00 - 12.00"
    //         },
    //         {
    //           jam: "07.00 - 12.00"
    //         },
    //         {
    //           jam: "07.00 - 12.00"
    //         },
    //         {
    //           jam: "07.00 - 12.00"
    //         },
    //         {
    //           jam: "07.00 - 12.00"
    //         }
    //       ]
    //     },
    //     {
    //       id: "001",
    //       img: "/images/avatar.jpg",
    //       namaLapangan: "Amir",
    //       jamBooking: [
    //         {
    //           jam: "07.00 - 12.00"
    //         },
    //         {
    //           jam: "07.00 - 12.00"
    //         },
    //         {
    //           jam: "07.00 - 12.00"
    //         },
    //         {
    //           jam: "07.00 - 12.00"
    //         },
    //         {
    //           jam: "07.00 - 12.00"
    //         },
    //         {
    //           jam: "07.00 - 12.00"
    //         },
    //         {
    //           jam: "07.00 - 12.00"
    //         }
    //       ]
    //     }
    //   ]
    };
  },
  mounted(){
    let uri='http://localhost:8000/api/v1/clients';
    this.axios.get(uri).then(response=>{
        this.ClientList=response.data.data;
        console.log('response.data.data');
    });
  },
};
</script>
