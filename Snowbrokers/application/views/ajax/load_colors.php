<div id="zoom" class="zoom slider">
<?php
//echo "AJax page";
$i=0;
foreach( $get_all_sizes as $img_data )
{
    if( $i == 0 )
    {
        $image_first = $img_data['image'];
    }
    ?>
    <a href="javascript:void(0);" data-image="<?php echo base_url().'admin/images/uploads/long_thumb/'.$img_data['image'];?>" data-zoom-image="<?php echo base_url().'admin/images/uploads/big_thumb/'.$img_data['image'];?>"> 
    <img style="height: 64px; width: 66px;" src="<?php echo base_url().'admin/images/uploads/short_thumb/'.$img_data['image'];?>" /> 
    </a>
    <?php
    $i++;
}
echo "</div>";
echo "*^*";
echo $image_first;
?>