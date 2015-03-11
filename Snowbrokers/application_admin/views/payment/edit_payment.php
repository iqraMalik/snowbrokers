<?php
$this->load->view('includes/header');
//print_r($edit_payment);
?>
<div class="table-products">
    <div class="row-fluid head" style="border-bottom: 1px solid #C5C5C5; margin-bottom: 30px;">
        <div class="span12">
            <h4>Payment Management</h4>
        </div>
    </div>
    <div class="row-fluid">
            <div id="main-stats">
                <div class="table-products">
                    <div class="row-fluid head">
                        <div class="span12">
                            <h4>Edit Payment</h4>
                        </div>
                    </div>
                    <div class="row-fluid filter-block">
                        <div class="pull-right">
                            <a class="btn-flat new-product" href="<?php echo site_url('payment/index'); ?>">< View List</a>
                        </div>
                    </div>
                    <div class="row-fluid form-wrapper">
                    <!-- left column -->
                    <div class="span9 with-sidebar" style="margin-bottom: 30px;">
                        <div class="container">
                            <form class="new_user_form" enctype="multipart/form-data" action="<?php echo site_url('payment/update_payment');?>" id="frmValidation" method="post">
			    <input type="hidden" name="payment_id" id="payment_id" value="<?php echo $edit_payment[0]->id;?>"/>
                            
				<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
                                    <label><span style="color: red;">*</span>Task ID:</label>
                                    <input readonly type="text" class="span9" name="task_id" id="task_id" style="width: 50%;" value="<?php echo set_value('task_id'); ?><?php echo $edit_payment[0]->task_id;?>">
				    <div id="task_id_error" style="color:red;"><?php echo form_error('task_id'); ?></div>
                                </div>
				<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
                                    <label><span style="color: red;">*</span>Payment Type:</label>
                                    <input readonly type="text" class="span9" name="payment_type" id="payment_type" style="width: 50%;" value="<?php echo set_value('payment_type'); ?><?php echo ($edit_payment[0]->payment_type==0)?"Credit":"Paypal";?>">
				    <div id="payment_type_error" style="color:red;"><?php echo form_error('payment_type'); ?></div>
                                </div>
				<div class="span12 field-box" style="margin-left: 30px;margin-bottom: 10px;">
                                    <label><span style="color: red;">*</span>Payment Date:</label>
                                    <input readonly type="text" class="span9" name="payment_date" id="payment_date" style="width: 50%;" value="<?php echo set_value('payment_date'); ?><?php echo $edit_payment[0]->payment_date;?>">
				    <div id="payment_date_error" style="color:red;"><?php echo form_error('payment_date'); ?></div>
                                </div>
				
			        <div class="span12 field-box" style="margin-left: 30px;margin-bottom: 20px;">
					<label>Payment Status:</label>
					 <div class="ui-select">
					    <?php if($edit_payment[0]->payment_status=='1'){
						?>
                                            <select disabled name="status" id="status">
						    <option value="1" <?php if($edit_payment[0]->payment_status=='1') { echo "selected";}?>>Completed</option>
						    <option value="0" <?php if($edit_payment[0]->payment_status=='0') { echo "selected";}?>>Pending</option>
					    </select>
					    <?php
					    }
					    else{
						?>
						<select name="status" id="status">
						    <option value="1" <?php if($edit_payment[0]->payment_status=='1') { echo "selected";}?>>Completed</option>
						    <option value="0" <?php if($edit_payment[0]->payment_status=='0') { echo "selected";}?>>Pending</option>
					         </select>
						<?php
					    }
					    ?>
					</div>
				</div>
				
			       
                                <div class="span11 field-box actions" style="margin-top: 20px;">
                                    <input type="button" value="Update Payment" class="btn-glow primary" id="updateTaskCat">
                                    <span>OR</span>
                                    <a class="btn-flat new-product" href="<?php echo site_url('payment/index'); ?>">Cancel</a>
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
	    
    
    $(function () {
        $('#updateTaskCat').click(function (e) {		
		
		
			
		$( "#frmValidation" ).submit();
		return true;
        	
        });
    });

  
</script>
<?php $this->load->view('includes/footer'); ?>