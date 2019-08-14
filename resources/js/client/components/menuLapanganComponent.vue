<template>
<div id="content">
    <div id="carilokasi"><h5>Cari Lokasi: </h5></div>
    
  <div id="lapang">
        <div class="filter ">
            <div class="filter-item d-flex">
                <div class="filterStatus">
                    <div class="filterTitle d-flex align-items-center " @click="show">
                        {{filterStatus}}
                        <i :class="[{ 'fas fa-caret-down':!status }, { 'fas fa-sort-up':status }]" class="ml-auto"></i>
                    </div>
                    <div v-if="status" class="box d-flex align-items-center justify-content-center">
                        <div class="link">
                            <div class="link-item" v-for="list in statusList" :key="list.statusList">
                                <a @click="click(list.status)">
                                    <div class="link-status">
                                        {{ list.status }}
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
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
        <b-card-group deck>
       <b-card>
        <img class="gambarlapang" :src="lapangan.field_photo" />
        <b-card-title>
          {{lapangan.field_name}}
        </b-card-title>
        <b-card-text>
          {{lapangan.field_type}}
        </b-card-text>
        <a :href="'editlapang/' + lapangan.id_field"><b-button variant="light">Edit</b-button></a>
        <b-button variant="danger" @click="deleteLapang(lapangan.id_field)">Delete </b-button>
       </b-card> 
        </b-card-group>
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
                filterTanggal: "",
                filterStatus: "Pilih Lokasi",
                filterSearch: "",
                statusList: [{
                        id: '001',
                        status: 'Sarijadi Futsal'
                    },
                    {
                        id: '002',
                        status: 'Ciwaruga Futsal'
                    },
                    {
                        id: '003',
                        status: 'Progresif Futsal'
                    }
                ],
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
