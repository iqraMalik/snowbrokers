<?php
$this->load->view('includes/header');

?>
<link type="text/css" href="<?php echo base_url(); ?>datepicker/jquery-ui-1.8.21.custom.css" rel="stylesheet" />

<script type="text/javascript" src="<?php echo base_url(); ?>datepicker/jquery-ui-timepicker-addon.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>datepicker/jquery-ui-timepicker-addon2.js"></script>

<script>
       
$(function() {
		var dates = $( "#publish_date").timepicker({
			timeFormat: 'hh:mm',
			addSliderAccess: true,
			sliderAccessArgs: { touchonly: true },
			hourGrid: 4,
			minuteGrid: 10,
			showOn: "both",
			buttonImage: "<?php echo base_url(); ?>datepicker/calendar.gif",
			buttonImageOnly: true,
			defaultDate: "0",
			maxDate: "+10Y",
			dateFormat: 'yy-mm-dd',
			changeMonth: true,
			changeYear: true
		});
	});

$(function() {
		var d= new Date();
		var months = d.getMonth()+1;
		months = (months>9)?months:'0'+months;
		var day = d.getDate();
		day = (day>9)?day:'0'+day;
		var year = d.getFullYear();
		var hours = d.getHours();
		var minutes = d.getMinutes();
		$("#publish_date").val(months+'/'+day+'/'+year);
		
	});

	$(function() {
		$( "#publish_date" ).datepicker({
			showOn: "both",
			buttonImage: "<?php echo base_url(); ?>datepicker/calendar.gif",
			buttonImageOnly: true,
			minDate:0
		});
	});


</script>


