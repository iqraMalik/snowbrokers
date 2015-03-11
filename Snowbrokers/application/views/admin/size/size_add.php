<div class="page-header">
        <h3>
        Add size
        </h3>
</div>


<div class="sortable row-fluid">
         
        <?php
        //flash messages
        if(isset($flash_message)){
                if($flash_message == TRUE)
                {
                        echo '<div id="success" class="alert alert-success">';
                        echo '<a class="close" data-dismiss="alert">×</a>';
                        echo '<strong>Success!</strong> new page has been created with success.';
                        echo '</div>';
                        
                                
                }else{
                        echo '<div class="alert alert-error">';
                        echo '<a class="close" data-dismiss="alert">×</a><strong>';
                        echo "Page Already Exists";	
                        echo '</strong></div>';
                }
               // redirect('admin/admin_users');
        }
        ?>
        
        <script>
        
        var sub_mit;
        function chkFrm()
        
        {
                // Cartegory name checking .................
                if(document.getElementById('category_name').value==0)
                {				
               
                document.getElementById('category_nameerr').innerHTML = 'Please Enter the Category Name...';
                    return false;
                }
                else
                {
                        document.getElementById('category_nameerr').innerHTML = '';
                       
                }
                if(document.getElementById('size').value==0)
                {				
               
                document.getElementById('sub_nameerr').innerHTML = 'Please Enter the sub_ Category Name...';
                    return false;
                }
                else
                {
                        document.getElementById('sub_nameerr').innerHTML = '';
                       
                }
                if(document.getElementById('sizee').value.search(/\S/)==-1)
                {				
               
                document.getElementById('size_nameerr').innerHTML = 'Please Enter the Size..';
                    return false;
                }
                else
                {
                        document.getElementById('size_nameerr').innerHTML = '';
                       
                }
         
               
                
        }
        </script>
        <script>
                


function getpage()
{
       
        send_data='cid='+$('#category_name option:selected').val();
        
        $.ajax({
                type: "POST",
                url: '<?php echo base_url(); ?>admin/admin_size_controller/lists',
                data: send_data,
                cache: false,
                success: function(data)
                {
                        
                        document.getElementById("size").innerHTML = data;
                }        
        });
}
</script>

      <!--  add more section-->
 
         <!-- end add more section-->
        
        
        
        <?php
                //form data
                $attributes = array('class' => 'form-horizontal', 'id' => 'addcategory', 'onSubmit' => 'return chkFrm();');

                //form validation
                echo validation_errors();
                
                //echo form_open('admin/pages/add', $attributes);
                echo form_open_multipart('admin/admin_size_controller/add', $attributes);
        ?>
                
                  <fieldset>      
                        <div class="control-group" >
                                <label style="width: 100px;" for="inputError" class="control-label">Category Name</label>
                               <select style="width: 200px; height: 30px; margin-left: 25px" id="category_name" name="category_name" onchange="getpage();">						
                                        <option value="0">No</option>
                                        <?php  
                                        $result=$this->admin_size_model->getcat();
                                                foreach($result as $row)
                                                {
                                        ?>
                                                <option value="<?php echo $row->id; ?>"><?php echo $row->name;?></option>
                                        <?php } ?>
                                </select>
                              <span id='category_nameerr'></span>
                        </div>
                          <div class="control-group" >
                         <label style="width: 100px;" for="inputError" class="control-label">Sub Category Name</label>
                               <select style="width: 200px; height: 30px; margin-left: 25px" id="size" name="size">						
                                        <option value="0">No</option>
                               </select>
                               <span id='sub_nameerr'></span>
                         </div>

                        <div class="control-group">
                                <label style="width: 100px;" for="inputError" class="control-label">Size</label>
                                <div style="margin: 0 0 0px 120px; " class="controls">
                                        <input type="text" name="sizee" id="sizee"/>
                                        <span id='size_nameerr'></span>
                                </div>
                                <div></div><br>
                <div style="margin-left: 120px;">
                                <button class="btn btn-primary" type="submit">Save</button>
                                <a href="<?php echo base_url(); ?>admin/admin_size_controller"><div class="btn" type="reset">Cancel</div></a>
                                    
                        </div>
                </fieldset>

        <?php echo form_close(); ?>
        
</div>