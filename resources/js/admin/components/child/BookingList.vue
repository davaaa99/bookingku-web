<template>
    <div id="booking-list">
        <div class="filter ">
            <div class="filter-item d-flex">
              
                <date-picker v-model="time1" input-class="datepicker" format="DD-MM-YYYY" > </date-picker>
        
                <div class="filterStatus">
                    <div class="filterTitle d-flex align-items-center " @click="show">
                      {{filterTitle}}
                      <i :class="[{ 'fas fa-caret-down':!status }, { 'fas fa-sort-up':status }]" class="ml-auto" ></i>
                    </div>
                    <div v-if="status" class="box d-flex align-items-center justify-content-center">
                        <div class="link">
                            <div class="link-item" v-for="list in statusList">
                                <a @click="click(list.status)">
                                    <div class="link-status">
                                        {{ list.status }}
                                    </div>
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="search ml-auto d-flex align-items-center">
                    <input class="filterSearch" type="text" v-model="search" placeholder="Search...">

                    <a href="">
                        <i class="fa fa-search" style="color:#C0C4CC"></i>
                    </a>
                    </input>

                </div>
            </div>
        </div>
    </div>
</template>

<script>
import DatePicker from 'vue2-datepicker'
    
    export default {
        components: { DatePicker },
        data() {

            return {
               time1: '',
                status: false,
                search: "",
                statusList: [{
                        id: '001',
                        status: 'status 1'
                    },
                    {
                        id: '001',
                        status: 'status 2'
                    },
                    {
                        id: '001',
                        status: 'status 3'
                    }
                ],
                filterTitle: "Status",
                filterTanggal: "",
                filterStatus: "",
                filterSearch: "",
                
            };
        },
        methods: {
            show: function () {
                this.status = !this.status;
            },
            click: function (status) {
                this.status = !this.status;
                this.filterTitle = status;
            }

        }
    };

</script>
