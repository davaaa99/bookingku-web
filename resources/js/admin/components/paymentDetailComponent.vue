<template>
  <div id="payment-det">
    <div class="container">
      <div class="header d-flex">
        <img
          class="brand mr-auto"
          src="data:image/png;base64,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"
          alt
        />
        <div class="title ml-auto">Invoice</div>
      </div>
      <div class="spacer-20"></div>
      <div class="row">
        <div class="item ml-auto">
          <div class="sub-title">Invoice No.</div>
          <div class="sub-item">001/2019</div>
          <div class="sub-title">Invoice No.</div>
          <div class="sub-item">001/2019</div>
        </div>
      </div>
      <div class="spacer-50"></div>
      <div class="desc d-flex">
        <div class="col-md-6 col-lg-6">
          <div class="penerima">
            <div class="sub-title">PENERIMA</div>

            <div class="desc-item">TEDY</div>
            <div
              class="desc-item"
            >Komp. Pasadena Residence Blok AA No 21, Margahayu Utara, Kec. Babakan Ciparay, Kota Bandung, Jawa Barat 40223</div>
            <div class="desc-item">fjahdak@fgmail.com</div>
            <div class="desc-item">0888898989898</div>
          </div>
        </div>
        <div class="col-md-6 col-lg-6 text-right">
          <div class="pengirim">
            <div class="sub-title text-right">PT. KONG TEKNOLOGI ASIA</div>

            <div
              class="desc-item"
            >Komp. Pasadena Residence Blok AA No 21, Margahayu Utara, Kec. Babakan Ciparay, Kota Bandung, Jawa Barat 40223</div>
            <div class="desc-item">(022) 64646737363</div>
          </div>
        </div>
      </div>
      <div class="spacer-50"></div>
      <div class="row">
        <table>
          <tr>
            <th>DATA TRANSAKSI</th>
            <th>TANGGAL</th>
            <th>JUMLAH</th>
          </tr>
          <tr v-for="dt in dataTransaksi">
            <td>{{ dt.namaTransaksi}}</td>
            <td>{{dt.tanggal}}</td>
            <td>{{dt.jumlah}}</td>
          </tr>
        </table>
      </div>
      <div class="spacer-50"></div>
      <div class="row d-flex">
        <table class="total ml-auto">
          <tr>
            <th>SUB TOTAL</th>
            <td>Rp {{subTotal}}</td>
          </tr>
          <tr>
            <th>BIAYA ADMINISTRASI (10%)</th>
            <td>Rp {{administrasi}}</td>
          </tr>
          <tr>
            <th>TOTAL</th>
            <td>Rp {{ total}}</td>
          </tr>
        </table>
      </div>
      <div class="spacer"></div>
      <div class="row d-flex">
        <button class="btn btn-primary ml-auto" @click.prevent="printme">BAYAR</button>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      nomorInvoice: "",
      tanggalInvoice: "",

      penerima: { nama: "", alamat: "", emaik: "", nomorTelepon: "" },
      dataTransaksi: [
        {
          namaTransaksi: "lorem ipsum",
          tanggal: "27-01-1999",
          jumlah: "3000"
        },
        {
          namaTransaksi: "lorem ipsum",
          tanggal: "27-01-1999",
          jumlah: "3000"
        },
        {
          namaTransaksi: "lorem ipsum",
          tanggal: "27-01-1999",
          jumlah: "3000"
        }
      ]
    };
  },
  computed: {
    subTotal: function() {
      var total = 0;
      for (var i = 0; i < this.dataTransaksi.length; i++) {
        total = parseInt(this.dataTransaksi[1].jumlah) + total;
      }
      return total;
    },
    administrasi: function() {
      var total = (this.subTotal * 10) / 100;
      return total;
    },
    total: function() {
      var total = this.subTotal - this.administrasi;
      return total;
    }
  },
  methods: {
    printme: function() {
      window.print();
    }
  }
};
</script>
