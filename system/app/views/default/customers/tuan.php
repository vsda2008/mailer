<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?php echo $issn_title?></title>
</head>

<body style=" background-image:url(images/bg-deal.jpg); background-color:#fff8e6; background-repeat:no-repeat; MARGIN: 0px; font-size:14px; font-family:Tahoma,Helvetica,arial,sans-serif; COLOR: #333; TEXT-ALIGN: center;">
<div class="m_bg">
  <SCRIPT type=text/javascript>
$(document).ready(function(){
if (readCookie('ihv') != 'yes')
{
$('#howdo_helps').show();
}
});
function howdo_hidden()
{
$('#howdo_helps').slideUp();
writeCookie('ihv', 'yes', 1);
}
function showShareLink()
{
if ($('#share_link_inpbox').val() == '')
{
// fill data
$('#share_link_inpbox').val(document.title + location.href + '&u=11');
if ($.browser.msie)
{
copyText($('#share_link_inpbox').val());
}
}
var dis = $('#share_link').css('display');
dis = (dis == 'block') ? 'none' : 'block';
$('#share_link').css('display', dis);
return false;
}
</SCRIPT>


<SCRIPT language=javascript>
var time=3457768;
</SCRIPT>
<SCRIPT language=javascript src="images/jquery.js"></SCRIPT>

<SCRIPT language=javascript src="images/main.js"></SCRIPT>
<SCRIPT language=javascript src="images/time.js"></SCRIPT>
<div style="MIN-HEIGHT: 400px; margin-top: 0; margin-bottom:0; margin-left: auto; margin-right:auto; OVERFLOW: visible; WIDTH: 715px; HEIGHT: auto! important; TEXT-ALIGN: left;">

<div class="t_area_out" style="border-width:2px;CLEAR: both; border-right-color: #ff9900; border-right-width: 1px; border-right-style: solid; border-top-color: #ff9900; border-top-width: 1px; border-top-style: solid; background-color: #ff9900; MARGIN-BOTTOM: 10px; border-left-color: #ff9900; border-left-width: 1px; border-left-style: solid; border-bottom-color: #ff9900; border-bottom-width: 1px; border-bottom-style: solid;">
<div class="t_area_in" style=" _width:695px; *height:100%;PADDING-RIGHT: 10px; PADDING-LEFT: 10px; PADDING-BOTTOM: 25px; LINE-HEIGHT: 22px; PADDING-TOP: 10px; BACKGROUND-COLOR: #fff;">


<div class="up_0" style="height:25px;  background-image:url(image/zhoukan.jpg); border-bottom-color:#CCCCCC; border-bottom-width:1px; border-bottom-style:dashed;">
      <div class="up_1" style="float:left;"><span class="STYLE1" style="font-size:14px;"><span><?php echo $issn_title?></span></div>
      <div class="up_2" style="float:right;  font-size:12px; color:#666;"><a href="www.t960.com" target="_self" class="lj_ls1" style="color:#666;">旅途中国</a><a href="http://mailer.t960.com/index.php/mailer/subs/is/2/mail/@ding@" style="color:#666;">订阅</a>--<a href="http://mailer.t960.com/index.php/mailer/subs/is/0/mail/@ding@" style="color:#666;">退订</a></div>
      <div style="clear:both"></div>
</div>

<div  style="CLEAR: both; MARGIN-BOTTOM: 10px; FONT: bold 28px/40px Microsoft YaHei,Times New Roman; WIDTH: 100%; COLOR: #333;">
	<div style="VERTICAL-ALIGN: middle; TEXT-ALIGN: left;"><span style="COLOR: #ff0000;">今日团购：</span><?php echo $public['title'];?></div>
</div>
<div style="position: relative;FLOAT: left; WIDTH: 215px;" class="t_deal">
<div style="height: 180px; BORDER-LEFT-COLOR: #7accf6; background-color: #cfeef6; BORDER-BOTTOM-COLOR: #7accf6; BORDER-TOP-COLOR: #7accf6; BORDER-RIGHT-COLOR: #7accf6;" class="t_deal_l t_deal_l2">
<div style="FONT-SIZE: 30px; Z-INDEX: 3; margin-right:3px; background-image: url(http://tuan.t960.com/templates/default/images/new/cmb_01.gif) ; background-repeat:no-repeat; WIDTH: 112px; COLOR: #fff; PADDING-TOP: 15px; margin-top:10px; HEIGHT: 88px; TEXT-ALIGN: center; float:right;"><?php echo $price_save1?></div>
<div style="float:left; margin-top:30px;">原价<strong style="text-decoration: line-through;">&yen;<?php echo $price?></strong><br>
节省&yen;<?php echo $price_save?></div>

