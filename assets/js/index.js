$(function(){
/* company profile editing */
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
			beforeSend: function(){ $(".show-info-progress").removeClass('hide');},
			complete: function(){ $(".show-info-progress").addClass('hide');}
		});
		sentData.done(function(result){
		var response=JSON.parse(result);
			if(response.success)
			{
				$(".show-info-success").html(response.success).removeClass('hide').delay(2000).fadeOut().addClass('hide');
				//location.reload();
			}
			else
			{
			    $(".show-info-error").html(response.errors).removeClass('hide').delay(2000).fadeOut().addClass('hide');
			}
		}); 
		sentData.fail(function(jqXHR,textStatus){
		        $(".show-info-error").html(textStatus).removeClass('hide').delay(2000).fadeOut().addClass('hide');
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
			beforeSend: function(){ $(".show-contact-progress").removeClass('hide');},
			complete: function(){ $(".show-contact-progress").addClass('hide');}
		});
		sentData.done(function(result){
		var response=JSON.parse(result);
			if(response.success)
			{
				$(".show-contact-success").html(response.success).removeClass('hide').delay(2000).fadeOut().addClass('hide');
				//location.reload();
			}
			else
			{
			    $(".show-contact-error").html(response.errors).removeClass('hide').delay(2000).fadeOut().addClass('hide');
			}
		}); 
		sentData.fail(function(jqXHR,textStatus){
		        $(".show-contact-error").html(textStatus).removeClass('hide').delay(2000).fadeOut().addClass('hide');
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
			beforeSend: function(){ $(".show-prof-progress").removeClass('hide');},
			complete: function(){ $(".show-prof-progress").addClass('hide');}
		});
		sentData.done(function(result){
		var response=JSON.parse(result);
			if(response.success)
			{
				$(".show-prof-success").html(response.success).removeClass('hide').delay(2000).fadeOut().addClass('hide');
				//location.reload();
			}
			else
			{
			    $(".show-prof-error").html(response.errors).removeClass('hide').delay(2000).fadeOut().addClass('hide');
			}
		}); 
		sentData.fail(function(jqXHR,textStatus){
		        $(".show-prof-error").html(textStatus).removeClass('hide').delay(2000).fadeOut().addClass('hide');
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
			beforeSend: function(){ $(".show-addr-progress").removeClass('hide');},
			complete: function(){ $(".show-addr-progress").addClass('hide');}
		});
		sentData.done(function(result){
		var response=JSON.parse(result);
			if(response.success)
			{
				$(".show-addr-success").html(response.success).removeClass('hide').delay(2000).fadeOut().addClass('hide');
				//location.reload();
			}
			else
			{
			    $(".show-addr-error").html(response.errors).removeClass('hide').delay(2000).fadeOut().addClass('hide');
			}
		}); 
		sentData.fail(function(jqXHR,textStatus){
		        $(".show-addr-error").html(textStatus).removeClass('hide').delay(2000).fadeOut().addClass('hide');
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
			beforeSend: function(){ $(".show-w-progress").removeClass('hide');},
			complete: function(){ $(".show-w-progress").addClass('hide');}
		});
		sentData.done(function(result){
		var response=JSON.parse(result);
			if(response.success)
			{
				$(".show-w-success").html(response.success).removeClass('hide').delay(2000).fadeOut().addClass('hide');
				//location.reload();
			}
			else
			{
			    $(".show-w-error").html(response.errors).removeClass('hide').delay(2000).fadeOut().addClass('hide');
			}
		}); 
		sentData.fail(function(jqXHR,textStatus){
		        $(".show-w-error").html(textStatus).removeClass('hide').delay(2000).fadeOut().addClass('hide');
		});
		        e.preventDefault();
		}
	});
});
/* display services form */
    var max_fields      = 10; //maximum input boxes allowed
    var wrapper         = $(".list-inline"); //Fields wrapper
    var add_button      = $(".add_field_button"); //Add button ID
    
   
    $('.input_fields_wrap').on('keydown','input[type=text]',function(e){
    	
    	if(e.keyCode==13)
    	{
            //$(".error-label").removeClass('hide').delay(2000).fadeOut();
    		$(".empty_service").addClass('hide');
            var val=$(this).val();
    		var c_id=$("#company-id").val();
    		$.ajax({type:"POST",url:"/company_directory/company/add_service",data:{s_val:val,id:c_id},success:function(result){
    			$(wrapper).append('<li>'+ val +' <span style="cursor:pointer" class="remove_field label label-danger"  > x </span></li>');
    		}}); 
    		$(this).val('');
    	}

    });
    $('.list-inline').on("click",".remove_field", function(e){
     //user click on remove text
      var id=$(this).attr('data-id');
      $.ajax({type:"POST",url:"/company_directory/company/delete_service",data:{id:id},success:function(result){
            var response=JSON.parse(result);
            if(response.success)
			{
				$(".success-status").html(response.success).removeClass('hide').delay(2000).fadeOut().addClass('hide');
				//location.reload();
			}
			else
			{
			    $(".error-status").html(response.errors).removeClass('hide').delay(2000).fadeOut().addClass('hide');
			}
            
      }});
      $(this).parent('li').remove();
      e.preventDefault();
       
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
			beforeSend: function(){ $(".show-p-progress").removeClass('hide');},
			complete: function(){ $(".show-p-progress").addClass('hide');}
		});
		sentData.done(function(result){
		var response=JSON.parse(result);
			if(response.success)
			{
				$(".show-p-success").html(response.success).removeClass('hide').delay(2000).addClass('hide');
				//location.reload();
			}
			else
			{
			    $(".show-p-error").html(response.errors).removeClass('hide').delay(2000).addClass('hide');
			}
		}); 
		sentData.fail(function(jqXHR,textStatus){
		        $(".show-p-error").html(textStatus).removeClass('hide').delay(2000).addClass('hide');
		});
		        e.preventDefault();
		}
	});
});
/* upload image */

