<template>
  <div id="location-detail">
    <b-card
      overlay
      img-src="https://picsum.photos/900/250/?image=3"
      img-alt="Gambar Lapangan"
      text-variant="white"
      border-variant="dark"
      class="image-header"
    >
      <div class="spacer"></div>
      <div class="spacer-30"></div>
      <b-card-text>
        <h1>{{ location.location_name }}</h1>
        <p>{{ location.location_address }}</p>
      </b-card-text>
    </b-card>
    <div class="spacer-30"></div>
    <div class="detail d-flex">
      <div class="desc">
        <h3>Description</h3>
        <p>{{ location.description }}</p>
      </div>
      <div class="time">
        <h3>Open Time</h3>
        <b-row>
          <ul>
            <li>Monday</li>
            <li>Tuesday</li>
            <li>Wednesday</li>
            <li>Thursday</li>
            <li>Friday</li>
            <li>Saturday</li>
            <li>Sunday</li>
          </ul>
          <ul>
            <li
              v-for="(time) in schedule"
              :key="time.id"
            >{{ time.open_time }} - {{ time.closing_time }}</li>
          </ul>
        </b-row>
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
  props: {
    idLocation: String
  },
  data() {
    return {
      perPage: 10,
      location: {},
      schedule: [
        { open_time: "", closing_time: "" },
        { open_time: "", closing_time: "" },
        { open_time: "", closing_time: "" },
        { open_time: "", closing_time: "" },
        { open_time: "", closing_time: "" },
        { open_time: "", closing_time: "" },
        { open_time: "", closing_time: "" }
      ]
    };
  },
  mounted() {
    this.loadDetail();
  },
  methods: {
    loadDetail() {
      axios({
        url: "/data/location",
        method: "POST",
        data: {
          id: this.idLocation
        }
      })
        .then(response => {
          this.location = response.data.serve;
          this.splitSchedule(this.location.schedule[0]);
          console.log(response);
          console.log(this.location);
        })
        .catch(error => {
          console.log(error);
        });
    },
    splitSchedule($schedules) {
      let $time;
      if (!this.isClose($schedules.everyday)) {
        for (let index = 0; index < 7; index++) {
          $time = $schedules.everyday.split(";");
          this.schedule[index].open_time = $time[0];
          this.schedule[index].closing_time = $time[1];
        }
      } else {
        $time = $schedules.monday.split(";");
        this.schedule[0].open_time = $time[0];
        this.schedule[0].closing_time = $time[1];
        $time = $schedules.tuesday.split(";");
        this.schedule[1].open_time = $time[0];
        this.schedule[1].closing_time = $time[1];
        $time = $schedules.wednesday.split(";");
        this.schedule[2].open_time = $time[0];
        this.schedule[2].closing_time = $time[1];
        $time = $schedules.thursday.split(";");
        this.schedule[3].open_time = $time[0];
        this.schedule[3].closing_time = $time[1];
        $time = $schedules.friday.split(";");
        this.schedule[4].open_time = $time[0];
        this.schedule[4].closing_time = $time[1];
        $time = $schedules.saturday.split(";");
        this.schedule[5].open_time = $time[0];
        this.schedule[5].closing_time = $time[1];
        $time = $schedules.sunday.split(";");
        this.schedule[6].open_time = $time[0];
        this.schedule[6].closing_time = $time[1];
      }
    },
    isClose($day) {
      return $day.length == 1;
    }
  }
};
</script>
