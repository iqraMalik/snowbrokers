
<?php
//echo $this->session->userdata('user_id')."$$$$";
$dataone_fetch=$this->modelsignup->GetUserDetail($this->session->userdata('user_id'));
//print_r($dataone_fetch);
$data=$dataone_fetch[0];

?>
                  
                   
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
                                        <div class="blogExtrafull">
                                            <div class="LeftTxt">Birth Date :</div>
                                            <div class="RightTxt">
						
					<?php echo $data->date_of_birth;?>
						
					    </div>
                                        </div>
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
							echo 'Not Availale';
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
							echo '0 %';
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
                                	<div class="blogedit"><a href="#"><img src="<?php echo base_url(); ?>images/edit-gray.png" alt=""></a></div>
                            		<div class="clabtxtx">My Club:</div>
                                    <div class="clubname">Ceunch Gym- New York</div>
                                    <div class="clabtxtx">My Instructor:</div>
                                    <div class="clubname">Tom King</div>
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
                                <div class="mapicontxt"><img src="<?php echo base_url(); ?>images/mapicon.png" alt="">Sed ut perspiciatis unde omnis</div>
                                <div class="Maptxt">Dste natus error sit voluptat em accu antium dolore mque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore.
                                </div>
                                <div class="map"><img src="<?php echo base_url(); ?>images/map.jpg" alt="" class="img-responsive"></div>
                            </div>
                            	<div class="Innerarea">
                                <div class="head">My Dashboard</div>
                                <div class="Maptxt">Vitae dicta sunt explicabo Nemo enim ipsam</div>
                                <div class="map"><img src="<?php echo base_url(); ?>images/coomingsoon.jpg" alt="" class="img-responsive"></div>
                            </div>
                            	<div class="Innerarea">
                                	<div class="blogInnerarea">
                                    	<div class="commentsingle">
                                        	<div class="commenttop-top">
                                                <div class="commentimg"><img src="<?php echo base_url(); ?>images/comment1.jpg" alt=""></div>
                                                <div class="commenttextarea">
                                                    <div class="commentopfull">
                                                        <div class="head"><a href="#">Uidem rerum facilis est et expe</a></div>
                                                        <div class="Dayscount">7 days ago</div>
                                                    </div>
                                                    <div class="commenttxt">Beatae vitae dicta sunt explicabo. Nemo enim ipsam. Umnis iste natus error totam rem apesa quaeinventore.</div>
                                                </div>
                                            </div>
                                            <div class="commentbottom-bottom">
                                            	<div class="like-icon"><a href="#">Like</a></div>
                                                <div class="comment-icon"><a href="#">Comment</a></div>
                                            </div>
                                      </div>
                                        <div class="commentsingle">
                                                <div class="commenttop-top">
                                                    <div class="commentimg"><img src="<?php echo base_url(); ?>images/comment2.jpg" alt=""></div>
                                                    <div class="commenttextarea">
                                                        <div class="commentopfull">
                                                            <div class="head"><a href="#">Uidem rerum facilis est et expe</a></div>
                                                            <div class="Dayscount">7 days ago</div>
                                                        </div>
                                                        <div class="commenttxt">Beatae vitae dicta sunt explicabo. Nemo enim ipsam. Umnis iste natus error totam rem apesa quaeinventore.</div>
                                                    </div>
                                                </div>
                                                <div class="commentbottom-bottom">
                                                    <div class="like-icon"><a href="#">Like</a></div>
                                                    <div class="comment-icon"><a href="#">Comment</a></div>
                                                </div>
                                          </div>
                                        <div class="commentsingle">
                                                <div class="commenttop-top">
                                                    <div class="commentimg"><img src="<?php echo base_url(); ?>images/comment1.jpg" alt=""></div>
                                                    <div class="commenttextarea">
                                                        <div class="commentopfull">
                                                            <div class="head"><a href="#">Uidem rerum facilis est et expe</a></div>
                                                            <div class="Dayscount">7 days ago</div>
                                                        </div>
                                                        <div class="commenttxt">Beatae vitae dicta sunt explicabo. Nemo enim ipsam. Umnis iste natus error totam rem apesa quaeinventore.</div>
                                                    </div>
                                                </div>
                                                <div class="commentbottom-bottom">
                                                    <div class="like-icon"><a href="#">Like</a></div>
                                                    <div class="comment-icon"><a href="#">Comment</a></div>
                                                </div>
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
                    	<div class="blogouter">
                        	<div class="headerouter">
					<?php $total_photos = $this->modelsignup->GetTotalPhotos($this->session->userdata('user_id'));?>
                            	<div class="head">My Photos</div>
                                <div class="count"><?php echo $total_photos;?> photos</div>
                            </div>
				
                            <div class="imageouter">
				<?php $photos = $this->modelsignup->GetSelectedPhotos($this->session->userdata('user_id'));
				
				if(count($photos)>0)
				{
					foreach($photos as $val)
					{
				?>
					<div class="Imagesingle"><a href="<?php echo base_url();?>signup/getallphotos/<?php echo $val->albumn_id;?>"><img src="<?php echo base_url().'image_crop_thumb.php?img_path='.PHYSICAL_PATH; ?>images/albumn_photos/thumb_small/<?php echo $val->photos; ?>" alt=""></a></div>
                            <?php
			    
					}
			    
				}
				?>
			    </div>
                            <div class="MorePhoto"><a href="<?php echo base_url();?>signup/all_albumn">More photos</a></div>
                        </div>
                        <div class="blogouter">
                        	<div class="headerouter">
                            	<div class="head">My Videos</div>
                                <div class="count">35 Videos</div>
                            </div>
                            <div class="imageouter">
                            	<div class="Imagesingle">
                            	  <div class="videoicon"><a href="#"><img src="<?php echo base_url(); ?>images/videoicon.png" alt=""></a></div><a href="#"><img src="images/video1.jpg" alt=""></a></div>
                                <div class="Imagesingle"><div class="videoicon"><a href="#"><img src="<?php echo base_url(); ?>images/videoicon.png" alt=""></a></div><a href="#"><img src="images/video2.jpg" alt=""></a></div>
                                <div class="Imagesingle"><div class="videoicon"><a href="#"><img src="<?php echo base_url(); ?>images/videoicon.png" alt=""></a></div><a href="#"><img src="images/video3.jpg" alt=""></a></div>
                                <div class="Imagesingle"><div class="videoicon"><a href="#"><img src="<?php echo base_url(); ?>images/videoicon.png" alt=""></a></div><a href="#"><img src="images/video4.jpg" alt=""></a></div>
                                <div class="Imagesingle"><div class="videoicon"><a href="#"><img src="<?php echo base_url(); ?>images/videoicon.png" alt=""></a></div><a href="#"><img src="images/video5.jpg" alt=""></a></div>
                                <div class="Imagesingle"><div class="videoicon"><a href="#"><img src="<?php echo base_url(); ?>images/videoicon.png" alt=""></a></div><a href="#"><img src="images/video6.jpg" alt=""></a></div>
                                <div class="Imagesingle"><div class="videoicon"><a href="#"><img src="<?php echo base_url(); ?>images/videoicon.png" alt=""></a></div><a href="#"><img src="images/img7.jpg" alt=""></a></div>
                                <div class="Imagesingle"><div class="videoicon"><a href="#"><img src="<?php echo base_url(); ?>images/videoicon.png" alt=""></a></div><a href="#"><img src="images/video8.jpg" alt=""></a></div>
                                <div class="Imagesingle"><div class="videoicon"><a href="#"><img src="<?php echo base_url(); ?>images/videoicon.png" alt=""></a></div><a href="#"><img src="images/video9.jpg" alt=""></a></div>
                            </div>
                            <div class="MorePhoto"><a href="#">More videos</a></div>
                        </div>
                        <div class="blogouter-link">
                        	<div class="headerouter">
                            	<div class="head">My Links</div>
                            </div>
                            <div class="imageouter">
                            	<ul>
                                	<li><a href="#">Beatae vitae dicta sunt explicabo. Nemo enim ipsam.</a></li>
                                    <li><a href="#">Umnis iste natus error totam rem aperiam, eaque ipsa quaeinven- tore.</a></li>
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