<div  style="CLEAR: both; PADDING-LEFT: 40px; background-image:url(http://tuan.t960.com/templates/default/images/new/cmb_02.gif); background-repeat: no-repeat; FONT: bold 20px Arial,Helvetica,sans-serif; WIDTH: 175px; COLOR: #fff; PADDING-TOP: 6px; HEIGHT: 60px; TEXT-ALIGN: center;">
<div style="DISPLAY: inline; FLOAT: left; margin-top: 12px; margin-left: 6px;">&yen;<?php echo $s_price?></div>
<div  style=" background-image:url(http://tuan.t960.com/templates/default/images/new/cmb_03.gif); background-repeat: no-repeat;  FLOAT: right; MARGIN-RIGHT: 2px;"><a  href="<?php echo $hr?>"><img src="http://tuan.t960.com/templates/default/images/logo_m.gif" style="OVERFLOW: hidden; WIDTH: 89px; HEIGHT: 46px; border:0;"></a> </div>
</div>
</div>
<div id="tuanState" style="float: left;CLEAR: both; border-right-color: #fbd686; border-right-width: 1px; border-right-style: solid; PADDING-RIGHT: 10px; border-top-color: #fbd686; border-top-width: 1px; border-top-style: solid; PADDING-LEFT: 10px; FONT-WEIGHT: 700; background-color: #fff8e8; PADDING-BOTTOM: 10px; margin-bottom: 5px; border-left-color: #fbd686; border-left-width: 1px; border-left-style: solid; WIDTH: 195px; LINE-HEIGHT: 25px; PADDING-TOP: 10px; border-bottom-color: #fbd686; border-bottom-width: 1px; border-bottom-style: solid; margin-top:10px;" class="t_deal_l mb_0625"><?php echo $info?>
<div style="text-align: center;"> 
</div>
</div>

