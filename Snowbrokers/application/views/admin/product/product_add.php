<div class="page-header">
        <h3>
        Add Product
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
                redirect('admin/admin_users');
        }
        ?>
        
        <script>
        var sub_mit;
        function chkFrm()
        {
                          // Cartegory name checking .................
                 if(document.getElementById('product_name').value.search(/\S/)==-1)
                {
                        //alert(2);
                        
                        document.getElementById('product_nameerr').innerHTML = 'Please Enter Product Name...';
                        return false;
                }
                else
                {
                        document.getElementById('product_nameerr').innerHTML = '';
                }	
               
                if(document.getElementById('parent_cate').value == 0 )
                {
                        alert(2);
                        
                        document.getElementById('parent_cateerr').innerHTML = 'Please Select the Category Type Option...';
                        return false;
                }
                else
                {
                        document.getElementById('parent_cateerr').innerHTML = '';
                }
                 if(document.getElementById('product_image').value.search(/\S/)==-1)
                {
                        //alert(2);
                        
                        document.getElementById('product_imageerr').innerHTML = 'Please Enter Image...';
                        return false;
                }
                else
                {
                        document.getElementById('product_imageerr').innerHTML = '';
                }	
              
        }   
        
        
        function check_name()
        {
                var id_name=document.getElementById('category_name').value;
                
          var xmlhttp;
          if (window.XMLHttpRequest)
          {// code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp=new XMLHttpRequest();
          }
          else
          {// code for IE6, IE5
            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
          }
          xmlhttp.onreadystatechange=function()
          {					  	
            if (xmlhttp.readyState==4 && xmlhttp.status==200)
                {					  		
              //document.getElementById("myDiv").innerHTML=xmlhttp.responseText;					      
              if(xmlhttp.responseText == 'Y'){
                        document.getElementById('category_nameerr').style.display = 'block';
                                document.getElementById('category_nameerr').innerHTML = 'This Name is already registered.';
                                document.getElementById('category_nameerr').focus();
                                sub_mit = false;
                                return false;
              }else{
                        sub_mit = true;
                        document.getElementById('category_nameerr').innerHTML = '';
                                document.getElementById('category_nameerr').style.display = 'none';
              }
             // alert("s_v>"+sub_mit);
            }
            
          }					  
          xmlhttp.open("GET","<?php echo base_url(); ?>ajax/check.php?id_name="+id_name+"&table=category&colname=name",true);
          xmlhttp.send();					
        }
        </script>
        <style>
                .ckh_inp{
                        margin-left: 2%;
                        width: 10%;
                        float: left;
                        text-align: center;
                        font-size: 12px;
                }
                .att_name
                {
                        
                }
        </style>
      <!--  add more section-->
        <script> 
    function add_one() {
       var count=parseInt($('#tr_count').val());
 $('#input_box').append('<tr id="'+count+'_td"><td><input type="text" id="first_input_'+count+'" name="currency_name[]" value="" style="padding-right: 92px">&nbsp&nbsp;</td><td><input type="text" id="second_input_'+count+'" name="currency_symbol[]" value="" style="padding-right: 92px">&nbsp&nbsp;</td><td><input type="text" id="price'+count+'" name="currency_cost[]" value="" style="padding-right: 92px">&nbsp&nbsp;</td><td><div style="float: left; padding-left: 10px;"></div></td>');
 //<a href="javascript:void(0);" class="del_ele" onclick="remove_tr(\''+count+'_td\');"><i class="table-delete"></i></a>
 //<td><div style="float: left; padding-left: 10px;"><input type="button" value="Add" onclick="update_row('+count+')"></div></td></tr>

$('#tr_count').val(count+1);
    }
    
