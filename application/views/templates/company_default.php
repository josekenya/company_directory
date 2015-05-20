<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Kyama Management Portal">
    <meta name="author" content="Joseph Mboya">

    <title>::Company Directory</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?php echo base_url();?>assets/css/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url();?>assets/css/sb-admin-2.css" rel="stylesheet">
     <!-- Custom CSS -->
    <link href="<?php echo base_url();?>assets/css/dropzone.min.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="<?php echo base_url();?>assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <style>

    body{ margin-top:50px;}
    .nav-tabs .glyphicon:not(.no-margin) { margin-right:10px; }
    .tab-pane .list-group-item:first-child {border-top-right-radius: 0px;border-top-left-radius: 0px;}
    .tab-pane .list-group-item:last-child {border-bottom-right-radius: 0px;border-bottom-left-radius: 0px;}
    .tab-pane .list-group .checkbox { display: inline-block;margin: 0px; }
    .tab-pane .list-group input[type="checkbox"]{ margin-top: 2px; }
    .tab-pane .list-group .glyphicon { margin-right:5px; }
    .tab-pane .list-group .glyphicon:hover { color:#FFBC00; }
    a.list-group-item.read { color: #222;background-color: #F3F3F3; }
    hr { margin-top: 5px;margin-bottom: 10px; }
    .nav-pills>li>a {padding: 5px 10px;}

    .ad { padding: 5px;background: #F5F5F5;color: #222;font-size: 80%;border: 1px solid #E5E5E5; }
    .ad a.title {color: #15C;text-decoration: none;font-weight: bold;font-size: 110%;}
    .ad a.url {color: #093;text-decoration: none;}

    .p-center
    {
        text-align: center;
    }
    .hide
    {
        display: none;
    }
    .error
    {
        color: red;
    }
    .file
    {
        width: 100px;
        height: 100px;

    }
    .img-container
    {
        display: inline-block;
    }
    .img-container img
    {
       width: 100px;
    }
    .unread
    {
        background-color: #DAD5D5;
    }
    #msg-container tr
    {
      cursor: pointer;
    }
    </style>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo base_url();?>me/">Company Directory</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right"> 
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="<?php echo base_url();?>me/profile"><i class="fa fa-user fa-fw"></i><?php echo $this->session->userdata('username'); ?></a>
                        </li>
                        </li>
                        <li class="divider"></li>
                        <li><a href="<?php echo base_url();?>company/logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="<?php echo base_url();?>me/"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url();?>me/profile"><i class="fa fa-dashboard fa-fw"></i> Profile</a>
                        </li>
                        
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><?php echo $page_title; ?></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <!--content-->
              <?php echo $body; ?>
            <!--/.content-->
            
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
    <!-- Validation JavaScript -->
    <script src="<?php echo base_url();?>assets/bower_components/jquery-validation/dist/jquery.validate.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/jquery.form.min.js"></script>
    <script src="<?php echo base_url();?>assets/ckeditor/ckeditor.js"></script>
    <script src="<?php echo base_url();?>assets/ckeditor/adapters/jquery.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/moment.js"></script> 
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/livestamp.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo base_url();?>assets/js/metisMenu.min.js"></script>
    <!-- Dropzone -->
    <script src="<?php echo base_url();?>assets/js/dropzone.min.js"></script>
    <!-- Custom Theme JavaScript -->
     <script src="<?php echo base_url();?>assets/js/index.js"></script>
    <script src="<?php echo base_url();?>assets/js/sb-admin-2.js"></script>
    <script type="text/javascript">
    //textarea editor
    $(function(){
        $('#company-profile' ).ckeditor();
    });
      
    </script>
</body>

</html>
