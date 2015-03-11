<?php
//echo "<pre>";
//print_r( $get_rating );
//echo "</pre>";
$val_arr = explode('^^',$get_rating);
$count        = $val_arr[0];
$total_star   = $val_arr[1];
$star_count         = $val_arr[2];

$star = '';
$url = base_url();
for($i=0; $i<$star_count; $i++)
{
    $star = $star.'<span><img src="'.$url.'images/rating-star.png" alt="star"></span>';    
}
?>
<div class="review-section">
        <div class="product-star"><?php echo $star;?></div>
        <div class="rating">
                <span> <?php echo $star_count;?> Ratings</span>
                <span>|</span>
                <span><?php echo $count;?> Reviews</span>
        </div>	
</div>****<div class="col-md-12">
    <div class="info">
      <h3>Your Reviews of <?php echo $full_details_products[0]['title'];?></h3>
    </div>
                
    <table style="color: black; width: 100%;">
    <?php
      foreach($get_review as $review_products)
      {
        $text=ucfirst($review_products->text);
        $rate=$review_products->rating;
        $uid=$review_products->uid;
        $user_name = $this->model_products->get_user($uid);
        
        $star1 = '';
        $url1 = base_url();
        for($i=0; $i<$rate; $i++)
        {
            $star1 = $star1.'<span><img src="'.$url1.'images/rating-star.png" alt="star"></span>';    
        }
        ?>
        <tr style="border-bottom: 1px dotted black;">
          <td style="width: 200px;">
            <?php echo $star1;?>
            <p style="font-size: smaller; padding-left: 4px;"><?php echo $rate;?> Ratings</p>
            <?php echo $user_name;?>
          </td>
          <td style="text-align: justify;"><?php echo $text;?></td>
        </tr>
    <?php
      }
      ?>				 
    </table>
</div>