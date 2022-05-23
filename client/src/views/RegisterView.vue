<template>
  <div class="container">
    <h1>Octagon User Registration</h1>
    <br />
    <div class="row">
      <div class="col-md-3"></div>
      <div class="col-md-6">
        <form>
          <div class="form-group">
            <input
              type="text"
              class="form-control"
              id="firstname"
              placeholder="Enter First Name"
            />
          </div>
          <div class="form-group">
            <input
              type="text"
              class="form-control"
              id="lastname"
              placeholder="Enter Last Name"
            />
          </div>
          <div class="form-group">
            <input
              type="number"
              class="form-control"
              id="phoneNumber"
              placeholder="Enter phonenumber"
            />
          </div>
          <div class="form-group">
            <input
              type="password"
              class="form-control"
              id="exampleInputPassword1"
              placeholder="Password"
            />
          </div>

          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
      <div class="col-md-3"></div>
    </div>
  </div>
</template>
<script>
export default {};
</script>

<style scoped></style>
