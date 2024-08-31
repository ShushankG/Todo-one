<template>
  <div class="form" @submit="onSubmit">
      <h1 class="logo">
          <img src="/public/login (1).png" alt="Foo Co.: Where everyone can fizz the buzz" />
      </h1>
      <form>
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
          <button type="submit" class="btn btn-success">Login</button>
      </form>
  </div>
  </template>
  
  <script>
  export default {
      data() {
          return {
 
          }
      },
      methods: {
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
      flex-direction: column; /* Stack children vertically */
      justify-content: center;
      align-items: center;
      height: 100vh;
      font-family: "IBM Plex Sans", sans-serif;
  }
  
  .form-control {
      width: 500px;
  }
  
  .btn {
      width: 500px;
  }
  
  #emailid {
      font-size: small;
  }
  
  #passwordid {
      font-size: small;
  }
  
  .form-check-label {
      font-size: small;
  }
  
  img {
      width: 200px;
      height: 200px;
      margin-bottom: 20px; /* Add space between the image and form */
  }
  </style>
  