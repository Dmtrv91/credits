
<template>
    <table class="table my-3">
      <thead>
        <tr>
          <th>#</th>
          <th>First Name</th>
          <th>Middle Name</th>
          <th>Last Name</th>
          <th>Credit Number</th>
          <th>Sum Payment</th>
          <th>Monthly Installments</th>
          <th>Month Contribution</th>
          <th>Credit Created</th>
          <th>Credit Expired</th>
        </tr>
      </thead>
      <tbody>
        <tr  v-for="(value, key) in data">
          <th scope="row">{{ value.id }}</th>
          <td>{{ value.first_name }}</td>
          <td>{{ value.middle_name }}</td>
          <td>{{ value.last_name }}</td>
          <td>{{ value.credit_number }}</td>
          <td>{{ value.sum_payment }}</td>
          <td>{{ value.monthly_installments }}</td>
          <td>{{ value.month_contribution }}</td>
          <td>{{ value.credit_created }}</td>
          <td>{{ value.credit_expired }}</td>
        </tr>
      </tbody>
    </table>
    <div class="mt-5">
      <pagination
        v-if="current_page && paginator.records > 10"
        :records="paginator.records"
        :per-page="paginator.per_page"
        v-model="current_page"
        :options="paginatorOptions"
        />
      </div>
</template>

<script>
import axios from "axios";
import Navbar from "./../components/Navbar.vue";
import RTPagination from "./../components/RTPagination.vue";
import Pagination from "v-pagination-3";


export default {
  name: "Clients",
  components: { Navbar, RTPagination, Pagination},
  data() {
    return {
      paginatorOptions: {
        template: RTPagination,
      },
      data: [],
      paginator: {},
      current_page: 1,
    };
  },
  mounted() {
    this.fetch_clients();
  },
  methods: {
    fetch_clients() {
      let url = this.api_url + "client/list?page=" + this.current_page;

      axios
        .get(url, {
          headers: {
            Authorization: this.api_key,
          },
        })
        .then((response) => {
            this.data = response.data.data;
        });
    },
  },
  watch: {
    current_page: function () {
      this.fetch_clients();
    },
  },
};
</script>