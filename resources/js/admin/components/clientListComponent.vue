<template>
    <div id="list">
        <div class="filter ">
            <div class="filter-item d-flex">
                <div class="search  d-flex align-items-center">
                    <input class="filterSearch" type="text" v-model="filterSearch" placeholder="Search">
                    <i class="fa fa-search" style="color:#C0C4CC"></i>
                </div>
            </div>
            <div class="spacer-20"></div>
        </div>
        <b-table id="my-table" :filter="filterSearch" :fields="fields" :items="ClientList" :per-page="perPage"
            :current-page="currentPage" striped outlined show-empty>
            <template slot="No" slot-scope="data">
                {{ data.index + 1 }}
            </template>
            <template slot="aksi" slot-scope="data">
                <button class=" btn btn-detail" @click="detail(data.item.idClient)">Detail</button>
            </template>
        </b-table>
        <div class="spacer-20"></div>
        <b-pagination v-model="currentPage" :total-rows="rows" :per-page="perPage" aria-controls="my-table"
            :prev-text="'«'" :next-text="'»'" :hide-goto-end-buttons="true" size="md" align="center">
        </b-pagination>

    </div>
</template>

<script>
    import BootstrapVue from 'bootstrap-vue'
    import {
        type
    } from 'os';
    
    Vue.use(BootstrapVue)

    export default {

        data() {

            return {

                perPage: 10,
                currentPage: 1,
                filterSearch: "",
                fields: [
                    "No",
                    {
                        key: "id_user",
                        label: "ID Clients"
                    },
                    {
                        key: "email",
                        label: "Email"
                    },
                    {
                        key: "name",
                        label: "Nama"
                    },
                    {
                        key: "aksi",
                        label: "Aksi"
                    }
                ],
                ClientList:[
                    
                ],
            };
        },
        mounted(){
        let uri='http://localhost:8000/api/v1/clients';
        this.axios.get(uri).then(response=>{
            this.ClientList=response.data.data;
            console.log('response.data.data');
        });
        },
        computed: {
            rows() {
                return this.ClientList.length;

            }
        },
        methods: {
            detail: function (id) {
                var self = this;
                var d = new Date(),
                    month = '' + (d.getMonth() + 1),
                    day = '' + d.getDate(),
                    year = d.getFullYear();

                if (month.length < 2) month = '0' + month;
                // if (day.length < 2) day = '0' + day;

                window.location.href = window.location.protocol + '//' + window.location.host +
                    '/$2y$10$MtKIr0/yICTGGEPWGcj0lOGLK9UlSd6hrOiBYgQWlfkym6V52hQSm' + day +
                    '/clientlist/detaillokasi/' +
                    btoa(id);
            }
        }
    };

</script>
