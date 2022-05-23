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
axios.defaults.headers.common["Access-Control-Allow-Origin"] = "*";
export default {
  name: "loginView",
  data() {
    return {
      phonenumber: "",
      password: "",
    };
  },
  methods: {
    login: async function () {
      const auth = { username: this.username, password: this.password };
      const url = "http://localhost:8888/api/signin";

      try {
        await axios.post(url, { auth }).then((res) => res.data);
        console.log(this.res.data);
      } catch (err) {
        this.error = err.message;
      }
      console.log("phone" + this.phonenumber);
      console.log("pass" + this.password);
      console.log("pass" + this.info);
    },
  },
  mounted() {
    axios
      .get("https://api.coindesk.com/v1/bpi/currentprice.json")
      .then((response) => (this.info = response));
  },
};
</script>

<style scoped></style>
