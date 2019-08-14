<template>
    <div id="editlapang">
      <form>
            <div class="form-group">
              <label for="idlapang">Id Lapang : </label>
              <input type="text" class="form-control" v-model="form.id_field" required disabled>
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
           <button class="btn btn-primary" @click="save()">Update Lapang</button>
      </form>
</div>
</template>


<script>
  export default {
    props: {
      idField: String
    },

    data() {
      return {
        found: true,
        // id:'',
        form: {},
        tipelapang: [{ text: 'Pilih Tipe Lapang', value: null }, 'Sintetis', 'Vinyl', 'Semen', 'Karpet'],
        show: true
      }
    },
    mounted(){
        this.loadData();
    },
   
    methods: {
      save() {
        const data = {
          id_field: this.form.id_field,
          field_name: this.form.field_name,
          field_type: this.form.field_type
        }
        axios({
          url: '/data/field',
          method: 'PUT',
          data: data
        }).then(response => {
          alert('Berhasil di update')
          window.location.href = window.location.protocol +'//'+ window.location.host + '/menulapang';
          
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
            this.form = response.data
            console.log(response.data)
        }).catch(error =>{
            console.log(error);
        })
      },
    }
  }
</script>