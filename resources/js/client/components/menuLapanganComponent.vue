<template>
<div id="content">
  <div id="list">
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
                  <b-button variant="primary">Primary</b-button>
                </div>
            </div>
        </div>
        
    </div>
   
    
    <div class ="cardlapang" v-for="lapangan in dataLapangan" :key="lapangan.dataLapangan">
        <b-card-group deck>
      <b-card img-src= "http://www.staradmiral.com/wp-content/uploads/2017/01/Empat-Macam-Lapangan-Futsal.jpg" img-alt="Card image" img-top>
        <b-card-title>
          {{lapangan.namalapangan}}
        </b-card-title>
        <b-card-text>
          {{lapangan.jenislapangan}}
        </b-card-text>
      </b-card>
        
        </b-card-group>
        
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
                filterStatus: "Filter Status",
                filterSearch: "",
                statusList: [{
                        id: '001',
                        status: 'Waiting'
                    },
                    {
                        id: '002',
                        status: 'Confirmed'
                    },
                    {
                        id: '003',
                        status: 'Rejected'
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
