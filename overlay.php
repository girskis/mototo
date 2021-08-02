<!--Login-Form -->
<div class="modal fade" id="loginform">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title">Login</h3>
      </div>
      <div class="modal-body">

          <div class="login_wrap">
		  <div class="row">
            <div class="col-md-12 col-sm-12">
              <form action="" method="POST">
                <div class="form-group">
                  <input type="email" class="form-control" placeholder="Email address*" name="email" required>
                </div>
                <div class="form-group">
                  <input type="password" class="form-control" placeholder="Password*" name="password" required>
                </div>

                <div class="form-group">
                  <input type="submit" name="submitlogin" value="Login" class="btn btn-block">
                </div>
              </form>
            </div>

          </div>
        </div>
      </div>
      <div class="modal-footer text-center">
        <p>Don't have an account? <a href="#signupform" data-toggle="modal" data-dismiss="modal">Register here!</a></p></br>
      </div>
    </div>
  </div>
</div>
<!--/Login-Form -->

<!--Register-Form -->
<div class="modal fade" id="signupform">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title">Register</h3>
      </div>
      <div class="modal-body">

          <div class="signup_wrap">
		  <div class="row">
            <div class="col-md-12 col-sm-12">
              <form action="" method="POST">
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Full Name" name="name" required>
                </div>
                <div class="form-group">
                  <input type="email" class="form-control" placeholder="Email Address" name="email" required>
                </div>
                <div class="form-group">
                  <input type="password" class="form-control" placeholder="Password" name="password" required>
                </div>
                <div class="form-group">
                  <input type="submit" value="Register" name="submitregister" class="btn btn-block">
                </div>
              </form>
            </div>

          </div>
        </div>
      </div>
      <div class="modal-footer text-center">
        <p>Already got an account? <a href="#loginform" data-toggle="modal" data-dismiss="modal">Login here!</a></p>
      </div>
    </div>
  </div>
</div>
<!--/Register-Form -->