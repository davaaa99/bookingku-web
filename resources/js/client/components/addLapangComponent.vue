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
                ></b-form-file>
           </div>
      </form>
      <a href="/menulapang"><button class="btn btn-primary">Cancel</button></a>
      <button class="btn btn-primary" @click="store();upload($event);">Add Lapang</button>
      
    </div>
</template>


<script>
  export default {
    data() {
      return {
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