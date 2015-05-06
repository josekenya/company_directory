             <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Profile Settings
                            <?php echo $company['company_id']; ?>
                            <?php //foreach ($company as $co) {
                                # code...
                                //echo $co['company_id'];
                            //}  ?>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs">
                                <li class="active">
                                    <a href="#home" data-toggle="tab">Basic Info</a>
                                </li>
                                <li>
                                    <a href="#contact_info" data-toggle="tab">Contact Info</a>
                                </li>
                                <li>
                                    <a href="#company_profile" data-toggle="tab">Company Profile</a>
                                </li>
                                <li>
                                    <a href="#company_address" data-toggle="tab">Company Address</a>
                                </li>
                                <li>
                                    <a href="#operation_details" data-toggle="tab">Operation Details</a>
                                </li>
                                <li>
                                    <a href="#services" data-toggle="tab">Services</a>
                                </li>
                                <li>
                                    <a href="#gallery" data-toggle="tab">Gallery</a>
                                </li>
                                <li>
                                    <a href="#messages" data-toggle="tab">Messages <span class="badge"></span></a>
                                </li>
                                <li>
                                    <a href="#publish" data-toggle="tab">Publish</a>
                                </li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="home">
                                    <h4> </h4>
                                    <form class="form-horizontal" id="basic_info_form"  role="form">
                                        <div class="form-group">
                                        <label for="co-name" class="col-sm-3 control-label">Company Name</label>
                                        <div class="col-sm-6">
                                        <input type="text" class="form-control" name="co-name" value="<?php echo ucwords(strtolower($company['company_name'])); ?>" id="co-name"  required>
                                        </div>
                                        </div>
                                        <div class="form-group">
                                        <label for="industry-category" class="col-sm-3 control-label">Industry Category</label>
                                        <div class="col-sm-6">
                                        <select class="form-control" name="industry-category">
                                          <option value="1" <?php echo ($company['industry_category']==2)? "selected" :" "; ?>>Food and Processing</option>
                                          <option value="2" <?php echo ($company['industry_category']==2)? "selected" :" "; ?>>Manufacturing</option>
                                          <option value="3" <?php echo ($company['industry_category']==3)? "selected" :" "; ?>>Entertainment</option>
                                          <option value="4" <?php echo ($company['industry_category']==4)? "selected" :" "; ?>>Technology</option>
                                          <option value="5" <?php echo ($company['industry_category']==5)? "selected" :" "; ?>>Building & Construction</option>
                                          <option value="6" <?php echo ($company['industry_category']==6)? "selected" :" "; ?>>Tourism</option>
                                          <option value="7" <?php echo ($company['industry_category']==7)? "selected" :" "; ?>>Hospitality</option>
                                          <option value="8" <?php echo ($company['industry_category']==8)? "selected" :" "; ?>>Law</option>
                                          <option value="9" <?php echo ($company['industry_category']==9)? "selected" :" "; ?>>Agriculture</option>
                                        </select>
                                        <input type="hidden" name="company-id" value="<?php echo $company['company_id']; ?>">
                                        <input type="hidden" name="user-id" value="<?php echo $this->session->userdata('user_id'); ?>">
                                        </div>
                                        </div>
                            
                                        <div class="form-group last">
                                        <div class="col-sm-offset-3 col-sm-6">
                                        <button type="submit" id="basic_info_btn" class="btn btn-success btn-sm">Save</button>
                                        <button type="reset" class="btn btn-default btn-sm">Reset</button>
                                        </div>
                                        </div>
                                        <div class="show-progress hide">Saving....</div>    
                                        <div class="show-error alert alert-danger hide"></div>
                                        <div class="show-success alert alert-success hide"></div>
                                    </form>
                                </div>
                                <div class="tab-pane fade" id="contact_info">
                                    <h4></h4>
                                    <form class="form-horizontal" id="contact_info_form" role="form">
                                        <div class="form-group">
                                        <label for="mobile-number" class="col-sm-3 control-label">Mobile Number</label>
                                        <div class="col-sm-6">
                                        <input type="tel" class="form-control" name="mobile-number" value="<?php echo $company['company_mobile_number']; ?>" id="mobile-number" placeholder="Mobile Number" required>
                                        </div>
                                        </div>
                                        <div class="form-group">
                                        <label for="tel-number" class="col-sm-3 control-label">Telephone Number</label>
                                        <div class="col-sm-6">
                                        <input type="tel" class="form-control" name="tel-number" value="<?php echo $company['company_telephone_number']; ?>" id="tel-number" placeholder="Telephone Number" >
                                        </div>
                                        </div>
                                        <div class="form-group">
                                        <label for="email" class="col-sm-3 control-label">Company Email</label>
                                        <div class="col-sm-6">
                                        <input type="email" class="form-control" name="email" id="email" value="<?php echo strtolower($company['company_email']); ?>" placeholder="Company Email" required>
                                        <input type="hidden" name="company-id" value="<?php echo $company['company_id']; ?>">
                                        <input type="hidden" name="user-id" value="<?php echo $this->session->userdata('user_id'); ?>">
                                        </div>
                                        </div>
                                        <div class="form-group last">
                                        <div class="col-sm-offset-3 col-sm-6">
                                        <button type="submit" id="contact_info_btn" class="btn btn-success btn-sm">Save</button>
                                        <button type="reset" class="btn btn-default btn-sm">Reset</button>
                                        </div>
                                        </div>

                                        <div class="show-progress hide">Saving....</div>    
                                        <div class="show-error alert alert-danger hide"></div>
                                        <div class="show-success alert alert-success hide"></div>
                                    </form>
                                </div>
                                <div class="tab-pane fade" id="company_profile">
                                    <h4></h4>
                                    <form class="form-horizontal" id="company_profile_form" role="form">
                                        <div class="form-group">
                                        <div class="col-sm-9">
                                        <textarea  class="form-control" name="company-profile" id="company-profile">
                                            <?php echo $company['company_profile']; ?>
                                        </textarea>
                                        <input type="hidden" name="company-id" value="<?php echo $company['company_id']; ?>">
                                        <input type="hidden" name="user-id" value="<?php echo $this->session->userdata('user_id'); ?>">
                                        </div>
                                        </div>
                                        
                                        <div class="form-group last">
                                        <div class="col-sm-offset-3 col-sm-6">
                                        <button type="submit" id="company_profile_btn" class="btn btn-success btn-sm">Save</button>
                                        <button type="reset" class="btn btn-default btn-sm">Reset</button>
                                        </div>
                                        </div>

                                        <div class="show-progress hide">Saving....</div>    
                                        <div class="show-error alert alert-danger hide"></div>
                                        <div class="show-success alert alert-success hide"></div>
                                    </form>
                                </div>
                                <div class="tab-pane fade" id="company_address">
                                    <h4></h4>
                                    <form class="form-horizontal" id="company_address_form" role="form">
                                        <div class="form-group">
                                        <label for="street-address-1" class="col-sm-3 control-label">Street Address 1</label>
                                        <div class="col-sm-6">
                                        <input type="text" class="form-control" value="<?php echo ucwords(strtolower($company['street_address'])); ?>" name="street-address-1" id="street-address-1" placeholder="Street Address 1" required>
                                        </div>
                                        </div>
                                        <div class="form-group">
                                        <label for="street-address-2" class="col-sm-3 control-label">Street Address 2</label>
                                        <div class="col-sm-6">
                                        <input type="text" class="form-control" value="<?php echo ucwords(strtolower($company['street_address_2'])); ?>" name="street-address-2" id="street-address-2" placeholder="Street Address 2 " >
                                        </div>
                                        </div>
                                        <div class="form-group">
                                        <label for="zip-code" class="col-sm-3 control-label">Zip Code</label>
                                        <div class="col-sm-6">
                                        <input type="text" class="form-control" value="<?php echo $company['zip_code']; ?>" name="zip-code" id="zip-code" placeholder="Zip Code" required>

                                        </div>
                                        </div>
                                        <div class="form-group">
                                        <label for="city" class="col-sm-3 control-label">City / Town</label>
                                        <div class="col-sm-6">
                                        <input type="text" class="form-control" value="<?php echo ucfirst(strtolower($company['city'])); ?>" name="city" id="city" placeholder="City / Town" required>
                                        </div>
                                        </div>
                                        <div class="form-group">
                                        <label for="country" class="col-sm-3 control-label">Country</label>
                                        <div class="col-sm-6">
                                        <input type="text" class="form-control" value="<?php echo  ucfirst(strtolower($company['country'])); ?>" name="country" id="country" placeholder="Country" required>
                                        <input type="hidden" name="company-id" value="<?php echo $company['company_id']; ?>">
                                        <input type="hidden" name="user-id" value="<?php echo $this->session->userdata('user_id'); ?>">
                                        </div>
                                        </div>
                                        <div class="form-group last">
                                        <div class="col-sm-offset-3 col-sm-6">
                                        <button type="submit" id="company_address_btn" class="btn btn-success btn-sm">Save</button>
                                        <button type="reset" class="btn btn-default btn-sm">Reset</button>
                                        </div>
                                        </div>

                                        <div class="show-progress hide">Saving....</div>    
                                        <div class="show-error alert alert-danger hide"></div>
                                        <div class="show-success alert alert-success hide"></div>
                                    </form>
                                </div>
                                <div class="tab-pane fade" id="operation_details">
                                    <h4></h4>
                                    <form class="form-horizontal" id="operation_details_form" role="form">
                                        <div class="form-group">
                                        <label for="employee-number" class="col-sm-3 control-label">Employee Number</label>
                                       
                                          <label class="checkbox-inline">
                                            <input type="radio" name="employeeNo" value="1" <?php echo ($company['employee_number']==1)? "checked" :" "; ?> >
                                            10-20
                                          </label>
                                          <label class="checkbox-inline">
                                            <input type="radio" name="employeeNo" value="2" <?php echo ($company['employee_number']==2)? "checked" :" "; ?> >
                                            20-50
                                          </label>
                                          <label class="checkbox-inline">
                                            <input type="radio" name="employeeNo" value="3" <?php echo ($company['employee_number']==3)? "checked" :" "; ?> >
                                            50-100
                                          </label>
                                          <label class="checkbox-inline">
                                            <input type="radio" name="employeeNo" value="4" <?php echo ($company['employee_number']==4)? "checked" :" "; ?> >
                                            Above 100
                                          </label>
                                      
                                        </div>
                                        <div class="form-group">
                                        <label for="new-password" class="col-sm-3 control-label">Weekdays Business Hours</label>
                                        <div class="col-sm-3">
                                        <input type="time" class="form-control" value="<?php echo $company['opening']; ?>" name="opening" id="opening" placeholder="--.--AM" >
                                        </div>
                                        <div class="col-sm-3">
                                        <input type="time" class="form-control" value="<?php echo $company['closing']; ?>" name="closing" id="closing" placeholder="--.--PM" >
                                        </div>
                                        </div>
                                        <div class="form-group">
                                        <label for="confirm-password" class="col-sm-3 control-label">Weekend Business Hours</label>
                                        <div class="col-sm-3">
                                        <input type="time" class="form-control" value="<?php echo $company['w_opening']; ?>" name="w-opening" id="w-opening" placeholder="--.--AM" >
                                        </div>
                                        <div class="col-sm-3">
                                        <input type="time" class="form-control" value="<?php echo $company['w_opening']; ?>" name="w-closing" id="w-closing" placeholder="--.--PM" >
                                        <input type="hidden" name="company-id" value="<?php echo $company['company_id']; ?>">
                                        <input type="hidden" name="user-id" value="<?php echo $this->session->userdata('user_id'); ?>">
                                        </div>
                                        </div>
                                        <div class="form-group last">
                                        <div class="col-sm-offset-3 col-sm-6">
                                        <button type="submit" id="operation_details_btn" class="btn btn-success btn-sm">Save</button>
                                        <button type="reset" class="btn btn-default btn-sm">Reset</button>
                                        </div>
                                        </div>

                                        <div class="show-progress hide">Saving....</div>    
                                        <div class="show-error alert alert-danger hide"></div>
                                        <div class="show-success alert alert-success hide"></div>
                                    </form>
                                </div>
                                <div class="tab-pane fade" id="services">
                                    <h4> </h4>
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
                                         <input type="hidden" id="company-id" name="company-id" value="<?php echo $company['company_id']; ?>">
                                         <label class="error-label hide label-danger">This field cannot be empty</label>
                                        </div>
                                    </div>
                                         
                                        
                                </div>
                                <div class="tab-pane fade" id="gallery">
                                    <br/>
                                        <!-- Single button -->
                                    
                                   <div class="row">
                                    <div class="col-sm-6">
                                        
                                        <form class="form-inline" id="add-photo-form" method="post" action="http://localhost/company_directory/company/add_photo" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <input  class="form-control" id="upload-file" type="file" name="upload-file">
                                                <input type="hidden" name="company-id" value="<?php echo $company['company_id']; ?>">
                                            </div>
                                            <button type="submit" class="btn btn-primary">Upload</button>
                                        </form>
                                         <div class="show-progress hide">Uploading....</div>    
                                        <div class="show-error alert alert-danger hide"></div>
                                        <div class="show-success alert alert-success hide"></div>
                                    </div>
                                   </div>
                                   <br/>
                                   <div class="row">
                                    <div class="col-sm-12" id="container">
                                    <?php if(!empty(is_array($photos))) :?>    
                                    <?php foreach ($photos as $photo) :?>
                                        <div class="img-container">
                                            <img src="<?php echo base_url(); ?>assets/images/<?php echo $photo['photo_url']; ?>" alt="..." class="img-thumbnail">
                                            <br/>
                                            <span style="cursor:pointer" data-id="<?php echo $photo['id']; ?>" id="delete-photo" class="label label-danger">x</span>

                                        </div> 
                                    <?php endforeach ?>
                                    <?php else :?>
                                     <p class="empty_photos">No Photos.</p>
                                    <?php endif ?>       
                                    </div>
                                   </div>
                                </div>
                                <div class="tab-pane fade" id="messages">
                                    <h4></h4>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <input type="hidden" id="msg" value="<?php echo $company['company_id']; ?>">
                                            <table id="msg-container"  class="table">
                                              
                                            </table> 

                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="tab-pane fade" id="publish">
                                    
                                    <form class="form-horizontal" id="publish_form" role="form">
                                        <div class="form-group">
                                        <label for="old-password" class="col-sm-3 control-label">Choose Template</label>
                                        <div class="col-sm-6">
                                        <input type="radio" name="templateRadio" id="optionsRadios1" value="basic" checked>
                                         Basic
                                        </div>
                                        <div class="col-sm-6">
                        
                                        <input type="hidden" name="company-id" value="<?php echo $company['company_id']; ?>">
                                        <input type="hidden" name="user-id" value="<?php echo $this->session->userdata('user_id'); ?>">
                                        </div>
                                        </div>
                                        <div class="form-group last">
                                        <div class="col-sm-offset-3 col-sm-6">
                                        <button type="submit" id="publish_btn" class="btn btn-success btn-sm">Publish</button>
                                        <button type="reset" class="btn btn-default btn-sm">Reset</button>
                                        </div>
                                        </div>

                                        <div class="show-progress hide">Saving....</div>    
                                        <div class="show-error alert alert-danger hide"></div>
                                        <div class="show-success alert alert-success hide"></div>
                                    </form>
                                </div>
                            </div>
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
        