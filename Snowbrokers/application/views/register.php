<?php

//showing flase message
$flash_data = $this->session->flashdata('flash_message');
if(isset($flash_data) && $flash_data !='')
{
  if($flash_data == 'saved')
  {
    echo "User inserted successfully";
  }
  else
  {
    echo "Failed to insert user";
  }
}
//showing flase message end

//echo "Loading view page..";


//creating the form
//form data
$attributes = array('class' => 'form-horizontal', 'id' => 'addPage', 'onSubmit' => 'return chkFrm();');
//form validation
echo validation_errors();
//echo form_open('admin/pages/add', $attributes);
echo form_open_multipart('register/add', $attributes);
?>
<table>
    <tr>
        <td>First Name :</td>
        <td><input type="text" name="fname" id="fname"></td>
    </tr>
    <tr>
        <td>Last Name :</td>
        <td><input type="text" name="lname" id="lname"></td>
    </tr>
    <tr>
        <td>Email :</td>
        <td><input type="text" name="email" id="email"></td>        
    </tr>
    <tr>
        <td>Password :</td>
        <td><input type="password" name="pass" id="pass"></td>        
    </tr>
    <tr>
        <td></td>
        <td><input type="submit" value="submit"></td>        
    </tr>
</table>
<?php
//closeing the form
echo form_close();
?>