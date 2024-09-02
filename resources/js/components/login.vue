<template>
  <div class="form">
    <h1 class="logo">
      <img src="/public/login (1).png" alt="Foo Co.: Where everyone can fizz the buzz" />
    </h1>
    <form @submit.prevent="onSubmit">
      <div class="form-group">
        <div class="form-floating mb-3">
          <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
          <label id="emailid" for="floatingInput">Email address</label>
        </div>
      </div>
      <div class="form-group">
        <div class="form-floating">
          <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
          <label id="passwordid" for="floatingPassword">Password</label>
        </div>
      </div>
      <br>
      <div class="form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1">
        <label class="form-check-label" for="exampleCheck1">Remember me</label>
      </div>
      <br>
      <div class="btn-container">
        <button type="submit" class="btn btn-success">Login</button>
      </div>
      <br>
      <div class="register-link">
        <p>New to the project? <a @click="register">Sign up</a></p>
      </div>
    </form>
  </div>
</template>

<script>
export default {
  methods: {
    register() {
      this.$router.push('/register');
    },
    onSubmit() {
      this.$router.push('/todo');
    },
  }
}
</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap');

.form {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  height: 100vh;
  font-family: "IBM Plex Sans", sans-serif;
}

.form-control {
  width: 400px; /* Reduced width */
}

.btn-container {
  display: flex;
  justify-content: center;
  width: 100%;
}

.btn {
  width: 400px; /* Reduced width */
}

.register-link {
  text-align: center;
  margin-top: 10px;
}

.register-link a {
  color: #007bff;
  cursor: pointer;
  text-decoration: none;
}

.register-link a:hover {
  text-decoration: underline;
}

#emailid, #passwordid, .form-check-label {
  font-size: small;
}

img {
  width: 150px;
  height: 150px;
  margin-bottom: 20px;
}
</style>
