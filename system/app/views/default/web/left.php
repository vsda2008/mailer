<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>无标题文档</title>
<script src="<?php echo $current_up;?>/js/jquery.js"></script>
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
.STYLE2 {color: #43860c; font-size: 12px; }

a:link {font-size:12px; text-decoration:none; color:#43860c;}
a:visited {font-size:12px; text-decoration:none; color:#43860c;}
a:hover{font-size:12px; text-decoration:none; color:#FF0000;}
.hide{
 display:none;
}
-->
</style>
<script type="text/JavaScript">
<!--

  $(document).ready(function() {
	  $('.li_menu a').siblings().css('display','none');
      $('.li_menu a').click(function(){
	       //  $(this).children.toggle();
			 $(this).siblings().toggle();
	  });
  });


//-->
</script>
</head>

<body onload="MM_preloadImages('<?php echo $current_skin;?>/images/main_26_1.gif','<?php echo $current_skin;?>/images/main_29_1.gif','<?php echo $current_skin;?>/images/main_31_1.gif')">
<table width="177" height="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0" style="table-layout:fixed">
      <tr>
        <td height="26" background="<?php echo $current_skin;?>/images/main_21.gif">&nbsp;</td>
      </tr>
      <tr>
        <td height="80" style="background-image:url(<?php echo $current_skin;?>/images/main_23.gif); background-repeat:repeat-x;"><table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td height="45"><div align="center"><a href="#"><img src="<?php echo $current_skin;?>/images/main_26.gif" name="Image1" width="40" height="40" border="0" id="Image1" onmouseover="MM_swapImage('Image1','','<?php echo $current_skin;?>/images/main_26_1.gif',1)" onmouseout="MM_swapImgRestore()" /></a></div></td>
            <td><div align="center"><a href="#"><img src="<?php echo $current_skin;?>/images/main_28.gif" name="Image2" width="40" height="40" border="0" id="Image2" onmouseover="MM_swapImage('Image2','','<?php echo $current_skin;?>/images/main_29_1.gif',1)" onmouseout="MM_swapImgRestore()" /></a></div></td>
            <td><div align="center"><a href="#"><img src="<?php echo $current_skin;?>/images/main_31.gif" name="Image3" width="40" height="40" border="0" id="Image3" onmouseover="MM_swapImage('Image3','','<?php echo $current_skin;?>/images/main_31_1.gif',1)" onmouseout="MM_swapImgRestore()" /></a></div></td>
          </tr>
          <tr>
            <td height="25"><div align="center" class="STYLE2"><a href="#">系统管理</a></div></td>
            <td><div align="center" class="STYLE2"><a href="#">日志管理</a></div></td>
            <td><div align="center" class="STYLE2"><a href="#">数据分析</a></div></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td  style="line-height:4px; background:url(<?php echo $current_skin;?>/images/main_38.gif)">&nbsp;</td>
      </tr>
      <tr>
        <td><img src="<?php echo $current_skin;?>/images/left_tree.gif" width="144" height="141" style='display:none' />
		   <ul id='menu'>
		        <li class='li_menu'><A HREF="#">系统设置</A>
				     <ul>
					     <li><A HREF="/index.php/mailer/set_type_face" target='_tab'>发送设置</A></li>
						 <li><A HREF="/index.php/brochure/manage" target='_tab'>管理员添加</A></li>
					 </ul>
				</li>
		        <li class='li_menu'><A HREF="#">推广管理</A>
				     <ul>
					     <li><A HREF="/index.php/mailer/mface" target='_tab'>发送邮件</A></li>
						 <li><A HREF="/index.php/mailer/sface" target='_tab'>发送短信</A></li>
						 <li><A HREF="/index.php/mailer/bat_mface" target='_tab'>批量邮件发送</A></li>
						 <li><A HREF="/index.php/mailer/bat_sface" target='_tab'>批量短信发送</A></li>
						 <li><A HREF="/index.php/mailer/m_click" target='_tab'>邮件跟踪</A></li>
					 </ul>
				</li>
		        <li class='li_menu'><A HREF="#">定时任务</A>
				     <ul>
					     <li><A HREF="/index.php/mailer/mface" target='_tab'>任务管理</A></li>
						 <li><A HREF="/index.php/mailer/sface" target='_tab'>模板选择</A></li>
					 </ul>
				</li>
		        <li class='li_menu'><A HREF="#">模板管理</A>
				     <ul>
					     <li><A HREF="/index.php/template/temp_delface" target='_tab'>删除修改</A></li>
						 <li><A HREF="/index.php/template/temp_addface" target='_tab'>添加模板</A></li>
					 </ul>
				</li>
		        <li class='li_menu'><A HREF="#">数据录入</A>
				     <ul>
					     <li><A HREF="/index.php/mailer/imface" target='_tab'>邮件录入</A></li>
						 <li><A HREF="/index.php/mailer/isface" target='_tab'>手机录入</A></li>
                         <li><A HREF="/index.php/mailer/isface" target='_tab'>清空手机数据</A></li>
						 <li><A HREF="/index.php/mailer/modu" target='_tab'>接口模板</A></li>
					 </ul>
				</li>
		        <li class='li_menu'><A HREF="#">SMTP管理</A>
				     <ul>
					     <li><A HREF="/index.php/smtp_ceo/add_face" target='_tab'>添加SMTP</A></li>
						 <li><A HREF="/index.php/smtp_ceo/edit_face" target='_tab'>编辑SMTP</A></li>
					 </ul>
				</li>
		        <li class='li_menu'><A HREF="#">周刊管理</A>
				     <ul>
					     <li><A HREF="/index.php/brochure/del_select_face" target='_tab'>修改删除</A></li>
						 <li><A HREF="/index.php/brochure/" target='_tab'>编辑周刊</A></li>
						 <li><A HREF="/index.php/brochure/preview_list_issn_face" target='_tab'>预览周刊</A></li>
						 <li><A HREF="/index.php/brochure/add_issn_face" target='_tab'>添加期数</A></li>
					 </ul>
				</li>
				<li class='li_menu'><A HREF="#">团购管理</A>
				     <ul>
					     <li><A HREF="/index.php/customers/del_select_face" target='_tab'>修改删除</A></li>
						 <li><A HREF="/index.php/customers/" target='_tab'>编辑团购</A></li>
						 <li><A HREF="/index.php/customers/preview_list_issn_face" target='_tab'>预览团购</A></li>
						 <li><A HREF="/index.php/customers/add_issn_face" target='_tab'>添加团购期数</A></li>
					 </ul>
				</li>
		        <li class='li_menu'><A HREF="/index.php/brochure/del_select_face" target='_tab'>邮件分类管理</A>
				     <ul>
					     <li><A HREF="/index.php/brochure/del_select_face" target='_tab'>添加类别</A></li>
						 <li><A HREF="/index.php/brochure/" target='_tab'>手机号管理</A></li>
 
					 </ul>
				</li>
		   </ul>
		</td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html>
