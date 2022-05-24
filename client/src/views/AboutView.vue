<template>
  <div class="about">
    <h1>This is an about page</h1>
    <div>
      {{ info }}
    </div>
    <ul>
      <li>{{ firstname }}</li>
      <li>{{ lastname }}</li>
      <li>{{ phonenumber }}</li>
    </ul>
  </div>
</template>
<script>
import axios from "axios";

export default {
  mounted() {
    // const url = process.env.BASE_URL;
    axios
      .get("https://api.coindesk.com/v1/bpi/currentprice.json")
      .then((response) => {
        response;
        this.info = response.data;
        console.log("LOG ", response.data);
      });
  },
};
</script>
<style scoped></style>
