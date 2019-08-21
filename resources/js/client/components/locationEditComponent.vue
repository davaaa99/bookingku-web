<template>
  <div id="location-add">
    <b-form id="location-form">
      <b-form-group>
        <b-row>
          <b-col class="col-2 mt-2" :class="status($v.location.location_name)">
            <label>
              <strong>Location Name</strong>
            </label>
          </b-col>
          <b-col>
            <b-form-input
              class="forminput"
              v-model="$v.location.location_name.$model"
              required
              placeholder="Enter a location name"
            ></b-form-input>
            <div v-if="$v.location.location_name.$error">
              <div class="error" v-if="!$v.location.location_name.required">Location name must be filled in</div>
            </div>
          </b-col>
        </b-row>
      </b-form-group>
      <b-form-group>
        <b-row>
          <b-col class="col-2 mt-2">
            <label>
              <strong>Location Address</strong>
            </label>
          </b-col>
          <b-col>
            <b-form-input
              class="forminput"
              v-model="location.location_address"
              required
              placeholder="Enter a location address"
            ></b-form-input>
          </b-col>
        </b-row>
      </b-form-group>
      <b-form-group>
        <b-row>
          <b-col class="col-2 mt-2">
            <label>
              <strong>Location Description</strong>
            </label>
          </b-col>
          <b-col>
            <b-form-textarea
              class="forminput"
              v-model="location.description"
              required
              placeholder="Description"
              style="height: 100px"
            ></b-form-textarea>
          </b-col>
        </b-row>
      </b-form-group>
      <b-form-group>
        <b-row>
          <b-col class="col-2 mt-2">
            <label>
              <strong>Location Photo</strong>
            </label>
          </b-col>
          <b-col>
            <b-form-file accept=".jpg, .png, .gif" multiple v-model="location.photos"></b-form-file>
          </b-col>
        </b-row>
      </b-form-group>
      <div class="spacer-20"></div>
      <div class="d-flex">
        <b-button v-b-modal.octime class="btn" style="margin-left: 17.5%" >Set Open Time</b-button>
        <b-modal
          id="octime"
          size="lg"
          centered
          title="Set Open Time"
          :header-bg-variant="headerBgVariant"
          :header-text-variant="headerTextVariant"
        >
          <b-row>
            <p class="col-2 mt-2" style="margin-right: -5%">
              <strong>Everyday</strong>
            </p>
            <div class="mt-2 col-2 d-flex">
              <b-form-checkbox v-model="location.day[0].valstatus" name="check-button" switch></b-form-checkbox>
              <p :style="{color: changeColor(location.day[0].valstatus)}">
                <strong>{{ changeStatus(location.day[0].valstatus) }}</strong>
              </p>
            </div>
            <div v-if="location.day[0].valstatus" class="col-8">
              <b-form-select
                style="border: none; border-bottom: 2px solid #3490DC; background: none"
                class="ml-3 mb-2 mr-2 col-3"
                v-model="location.day[0].open_time"
                :options="otimes"
              ></b-form-select>
              <i class="fas fa-minus mr-2 mt-2"></i>
              <b-form-select
                style="border: none; border-bottom: 2px solid #3490DC; background: none;"
                class="mb-2 mr-2 col-3"
                v-model="location.day[0].closing_time"
                :options="ctimes"
              ></b-form-select>
            </div>
          </b-row>
          <div v-if="!location.day[0].valstatus">
            <b-row>
              <p class="col-1 mt-2 mr-4">
                <strong>Monday</strong>
              </p>
              <div class="mt-2 col-2 d-flex">
                <b-form-checkbox v-model="location.day[1].valstatus" name="check-button" switch></b-form-checkbox>
                <p :style="{color: changeColor(location.day[1].valstatus)}">
                  <strong>{{ changeStatus(location.day[1].valstatus) }}</strong>
                </p>
              </div>
              <div v-if="location.day[1].valstatus" class="col-8">
                <b-form-select
                  style="border: none; border-bottom: 2px solid #3490DC; background: none"
                  class="ml-3 mb-2 mr-2 col-3"
                  v-model="location.day[1].open_time"
                  :options="otimes"
                ></b-form-select>
                <i class="fas fa-minus mr-2 mt-2"></i>
                <b-form-select
                  style="border: none; border-bottom: 2px solid #3490DC; background: none"
                  class="mb-2 mr-2 col-3"
                  v-model="location.day[1].closing_time"
                  :options="ctimes"
                ></b-form-select>
              </div>
            </b-row>
            <b-row>
              <p class="col-1 mt-2 mr-4">
                <strong>Tuesday</strong>
              </p>
              <div class="mt-2 col-2 d-flex">
                <b-form-checkbox v-model="location.day[2].valstatus" name="check-button" switch></b-form-checkbox>
                <p :style="{color: changeColor(location.day[2].valstatus)}">
                  <strong>{{ changeStatus(location.day[2].valstatus) }}</strong>
                </p>
              </div>
              <div v-if="location.day[2].valstatus" class="col-8">
                <b-form-select
                  style="border: none; border-bottom: 2px solid #3490DC; background: none"
                  class="ml-3 mb-2 mr-2 col-3"
                  v-model="location.day[2].open_time"
                  :options="otimes"
                ></b-form-select>
                <i class="fas fa-minus mr-2 mt-2"></i>
                <b-form-select
                  style="border: none; border-bottom: 2px solid #3490DC; background: none"
                  class="mb-2 mr-2 col-3"
                  v-model="location.day[2].closing_time"
                  :options="ctimes"
                ></b-form-select>
              </div>
            </b-row>
            <b-row>
              <p class="col-1 mt-2 mr-4">
                <strong>Wednesday</strong>
              </p>
              <div class="mt-2 col-2 d-flex">
                <b-form-checkbox v-model="location.day[3].valstatus" name="check-button" switch></b-form-checkbox>
                <p :style="{color: changeColor(location.day[3].valstatus)}">
                  <strong>{{ changeStatus(location.day[3].valstatus) }}</strong>
                </p>
              </div>
              <div v-if="location.day[3].valstatus" class="col-8">
                <b-form-select
                  style="border: none; border-bottom: 2px solid #3490DC; background: none"
                  class="ml-3 mb-2 mr-2 col-3"
                  v-model="location.day[3].open_time"
                  :options="otimes"
                ></b-form-select>
                <i class="fas fa-minus mr-2 mt-2"></i>
                <b-form-select
                  style="border: none; border-bottom: 2px solid #3490DC; background: none"
                  class="mb-2 mr-2 col-3"
                  v-model="location.day[3].closing_time"
                  :options="ctimes"
                ></b-form-select>
              </div>
            </b-row>
            <b-row>
              <p class="col-1 mt-2 mr-4">
                <strong>Thursday</strong>
              </p>
              <div class="mt-2 col-2 d-flex">
                <b-form-checkbox v-model="location.day[4].valstatus" name="check-button" switch></b-form-checkbox>
                <p :style="{color: changeColor(location.day[4].valstatus)}">
                  <strong>{{ changeStatus(location.day[4].valstatus) }}</strong>
                </p>
              </div>
              <div v-if="location.day[4].valstatus" class="col-8">
                <b-form-select
                  style="border: none; border-bottom: 2px solid #3490DC; background: none"
                  class="ml-3 mb-2 mr-2 col-3"
                  v-model="location.day[4].open_time"
                  :options="otimes"
                ></b-form-select>
                <i class="fas fa-minus mr-2 mt-2"></i>
                <b-form-select
                  style="border: none; border-bottom: 2px solid #3490DC; background: none"
                  class="mb-2 mr-2 col-3"
                  v-model="location.day[4].closing_time"
                  :options="ctimes"
                ></b-form-select>
              </div>
            </b-row>
            <b-row>
              <p class="col-1 mt-2 mr-4">
                <strong>Friday</strong>
              </p>
              <div class="mt-2 col-2 d-flex">
                <b-form-checkbox v-model="location.day[5].valstatus" name="check-button" switch></b-form-checkbox>
                <p :style="{color: changeColor(location.day[5].valstatus)}">
                  <strong>{{ changeStatus(location.day[5].valstatus) }}</strong>
                </p>
              </div>
              <div v-if="location.day[5].valstatus" class="col-8">
                <b-form-select
                  style="border: none; border-bottom: 2px solid #3490DC; background: none"
                  class="ml-3 mb-2 mr-2 col-3"
                  v-model="location.day[5].open_time"
                  :options="otimes"
                ></b-form-select>
                <i class="fas fa-minus mr-2 mt-2"></i>
                <b-form-select
                  style="border: none; border-bottom: 2px solid #3490DC; background: none"
                  class="mb-2 mr-2 col-3"
                  v-model="location.day[5].closing_time"
                  :options="ctimes"
                ></b-form-select>
              </div>
            </b-row>
            <b-row>
              <p class="col-1 mt-2 mr-4">
                <strong>Saturday</strong>
              </p>
              <div class="mt-2 col-2 d-flex">
                <b-form-checkbox v-model="location.day[6].valstatus" name="check-button" switch></b-form-checkbox>
                <p :style="{color: changeColor(location.day[6].valstatus)}">
                  <strong>{{ changeStatus(location.day[6].valstatus) }}</strong>
                </p>
              </div>
              <div v-if="location.day[6].valstatus" class="col-8">
                <b-form-select
                  style="border: none; border-bottom: 2px solid #3490DC; background: none"
                  class="ml-3 mb-2 mr-2 col-3"
                  v-model="location.day[6].open_time"
                  :options="otimes"
                ></b-form-select>
                <i class="fas fa-minus mr-2 mt-2"></i>
                <b-form-select
                  style="border: none; border-bottom: 2px solid #3490DC; background: none"
                  class="mb-2 mr-2 col-3"
                  v-model="location.day[6].closing_time"
                  :options="ctimes"
                ></b-form-select>
              </div>
            </b-row>
            <b-row>
              <p class="col-1 mt-2 mr-4">
                <strong>Sunday</strong>
              </p>
              <div class="mt-2 col-2 d-flex">
                <b-form-checkbox v-model="location.day[7].valstatus" name="check-button" switch></b-form-checkbox>
                <p :style="{color: changeColor(location.day[7].valstatus)}">
                  <strong>{{ changeStatus(location.day[7].valstatus) }}</strong>
                </p>
              </div>
              <div v-if="location.day[7].valstatus" class="col-8">
                <b-form-select
                  style="border: none; border-bottom: 2px solid #3490DC; background: none"
                  class="ml-3 mb-2 mr-2 col-3"
                  v-model="location.day[7].open_time"
                  :options="otimes"
                ></b-form-select>
                <i class="fas fa-minus mr-2 mt-2"></i>
                <b-form-select
                  style="border: none; border-bottom: 2px solid #3490DC; background: none"
                  class="mb-2 mr-2 col-3"
                  v-model="location.day[7].closing_time"
                  :options="ctimes"
                ></b-form-select>
              </div>
            </b-row>
          </div>
        </b-modal>
      </div>
      <div class="spacer-50"></div>
      <div class="d-flex">
        <button class="btn btn-primary ml-auto mr-2" @click="save()">Save</button>
        <button class="btn btn-danger mr-auto" @click="cancel()">Cancel</button>
      </div>
    </b-form>
    <div class="spacer-20"></div>
  </div>
