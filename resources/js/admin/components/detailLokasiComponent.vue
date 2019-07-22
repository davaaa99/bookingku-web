<template>
  <div id="detail-lokasi">
    <div class="lokasi d-flex justify-content-center" v-for="lokasi in datailLokasi" :key="id">
      <div class="col-md-6 col-lg-6">
        <div class="image" :style="{backgroundImage : lokasi.image }"></div>
      </div>
      <div class="col-md-6 col-lg-6">
        <div class="desc">
          <div class="nama-client item">{{lokasi.namaClient}} ( {{lokasi.lokasi}} )</div>
          <div class="d-flex item">
            <i class="fas fa-map-marker-alt"></i>
            <div class="alamat">{{lokasi.alamat}}</div>
          </div>
          <div class="d-flex item">
            <i class="far fa-clock"></i>
            <div class="jam-buka">
              <a class="d-flex" @click="click">
                <div class="title-list">Jam Buka</div>
                <i class="fas fa-caret-down"></i>
              </a>

              <div class="list-jam" v-if="dropdown">
                <ul>
                  <li v-for="list in lokasi.jamBuka" class="d-flex">
                    <div class="hari">{{list.hari}}</div>
                    <div class="jam">: {{list.jam}} WIB</div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="d-flex item">
            <i class="fas fa-phone"></i>
            <div class="phone">{{ lokasi.nomorTelepon }}</div>
          </div>
        </div>
        <div class="line-grey"></div>
        <div class="spacer-20"></div>
        <a class="btn d-flex align-items-center justify-content-center ml-auto mr-auto">DETAIL</a>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      dropdown: false,
      datailLokasi: [
        {
          id: "001",
          img: "images/avatar.jpg",
          namaClient: "Amir",
          lokasi: "Gor Lodaya",
          alamat:
            "Komp. Pasadena Residence Blok AA No 21, Margahayu Utara, Kec. Babakan Ciparay, Kota Bandung, Jawa Barat 40223",
          jamBuka: [
            {
              hari: "senin",
              jam: "07.00 - 12.00"
            },
            {
              hari: "selasa",
              jam: "07.00 - 12.00"
            },
            {
              hari: "rabu",
              jam: "07.00 - 12.00"
            },
            {
              hari: "kamis",
              jam: "07.00 - 12.00"
            },
            {
              hari: "jumat",
              jam: "07.00 - 12.00"
            },
            {
              hari: "sabtu",
              jam: "07.00 - 12.00"
            },
            {
              hari: "minggu",
              jam: "07.00 - 12.00"
            }
          ],
          nomorTelepon: "089898989898"
        },
        {
          id: "001",
          img: "images/avatar.jpg",
          namaClient: "Amir",
          lokasi: "Gor Lodaya",
          alamat:
            "Komp. Pasadena Residence Blok AA No 21, Margahayu Utara, Kec. Babakan Ciparay, Kota Bandung, Jawa Barat 40223",
          jamBuka: [
            {
              hari: "senin",
              jam: "07.00 - 12.00"
            },
            {
              hari: "selasa",
              jam: "07.00 - 12.00"
            },
            {
              hari: "rabu",
              jam: "07.00 - 12.00"
            },
            {
              hari: "kamis",
              jam: "07.00 - 12.00"
            },
            {
              hari: "jumat",
              jam: "07.00 - 12.00"
            },
            {
              hari: "sabtu",
              jam: "07.00 - 12.00"
            },
            {
              hari: "minggu",
              jam: "07.00 - 12.00"
            }
          ],
          nomorTelepon: "089898989898"
        }
      ]
    };
  },
  methods: {
    click: function() {
      this.dropdown = !this.dropdown;
    }
  }
};
</script>
