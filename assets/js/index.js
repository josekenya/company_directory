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
  if(response.errors)
	{
	  $(".show-error").html(response.errors).removeClass('hide').delay(2000).fadeOut();
	  location.reload();
	}
	else
	{
	  location.reload();
      location.href="me/";
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

});