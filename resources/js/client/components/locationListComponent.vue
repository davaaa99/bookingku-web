<template>
  <div id="location-list">
    <div id="list">
      <div class="filter">
        <div class="filter-item d-flex">
          <div class="search d-flex align-items-center">
            <input class="filterSearch" type="text" v-model="filterSearch" placeholder="Search" />
            <i class="fa fa-search" style="color:#C0C4CC"></i>
          </div>
          <a href="/location/add" class="ml-auto">
            <button class="btn btn-add btn-primary">ADD</button>
          </a>
        </div>
        <div class="spacer-20"></div>
      </div>
    </div>
    <div class="item-list">
      <div
        class="card mt-3"
        v-for="(location, index) in searchLocation"
        :key="location.id_location"
      >
        <div class="horizontal">
          <b-card no-body class="overflow-hidden">
            <b-row no-gutters class="d-flex">
              <b-col class="col-lg-2" @click="detailLocation(location.id_location)">
                <b-card-img src="https://picsum.photos/400/400/?image=20" class="rounded-0"></b-card-img>
              </b-col>
              <b-col class="col-lg-9" @click="detailLocation(location.id_location)">
                <b-card-body>
                  <h2>{{location.location_name}}</h2>
                  <b-card-text class="desc">{{location.description}}</b-card-text>
                  <b-card-text class="mt-4">{{location.location_address}}</b-card-text>
                </b-card-body>
              </b-col>
              <div class="mt-2 igroup col-lg-1">
                <i class="material-icons ic" @click="editLocation(location.id_location)">edit</i>
                <i class="material-icons mr-3 ic" @click="msgBoxDelete(index)">close</i>
              </div>
            </b-row>
          </b-card>
        </div>
      </div>
    </div>
    <div class="spacer-20"></div>
  </div>
</template>

<script>
import BootstrapVue from "bootstrap-vue";
import { type } from "os";
Vue.use(BootstrapVue);

export default {
  data() {
    return {
      perPage: 10,
      filterSearch: "",
      locations: []
    };
  },
  computed: {
    searchLocation() {
      return this.locations.filter( loc => {
        return !this.filterSearch ||
          loc.location_name.toLowerCase().indexOf(this.filterSearch.toLowerCase()) > -1
      })
    }
  },
  mounted() {
    this.loadLocations();
  },
  methods: {
    loadLocations() {
      axios({
        url: "data/locations",
        method: "GET"
      })
        .then(response => {
          this.locations = response.data.serve;
        })
        .catch(error => {
          console.log(error);
        });
    },
    msgBoxDelete(index) {
      this.$bvModal
        .msgBoxConfirm("Are you sure you want delete this locations?", {
          title: "Delete Location",
          size: "sm",
          buttonSize: "sm",
          okVariant: "danger",
          okTitle: "DELETE",
          footerClass: "p-2",
          centered: true
        })
        .then(value => {
          if (value) {
            axios({
              url: "/location/" + this.locations[index].id_location,
              method: "DELETE"
            })
              .then(response => {
                window.location.href =
                  window.location.protocol +
                  "//" +
                  window.location.host +
                  "/locations";
              })
              .catch(error => {
                console.log(error);
              });
          }
        })
        .catch(error => {
          console.log(error);
        });
    },
    detailLocation(id) {
      window.location.href =
        window.location.protocol +
        "//" +
        window.location.host +
        "/location/detail/" +
        id;
    },
    addLocation() {
      window.location.href =
        window.location.protocol +
        "//" +
        window.location.host +
        "/location/add";
    },
    editLocation(id) {
      window.location.href =
        window.location.protocol +
        "//" +
        window.location.host +
        "/location/edit/" +
        id;
    }
  }
};
</script>
