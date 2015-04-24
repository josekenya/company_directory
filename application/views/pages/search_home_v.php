 <!--searchbar-->
      <div class="jumbotron">
        <h1>Company Logo</h1>
      </div>
<!--end searchbar-->
<!--categories-->
      <div class="row marketing">
        <div class="search-bar">
           <form class="form-inline" role="search">
              <div class="form-group">
                <div class="input-group">
                  <input type="text" size="45" class="form-control input-lg" id="search-item" placeholder="Search">
                </div>
              </div>
              <button type="submit" class="btn btn-primary btn-lg">Go</button>
            </form>
            <p><a id="toggle-settings" href="#">Advanced search</a></p>
        </div>
        
        <div class="row marketing search-categories hide">
          <div class="row">
            <div class="col-md-6">
              <div class="checkbox">
                <label>
                  <input type="checkbox" value="">
                  Category 1
                </label>
              </div>
              <div class="checkbox">
                <label>
                  <input type="checkbox" value="">
                  Category 1
                </label>
              </div>
              <div class="checkbox">
                <label>
                  <input type="checkbox" value="">
                  Category 1
                </label>
              </div>
              <div class="checkbox">
                <label>
                  <input type="checkbox" value="">
                  Category 1
                </label>
              </div>

            </div>
            <div class="col-md-6">

                <div class="checkbox">
                <label>
                  <input type="checkbox" value="">
                  Category 1
                </label>
              </div>
              <div class="checkbox">
                <label>
                  <input type="checkbox" value="">
                  Category 1
                </label>
              </div>
              <div class="checkbox">
                <label>
                  <input type="checkbox" value="">
                  Category 1
                </label>
              </div>
              <div class="checkbox">
                <label>
                  <input type="checkbox" value="">
                  Category 1
                </label>
              </div>

            </div>
          </div>
        </div>
      </div>
  <!--end categories-->
   <!--login modal-->
    <div class="modal fade" id="myLogin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">Login</h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" role="form">
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-3 control-label">Email</label>
                            <div class="col-sm-6">
                                <input type="email" class="form-control" id="inputEmail3" placeholder="Email" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-3 control-label">Password</label>
                            <div class="col-sm-6">
                                <input type="password" class="form-control" id="inputPassword3" placeholder="Password" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <div class="checkbox">
                                    <label class="">
                                        <input type="checkbox" class="">Remember me</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group last">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-success btn-sm">Sign in</button>
                                <button type="reset" class="btn btn-default btn-sm">Reset</button>
                            </div>
                        </div>
                </form>
                <p><a href="#">Forgot password?</a></p>
            </div>
            <div class="modal-footer">
            </div>
          </div>
        </div>
    </div>
  <!--sign up modal-->
    <div class="modal fade" id="mySignup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">Sign Up</h4>
            </div>
            <div class="modal-body">
                
                <form class="form-horizontal" role="form">
                        <div class="form-group">
                            <label for="firstname" class="col-sm-3 control-label">First Name</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="first-name" id="first-name" placeholder="Email" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="lastname" class="col-sm-3 control-label">Last Name</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Password" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-sm-3 control-label">Email</label>
                            <div class="col-sm-6">
                                <input type="email" class="form-control" name="email" id="email" placeholder="Password" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="username" class="col-sm-3 control-label">Username</label>
                            <div class="col-sm-6">
                                <input type="password" class="form-control" name="username" id="username" placeholder="Password" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password" class="col-sm-3 control-label">Password</label>
                            <div class="col-sm-6">
                                <input type="password" class="form-control" name="password" id="password" placeholder="Password" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <div class="checkbox">
                                    <label class="">
                                        <input type="checkbox" class="">Agree to <a href="#">Terms of Use</a></label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group last">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-success btn-sm">Sign in</button>
                                <button type="reset" class="btn btn-default btn-sm">Reset</button>
                            </div>
                        </div>
                </form>

            </div>
            <div class="modal-footer">
              
            </div>
          </div>
        </div>
    </div>