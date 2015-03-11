<?php
$this->load->view('includes/header');
?>

<img src="<?php echo base_url();?>images/uploads/normal/<?php echo $img; ?>"/>

<a class="btn-flat new-product" href="<?php echo site_url('product/product_image_add/'.$prod_id); ?>">BACK</a>