
<?php

mysql_connect("localhost","lab3","Aniket123321");
mysql_select_db("sports");

$session_id=$_GET['ses_id1']; // Session_id
//$t_width = 161;	// Maximum thumbnail width
//$t_height = 156;// Maximum thumbnail height
$new_name = time().$session_id.$_REQUEST['img']; // Thumbnail image name
$ext = explode('.',$new_name);
$path = $_SERVER['DOCUMENT_ROOT']."/lab3/sports/images/profile_pic/";
$site=$_SERVER['SERVER_NAME'].'/lab3/sports/images/profile_pic/';

if(isset($_GET['t']) and $_GET['t'] == "ajax")
	{
		$sql_select="Select * from users where uid='".$session_id."'";
		$query = mysql_query($sql_select);
		$res = mysql_num_rows($query);
		if($res>0)
		{
		    $result = mysql_fetch_assoc($query);
		    
		    $img_small= $result['profile_image'];
		   
		    
		}
		 $pos_x=$_REQUEST['x']; $pos_y=$_REQUEST['y']; $pos_w=$_REQUEST['w']; $pos_h=$_REQUEST['h'];
                 
                 $targ_w = $pos_w;
                 $targ_h = $pos_h;
                 
                 $jpeg_quality = 90;

	
	 $src = $_SERVER['DOCUMENT_ROOT']."/lab3/sports/images/profile_pic/crop_thumb/".$img_small;
                 
                 $src_n = $_SERVER['DOCUMENT_ROOT']."/lab3/sports/images/profile_pic/crop_kept_thumb/".$img_small;
                 
		 $ext = explode('.',$img_small);
		
		 if($ext[1]=='png' OR $ext[1]=='PNG')
		 {
			
			$img_r = imagecreatefrompng($src);
		 }
		 elseif($ext[1]=='jpg' OR $ext[1]=='JPG')
		 {
			$img_r = imagecreatefromjpeg($src);
		 }
		 elseif($ext[1]=='jpeg' OR $ext[1]=='JPEG'){
			 $img_r = imagecreatefromjpeg($src);
		 }
		  elseif($ext[1]=='gif' OR $ext[1]=='GIF'){
			 $img_r = imagecreatefromGIF($src);
		 }
                
                 $dst_r = ImageCreateTrueColor( $targ_w, $targ_h );
		
		
		list($width_orig, $height_orig, $type, $attr) = getimagesize($src);
                 
                 if(imagecopyresampled($dst_r,$img_r, 0, 0, $pos_x, $pos_y, $targ_w, $targ_h, $pos_w, $pos_h))
                 {
                        switch($type)
                        {
                               case 1:
                               ImageGIF($dst_r, $src_n);
                               break;
       
                               case 2:
				
                               ImageJPEG($dst_r, $src_n, $jpeg_quality);
                               break;
       
                               case 3:
                               ImagePNG($dst_r, $src_n);
                               break;
                        }
                 }
		$sql_update="UPDATE users SET profile_image_small='".$img_small."' WHERE uid='".$session_id."'";
		mysql_query($sql_update);
		echo $img_small;
		
	}
	
	if($_REQUEST['action']=='del')
	{
		$path = $_SERVER['DOCUMENT_ROOT']."/lab3/sports/images/profile_pic/crop_kept_thumb/";

		 if($_REQUEST['image_name'] !='')
		    {
			unlink($path.$_REQUEST['image_name']);
		    }
		$sql_update="UPDATE users SET profile_image_small='' WHERE uid='".$_REQUEST['use_id']."'";
		mysql_query($sql_update);
		echo $_SERVER['SERVER_NAME'].'/lab3/sports/images/profile_pic/thumb/'.$_REQUEST['image_name'];
	}
	if($_REQUEST['action']=='show')
	{

		 
		echo $_SERVER['SERVER_NAME'].'/lab3/sports/images/profile_pic/crop_kept_thumb/'.$_REQUEST['image_name'];
	}
	
	?>