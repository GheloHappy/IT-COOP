<template>
     <table class="table table-hover">
    <thead>
      <th>Name</th>
      <th>Transaction</th>
      <th>Savings</th>
      <th>Date</th>
      <th></th>
    </thead>
    <tbody>
      <template v-for="item in savings" :key="item.id">
        <tr>
          <td>{{item.name}}</td>
          <td>{{item.transaction}}</td>
          <td>{{item.savings}}</td>
          <td>{{item.date_added}}</td>
        </tr>
      </template>
    </tbody>
  </table>
</template>

<script>
import useUser from "../../composables/user";
import { onMounted } from "vue";

export default {
    setup() {
        const { savings, getSavings } = useUser();

        onMounted(getSavings());

        return {
        savings,
        };
    },
    name: "Dashboard",
    data() {
        return {
            name: null,
        }
    },
    created() {
        if (window.Laravel.user) {
            this.name = window.Laravel.user.name
        }
    },
    beforeRouteEnter(to, from, next) {
        if (!window.Laravel.isLoggedin) {
            window.location.href = "/";
        }
        next();
    },
}
</script>