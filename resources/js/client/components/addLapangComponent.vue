<template>

    <div id="addlapang">
        <b-form @submit="onSubmit" @reset="onReset" v-if="show">
            <div class="chooselocation">
                <b-form-group id="input-group-1" label="Location:" label-for="input-1">
                    <b-form-select
                    id="input-1"
                    v-model="form.location"
                    :options="location"
                    required>
                    </b-form-select>
                </b-form-group>
            </div>
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
            <div class="uploadgambar">
                <b-form-group id="input-group-4" label="Upload Gambar:" label-for="input-4">
                <b-form-file
                    multiple 
                    v-model="file"
                    :state="Boolean(file)"
                    placeholder="Choose a file..."
                    drop-placeholder="Drop file here...">
                </b-form-file>
                </b-form-group>
            </div>
            <div class="buttonadd">
            <b-button variant="primary">Add</b-button>
            </div>
        </b-form>
</div>

</template>


<script>
  export default {
    data() {
      return {
        form: {
          location: '',
          namalapang: '',
          tipelapang: null,
          file: null,
          file2: null,
        },
        location: [{ text: 'Pilih Lokasi', value: null }, 'Bandung', 'Jakarta', 'Bekasi', 'Bogor'],
        tipelapang: [{ text: 'Pilih Tipe Lapang', value: null }, 'Sintetis', 'Vinyl', 'Semen', 'Karpet'],
        show: true
      }
    },
    methods: {
      onSubmit(evt) {
        evt.preventDefault()
        alert(JSON.stringify(this.form))
      },
      onReset(evt) {
        evt.preventDefault()
        // Reset our form values
        this.form.location = null
        this.form.namalapang = ''
        this.form.tipelapang = null
        // Trick to reset/clear native browser form validation state
        this.show = false
        this.$nextTick(() => {
          this.show = true
        })
      }
    }
  }
</script>