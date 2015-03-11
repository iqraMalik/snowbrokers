
<?php
//echo $this->session->userdata('user_id')."$$$$";
$dataone_fetch=$this->modelsignup->GetUserDetail($this->session->userdata('user_id'));
//print_r($dataone_fetch);
$data=$dataone_fetch[0];

?>
<script type="text/javascript">	
		$(function(){
			
			$("#modal_instructor_search").live( "click", function(){
				
				$('#myModal-instructor-search').modal('show');
			});
		});
	</script> 
 <script type="text/javascript">
		$(function(){                 
				$("#create_album").live( "click", function(){
							    
							    $('#myModal-create_album').modal('show');
							    //$('#myModal-in').modal('hide');
					});
		});
		
		function instant_change_ajax()
		{
			var frm1=document.new_photo; 
			
			var error =0;		
			
			var files = document.getElementById("photos_albumn_albumns").files;
			len = files.length;
	
	
			for(var i = 0; i < len; i++)
			{
			    var fileName=files[i].name;
			    
			    var ext = fileName.substring(fileName.lastIndexOf('.') + 1);
			   
			    
			    if(ext == "gif" || ext == "GIF" || ext == "JPEG" || ext == "jpeg" || ext == "jpg" || ext == "JPG" || ext == "png" || ext == "PNG")
			    {
				error--;
			    } 
			    else
			    {
				
				    document.getElementById("file_error").style.display="block";
				    document.getElementById("file_error").innerHTML='<div style=color:red>Invalid image (gif,jpg,jpeg, png are allow)</div>';
				    document.getElementById("file_error").focus();
				    error++;
			    }
			}
	    // the file is the first element in the files property
	    //var filesss = document.getElementById('photoimg').files[0];   
			
			
			var ext = fileName.substring(fileName.lastIndexOf('.') + 1);
			//alert(ext);
			if(error < len || error==0)
			{
			    
				
					//var a = document.getElementById('photoimg');
	    
					//for (var i = 0; i < a.files.length; i++) 
						
						//if (i<limit_image) {
							//code
						$("#show_loader").css('display','block');
							document.getElementById("file_error").innerHTML='';
							var options = { 
							target:        '#preview',   // target element(s) to be updated with server response 
							beforeSubmit:  showRequest,  // pre-submit callback				
							success:       showResponse1,  // post-submit callback
							
							// other available options:
							url:'<?php echo site_url('home/upload_albumn_more/'); ?>',	
							      // override for form's 'action' attribute 
							//type:      type        // 'get' or 'post', override for form's 'method' attribute 
							//dataType:  null        // 'xml', 'script', or 'json' (expected server response type) 
							//clearForm: true        // clear all form fields after successful submit 
							//resetForm: true        // reset the form after successful submit 
							// $.ajax options can be used here too, for example: 
							//timeout:   3000 
							};
							$(frm1).ajaxSubmit(options);
						
					
				
			}
		}
		
		function instant_change1() {		
		
		var frm1=document.new_photo; 
		
		var error =0;		
		
		var files = document.getElementById("input05").files;
		len = files.length;


		for(var i = 0; i < len; i++)
		{
		    var fileName=files[i].name;
		    
		    var ext = fileName.substring(fileName.lastIndexOf('.') + 1);
		   
		    
		    if(ext == "gif" || ext == "GIF" || ext == "JPEG" || ext == "jpeg" || ext == "jpg" || ext == "JPG" || ext == "png" || ext == "PNG")
		    {
			error--;
		    } 
		    else
		    {
			
			    document.getElementById("file_error").style.display="block";
			    document.getElementById("file_error").innerHTML='<div style=color:red>Invalid image (gif,jpg,jpeg, png are allow)</div>';
			    document.getElementById("file_error").focus();
			    error++;
		    }
		}
    // the file is the first element in the files property
    //var filesss = document.getElementById('photoimg').files[0];   
		
		
		var ext = fileName.substring(fileName.lastIndexOf('.') + 1);
		//alert(ext);
		if(error < len || error==0)
		{
		    
			
				//var a = document.getElementById('photoimg');
    
				//for (var i = 0; i < a.files.length; i++) 
					
					//if (i<limit_image) {
						//code
					$("#show_loader").css('display','block');
						document.getElementById("file_error").innerHTML='';
						var options = { 
						target:        '#preview',   // target element(s) to be updated with server response 
						beforeSubmit:  showRequest,  // pre-submit callback				
						success:       showResponse1,  // post-submit callback
						
						// other available options:
						url:'<?php echo site_url('home/upload_albumn/'); ?>',	
						      // override for form's 'action' attribute 
						//type:      type        // 'get' or 'post', override for form's 'method' attribute 
						//dataType:  null        // 'xml', 'script', or 'json' (expected server response type) 
						//clearForm: true        // clear all form fields after successful submit 
						//resetForm: true        // reset the form after successful submit 
						// $.ajax options can be used here too, for example: 
						//timeout:   3000 
						};
						$(frm1).ajaxSubmit(options);
					
				
			
		}
		
	}
	
	function showRequest(formData, jqForm, options) {
				//var $=jQuery.noConflict();
			// formData is an array; here we use $.param to convert it to a string to display it 
			// but the form plugin does this for you automatically when it submits the data 
			var queryString = $.param(formData); 
		     
			// jqForm is a jQuery object encapsulating the form element.  To access the 
			// DOM element for the form do this: 
			 //var formElement = jqForm[0]; 
		    
			//alert('About to submit: \n\n' + queryString); 
		     
			// here we could return false to prevent the form from being submitted; 
			// returning anything other than false will allow the form submit to continue 
			return true;
	}
	function showResponse1(responseText, statusText, xhr, $form)  {
		
		//document.getElementById('photo').innerHTML=responseText;
		
		//$("#image_load").html("");
		//$("#image_load").html('<img id="photo" src="'+responseText+'">');
		//var res = responseText.split("crop_thumb/"); 
		
		$("#preview").val(responseText);
		$("#post_cancel_btn").css('display','block');
		//document.getElementById('photo_albumn').value='';
		//
		$("#can_image").css('display','');
		$("#show_loader").css('display','none');
	
 
	}
	
	function del_image(image,id)
	{
	    var total_photos = $('#total_photos').val(); 
		var res = confirm("Are you sure to delete this image?");
		
		
		if (res==true) {
				$.ajax({
			   url: "<?php echo base_url(); ?>signup/del_image",
			   data: {
			       image:image,
			       id:id
			   },
			   success: function(response) {
			     var total_photosnow = total_photos-1;
                                $('#total_photos').val(total_photosnow); 
				   $("#"+id).remove();
				    if (total_photosnow==0) {
                                    $("#post_cancel_btn").css('display','none');
                               }
				   
			   }
		      });
		}
	}
	
	function instant_change1_ie()
	{
	    
	    var fuData = document.getElementById('input05');
		    var FileUploadPath = fuData.value;
	    
		    var Extension = FileUploadPath.substring(
		    FileUploadPath.lastIndexOf('.') + 1).toLowerCase();
	    
		    if (Extension == "gif" || Extension == "png" || Extension == "jpeg" || Extension == "jpg")
		    {
			    
		    
			    document.getElementById("new_photo").submit();
			    
		    } 	
		    else
		    {
			    
			    $("#file_error").html('Photo only allows file types of GIF, PNG, JPG, and JPEG.');
			    
		    
		    }
	}
	
	
	</script> 
                </div> <!-- /.row-->
                <div class="row">
                    <button type="button" class="sidebar-trigger">
                      <span class="sr-only">Toggle navigation</span>
                      <span class="dudh-bar"></span>
                      <span class="dudh-bar"></span>
                      <span class="dudh-bar"></span>
                    </button>
                    <button type="button" class="sidebar-trigger-new">
                      <span class="sr-only">Toggle navigation</span>
                      <span class="dudh-bar"></span>
                      <span class="dudh-bar"></span>
                      <span class="dudh-bar"></span>
                    </button>
                </div>
		<?php
				if($this->session->userdata('success_msg')!='')
				{
				?>
				<div class="alert_success">
				<?php
					echo $this->session->userdata('success_msg');
					$this->session->unset_userdata('success_msg');
				?>
				</div>
				<?php
				}
				?>
      			<div class="row row-outer">
                	<div class="col-md-9 col-xs-12">
                    	<div class="innerblogfull clearfix">
                            <div class="Right-Profile">
                            	<div class="blogoutersingle">
					<form>
                                	<div class="blogedit"><a href="#" id="modal-update"><img src="<?php echo base_url(); ?>images/edit-gray.png" alt="" id="show_save"></a></div>
                            		<div class="blogExtra">
					<div class="blogExtrafull">
						<div class="LeftTxt">Country :</div>
						<div class="RightTxt">
							 <?php $getcountry = $this->modelgoals->GetCountryName($data->country_id);
							
							 if($getcountry !='' OR $getcountry !=0)
							 {
								echo $getcountry;
							 }
							 else{
								echo "Not Available.";
							 }
							
							
							 ?>
							
						</div>
                                        </div>
					<div class="blogExtrafull">
                                            <div class="LeftTxt">State :</div>
                                            <div class="RightTxt">
						<?php $getstate = $this->modelgoals->GetStateName($data->country_id,$data->state_id);
						
						 if($getstate !='' OR $getstate !=0)
							 {
								echo $getstate;
							 }
							 else{
								echo "Not Available.";
							 }
							
							
							 ?>
							    
							 
					    </div>
                                        </div>
                                        <div class="blogExtrafull">
                                            <div class="LeftTxt">Location :</div>
                                            <div class="RightTxt">
						<?php echo $data->location;?>
					    </div>
                                        </div>
					<?php
					if($data->mark !=1)
					{
					?>
                                        <div class="blogExtrafull">
                                            <div class="LeftTxt">Birth Date :</div>
                                            <div class="RightTxt">
						
					<?php echo $data->date_of_birth;?>
						
					    </div>
                                        </div>
					<?php
					}
					?>
                                	</div>
                                    <div class="blogExtra">
                                        <div class="blogExtrafull">
                                            <div class="LeftTxt">Sport 1 :</div>
                                            <div class="RightTxt">
						<?php $SportsyData1 = $this->modelgoals->GetAllSports1Name($data->sports1);
						 
						 if($SportsyData1 !='' OR $SportsyData1 !=0)
							 {
								echo $SportsyData1;
							 }
							 else{
								echo "Not Available.";
							 }
							
							
							 ?>
					    </div>
                                        </div>
                                        <div class="blogExtrafull">
                                            <div class="LeftTxt">Sport 2 :</div>
                                            <div class="RightTxt">
						<?php $SportsyData2 = $this->modelgoals->GetAllSports1Name($data->sports2);
						 if($SportsyData2 !='' OR $SportsyData2 !=0)
							 {
								echo $SportsyData2;
							 }
							 else{
								echo "Not Available.";
							 }
							
							
							 ?>
					    </div>
                                        </div>
                                        <div class="blogExtrafull">
                                            <div class="LeftTxt">Sport 3 :</div>
                                            <div class="RightTxt">
						<?php $SportsyData3 = $this->modelgoals->GetAllSports1Name($data->sports3);
						 if($SportsyData3 !='' OR $SportsyData3 !=0)
							 {
								echo $SportsyData3;
							 }
							 else{
								echo "Not Available.";
							 }
							
							
							 ?>
						
						</select>
					    </div>
                                        </div>
                                	</div>
                                    <div class="blogExtra">
                                        <div class="blogExtrafull">
                                            <div class="LeftTxt">Goal 1 :</div>
                                            <div class="RightTxt">
						<?php $GoalsData = $this->modelgoals->GetAllGoalsName($data->goal1);
						 if($GoalsData !='' OR $GoalsData !=0)
							 {
								echo $GoalsData;
							 }
							 else{
								echo "Not Available.";
							 }
							
							
							 ?>
							
					    </div>
                                        </div>
                                        <div class="blogExtrafull">
                                            <div class="LeftTxt">Goal 2 :</div>
                                            <div class="RightTxt">
						<?php $GoalsData2 = $this->modelgoals->GetAllGoalsName($data->goal2);
						 if($GoalsData2 !='' OR $GoalsData2 !=0)
							 {
								echo $GoalsData2;
							 }
							 else{
								echo "Not Available.";
							 }
							
							
							 ?>
							
					    </div>
                                        </div>
                                        <div class="blogExtrafull">
                                            <div class="LeftTxt">Goal 3 :</div>
                                            <div class="RightTxt">
						<?php $GoalsData3 = $this->modelgoals->GetAllGoalsName($data->goal3);
						 if($GoalsData3 !='' OR $GoalsData3 !=0)
							 {
								echo $GoalsData3;
							 }
							 else{
								echo "Not Available.";
							 }
							
							
							 ?>
							
					    </div>
                                        </div>
                                	</div>
                                    <div class="blogExtra">
                                        <div class="blogExtrafull">
                                            <div class="LeftTxt">Length :</div>
                                            <div class="RightTxt">
						<?php echo $data->tall ;?>
						<?php
						if($data->unit_system !=0 AND $data->unit_system==1)
						{
							echo ' ft/inch';
						}
						elseif($data->unit_system !=0 AND $data->unit_system==2)
						{
							echo ' cm';
						}
						else{
							echo 'Not Available.';
						}
						?>
					    </div>
                                        </div>
                                        <div class="blogExtrafull">
                                            <div class="LeftTxt">Weight :</div>
                                            <div class="RightTxt">
						<?php
						if($data->weigh !='')
						{
							echo $data->weigh;
							if($data->unit_system !=0 AND $data->unit_system==1)
							{
								echo ' lbs';
							}
							elseif($data->unit_system !=0 AND $data->unit_system==2)
							{
								echo ' kg';
							}
						}
						else
						{
							echo 'Not Availale.';
						}
						?>
						
					    </div>
                                        </div>
                                        <div class="blogExtrafull">
                                            <div class="LeftTxt">Body type :</div>
                                            <div class="RightTxt">
						<?php $bodytype = $this->modelgoals->GetAllBodytypeName($data->bodytype);
						if($bodytype !='' OR $bodytype !=0)
							 {
								echo $bodytype;
							 }
							 else{
								echo "Not Available.";
							 }
							
							
							 ?>
							
					    </div>
                                        </div>
                                        <div class="blogExtrafull">
                                            <div class="LeftTxt">Body fat :</div>
                                            <div class="RightTxt">
						<?php
						if($data->fat !='')
						{
							echo $data->fat.'%';
						}
						else
						{
							echo 'Not Available.';
						}
						?>
					    </div>
                                        </div>
                                        <div class="blogExtrafull">
                                            <div class="LeftTxt">Lifestyle :</div>
                                            <div class="RightTxt">
						<?php $lifestyle = $this->modelgoals->GetAllLifestyleName($data->lifestyle);
						//echo "<pre>";
						//print_r($lifestyle);
						if($lifestyle !='' OR $lifestyle !=0)
							 {
								if(count($lifestyle)>0)
								{
									foreach($lifestyle as $val)
									{
										echo $val->name."<br />";
									}
								}
								
							 }
							 else{
								echo "Not Available.";
							 }
							
							
							 ?>
							
					    </div>
                                        </div>
                                	</div>
                                </div>
				</form>
                               <div class="blogoutersingle">
                                	<div class="blogedit"><a href="#" id="modal_instructor_search"><img src="<?php echo base_url(); ?>images/edit-gray.png" alt=""></a></div>
                            		<div class="clabtxtx">My Club:</div>
                                    <div class="clubname"><a href="#">Ceunch Gym- New York</a></div>
                                    <div class="clabtxtx">My Instructor:</div>
                                    <div class="clubname"><a href="#">Tom King</a></div>
                                </div>
                                 <div class="blogoutersingle">
                                	<div class="head">My Visitors</div>
                                	<div class="commenttop-top">
                                                <div class="commentimg"><img alt="" src="<?php echo base_url(); ?>images/comment1.jpg"></div>
                                                <div class="commenttextarea">
                                                    <div class="commentopfull">
                                                        <div class="head-small"><a href="#">Jessica singh</a></div>
                                                    </div>
                                                    <div class="blogExtrafull">
                                                        <div class="commenttxt">Location :</div>
                                                        <div class="RightTxt">Newyork</div>
                                                    </div>
                                                    <div class="blogExtrafull">
                                                        <div class="commenttxt">Sports no :</div>
                                                        <div class="RightTxt">1</div>
                                                    </div>
                                                </div>
                                            </div>
                                    <div class="commenttop-top">
                                                <div class="commentimg"><img alt="" src="<?php echo base_url(); ?>images/comment2.jpg"></div>
                                                <div class="commenttextarea">
                                                    <div class="commentopfull">
                                                        <div class="head-small"><a href="#">Jessica singh</a></div>
                                                    </div>
                                                    <div class="blogExtrafull">
                                                        <div class="commenttxt">Location :</div>
                                                        <div class="RightTxt">Newyork</div>
                                                    </div>
                                                    <div class="blogExtrafull">
                                                        <div class="commenttxt">Sports no :</div>
                                                        <div class="RightTxt">1</div>
                                                    </div>
                                                </div>
                                            </div>
                                    <div class="commenttop-top">
                                                <div class="commentimg"><img alt="" src="<?php echo base_url(); ?>images/comment1.jpg"></div>
                                                <div class="commenttextarea">
                                                    <div class="commentopfull">
                                                        <div class="head-small"><a href="#">Jessica singh</a></div>
                                                    </div>
                                                    <div class="blogExtrafull">
                                                        <div class="commenttxt">Location :</div>
                                                        <div class="RightTxt">Newyork</div>
                                                    </div>
                                                    <div class="blogExtrafull">
                                                        <div class="commenttxt">Sports no :</div>
                                                        <div class="RightTxt">1</div>
                                                    </div>
                                                </div>
                                            </div>
                                    <div class="commenttop-top">
                                                <div class="commentimg"><img alt="" src="<?php echo base_url(); ?>images/comment2.jpg"></div>
                                                <div class="commenttextarea">
                                                    <div class="commentopfull">
                                                        <div class="head-small"><a href="#">Jessica singh</a></div>
                                                    </div>
                                                    <div class="blogExtrafull">
                                                        <div class="commenttxt">Location :</div>
                                                        <div class="RightTxt">Newyork</div>
                                                    </div>
                                                    <div class="blogExtrafull">
                                                        <div class="commenttxt">Sports no :</div>
                                                        <div class="RightTxt">1</div>
                                                    </div>
                                                </div>
                                            </div>
                                    <div class="commenttop-top">
                                                <div class="commentimg"><img alt="" src="<?php echo base_url(); ?>images/comment1.jpg"></div>
                                                <div class="commenttextarea">
                                                    <div class="commentopfull">
                                                        <div class="head-small"><a href="#">Jessica singh</a></div>
                                                    </div>
                                                    <div class="blogExtrafull">
                                                        <div class="commenttxt">Location :</div>
                                                        <div class="RightTxt">Newyork</div>
                                                    </div>
                                                    <div class="blogExtrafull">
                                                        <div class="commenttxt">Sports no :</div>
                                                        <div class="RightTxt">1</div>
                                                    </div>
                                                </div>
                                            </div>
                                    <div class="MorePhoto"><a href="#">More visitors</a></div>
                                </div>
                            </div>
                          <div class="Innermidbox">
                            	<div class="Innerarea">
                                <div class="head">Activity Map</div>
                                <div class="mapicontxt"><img src="images/mapicon.png" alt="">Sed ut perspiciatis unde omnis</div>
                                <div class="Maptxt">Dste natus error sit voluptat em accu antium dolore mque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore.
                                </div>
                                <div class="map"><img src="<?php echo base_url(); ?>images/map.jpg" alt="" class="img-responsive"></div>
                            </div>
                            	<div class="Innerarea">
                                <div class="head">My Dashboard</div>
				<div class="map"><img src="<?php echo base_url(); ?>images/coomingsoon.jpg" alt="" class="img-responsive">
				</div>
                                <div class="faceouter">
                                <script>
								$(document).ready(function() {
                                	$(".uploadstatusi").click(function(){
										  $(".textareabox").show();
										  $(".photoarea").hide();
										  $(".uploadstatusi").addClass("active");
										  $(".videoarea").removeClass("active");
										  
										  $.ajax({
												url: "<?php echo base_url(); ?>signup/cancel_image",
												data: {			       
												    user_ids:<?php echo $this->session->userdata('user_id');?>,
												},
												success: function(response) {
												
													$("#post_cancel_btn").css('display','none');
													$("#preview").empty();
													
												}
											   });
										});
									$(".videoarea").click(function(){
										  $(".textareabox").hide();
										  $(".photoarea").show();
										  $(".uploadstatusi").removeClass("active");
										  $(".videoarea").addClass("active");						  
									
												
										$("#post_cancel_btn").css('display','none');
										$("#text_area_status").val('');
													
												
											  
										   
										});
									});
                                </script>
                                	<div class="faceiconbar clearfix">
                                    	<div class="uploadstatusi active"><a href="javascript:void(0);">Update Your Status</a></div>
                                        <div class="videoarea"><a href="javascript:void(0);">Add Photos/Video</a></div>
                                    </div>
                                    <div class="textareabox">
                                	<textarea id="text_area_status" class="commentarea" style="margin-bottom:10px" name="" cols="1" rows="1" onkeyup="write_data()" placeholder="what,s on your mind"></textarea>
                                    </div>
					<form class="new_user_form" enctype="multipart/form-data" action="<?php echo site_url('home/upload_albumn_ie/'); ?>" name="new_photo" id="new_photo" method="post">

						<div class="photoarea" style=" display: none">
						    <div class="uploadarea fileinput3">
							     <?php
							    if (stristr($_SERVER["HTTP_ACCEPT"], "application/xhtml+xml")) {
							    ?>
								    <input type="file" id="input05" onchange="instant_change1();" name="photos_albumn[]" multiple="true">
							    <?php
							    }
							    else{
								    ?>
									    <input type="file" id="input05" onchange="instant_change1_ie();" name="photos_albumn_ie" >
	    
								    <?php
							    }
							    ?>
						    </div>
						    <div class="uploadarea fileinput4">
						    <input type="file" id="input09">
						    </div>
						</div>
						 <div id="file_error" style="color:red;"></div>
						<div id="preview" class="clearfix">		    
					       </div>
						<img id="show_loader" style="display:none;padding-left:157px;" src="<?php echo base_url();?>images/loading.gif">
					</form>
                                    <div class="">
                                        <div class="load_but" id="post_cancel_btn" style="display:none;">
						<a href="javascript:void(0);" style="float:left;padding: 0 121px;" id="post_data">Post</a>
						<a href="javascript:void(0);" style="padding: 0 108px;" id="can_image">Cancel</a>
					</div>
                                    </div>
                                </div>
                                
                            </div>
                            	<div class="Innerarea">
                                	<div class="blogInnerarea">
						<div id="show_fetch">
							<?php
							$user_pic=$this->modelhome->user_pic();
							$result=$this->modelhome->update_status_one($this->session->userdata('user_id'));
							
							
							if(count($result)>0 AND $result !=0)
							{
							    foreach($result as $val)
							    {
								$username = $this->modelhome->user_name();
								?>
								<!----------------- photos section starts-------------------------->
							<div class="commentsingle">
								<div class="commenttop-top">
								<div class="commentimg"><img src="<?php echo base_url();?>image_crop_thumb.php?img_path=<?php echo PHYSICAL_PATH;?>images/profile_pic/crop_kept_thumb/<?php echo $user_pic;?>&width=59&height=58" alt=""></div>
								<div class="commenttextarea">
								   
								  <?php
								  if(($val->photo_flag !=0 OR $val->photo_flag !='') AND $val->activity_type==2)
								  {
									
									//echo "in photo flag<br />";
									//echo $val->id;
									//echo "<br />";
									$photo=$this->modelhome->update_status_photo($val->photo_flag);
									if(count($photo)>0 AND $photo !=0)
									{
										$pic_duration = $this->modelhome->TimelineDuration($val->posted_on);

										?>
										<div class="commentopfull">
										       <div class="head"><a href="#"><?php echo $username;?> &nbspAdded <?php echo count($photo);?> New Photos</a></div>
										       <div class="Dayscount"><?php echo $pic_duration;?></div>
									       </div>
									<?php
									      foreach($photo as $photo_val)
									      {
									?>
										  <div class="commenttxt" style="float:left; padding-left: 5px;padding-top: 5px;"><img src="<?php echo base_url();?>image_crop_thumb.php?img_path=<?php echo PHYSICAL_PATH;?>images/albumn_photos/thumb_medium/<?php echo $photo_val->photos;?>&width=120&height=120" alt=""></div>
									      <?php
									      }
									}
								  }
								   else if($val->activity_type==3)
								   {
									
									 $user_thoughts=$this->modelhome->update_status_data_only($val->thoughts_id);
									 $user_thought_duration = $this->modelhome->TimelineDuration($val->posted_on);
									if(count($user_thoughts)>0 AND $user_thoughts !=0)
									{
										?>
										<div class="commentopfull">
										       <div class="head"><a href="#"><?php echo $username;?> &nbspAdded New Status</a></div>
										       <div class="Dayscount"><?php echo $user_thought_duration;?></div>
									       </div>
									       <?php
									      
									      foreach($user_thoughts as $user_thoughts_val)
									      {
										?>
											<div class="commenttxt" style="float:left; padding-left: 5px;padding-top: 5px;"><?php echo $user_thoughts_val->thoughts; ?></div>

										<?php
										
									       }
									}
							    
							           }
								  
								  ?>
								</div>
							    </div>
							    <div class="commentbottom-bottom">
								<div class="like-icon"><a href="#">Like</a></div>
								<div class="comment-icon"><a href="#">Comment</a></div>
							    </div>
						      </div>
							<!----------------- photos section ends-------------------------->
							
								<?php
								}
							}	

							
							
							?>
							
						</div>
                                       
                                    </div>
                                    <div class="Wrightcomment">
                                    	<div class="toptextara">
                                        	<input type="file" id="input03">
                                        </div>
                                    	<textarea name="" cols="1" rows="1" id="text_area" class="commentarea" placeholder="Write comment..."></textarea>
                                    </div>
                                    <div class="">
                                    	<div class="load_but"><a href="#">load more</a></div>
                                    </div>
                            	</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 blogouter-right">
			<script>
			$(document).ready(function(){
				
						
						
						//Examples of how to assign the ColorBox event to elements
						$(".group1").colorbox({rel:'group1',transition:"none", width:"40%", height:"40%"});
						
						
						//Example of preserving a JavaScript event for inline calls.
						
					});
			</script>
                    	<div class="blogouter">
                        	<div class="headerouter">
                            	<div class="head">My Photos</div>
				<?php $total_photos = $this->modelsignup->GetTotalPhotos($this->session->userdata('user_id'));?>
                                <div class="count"><?php  if($total_photos !='' || $total_photos !=0){ echo $total_photos;}else{ echo '0';}?> photos</div>
                            </div>
				 
                            <div class="imageouter">
				<?php $photos = $this->modelsignup->GetSelectedPhotos($this->session->userdata('user_id'));
				
				if(count($photos)>0)
				{
				    if(count($photos)<9)
				    {
					for($i=0;$i<count($photos);$i++)
					{
				?>
						<div class="Imagesingle" ><a href="<?php echo base_url();?>images/albumn_photos/thumb_large/<?php echo $photos[$i]->photos;?>" class="group1" id="slider_mode"><img id="slider2" src="<?php echo base_url();?>image_crop_thumb.php?img_path=<?php echo PHYSICAL_PATH;?>images/albumn_photos/thumb_medium/<?php echo $photos[$i]->photos;?>&width=84&height=80" alt=""></a></div>
				<?php
					}
				    }
				    else
				    {
					for($i=0;$i<9;$i++)
					{
					?>
						<div class="Imagesingle" ><a href="<?php echo base_url();?>images/albumn_photos/thumb_large/<?php echo $photos[$i]->photos;?>" class="group1" id="slider_mode"><img id="slider2" src="<?php echo base_url();?>image_crop_thumb.php?img_path=<?php echo PHYSICAL_PATH;?>images/albumn_photos/thumb_medium/<?php echo $photos[$i]->photos;?>&width=84&height=80" alt=""></a></div>
					<?php
					}
					
				    }
			    
					
			    
				}
				else{
					echo "No photos";
				}
				?>
                                
			    </div>
			   <?php
			   if(count($photos)>9)
			   {
			   ?>
				<div class="MorePhoto">
					<div style="float:left">
				    <a href="javascript:void(0);" style="padding-right: 125px;" id="more_slider_pic">More photos</a>
					</div>
			   
				
				</div>
				<?php
				}
				?>
                        </div>
                        <div class="blogouter">
                        	<div class="headerouter">
                            	<div class="head">My Videos</div>
                                <div class="count">35 Videos</div>
                            </div>
                            <div class="imageouter">
                            	<div class="Imagesingle">
                            	  <div class="videoicon"><a href="#"><img src="<?php echo base_url(); ?>images/videoicon.png" alt=""></a></div><a href="#"><img src="<?php echo base_url(); ?>images/video1.jpg" alt=""></a></div>
                                <div class="Imagesingle"><div class="videoicon"><a href="#"><img src="<?php echo base_url(); ?>images/videoicon.png" alt=""></a></div><a href="#"><img src="<?php echo base_url(); ?>images/video2.jpg" alt=""></a></div>
                                <div class="Imagesingle"><div class="videoicon"><a href="#"><img src="<?php echo base_url(); ?>images/videoicon.png" alt=""></a></div><a href="#"><img src="<?php echo base_url(); ?>images/video3.jpg" alt=""></a></div>
                                <div class="Imagesingle"><div class="videoicon"><a href="#"><img src="<?php echo base_url(); ?>images/videoicon.png" alt=""></a></div><a href="#"><img src="<?php echo base_url(); ?>images/video4.jpg" alt=""></a></div>
                                <div class="Imagesingle"><div class="videoicon"><a href="#"><img src="<?php echo base_url(); ?>images/videoicon.png" alt=""></a></div><a href="#"><img src="<?php echo base_url(); ?>images/video5.jpg" alt=""></a></div>
                                <div class="Imagesingle"><div class="videoicon"><a href="#"><img src="<?php echo base_url(); ?>images/videoicon.png" alt=""></a></div><a href="#"><img src="<?php echo base_url(); ?>images/video6.jpg" alt=""></a></div>
                                <div class="Imagesingle"><div class="videoicon"><a href="#"><img src="<?php echo base_url(); ?>images/videoicon.png" alt=""></a></div><a href="#"><img src="<?php echo base_url(); ?>images/img7.jpg" alt=""></a></div>
                                <div class="Imagesingle"><div class="videoicon"><a href="#"><img src="<?php echo base_url(); ?>images/videoicon.png" alt=""></a></div><a href="#"><img src="<?php echo base_url(); ?>images/video8.jpg" alt=""></a></div>
                                <div class="Imagesingle"><div class="videoicon"><a href="#"><img src="<?php echo base_url(); ?>images/videoicon.png" alt=""></a></div><a href="#"><img src="<?php echo base_url(); ?>images/video9.jpg" alt=""></a></div>
                            </div>
                            <div class="MorePhoto"><a href="#">More videos</a></div>
                        </div>
			
                        <div class="blogouter-link">
                        	<div class="headerouter">
                            	<div class="head">My Links</div>
                            </div>
                            <div class="imageouter">
                            	<ul>
					<?php $links = $this->modelhome->MyLinks();
					if(count($links)>0 AND $links !=0)
					{
					    foreach($links as $links_val)
					    {
						?>

                                	<li><a href="<?php echo $links_val->links;?>"><?php echo $links_val->thoughts;?></a></li>
					<?php
					    }
				        }
					else{
						?>
						<li><a href="javascript:void(0);">No links</a></li>
					<?php
					}
				      ?>
			        </ul>
                            </div>
                        </div>
                        <div class="blogouter-link-gray">
                        	<div class="headerouter">
                            	<div class="head">Unventore veritatis et quasi architecto beatae</div>
                             </div>
                             <div class="description">Molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui offici.Deserunt mollitia animi, id est laborum et dolorum fuga.</div>
                        </div>
                    </div>
                </div> <!-- /.row-->
            </div> <!-- /.container-->
        </section> <!-- /.MainBody -->
        
     

