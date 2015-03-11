<?php
$this->load->view('includes/header');
//$this->load->view('includes/mytinymce');
?>

<!-- /TinyMCE -->
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
                            <h4>Add WorkField ( <span style="color: red;">*</span>  Fields are mandatory)</h4>
                        </div>
                    </div>
                    <div class="row-fluid filter-block">
                        <div class="pull-right">
                            <a class="btn-flat new-product" href="<?php echo site_url('workfeild/index'); ?>">< View List</a>
                        </div>
                    </div>
                    <div class="row-fluid form-wrapper">
                    <!-- left column -->
                    <div class="span9 with-sidebar" style="margin-bottom: 30px;">
                        <div class="container">
                            <form class="new_user_form" enctype="multipart/form-data" action="<?php echo site_url('workfeild/insert_workfeild');?>" id="frmValidation" method="post">
                                <input type="hidden" name="get_owner" id="get_owner" value="1">
				
				<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
                                    <label><span style="color: red;">*</span>Workfield:</label>
                                    <input type="text" class="span9" name="workfeild" id="workfeild" style="width: 50%;">
				    <div id="workfeild_error" style="color:red;"></div>
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
                                    <input type="button" value="Create Workfield" class="btn-glow primary" id="createSubadmin">
                                    <span>OR</span>
                                    <a class="btn-flat new-product" href="<?php echo site_url('workfeild/index'); ?>">Cancel</a>
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