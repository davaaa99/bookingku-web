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
   
    
    <div class ="cardlapang" v-for="lapangan in dataLapangan" :key="lapangan.dataLapangan">
        <a href="detaillapang" class="cardlink"><b-card-group deck>
       <b-card>
        <img class="gambarlapang" :src="lapangan.image" />
        <b-card-title>
          {{lapangan.namalapangan}}
        </b-card-title>
        <b-card-text>
          {{lapangan.jenislapangan}}
        </b-card-text>
        <a href="editlapang"><b-button variant="light">Edit</b-button></a>
        <b-button variant="danger">Delete </b-button>
       </b-card> 
        </b-card-group>
        </a>
    </div>
</div>
</template>

<script>
    import DatePicker from 'vue2-datepicker'
    import BootstrapVue from 'bootstrap-vue'
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
                dataLapangan: [{
                  namalapangan : 'Lapang A',
                  jenislapangan: 'Sintetis',
                  image: 'http://www.staradmiral.com/wp-content/uploads/2017/01/Empat-Macam-Lapangan-Futsal.jpg'
                },
                {
                  namalapangan : 'Lapang B',
                  jenislapangan: 'Vinyl',
                  image: 'https://djsport.id/wp-content/uploads/2018/11/futsal-stadium-1024x576.jpg'
                }
                ]
                
            };
        },
        mounted() {
            this.getData()
        },
        methods: {
            
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
