  <div class="row">
                <div class="col-lg-8">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> My Companies

                            <button type="button" class="btn btn-default"  data-toggle="modal" data-target="#myCompany">Add New</button>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                             <div class="table-responsive">
                                <div class="show-delete alert alert-success hide"></div>
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php if(is_array($co)): ?>     
                                   <?php foreach ($co as $company) :?>
                                     <tr>
                                        <td><?php echo htmlspecialchars($company['c_name'],ENT_QUOTES,'UTF-8');?><?php echo $company['id']; ?></td>
                                        <td>
                                            <a  href="<?php echo base_url();?>company/<?php echo $company['id']; ?>" id="manage-co-btn"  class="btn btn-success">Manage</a>
                                            <button data-ids="<?php echo $company['id']; ?>" id="fire-delete-co" type="button" class="btn btn-danger">Delete</button>
                                      
                                        </td>
                                     </tr>
                                   <?php endforeach ?>
                                   <?php else: ?>
                                   <tr><td>No Data Found</td><td>No Data Found</td></tr>
                                   <?php endif ?>
                                        
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->  
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                    
                    
                </div>
                <!-- /.col-lg-8 -->
                <div class="col-lg-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bell fa-fw"></i> Statistics
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="list-group">
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-home fa-fw"></i> Companies Registered
                                    <span class="pull-right text-muted small"><em><?php echo $company_count; ?></em>
                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-envelope fa-fw"></i> Messages Received
                                    <span class="pull-right text-muted small"><em>0</em>
                                    </span>
                                </a>
                            </div>
                            <!-- /.list-group -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                    
                </div>
                <!-- /.col-lg-4 -->
            </div>
            <!-- /.row -->

            <!--modals-->
             <!--sign up modal-->
    <div class="modal fade" id="myCompany" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">Add Company</h4>
            </div>
            <div class="modal-body">
                
                <form id="create_co_form"class="form-horizontal" role="form">
                        <div class="form-group">
                            <label for="company-name" class="col-sm-3 control-label">Company Name</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="company-name" id="company-name" placeholder="Company Name" required>
                                <input type="hidden" name="owner-id" value="<?php echo $this->session->userdata('user_id'); ?>" >
                            </div>
                        </div>
                        <div class="form-group last">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" id="submit_co" class="btn btn-success btn-sm">Register</button>
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
    <!--Confirmation-->
<div class="modal fade" id="myConfirm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                        <div class="modal-content">
                                <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Alert</h4>
                                </div>
                                <div class="modal-body">
                                   <p>Are you sure you want to delete this item?</p>
                                   <input id="del-id" type="hidden"/> 
                                            
                                </div>
                                <div class="modal-footer">
                                            <button type="button" class="btn btn-success" data-dismiss="modal">No</button>
                                            <button  type="button" class="btn btn-danger" id="del-co-btn">Yes</button>
                                </div>
                        </div>
                                    <!-- /.modal-content -->
                </div>
                                <!-- /.modal-dialog -->
</div>
        