</template>

<script>
import BootstrapVue from "bootstrap-vue";
import { required } from "vuelidate/lib/validators";
import { type } from "os";
Vue.use(BootstrapVue);

export default {
  props: {
    idLocation: String
  },
  data() {
    return {
      headerBgVariant: "primary",
      headerTextVariant: "light",
      colorstatus: "#5C5C5C",
      files:[],
      oldLocation: {},
      location: {
        id_location: "",
        location_name: "",
        location_address: "",
        description: "",
        photos: [],
        day: [{open_time:"",closing_time:"",valstatus:""},
          {open_time:"",closing_time:"",valstatus:""},
          {open_time:"",closing_time:"",valstatus:""},
          {open_time:"",closing_time:"",valstatus:""},
          {open_time:"",closing_time:"",valstatus:""},
          {open_time:"",closing_time:"",valstatus:""},
          {open_time:"",closing_time:"",valstatus:""},
          {open_time:"",closing_time:"",valstatus:""}
        ]
      },
      otimes: [
        { text: "- Open -", value: "", disabled: true },
        "00:00",
        "01:00",
        "02:00",
        "03:00",
        "04:00",
        "05:00",
        "06:00",
        "07:00",
        "08:00",
        "09:00",
        "10:00",
        "11:00",
        "12:00",
        "13:00",
        "14:00",
        "15:00",
        "16:00",
        "17:00",
        "18:00",
        "19:00",
        "20:00",
        "21:00",
        "22:00",
        "23:00"
      ],
      ctimes: [
        { text: "- Close -", value: "", disabled: true },
        "00:00",
        "01:00",
        "02:00",
        "03:00",
        "04:00",
        "05:00",
        "06:00",
        "07:00",
        "08:00",
        "09:00",
        "10:00",
        "11:00",
        "12:00",
        "13:00",
        "14:00",
        "15:00",
        "16:00",
        "17:00",
        "18:00",
        "19:00",
        "20:00",
        "21:00",
        "22:00",
        "23:00"
      ]
    };
  },
  validations: {
    location: {
      location_name: {
        required
      }
    }
  },
  computed: {
    everyday: function(){
      return this.location.day[0].valstatus
    },
    monday: function(){
      return this.location.day[1].valstatus
    },
    tuesday: function(){
      return this.location.day[2].valstatus
    },
    wednesday: function(){
      return this.location.day[3].valstatus
    },
    thursday: function(){
      return this.location.day[4].valstatus
    },
    friday: function(){
      return this.location.day[5].valstatus
    },
    saturday: function(){
      return this.location.day[6].valstatus
    },
    sunday: function(){
      return this.location.day[7].valstatus
    }
  },
  watch: {
    everyday: function() {
      if (! this.location.day[0].valstatus)
      {
        this.resetTime(0)
        
      } else
      {
        for (let index = 1; index < 8; index++) {
          this.resetTime(index)
        }
      }
    },
    monday: function() {
      if (! this.location.day[1].valstatus)
      {
        this.resetTime(1)
      }
    },
    tuesday: function() {
      if (! this.location.day[2].valstatus)
      {
        this.resetTime(2)
      }
    },
    wednesday: function() {
      if (! this.location.day[3].valstatus)
      {
        this.resetTime(3)
      }
    },
    thursday: function() {
      if (! this.location.day[4].valstatus)
      {
        this.resetTime(4)
      }
    },
    friday: function() {
      if (! this.location.day[5].valstatus)
      {
        this.resetTime(5)
      }
    },
    saturday: function() {
      if (! this.location.day[6].valstatus)
      {
        this.resetTime(6)
      }
    },
    sunday: function() {
      if (! this.location.day[7].valstatus)
      {
        this.resetTime(7)
      }
    }
  },
  mounted() {
    this.loadDetail();
  },
  methods: {
    resetTime($index){
      this.location.day[$index].open_time = ""
      this.location.day[$index].closing_time = ""
      this.location.day[$index].valstatus = false
    },
    status(validation) {
      return {
        error: validation.$error
      };
    },
    loadDetail() {
      axios({
        url: "/data/location",
        method: "POST",
        data: {
          id: this.idLocation
        }
      })
        .then(response => {
          this.oldLocation = response.data.serve
          this.setDataLocation(this.oldLocation)
        })
        .catch(error => {
          console.log(error);
        });
    },
    setDataLocation($oldLocation){
      this.location.id_location = $oldLocation.id_location
      this.location.location_name = $oldLocation.location_name
      this.location.location_address = $oldLocation.location_address
      this.location.description = $oldLocation.description
      this.splitSchedule($oldLocation.schedule[0])
    },
    splitSchedule($schedules) {
      let $time;
      if (! this.isClose($schedules.everyday)) {
        $time = $schedules.everyday.split(";");
        this.location.day[0].open_time = $time[0];
        this.location.day[0].closing_time = $time[1];
        this.location.day[0].valstatus = true
        
      } else {
        if (! this.isClose($schedules.monday)) 
        {
          $time = $schedules.monday.split(";");
          this.location.day[1].open_time = $time[0];
          this.location.day[1].closing_time = $time[1];
          this.location.day[1].valstatus = true
        }
        if (! this.isClose($schedules.tuesday))
        {
          $time = $schedules.tuesday.split(";");
          this.location.day[2].open_time = $time[0];
          this.location.day[2].closing_time = $time[1];
          this.location.day[2].valstatus = true
        }
        if (! this.isClose($schedules.wednesday))
        {
          $time = $schedules.wednesday.split(";");
          this.location.day[3].open_time = $time[0];
          this.location.day[3].closing_time = $time[1];
          this.location.day[3].valstatus = true
        }
        if (! this.isClose($schedules.thursday))
        {
          $time = $schedules.thursday.split(";");
          this.location.day[4].open_time = $time[0];
          this.location.day[4].closing_time = $time[1];
          this.location.day[4].valstatus = true
        }
        if (! this.isClose($schedules.friday))
        {
          $time = $schedules.friday.split(";");
          this.location.day[5].open_time = $time[0];
          this.location.day[5].closing_time = $time[1];
          this.location.day[5].valstatus = true
        }
        if (! this.isClose($schedules.saturday))
        {
          $time = $schedules.saturday.split(";");
          this.location.day[6].open_time = $time[0];
          this.location.day[6].closing_time = $time[1];
          this.location.day[6].valstatus = true
        }
        if (! this.isClose($schedules.sunday))
        {
          $time = $schedules.sunday.split(";");
          this.location.day[7].open_time = $time[0];
          this.location.day[7].closing_time = $time[1];
          this.location.day[7].valstatus = true
        }
      }
    },
    isClose($day) {
      return $day.length == 1;
    },
    save() {
      axios({
        url: "/update/location",
        method: "PUT",
        data: this.location
      })
        .then(response => {
          alert("Data Berhasil diupdate");
          window.location.href =
            window.location.protocol +
            "//" +
            window.location.host +
            "/locations";
        })
        .catch(error => {
          console.log(error);
          alert("Data Gagal diupdate");
        });
    },
    cancel() {
      window.location.href =
        window.location.protocol + "//" + window.location.host + "/locations";
    },
    formatName(files) {
      if (files.length == 1) {
        return files[0].name;
      } else {
        return files[1].name;
      }
    },
    changeStatus(valstatus) {
      if (valstatus) {
        return "Open";
      } else {
        return "Close";
      }
    },
    changeColor(valstatus) {
      if (valstatus) {
        return "#0032E7";
      } else {
        return "darkgray";
      }
    }
  }
};
</script>
