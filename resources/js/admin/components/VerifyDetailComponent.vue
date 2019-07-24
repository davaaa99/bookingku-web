<template>
  <div id="verify-detail">
    <table>
      <tr>
        <th>ID Booking</th>
        <td>:</td>
        <td>{{detailBooking.id }}</td>
      </tr>
      <tr>
        <th>Atas Nama</th>
        <td>:</td>
        <td>{{detailBooking.nama}}</td>
      </tr>
      <tr>
        <th>Lokasi</th>
        <td>:</td>
        <td>{{detailBooking.lokasi}}</td>
      </tr>
      <tr>
        <th>Lapangan</th>
        <td>:</td>
        <td>{{detailBooking.lapangan}}</td>
      </tr>
      <tr>
        <th>Tanggal Pembayaran</th>
        <td>:</td>
        <td>{{detailBooking.tglBayar}}</td>
      </tr>

      <tr>
        <th>Jam Booking</th>
        <td>:</td>
        <td>{{detailBooking.jamBooking}}</td>
      </tr>
      <tr>
        <th>Jenis Pembayaran</th>
        <td>:</td>
        <td>{{detailBooking.jenisPembayaran}}</td>
      </tr>
      <tr>
        <th>Status</th>
        <td>:</td>
        <td>{{detailBooking.status}}</td>
      </tr>
      <tr>
        <th>Bukti Pembayaran</th>
        <td>:</td>
        <td>
          <img class="buktipembayaran" :src="detailBooking.buktiPembayaran" alt />
        </td>
      </tr>
    </table>
    <div class="tombol d-flex justify-content-end">
      <button class="btn accept" @click="cek">Accept</button>
      <button class="btn decline">Decline</button>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      idBooking: atob(window.location.pathname.split("/")[2]),
      detailBooking: {
        id: "",
        nama: "",
        lokasi: "",
        lapangan: "",
        tglBayar: "",
        jamBooking: "",
        jenisPembayaran: "",
        status: "",
        buktiPembayaran: "/images/avatar.jpg"
      }
    };
  },
  mounted() {
    this.detailBooking.id = this.idBooking;
  },
  methods: {
    cek: function() {
      console.log(this.idBooking);
    }
  }
};
</script>
