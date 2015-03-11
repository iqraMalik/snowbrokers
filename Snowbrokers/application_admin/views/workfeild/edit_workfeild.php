<?php
$this->load->view('includes/header');
//$this->load->view('includes/mytinymce');
?>
<script src="<?php echo base_url(); ?>asset/ckeditor/ckeditor.js"></script>
<!-- the script for the toggle all checkboxes from header is located in js/theme.js -->
<div class="table-products">
    <div class="row-fluid head" style="border-bottom: 1px solid #C5C5C5; margin-bottom: 30px;">
        <div class="span12">
            <h4>WorkField Management</h4>
        </div>
    </div>
    <div class="row-fluid">
            <div id="main-stats">
                <div class="table-products">
                    <div class="row-fluid head">
                        <div class="span12">
                            <h4>Edit WorkField</h4>
                        </div>
                    </div>
                    <div class="row-fluid filter-block">
                        <div class="pull-right">
                            <a class="btn-flat new-product" href="<?php echo site_url('workfeild/index'); ?>">< View List</a>
                        </div>
                    </div>
                    <div class="row-fluid form-wrapper">
                    <!-- left column -->
                    <?php
                    	if($this->input->post('ListingUserid')!=0)
			$dataone_fetch = $this->modelworkfeild->getworkfeildDetails($this->input->post('ListingUserid'));

                    ?>
                    <div class="span9 with-sidebar" style="margin-bottom: 30px;">
                        <div class="container">
                            <form class="new_user_form" enctype="multipart/form-data" action="<?php echo site_url('workfeild/edit_workfeild');?>" id="frmValidation" method="post">
                    
				<div class="span12 field-box" style="margin-left: 30px;">
                                    <label><span style="color: red;">*</span>WorkField:</label>
                                    <input type="text" value="<?php echo $dataone_fetch[0]->work_feild; ?>" class="span9" name="workfeild" id="workfeild" style="width: 50%;">
				     <div id="workfeild_error" style="color:red;"></div>
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
                                    <input type="button" value="Edit WorkField" class="btn-glow primary" id="createEmail">
                                    <span>OR</span>
                                    <a class="btn-flat new-product" href="<?php echo site_url('workfeild/index'); ?>">Cancel</a>
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
			
			
			$('#workfeild_error').html('');
			
			
			
        	if($.trim($('#workfeild').val())=='' || $.trim($('#workfeild').val())==0)
		{
        		$('#workfeild_error').html('Workfeild Please');
        		$('#workfeild').css('border-color','red');
        		$('#workfeild').focus();
        		return false;
        	}
		
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