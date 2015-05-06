$(function(){
/*Add User*/
$('#submit_user').click(function(e){
	$('#create_user_form').validate({
	submitHandler:function()
	{
		var sentData=$.ajax({   
		type: "POST",
		url: "/company_directory/pages/create_user",
		data: $("#create_user_form").serialize(),
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

/* login user */
$('#login_btn').click(function(e){
	$('#login_form').validate({
	submitHandler:function()
	{
		var sentData=$.ajax({   
		type: "POST",
		url: "/company_directory/pages/login",
		data: $("#login_form").serialize(),
		cache: false,
		//dataType:"json",
		beforeSend: function(){ $(".show-progress").removeClass('hide');},
		complete: function(){ $(".show-progress").addClass('hide');}
		});
			sentData.done(function(result){
			var response=JSON.parse(result);
			  if(response.success==1)
				{
				   location.reload();
			       location.href="me/";
				}
				else
				{
					$(".show-error").html(response.errors).removeClass('hide').delay(2000).fadeOut();
			      //console.log('logged in');
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