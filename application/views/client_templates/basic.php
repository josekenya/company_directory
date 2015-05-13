<!--categories-->
      <div class="row marketing">
        <div class="row">
          <div class="col-md-12">
            <?php 
            if($client['c_logo'] == null)
            {
            ?>
            <img src="<?php echo base_url()?>assets/images/logos/logo-holder.png" style="display:inline-block; width:100px; " alt="..." id="logo-img" class="img-rounded">
            <?php  
            }else{
            ?>
            <img src="<?php echo base_url()?>assets/images/logos/<?php echo $client['c_logo']; ?>" style="display:inline-block; width:100px; " alt="..." id="logo-img" class="img-rounded">
            <?php
            }
            ?>
              
              <h4 class="modal-title" style="display:inline-block; margin-left:30px;" id="co-name"><?php echo $client['c_name']; ?></h4>
          </div>
        </div>
        <br/>
        <br/>
        <div class="row">
                <div class="col-md-12">
        
                   <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                          <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                          <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                          <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                        </ol>

                        <!-- Wrapper for slides -->
                        <div class="carousel-inner" role="listbox">
                          <div class="item active">
                            <img src="/company_directory/assets/images/logos/logo-holder.png" alt="...">
                            <div class="carousel-caption">
                              Image I here.
                            </div>
                          </div>
                          <div class="item">
                            <img src="/company_directory/assets/images/logos/logo-holder.png" alt="...">
                            <div class="carousel-caption">
                              Image 2 here
                            </div>
                          </div>
                          ...
                        </div>

                        <!-- Controls -->
                        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                          <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                          <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                          <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                          <span class="sr-only">Next</span>
                        </a>
                    </div>

                </div>
              </div>
              <br/>
              <!--company info-->
              <div class="row">
                <!--about-->
                <div class="col-md-8">
                  <h4>About</h4>
                  <div class="profile">
                    <?php 

                       if($client['c_prof'] == null)
                          {
                          ?>
                         <p>No Content</p>
                          <?php  
                          }else{
                          
                          }
                     ?>
                  </div>
                </div>
                <!--details-->
                <div class="col-md-4">
                  <h4> Business Hours </h4>
                  <label>Weekdays</label> : <label class="opening"><?php echo $client['c_w_opening']; ?> </label> to <label class="closing"><?php echo $client['c_w_closing']; ?> </label>
                  <br/>
                  <label>Weekends</label> :<?php echo $client['c_we_opening']; ?> <label class="w-opening"></label> to <label class="w-closing"><?php echo $client['c_we_closing']; ?></label>
                </div>
              </div>
              <br/>
              <!--contact-->
              <div class="row">
                <div class="col-md-3">
                  <address>
                    <label class="street" ><?php echo $client['c_address_1']; ?></label><br>
                    <label class="city"><?php echo $client['c_city']; ?></label>,<label class="country"><?php echo $client['c_country']; ?></label> <label class="zip"><?php echo $client['c_zip']; ?><br>
                    <abbr title="Phone">M:</abbr> <label class="mobile"><?php echo $client['c_mobile']; ?></label></br>
                    <abbr title="Phone">T:</abbr> <label class="tel"><?php echo $client['c_tel']; ?></label> </br>
                    <a href="mailto:#"> <label class="email"><?php echo $client['c_email']; ?></label></a>
                  </address>
                </div>
                <div class="col-md-9">
                  <h6 class="col-sm-offset-3 ">Send us a message</h6>
                 <form class="form-horizontal" id="message_form" role="form">
                        <div class="form-group">
                    
                            <div class="col-sm-offset-3 col-sm-9">
                                <input type="email" class="form-control" name="email" id="email" placeholder="your email" required>
                                <input type="hidden" class="form-control" id="co-id" name="co-id" value="<?php echo $client['id']; ?>" >
                            </div>
                        </div>
                        <div class="form-group">
  
                            <div class="col-sm-offset-3 col-sm-9">
                                <textarea cols="30"  id="message" name="message" class="form-control" required>
                                </textarea>
                            </div>
                        </div>
                      
                        <div class="form-group last">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" id="message_btn" class="btn btn-success btn-sm">send</button>
                                <button type="reset" class="btn btn-default btn-sm">Reset</button>
                            </div>
                        </div>
                </form>
                <div class="show-progress hide">Please Wait....</div>    
                <div class="show-error alert alert-danger hide"></div>
                <div class="show-success alert alert-success hide"></div>
                </div>
              </div>
            </div>
        
      </div>
        
      <div class="row marketing search-categories ">
        <div class="row">
          <div class="col-md-10">
          
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
              <form class="form-horizontal" id="login_form" role="form">
                        <div class="form-group">
                            <label for="identity" class="col-sm-3 control-label">Email</label>
                            <div class="col-sm-6">
                                <input type="email" class="form-control" name="identity" id="identity" placeholder="Email" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password" class="col-sm-3 control-label">Password</label>
                            <div class="col-sm-6">
                                <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <div class="checkbox">
                                    <label class="">
                                        <input type="checkbox" name="remember" class="">Remember me</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group last">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" id="login_btn" class="btn btn-success btn-sm">Login</button>
                                <button type="reset" class="btn btn-default btn-sm">Reset</button>
                            </div>
                        </div>
                </form>
                <p><a href="#">Forgot password?</a></p>
                <div class="show-progress hide">Please Wait....</div>    
                <div class="show-error alert alert-danger hide"></div>
                <div class="show-success alert alert-success hide"></div>
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
                
                <form id="create_user_form"class="form-horizontal" role="form">
                        <div class="form-group">
                            <label for="first-name" class="col-sm-3 control-label">First Name</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="first-name" id="first-name" placeholder="First Name" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="last-name" class="col-sm-3 control-label">Last Name</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="last-name" id="last-name" placeholder="Last Name" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-sm-3 control-label">Email</label>
                            <div class="col-sm-6">
                                <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="phone" class="col-sm-3 control-label">Phone Number</label>
                            <div class="col-sm-6">
                                <input type="tel" class="form-control" name="phone" id="phone" placeholder="Phone Number" required>
                            </div>
                        </div>
                
                        <div class="form-group">
                            <label for="password" class="col-sm-3 control-label">Password</label>
                            <div class="col-sm-6">
                                <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password-confirm" class="col-sm-3 control-label">Confirm Password</label>
                            <div class="col-sm-6">
                                <input type="password" class="form-control" name="password-confirm" id="password-confirm" placeholder="Confirm Password" required>
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
                                <button type="submit" id="submit_user" class="btn btn-success btn-sm">Sign Up</button>
                                <button type="reset" class="btn btn-default btn-sm">Reset</button>
                            </div>
                        </div>
                </form>
            <div class="show-progress hide">Please Wait....</div>    
            <div class="show-error alert alert-danger hide"></div>
            <div class="show-success alert alert-success hide"></div>
            </div>
            <div class="modal-footer">
              
            </div>
          </div>
        </div>
    </div>