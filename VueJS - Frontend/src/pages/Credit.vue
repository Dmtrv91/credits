
<template>
  <h1 class="my-3">Create Credit</h1>
  <form>
    <div class="row my-3">
      <div class="col-4">
        <label for="validationServer01">First name</label>
        <input 
          @keyup="validate"
          v-model = client.first_name
          type="text" 
          class="form-control" 
          placeholder="First name" 
          required>
      </div>
      <div class="col-4">
        <label>Middle name</label>
        <input 
          @keyup="validate"
          v-model = client.middle_name
          type="text" 
          class="form-control" 
          placeholder="Middle name" 
          required>
      </div>
      <div class="col-4">
        <label>Last name</label>
        <input 
          @keyup="validate"
          v-model = client.last_name
          type="text" 
          class="form-control" 
          placeholder="Last name" 
          required>
      </div>
    </div>
    <div class="row">
      <div class="col-6 my-3">
        <label>Sum 100 - 80 000 lv</label>
        <input 
          @keyup="validate"
          v-model = client.sum_payment
          type="number" 
          class="form-control" 
          aria-label="Sum"
          value="100">
      </div>
      <div class="col-6 my-3">
        <label>Period 3 - 120 months</label>
        <input 
          @keyup="validate"
          v-model = client.monthly_installments
          type="number" 
          class="form-control" 
          aria-label="Monthly Installments"
          value="1">
      </div>
    </div>
    <button 
      @click = "create_credit"
      :disabled="!valid_input"
      class="btn btn-primary my-3" 
      type="button">
      Create
    </button>
  </form>

</template>

<script>
import axios from "axios";
import Navbar from "./../components/Navbar.vue";

export default {
  name: "Credit",
  components: { Navbar},
  data() {
    return {
      valid_input: false,
      client: {
       first_name : "",
       middle_name: "",
       last_name: "",
       sum_payment: 100,
       monthly_installments: 3,
      },
    };
  },
  mounted() {
  },
  methods: {
    validate(){
      this.valid_input = 
      this.client.first_name.length >= 2 &&
      this.client.last_name.length >= 2 &&
      this.client.middle_name.length >= 2 &&
      this.client.sum_payment % 1 === 0 && this.client.sum_payment >= 100 && this.client.sum_payment <= 80000 && 
      this.client.monthly_installments % 1 === 0 && this.client.monthly_installments >= 3 && this.client.monthly_installments <= 120
    },
    create_credit() {
      let url = this.api_url + "credit/create";

      axios
        .post(url, this.client, {
          headers: {
            Authorization: this.api_key,
          },
        })
        .then((response) => {
            if(201 == response.status){
              this.emitter.emit("popup_alert", {
              type: "success",
              text: "Your information was changed!",
            });
        } else {
          this.emitter.emit("popup_alert", {
              type: "danger",
              text: "The amount exceeds the allowable amount with "+response.data,
            });
        }
      }
    ).catch(function (error) {
      console.log(error)
          if (error.response) {
            app.emitter.emit("popup_alert", {
              type: "danger",
              text: error.response.data,
            });
          } else {
            app.emitter.emit("popup_alert", {
              type: "danger",
              text: "Error occurred",
            });
          }
        }
      );
    },
  },
};
</script>