<script type="text/javascript">


function Select_state(country_id)
{
     $.ajax({
                    url: "<?php echo base_url(); ?>index.php/signup/Select_state_profile",
                    async:false,
                    data: {
                     country_id:country_id
                    
                    },
                    success: function(response) {
                      
                           $('#state_profile').html(response);
                            
                           }
                          
                          
                    
                })
}
</script>

	<!--------------------------Album starts  ------------------------>
	
	<div class="modal fade" id="myModal-create_album" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
     <div class="login-inner clearfix">
				
		</div>
		<br />
      <div class="modal-body">
       <h4 class="modal-title">Create Album</h4>
	 <form class="new_user_form" enctype="multipart/form-data" action="<?php echo site_url('home/create_album');?>" name="new_albumn" id="new_albumn" method="post">
            
                    
                    <input type="text" class="textbox" name="albumn_name" id="albumn_name" placeholder="Album name ...." value=""/>
                     <div id="albumn_error" style="color:red; "></div>
                     <div style="padding: 19px 69px 0 87px;">
                        <input type="button" value="Create Album" class="loginbut" id="createUser">
                     </div>
            </form>
      </div>
     
    </div>
  </div>
</div>
	
<script type="text/javascript">
$(document).ready(function () {
   
	$('#createUser').click(function (e) {
		
	    var albumn_name = $('#albumn_name').val();
            if (albumn_name == '') {
               $('#albumn_error').html('Please Give albumn Name!');
            }
            else{
                $('#new_albumn').submit();
            }
                    
                        
                           
                            
                       
		
	});
});

