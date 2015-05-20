<span id="load-error" class="hide"></span> 
                                            <form class="form-inline" id="add-logo-form" method="post" action="<?php echo base_url('company/add_logo'); ?>" enctype="multipart/form-data">
                                                <div class="form-group">
                                                    <input  class="form-control" id="upload-logo" type="file" name="upload-logo">
                                                    <input type="hidden" name="company-id" value="<?php echo $company['id']; ?>">
                                                </div>
                                                <br/><br/>
                                                <button type="submit" class="btn btn-primary">Upload</button>
                                            </form>



                                            <img src="<?php echo base_url(); ?>assets/images/logos/loader.gif" alt="Upload Logo" id="loader" class="img-thumbnail hide" width="40">
                                             <img src="<?php echo base_url(); ?>assets/images/logos/<?php echo ($company['c_logo']==null)?'logo-holder.png':$company['c_logo']; ?>" alt="Upload Logo" id="logo" class="img-thumbnail" width="80">
                                              <br/>
                                             <span style="cursor:pointer" data-id="<?php echo $company['id']; ?>" id="delete-logo" class="label hide label-danger">x</span>

                                             /* upload logo */
$("#add-logo-form").ajaxForm({
	
	beforeSubmit:function(formData,jqForm,options)
	{
		var queryString = $.param(formData);
		$("#loader").removeClass('hide');
		$("#logo").addClass('hide');
		//return true;
	},
	success:function(responseText,statusText,xhr)
	{
	var response=JSON.parse(responseText);
		if(response.success)
		{
			$("#loader").addClass('hide');
			location.reload();
			$("#logo").removeClass('hide');
			$(this).clearForm();
		
		}
		else
		{
			$("#loader").addClass('hide');
			$("#load-error").html(response.errors).removeClass('hide').delay(2000).addClass('hide');
		}
	},
	error:function(jqXHR,textStatus)
	{
	$("#loader").addClass('hide');
	$(".load-error").html(textStatus).removeClass('hide').delay(2000).addClass('hide');
	}

});

/*delete photo */
$('.logo-img-container').on("click","#delete-logo", function(e){
     //user click on remove text
      $(this).parent('div').remove();
      var id=$(this).attr('data-id');
      $.ajax({type:"POST",url:"/company_directory/company/delete_logo",data:{id:id},success:function(result){
        location.reload();
      }});
      e.preventDefault();   
    });

    
    <a href="#" class="list-group-item">
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox">
                                                                </label>
                                                            </div>
                                                            <span class="name" style="min-width: 120px;
                                                            display: inline-block;">Mark Otto</span> 
                                                            <span class="">Nice work on the lastest version</span>
                                                            <span class="badge">12:10 AM</span>
                                                            <span class="pull-right"><span class="glyphicon glyphicon-paperclip">
                                                            </span>
                                                            </span>
                                                        </a>