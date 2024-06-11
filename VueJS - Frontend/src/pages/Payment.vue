
<template>
  <div class = "mt-3">
    <h1>Payment</h1>
  </div>
  <form>
    <div class="row">
      <div class="col-6 my-3">
        <label>Credit Number</label>
        <select class="form-select" v-model = payment.credit_number>
          <option v-for="(value, key) in credit_numbers">{{value}}</option>
        </select>
    </div>
      <div class="col-6 my-3">
        <label>Monthly Payment</label>
        <input 
          v-model = payment.month_contribution
          type="number" 
          class="form-control" 
          aria-label="Monthly Payment"
          value="1">
      </div>
    </div>
    <button 
      @click = "create_payment"
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
  name: "Payment",
  components: { Navbar},
  data() {
    return {
      credit_numbers : [],
      payment: {
        credit_number : "",
        month_contribution: "",
      },
    };
  },
  mounted() {
    this.fetch_clients();
  },
  methods: {
    fetch_clients() {
      let url = this.api_url + "credit/numbers";

      axios
        .get(url, {
          headers: {
            Authorization: this.api_key,
          },
        })
        .then((response) => {
          this.credit_numbers = response.data;
        });
    },
    create_payment(){
      let url = this.api_url + "credit/payment";

      axios
        .post(url, this.payment, {
          headers: {
            Authorization: this.api_key,
          },
        })
        .then((response) => {
            if(201 == response.status){
              this.emitter.emit("popup_alert", {
              type: "success",
              text: "Your make payment",
            });
        } else {
          this.emitter.emit("popup_alert", {
              type: "danger",
              text: "You cannot pay more than your monthly installment. You have exceeded the "+response.data,
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