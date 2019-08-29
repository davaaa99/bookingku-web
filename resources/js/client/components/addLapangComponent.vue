<template>
    <div id="addlapang">
      <form>
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
           </div>

           <div class="spacer-10"></div>
            <div v-if="photoData.length > 0" class="d-flex image-bg" style="max-width: inherit;">
                <div v-for="(photo, index) in photoData" :key="index" >
                  <div class="image" :style="{ 'background-image': 'url(' + photo + ')' }">
                    <i class="material-icons ic mr-auto" @click="removePhoto(index)">close</i>
                  </div>
                  <!-- <img class="preview" :src="img"> -->
                </div>
            </div>
      </form>
      <div class="tombol">
      <a href="/menulapang"><button class="btn btn-primary">Cancel</button></a>
      <button class="btn btn-primary" @click="store();upload($event);">Add Lapang</button>
      </div>
    </div>
</template>


<script>
  export default {
    data() {
      return {
        photoData: [],
        tempIdField: "",
        form: {},
        photos: null,
        tipelapang: ['Sintetis', 'Vinyl', 'Semen', 'Karpet'],
        show: true,
        field:{
          field_name: "",
          field_type: "",
          photos: null
        }
      }
    },
    
    methods: {  
      removePhoto(index) {
      this.photoData.splice(index,1)
      this.photos.splice(index,1)
      },
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
      addLapang() {
          let uri = '/add';
          this.axios.post(uri, this.form).then((response) => {
            alert('Data berhasil ditambahkan')
          window.location.href = window.location.protocol +'//'+ window.location.host + '/menulapang';
        }).catch(error => {
          console.log(error)
          alert('Data gagal ditambahkan')
        });
      },
      upload(event) {
                console.log(this.photos);
                event.preventDefault();
                window.setTimeout(() => {
                let formData = new FormData();
                formData.append('id_field', this.tempIdField);
                
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
      store() {
        axios({
          url: '/add',
          method: 'POST',
          data: this.field
        }).then(response => {
          this.tempIdField = response.data.serve.id_field;
        }).catch(error => {
          console.log(error)
          alert('Data gagal ditambahkan')
        })
      },
      
    }
  }
</script>