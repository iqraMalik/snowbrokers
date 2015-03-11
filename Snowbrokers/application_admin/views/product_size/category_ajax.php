<?php
    if (empty($product_type)){ ?>
        <option value="">NOT AVAILABLE</option>
    <?php }
    else { ?>
        <option value="">------------------SELECT------------------</option>
        <?php foreach($product_type as $row){ ?>
                    <option value= "<?php echo $row->id; ?>"><?php echo $row->name; ?></option>
              <?php }
    }?>