<template>
  <div >
    <b-form>
      <b-form-group>
        <label for="location">Location</label>
        <b-form-select v-model="schedule.selectedLocation" :options="location"></b-form-select>
      </b-form-group>
      <b-form-group>
        <label for="field">Field</label>
        <b-form-select v-model="schedule.selectedField" :options="field"></b-form-select>
      </b-form-group>
      <b-form-group id="input-group-1" label="Price:" label-for="input-1">
        <b-form-input
          id="input-1"
          v-model="schedule.price"
          required
          placeholder="Enter Price"
        ></b-form-input>
      </b-form-group>
      <b-form-group id="input-group-4" label="Down Payment:" label-for="input-4">
        <b-form-input
          id="input-4"
          v-model="schedule.dp"
          required
          placeholder="Enter Down Payment"
        ></b-form-input>
      </b-form-group>
        <b-form-group id="input-group-5" label="Day :" label-for="input-5">
        <b-form-checkbox-group class= "myselect"
            v-model="schedule.day"
            :options="days"
            switches
        ></b-form-checkbox-group>
        </b-form-group>

        <b-form-group id="input-group-8" label="Time Start:" label-for="input-8">
        <b-form-select class= "myselect"
          id="input-8"
          v-model="schedule.t_start"
          :options="t_starts"
          required
        ></b-form-select>
        </b-form-group>

         <b-form-group id="input-group-9" label="Time Finish:" label-for="input-9">
        <b-form-select class= "myselect"
          id="input-8"
          v-model="schedule.t_finish"
          :options="t_finishs"
          required
        ></b-form-select>
        </b-form-group>

      <b-button variant="primary" class="btn btn-detail" v-model="add" @click="addschedule()">Add</b-button>
        
        <div class="spacer-20"></div>
          <b-table fixed border small :items="items" :fields="fields" class="thead-light" primary-key="id_location ">
          </b-table>
        <b-button type="save" variant="primary">Save</b-button>
        <b-button type="back" variant="primary">Back</b-button>
    </b-form>
  </div>
</template>

<script>
  import BootstrapVue from 'bootstrap-vue'
  import datePicker from 'vue-date-picker'
  import { type } from "os" ;
  Vue.use(BootstrapVue)

export default {
  data() {
     return{
          // Note 'age' is left out and will not appear in the rendered table
          perPage:20,
          schedule:{
             selectedLocation: "",
             selectedField:"",
             price: '',
             day: [],
             dp:'',
             t_start : null,
             t_finish : null,
          },
          currentPage:1,
          locationlist:[],
          location:[],
          fieldlist:[],
          field:[],
          days: ['Monday'],
          t_starts:['00:00','01:00'],
          t_finishs: ['00:00','01:00'],
          add:false,
          items:[],
          index: 0,

          fields:{
            location:{
              key: 'selectedLocation',
              label: 'Location',
              sortable: true
            },
              field:{
                key:'selectedField',
                label:'Field',
                sortable: true
            },
              price:{
                key:'price',
                label:'Price',
                sortable: true
            },
              dp:{
                key:'dp',
                label:'Down Payment',
                sortable: true
            },
              day:{
                key:'day',
                label:'Day',
                sortable: true
            },
              time_start:{
                key:'t_start',
                label:'Time Start',
                sortable: true
            },
              time_finish:{
                key:'t_finish',
                label:'Time Finish',
                sortable: true
              }
          },

      }
        
  },
  mounted(){
    this.loadLocation()
  },
  methods:{
    loadLocation(){
      let index=0;
      axios({
          url: 'api/v1/location',
          methods:'GET',
      }).then(response=>{
          this.locationList = response.data.serve
          console.log(response.data.serve);
          for (index=0; index< this.locationList.length; index++) {
              this.location.push({value: this.locationList[index].id_location, text: this.locationList[index].location_name})
          }
          console.log(this.location);
      }).catch(error=>{
          console.log(error);
      })
    },
    loadField(){
        let index=0;
        axios({
            url: 'api/v1/fields/'+this.schedule.selectedLocation,
            methods:'GET',
        }).then(response=>{
            console.log(response);
            this.fieldlist = response.data.serve
            console.log(response.data.serve);
            this.field = []
            for (index=0; index<this.fieldlist.length; index++) {
            this.field.push({value: this.fieldlist[index].id_field, text: this.fieldlist[index].field_name})
            }
            console.log(this.fieldlist);
        }).catch(error=>{
           console.log(error);
        })
    },
    addschedule(){
      if (this.add) this.add=false
      else this.add=true
    }
    
  },
  watch:{
      'schedule.selectedLocation':function(){
        this.loadField()
      },
      add:function(){
        // this.items[this.index]=this.schedule
        // this.index++
        this.items.push(this.schedule)
      }
    }
  
}
</script>
