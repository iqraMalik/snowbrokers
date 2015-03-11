<style>
    form input
    {
        width: auto !important;
    }
</style>
<script src="http://crypto-js.googlecode.com/svn/tags/3.1.2/build/rollups/md5.js"></script>
<script>
	function setSupport(obj)
	{
	    flag=0;
            if ($(obj).attr('checked')==true)
            {
                flag=1;
            }
            if (flag!=0)
            {
                $('#no-support').attr({'checked':false});
            }
            else
            {
                var o=$('.c');
                var f=true;
                for (i=0;i<o.length;i++)
                {
                    if($(o[i]).attr('checked')==true)
                    {
                        f=false;
                    }
                }
                if (f==true)
                {
                   $('#no-support').attr({'checked':true});
                }                
            }
	}
	function setNoSupport(obj)
	{
	    if ($(obj).attr('checked')==true)
            {
                $('.c').attr({'checked':false});
            }
            else
            {
                $('#no-support').attr({'checked':true});
            }
	}
	function setPrivate(obj)
	{
	    if ($(obj).attr('checked')==true)
            {
                $('#private_div').slideDown(500);
            }
            else
            {
                $('#private_div').slideUp(500);
            }
	}
	
	function set_code()
	{
	     var pri_c=private_check();
	       if (pri_c ==true)
	       {
	        var v=$('#course-key').val();
                var v1=$('#course-key1').val();
                var v2=$('#course-key2').val();
                var v3=$('#course-key3').val();
	
		var marge_val= v.concat(v1,v2,v3);
		var a =CryptoJS.MD5(marge_val);
		$("#s").attr("href","s-browse-course.php?i="+a);
      
		document.getElementById("s").innerHTML= "Private Key"+' '+ marge_val;
		document.getElementById("pr_val").setAttribute('value',a);
                $('#code_div').slideDown(500);
	       }
	        else if (pri_c==false)
	    {
		//show_message('Please enter a valid private key','red');
		$('#code_div').slideUp(500);
	    }
	}
	
        function image_select(obj)
	{
		var image_name= $(obj).val().split("\\");
		var image= image_name[image_name.length-1];
		$('#image-name').val(image);
	}
        function upload_image()
	{
		$('#image_upload').ajaxForm({
		success:function(data)
		{
                    if (data=="error_size")
                    {
                        show_message("Course Banner size exactly 640px X  360px",'red');
			$("#image-name").val("");
                    }
		    else if (data=="error_format")
                    {
                        show_message("Invalid image format for course banner",'red');
			$("#image-name").val("");
                    }
                    else
                    {
			show_message("Course Banner uploaded successfully");
                        $('#image-preview').html(data);
                        $('#image-preview-p').fadeIn(500);
                    }
		}
		}).submit();
		
	}
        function v_c_name()
        {
            var val= $('#course-name').val();
            return check_blank(val,'course-name');
        }
        function v_c_cat()
        {
            var val= $('#course-category').val();
            return check_blank(val,'course-category');
        }
        function v_c_desc()
        {
            var val= $('#course_description').val();
            return check_blank(val,'course_description');
        }
        function v_c_image()
        {
            var val= $('#course_image').attr('src');            
            return check_blank(val,'image-name');
        }
        function v_c_image_checkbox()
        {
            var f=false;
            if ($('#image-owner').attr('checked')==true)
            {
                f=true; 
            }
            else
            {
                $('#image-owner').addClass('textbox_error');
                f=false;
            }
            return f;
        }
        function v_c_base()
        {
            var val= $('#progress-rule').val();
            return check_blank(val,'progress-rule');
        }
        function v_c_price()
        {
            var val= $('#course-price').val();
            return check_blank(val,'course-price');
        }
        function private_check()
        {
            var f=true;
            if ($('#private').attr('checked')==true)
            {
                var v=$('#course-key').val();
                var v1=$('#course-key1').val();
                var v2=$('#course-key2').val();
                var v3=$('#course-key3').val();
                var total_key="";
                var i_f=0;
                
                if (v=="000" || v.length!=3)
                {
                    $('#course-key').addClass('textbox_error');
                }
                else
                {
                    $('#course-key').removeClass('textbox_error');
                    total_key+=v;
                    i_f++;
                }
                
                if (v1.length!=3)
                {
                    $('#course-key1').addClass('textbox_error');
                }
                else
                {
                    $('#course-key1').removeClass('textbox_error');
                    total_key+='-'+v1;
                    i_f++;
                }
                
                if (v2.length!=3)
                {
                    $('#course-key2').addClass('textbox_error');
                }
                else
                {
                    $('#course-key2').removeClass('textbox_error');
                    total_key+='-'+v2;
                    i_f++;
                }
                
                if (v3.length!=1)
                {
                    $('#course-key3').addClass('textbox_error');
                }
                else
                {
                    $('#course-key3').removeClass('textbox_error');
                    total_key+='-'+v3;
                    i_f++;
                }
                
                if (i_f==4)
                {
                    $('#hid-course-key').val(total_key);
                    f=true
                }
                else
                {
                    f=false;
                }
            }
            else
            {
                f=true;
            }
            return f;
        }
	function v_c_banner(args)
	{
	   var banner=  $('input[name=course_banner]:checked').val();
	   if (banner)
	   {
		return true;
	   }
	   else
	   {
		show_message('Please choose a course banner','red');
		return false;
	   }
	}
        function check_course()
        {
	    //var c_banner= v_c_banner();
            var c_name=v_c_name();
            var c_act=v_c_cat();
            var c_desc=v_c_desc();
            var c_image=v_c_image();
            var c_image_c=v_c_image_checkbox()
            var c_base=v_c_base();
            var pri_c=private_check();
            var price=v_c_price();
            
            if (c_name==true && c_act==true && c_desc==true /*&& c_banner==true*/ && c_image==true && c_base==true && c_image_c==true && pri_c==true && price==true )
            {
                s=$('#course_image').attr('src');
                $('#hid_course_image').val(s);
		$("#course_submit").removeAttr("onclick");
                add_course();
		//add_pr_course();
            }
	    else if (c_name==false)
	    {
		show_message('Please Enter course name','red');
	    }
	    else if (c_act==false)
	    {
		show_message('Please choose category','red');
	    }
	    else if (c_desc==false)
	    {
		show_message('Please enter description','red');
	    }
	    else if (c_image==false)
	    {
		show_message('Please upload an image first','red');
	    }
	    else if (c_image_c==false)
	    {
		show_message('Please Accept Banner Privacy Policy','red');
	    }
	    else if (c_base==false)
	    {
		show_message('Please select a progress option','red');
	    }
	    else if (pri_c==false)
	    {
		show_message('Please enter a valid private key','red');
	    }
	    else if (price==false)
	    {
		show_message('Please enter a valid price','red');
	    }
        }
         function add_course()
        {
		
                $('#add_couuse').ajaxForm({
		success:function(data)
		{
		    dataArr= data.split('@@@');
		    var last_id=dataArr[1];
		   
                    if (!isNaN(dataArr[0]))
                    {
			 if ($('#private').attr('checked')==true)
			  {
			    var v=$('#course-key').val();
			    var v1=$('#course-key1').val();
			    var v2=$('#course-key2').val();
			    var v3=$('#course-key3').val();
	
			    var marge_val= v.concat(v1,v2,v3);
			    var a =CryptoJS.MD5(marge_val);
			    var c =CryptoJS.MD5(last_id);
			    window.open("m-messages-send.php?i="+a+"&c="+last_id, "_blank");
			  }
                        window.location.href="m-add-modules.php";
                    }
                    else
                    {
                        show_message('Error Occure. Try Again!','red');
                    }
		}
		}).submit();
        }
        var course_price=0;
        function value_check(value)
        {
            if (isNaN(value))
            {
                $('#course-price').val(course_price);
            }
            else
            {
                course_price=value;
            }
        }
