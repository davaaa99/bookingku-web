<template>
  <div id="fitur">
    <div class="d-flex justify-content-center">
      <div class="row">
        <div class="row">
          <div class="col-lg-6 col-md-6 col-6" v-for="fn in fiturName">
            <div class="fitur-item"></div>
            <div class="fitur-desc">{{fn.name}}</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      fiturName: [
        { name: "Fitur 1" },
        { name: "Fitur 2" },
        { name: "Fitur 3" },
        { name: "Fitur 4" }
      ]
    };
  }
};
</script>
