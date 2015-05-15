 <!--searchbar-->
  <div class="row marketing">
        <div class="search-bar">    
            <?php echo form_open(base_url('/pages/search'),array('class' =>'form-inline')); ?>
              <div class="form-group">
                <div class="input-group">
                  <?php echo form_input(array('name' => 'q','size'=>'45','class'=>'form-control input-lg','id' => 'search-box', 'value' => $search_terms)); ?>
                </div>
              </div>
              <button type="submit" class="btn btn-primary btn-lg">Go</button>
              <br/>
              <p>Advance Search</p>
              <label>Category</label>
              
              <div class="form-group">
                <div class="input-group">
                 <select class="form-control" name="ct" cols="30">
                    <option value=""></option>
                    <option value="food" <?php echo ($categories=="food")? "selected" :" "; ?>>Food and Processing</option>
                    <option value="manufacture" <?php echo ($categories=="manufacture")? "selected" :" "; ?>>Manufacturing</option>
                    <option value="entertainment" <?php echo ($categories=="entertainment")? "selected" :" "; ?>>Entertainment</option>
                    <option value="technology" <?php echo ($categories=="technology")? "selected" :" "; ?>>Technology</option>
                    <option value="construction" <?php echo ($categories=="building")? "selected" :" "; ?>>Building & Construction</option>
                    <option value="tourism" <?php echo ($categories=="tourism")? "selected" :" "; ?>>Tourism</option>
                    <option value="hospitality" <?php echo ($categories=="hospitality")? "selected" :" "; ?>>Hospitality</option>
                    <option value="law" <?php echo ($categories=="law")? "selected" :" "; ?>>Law</option>
                    <option value="agriculture" <?php echo ($categories=="agriculture")? "selected" :" "; ?>>Agriculture</option>
                 </select>
                </div>
              </div>
              <label>City</label>
              <div class="form-group">
                <div class="input-group">
                  <select class="form-control" name="cy" cols="30">
                    <option value=""></option>
                    <option value="nairobi" <?php echo ($cities=="nairobi")? "selected" :" "; ?>>Nairobi</option>
                    <option value="kisumu" <?php echo ($cities=="kisumu")? "selected" :" "; ?>>Kisumu</option>
                    <option value="mombasa" <?php echo ($cities=="mombasa")? "selected" :" "; ?>>Mombasa</option>
                    <option value="eldoret" <?php echo ($cities=="eldoret")? "selected" :" "; ?>>Eldoret</option>
                    <option value="nyeri" <?php echo ($cities=="nyeri")? "selected" :" "; ?>>Nyeri</option>
                    <option value="embu" <?php echo ($cities=="embu")? "selected" :" "; ?>>Embu</option>
                    <option value="machakos" <?php echo ($cities=="machakos")? "selected" :" "; ?>>Machakos</option>
                  </select>
                </div>
              </div>
              <?php echo form_close(); ?>
        </div>
  </div>
  <!--end searchbar-->
  <!--search results-->
  <div class="row marketing search-categories ">
      <div class="row">
          <div class="col-md-12">
              <?php if ( ! is_null($results)): ?>
                <?php if (count($results)): ?>
                   <hr/>
                  <p>Showing search results for '<?php echo $search_terms; ?>' (<?php echo $first_result; ?>&ndash;<?php echo $last_result; ?> of <?php echo $total_results; ?>):</p>
                   <hr/>
                  
                  <ul class="list-unstyled">
                  <?php foreach ($results as $result): ?>
                    <li><?php if($result->c_logo == null){  ?><img src="/company_directory/assets/images/logos/logo-holder.png" alt="..." style="width:80px;" class="img-rounded"><?php }else{ ?><img src="/company_directory/assets/images/logos/<?php echo $result->c_logo; ?>" alt="..." style="width:80px;" class="img-rounded"> <?php } ?> <a href="<?php echo base_url('/pages/template/$result->c_name'); ?>"><?php echo search_highlight($result->c_name, $search_terms); ?></a>    <a style="cursor:pointer" data-id="<?php echo $result->id; ?>" target="_blank" href="<?php echo base_url(); ?>posts/<?php echo url_title($result->c_name,'-',true); ?>" class="badger label label-danger">Preview</a><br /><?php echo search_extract($result->c_prof, $search_terms); ?></li>
                  <?php endforeach ?>
                  </ul>
                  <hr/>
                  
                  <?php echo $this->pagination->create_links(); ?>
                  
                <?php else: ?>
                  <p><em>There are no results for your query.</em></p>
                <?php endif ?>
              <?php endif ?>

              <?php if (isset($search_time)): ?>
                <p>Search time: <?php echo $search_time; ?></p>
              <?php endif ?>
          </div>
      </div>
  </div>
  <!--end search results-->
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