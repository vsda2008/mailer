<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>无标题文档</title>
<link href="<?php echo $current_up;?>/js/css/ui-lightness/jquery-ui-1.8.custom.css" rel="stylesheet" type="text/css"/>
<script src="<?php echo $current_up;?>/js/jquery.js"></script>
<script src="<?php echo $current_up;?>/js/jquery-ui.js"></script>
<script type="text/javascript" src="<?php echo $current_up;?>/js/upload/swfobject.js"></script>
<script type="text/javascript" src="<?php echo $current_up;?>/js/upload/jquery.uploadify.v2.1.0.min.js"></script> 
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
.bjq{ padding:0px; margin-top:50px}
.STYLE1 {font-size: 12px}

a:link {
	font-size: 12px;
	color: #06482a;
	text-decoration: none;

}
a:visited {
	font-size: 12px;
	color: #06482a;
	text-decoration: none;
}
a:hover {
	font-size: 12px;
	color: #FF0000;
	text-decoration: underline;
}
a:active {
	font-size: 12px;
	color: #FF0000;
	text-decoration: none;
}

-->
</style>
<script type="text/JavaScript">
<!--

$(function(){
	   $('#loading_dialog').dialog({
	                 autoOpen: false,
					 width: 600,
					 resizable: false,
					 modal: true,
					 title: '加载中,请稍后...'
	   
	   });
	   /*$('#btn_post_mail').click(function(){
		   s_num =  $("#s_num").val();
		   $('#loading_dialog').dialog('option','title','发送中...');
		   temp_id = $("input[name='temp_id']:checked").val();
			$.ajax({
				  type:"POST",
				  url:"/index.php/mailer/do_bat_mail",
				  data:"s_num=" + s_num + '&temp_id='+temp_id,
				  success:function(msg){
					   alert(msg);
					  // $("#temp_div").html(msg);
				  }
				
			});  
	   });*/
	   $("input[name='rd_send']").click(function(){
 	     	  type = $("input[name='rd_send']:checked").val();
			  if( type == 'all'){
			    $("#s_num").val('all');
			  }else{
			    $("#s_num").val('1');
			  }        
	   });
		$("#loading").bind("ajaxSend", function(){
		    $('#loading_dialog').dialog('open');
		}).bind("ajaxComplete", function(){
		    $('#loading_dialog').dialog('close');
		});

		$.ajax({
		      type:"POST",
			  url:"/index.php/ajax/get_temp",
			  data:"page=1",
			  success:function(msg){
				  // alert(msg);
			       $("#temp_div").html(msg);
			  }
			
		});  
		$(this).dialog('close');
});	

//-->
</script>

</head>

<body>
<form action="<?php echo $submit_url;?>" method="post" name="mform" id='mform'>
<div ><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="30"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="15" height="30"><img src="<?php echo $current_skin;?>/images/tab_03.gif" width="15" height="30" /></td>
        <td background="<?php echo $current_skin;?>/images/tab_05.gif"><img src="<?php echo $current_skin;?>/images/311.gif" width="16" height="16" />发送设置</td>
        <td width="14"><img src="<?php echo $current_skin;?>/images/tab_07.gif" width="14" height="30" /></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="9" background="<?php echo $current_skin;?>/images/tab_12.gif">&nbsp;</td>
        <td bgcolor="#f3ffe3"><table width="99%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#c0de98" >
          <tr>
            <td width="18%" height="26" background="<?php echo $current_skin;?>/images/tab_14.gif" class="STYLE1">&nbsp;</td>
            <td width="47%" background="<?php echo $current_skin;?>/images/tab_14.gif" class="STYLE1"><div align="center"><span class="STYLE2 STYLE1">
            <input type="radio" name="rd_send" id="radio" value="num" />
限制数量</span> <span class="STYLE2 STYLE1">
<input type="radio" name="rd_send" id="radio2" value="all" />
</span>全部发送 </div></td>
            <td width="35%" height="26" background="<?php echo $current_skin;?>/images/tab_14.gif" class="STYLE1">&nbsp;</td>
          </tr>
          <tr>
            <td height="18" bgcolor="#FFFFFF">&nbsp;</td>
            <td bgcolor="#FFFFFF"><label>
              <div align="center">
                <input name="s_num" type="text" id="s_num" size="20" />
              </div>
            </label></td>
            <td height="18" bgcolor="#FFFFFF"><div align="center"><span class="STYLE2"><img src="<?php echo $current_skin;?>/images/010.gif" width="9" height="9" /> </span><span class="STYLE1">[<a href="#"  id="btn_post_mail">递交</a>]<input type=submit value='递交' /></span></div></td>
          </tr>
          <tr>
            <td height="18" bgcolor="#FFFFFF">&nbsp;</td>
            <td bgcolor="#FFFFFF"><label>
              <div align="center">模板选择              </div>
              <div align="center"></div>
              <div align="center"></div>
            </label></td>
            <td height="18" bgcolor="#FFFFFF">&nbsp;</td>
          </tr>
          <tr>
            <td height="18" bgcolor="#FFFFFF">&nbsp;</td>
               <td height="18" bgcolor="#FFFFFF" id='temp_div'>
               <label> <input type="radio" name="temp_id" id="temp_id" value="temp_id" />0000</label><br />
               </td>
            <td height="18" bgcolor="#FFFFFF">&nbsp;</td>
          </tr>
          <tr>
            <td colspan="3" bgcolor="#FFFFFF"></td>
            </tr>
          
        </table></td>
        <td width="9" background="<?php echo $current_skin;?>/images/tab_16.gif">&nbsp;</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="29"><table width="100%" border="0" cellspacing="0" cellpadding="0">
    </table> <tr><td><table><tr><td>
	  总计<?php echo $all;?>封邮件地址，已发送<?php echo $send;?>封邮件，剩余<?php echo $no;?>封邮件地址。要进行新一轮的发送请<font style="color=red; font-size:16px;"><b><a href="/index.php/mailer/up_mail" style="font-size:18px; font-style:italic;">点击</a></b></font>这里重置数据</font>
	  </td></tr></table></td></tr></td>
  </tr>
</table></div>
<div id='loading' style='display:none'><div id='loading_dialog'><img src="<?php echo $current_skin;?>/images/loading.gif" width="32" height="32" /></div></div>
</form>
</body>
</html>
