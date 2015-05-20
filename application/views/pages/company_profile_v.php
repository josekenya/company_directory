             <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Profile Settings
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <!--accordion-->
                            <div class="panel-group" id="accordion">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#home">Basic Information</a>
                                        </h4>
                                    </div>
                                    <div id="home" class="panel-collapse collapse in">
                                        <div class="panel-body">
                                        <div class="row">
                                        <div class="col-sm-3"></div>
                                        <div class=" col-sm-3"> 
                                         <form action="<?php echo base_url('company/add_logo'); ?>" id="uploadLogo" class="dropzone">
                                           <input type="hidden" name="company-id" value="<?php echo $company['id']; ?>"> 
                                         </form> 

                                        </div>
                                        <div class="col-sm-2">
                                        <div class="logo-img-container">
                                            <div>
                                                <?php
                                                  if($company['c_logo']==null)
                                                  {
                                                ?>
                                                <div></div>
                                                <?php
                                                  }
                                                  else
                                                  {
                                                 ?>
                                                 <img src="<?php echo base_url(); ?>assets/images/logos/<?php echo $company['c_logo']; ?>" alt="Upload Logo" id="logo" class="img-thumbnail" >
                                                 <?php
                                                  }
                                                ?>
                                            </div>  
                                        </div> 
                                        </div>

                                    </div>
                                    <br/><br/>
                                    <form class="form-horizontal" id="basic_info_form"  role="form">
                                        <div class="form-group">
                                        <label for="co-name" class="col-sm-3 control-label">Company Name</label>
                                        <div class="col-sm-6">
                                        <input type="text" class="form-control" name="co-name" value="<?php echo ucwords(strtolower($company['c_name'])); ?>" id="co-name"  required>
                                        </div>
                                        </div>
                                        <div class="form-group">
                                        <label for="industry-category" class="col-sm-3 control-label">Industry Category</label>
                                        <div class="col-sm-6">
                                        <select class="form-control" name="industry-category">
                                          <option value="food" <?php echo ($company['c_ind_cat']=="food")? "selected" :" "; ?>>Food and Processing</option>
                                          <option value="manufacture" <?php echo ($company['c_ind_cat']=="manufacture")? "selected" :" "; ?>>Manufacturing</option>
                                          <option value="entertainment" <?php echo ($company['c_ind_cat']=="entertainment")? "selected" :" "; ?>>Entertainment</option>
                                          <option value="technology" <?php echo ($company['c_ind_cat']=="technology")? "selected" :" "; ?>>Technology</option>
                                          <option value="construction" <?php echo ($company['c_ind_cat']=="construction")? "selected" :" "; ?>>Building & Construction</option>
                                          <option value="tourism" <?php echo ($company['c_ind_cat']=="tourism")? "selected" :" "; ?>>Tourism</option>
                                          <option value="hospitality" <?php echo ($company['c_ind_cat']=="hospitality")? "selected" :" "; ?>>Hospitality</option>
                                          <option value="law" <?php echo ($company['c_ind_cat']=="law")? "selected" :" "; ?>>Law</option>
                                          <option value="agriculture" <?php echo ($company['c_ind_cat']=="agriculture")? "selected" :" "; ?>>Agriculture</option>
                                        </select>
                                        <input type="hidden" name="company-id" value="<?php echo $company['id']; ?>">
                                        <input type="hidden" name="user-id" value="<?php echo $this->session->userdata('user_id'); ?>">
                                        </div>
                                        </div>
                            
                                        <div class="form-group last">
                                        <div class="col-sm-offset-3 col-sm-6">
                                        <button type="submit" id="basic_info_btn" class="btn btn-success btn-sm">Save</button>
                                        <button type="reset" class="btn btn-default btn-sm">Reset</button>
                                        </div>
                                        </div>
                                        <div class="show-info-progress hide">Saving....</div>    
                                        <div class="show-info-error alert alert-danger hide"></div>
                                        <div class="show-info-success alert alert-success hide"></div>
                                    </form>  
                                        </div>
                                    </div>
                                </div>
                                <!-- .home-->
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#contact_info">Contact Information</a>
                                        </h4>
                                    </div>
                                    <div id="contact_info" class="panel-collapse collapse">
                                        <div class="panel-body">
                                        <form class="form-horizontal" id="contact_info_form" role="form">
                                            <div class="form-group">
                                            <label for="mobile-number" class="col-sm-3 control-label">Mobile Number</label>
                                            <div class="col-sm-6">
                                            <input type="tel" class="form-control" name="mobile-number" value="<?php echo $company['c_mobile']; ?>" id="mobile-number" placeholder="Mobile Number" required>
                                            </div>
                                            </div>
                                            <div class="form-group">
                                            <label for="tel-number" class="col-sm-3 control-label">Telephone Number</label>
                                            <div class="col-sm-6">
                                            <input type="tel" class="form-control" name="tel-number" value="<?php echo $company['c_tel']; ?>" id="tel-number" placeholder="Telephone Number" >
                                            </div>
                                            </div>
                                            <div class="form-group">
                                            <label for="email" class="col-sm-3 control-label">Company Email</label>
                                            <div class="col-sm-6">
                                            <input type="email" class="form-control" name="email" id="email" value="<?php echo strtolower($company['c_email']); ?>" placeholder="Company Email" required>
                                            <input type="hidden" name="company-id" value="<?php echo $company['id']; ?>">
                                            <input type="hidden" name="user-id" value="<?php echo $this->session->userdata('user_id'); ?>">
                                            </div>
                                            </div>
                                            <div class="form-group last">
                                            <div class="col-sm-offset-3 col-sm-6">
                                            <button type="submit" id="contact_info_btn" class="btn btn-success btn-sm">Save</button>
                                            <button type="reset" class="btn btn-default btn-sm">Reset</button>
                                            </div>
                                            </div>

                                            <div class="show-contact-progress hide">Saving....</div>    
                                            <div class="show-contact-error alert alert-danger hide"></div>
                                            <div class="show-contact-success alert alert-success hide"></div>
                                        </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- .contact-->
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#company_profile">Company Profile</a>
                                        </h4>
                                    </div>
                                    <div id="company_profile" class="panel-collapse collapse">
                                        <div class="panel-body">
                                        <form class="form-horizontal" id="company_profile_form" role="form">
                                            <div class="form-group">
                                            <div class="col-sm-9">
                                            <textarea  class="form-control" name="company-profile" id="company-profile">
                                                <?php echo $company['c_prof']; ?>
                                            </textarea>
                                            <input type="hidden" name="company-id" value="<?php echo $company['id']; ?>">
                                            <input type="hidden" name="user-id" value="<?php echo $this->session->userdata('user_id'); ?>">
                                            </div>
                                            </div>
                                            
                                            <div class="form-group last">
                                            <div class="col-sm-offset-3 col-sm-6">
                                            <button type="submit" id="company_profile_btn" class="btn btn-success btn-sm">Save</button>
                                            <button type="reset" class="btn btn-default btn-sm">Reset</button>
                                            </div>
                                            </div>

                                            <div class="show-prof-progress hide">Saving....</div>    
                                            <div class="show-prof-error alert alert-danger hide"></div>
                                            <div class="show-prof-success alert alert-success hide"></div>
                                        </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- .profile-->
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#company_address">Company Address</a>
                                        </h4>
                                    </div>
                                    <div id="company_address" class="panel-collapse collapse">
                                        <div class="panel-body">
                                        <form class="form-horizontal" id="company_address_form" role="form">
                                            <div class="form-group">
                                            <label for="street-address-1" class="col-sm-3 control-label">Street Address 1</label>
                                            <div class="col-sm-6">
                                            <input type="text" class="form-control" value="<?php echo ucwords(strtolower($company['c_address_1'])); ?>" name="street-address-1" id="street-address-1" placeholder="Street Address 1" required>
                                            </div>
                                            </div>
                                            <div class="form-group">
                                            <label for="street-address-2" class="col-sm-3 control-label">Street Address 2</label>
                                            <div class="col-sm-6">
                                            <input type="text" class="form-control" value="<?php echo ucwords(strtolower($company['c_address_2'])); ?>" name="street-address-2" id="street-address-2" placeholder="Street Address 2 " >
                                            </div>
                                            </div>
                                            <div class="form-group">
                                            <label for="zip-code" class="col-sm-3 control-label">Zip Code</label>
                                            <div class="col-sm-6">
                                            <input type="text" class="form-control" value="<?php echo $company['c_zip']; ?>" name="zip-code" id="zip-code" placeholder="Zip Code" required>

                                            </div>
                                            </div>
                                            <div class="form-group">
                                            <label for="city" class="col-sm-3 control-label">City / Town</label>
                                            <div class="col-sm-6">
                                            
                                             <select class="form-control" name="city" cols="30" required>
                                                <option value=""></option>
                                                <option value="nairobi" <?php echo ($company['c_city']=="nairobi")? "selected" :" "; ?>>Nairobi</option>
                                                <option value="kisumu" <?php echo ($company['c_city']=="kisumu")? "selected" :" "; ?>>Kisumu</option>
                                                <option value="mombasa" <?php echo ($company['c_city']=="mombasa")? "selected" :" "; ?>>Mombasa</option>
                                                <option value="eldoret" <?php echo ($company['c_city']=="eldoret")? "selected" :" "; ?>>Eldoret</option>
                                                <option value="nyeri" <?php echo ($company['c_city']=="nyeri")? "selected" :" "; ?>>Nyeri</option>
                                                <option value="embu" <?php echo ($company['c_city']=="embu")? "selected" :" "; ?>>Embu</option>
                                                <option value="machakos" <?php echo ($company['c_city']=="machakos")? "selected" :" "; ?>>Machakos</option>
                                             </select>
                                            </div>
                                            </div>
                                            <div class="form-group">
                                            <label for="country" class="col-sm-3 control-label">Country</label>
                                            <div class="col-sm-6">
                                            <input type="text" class="form-control" value="<?php echo  ucfirst(strtolower($company['c_country'])); ?>" name="country" id="country" placeholder="Country" required>
                                            <input type="hidden" name="company-id" value="<?php echo $company['id']; ?>">
                                            <input type="hidden" name="user-id" value="<?php echo $this->session->userdata('user_id'); ?>">
                                            </div>
                                            </div>
                                            <div class="form-group last">
                                            <div class="col-sm-offset-3 col-sm-6">
                                            <button type="submit" id="company_address_btn" class="btn btn-success btn-sm">Save</button>
                                            <button type="reset" class="btn btn-default btn-sm">Reset</button>
                                            </div>
                                            </div>

                                            <div class="show-addr-progress hide">Saving....</div>    
                                            <div class="show-addr-error alert alert-danger hide"></div>
                                            <div class="show-addr-success alert alert-success hide"></div>
                                        </form> 
                                        </div>
                                    </div>
                                </div>
                                <!-- .address-->
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#operation_details">Operation Details</a>
                                        </h4>
                                    </div>
                                    <div id="operation_details" class="panel-collapse collapse">
                                        <div class="panel-body">
                                        <form class="form-horizontal" id="operation_details_form" role="form">
                                            <div class="form-group">
                                            <label for="employee-number" class="col-sm-3 control-label">Employee Number</label>
                                           
                                              <label class="checkbox-inline">
                                                <input type="radio" name="employeeNo" value="1" <?php echo ($company['c_emp_no']==1)? "checked" :" "; ?> >
                                                10-20
                                              </label>
                                              <label class="checkbox-inline">
                                                <input type="radio" name="employeeNo" value="2" <?php echo ($company['c_emp_no']==2)? "checked" :" "; ?> >
                                                20-50
                                              </label>
                                              <label class="checkbox-inline">
                                                <input type="radio" name="employeeNo" value="3" <?php echo ($company['c_emp_no']==3)? "checked" :" "; ?> >
                                                50-100
                                              </label>
                                              <label class="checkbox-inline">
                                                <input type="radio" name="employeeNo" value="4" <?php echo ($company['c_emp_no']==4)? "checked" :" "; ?> >
                                                Above 100
                                              </label>
                                          
                                            </div>
                                            <div class="form-group">
                                            <label for="new-password" class="col-sm-3 control-label">Weekdays Business Hours</label>
                                            <div class="col-sm-3">
                                            <input type="time" class="form-control" value="<?php echo $company['c_w_opening']; ?>" name="opening" id="opening" placeholder="--.--AM" >
                                            </div>
                                            <div class="col-sm-3">
                                            <input type="time" class="form-control" value="<?php echo $company['c_w_closing']; ?>" name="closing" id="closing" placeholder="--.--PM" >
                                            </div>
                                            </div>
                                            <div class="form-group">
                                            <label for="confirm-password" class="col-sm-3 control-label">Weekend Business Hours</label>
                                            <div class="col-sm-3">
                                            <input type="time" class="form-control" value="<?php echo $company['c_we_opening']; ?>" name="w-opening" id="w-opening" placeholder="--.--AM" >
                                            </div>
                                            <div class="col-sm-3">
                                            <input type="time" class="form-control" value="<?php echo $company['c_we_opening']; ?>" name="w-closing" id="w-closing" placeholder="--.--PM" >
                                            <input type="hidden" name="company-id" value="<?php echo $company['id']; ?>">
                                            <input type="hidden" name="user-id" value="<?php echo $this->session->userdata('user_id'); ?>">
                                            </div>
                                            </div>
                                            <div class="form-group last">
                                            <div class="col-sm-offset-3 col-sm-6">
                                            <button type="submit" id="operation_details_btn" class="btn btn-success btn-sm">Save</button>
                                            <button type="reset" class="btn btn-default btn-sm">Reset</button>
                                            </div>
                                            </div>

                                            <div class="show-w-progress hide">Saving....</div>    
                                            <div class="show-w-error alert alert-danger hide"></div>
                                            <div class="show-w-success alert alert-success hide"></div>
                                        </form> 
                                        </div>
                                    </div>
                                </div>
                                <!-- .details-->
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#services">Services</a>
                                        </h4>
                                    </div>
                                    <div id="services" class="panel-collapse collapse">
                                        <div class="panel-body">
                                           <div class="col-sm-3">
                                            <span  class="success-status hide label label-success"></span>
                                            <span  class="error-status hide label label-danger"></span>
                                            <ul class="list-inline">
                                            <?php if(is_array($services) && isset($services)) :?>    
                                            <?php foreach ($services as $service) :?>
                                            <li> <?php echo $service['service_name']; ?> <span style="cursor:pointer" class="remove_field label label-danger" data-id="<?php echo $service['service_id']; ?>"> x </span></li>
                                            <?php endforeach ?>
                                            <?php else :?>
                                            <p class="empty_service">No services</p>
                                            <?php endif ?>
                                            </ul>
                                            </div>
                                            <div class="input_fields_wrap">
                                                <div class="col-sm-3">
                                                 <input class="form-control " type="text" class="add_service" placeholder="Press Enter to add service" />
                                                 <input type="hidden" id="company-id" name="company-id" value="<?php echo $company['id']; ?>">
                                                 <label class="error-label hide label-danger">This field cannot be empty</label>
                                                </div>
                                            </div> 
                                        </div>
                                    </div>
                                </div>
                                <!-- .services-->
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#gallery">Gallery</a>
                                        </h4>
                                    </div>
                                    <div id="gallery" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <form  id="uploadGallery" class="dropzone" action="<?php echo base_url('company/add_photo'); ?>" >
                                                        <input type="hidden" name="company-id" id="company-id" value="<?php echo $company['id']; ?>">
                                                    </form>
                                                </div>
                                                <div class="col-sm-6">
                                                
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- .gallery-->
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#messages">Messages <span class="count badge"></a>
                                        </h4>
                                    </div>
                                    <div id="messages" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <div class="row">
                                                    <div class="col-sm-12">
                                                        <input type="hidden" id="msg" value="<?php echo $company['id']; ?>"> 
                                                    </div>
                                                    <!--message inbox-->
                                                    <div class="col-sm-3 col-md-2">
                                                        
                                                    </div>
                                                    <div class="col-sm-9 col-md-10">
                                                        <div class="pull-right"> 
                                                        </div>
                                                    </div>
                                            </div>
                                                <hr>
                                            <div class="row">
                                                    <div class="col-sm-3 col-md-2">
                                                        <hr>
                                                        <ul class="nav nav-pills nav-stacked">
                                                            <li class="active"><a href="#"><span class="count badge pull-right"></span> Inbox </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-sm-9 col-md-10">
                                                        <!-- Nav tabs -->
                                                        <ul class="nav nav-tabs">
                                                            <li class="active"><a href="#primary" data-toggle="tab"><span class="glyphicon glyphicon-inbox">
                                                            </span>Primary</a></li>
                                                        </ul>
                                                        <!-- Tab panes -->
                                                        <div class="tab-content">
                                                            <div class="tab-pane fade in active" id="primary">
                                                                <div class="list-group">
                                                                    
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- .messages-->
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#publish">Publish</a>
                                        </h4>
                                    </div>
                                    <div id="publish" class="panel-collapse collapse">
                                        <div class="panel-body">
                                        <form class="form-horizontal" id="publish_form" role="form">
                                            <div class="form-group">
                                            <label for="old-password" class="col-sm-3 control-label">Choose Template</label>
                                            <div class="col-sm-6">
                                            <input type="radio" name="templateRadio" id="optionsRadios1" value="basic" checked>
                                             Basic
                                            </div>
                                            <div class="col-sm-6">
                            
                                            <input type="hidden" name="company-id" value="<?php echo $company['id']; ?>">
                                            <input type="hidden" name="user-id" value="<?php echo $this->session->userdata('user_id'); ?>">
                                            </div>
                                            </div>
                                            <div class="form-group last">
                                            <div class="col-sm-offset-3 col-sm-6">
                                            <button type="submit" id="publish_btn" class="btn btn-success btn-sm">Publish</button>
                                            <button type="reset" class="btn btn-default btn-sm">Reset</button>
                                            </div>
                                            </div>

                                            <div class="show-p-progress hide">Saving....</div>    
                                            <div class="show-p-error alert alert-danger hide"></div>
                                            <div class="show-p-success alert alert-success hide"></div>
                                        </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- .publish-->

                            </div>
                            <!-- .accordion-->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-8 -->
            </div>
            <!-- /.row -->
           <!--Message View-->
            <div class="modal fade" id="myMessage" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title" id="myModalLabel">New Message</h4>
                    </div>
                    <div class="modal-body">
                        <p>From: <label class="sender"></label> </p>
                        <p ><strong>RE:</strong> Customer Queries</p>
                        <div class="message">
                        </div>
                    </div>
                    <div class="modal-footer">
                    </div>
                  </div>
                </div>
            </div>
        