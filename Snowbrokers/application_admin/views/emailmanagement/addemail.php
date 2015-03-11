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
<!-- /TinyMCE -->
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
                            <h4>Add Email Template ( <span style="color: red;">*</span>  Fields are mandatory)</h4>
                        </div>
                    </div>
                    <div class="row-fluid filter-block">
                        <div class="pull-right">
                            <a class="btn-flat new-product" href="<?php echo site_url('emailmanagement/index'); ?>">< View List</a>
                        </div>
                    </div>
                    <div class="row-fluid form-wrapper">
                    <!-- left column -->
                    <div class="span9 with-sidebar" style="margin-bottom: 30px;">
                        <div class="container">
                            <form class="new_user_form" enctype="multipart/form-data" action="<?php echo site_url('emailmanagement/insert_email');?>" id="frmValidation" method="post">
                                <input type="hidden" name="get_owner" id="get_owner" value="1">
				
				<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
                                    <label><span style="color: red;">*</span>Subject:</label>
                                    <input type="text" class="span9" name="subject" id="subject" style="width: 50%;">
				    <div id="subject_error" style="color:red;"></div>
                                </div>
                               <div class="span6 field-box" style="margin-left: 30px;margin-bottom: 20px;">
					<label><span style="color: red;">*</span>Content:</label>
					<textarea id="tinyeditor" name="details" rows="15" cols="80" style="width: 50%" class="tinymce"></textarea>
					<!--<textarea class="ckeditor" name="details" id="tinyeditor" style="width: 50%;"></textarea>-->
					<div id="details_error" style="color:red;"></div>
				</div>
			       
			        <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 20px;">
					<label>Status:</label>
					 <div class="ui-select">
					    <select name="status" id="status">
						    <option value="1">Active</option>
						    <option value="0">Inactive</option>
					    </select>
					</div>
				</div>
				
			       
				    
                                <div class="span11 field-box actions" style="margin-top: 20px;">
                                    <input type="button" value="Create Template" class="btn-glow primary" id="createSubadmin">
                                    <span>OR</span>
                                    <a class="btn-flat new-product" href="<?php echo site_url('emailmanagement/index'); ?>">Cancel</a>
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
        $('#createSubadmin').click(function (e) {
	    
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