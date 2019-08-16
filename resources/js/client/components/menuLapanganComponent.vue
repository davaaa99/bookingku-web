<template>
<div id="content">
    
  <div id="lapang">
        <div class="filter ">
            <div class="filter-item d-flex">
                <div>
                    <label for="location"> Location </label>
                    <b-form-select v-model="locations" :options="location"></b-form-select> 
                </div>
               <div class="buttonadd">
                    <b-col offset="10">
                        <a href="addlapang"><b-button  type="add" variant="primary">Add</b-button></a>
                    </b-col>
                </div>
            </div>  
        </div>   
    </div>
   
    
    <div class ="cardlapang" v-for="lapangan in dataLapangan" :key="lapangan.id_field">
        <a :href="'detaillapang/' + lapangan.id_field">
        <b-card-group deck>
       <b-card>
        <img class="gambarlapang" :src="lapangan.field_photo" />
        <b-card-title class="textlapang">
        <p>{{lapangan.field_name}}</p>
        </b-card-title>
        <b-card-text class="textlapang">
        <p>{{lapangan.field_type}}</p>
        </b-card-text>
        <a :href="'editlapang/' + lapangan.id_field"><b-button variant="light">Edit</b-button></a>
        <b-button variant="danger" @click="deleteLapang(lapangan.id_field)">Delete </b-button>
       </b-card> 
        </b-card-group>
         </a>
    </div>
   
</div>
</template>

<script>
    import DatePicker from 'vue2-datepicker'
    import BootstrapVue from 'bootstrap-vue'
    import Axios from 'axios'
    import {
        type
    } from 'os';
    Vue.use(BootstrapVue)

    export default {
        components: {
            DatePicker
        },
        props: {
            idBooking: [String]
        },
        data() {
            return {
                status: false,
                perPage: 5,
                currentPage: 1,
                locations: [],
                location:[],
                filterStatus: "Pilih Lokasi",
                dataLapangan: [
                //   namalapangan : 'Lapang A',
                //   jenislapangan: 'Sintetis',
                //   image: 'http://www.staradmiral.com/wp-content/uploads/2017/01/Empat-Macam-Lapangan-Futsal.jpg'
                // },
                // {
                //   namalapangan : 'Lapang B',
                //   jenislapangan: 'Vinyl',
                //   image: 'https://djsport.id/wp-content/uploads/2018/11/futsal-stadium-1024x576.jpg'
                // }
                ],
                
            };
        },
        mounted(){
            this.loadLocation();
        },
        created(){
              let uri = 'http://localhost:8000/api/v1/field';
              this.axios.get(uri).then(response => {
                  console.log(response);
                  this.dataLapangan = response.data.data;   
              });
            },
        methods: {
            deleteLapang(id_field){     
              let uri = `http://localhost:8000/api/v1/field/${id_field}`;
              this.axios.delete(uri).then(response => {
               this.dataLapangan.splice(this.dataLapangan.indexOf(id_field), 1);
               console.log(this.dataLapangan);
               window.location.href = window.location.protocol +'//'+ window.location.host + '/menulapang';
              });
            },
            loadLocation(){
                let index=0;
                axios({
                    url: 'api/v1/location',
                    methods: 'GET',
                }).then(response=>{
                    this.locations = response.data.data
                    console.log(response.data.data);
                    for(index=0;index<= response.data.data.length; index++){
                        this.location.push({value: response.data.data[index].id_location, text: response.data.data[index].location_name})
                    }
                    console.log(this.locations);
                }).catch(error=>{
                    console.log(error);
                })
            },
            show: function () {
                this.status = !this.status;
            },
            click: function (status) {
                this.status = !this.status;
                this.filterStatus = status;
            },
        },
        watch: {
            filterStatus: function (fal) {
                var self = this;
                const data = self.filterData.filter(function (project) {
                    return project.status === fal;
                });
                self.filterData = data;
            }
        },
      
    };

</script>
