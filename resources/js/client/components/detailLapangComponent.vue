<template>
    <div id="lapang-detail">
            <b-card overlay :img-src="form.field_photo" 
                img-alt="Gambar Lapangan" text-variant="white" border-variant="dark"
                class="image-header">
                
            <div class="spacer"></div>
            <div class="spacer-30"></div>
            <b-card-text>
                <h1> {{form.field_name}}</h1>
                <p>{{form.field_type}}</p>
            </b-card-text>
            </b-card>
        <div class="spacer-30"></div>
        <div class="hari">
            <!-- <b-form-select v-model="selected" :options="options"></b-form-select> -->
        </div>
        <div class="tabel-jadwal">
            <b-table stripped hover :items="items" :fields="fields">
                <template slot="Action" slot-scope="data">
                    <b-button variant="light"  class=" btn btn-detail" @click="detail(data.item.idClient)">Edit</b-button>
                    ||
                    <b-button variant="danger" class=" btn btn-detail" @click="detail(data.item.idClient)">Delete</b-button>
                </template>
            </b-table>
            
        </div>
    </div>
       
</template>

<script>
    export default {
    props: {
        idField: String
        },
        data() {

            return {
                
                fields: ['Jam', 'Down_Payment', 'Harga', 'Action'],
                items: [
                    {Jam:"07.00-12.00",Down_Payment:"50%",Harga:"Rp.120.000",Action:""},
                    {Jam:"12.00-18.00",Down_Payment:"50%",Harga:"Rp.125.000",Action:""},
                    {Jam:"18.00-22.00",Down_Payment:"50%",Harga:"Rp.130.000",Action:""},
                ],
                found: true,
                perPage: 10,
                form: {}
            };
        },
        mounted(){
        this.loadData();
        },
        methods: {
        loadData() {
        axios({
          url: '/detail',
          method: 'POST',
          data:{ 
              id: this.idField
          },
        }).then(response =>{
            this.form = response.data
            console.log(response.data)
        }).catch(error =>{
            console.log(error);
        })
      }
        }
    };
</script>
