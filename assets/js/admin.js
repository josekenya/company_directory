/* update user info */
$('#edit_btn').click(function(e){
	$('#edit_profile_form').validate({
	submitHandler:function()
	{
		var sentData=$.ajax({   
		type: "POST",
		url: "/company_directory/me/update",
		data: $("#edit_profile_form").serialize(),
		cache: false,
		//dataType:"json",
		beforeSend: function(){ $(".show-progress").removeClass('hide');},
		complete: function(){ $(".show-progress").addClass('hide');}
		});
		sentData.done(function(result){
		var response=JSON.parse(result);
		if(response.success)
			{
			$(".show-success").html(response.success).removeClass('hide').delay(2000).fadeOut();
			}
			else
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
/* change password */
$('#edit_pass_btn').click(function(e){
	$('#change_password_form').validate({
	submitHandler:function()
	{
		var sentData=$.ajax({   
		type: "POST",
		url: "/company_directory/me/update_password",
		data: $("#change_password_form").serialize(),
		cache: false,
		//dataType:"json",
		beforeSend: function(){ $(".show-progress").removeClass('hide');},
		complete: function(){ $(".show-progress").addClass('hide');}
		});
		sentData.done(function(result){
		var response=JSON.parse(result);
		if(response.success)
			{
			$(".show-success").html(response.success).removeClass('hide').delay(2000).fadeOut();

			}
			else
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

  /* add company */
$('#submit_co').click(function(e){
	$('#create_co_form').validate({
	submitHandler:function()
	{
		var sentData=$.ajax({   
		type: "POST",
		url: "/company_directory/me/add_company",
		data: $("#create_co_form").serialize(),
		cache: false,
		//dataType:"json",
		beforeSend: function(){ $(".show-progress").removeClass('hide');},
		complete: function(){ $(".show-progress").addClass('hide');}
		});
		sentData.done(function(result){
		var response=JSON.parse(result);
		if(response.success)
			{
			$(".show-success").html(response.success).removeClass('hide').delay(2000).fadeOut();
			location.reload();
			}
			else
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
//button clicks for delete
$('body').on('click','#fire-delete-co',function(){
	var id=$(this).attr('data-ids');
	$('body').find('#del-id').attr('value',id);
	$('#myConfirm').modal('show');
}); 
/* delete co */
$('#del-co-btn').click(function(e){  
	var t_id=$('#del-id').val();            
	$.ajax({   
		type: "POST",
		url: "/company_directory/me/delete_company",
		data: {id:t_id},
		cache: false,
	    //dataType:"json",
		success: function(result)
		{  
			location.reload();
			$(".show-delete").html(result).removeClass('hide').delay(2000).fadeOut();
		}
	}); 
	e.preventDefault();  
});
