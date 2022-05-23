<template>
  <div class="container">
    <h1>Octagon User Login</h1>
    <br />
    <br />
    <div class="row">
      <div class="col-md-3"></div>
      <div class="col-md-6">
        <div class="form-group">
          <input
            type="number"
            class="form-control"
            id="phoneNumber"
            v-model="phonenumber"
            placeholder="Enter phonenumber"
          />
          <small id="phoneHelp" class="form-text text-muted"
            >We'll never share your phone number with anyone else.</small
          >
        </div>
        <div class="form-group">
          <input
            type="password"
            class="form-control"
            id="password"
            v-model="password"
            placeholder="Password"
          />
        </div>

        <button @click="login" class="btn btn-primary">Submit</button>
      </div>
      <div class="col-md-3"></div>
    </div>
    {{ info }}
  </div>
</template>

<script>
import axios from "axios";
export default {
  name: "loginView",
  data() {
    return {
      phonenumber: "",
      password: "",
    };
  },
  methods: {
    login: function () {
      axios
        .get("https://api.coindesk.com/v1/bpi/currentprice.json")
        .then((response) => (this.info = response));
      console.log("phone" + this.phonenumber);
      console.log("pass" + this.password);
      console.log("pass" + this.info);
    },
  },
  mounted() {},
};
</script>

<style scoped></style>
