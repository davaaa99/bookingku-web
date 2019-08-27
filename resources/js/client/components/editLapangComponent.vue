<template>
    <div id="editlapang">
      <form>
            <div class="form-group">
              <label for="idlapang">Id Lapang : </label>
              <input type="text" class="form-control" v-model="field.id_field" required disabled>
            </div>
            <div class="form-group">
              <label for="namalapang">Nama Lapang : </label>
              <input type="text" class="form-control" v-model="field.field_name" required>
            </div>
            <div class="form-group">
              <label for="tipelapang">Tipe Lapang : </label>
              <b-form-select
                    id="input-3"
                    v-model="field.field_type"
                    :options="tipelapang"
                    required>
              </b-form-select>
           </div>
           <div class="form-group">
             <label for="filelapang"> Upload File </label>
                <b-form-file
                multiple
                  accept=".jpg, .png, .jpeg,. .gif"  v-model="photos" enctype="multipart/form-data"
                ></b-form-file>
           </div>
        </form>
           <a href="/menulapang"><button class="btn btn-primary">Cancel</button></a>
           <button class="btn btn-primary" @click="save();upload($event)">Update Lapang</button>
      
</div>
</template>


<script>
  export default {
    props: {
      idField: String
    },

    data() {
      return {
        // tempIdField: "",
        found: true,
        // form: {},
        photos:[],
        oldfield: {},
        field: {
            id_field: "",
            field_name: "",
            field_type: "",
            photos: [],
        },
        tipelapang: [{ text: 'Pilih Tipe Lapang', value: null }, 'Sintetis', 'Vinyl', 'Semen', 'Karpet'],
        show: true
      }
    },
    mounted(){
        this.loadData();
    },
   
    methods: {
      upload(event) {
                console.log(this.photos);
                event.preventDefault();
                window.setTimeout(() => {
                let formData = new FormData();
                formData.append('id_field', this.idField);
                
                 for (let index = 0; index < this.photos.length; index++) {
                      formData.append("photo[]", this.photos[index]);
                  }
                console.log(formData);
                
                axios({
                  url: "/upload",
                  method: "POST",
                  data: formData,
                  headers: { 'content-type': 'multipart/form-data' }

                }).then(response=>{
                  alert("Successfully added new Field");
                  window.location.href = window.location.protocol +'//'+ window.location.host + '/menulapang';
                }).catch(response=>{
                  console.log(error);
                });
                },1000);

            },
      save() {
        axios({
          url: '/data/field',
          method: 'PUT',
          data: this.field
        }).then(response => {
          // alert('Berhasil di update')
          // window.location.href = window.location.protocol +'//'+ window.location.host + '/menulapang';
          
        }).catch(error => {
          console.log(error)
          alert('Gagal di update')
        })
      },
      loadData() {
        axios({
          url: '/edit',
          method: 'POST',
          data:{ 
              id: this.idField
          },
        }).then(response =>{
            this.oldfield = response.data
            console.log(response)
            console.log(this.oldfield);
            
            this.setDataField(this.oldfield)
            // console.log(response.data)
        }).catch(error =>{
            console.log(error);
        })
      },
      setDataField($oldfield){
        this.field.id_field = $oldfield.id_field
        this.field.field_name = $oldfield.field_name
        this.field.field_type = $oldfield.field_type
      }
    }
  }
</script>