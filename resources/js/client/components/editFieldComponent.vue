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
                  @change="previewImage"
                ></b-form-file>
                <div class="spacer-10"></div>
            <div class="d-flex">
              <div v-if="oldPhotos.length > 0" class="d-flex flex-row image-bg">
                <div v-for="(photo, index) in oldPhotos" :key="index" >
                  <div class="image" :style="{ 'background-image': 'url(' + photo + ')' }">
                    <i class="material-icons ic mr-auto" @click="removeOldphoto(index)">close</i>
                  </div>
                </div>
              </div>
              <div v-if="photoData.length > 0" class="d-flex flex-row image-bg">
                  <div v-for="(photo, index) in photoData" :key="index" >
                    <div class="image" :style="{ 'background-image': 'url(' + photo + ')' }">
                      <i class="material-icons ic mr-auto" @click="removePhoto(index)">close</i>
                    </div>
                  </div>
              </div>
            </div>
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
        oldPhotos:[],
        photoData:[],
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
      previewImage: function(event) {
      var input = event.target;
      this.photoData = []
      if (input.files && input.files[0]) {
        for (let index = 0; index < input.files.length; index++) {
          var reader = new FileReader();
          reader.onload = e => {
            this.photoData.push(e.target.result);
          };
          reader.readAsDataURL(input.files[index]);
        }
      }
    },
      splitPhotoUrl($photosUrl) {
      this.oldPhotos = $photosUrl.split(";")
    },
      removeOldphoto(index) {
      this.oldPhotos.splice(index,1)
      console.log(this.oldPhotos);
      
    },
    removePhoto(index) {
      this.photoData.splice(index,1)
      this.photos.splice(index,1)
    },
      upload(event) {
                console.log(this.photos);
                event.preventDefault();
                window.setTimeout(() => {
                let formData = new FormData();
                formData.append('id_field', this.idField);
                

                if (this.oldPhotos != null) {
                  for (let index = 0; index < this.oldPhotos.length; index++) {
                      formData.append("oldPhoto[]", this.oldPhotos[index]);
                  }
                }
                if (this.photos != null) { 
                  for (let index = 0; index < this.photos.length; index++) {
                      formData.append("photo[]", this.photos[index]);
                  }
                }
                
                axios({
                  url: "/upload",
                  method: "POST",
                  data: formData,
                  headers: { 'content-type': 'multipart/form-data' }

                }).then(response=>{
                  alert("Successfully update new Field");
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
            this.splitPhotoUrl(this.oldfield.field_photo)
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