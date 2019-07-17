<script>
Vue.component("booking-list", require("./child/BookingList.vue").default);

export default {
  data() {
    return {
      VerifyBooking: [{}]
    };
  }
};
</script>
