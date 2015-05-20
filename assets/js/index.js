//add logo
Dropzone.options.uploadLogo={
 paramName:"upload-logo",
 method:"post",
 addRemoveLinks:true,
 clickable:true,
 maxFiles:"1",
 dictDefaultMessage:"Click to upload New Logo",
 dictRemoveFile:"Remove Logo",
 init: function() {
    this.on("success", function(file, responseText) {
      var response=JSON.parse(responseText);
      //file.previewTemplate.appendChild(document.createTextNode(response.success));
      document.getElementById('logo').src="/company_directory/assets/images/logos/" + response.client_name;
      //console.log(responseText);
    });
    this.on("maxfilesexceeded", function(file) { this.removeFile(file); });
}
};
//add gallery
Dropzone.options.uploadGallery = {
	paramName:"upload-gallery",
	maxFiles:"2",
    init: function() {
        thisDropzone = this;
        var iid=$("#company-id").val();
        console.log(iid);
        $.getJSON('/company_directory/company/slider_images',{id:iid}, function(data) {
        	console.log(data);
            $.each(data.photos, function(key,value){
                var mockFile = {name: value.photo_url};
                thisDropzone.options.addedfile.call(thisDropzone, mockFile);
                thisDropzone.options.thumbnail.call(thisDropzone, mockFile, "/company_directory/assets/images/logos/"+value.photo_url);
                var removeButton = Dropzone.createElement('<span style="cursor:pointer" data-id="'+ value.id +'" id="delete-logo" class="label  label-danger">Remove</span>');
                $(".dz-progress").remove();
                $(".dz-size").remove();
                var _this = this;
		        removeButton.addEventListener("click", function(e) 
		            {
		                e.preventDefault();
		                e.stopPropagation();
		                var id=$(this).attr('data-id');
		                $.post("/company_directory/company/delete_photo",{id:id});
		                thisDropzone.removeFile(mockFile);
		            });
                
                mockFile.previewElement.appendChild(removeButton); 
            });    
        });

        thisDropzone.on("maxfilesexceeded", function(file) { thisDropzone.removeFile(file); });   
    }
};

$(function(){
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


/*get msg count */
var cid=$("#msg").val();
console.log(cid);
  setTimeout(function(){
	$.getJSON('/company_directory/company/get_count',{id:cid},function(data){
        $('.count').html(data.new_msg);
	});
},500);
/* list msg*/
   $.getJSON('/company_directory/company/get_messages',
		      {c_id:cid},function(data){
		    /*var response=JSON.parse(data);*/
		    //console.log(data.messages);
	        $.each(data.messages,function(idx,val){
	          (val.read==null)?$(".list-group")
	          .append('<a href="#" id="hit" data-msg="'+val.message_id+'" class="list-group-item"><div class="checkbox"><label><input type="checkbox"></label></div><span class="name" style="min-width: 120px;display: inline-block;">'+ val.sender +'</span> <span class="">New message</span><span class="badge" data-livestamp="'+val.duration+'"></span><span class="pull-right"></span></a>')
	          :$(".list-group")
	          .append('<a href="#" id="hit" data-msg="'+
	          	val.message_id+'" class="list-group-item read"><div class="checkbox"><label><input type="checkbox"></label></div><span class="name" style="min-width: 120px;display: inline-block;">'+ val.sender +'</span> <span class="">New message</span><span class="badge" data-livestamp="'+val.duration+'"></span><span class="pull-right"></span></a>');
	        });});
   /* view msg */
   $("body").on('click','#hit',function(){
   	   /*$(this).removeClass('unread');*/
   	   var msg_id=$(this).attr('data-msg');
   	   console.log(msg_id);
   	   $.getJSON('/company_directory/company/get_msg_details',
		   	{t_id:msg_id},function(data){
		    var response=data.co_msg; 
		    console.log(response);
		    $(".sender").html(response.sender);
		    $(".message").html(response.message);     
	    });
      $("#myMessage").modal('show');
   });
  

});