<template>
  <div id="detail-lapangan">
    <div class="lapangan" v-for="lapangan in detailLapangan">
      <div class="col-md-12 col-lg-6 col-sm-12">
        <div class="image" :style="{ 'background-image': 'url(' + lapangan.img + ')' }"></div>
      </div>
      <div class="col-md-12 col-lg-6">
        <div class="nama-lapangan">{{lapangan.namaLapangan}}</div>
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
              v-for="jam in lapangan.jamBooking"
            >{{jam.jam}}</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import DatePicker from "vue2-datepicker";
export default {
  data() {
    return {
      filterTanggal: "",
      detailLapangan: [
        {
          id: "001",
          img: "/images/avatar.jpg",
          namaLapangan: "Amir",
          jamBooking: [
            {
              jam: "07.00 - 12.00"
            },
            {
              jam: "07.00 - 12.00"
            },
            {
              jam: "07.00 - 12.00"
            },
            {
              jam: "07.00 - 12.00"
            },
            {
              jam: "07.00 - 12.00"
            },
            {
              jam: "07.00 - 12.00"
            },
            {
              jam: "07.00 - 12.00"
            }
          ]
        },
        {
          id: "001",
          img: "/images/avatar.jpg",
          namaLapangan: "Amir",
          jamBooking: [
            {
              jam: "07.00 - 12.00"
            },
            {
              jam: "07.00 - 12.00"
            },
            {
              jam: "07.00 - 12.00"
            },
            {
              jam: "07.00 - 12.00"
            },
            {
              jam: "07.00 - 12.00"
            },
            {
              jam: "07.00 - 12.00"
            },
            {
              jam: "07.00 - 12.00"
            }
          ]
        }
      ]
    };
  }
};
</script>
