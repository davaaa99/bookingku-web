<template>
<div id="lapangan">
    
  <div id="lapang">        
                <div class="locationdd">
                    <label for="location"> Lokasi </label>
                    <b-form-select v-model="selectedLocation" :options="location"></b-form-select>
                </div>
               <div class="buttonadd">
                    <b-col offset="10">
                        <a href="addlapang"><b-button  type="add" variant="primary">Tambah Lapang</b-button></a>
                    </b-col>
                </div>
    </div>
   
    <div id="cardlapang" class ="cardlapang" v-for="(lapangan, index) in dataLapangan" :key="lapangan.id_field">
        <a :href="'detaillapang/' + lapangan.id_field">
        <b-card-group deck>
       <b-card>
        <img class="gambarlapang" :src="setPhoto(lapangan.field_photo)"/>

        <b-card-title class="textlapang">
        <p>{{lapangan.field_name}}</p>
        </b-card-title>
        <b-card-text class="textlapang">
        <p>{{lapangan.field_type}}</p>
        </b-card-text>
        <a :href="'editlapang/' + lapangan.id_field"><b-button important variant="light">Edit</b-button></a>
        <a href="#"><b-button important variant="danger" @click="msgBoxDelete(index)">Delete </b-button></a>
       </b-card> 
        </b-card-group>
         </a>
    </div>
    <!-- <div class="pagination">
    <b-pagination
      v-model="currentPage"
      :per-page="perPage"
      aria-controls="cardlapang"
    ></b-pagination>
        </div> -->
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
                perPage:5,
                currentPage:1,
                status: false,
                perPage: 5,
                currentPage: 1,
                locations:[],
                location:[],
                selectedLocation: "",
                filterStatus: "Pilih Lokasi",
                dataLapangan: [],
                
            };
        },
        mounted(){
            this.loadLocation();
        },
        watch: {
              selectedLocation:function(){
                  this.loadField()
              }
            },
        methods: {
            loadField(){
                axios({
                    url: 'field/'+ this.selectedLocation,
                    methods: 'GET',
              }).then(response=>{
                  console.log(response);
                  this.dataLapangan = response.data.serve;
              }).catch(error=>{
                    console.log(error);
                });
            },
            msgBoxDelete(index){  
                this.$bvModal
                .msgBoxConfirm("Are you sure you want delete this fields?", {
                title: "Delete Field",
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
                    url: 'delete/'+ this.dataLapangan[index].id_field,
                    method: 'DELETE',
                   
                    })
                    .then(response => {
                       window.location.href = window.location.protocol +'//'+ window.location.host + '/menulapang';
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
            loadLocation(){
                let index=0;
                axios({
                    url: 'data/locations',
                    methods: 'GET',
                }).then(response=>{
                    this.locations = response.data.serve
                    // console.log(response);
                    // console.log(this.locations);
                    this.location=[];

                    for(index=0;index < this.locations.length; index++){
                        this.location.push({value: this.locations[index].id_location, text: this.locations[index].location_name})
                    }

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
            setPhoto(photosUrl){

                if(photosUrl == null) return 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQGOebuJUjkcg9mlBiznHn1ZFz3t2Fj4o3_y4huH4hvi2ZOz9CV'
                let photos = photosUrl.split(";");
                return photos[0]
            }
        },
      
    };

</script>