function remove_tr(id)
{
    //alert(id);
    $("#"+id).remove();
    //$(this).parent('div').parent().parent().remove(); 
}
</script>
         <!-- end add more section-->
        
        
        
        <?php
                //form data
                $attributes = array('class' => 'form-horizontal', 'id' => 'addcategory', 'onSubmit' => 'return chkFrm();');

                //form validation
                echo validation_errors();
                
                //echo form_open('admin/pages/add', $attributes);
                echo form_open_multipart('admin/admin_product/add', $attributes);
        ?>
                <fieldset>
                        <div class="control-group">
                                <label style="width: 100px;" for="inputError" class="control-label">Product Name</label>
                                <div style="margin-left: 120px;" class="controls">
                                        <input type="text" id="product_name" name="product_name" value="" onkeyup="check_name()" >
                                        <span class="help-inline" id="product_nameerr" style="color:red;"></span>
                                </div>
                        </div>
                        
                        <div class="control-group">
                                <label style="width: 100px;" for="inputError" class="control-label">Category</label>
                                <select style="width: 200px; height: 30px; margin-left: 25px" id="parent_cate" name="parent_cate">						
                                        <option value="0">No</option>
                                        <?php echo $row; 
                                                foreach($row as $catname)
                                                {
                                        ?>
                                                <option value="<?php echo $catname['id']; ?>"><?php echo $catname['name'];?></option>
                                        <?php } ?>
                                </select>
                                <span class="help-inline" id="parent_cateerr" style="color:red;"></span>
                        </div>

                        <div class="control-group">
                                <label style="width: 100px;" for="inputError" class="control-label">Product Image</label>
                                <div style="margin: 0 0 0px 120px; " class="controls">
                                        <input type="file" name="product_image" id="product_image"/>
                                        <span class="help-inline" id="product_imageerr" style="color:red;"></span>
                                </div>
                        </div>
                        
                        <div class="control-group" style="border-top:1px solid #eeeeee; padding-top: 5px;">
                                <label style="width: 100px;" for="inputError" class="control-label">Country to hide</label>
                                <div style="margin: 0 0 0px 120px; " class="controls">
                       <?php
                       $coun = $this->admin_product_model->country_value();
                       foreach($coun as $row)
                       {
                        ?>
                        <div class="ckh_inp" >
                       <input type="checkbox" name="chk[]" value="<?php echo $row->id; ?>">
                    <div class="att_name"><?php echo $row->contryname;?></div>   
                       </div>
                    <?php
                         }
                        ?>
                                </div>
                        </div>
                        
        <div class="control-group">
                                <label style="width: 100px;" for="inputError" class="control-label">Status</label>
                                <select style="width: 200px; height: 30px; margin-left: 25px" id="status" name="status">
                                        <option value="Y">Y</option>
                                        <option value="N">N</option>
                                </select>
                        </div>
                       <!--     another section-->
                        
                        
                        	<!--- -->
			<div class="container-fluid">
            <div id="pad-wrapper" class="users-list" style="margin-top: 0px; padding: 0px;">
                 <div class="row-fluid header" style="margin-bottom: 34px;">
			
                    <!--<h3>Categories &nbsp</h3>-->
		    <h3>Add Price &nbsp</h3>
                  
                   
                    <div class="span10 pull-right">
                        
                           <!-- <a href="<?php //echo base_url().'admin/admin_category/add';?>" class="btn-flat success pull-right">
                            	<span>&#43;</span>
                            	ADD NEW ONE
                            </a>-->
                     <!-- <input type="button" name="add" id="add" value="ADD ONE" style="float:right; background: chartreuse;" onclick="add_one()">-->
                    </div>
                </div>
		 <div class="sortable row-fluid">
		<table>
                <tr>
                <td>
                        <div style="padding-right: 244px;padding-left: 127px;"><h5><i>Currency Name</i></h5></div> 
                </td>
                 <td>
                    <div style="padding-right: 250px"><h5><i>Currency Symbol</i></h5></div> 
                </td>
                  <td>
                    <div style="padding-right: 250px"><h5><i>Currency Price</i></h5></div> 
                </td>
                </tr>
                
                </table>
                  <table id='input_box'>
                       
                   <?php
                   $i = 1;
                   
			foreach($curr as $row)
			{
			?>
			
                      

            <td>
                  <input type="text"  name="currency_name[]" id="first_input_<?php echo $i;?>" value="<?php echo $row['currency_name'];?> " style="padding-right: 92px" readonly >&nbsp&nbsp
            </td>
            <td>
                  <input type="text" name="currency_symbol[]" id="second_input_<?php echo $i;?>" value="<?php echo $row['symbol'];?>"style="padding-right: 92px" readonly>&nbsp&nbsp
            </td>
             <td>
                  <input type="text" name="currency_cost[]"  id="price<?php echo $i;?>" class="cost_cl" value="<?php echo $row['cost'];?>" style="padding-right: 92px">&nbsp&nbsp
            </td>
             <td>
                 <!--<div style="float: left; padding-left: 10px;">
                    <a href="<?php echo base_url().'admin/admin_product/delete/'.$row['id']; ?>" onclick="remove_tr"><i class="table-delete"></i></a>                                    	
                 </div>-->
             </td>
             <td>
                 <div style="float: left; padding-left: 10px;">
               <!-- <input type="button" value="Add" onclick="update_row(<?php echo $i;?>)">  -->             	
                 </div>
             </td>
        </tr> 
           
     
                 <?php
                 $i++;
                        }
                        ?>
                        </table>
                  <input type="hidden" id="tr_count" value="<?php echo $i;?>">
                </div>
                <div class="pagination pull-right">
                    <ul>
                      <?php echo $this->pagination->create_links(); ?>
                    </ul>
                </div>
                <!-- end users table -->
            </div>
        </div>	
		
	</div>
	
                        
                          <!--     another section-->
                        
                        
                        <div style="margin-left: 120px;">
                                <button class="btn btn-primary" type="submit">Save</button>
                                <a href="<?php echo base_url(); ?>admin/admin_product"><div class="btn" type="reset">Cancel</div></a>
                        </div>
                </fieldset>

        <?php echo form_close(); ?>
        
</div>

<script>
        //function curr_change()
        //{
        //        var i,j;
        //        var a= document.getElementsByName("currency_cost[]") ;
        //        var len = a.length;
        //        for(i=0 ; i< len ; i++)
        //        {
        //           var arr1 = a[i].value;
        //          // alert (arr1);
        //        }
        //     
        //        for (j = 1 ; j<= len ; j++)
        //        {
        //           //var testing=document.getElementById['price3'].value ;
        //           $('#price'+j).val('test');
        //         
        //        }
        //}
</script>