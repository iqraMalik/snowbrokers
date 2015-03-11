<!-- content -->
<?php
	$data=$this->model_products->advertisement();
	$total_groups = ceil($total_rows/$items_per_group);
	//$segment3 = ($this->uri->segment(3)==''?0:$this->uri->segment(3));
	//$segment4 = ($this->uri->segment(4)==''?0:$this->uri->segment(4));
?>
<script type="text/javascript">
$(document).ready(function() {
    $('.animation_image').show();
	var track_load = 0; //total loaded record group(s)
	var loading  = false; //to prevents multipal ajax loads
	var total_groups = <?php echo $total_groups; ?>; //total record group(s)
	var product_type_id = "<?php echo ($this->uri->segment(3)==''?0:$this->uri->segment(3))?>";
	var product_cat_id = "<?php echo ($this->uri->segment(4)==''?0:$this->uri->segment(4))?>";
	$('#results').load("<?php echo site_url('product/autoload_process'); ?>", {'group_no':track_load,'segment3':product_type_id,'segment4':product_cat_id,'tagname':"<?php echo $tagname;?>",'allsearch':"<?php echo $allsearch; ?>"}, function() {
            track_load++;
            $('.animation_image').hide();
        }); //load first group
	$(window).scroll(function() { //detect page scroll
		
		if($(window).scrollTop() + $(window).height() == $(document).height())  //user scrolled to bottom of the page?
		{
			if(track_load <= total_groups && loading==false) //there's more data to load
			{
				loading = true; //prevent further ajax loading
				$('.animation_image').show(); //show loading image
				
				//load data from the server using a HTTP POST request
				$.post('<?php echo site_url('product/autoload_process'); ?>',
				       {'group_no': track_load,'segment3':product_type_id,'segment4':product_cat_id,'tagname':"<?php echo $tagname;?>",'allsearch':"<?php echo $allsearch; ?>"},
				       function(data){
					//alert(data);				
					$("#results").append(data); //append received data into the element

					//hide loading image
					$('.animation_image').hide(); //hide loading image once data is received
					
					track_load++; //loaded group increment
					loading = false; 
				
				}).fail(function(xhr, ajaxOptions, thrownError) { //any errors?
					
					alert(thrownError); //alert with HTTP error
					$('.animation_image').hide(); //hide loading image
					loading = false;
				
				});
				
			}
		}
	});
});
</script>

<section class="content-area">
	<!--   This is for after login header menu bar start -->
    
	<?php echo $this->load->view('header/menu_bar'); ?>
    
        <!--   This is for after login header menu bar end -->
	<section class="container browse-tag">
		<div class="men-jacket-content pull-left">
			<?php
			$category = $this->modelhome->get_cat_name($this->uri->segment(3));
			$sub_category = $this->modelhome->get_sub_cat_name($this->uri->segment(4));

			?>
			<!--<h1>Men Jackets</h1>-->
			<h1><?php echo ucfirst(stripslashes($category->title)).'  '.ucfirst(stripslashes($sub_category->name))?></h1>
		</div>
		<?php if($allsearch==''){?>
		<div class="men-jacket pull-right">
			<span>Browse by brand</span>
			<form name="searchby_tag" id="searchby_tag" action="" method="post" class="men-jacket">
				<input name="by_tag" id="by_tag" value="<?php echo $tagname; ?>" type="search" />
				<input name="search_mode" id="search_mode" value="tagsearch" type="hidden" />
				<button type="submit"></button>
			</form>
		</div>
		<?php } ?>
	</section>
	<div class="product-sec">
		<div class="container">
			<div class="row product-main-content">
			  <div class="col-sm-2 hidden-xs left-add">
			  	<?php echo $data[0]->left_block1;?>
			  	<?php echo $data[0]->left_block2;?>
			  </div>
			  <div class="col-sm-8">
				<!--Show all product here.-->
				<div class="row" id="results">
					
				</div>
				<!--Show all product here.-->
				<div class="animation_image" style="display:none" align="center"><img src="<?php echo base_url(); ?>images/ajax-loader.gif"></div>
			  </div>
			  <div class="col-sm-2 right-add">
			        <?php echo $data[0]->right_block1;?>
			  	<?php echo $data[0]->right_block2;?>	
			  </div>
			</div>
		</div>
	</div>
</section>
<!-- content End -->