<div class="container-fluid h-100">
  <div class="row align-items-center h-100">
    <div class="col-12 col-lg-8 p-5 my-5" id="headerDet">
      <h2 class="text-center mb-4">Get Started on Assurance Diapers</h2>
      <form class="">
        <div class="form-group">
          <label for="exampleInputUsername">Username</label>
          <input
            type="text"
            class="form-control"
            id="exampleInputUsername"
            aria-describedby="usernameHelp"
            placeholder="e.g: bose"
          />
          <small id="usernameHelp" class="form-text text-muted"
            >Enter a unique username in small letters without space.</small
          >
        </div>
        <div class="form-group">
          <label for="exampleInputFName">Full Name</label>
          <input
            type="text"
            class="form-control"
            id="exampleInputFName"
            aria-describedby="fNameHelp"
            placeholder="e.g: Bose Adebayo"
          />
        </div>
        <div class="form-row">
          <div class="col-12 col-lg-6 pr-lg-4 mb-4 mb-lg-0">
            <label for="exampleInputPassword1">Password</label>
            <input
              type="password"
              class="form-control"
              id="exampleInputPassword1"
              placeholder="Password"
            />
          </div>
          <div class="col-12 col-lg-6 pl-lg-4">
            <label for="exampleInputPassword2">confirm Password</label>
            <input
              type="password"
              class="form-control"
              id="exampleInputPassword2"
              placeholder="Retype Password"
            />
          </div>
        </div>

        <small id="usernameHelp" class="form-text text-muted mt-1"
          >Password must contain a number and be at least 6 characters
          long</small
        >
        <button type="submit" class="btn btn-success btn-lg w-100 my-2">
          Go Ahead
        </button>
        <a
          href="./login"
          class="btn btn-white text-success d-lg-none w-100 my-2"
        >
          Login</a
        >
      </form>
    </div>
    <div class="col-12 col-lg-4 d-none d-lg-block bg-success h-100 w-100">
      <div class="row align-items-center h-100">
        <div class="col text-center text-white p-5">
          <h2 class="text-white">Hello Friend!</h2>
          <p>
            Register, to allow you order your diapers from our online store
          </p>
          Already have an account?<br />
          <a href="./login" class="btn btn-lg text-success bg-white px-5">
            login
          </a>
        </div>
      </div>
    </div>
  </div>
</div>
