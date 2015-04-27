             <div class="row">
                <div class="col-lg-8">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Profile Settings
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#home" data-toggle="tab">Basic Info</a>
                                </li>
                                <li><a href="#profile" data-toggle="tab">Change Password</a>
                                </li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="home">
                                    <h4> </h4>
                                    <form class="form-horizontal" id="edit_profile_form"  role="form">
                                        <div class="form-group">
                                        <label for="first-name" class="col-sm-3 control-label">First Name</label>
                                        <div class="col-sm-6">
                                        <input type="text" class="form-control" name="first-name" value="<?php echo $users->first_name;?>" id="first-name"  required>
                                        </div>
                                        </div>
                                        <div class="form-group">
                                        <label for="last-name" class="col-sm-3 control-label">Last Name</label>
                                        <div class="col-sm-6">
                                        <input type="text" class="form-control" name="last-name" value="<?php echo $users->last_name;?>" id="last-name"  required>
                                        </div>
                                        </div>
                                         <div class="form-group">
                                        <label for="phone-number" class="col-sm-3 control-label">Phone Number</label>
                                        <div class="col-sm-6">
                                        <input type="text" class="form-control" name="phone-number" value="<?php echo $users->phone;?>" id="phone-number"  required>
                                        <input type="hidden" name="id" value="<?php echo $users->user_id;?>">
                                        </div>
                                        </div>
                                        <div class="form-group last">
                                        <div class="col-sm-offset-3 col-sm-6">
                                        <button type="submit" id="edit_btn" class="btn btn-success btn-sm">Save</button>
                                        <button type="reset" class="btn btn-default btn-sm">Reset</button>
                                        </div>
                                        </div>
                                        <div class="show-progress hide">Saving....</div>    
                                        <div class="show-error alert alert-danger hide"></div>
                                        <div class="show-success alert alert-success hide"></div>
                                    </form>
                                </div>
                                <div class="tab-pane fade" id="profile">
                                    <h4></h4>
                                    <form class="form-horizontal" id="change_password_form" role="form">
                                        <div class="form-group">
                                        <label for="old-password" class="col-sm-3 control-label">Old Password</label>
                                        <div class="col-sm-6">
                                        <input type="password" class="form-control" name="old-password" id="old-password" placeholder="Old Password" required>
                                        </div>
                                        </div>
                                        <div class="form-group">
                                        <label for="new-password" class="col-sm-3 control-label">New Password</label>
                                        <div class="col-sm-6">
                                        <input type="password" class="form-control" name="new-password" id="new-password" placeholder="New Password" required>
                                        </div>
                                        </div>
                                        <div class="form-group">
                                        <label for="confirm-password" class="col-sm-3 control-label">Confirm New Password</label>
                                        <div class="col-sm-6">
                                        <input type="password" class="form-control" name="confirm-password" id="confirm-password" placeholder="Confirm New Password" required>
                                        </div>
                                        </div>
                                        <div class="form-group last">
                                        <div class="col-sm-offset-3 col-sm-6">
                                        <button type="submit" id="edit_pass_btn" class="btn btn-success btn-sm">Save</button>
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
        