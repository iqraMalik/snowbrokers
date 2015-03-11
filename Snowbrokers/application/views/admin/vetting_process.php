<?php
$flash_message=$this->session->flashdata('flash_message');
if(isset($flash_message))
{
    if($flash_message == 'set_updated')
    {
	echo '<div class="alert alert-success">';
	echo '<i class="icon-ok-sign"></i><strong>Success!</strong>Information successfully updated.';
	echo '</div>';
     }

    if($flash_message == 'set_not_updated')
  
	{
	echo'<div class="alert alert-error">';
	echo'<i class="icon-remove-sign"></i><strong>Error!</strong> in updation. Please try again.';        
	echo'</div>';
	}
	    
}
?>
<script>
function chkFrm()
{
        //if(document.getElementById('intro').value.search(/\S/)==-1)
        //{
        //        document.getElementById('intro_err').innerHTML = 'Please Enter Page Title...';
        //        return false;
        //}
        //else
        //{
        //        document.getElementById('intro_err').innerHTML = '';
        //}
        
        // here page_content is the element name not id
        if(CKEDITOR.instances.intro.getData() == '')
        {
                document.getElementById('intro_err').innerHTML = 'Please Enter Introduction Content...';
                return false;
        }
        else
        {
                document.getElementById('intro_err').innerHTML = '';
        }
        
        if(CKEDITOR.instances.desc.getData() == '')
        {
                document.getElementById('desc_err').innerHTML = 'Please Enter Description Content...';
                return false;
        }
        else
        {
                document.getElementById('desc_err').innerHTML = '';
        }
}
</script>
<div class="page-header">
        <h4>
        Vetting Process
        </h4>
</div>
        
<div class="sortable row-fluid">
<?php
//form data
$attributes = array('class' => 'form-horizontal', 'id' => 'vetting', 'onSubmit' => 'return chkFrm();');
//form validation
echo validation_errors();
echo form_open('admin/vetting_process/update', $attributes);
?>
<fieldset>
    <div class="control-group">
          <label for="inputError" class="control-label">Introduction</label>
          <div class="controls">
            <textarea rows="5" cols="30" name="intro" id="intro"><?php echo ""; ?></textarea>
            <script>
            CKEDITOR.replace('intro',{
                    startupMode: 'source'
                 });
            </script> 
            <span class="help-inline" id="intro_err"></span>
          </div>
    </div>
    <div class="control-group">
          <label for="inputError" class="control-label">Description</label>
          <div class="controls">
            <textarea rows="5" cols="30" name="desc" id="desc"><?php echo ""; ?></textarea>
            <script>
            CKEDITOR.replace('desc',{
                    startupMode: 'source'
                 });
            </script> 
            <span class="help-inline" id="desc_err"></span>
          </div>
    </div>
    <div style="margin-left: 120px;">
          <button class="btn btn-primary" type="submit">Update</button>
          <a href="<?php echo base_url(); ?>admin/vetting_process"><div class="btn" type="reset">Cancel</div></a>
    </div>
</fieldset>
<?php echo form_close(); ?>
</div>