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
            required
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
            required
            id="password"
            v-model="password"
            placeholder="Password"
          />
        </div>

        <button @click="login" type="submit" class="btn btn-primary">
          Submit
        </button>
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
    login: async function () {
      const auth = { username: this.username, password: this.password };
      const url = "https://api.coindesk.com/v1/bpi/currentprice.json";

      try {
        await axios.get(url, auth).then((res) => {
          this.info = res;
          if (res.data.token) {
            //store the token in local storage
            localStorage.setItem("token", this.token);
            // navigate to  about on login
            this.$router.push("/about");
          } else if (!res.data.token) {
            console.log("Enter the correct password or username");
          }
        });

        console.log(this.info);
      } catch (err) {
        this.error = err.message;
      }
      console.log("phone" + this.phonenumber);
      console.log("pass" + this.password);
      console.log("pass" + this.info);
    },
  },
};
</script>

<style scoped></style>
