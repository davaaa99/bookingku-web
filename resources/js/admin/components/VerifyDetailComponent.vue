<template>
  <div id="verify-detail">
    <div class="display-image"></div>
    <table>
      <tr>
        <th>ID Booking</th>
        <td>:</td>
        <td>{{detailBooking.idBooking }}</td>
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
          <a>
            <img class="buktipembayaran" :src="detailBooking.buktiPembayaran" alt />
          </a>
        </td>
      </tr>
    </table>
    <div class="tombol d-flex justify-content-end">
      <button class="btn accept">Accept</button>
      <button class="btn decline">Decline</button>
    </div>
  </div>
</template>
<script>
export default {
  props: {
    idBooking: {
      type: String,
      required: true
    }
  },
  data() {
    return {
      detailBooking: [
        // {
        //   key: "id_booking"
        // },
        // {
        //   key: "client_name"
        // },
        // {
        //   key: "location_name"
        // },
        // {
        //   key: "field_name"
        // },
        // {
        //   key: "payment_date"
        // },
        // {
        //   key: "payment_time"
        // },
        // {
        //   key: "payment_type"
        // },
        // {
        //   key: "payment_status"
        // },
      ],

      filterData: [
        {
          idBooking: "BKN-001",
          nama: "Tedy Subagjo",
          lokasi: "JL. Telkom ",
          lapangan: "Lapang Semesta",
          tglBayar: "12-12-2012",
          jamBooking: "12.00",
          jenisPembayaran: "DP",
          status: "Confirmed",
          buktiPembayaran: "/images/avatar.jpg"
        },
        {
          idBooking: "BKN-002",
          nama: "Masrum",
          lokasi: "JL. Telkom ",
          lapangan: "Lapang Semesta",
          tglBayar: "12-12-2012",
          jamBooking: "12.00",
          jenisPembayaran: "DP",
          status: "Confirmed",
          buktiPembayaran: "/images/avatar.jpg"
        },
        {
          idBooking: "BKN-003",
          nama: "Mokhan",
          lokasi: "JL. Telkom ",
          lapangan: "Lapang Semesta",
          tglBayar: "12-12-2012",
          jamBooking: "12.00",
          jenisPembayaran: "DP",
          status: "Confirmed",
          buktiPembayaran: "/images/avatar.jpg"
        },
        {
          idBooking: "BKN-004",
          nama: "Abnes",
          lokasi: "JL. Telkom ",
          lapangan: "Lapang Semesta",
          tglBayar: "12-12-2012",
          jamBooking: "12.00",
          jenisPembayaran: "DP",
          status: "Confirmed",
          buktiPembayaran: "/images/avatar.jpg"
        },
        {
          idBooking: "BKN-005",
          nama: "Rendy",
          lokasi: "JL. Telkom ",
          lapangan: "Lapang Semesta",
          tglBayar: "12-12-2012",
          jamBooking: "12.00",
          jenisPembayaran: "DP",
          status: "Confirmed",
          buktiPembayaran: "/images/avatar.jpg"
        },
        {
          idBooking: "BKN-006",
          nama: "Hammad",
          lokasi: "JL. Telkom ",
          lapangan: "Lapang Semesta",
          tglBayar: "12-12-2012",
          jamBooking: "12.00",
          jenisPembayaran: "DP",
          status: "Confirmed",
          buktiPembayaran: "/images/avatar.jpg"
        }
      ]
    };
  },
  mounted() {
    self = this;
    const data = self.filterData.filter(function(project) {
      return project.idBooking === self.idBooking;
    });
    self.detailBooking = data[0];
  }
};
</script>
