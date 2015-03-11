<?php
$this->load->view('includes/header');
$dataone_fetch = $this->modelblog_article->getDataBlog($this->input->post('ListingUserid'));
//print_r($dataone_fetch[0]);
?>
<!-- the script for the toggle all checkboxes from header is located in js/theme.js -->
<script src="<?php echo base_url();?>js/jwplayer.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>ckeditor/ckeditor.js"></script>
    <div class="table-products">
	   <div class="row-fluid head" style="border-bottom: 1px solid #C5C5C5; margin-bottom: 30px;"><div class="span12"><h4>Blog Article Management</h4></div></div>
	   <div class="row-fluid">
		  <div id="main-stats">
			 <div class="table-products">
				<div class="row-fluid head"><div class="span12"><h4>Edit Blog Article ( <span style="color: red;">*</span>  Fields are mandatory)</h4></div></div>
				<div class="row-fluid filter-block">
					  <div class="pull-right"><a class="btn-flat new-product" href="<?php echo site_url('blog_article/index'); ?>">< View List</a></div>
				</div>
				<div class="row-fluid form-wrapper">
				    <!-- left column -->
				    <div class="span9 with-sidebar" style="margin-bottom: 30px;">
					   <div class="container">
						  <form class="new_user_form" enctype="multipart/form-data" action="<?php echo site_url('blog_article/edit_blog');?>" name="new_blog_article" id="edit_blog_article" method="post" autocomplete="off">
							 <input type="hidden" name="id" id="id" value="<?php echo $this->input->post('ListingUserid'); ?>" />
                                                         <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
							       <label><span style="color: red;">*</span> Blog Category :</label>
							       <?php $TypeData = $this->modelblog_article->Getblog_type();?>
							       <div class="ui-select">
								   <select name="blog_type" id="blog_type" label="Blog Type" class="span9 required" style="width: 130%;">
								      <option value="">Select Type</option>
								      <?php
								      foreach($TypeData as $data_type)
								      {
                                                                            if($data_type->id==$dataone_fetch[0]->blog_catid)
                                                                            {
                                                                                   $article_select="selected";
                                                                            }
                                                                            else
                                                                            {
                                                                                   $article_select="";
                                                                            }
								      ?>
								      <option value="<?php echo $data_type->id;?>" <?php echo $article_select;?>><?php echo $data_type->blogname;?></option>     
								      <?php
								      }
								      ?>
								   </select>  
							       </div>
								<div id="blog_type_error" class="error_div" style="color:red;"></div>
							 </div>
							 <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label><span style="color: red;">*</span> Blog Title :</label>
								<input type="text" class="span9 required" label="Blog Title" name="blog_title" id="blog_title" style="width: 50%;" value="<?php echo $dataone_fetch[0]->title;?>">
								<div id="blog_title_error" class="error_div" style="color:red;"></div>
							 </div>
							 <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label>Upload or Change image :</label>
								<input type="file" name="image" id="image" class="span9" label="Image">
								<div id="image_error" class="error_div" style="color:red;"></div>
                                                                <?php
                                                                    if($dataone_fetch[0]->blog_image !='')
                                                                    {
                                                                ?>
                                                                    <label>Blog Image :(Present Image)</label>
                                                                    <img src="<?php echo GET_LOGO_PATH;?>admin/images/blog_image/thumbs/<?php echo $dataone_fetch[0]->blog_image; ?>" height="80" width="100"><br/>
                                                                <?php
                                                                    }
                                                                ?>
							 </div>
							 <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label>Change or Upload Vedio :</label>
								      <input type="radio" name="blog_video_type" id="form_video_url_yt" value="1" onclick="go_video_type(1);" <?php if($dataone_fetch[0]->vedio_type=='1'){echo "checked";}?>>&nbsp;&nbsp;Youtube Link &nbsp;&nbsp;&nbsp;
								      <input type="radio" name="blog_video_type" id="form_video_url_vm" value="2" onclick="go_video_type(2);" <?php if($dataone_fetch[0]->vedio_type=='2'){echo "checked";}?>>&nbsp;&nbsp;Vimeo Link &nbsp;&nbsp;&nbsp;
								      <input type="radio" name="blog_video_type" id="form_image_url" value="3" onclick="go_video_type(3);" <?php if($dataone_fetch[0]->vedio_type=='3'){echo "checked";}?>>&nbsp;&nbsp;Upload Video
                                                                <?php
                                                                    if($dataone_fetch[0]->vedio_path)
                                                                    {
                                                                ?>
                                                                <label>Current Vedio :</label>
                                                                <?php
                                                                    }
                                                                ?>
                                                            <?php
								if($dataone_fetch[0]->vedio_type=='2')
								{
                                                                    
								    $path = $dataone_fetch[0]->vedio_path;

								    $ArrV = explode('http://vimeo.com/',$path);
								    //print_r($ArrV);
								    $videoID = substr($ArrV[1],0,8); // to get video ID
								    //echo $videoID;
								    $vimdeoIDInt = intval($videoID);
							    ?>
								    <iframe src="http://player.vimeo.com/video/<?php echo $vimdeoIDInt;?>" width="500" height="281" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
							    <?php
								}
								if($dataone_fetch[0]->vedio_type=='1')
								{
								    $videolink = $dataone_fetch[0]->vedio_path;
								    $ytarray=explode("/", $videolink);
								    $ytendstring=end($ytarray);
								    $ytendarray=explode("?v=", $ytendstring);
								    $ytendstring=end($ytendarray);
								    $ytendarray=explode("&", $ytendstring);
								    $ytcode=$ytendarray[0];
								    echo "<iframe width=\"500\" height=\"281\" src=\"http://www.youtube.com/embed/$ytcode\" frameborder=\"0\" allowfullscreen allowscriptaccess></iframe>";
								}
								if($dataone_fetch[0]->vedio_type=='3')
								{
								    $videoPath = base_url().'vedios/blog_vedio/';
							    ?>
								    <div id='jwplayer1' style="width:500px; height:281px;"></div>
								    
								    <script type="text/javascript">
									jwplayer("jwplayer1").setup({
									    'flashplayer': '<?php echo base_url();?>js/player.swf',
									    'file': "<?php echo $videoPath.$dataone_fetch[0]->vedio_path;?>",
									    'height': 281,
									    'width': 500
									});
								    </script>
							    <?php
								}
							    ?>
                                                         </div>
							 <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;" id="youtube_link">
							       <label>Youtube link :</label>
							       <input type="text" name="blog_vedio_youtube" id="youtube_video_url" value="<?php if($dataone_fetch[0]->vedio_type=='1'){echo $dataone_fetch[0]->vedio_path;}?>">
							 </div>
							 <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;" id="vemio_link">
							       <label>Vemio link :</label>
							       <input type="text" name="blog_vedio_vemio" id="vimeo_video_url" value="<?php if($dataone_fetch[0]->vedio_type=='2'){echo $dataone_fetch[0]->vedio_path;}?>">
							 </div>
							 <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;" id="upload_own">
							       <label>Change or Upload vedio :</label>
							       <input type="file" name="blog_video" id="upload_vedio" >
							       <div id="upload_vedio" class="error_div" style="color:red;"></div>
							 </div>
							 <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label><span style="color: red;">*</span> Blog Description :</label>
								<textarea class="span9" label="Blog Description" name="blog_desc" id="blog_desc"><?php echo $dataone_fetch[0]->blog_desc;?></textarea>
								<div id="blog_desc_error" class="error_div" style="color:red;"></div>
								
							 </div>
							 <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label>Placeholder :</label>
								<div>Write [VIDEO] in textarea to place your vedio<br/>Write [IMAGE] in textarea to place your image</div>
							 </div>
							 
							<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
								<label><span style="color: red;">*</span> Publish Date :</label>
								<input type="text" class="span9 required" label="Publish Date" name="publish_date" id="publish_date" readonly="readonly" value="<?php echo $dataone_fetch[0]->publish_date;?>" style="width: 50%;">
								<div id="publish_date_error" class="error_div" style="color:red;"></div>
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
								<input type="button" value="Edit Blog Article" class="btn-glow primary" id="editBlog_article">
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
    
