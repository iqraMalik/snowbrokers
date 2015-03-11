<?php
$this->load->view('includes/header');
//$this->load->view('includes/mytinymce');
?>
<!--<script src="<?php echo base_url(); ?>asset/ckeditor/ckeditor.js"></script>-->
<script src="<?php echo base_url(); ?>asset/tinymce/js/tinymce/tinymce.dev.js"></script>
<script src="<?php echo base_url(); ?>asset/tinymce/js/tinymce/plugins/table/plugin.dev.js"></script>
<script src="<?php echo base_url(); ?>asset/tinymce/js/tinymce/plugins/paste/plugin.dev.js"></script>
<script src="<?php echo base_url(); ?>asset/tinymce/js/tinymce/plugins/spellchecker/plugin.dev.js"></script>
<script src="<?php echo base_url(); ?>asset/tinymce/js/tinymce_script.js"></script>
<!-- the script for the toggle all checkboxes from header is located in js/theme.js -->
<div class="table-products">
    <div class="row-fluid head" style="border-bottom: 1px solid #C5C5C5; margin-bottom: 30px;">
        <div class="span12">
            <h4>Email Template Management</h4>
        </div>
    </div>
    <div class="row-fluid">
            <div id="main-stats">
                <div class="table-products">
                    <div class="row-fluid head">
                        <div class="span12">
                            <h4>Edit Email Template</h4>
                        </div>
                    </div>
                    <div class="row-fluid filter-block">
                        <div class="pull-right">
                            <a class="btn-flat new-product" href="<?php echo site_url('emailmanagement/index'); ?>">< View List</a>
                        </div>
                    </div>
                    <div class="row-fluid form-wrapper">
                    <!-- left column -->
                    <?php
                    	if($this->input->post('ListingUserid')!=0)
			$dataone_fetch = $this->modelemailmanagement->getEmailDetails($this->input->post('ListingUserid'));

                    ?>
                    <div class="span9 with-sidebar" style="margin-bottom: 30px;">
                        <div class="container">
                            <form class="new_user_form" enctype="multipart/form-data" action="<?php echo site_url('emailmanagement/edit_email');?>" id="frmValidation" method="post">
                    
				<div class="span12 field-box" style="margin-left: 30px;">
                                    <label><span style="color: red;">*</span>Subject:</label>
                                    <input type="text" value="<?php echo $dataone_fetch[0]->subject; ?>" class="span9" name="subject" id="subject" style="width: 50%;">
				     <div id="profilename_error" style="color:red;"></div>
				</div>
                                <div class="span6 field-box" style="margin-left: 30px;margin-bottom: 20px;">
					<label><span style="color: red;">*</span>Content:</label>
					<textarea id="tinyeditor" name="details" rows="15" cols="80" style="width: 50%" class="tinymce"><?php echo $dataone_fetch[0]->details; ?></textarea>
					<!--<textarea class="ckeditor" name="details" id="details" style="width: 50%;"> 
					    <?php echo $dataone_fetch[0]->details; ?>
					</textarea>-->
					<div id="details_error" style="color:red;"></div>
				</div>
				 <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 20px;">
					<label>Status:</label>
					 <div class="ui-select">
					    <select name="status" id="status">
						    <option value="1" <?php if($dataone_fetch[0]->status==1){?> selected <?php }?>>Active</option>
						    <option value="0" <?php if($dataone_fetch[0]->status==0){?> selected <?php }?>>Inactive</option>
					    </select>
					</div>
				</div>
                                
                                <div class="span11 field-box actions" style="margin-top: 20px;">
                                    <input type="button" value="Edit Template" class="btn-glow primary" id="createEmail">
                                    <span>OR</span>
                                    <a class="btn-flat new-product" href="<?php echo site_url('subadmins/index'); ?>">Cancel</a>
                                </div>
                                <input type="hidden" name="ListingUserid" id="ListingUserid" value="<?php echo $dataone_fetch[0]->id; ?>">
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
        $('#createEmail').click(function (e) {
	    
	    //alert("test");
			e.preventDefault();
			$('.span9').css('border-color','#B2BFC7');
			$('#details').css('border-color','#B2BFC7');
			
			$('#subject_error').html('');
			$('#details_error').html('');
			var editorContent = tinymce.get('tinyeditor').getContent();
			
        	if($.trim($('#subject').val())=='' || $.trim($('#subject').val())==0)
		{
        		$('#subject_error').html('Subject Please');
        		$('#subject').css('border-color','red');
        		$('#subject').focus();
        		return false;
        	}
		if(editorContent=='' || editorContent==null) {
        		$('#details_error').html("Add description");
			$('#details_error').css('color','red');
			$('#tinyeditor').focus();
        		return false;
        	}
//		if(CKEDITOR.instances.details.getData()=='') {
//                       $('#details_error').html("Add description");
//                       $('#details_error').css('color','red');
//                       $('#details_error').focus();
//                       has_error=has_error+1;
//                       return false;
//                    }
		else
		{
			$( "#frmValidation" ).submit();
			 return true;
        	}
        });
    });

</script>

<!-- pre load bg imgs -->
<?php $this->load->view('includes/footer'); ?>