$('#can_image').click(function (e) {
	var total_photos = $("#total_photos").val();
		 var a = $("#text_area_status").val();
		if (total_photos>0) {
			$.ajax({
					url: "<?php echo base_url(); ?>signup/cancel_image",
					data: {			       
					    user_ids:<?php echo $this->session->userdata('user_id');?>,
					},
					success: function(response) {
					
						$("#post_cancel_btn").css('display','none');
						$("#preview").empty();
						
					}
				   });
		}
		else if(total_photos==0 || total_photos=='' || typeof(total_photos)=='undefined'){
			$("#post_cancel_btn").css('display','none');
			$("#text_area_status").val('');
		}
                    
                        
                           
                            
                       
		
	});
$('#post_data').click(function (e) {
		
		var total_photos = $("#total_photos").val();
		 var a = $("#text_area_status").val();
		
		if ((total_photos==0 || total_photos=='' || typeof(total_photos)=='undefined') && a=='') {
			
			alert('This status update appears to be blank. Please write something or attach a link or photo to update your status.');
		}
		else {
			if (total_photos>0) {
				
				var phto_flag = $("#phto_flag").val();
				
				$.ajax({
						url: "<?php echo base_url(); ?>home/update_status",
						data: {			       
						    user_ids:<?php echo $this->session->userdata('user_id');?>,
						    total_photos:total_photos,
						    phto_flag: phto_flag,
						},
						success: function(response) {
							//alert(response);
						$("#show_fetch").prepend(response);
							//$("#show_fetch").html(response);
							 $("#preview").empty();
							 $("#post_cancel_btn").css('display','none');
							
							
						}
					   });
			}
			else if(total_photos==0 || total_photos=='' || typeof(total_photos)=='undefined'){
				
				$.ajax({
						url: "<?php echo base_url(); ?>home/update_status_data",
						data: {			       
						    user_ids:<?php echo $this->session->userdata('user_id');?>,
						    text_area_status:$("#text_area_status").val(),
						    
						},
						success: function(response) {
							//alert(response);
						$("#show_fetch").prepend(response);
							//$("#show_fetch").html(response);
							$("#text_area_status").val('');
							 $("#post_cancel_btn").css('display','none');
							
							
						}
					   });
			}
		}
	});

	function write_data()
	{
		 $("#post_cancel_btn").css('display','');
		 var a = $("#text_area_status").val();
		
		
		
			
			
		 
	}

	


