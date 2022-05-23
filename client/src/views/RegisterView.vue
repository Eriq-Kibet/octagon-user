<template>
  <div class="container">
    <h1>Octagon User Registration</h1>
    <br />
    <div class="row">
      <div class="col-md-3"></div>
      <div class="col-md-6">
        <div class="form-group">
          <input
            type="text"
            class="form-control"
            id="firstname"
            v-model="firstname"
            placeholder="Enter First Name"
          />
        </div>
        <div class="form-group">
          <input
            type="text"
            class="form-control"
            id="lastname"
            v-model="lastname"
            placeholder="Enter Last Name"
          />
        </div>
        <div class="form-group">
          <input
            type="number"
            class="form-control"
            id="phoneNumber"
            v-model="phonenumber"
            placeholder="Enter phonenumber"
          />
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

        <button @click="register" class="btn btn-primary">Submit</button>
      </div>
      <div class="col-md-3"></div>
    </div>
  </div>
</template>
<script>
export default {
  name: "registerView",
  data() {
    return {
      firstname: "",
      lastname: "",
      phonenumber: "",
      password: "",
    };
  },
  methods: {
    register: function () {
      console.log("first" + this.firstname);
      console.log("last" + this.lastname);
      console.log("phone" + this.phonenumber);
      console.log("pass" + this.password);
    },
  },
};
</script>

<style scoped></style>
