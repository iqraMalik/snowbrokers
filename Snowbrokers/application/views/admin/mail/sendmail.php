	
                <script>
		
		function chkFrm()
		{
			// first name checking .................
			if(document.getElementById("subject").value == "")
			{
				
				document.getElementById('subjectr').innerHTML = 'Please Enter the Subject...';
				return false;
			}
			else
			{
				document.getElementById('subjectr').innerHTML = '';
			}
			
			// last name checking .................
			if(document.getElementById("message").value.search(/\S/)==-1)
			{         
				document.getElementById('messageshow').innerHTML = 'Please Enter the Message...';
				return false;
			}
			else
			{
				document.getElementById('messageshow').innerHTML = '';
			}
			
			
			
		}
			
		
		</script>

	
		
		
			<div class="container-fluid">
		  <div id="pad-wrapper" class="users-list" style="margin-top: 0px; padding: 0px;">
                 <div class="row-fluid header" style="margin-bottom: 34px;">
				<a href="<?php echo base_url().'admin/admin_mail_controller/'?>">
                    <h3>Send Mail &nbsp</h3>
                   </a></div>
                </div> 
          
                <!-- Users table -->
                <div class="row-fluid table">
			<?php $attributes = array('class' => 'form-horizontal', 'id' => 'addPage', 'onSubmit' => 'return chkFrm();');
			
			echo validation_errors();
			
			echo form_open_multipart('admin/admin_mail_controller/sendmail',$attributes);
			?>
                    <table class="table table-hover">
			<?php  
						foreach($pages as $row)
						{
							
						
						?>
                        <input type="hidden" value="<?php echo $row['mailid'];?>" name="mailid">
                            <tr>
                                <td class="span4 sortable">
                                    Mail Id
                                </td>
				    <td class="name"><div style="background height: 20px; width: 30px;"><?php echo $row['mailid'];?><?php
			}
			?></div>
                                
				
                            </td>
			    </tr>
			    <tr>
                          <td class="span3 sortable">
                                    Subject
                                </td>
			        <td>
                               <input type="text" name="subject" id="subject" placeholder="subject">
                           <span id="subjectr"></span>
				</td> 
                           </tr>
			    <tr>
                                 <td class="span3 sortable">
                                    Message
                                </td>
                        <td>
                               <textarea name="message" id="message" placeholder="message">
			       </textarea>
			        <span id="messageshow"></span>
                            </td> 
                            </tr>
                        </table>
		    
				<div style="margin-left: 120px;">
					<button class="btn btn-primary" type="submit">Send</button>
					<a href="<?php echo base_url(); ?>admin/admin_mail_controller"><div class="btn" type="reset">Cancel</div></a>
				</div>
                <?php echo form_close(); ?>
                