</script>	
	<!-------------------------------- Album ends-------------------------------->
	
	
	<!----------------------------- Instructor search and Add starts----------------->
	<!--<script type="text/javascript" src="<?php echo base_url();?>jquery_suggest/js/jquery-1.4.2.min.js"></script> -->
	  <script type="text/javascript" src="<?php echo base_url();?>jquery_suggest/js/jquery-ui-1.8.2.custom.min.js"></script>
	  <script type="text/javascript"> 
	       //var nofl=jQuery.noConflict();
		$(document).ready(function(){
			$("#link_instructor").autocomplete({source:'<?php echo base_url(); ?>index.php/home/search_instructor', minLength:1});
		});
 
	</script>
        <link rel="stylesheet" href="<?php echo  base_url();?>jquery_suggest/css/jquery-ui-1.8.2.custom.css" /> 
	<style type="text/css"><!--
	
	        /* style the auto-complete response */
	        li.ui-menu-item { font-size:12px !important; }</style> 
	
	<?php
	if($this->session->userdata('user_id') !='')
	{
		?>
	<div class="modal fade" id="myModal-instructor-search" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog-new" style=" margin: 124px 78px 30px;width: 788px;">
    <div class="modal-content">
	
      <div class="modal-header">
	
       <h4 class="modal-title-big" id="myModalLabel">My Instructor</h4>
       
      </div>
<input type="hidden" name="update_user_id" id="update_user_id" value="<?php echo $this->session->userdata('user_id');?>">

      <div class="modal-body clearfix">
        <div class="left">	
		
		<div class="category">Link your Instructor<span>*</span></div>
		 <input type="text" class="span12 required12 textbox" value="" name="link_instructor" id="link_instructor" placeholder="Search by Email Address...">                        
                <div id="link_instructor_error" class="error_div" style="color:red;"></div>
	
        </div>
	 <div class="right" style=" float: left;padding-top: 21px;width: 200px;">
		<input name="" type="button" id="link_instruct" class="loginbut" value="Link Instructor" >

	 </div>
	 <form class="" enctype="multipart/form-data" action="<?php echo site_url('home/new_instructor_create');?>" name="create_instructor" id="create_instructor" method="post" autocomplete="off">

		<div class="left" style="float: right;padding-right: 5px;padding-top: 21px; width: 199px;">
		       <input name="" type="button" id="invite_instruct" class="loginbut" value="Invite Instructor" >
       
		</div>
		
		<div class="right" id="new_instructor_details" style=" float: right;padding-right: 195px;padding-top: 21px;width: 377px;display:none">
		       <input name="full_name" type="text" id="full_name" class="textbox" value="" placeholder="Full name...">
			<div id="full_name_error" class="error_div" style="color:red;"></div>

		       <input name="new_instructor_email" type="text" id="new_instructor_email" class="textbox" value="" placeholder="Email Address...">
			<div id="new_instructor_email_error" class="error_div" style="color:red;"></div>

		       <input name="" type="button" id="invite_new_instruct" class="loginbut" value="Send Invitation" >

       
		</div>
	 </form>
	 <div id="instructors_list" class="left" style="float:none;">
		<?php $show_instructor_list=$this->modelhome->show_instructor_list();
		if(count($show_instructor_list)>0 AND $show_instructor_list !=0)
		{
		   
		    foreach($show_instructor_list as $show_instructor_val)
		    {
		?>
		<div id="email_<?php echo $show_instructor_val->instructor_email;?>">
		    <div style="float:left;color: #ADCA2C;"><?php echo $show_instructor_val->instructor_email;?></div>
		    <div><a href="#" onclick="del_instructor('<?php echo $show_instructor_val->instructor_email;?>')"><img src="<?php echo base_url();?>images/1405090829_cross.png" alt="remove"></a></div>
		</div><br />
		<?php
		
		    }
		}
		else{
			?>
			<div style="float:left;color: #ADCA2C;">No Instructor. Please select one</div>

			<?php
			
		}
		
		?>
		<input type="hidden" id="total_instructor" value="<?php echo count($show_instructor_list);?>"/>
		
	 </div>
      </div>
      <div class="Outerbutton">
      	<!--<input name="" type="button" id="update_prof_comp" class="loginbut" value="Update your profile">-->
      </div>
    </div>
  </div>
   
</div>
	<?php
	}
	?>
	
	<!---------------------------- Instructor search and Add ends------------------->
	<script type="text/javascript"> 
	       //var nofl=jQuery.noConflict();
		$(document).ready(function(){

			$('#link_instruct').click(function (e) {
				
				
				var link_instructor = document.getElementById('link_instructor').value;			
				
				
				if(link_instructor=="")
				{
					$('#link_instructor_error').html('Please Select Instructor!');
				}
				else{
					var total_instructor = $("#total_instructor").val();
					if (total_instructor>=3) {
						$('#link_instructor_error').html('User can Link upto 3 instructors');
					}
					else{
						$.ajax({
							       url: "<?php echo base_url(); ?>index.php/home/instructor_list",
							       async:false,
							       data: {
								link_instructor:link_instructor
							       
							       },
							       success: function(response) {
								 
								   
								    
								       $('#instructors_list').html(response);							
								       
								     
							       }
							       
							   })
					}
					 
		
				}
				
				
			
			});	
			
			$('#invite_instruct').click(function (e) {
				
				$('#new_instructor_details').css("display", "block");
			});
			
			$('#invite_new_instruct').click(function (e) { 
				
				var full_name = document.getElementById('full_name').value;
				var new_instructor_email = document.getElementById('new_instructor_email').value;
				if(full_name=="")
				{
					$('#full_name_error').html('Please Give Full Name!');
				}
				else if (new_instructor_email == '') {
					$('#new_instructor_email_error').html('Please Give Instructor Email!');
					$('#full_name_error').html('');
				}
				else{
					
					$.ajax({
						url: "<?php echo base_url(); ?>index.php/home/unique_instructor",
						async:false,
						data: {
						 new_instructor_email:new_instructor_email
						
						},
						success: function(response) {
						 
						    if (response==0 || response =='') {
							$('#create_instructor').submit();
						    }
						    else{
							 $('#new_instructor_email_error').html('Email Already Exists!');						
						    }
						      
						}
						
					})					
						
					
				}
			});
		});
		
		function del_instructor(instructor_email)
		{
			var res = confirm("Are you Sure to delete "+instructor_email+" Instructor");
			if (res) {
				
			
				$.ajax({
					url: "<?php echo base_url(); ?>index.php/home/delete_instructor",
					async:false,
					data: {
					 instructor_email:instructor_email
					
					},
					success: function(response) {
					  
					    
					     var a = $("#email_"+instructor_email).html();
					     
						$("#email_"+instructor_email).remove();							
						
					      
					}
					
				})
			}
		}
 
	</script>