</script>
<form class="form-cls" action="ajax/add_course.php" method="post" id="add_couuse">
<section>
    Complete the fields below to add a new course. (All items required.)<br>
     <div class="add-header2" style="width:80%;">
           <p>Give your course a name*:</p>
           <input name="course-name" id="course-name" type="text" size="30%" maxlength="64"> 
           <select name="course-category" id="course-category">
             <option value="0">Choose a Category</option>
             <?php
             $category_fetch="select * from `category` where status='Y' and id NOT IN(0) ORDER BY name";
             $category_fetch_exe=mysql_query($category_fetch);
             while($category_fetch_arr=mysql_fetch_array($category_fetch_exe))
             {
                   ?>
                   <option value="<?php echo $category_fetch_arr['id'];?>"><?php echo $category_fetch_arr['name'];?></option>
                   <?php
             }
             ?>
           </select>
           <style>
	    .course-banner-packet
	    {
		width:20%;
		padding:1%;
		float: left;
		box-sizing: border-box;
		-moz-box-sizing: border-box;
		-o-box-sizing: border-box;
		-webkit-box-sizing: border-box;
		-ms-box-sizing: border-box;
		text-align: center;
	    }
	    .course-banner-wrapper
	    {
		height:50%;
		overflow-y: auto;
		margin: 0 -1%;
		
	    }
	   </style>
           <br><br>
           <p>Give a brief description of your course*:</p>
           <textarea class="countable10 mytextarea3" style="width:70%;" id="course_description" name="course_description"></textarea><div style="font-size: 12px; font-family: Arial; color: rgb(0, 0, 0); opacity: 0;" class="jqEasyCounterMsg">Maximum Characters: 0/200</div><div class="jqEasyCounterMsg less20">&nbsp;</div>
	   
           <p>Select course banner from following list*:</p>
	   <div class="course-banner-wrapper">
	    <?php
	    $radio_con=0;
	    $course_banner_query= mysql_query("SELECT * FROM `course_banner` WHERE `status`='Y'");
	    while($course_banner=mysql_fetch_array($course_banner_query))
	    {
		?>
		<div class="course-banner-packet">
		    <img src="<?php echo $course_banner['image'];?>">
		    <p><?php echo $course_banner['title'];?></p>
		    <input type="radio" name="course_banner" id="course_banner" value="<?php echo $course_banner['id'];?>" <?php if($radio_con==0){echo "checked='checked';";}?>>
		</div>
		<?php
		$radio_con=1;
	    }
	    ?>
	   </div>
           
           <p>Upload a header image for your course. Image must be ((640px x 360px)).<br>
                   (If you are not sure how to size your image to the correct size, download and use this <a href="images/Courses/sample1.jpg" target="_blank">sample image</a>.)</p>
           <input name="image-name" id="image-name" type="text" size="30%" maxlength="64" readonly> 
           <input name="course-banner-browse" class="add-button dropshadow" value="Browse" style="margin-left:10px;" type="button" onclick="$('#browse_image').click();"> &nbsp;
           <input name="course-banner-upload" class="add-button dropshadow" value="Upload" style="margin-left:10px;" type="button" onclick="upload_image();">
           <div id="image-preview-p" style="display: none;">
                <div class="image-preview" style="height: 101.25px;" id="image-preview"><img id="course_image" name="course_image" src=""/></div>
                <input type="hidden" name="hid_course_image" id="hid_course_image"/>
                <p>I hereby state that I am the owner of this image, or that I do have permission to use this image, and that I accept full responsibility and liability for the use of this image. (See page help for guidlines) <input name="image-owner" id="image-owner" type="checkbox" value=""></p><br>
           </div>
           <p><strong>I am offering the following with this course*:</strong></p>
                           <ul>
                                   <li><input class="c" name="live-support" type="checkbox" value="" onclick="setSupport(this)"> Live Support</li>
                                   <li><input class="c" name="conf-support" type="checkbox" value="" onclick="setSupport(this)"> Support Conferences</li>
                                   <li><input class="c" name="regular-support" type="checkbox" value="" onclick="setSupport(this)"> Regular Support through the course's built-in commenting facility.</li>
                                   <li><input name="no-support" id="no-support" type="checkbox" value="" checked="checked" onclick="setNoSupport(this)"> No Support. (This is a self-study course.)</li>
                           </ul>
                           
           <p><strong>Student progress to the next lesson will be based on*:</strong></p>
           
           <select name="progress-rule" id="progress-rule">
             <option value="0">Select one</option>
             <?php
             $progress_rule_fetch="select * from `progress_options` where `status`='Y'";
             $progress_rule_fetch_exe=mysql_query($progress_rule_fetch);
             while($progress_rule_fetch_arr=mysql_fetch_array($progress_rule_fetch_exe))
             {
            ?>
                <option value="<?php echo $progress_rule_fetch_arr[id];?>"><?php echo $progress_rule_fetch_arr[name];?></option>
            <?php
             }
             ?>
                   
           </select>
              <p>Set Course Price:</p>
           <input name="course-price" id="course-price" type="text" size="8%" maxlength="8" value="00.00" onkeyup="value_check(this.value)">
                           
                           
           <p><strong>This course is:</strong></p>
           
           <ul>