$("#add-photo-form").ajaxForm({
	
	beforeSubmit:function(formData,jqForm,options)
	{
		var queryString = $.param(formData);
		$(".show-progress").removeClass('hide');
		//return true;
	},
	success:function(responseText,statusText,xhr)
	{
	var response=JSON.parse(responseText);
	//var img=responseText;
		if(response.success)
		{
			//var ct= xhr.getResponseHeader("content-type");
			$(".empty_photos").addClass('hide');
			$(".show-u-progress").removeClass('hide').fadeOut();
			$(".show-u-success").html(response.success).removeClass('hide').delay(2000).fadeOut();
			$("#container").append('<div class="img-container"><img src="http://localhost/company_directory/assets/images/'+ response.orig_name +'"  class="img-thumbnail" ><br/><span style="cursor:pointer" data-id="<?php echo $photo[&quot;id&quot;]; ?>" id="delete-photo" class="label label-danger">x</span></div>');
			//console.log(response.orig_name);
			$(this).clearForm();
		
		}
		else
		{
			$(".show-u-progress").removeClass('hide').fadeOut();
			$(".show-u-error").html(response.errors).removeClass('hide').delay(2000).fadeOut();
		}
	},
	error:function(jqXHR,textStatus)
	{
	$(".show-u-error").html(textStatus).removeClass('hide').delay(2000).fadeOut();
	}

});


/*delete photo */
$('.img-container').on("click","#delete-photo", function(e){
     //user click on remove text
      $(this).parent('div').remove();
      var id=$(this).attr('data-id');
      $.ajax({type:"POST",url:"/company_directory/company/delete_photo",data:{id:id},success:function(result){
        $('.show-u-success').html(result);
      }});
      e.preventDefault();   
    });
/*get msg count */
var cid=$("#msg").val();
console.log(cid);
  setTimeout(function(){
	$.ajax({url:'/company_directory/company/get_new_msg',
		type:'POST',
		data:{m_id:cid},
		dataType:'json',
		success:function(data){
       //console.log(data.new_msg);
        $('.badge').html(data.new_msg);
	}});
},500);
/* list msg*/
   $.ajax({url:'/company_directory/company/get_messages',
		   	type:'POST',
		   	data:{c_id:cid},
		   	dataType:'json',
		   	success:function(data){
		    //var response=JSON.parse(data);
		    //console.log(data.messages);
	        $.each(data.messages,function(idx,val){
	          (val.read==null)?$("#msg-container").append('<tr data-msg="'+ val.message_id +'"class="hit unread"><td>New message from  '+ val.sender +' </td></tr>'):$("#msg-container").append('<tr data-msg="'+ val.message_id +'"class="hit none"><td>New message from  '+ val.sender +' </td></tr>');
	        });   
	}});
   /* view msg */
   $("body").on('click','.hit',function(){

   	   $(this).removeClass('unread');
   	   var msg_id=$(this).attr('data-msg');
   	   console.log(msg_id);
   	   $.ajax({url:'/company_directory/company/get_msg_details',
		   	type:'POST',
		   	data:{t_id:msg_id},
		   	dataType:'json',
		   	success:function(data){
		    var response=data.co_msg; 
		    console.log(response);
		    $(".sender").html(response.sender);
		    $(".message").html(response.message);     
	    }});
      $("#myMessage").modal('show');
   });
  

});