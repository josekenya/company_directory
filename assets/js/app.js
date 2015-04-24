$(document).ready(function(){
  /*-----initialize datatables---*/
$('#dataTables-example').DataTable({
responsive: true
});
  /*----end datatables---*/

/* -----Town Stuff---*/
//button clicks for delete
$('body').on('click','#fire-confirm',function(){
var id=$(this).attr('data-ids');
$('body').find('#test').attr('value',id);
$('#myConfirm').modal('show');
}); 
//button clicks for edit
$('body').on('click','#fire-edit-town',function(e){
var id=$(this).attr('data-ids');
$('body').find('#test').attr('value',id);
$.ajax({type:"POST",
url:"/kyama_api/towns/town_detail",
dataType:"json",
cache:false,
data:{id:id},
success:function(result)
{
$.each(result,function(index,val){
$("body").find("#edit_city").attr('value',val.city);
$("body").find("#edit_village").attr('value',val.village);
});
$('#myEdit').modal('show');
//$('#input').removeClass('hide');
}
});
e.preventDefault();
}); 

/*add town */
$('#add-town-btn').click(function(e){
$('#add-town-form').validate({
rules:
{
a_city:{required:true},
a_village:{required:true}
},
messages:{
a_city:"Please enter the City",
a_village:"Please Enter the Village."

},
submitHandler:function()
{
var sentData=$.ajax({   
type: "POST",
url: "/kyama_api/towns/add_town",
data: $("#add-town-form").serialize(),
cache: false,
//dataType:"json",
beforeSend: function(){
$("#t-loading").removeClass('hide');},
complete: function(){
$("#t-loading").addClass('hide');}
});
sentData.done(function(result){
var response=JSON.parse(result);
if(response.success)
{
$("#t-message").html(response.success).removeClass('hide').delay(2000).fadeOut();
$("#a_city").val('');
$("#a_village").val('');
location.reload();
}else
{
$("#t-error").html(response.errors).removeClass('hide');
}
}); 
sentData.fail(function(jqXHR,textStatus){
$("#t-error").html(textStatus).removeClass('hide');
});
e.preventDefault();
}
});
});
//delete town
$('#del-town-btn').click(function(e){  
var t_id=$('#test').val();            
$.ajax({   
type: "POST",
url: "/kyama_api/towns/delete_town",
data: {id:t_id},
cache: false,
//dataType:"json",
success: function(result)
{  
$("#t-message").html(result).removeClass('hide').delay(2000).fadeOut();
location.reload();
}
}); 
e.preventDefault();  
});
//edit town
$('#btn-edit-town').click(function(e){
$('#edit-town-form').validate({
rules:
{
edit_city:{required:true},
edit_village:{required:true}
},
messages:{
edit_city:"Please enter the City",
edit_village:"Please enter the Village"
},
submitHandler:function()
{
var sentData=$.ajax({   
type: "POST",
url: "/kyama_api/towns/edit_town",
data: $("#edit-town-form").serialize(),
cache: false,
//dataType:"json",
beforeSend: function(){
$("#edit-loading").removeClass('hide');},
complete: function(){
$("#edit-loading").addClass('hide');}
});
sentData.done(function(result){
var response=JSON.parse(result);
if(response.success)
{
$("#edit-message").html(response.success).removeClass('hide').delay(2000).fadeOut();
$("#edit_venue").val('');
location.reload();
}else
{
$("#edit-error").html(response.errors).removeClass('hide');
}
}); 
sentData.fail(function(jqXHR,textStatus){
$("#edit-error").html(textStatus).removeClass('hide');
});
e.preventDefault();
}
});
});
/*-----end town stuff---*/

/* -----Events Stuff---*/ 
//button clicks for event view
$('body').on('click','#fire-event-view',function(e){
var e_id=$(this).attr('data-ids');
$.ajax({type:"POST",
url:"/kyama_api/events/view_event",
dataType:"json",
cache:false,
data:{id:e_id},
success:function(result)
{
$.each(result,function(index,val){
(val.event_photo==null)?$("body").find("img#show-image").attr('src','/kyama_api/images/default.png'):$("body").find("img#show-image").attr('src','/kyama_api/images/'+val.event_photo); 
$("body").find("#show-venue").html(val.venue);
$("body").find("#show-town").html(val.town);
$("body").find("#show-desc").html(val.description);
});
$('#myEvent').modal('show');
//$('#input').removeClass('hide');
}
});
e.preventDefault();
});

//button clicks for settings
$('body').on('click','#fire-event-setting',function(){
  var sid=$(this).attr('data-ids');
  var sdate=$(this).attr('data-sdate');
  var edate=$(this).attr('data-edate');
  //console.log(sid);
  $('body').find('#current-sdate').attr('value',sdate);
  $('body').find('#current-edate').attr('value',edate);
  $('body').find('#post-id').attr('value',sid);
  $("#cancl-id").attr('value',sid);
  $('#mySetting').modal('show');
});
//toggle settings options
$("input:radio[name='setting-radio']").change(function(){ 
   var el=$(this).val();
   (el=="postpone")? $("#show-post-form").removeClass('hide'): $("#show-post-form").addClass('hide');
   (el=="cancel")? $("#show-cancl-form").removeClass('hide'): $("#show-cancl-form").addClass('hide');  
});
//cancel event
$('body').find('#save-cancel-btn').click(function(e){
  var c_id=$('#cancl-id').val();
  console.log(c_id);
  $.ajax({type:"POST",
    url:"/kyama_api/events/cancel_event",
    data:{id:c_id},
    cache:false,
    success:function(result)
    { 
      $('#s-message').html(result).removeClass('hide').delay(5000).fadeOut();
      location.reload(); 
    }
  });
  e.preventDefault();
});
//postpone event
$('#save-post-button').click(function(e){

  $('#show-post-form').validate({
    submitHandler:function(){
    $.ajax({
    type:"POST",
    url:"/kyama_api/events/postpone_event",
    data:$('#show-post-form').serialize(),
    cache:false,
    beforeSend:function() 
    {
      $('#s-loading').removeClass('hide');
    },
    success:function(result)
    {
      $('#s-loading').addClass('hide'); 
      var response=JSON.parse(result);
      if(response.success)
      {
      $('#s-message').html(response.success).removeClass('hide').delay(5000).fadeOut();
      location.reload(); 
      }
      else
      {
        $('#s-error').html(response.errors).removeClass('hide').delay(5000).fadeOut();
      }
    }
  });
  e.preventDefault();
  }
  });
});
//view attendance
$('body').on('click','#fire-event-attend',function(e){
  var a_id=$(this).attr('data-ids');
  console.log(a_id);  
  $.ajax({
    type:"POST",
    url:"/kyama_api/events/view_attendance",
    data:{id:a_id},
    cache:false,
    success:function(result)
    { 
      var attendees=JSON.parse(result);
      if(attendees.success)
      {
        $('body').find('#ee-error').addClass('hide');
        $('body').find('ul#attend-list').html('').removeClass('hide'); 
        $.each(attendees.success,function(index,items){
        $('body').find('ul#attend-list').append('<li>'+items.first_name+'</li>').removeClass('hide');
        //console.log(items.first_name);
        });
      }
      else
      {
        $('body').find('#attend-list').addClass('hide');
        $('body').find('#ee-error').html(attendees.errors).removeClass('hide');
      }
      $('#myAttend').modal('show'); 
    }
  });

  e.preventDefault();
});
//edit event

//add events
$("#add-event-form").ajaxForm({
beforeSubmit:function(formData,jqForm,options)
{
var queryString = $.param(formData);
$("#e-loading").removeClass('hide');
//return true;
},
success:function(responseText,statusText)
{
var response=JSON.parse(responseText);
if(response.success)
{
$("#e-loading").removeClass('hide').fadeOut();
$("#e-message").html(response.success).removeClass('hide').delay(2000).fadeOut();
$(this).clearForm();
location.reload();
}
else
{
$("#e-loading").removeClass('hide').fadeOut();
$("#e-error").html(response.errors).removeClass('hide');
}
},
error:function(jqXHR,textStatus)
{
$("#e-error").html(textStatus).removeClass('hide');  }

});

/* ----End Events Stuff---*/ 

/* -----Venue Stuff---*/ 
//button clicks for delete
$('body').on('click','#fire-confirm',function(){
var id=$(this).attr('data-ids');
$('body').find('#test').attr('value',id);
$('#myConfirm').modal('show');
}); 
//button clicks for edit
$('body').on('click','#fire-edit',function(e){
var id=$(this).attr('data-ids');
$('body').find('#test').attr('value',id);
$.ajax({type:"POST",
url:"/kyama_api/venues/venue_detail",
dataType:"json",
cache:false,
data:{id:id},
success:function(result)
{
$.each(result,function(index,val){
$("body").find("#edit_venue").attr('value',val.venue);
});
$('#myEdit').modal('show');
$('#input').removeClass('hide');
}
});
e.preventDefault();
});

//add venue
$('#btn-submit-venue').click(function(e){
$('#add-venue').validate({
rules:
{
a_venue:{required:true}
},
messages:{
a_venue:"Please Enter the Venue"
},
submitHandler:function()
{
var sentData=$.ajax({   
type: "POST",
url: "/kyama_api/venues/add_venue",
data: $("#add-venue").serialize(),
cache: false,
//dataType:"json",
beforeSend: function(){
$("#v-loading").removeClass('hide');},
complete: function(){
$("#v-loading").addClass('hide');}
});
sentData.done(function(result){
var response=JSON.parse(result);
if(response.success)
{
$("#v-message").html(response.success).removeClass('hide').delay(2000).fadeOut();
$("#a_venue").val('');
location.reload();
}else
{
$("#v-error").html(response.errors).removeClass('hide');
}
}); 
sentData.fail(function(jqXHR,textStatus){
$("#v-error").html(textStatus).removeClass('hide');
});
e.preventDefault();
}
});
});

//delete venue
$('#del-venue-btn').click(function(e){  
var v_id=$('#test').val();            
$.ajax({   
type: "POST",
url: "/kyama_api/venues/delete_venue",
data: {id:v_id},
cache: false,
//dataType:"json",
success: function(result)
{  
$("#v-message").html(result).removeClass('hide').delay(2000).fadeOut();
location.reload();
}
}); 
e.preventDefault();  
});

//edit venue
$('#btn-edit-venue').click(function(e){
$('#edit-venue-form').validate({
rules:
{
edit_venue:{required:true}
},
messages:{
edit_venue:"Please Enter the Venue"
},
submitHandler:function()
{
var sentData=$.ajax({   
type: "POST",
url: "/kyama_api/venues/edit_venue",
data: $("#edit-venue-form").serialize(),
cache: false,
//dataType:"json",
beforeSend: function(){
$("#edit-loading").removeClass('hide');},
complete: function(){
$("#edit-loading").addClass('hide');}
});
sentData.done(function(result){
var response=JSON.parse(result);
if(response.success)
{
$("#edit-message").html(response.success).removeClass('hide').delay(2000).fadeOut();
$("#edit_venue").val('');
location.reload();
}else
{
$("#edit-error").html(response.errors).removeClass('hide');
}
}); 
sentData.fail(function(jqXHR,textStatus){
$("#edit-error").html(textStatus).removeClass('hide');
});
e.preventDefault();
}
});
});


/* ----End Venue Stuff---*/ 
    
    //add announcement
  $('#add-ann-btn').click(function(e){   
  $('#add-ann').validate({
    submitHandler:function()
    {
    $.ajax({   
        type: "POST",
        url: "/kyama_api/announcements/add_announcement",
        data: $("#add-ann").serialize(),
        cache: false,
        //dataType:"json",
        beforeSend: function(){
          $("#ann-loading").removeClass('hide');},
        complete: function(){
          $("#ann-loading").addClass('hide');},
        success: function(result)
          {  
          $("#ann-message").html(result).removeClass('hide').delay(2000).fadeOut();
          $("#ann_title").val('');
          $("#ann_type").val('');
          $("#ann_desc").val('');
           }}); 
          console.log('yes');
           
          }}); 
        e.preventDefault();
          });                              
});



/*
     $.ajax({   
        type: "POST",
        url: "/kyama_api/events/add_event",
        data: $("#add-event").serialize(),
        cache: false,
        //dataType:"json",
        beforeSend: function(){
          $("#e-loading").removeClass('hide');},
        complete: function(){
          $("#e-loading").addClass('hide');},
        success: function(result)
          {
           var er=JSON.parse(result);
           if(er.errors)
           {
             $("#e-message").html(er.errors).delay(2000).fadeOut();
           }else
           {
             $("#e-message").html(er.success).delay(2000).fadeOut();
             $("#a_venue").val('');
             $("#a_town").val('');
             $("#s_date").val('');
             $("#e_date").val('');
             $("#a_description").val('');
             location.reload();
           }}});
           */
      