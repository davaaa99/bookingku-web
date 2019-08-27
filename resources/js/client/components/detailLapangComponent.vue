<template>
    <div id="lapang-detail">
        <b-carousel
            id="carousel-1"
            v-model="slide"
            :interval="4000"
            controls
            indicators
            background="#ababab"
            img-width ="1024"
            img-height = "250"
            style="text-shadow: 1px 1px 2px #333;"
            @sliding-start="onSlideStart"
            @sliding-end="onSlideEnd"
            >
        <b-carousel-slide v-for="photo in photos" :key="photo.id" :caption="form.field_name" :text="form.field_type">
            <img
                slot="img"
                class="d-block w-100"
                width="100%"
                height="400"
                :src="photo"
                :alt="form.field_name"
                /> 
        </b-carousel-slide>
        </b-carousel>
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
                slide:0,
                fields: ['Jam', 'Down_Payment', 'Harga', 'Action'],
                items: [
                    {Jam:"07.00-12.00",Down_Payment:"50%",Harga:"Rp.120.000",Action:""},
                    {Jam:"12.00-18.00",Down_Payment:"50%",Harga:"Rp.125.000",Action:""},
                    {Jam:"18.00-22.00",Down_Payment:"50%",Harga:"Rp.130.000",Action:""},
                ],
                found: true,
                perPage: 10,
                form: {},
                photos: []
            };
        },
        mounted(){
        this.loadData();
        },
        methods: {
        splitPhotoUrl($photosUrl){
            this.photos = $photosUrl.split(";");
        },
        onSlideStart(slide){
            this.sliding = true;
        },
        onSlideEnd(slide){
            this.sliding = false;
        },
        loadData() {
        axios({
          url: '/detail',
          method: 'POST',
          data:{ 
              id: this.idField
          },
        }).then(response =>{
            this.form = response.data;
            this.splitPhotoUrl(this.form.field_photo);
        }).catch(error =>{
            console.log(error);
        })
      }
        }
    };
</script>