<link type="text/css" href="<?php echo base_url(); ?>datepicker/jquery-ui-1.8.21.custom.css" rel="stylesheet" />
<script type="text/javascript" src="<?php echo base_url(); ?>datepicker/jquery-ui-1.8.17.custom.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>datepicker/jquery-ui-timepicker-addon.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>datepicker/jquery-ui-timepicker-addon2.js"></script>
    
    <script type="text/javascript">
	   $(document).ready(function () {
	      $('#youtube_link').hide();
	      $('#vemio_link').hide();
	      $('#upload_own').hide();
	      //$('#youtube_video_url').val()="";
	      //$('#vemio_video_url').val()="";
	      //$('#upload_vedio').val()="";
	      
		  $('#editBlog_article').click(function (e) {
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
			    var re = /(\.mp4|\.jpeg|\.bmp|\.gif|\.png)$/i;
			    if(!re.exec(image_type))
			    {
			    document.getElementById("upload_vedio_error").innerHTML="File extension not supported (Plaese upload .mp4, .jpeg, .png, .gif format image)";
			    document.getElementById("upload_vedio").focus();
			    has_error++;
			    return false;
			    }		
			 }
			 
			 if (has_error==0) {
				$('#edit_blog_article').submit();
			 }
		  });
	   });
    </script>
    <script>
       
       
       
$(function() {
		var dates = $( "#publish_date").datepicker({
			
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
		//var day = d.getDate();
		day = (day>9)?day:'0'+day;
		var year = d.getFullYear();
		//var hours = d.getHours();
		//var minutes = d.getMinutes();
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