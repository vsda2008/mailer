<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>旅途周刊</title>
<style type="text/css">
<!--
a {
	color:#2C2C2C;
	text-decoration:underline;
	outline:none
}
a:link {
	color:#2C2C2C;
}
a:hover {
	color:#F66400;
	text-decoration:underline
}
a:visited {
	color:#2C2C2C;
}
a.lj_ls {
	color:#0064C8;
	text-decoration:underline;
	outline:none
}
a.lj_ls:link {
	color:#0064C8;
}
a.lj_ls:hover {
	color:#F66400;
	text-decoration:underline
}
a.lj_ls:visited {
	color:#0064C8;
}
a.lj_cs {
	color:#F66400;
	text-decoration:underline;
	font-weight:bold;
	outline:none
}
a.lj_cs:link {
	color:#F66400;
	font-weight:bold;
}
a.lj_cs:hover {
	color:#00469D;
	font-weight:bold;
	text-decoration:underline
}
a.lj_cs:visited {
	color:#F66400;
	font-weight:bold;
}
-->
</style>
</head>
<body style="margin:0; padding:0; text-align:center;font-size:16px; font-family:"宋体";">
<div id="allpages" style="width:100%; height:100%; margin:0px auto;">
  <div class="main" style="width:660px; margin:0 auto; border:2px solid #00469D; margin-top:10px;">
    <div class="up_0" style="height:80px; border-bottom:2px solid #00469D;">
      <div class="up_1" style="float:left;"><span style=""><img src="http://iebook.t960.com/lvzk/images//zktou.jpg" /></span><span class="STYLE1" style="font-size:14px;"><?php echo $issn_title?></span></div>
      <div class="up_2" style="float:right; margin:35px 35px 0px 0px; font-size:16px; font-weight:bold; color:#00469D;"><a href="file:///D|/My Documents/桌面/www.t960.com" target="_self" class="lj_ls">旅途中国</a></div>
      <div style="clear:both"></div>
    </div>
    <div class="gg" style="height:150px; border-bottom:2px solid #00469D; margin-top:10px;">
      <div class="w_1" style="float:left; font-size:16px; font-weight:bold; color:#0064C8; height:50px; width:150px;">
        <div class="lb"><img src="http://iebook.t960.com/lvzk/images//lb.jpg" / style="float:left; padding:10px 0px 0px 10px;"></div>
        <div style="padding-top:25px;">旅途公告</div>
      </div>
	  <div style="clear:both"></div>
      <div class="w_2" style="height:66px; line-height:28px; margin-top:10px; float:left; width:640px; text-align:left; padding-left:10px;"> <?php echo $public?> </div>
	  <div style="clear:both"></div>
    </div>
	<div style="clear:both"></div>
    <div class="jq" style="border-bottom:2px solid #00469D; margin-top:10px;">
      <div class="w_33" style="float:left; font-size:16px; font-weight:bold; color:#0064C8; height:50px; width:150px;">
        <div class="lb"><img src="http://iebook.t960.com/lvzk/images//jq.jpg"/ style="float:left; padding:10px 0px 0px 10px;"></div>
        <div style="padding-top:25px;">景区推荐</div>
      </div>
      <div style="clear:both"></div>
      <div class="jq_pp" style="width:640x; margin-bottom:10px; margin-top:10px; padding-left:10px; padding-right:10px; float:left;">
        <marquee scrollamount=1 scrolldelay=1 valign=middle behavior="scroll" onMouseMove="this.stop()" onMouseOut="this.start()"  width:640px height:125px;>
        <ul>
          <?php foreach($digg_senice as $k=>$v):?>
          <li style="float:left; width:160px; text-align:center; list-style-type:none">
            <div><img src="<?php echo $v['file:///D|/My Documents/桌面/p_link'];?>" style='width:150px;height:100px' /></div>
            <div > 
               <a href='<?php echo $v['file:///D|/My Documents/桌面/url_link'];?>' target='_self'><?php echo $v['title'];?></a> 
            </div>
          </li>
          <?php endforeach;?>
        </ul>
        </marquee>
      </div>
      <div style="clear:both"></div>
    </div>
    <div style="clear:both"></div>
    <div class="hd" style="border-bottom:2px solid #00469D; margin-top:10px;">
      <div class="w_3" style="float:left; font-size:16px; font-weight:bold; color:#0064C8; height:50px; width:210px;">
        <div class="lb"><img src="http://iebook.t960.com/lvzk/images//szhd.jpg"/ style="float:left; padding:10px 0px 0px 10px;"></div>
        <div style="padding-top:25px;">上周精彩活动回顾</div>
      </div>
	  <div style="clear:both"></div>
      <?php foreach($last_week_hd as $k=>$v):?>
      <div class="w_4" style="float:left; line-height:50px; width:600px; text-align:left; padding-left:20px; background:url(../http://iebook.t960.com/lvzk/images//dz.jpg) no-repeat left; margin-left:10px;"><a href="<?php echo $v['file:///D|/My Documents/桌面/url_link']?>" class="lj_cs"><?php echo $v['title']?></a></div>
	  <div style="clear:both"></div>
      <div class="w_5" style="float:left; line-height:28px; text-align:left; padding-left:15px; width:630px; padding-right:15px;"> <?php echo stripslashes($v['content']);?> </div>
      <?php endforeach;?>
      <div style="clear:both"></div>
    </div>
	<div style="clear:both"></div>
    <div class="xl" style="border-bottom:2px solid #00469D; margin-top:10px;">
      <div class="w_7" style="float:left; font-size:16px; font-weight:bold; color:#0064C8; height:50px; width:180px;">
        <div class="lb"><img src="http://iebook.t960.com/lvzk/images//xl.jpg"/ style="float:left; padding:10px 0px 0px 10px;"></div>
        <div style="padding-top:25px;">人气线路推荐</div>
      </div>
	  <div style="clear:both"></div>
      <?php foreach($digg_xl as $k=>$v):?>
      <div class="w_8" style="float:left; line-height:50px; width:600px; text-align:left; padding-left:20px; background:url(../http://iebook.t960.com/lvzk/images//dz.jpg) no-repeat left; margin-left:10px;"><a href="<?php echo $v['file:///D|/My Documents/桌面/url_link']?>" class="lj_cs"><?php echo $v['title']?></a></div>
	  <div style="clear:both"></div>
      <div class="w_9" style="float:left; line-height:28px; text-align:left; padding-left:15px; width:630px; padding-right:15px;"><?php echo stripslashes($v['content']);?></a><a href="<?php echo $v['file:///D|/My Documents/桌面/url_link']?>" class="lj_cs">详细行程</a></div>   <br />
      <?php endforeach;?>
      <div style="clear:both"></div>
    </div>
	<div style="clear:both"></div>
    <div class="rt" style="border-bottom:2px solid #00469D; marign-top:10px;">
      <div class="w_44" style="float:left; font-size:16px; font-weight:bold; color:#0064C8; height:50px; width:150px;">
        <div class="lb"><img src="http://iebook.t960.com/lvzk/images//rt.jpg"/ style="float:left; padding:10px 0px 0px 10px;"></div>
        <div style="padding-top:25px;">一周热帖</div>
      </div>
	  <div style="clear:both"></div>
      <?php foreach($digg_bbs as $k=>$v):?>
      <div class="w_55" style="float:left; line-height:50px; width:600px; text-align:left;  padding-left:20px; background:url(../http://iebook.t960.com/lvzk/images//dz.jpg) no-repeat left; margin-left:10px;"><a href="<?php echo $v['file:///D|/My Documents/桌面/url_link']?>" class="lj_cs"><?php echo $v['title']?></a></div>
	  <div style="clear:both"></div>
      <div class="w_66" style="float:left; line-height:28px; text-align:left; padding-left:15px; width:630px; padding-right:15px; padding-bottom:10px;"><?php echo stripslashes($v['content']);?></a><strong><a href="<?php echo $v['file:///D|/My Documents/桌面/url_link']?>" class="lj_cs">&lt;进入讨论&gt;</a></strong></div>
      <?php endforeach;?>
      <div style="clear:both"></div>
    </div>
    <div style="clear:both"></div>
    <div class="xx" style="border-bottom:2px solid #00469D; margin-top:10px">
      <div class="w_44"  style="float:left; font-size:16px; font-weight:bold; color:#0064C8; height:50px; width:150px;">
        <div class="lb"><img src="http://iebook.t960.com/lvzk/images//xx.jpg"/ style="float:left; padding:10px 0px 0px 10px;"></div>
        <div style="padding-top:25px;">旅途行摄</div>
      </div>
	  <div style="clear:both"></div>
      <div class="w_88" style="float:left; line-height:28px; text-align:left; padding-left:15px; width:630px; padding-right:15px; padding-bottom:10px; padding-top:10px;"> 不必在乎终点，在乎的是沿途的风景和看风景的心情~~~</div>
      <?php foreach($digg_sying as $k=>$v):?>
	  <div style="clear:both"></div>
      <div class="w_99" style="float:left; line-height:22px; text-align:left; padding-left:15px; width:630px; padding-right:15px; padding-bottom:10px; color:#0064C8; font-size:12px;"><a href="<?php echo $v['file:///D|/My Documents/桌面/url_link']?>" class="lj_ls"><?php echo $v['title']?></a></div>
      <?php endforeach;?>
      <div style="clear:both"></div>
    </div>
    <div style="clear:both"></div>
    <div class="jqxl" style="border-bottom:2px solid #00469D; margin-top:10px;">
      <div class="w_xl" style="float:left; font-size:16px; font-weight:bold; color:#0064C8; height:50px; width:180px;">
        <div class="lb"><img src="http://iebook.t960.com/lvzk/images//jqxl.jpg"/ style="float:left; padding:10px 0px 0px 10px;"></div>
        <div style="padding-top:25px;">近期线路预览</div>
      </div>
	  <div style="clear:both"></div>
      <div class="dx" style="float:left; width:640px; padding:10px; height:28px; line-height:28px; padding-bottom:0px;">
        <div style="float:left; background-color:#E7E7E7; width:310px; text-align:left; padding-left:10px;"><a href="#" class="lj_cs">短线</a></div>
        <div style="float:right;  background-color:#E7E7E7; width:320px; text-align:right;"><a href="#" class="lj_ls">更多</a></div>
        <div style="clear:both"></div>
      </div>
	  <div style="clear:both"></div>
      <div class="dx_w" style="line-height:32px; text-align:left; padding-left:18px; float:left; width:640px;">
        <ul>
          <?php foreach($digg_xl_1 as $k=>$v):?>
          <li> <a href="<?php echo $v['file:///D|/My Documents/桌面/url_link']?>" class="lj_ls"><?php echo $v['title']?></a> </li>
          <?php endforeach;?>
        </ul>
        <div style="clear:both"></div>
      </div>
	  <div style="clear:both"></div>
      <div class="dx" style="float:left; width:640px; padding:10px; height:28px; line-height:28px; padding-bottom:0px;">
        <div style="float:left; background-color:#E7E7E7; width:310px; text-align:left; padding-left:10px;"><a href="#" class="lj_cs">长线</a></div>
        <div style="float:right;  background-color:#E7E7E7; width:320px; text-align:right;"><a href="#" class="lj_ls">更多</a></div>
        <div style="clear:both"></div>
      </div>
	  <div style="clear:both"></div>
      <div class="dx_w" style="line-height:32px; text-align:left; padding-left:18px; float:left; width:640px;">
        <ul>
          <?php foreach($digg_xl_2 as $k=>$v):?>
          <li> <a href="<?php echo $v['file:///D|/My Documents/桌面/url_link']?>" class="lj_ls"><?php echo $v['title']?></a> </li>
          <?php endforeach;?>
        </ul>
        <div style="clear:both"></div>
      </div>
      <div style="clear:both"></div>
    </div>
    <div style="clear:both"></div>
    <div style="height:40px; font-size:12px; line-height:40px; color:#0064C8;">·<?php echo $issn_title?>·完·【旅途中国编辑部】制作·本期责任编辑： 旅途中国风</div>
  </div>
</div>
</body>
</html>
