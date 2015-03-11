<?php

//showing flase message
$flash_data = $this->session->flashdata('flash_message');
if(isset($flash_data) && $flash_data !='')
{
  if($flash_data == 'error')
  {
    echo "User activated successfully";
  }
  else
  {
    echo "error no registration code in URL";
  }
}
//showing flase message end

?>