</div>
<script type="text/javascript">
function changeImg(mypic){
var xw=450;
var xl=268;
mypic.width = xw;
mypic.height = xl;
}
</script>
<div class="t_deal_r" style="FLOAT: right; OVERFLOW: hidden; WIDTH: 455px; LINE-HEIGHT: 22px;">
<div class="t_deal_r_img" style="WIDTH: 450px; LINE-HEIGHT: 268px; HEIGHT: 268px;">
<div class="imgs_displayer" style="FLOAT: left; POSITION: relative;">
<div class="window" style="OVERFLOW: hidden; WIDTH: 450px; POSITION: relative; HEIGHT: 268px;">
<div class="image_reel" style="LEFT: 0px; POSITION: absolute; TOP: 0px;">
<img src="<?php echo $public['url_link']?>" onload=changeImg(this)  style="FLOAT: left; BORDER-TOP-STYLE: none; BORDER-RIGHT-STYLE: none; BORDER-LEFT-STYLE: none; BORDER-BOTTOM-STYLE: none">
<img src="images/2df00bcddd3.jpg" onload=changeImg(this) style="FLOAT: left; BORDER-TOP-STYLE: none; BORDER-RIGHT-STYLE: none; BORDER-LEFT-STYLE: none; BORDER-BOTTOM-STYLE: none" >
<img src="images/4e2a8eafd06.jpg" onload=changeImg(this) style="FLOAT: left; BORDER-TOP-STYLE: none; BORDER-RIGHT-STYLE: none; BORDER-LEFT-STYLE: none; BORDER-BOTTOM-STYLE: none" >
<img src="images/f78cc4290a9.jpg" onload=changeImg(this)  style="FLOAT: left; BORDER-TOP-STYLE: none; BORDER-RIGHT-STYLE: none; BORDER-LEFT-STYLE: none; BORDER-BOTTOM-STYLE: none">
</div>
</div>
<div class="paging" style="DISPLAY: none; Z-INDEX: 100; RIGHT: 0px; WIDTH: 178px; BOTTOM: 0px; LINE-HEIGHT: 40px; POSITION: absolute; HEIGHT: 47px; TEXT-ALIGN: center;">
<a class="" href="http://tuan.t960.com/#" rel="1" style=" border-right-color: #ff3300; border-right-width: 1px; border-right-style: solid; PADDING-RIGHT: 5px; border-top-color: #ff3300; border-top-width:1px; border-top-style: solid; PADDING-LEFT: 5px; FONT-SIZE: 8pt; background-color: #fff; PADDING-BOTTOM: 2px; MARGIN-LEFT: 5px; border-left-color: #ff3300; border-left-width: 1px; border-left-style: solid; COLOR: #333; PADDING-TOP: 2px; border-bottom-color: #ff3300; border-bottom-width: 1px; border-bottom-style: solid; TEXT-DECORATION: none">1</a><a class="" href="http://tuan.t960.com/#" rel="2" style="border-right-color: #ff3300; border-right-width: 1px; border-right-style: solid; PADDING-RIGHT: 5px; border-top-color: #ff3300; border-top-width:1px; border-top-style: solid; PADDING-LEFT: 5px; FONT-SIZE: 8pt; background-color: #fff; PADDING-BOTTOM: 2px; MARGIN-LEFT: 5px; border-left-color: #ff3300; border-left-width: 1px; border-left-style: solid; COLOR: #333; PADDING-TOP: 2px; border-bottom-color: #ff3300; border-bottom-width: 1px; border-bottom-style: solid; TEXT-DECORATION: none">2</a><a class="" href="http://tuan.t960.com/#" rel="3" style="border-right-color: #ff3300; border-right-width: 1px; border-right-style: solid; PADDING-RIGHT: 5px; border-top-color: #ff3300; border-top-width:1px; border-top-style: solid; PADDING-LEFT: 5px; FONT-SIZE: 8pt; background-color: #fff; PADDING-BOTTOM: 2px; MARGIN-LEFT: 5px; border-left-color: #ff3300; border-left-width: 1px; border-left-style: solid; COLOR: #333; PADDING-TOP: 2px; border-bottom-color: #ff3300; border-bottom-width: 1px; border-bottom-style: solid; TEXT-DECORATION: none">3</a><a class="" href="http://tuan.t960.com/#" rel="4" style="border-right-color: #ff3300; border-right-width: 1px; border-right-style: solid; PADDING-RIGHT: 5px; border-top-color: #ff3300; border-top-width:1px; border-top-style: solid; PADDING-LEFT: 5px; FONT-SIZE: 8pt; background-color: #fff; PADDING-BOTTOM: 2px; MARGIN-LEFT: 5px; border-left-color: #ff3300; border-left-width: 1px; border-left-style: solid; COLOR: #333; PADDING-TOP: 2px; border-bottom-color: #ff3300; border-bottom-width: 1px; border-bottom-style: solid; TEXT-DECORATION: none">4</a></div>
</div>
</div>
<SCRIPT type=text/javascript>
$(document).ready(function()
{
//Set Default State of each portfolio piece
$(".paging").show();
$(".paging a:first").addClass("active");
//Get size of images, how many there are, then determin the size of the image reel.
var imageWidth = $(".window").width();
var imageSum = $(".image_reel img").size();
var imageReelWidth = imageWidth * imageSum;
//Adjust the image reel to its new size
$(".image_reel").css({'width' : imageReelWidth});
//Paging + Slider Function
rotate = function()
{
var triggerID = active.attr("rel") - 1; //Get number of times to slide
var image_reelPosition = triggerID * imageWidth; //Determines the distance the image reel needs to slide
$(".paging a").removeClass('active'); //Remove all active class
active.addClass('active'); //Add active class (the active is declared in the rotateSwitch function)
//Slider Animation
$(".image_reel").animate({
left: -image_reelPosition
}, 200 );
};
//Rotation + Timing Event
rotateSwitch = function()
{
//Set timer - this will repeat itself every 3 seconds
play = setInterval(function()
{
active = $('.paging a.active').next();
if ( active.length === 0) { //If paging reaches the end...
active = $('.paging a:first'); //go back to first
}
rotate(); //Trigger the paging and slider function
}, 3000); //Timer speed in milliseconds (3 seconds)
};
rotateSwitch(); //Run function on launch
//On Hover
$(".image_reel").hover(function()
{
clearInterval(play); //Stop the rotation
}, function() {
rotateSwitch(); //Resume rotation
});
//On Click
$(".paging a").click(function()
{
active = $(this); //Activate the clicked paging
//Reset Timer
clearInterval(play); //Stop the rotation
rotate(); //Trigger rotation immediately
rotateSwitch(); // Resume rotation
return false; //Prevent browser jump to link anchor
});
//On Hover
$(".paging a").hover(function()
{
active = $(this); //Activate the clicked paging
//Reset Timer
clearInterval(play); //Stop the rotation
rotate(); //Trigger rotation immediately
//rotateSwitch(); // Resume rotation
return false; //Prevent browser jump to link anchor
});
});
</SCRIPT>

<div style="height: 150px; margin-top: 10px; margin-bottom:10px; clear: both;">
<p><?php echo $public['content']?>
</p>
</div>
</div>
<div style="clear: both; height: 0px;">&nbsp;</div>
</div>
</div>



