<template>
    <div class="form">
      <h1 class="logo">
        <img src="/public/login (1).png" alt="Foo Co.: Where everyone can fizz the buzz" />
      </h1>
      <form @submit.prevent="onSubmit">
        <div class="form-group">
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingName" placeholder="Full Name">
            <label id="fn-label" for="floatingName">Full Name</label>
          </div>
        </div>
        <div class="form-group">
          <div class="form-floating mb-3">
            <input type="email" class="form-control" id="floatingEmail" placeholder="name@example.com">
            <label id="fe-label" for="floatingEmail">Email address</label>
          </div>
        </div>
        <div class="form-group">
          <div class="form-floating mb-3">
            <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
            <label id="fp-label" for="floatingPassword">Password</label>
          </div>
        </div>
        <div class="form-group">
          <div class="form-floating mb-3">
            <input type="password" class="form-control" id="floatingConfirmPassword" placeholder="Confirm Password">
            <label id="fcp-label" for="floatingConfirmPassword">Confirm Password</label>
          </div>
        </div>
        <button type="submit" class="btn btn-success">Sign Up</button>
      </form>
    </div>
  </template>
  
  <script>
  export default {
    methods: {
      onSubmit() {
        this.$router.push('/todo');
      },
    },
  };
  </script>
  
  <style scoped>
  @import url('https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap');
  
  #fp-label, #fcp-label, #fn-label,#fe-label {
  font-size: small;
}
  .form {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    height: 80vh; /* Decreased height */
    font-family: "IBM Plex Sans", sans-serif;
  }
  
  .form-control {
    width: 400px; /* Decreased width */
  }
  
  .btn {
    width: 400px; /* Adjusted to match the form-control width */
  }
  
  .form-group {
    margin-bottom: 15px; /* Added margin to create space between fields */
  }
  
  img {
    width: 150px; /* Decreased size */
    height: 150px; /* Decreased size */
    margin-bottom: 15px; /* Reduced margin */
  }
  </style>
  