<!-- the script for the toggle all checkboxes from header is located in js/theme.js -->
<script type="text/javascript" src="<?php echo base_url(); ?>ckeditor/ckeditor.js"></script>
    <div class="table-products">
	   <div class="row-fluid head" style="border-bottom: 1px solid #C5C5C5; margin-bottom: 30px;"><div class="span12"><h4>Blog Article Management</h4></div></div>
	   <div class="row-fluid">
		  <div id="main-stats">
			 <div class="table-products">
				<div class="row-fluid head"><div class="span12"><h4>Add Blog Article ( <span style="color: red;">*</span>  Fields are mandatory)</h4></div></div>
				<div class="row-fluid filter-block">
					  <div class="pull-right"><a class="btn-flat new-product" href="<?php echo site_url('blog_article/index'); ?>">< View List</a></div>
				</div>
				<div class="row-fluid form-wrapper">
				    <!-- left column -->
				    <div class="span9 with-sidebar" style="margin-bottom: 30px;">
					   <div class="container">
						  <form class="new_user_form" enctype="multipart/form-data" action="<?php echo site_url('blog_article/insert_blog_article');?>" name="new_blog_article" id="new_blog_article" method="post" autocomplete="off">
							 <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
							       <label><span style="color: red;">*</span> Blog Category :</label>
							       <?php $TypeData = $this->modelblog_article->Getblog_type();?>
							       <div class="ui-select">
								   <select name="blog_type" id="blog_type" label="Blog Type" class="span9 required" style="width: 130%;">
								      <option value="">Select Type</option>
								      <?php
								      foreach($TypeData as $data_type)
								      {
								      ?>
								      <option value="<?php echo $data_type->id;?>"><?php echo $data_type->blogname;?></option>     
								      <?php
								      }
								      ?>
								   </select>  
							       </div>
								<div id="blog_type_error" class="error_div" style="color:red;"></div>
							 </div>
							 <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label><span style="color: red;">*</span> Blog Title :</label>
								<input type="text" class="span9 required" label="Blog Title" name="blog_title" id="blog_title" style="width: 50%;">
								<div id="blog_title_error" class="error_div" style="color:red;"></div>
							 </div>
							 <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label>Upload image :</label>
								<input type="file" name="image" id="image" class="span9" label="Image">
								<div id="image_error" class="error_div" style="color:red;"></div>
							 </div>
							 <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label>Upload Vedio :</label>
								      <input type="radio" name="blog_video_type" id="form_video_url_yt" value='1' onclick="go_video_type(1);">&nbsp;&nbsp;Youtube Link &nbsp;&nbsp;&nbsp;
								      <input type="radio" name="blog_video_type" id="form_video_url_vm" value='2' onclick="go_video_type(2);">&nbsp;&nbsp;Vimeo Link &nbsp;&nbsp;&nbsp;
								      <input type="radio" name="blog_video_type" id="form_image_url" value='3' onclick="go_video_type(3);">&nbsp;&nbsp;Upload Video
							 </div>
							 <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;" id="youtube_link">
							       <label>Youtube link :</label>
							       <input class="span9" type="text" name="blog_vedio_youtube" id="youtube_video_url" value="" style="width: 50%;">
							 </div>
							 <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;" id="vemio_link">
							       <label>Vemio link :</label>
							       <input class="span9" type="text" name="blog_vedio_vemio" id="vimeo_video_url" value="" style="width: 50%;">
							 </div>
							 <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;" id="upload_own">
							       <label>Upload vedio :</label>
							       <input type="file" name="blog_video" id="upload_vedio" >
							       <div id="upload_vedio" class="error_div" style="color:red;"></div>
							 </div>
							 <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label><span style="color: red;">*</span> Blog Description :</label>
								<textarea class="span9" label="Blog Description" name="blog_desc" id="blog_desc"></textarea>
								<div id="blog_desc_error" class="error_div" style="color:red;"></div>
								
							 </div>
							 <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label>Placeholder :</label>
								<div>Write [VIDEO] in textarea to place your vedio<br/>Write [IMAGE] in textarea to place your image</div>
							 </div>
							 
							<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label><span style="color: red;">*</span> Publish Date :</label>
								<input type="text"  class="span9 required" label="Publish Date" name="publish_date" id="publish_date" style="width: 50%;"/>
							       <!--<input type="text" readonly="readonly" class="span9" name="end_date" id="end_date" value="" label="End Date" >-->
							 </div>

							 
							 <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label><span style="color: red;">*</span> Status :</label>
								<div class="ui-select">
								      <select label="Status" name="status" id="status" style="width: 130%;">
									     <option value="1">Active</option>
									     <option value="0">Inactive</option>
								      </select>
								</div>
								<div id="status_error" class="error_div" style="color:red;"></div>
							 </div>
							 <div class="span11 field-box actions" style="margin-top: 20px;">
								<input type="button" value="Create Blog Article" class="btn-glow primary" id="createBlog_article">
								<span>OR</span>
								<a class="btn-flat new-product" href="<?php echo site_url('blog_article/index'); ?>">Cancel</a>
							 </div>
						  </form>
					   </div>
				    </div>
				</div>
			 </div>
		  </div>
	   </div>
    </div>
    <script type="text/javascript">
	   $(document).ready(function () {
	      $('#youtube_link').hide();
	      $('#vemio_link').hide();
	      $('#upload_own').hide();
	      //$('#youtube_video_url').val()="";
	      //$('#vemio_video_url').val()="";
	      //$('#upload_vedio').val()="";
	      
		  $('#createBlog_article').click(function (e) {
			 e.preventDefault();
			 $('.span9').css('border-color','#B2BFC7');
			 $('.error_div').html('');
			 var element_id,element_value,element_label,error_div,element_validation_type;
			 var required_elements = $('.required')
			 var has_error = 0;
			 required_elements.each(function(){
				element_id = $(this).attr('id');
				element_value = $(this).val();
				element_label = $(this).attr('label');
				element_validation_type = $(this).attr('validation_type');
				error_div = $("#"+element_id+"_error")
				
				if (element_value.search(/\S/)==-1) {
				    error_div.html(element_label+' is required.')
				    has_error++
				}
			 })
			 //if (document.getElementById('article_type').value=="")
			 //{
			 //   document.getElementById('article_type_error').innerHTML="Article Type is required";
			 //   has_error++;
			 //   //return false;
			 //}
			 if(CKEDITOR.instances.blog_desc.getData()=='') {
			    $('#blog_desc_error').html("Blog description is required");
			    $('#blog_desc_error').css('color','red');
			    $('#blog_desc').focus();
			    has_error=has_error+1;
			    
			    }
			 if (document.getElementById('image').value.search(/\S/)!=-1)
			 {
			    var image_type=document.getElementById('image').value;
			    var re = /(\.jpg|\.jpeg|\.bmp|\.gif|\.png)$/i;
			    if(!re.exec(image_type))
			    {
			    document.getElementById("image_error").innerHTML="File extension not supported (Plaese upload .jpg, .jpeg, .png, .gif format image)";
			    document.getElementById("image").focus();
			    has_error++;
			    return false;
			    }		
			 }
			 if (document.getElementById('upload_vedio').value.search(/\S/)!=-1)
			 {
			    var image_type=document.getElementById('upload_vedio').value;
			    var re = /(\.mp4|\.flv|\.jpeg|\.bmp|\.gif|\.png)$/i;
			    if(!re.exec(image_type))
			    {
			    document.getElementById("upload_vedio_error").innerHTML="File extension not supported (Plaese upload .mp4, .jpeg, .png, .gif format image)";
			    document.getElementById("upload_vedio").focus();
			    has_error++;
			    return false;
			    }		
			 }
			 
			 if (has_error==0) {
				$('#new_blog_article').submit();
			 }
		  });
	   });
    </script>
<script>

	      //CKEDITOR.replace('description');
	      //CKEDITOR.resize( '100%', '100%' );
	      CKEDITOR.replace( 'blog_desc',
       {
       
       height: 250,
       width: 600
       });
       function go_video_type(val)
       {
	      var vedio_type = val;
	      if (vedio_type=='1') {
		     //$('#vemio_video_url').val="";
		     //$('#upload_vedio').val="";
		     $('#vemio_link').hide();
		     $('#upload_own').hide();
		     $('#youtube_link').show();
		     //$('#youtube_video_url').val()="";
		     //$('#upload_vedio').val()="";
	      }
	      if (vedio_type=='2') {
		     //$('#vemio_video_url').val()="";
		     //$('#upload_vedio').val()="";
		     $('#upload_own').hide();
		     $('#youtube_link').hide();
		     $('#vemio_link').show();
	      }
	      if (vedio_type=='3') {
		     //$('#youtube_video_url').val()="";
		     //$('#vemio_video_url').val()="";
		     $('#vemio_link').hide();
		     $('#youtube_link').hide();
		     $('#upload_own').show();
	      }
       }			

</script>
<!-- pre load bg imgs -->
<?php $this->load->view('includes/footer'); ?>