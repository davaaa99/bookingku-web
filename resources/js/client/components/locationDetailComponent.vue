<template>
  <div id="location-detail">
    <b-carousel
      id="carousel-1"
      v-model="slide"
      :interval="4000"
      controls
      indicators
      background="#ababab"
      img-width="1024"
      img-height="250"
      style="text-shadow: 1px 1px 2px #333;"
      @sliding-start="onSlideStart"
      @sliding-end="onSlideEnd"
    >
      <b-carousel-slide v-for="photo in photos" :key="photo.id" :caption="location.location_name" :text="location.location_address">
        <img
          slot="img"
          class="d-block w-100"
          width="100%"
          height="350"
          :src="photo"
          :alt="location.location_name"
        />
      </b-carousel-slide>
    </b-carousel>
    <div class="spacer-20"></div>
    <div class="detail d-flex">
      <div class="desc">
        <h4>Description</h4>
        <p>{{ location.description }}</p>
      </div>
      <div class="time d-flex flex-column align-items-center justify-content-center">
        <h5>Open Time</h5>
        <b-row class="ml-n5">
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
              v-for="time in schedule"
              :key="time.id"
            >{{ time.open_time }} - {{ time.closing_time }}</li>
          </ul>
        </b-row>
      </div>
    </div>
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
      slide: 0,
      perPage: 10,
      location: {},
      photos: [],
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
          this.splitPhotoUrl(this.location.location_photo);
          this.splitSchedule(this.location.schedule[0]);
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
    },
    splitPhotoUrl($photosUrl) {
      this.photos = $photosUrl.split(";");
    },
    onSlideStart(slide) {
      this.sliding = true;
    },
    onSlideEnd(slide) {
      this.sliding = false;
    }
  }
};
</script>