<!--	    onfocus="if(this.value=='0'){$(this).val('')}" onblur="if(this.value==''){$(this).val('0')}" style="text-align:center;"-->
            <li><input name="private" id="private" type="checkbox" value="" onclick="setPrivate(this)"> Private</li>
                <div id="private_div" style="display: none;">
                   Private key: (This key must only be given to students who you want to access your course.)<br>
                   <input name="course-key" oid="course-key" id="course-key" size="5" maxlength="3" type="text" value="000" style="text-align:center;" onfocus="if(this.value=='000'){$(this).val('')}" onblur="if(this.value==''){$(this).val('000')}" onkeyup="set_code()">-
		   <input name="course-key1" id="course-key1" size="5" maxlength="3" type="text" value="000" style="text-align:center;" onkeyup="set_code()">-
		   <input name="course-key2" id="course-key2" size="5" maxlength="3" type="text" value="000" style="text-align:center;" onkeyup="set_code()">-
		   <input name="course-key3" id="course-key3" size="2" maxlength="1" type="text" value="0"  onkeyup="set_code()" ><br>
                   <input type="hidden" name="hid-course-key" id="hid-course-key"/>
                   <span class="xplain"> The key must be a minimum of 10 numbers and characters in the format 000-000-000-0 </span>
                
          
	   
	  
                <div id="code_div" style="display: none;">
                ((Your Massage Goes Here . You may edit this portion . Do not change anything<br> below))<br>
		=============================================<br>
		Click this link ,or copy it into your browser to confirm your registration for this private<br> course. This link will expire in 7 days.
		Please Click on this link - <a id="s"  href=""></a>
		<br>=============================================
		
                </div>
		<input type="hidden" id="pr_val" name="pr_val" value="">
		</div>
           </ul>
	   <div class="push10">&nbsp;</div>
           <a id="course_submit" class="button medium gradient white " style="cursor: pointer" onclick="check_course();"> Add Course </a>
           <div class="push10">&nbsp;</div>
	   
        <!--   <p>Set Course Price:</p>
           <input name="course-price" id="course-price" type="text" size="8%" maxlength="8" value="00.00" onkeyup="value_check(this.value)">
                           
                           <div class="push10">&nbsp;</div>
           <a class="button medium gradient white " style="cursor: pointer" onclick="check_course();"> Add Course </a>
           <div class="push10">&nbsp;</div>-->
</section>
</form>
<form class="" enctype="multipart/form-data"action="ajax/upload_course_image.php" method="post" name="image_upload" onsubmit="" id="image_upload" style="display:none;">
        <input id="browse_image" name="browse_image" type="file" accept="image/*" style="display: none;" onchange="image_select(this)"/>
</form>