<div class="t_area_out" style="CLEAR: both; border-right-color: #ff9900; border-right-width: 1px; border-right-style: solid; border-top-color: #ff9900; border-top-width: 1px; border-top-style: solid; background-color: #ff9900; MARGIN-BOTTOM: 10px; border-left-color: #ff9900; border-left-width: 1px; border-left-style: solid; border-bottom-color: #ff9900; border-bottom-width: 1px; border-bottom-style: solid;">
<div style="position: relative;CLEAR: both; PADDING-RIGHT: 0px; PADDING-LEFT: 0px; background-color: #fff8e6; PADDING-BOTTOM: 0px; WIDTH: 100%; PADDING-TOP: 0px; HEIGHT: 100%;" class="t_area_in t_padding">
<div class="t_detail_l" style="DISPLAY: inline; background-color: #fff; FLOAT: left; OVERFLOW: hidden; WIDTH: 712px;">
<h4 style="PADDING-RIGHT: 15px; DISPLAY: block; PADDING-LEFT: 15px; background-color: #f2f2f2; PADDING-BOTTOM: 0px; margin-top: 15px; margin-left: 15px; margin-right: 15px; FONT: bold 16px/37px Tahoma,Helvetica,arial; border-left-color: #efc989; border-left-width: 5px; border-left-style: solid; WIDTH: 650px; COLOR: #f66666; PADDING-TOP: 0px; HEIGHT: 37px">本单详情</h4>
<div class="t_detail_txt" style="PADDING-RIGHT: 15px; PADDING-LEFT: 15px; PADDING-BOTTOM: 20px; margin-right: 5px; margin-bottom: 5px; OVERFLOW: hidden; COLOR: #666; PADDING-TOP: 20px;"><?php echo $detail['content']?></div>
<h4 style="PADDING-RIGHT: 15px; DISPLAY: block; PADDING-LEFT: 15px; background-color: #f2f2f2; PADDING-BOTTOM: 0px; margin-top: 15px; margin-left: 15px; margin-right: 15px; FONT: bold 16px/37px Tahoma,Helvetica,arial;  border-left-color: #efc989; border-left-width: 5px; border-left-style: solid; WIDTH: 650px; COLOR: #f66666; PADDING-TOP: 0px; HEIGHT: 37px;">特别提示</h4>
<div class="t_detail_txt" style="PADDING-RIGHT: 15px; PADDING-LEFT: 15px; PADDING-BOTTOM: 20px; margin-right: 5px; margin-bottom: 5px; OVERFLOW: hidden; COLOR: #666; PADDING-TOP: 20px;"><?php echo $tips['content']?></div>
<h4 style="PADDING-RIGHT: 15px; DISPLAY: block; PADDING-LEFT: 15px; background-color: #f2f2f2; PADDING-BOTTOM: 0px;margin-top: 15px; margin-left: 15px; margin-right: 15px; FONT: bold 16px/37px Tahoma,Helvetica,arial;  border-left-color: #efc989; border-left-width: 5px; border-left-style: solid; WIDTH: 650px; COLOR: #f66666; PADDING-TOP: 0px; HEIGHT: 37px;">他们说</h4>
<div class="t_detail_txt" style="PADDING-RIGHT: 15px; PADDING-LEFT: 15px; PADDING-BOTTOM: 20px; margin-right: 5px; margin-bottom: 5px; OVERFLOW: hidden; COLOR: #666; PADDING-TOP: 20px;"><?php echo $they['content']?></div>
<div class="at_xts" style="MARGIN: 5px 0px 10px 15px;">
<div class="at_xts_t" style=" background-image: url(http://tuan.t960.com/templates/default/images/new/cmb_04.gif); background-repeat: no-repeat; OVERFLOW: hidden; WIDTH: 685px; HEIGHT: 35px;"><div class="sName" style="PADDING-RIGHT: 10px; MARGIN-TOP: 13px; PADDING-LEFT: 10px; FONT-SIZE: 23px; background-color: #fff; PADDING-BOTTOM: 0px; MARGIN-LEFT: 10px; COLOR: #ff870b; PADDING-TOP: 0px; FONT-FAMILY: 微软雅黑,黑体; POSITION: absolute;">我们说</div></div>
<div class="at_xts_m" style="CLEAR: both; border-right-color: #eea552; border-right-width: 2px; border-right-style: solid; PADDING-RIGHT: 10px; PADDING-LEFT: 10px; PADDING-BOTTOM: 10px; margin-left: 2px; OVERFLOW: hidden; border-left-color: #eea552; border-left-width: 2px; border-left-style: solid; WIDTH: 656px; PADDING-TOP: 10px;"><?php echo $we['content']?>
</div>
<div class="at_xts_f" style=" background-image: url(http://tuan.t960.com/templates/default/images/new/cmb_05.gif); background-repeat: no-repeat;OVERFLOW: hidden; WIDTH: 685px; HEIGHT: 44px;"></div></div>
</div>

<div style="clear: both;"></div>
</div>
</div>
</div>
</div>
</body>
</html>
