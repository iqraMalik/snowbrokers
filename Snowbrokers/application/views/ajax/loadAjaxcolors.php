<?php
//echo $pid;
//echo "<pre>";
//print_r($get_all_sizes);
//echo "</pre>";
$s = 1;
foreach( $get_all_sizes as $colo)
{
    if( $s==1 )
    {
        $qty = $colo['quantity'];
    }
  ?>
  <li onclick="change_color(<?php echo $colo['id'];?>,<?php echo $colo['product_related_size_id'];?>,<?php echo $pid;?>, <?php echo $colo['quantity'];?> )" class="" style=" background-color : <?php echo $colo['color_code'];?>">
<a id="pop_<?php echo $s;?>" title="<?php echo "Available :".$colo['quantity'];?>" <?php if( $s == 1 ){ ?> class="col_select" <?php }?> href="javascript:void(0)">

</a>
</li>
<script>
$(function() {
$( "#pop_<?php echo $s;?>" ).tooltip({
show: {
effect: "slideDown",
delay: 250
}
});
})
</script>
  <?php
  $s++;
}
echo "^*^";
echo $qty;
?>
