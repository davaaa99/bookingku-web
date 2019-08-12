<template>

    <div id="content">
      <form @submit.prevent="updatePost">
        <b-form>
            <!-- <div class="chooselocation">
                <b-form-group id="input-group-1" label="Location:" label-for="input-1">
                    <b-form-select
                    id="input-1"
                    v-model="form.location"
                    :options="location"
                    required>
                    </b-form-select>
                </b-form-group>
            </div> -->
            <div class="namalapang">
                <b-form-group id="input-group-2" label="Nama Lapang:" label-for="input-2">
                    <b-form-input
                    id="input-2"
                    v-model="form.namalapang"
                    required
                    placeholder="Masukan Nama Lapang">
                    </b-form-input>
                </b-form-group>
            </div>
            <div class="tipelapang">
                <b-form-group id="input-group-3" label="Tipe Lapang:" label-for="input-3">
                    <b-form-select
                    id="input-3"
                    v-model="form.tipelapang"
                    :options="tipelapang"
                    required>
                    </b-form-select>
                </b-form-group>
            </div>
            <!-- <div class="uploadgambar">
                <b-form-group id="input-group-4" label="Upload Gambar:" label-for="input-4">
                <b-form-file
                    multiple
                    id="input-4"
                    v-model="form.file"
                    :state="Boolean(file)"
                    placeholder="Choose a file..."
                    drop-placeholder="Drop file here...">
                </b-form-file>
                </b-form-group>
            </div> -->
            <div class="buttonadd">
            <b-button variant="primary" @click="editLapang()">Add</b-button>
            </div> 
        </b-form>
      </form> 
</div>

</template>


<script>
  export default {
    data() {
      return {
        form: {
        },
        // location: [{ text: 'Pilih Lokasi', value: null }, 'Bandung', 'Jakarta', 'Bekasi', 'Bogor'],
        tipelapang: [{ text: 'Pilih Tipe Lapang', value: null }, 'Sintetis', 'Vinyl', 'Semen', 'Karpet'],
        show: true
      }
    },
    created() {
        let uri = `http://localhost:8000/api/v1/field/${this.$route.params.id_field}`;
        this.axios.get(uri).then((response) => {
            this.post = response.data;
        });
      },
    methods: {
      editLapang() {
          let uri = 'http://localhost:8000/api/v1/field';
          this.axios.post(uri, this.form).then((response) => {
          // this.$router.push({name: 'fields'});
          console.log(this.form);
        });
      }
    }
  }
</script>