<template>
  <div id="detail-lokasi">
    <div class="lokasi" v-for="lokasi in datailLokasi" :key="lokasi.idLokasi">
      <div class="col-md-12 col-lg-6 col-sm-12">
        <div class="image" :style="{ 'background-image': 'url(' + lokasi.img + ')' }"></div>
      </div>
      <div class="col-md-12 col-lg-6 col-sm-12">
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
                  <li v-for="list in lokasi.jamBuka" class="d-flex" :key="list.jamBuka">
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
        <a
          class="btn d-flex align-items-center justify-content-center ml-auto mr-auto"
          @click="detail(lokasi.idLokasi)"
        >DETAIL</a>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  props: {
    clientId: {
      type: String,
      required: true
    }
  },
  data() {
    return {
      dropdown: false,
      datailLokasi: [
        {
          idLokasi: "001",
          img: "/images/avatar.jpg",
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
          idLokasi: "002",
          img:
            "https://images.unsplash.com/photo-1489216317223-a88355bd0e38?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=750&q=80",
          namaClient: "Amir",
          lokasi: "Gor Lodaya",
          alamat:
            "Komp. Pasadena Residence Blok AA No 21, Margahayu Utara, Kec. Babakan Ciparay, Kota Bandung, Jawa Barat 40223",
          jamBuka: [
            {
              hari: "Senin",
              jam: "07.00 - 12.00"
            },
            {
              hari: "Selasa",
              jam: "07.00 - 12.00"
            },
            {
              hari: "Rabu",
              jam: "07.00 - 12.00"
            },
            {
              hari: "Kamis",
              jam: "07.00 - 12.00"
            },
            {
              hari: "Jumat",
              jam: "07.00 - 12.00"
            },
            {
              hari: "Sabtu",
              jam: "07.00 - 12.00"
            },
            {
              hari: "Minggu",
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
    },
    detail: function(idLokasi) {
      console.log(this.idClient);

      console.log(idLokasi);

      var self = this;
      var d = new Date(),
        month = "" + (d.getMonth() + 1),
        day = "" + d.getDate(),
        year = d.getFullYear();

      if (month.length < 2) month = "0" + month;
      if (day.length < 2) day = "0" + day;

      window.location.href =
        window.location.protocol +
        "//" +
        window.location.host +
        "/$2y$10$MtKIr0/yICTGGEPWGcj0lOGLK9UlSd6hrOiBYgQWlfkym6V52hQSm" +
        day +
        "/clientlist/detaillokasi/detaillapang/" ;
        // btoa(idLokasi);
    }
  }
};
</script>
