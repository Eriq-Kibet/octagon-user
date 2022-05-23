<template>
  <div class="container">
    <h1>Octagon User Login</h1>
    <br />
    <br />
    <div class="row">
      <div class="col-md-3"></div>
      <div class="col-md-6">
        <form>
          <div class="form-group">
            <input
              type="number"
              class="form-control"
              id="phoneNumber"
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
