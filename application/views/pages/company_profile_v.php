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
                                        <input type="text" class="form-control" name="industry-category" value="" id="industry-category" >
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
                                            <input type="radio" name="employeeNo"  value="1" >
                                            10-20
                                          </label>
                                          <label class="checkbox-inline">
                                            <input type="radio" name="employeeNo"  value="2" >
                                            20-50
                                          </label>
                                          <label class="checkbox-inline">
                                            <input type="radio" name="employeeNo"  value="3" >
                                            50-100
                                          </label>
                                          <label class="checkbox-inline">
                                            <input type="radio" name="employeeNo"  value="4" >
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
                                    <h4>Coming Soon </h4>
                                        <div class="row">
                                            <div class="col-sm-3"><input type="text" class="form-control" name="co-name" value="" id="co-name"  required></div>
                                            <div class="col-sm-3">
                                                <button type="button" class="btn btn-success btn-circle hide"><i class="fa fa-check"></i></button>
                                                <button type="button" class="btn btn-danger btn-circle"><i class="fa fa-close"></i></button>
                                                <button type="button" class="btn btn-warning btn-circle"><i class="fa fa-plus"></i></button>
                                            </div>
                                        </div> 
                                        <input type="hidden" name="company-id" value="<?php echo $company['company_id']; ?>">
                                        <input type="hidden" name="user-id" value="<?php echo $this->session->userdata('user_id'); ?>">
                                </div>
                                <div class="tab-pane fade" id="gallery">
                                    <h4>Coming Soon</h4>
                                   
                                </div>
                                <div class="tab-pane fade" id="publish">
                                    <h4>Coming Soon</h4>
                                    <form class="form-horizontal" id="publish_form" role="form">
                                        <div class="form-group">
                                        <label for="old-password" class="col-sm-3 control-label">Choose Template</label>
                                        <div class="col-sm-6">
                                        <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" >
                                         Basic
                                        </div>
                                        <div class="col-sm-6">
                                        <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" >
                                        Gallery
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
        