<template>
  <div class="container">
    <div class="col-12">
  
    <div v-if=" this.$route.name == 'Clients'">
      <Navbar menu ="clients" />
    </div>

    <div v-if=" this.$route.name == 'Credit'">
      <Navbar menu ="credit" />
    </div>

    <div v-if=" this.$route.name == 'Payment'">
      <Navbar menu ="payment" />
    </div>

    <router-view />

    </div>
  </div>
  <PopupAlert class ="position-absolute top-0 end-0" type="alert" text="That was cool!" />
</template>

<script>
import Navbar from "./components/Navbar.vue";
import PopupAlert from "./components/PopupAlert.vue";

export default {
  name: "App",
  components: { Navbar, PopupAlert },
  data() {},
  mounted() {},
  methods: {},
  watch: {},
};
</script>