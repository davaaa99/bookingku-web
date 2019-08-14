<template>
    <div id="addlapang">
      <form>
            <div class="form-group">
              <label for="idlapang">Id Lapang : </label>
              <input type="text" class="form-control" v-model="form.id_field" required>
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
           <button class="btn btn-primary" @click="addLapang()">Tambah Lapang</button>
      </form>
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
          let uri = 'http://localhost:8000/api/v1/field';
          this.axios.post(uri, this.form).then((response) => {
            alert('Data berhasil ditambahkan')
          window.location.href = window.location.protocol +'//'+ window.location.host + '/menulapang';
        }).catch(error => {
          console.log(error)
          alert('Data gagal ditambahkan')
        });
      }
    }
  }
</script>