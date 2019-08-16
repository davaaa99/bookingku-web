<template>
    <div id="addlapang">
      <form>
            <div class="form-group">
              <!-- <label for="idlapang">Id Lapang : </label> -->
              <!-- <input type="text" class="form-control" v-model="form.id_field" required> -->
            </div>
            <div class="form-group">
              <label for="namalapang">Nama Lapang : </label>
              <input type="text" class="form-control" v-model="form.field_name" required>
            </div>
            <div class="form-group">
              <label for="tipelapang">Tipe Lapang : </label>
              <b-form-select
                    id="input-3"
                    v-model="form.field_type"
                    :options="tipelapang"
                    required>
              </b-form-select>
           </div>
           
      </form>
      <a href="/menulapang"><button class="btn btn-primary">Cancel</button></a>
      <button class="btn btn-primary" @click="store()">Tambah Lapang</button>
      
    </div>
</template>


<script>
  export default {
    data() {
      return {
        form: {},
        tipelapang: ['Sintetis', 'Vinyl', 'Semen', 'Karpet'],
        show: true
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
      store() {
        const data = {
          id_field: this.form.id_field,
          field_name: this.form.field_name,
          field_type: this.form.field_type
        }
        axios({
          url: '/add',
          method: 'POST',
          data: data
        }).then(response => {
          alert('Data berhasil ditambahkan')
          window.location.href = window.location.protocol +'//'+ window.location.host + '/menulapang';
          
        }).catch(error => {
          console.log(error)
          alert('Data gagal ditambahkan')
        })
      }

    }
  }
</script>