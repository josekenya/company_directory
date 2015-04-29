$(function(){

   $("#toggle-settings").click(function(){
      $("div.search-categories").toggleClass("hide");
   });
 

  /*Add User*/
$('#submit_user').click(function(e){
$('#create_user_form').validate({
submitHandler:function()
{
var sentData=$.ajax({   
type: "POST",
url: "/company_directory/search/create_user",
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
url: "/company_directory/search/login",
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
/* basic info edit */
$('#basic_info_btn').click(function(e){
	$('#basic_info_form').validate({
		submitHandler:function()
		{
		var sentData=$.ajax({   
			type: "POST",
			url: "/company_directory/company/edit_info",
			data: $("#basic_info_form").serialize(),
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
/* company profile editing */
/* basic info edit */
$('#basic_info_btn').click(function(e){
	$('#basic_info_form').validate({
		submitHandler:function()
		{
		var sentData=$.ajax({   
			type: "POST",
			url: "/company_directory/company/edit_info",
			data: $("#basic_info_form").serialize(),
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

/* contact info edit */
$('#contact_info_btn').click(function(e){
	$('#contact_info_form').validate({
		submitHandler:function()
		{
		var sentData=$.ajax({   
			type: "POST",
			url: "/company_directory/company/edit_contact_info",
			data: $("#contact_info_form").serialize(),
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

/* company profile edit */
$('#company_profile_btn').click(function(e){
	$('#company_profile_form').validate({
		submitHandler:function()
		{
		var sentData=$.ajax({   
			type: "POST",
			url: "/company_directory/company/edit_company_profile",
			data: $("#company_profile_form").serialize(),
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

/* company address edit */
$('#company_address_btn').click(function(e){
	$('#company_address_form').validate({
		submitHandler:function()
		{
		var sentData=$.ajax({   
			type: "POST",
			url: "/company_directory/company/edit_company_address",
			data: $("#company_address_form").serialize(),
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

/* operation details edit */
$('#operation_details_btn').click(function(e){
	$('#operation_details_form').validate({
		submitHandler:function()
		{
		var sentData=$.ajax({   
			type: "POST",
			url: "/company_directory/company/edit_operation_details",
			data: $("#operation_details_form").serialize(),
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

/* publish form edit */
$('#publish_btn').click(function(e){
	$('#publish_form').validate({
		submitHandler:function()
		{
		var sentData=$.ajax({   
			type: "POST",
			url: "/company_directory/company/edit_publish",
			data: $("#publish_form").serialize(),
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

});