<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>::Company Profiles</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url();?>assets/css/index.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="container">

      <!--navigation-->
      <div class="header clearfix">
        <nav>
          <ul class="nav nav-pills pull-right">
            <li role="presentation" >
              <button type="button" class="btn btn-default" data-toggle="modal" data-target="#myLogin">
                  Login
              </button>
            </li>
            <li role="presentation">
                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#mySignup">
                  Sign Up
              </button>
            </li>
          </ul>
        </nav>
        <h3 class="text-muted"><?php echo $page_title; ?></h3>
      </div>
      <!--end navigation-->

       <?php echo $body; ?>

      <footer class="footer">
        <p>&copy; Powered By AI</p>
      </footer>
     


    </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>assets/bower_components/jquery-validation/dist/jquery.validate.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/home.js"></script>
    <script>
    $(function(){
      $('body').on('click','.badger',function(e){
        var c_id=$(this).attr('data-id');
        $.ajax({type:"POST",
          url:"/company_directory/pages/company_info",
          dataType:"json",
          cache:false,
          data:{id:c_id},
          success:function(result)
          {
            var i= result.info;
            console.log(i.c_name);
            (i.company_logo==null)?$("body").find("#logo-img").attr('src','/company_directory/assets/images/logos/logo-holder.png'):$("body").find("#logo-img").attr('src','/company_directory/assets/images/logos/'+i.c_logo);
            $("#co-name").html(i.c_name);
            $("#co-id").attr('value',i.id);
            $(".profile").html(i.c_prof);
            $(".opening").html(i.c_w_opening);
            $(".closing").html(i.c_w_closing);
            $(".w-opening").html(i.c_we_opening);
            $(".w-closing").html(i.c_we_closing);
            $(".street").html(i.c_address_1);
            $(".city").html(i.c_city);
            $(".country").html(i.c_country);
            $(".zip").html(i.c_zip);
            $(".mobile").html(i.c_mobile);
            $(".tel").html(i.c_tel);
            $(".email").html(i.c_email);

            $('#basic').modal('show');
          }
          });
           e.preventDefault();
      });
 /*send message  */
  $('#message_btn').click(function(e){
      $('#message_form').validate({
      submitHandler:function()
      {
      var sentData=$.ajax({   
      type: "POST",
      url: "/company_directory/pages/send_message",
      data: $("#message_form").serialize(),
      cache: false,
      //dataType:"json",
      beforeSend: function(){
      $(".show-progress").removeClass('hide');},
      complete: function(){
      $(".show-progress").addClass('hide');}
      });
      sentData.done(function(result){
      var response=JSON.parse(result);
      if(response.success)
      {
      $(".show-success").html(response.success).removeClass('hide').delay(2000).fadeOut();
      $("#message").val('');
      $("#email").val('');
      }else
      {
      $(".show-error").html(response.errors).removeClass('hide');
      }
      }); 
      sentData.fail(function(jqXHR,textStatus){
      $(".show-error").html(textStatus).removeClass('hide');
      });
      e.preventDefault();
      }
      });
 });

    });
    </script>
  </body>
</html>