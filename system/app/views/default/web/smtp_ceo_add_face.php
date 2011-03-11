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
.STYLE2 {font-size: 14px}

-->
</style>
<script type="text/JavaScript">
<!--

$(function(){
	  $('#btn_add_smtp').click(function(){
			 type = $("input[name='is_auth']:checked").val();
			 if( typeof type == 'undefined'  ){alert('您还没有选择!'); return false;}else{
				 $('#dialog').dialog('open'); 
				
			 };
		    h = $("input[name='host']").val();
			u = $("input[name='username']").val();
			p = $("input[name='pwd']").val();
			pt = $("input[name='port']").val();
			d = $("input[name='id']").val();
			$.ajax({
				type: "POST",
				url: "/index.php/smtp_ceo/add",
				data: "id=" + d + "&host=" + h + "&username=" + u + "&pwd=" + p + "&port" + pt + "&is_auth=" + type,
				success: function(msg){
					 alert(msg);
				} 
			});
	  });
	  $('#clear_all').click(function(){
          $("#mform")[0].reset();
	  });
	  $('#loading_dialog').dialog({
	                 autoOpen: false,
					 width: 600,
					 resizable: false,
					 modal: true,
					 title: '导入中,请稍后...'
	   
	   });
		$("#loading").bind("ajaxSend", function(){
		    $('#loading_dialog').dialog('open');
		}).bind("ajaxComplete", function(){
		    $('#loading_dialog').dialog('close');
		});
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
        <td background="<?php echo $current_skin;?>/images/tab_05.gif"><img src="<?php echo $current_skin;?>/images/311.gif" width="16" height="16" />SMPT录入</td>
        <td width="14"><img src="<?php echo $current_skin;?>/images/tab_07.gif" width="14" height="30" /></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="9" background="<?php echo $current_skin;?>/images/tab_12.gif">&nbsp;</td>
        <td bgcolor="#f3ffe3"><table width="99%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#c0de98"     >
          <tr>
            <td width="23%" height="26" background="<?php echo $current_skin;?>/images/tab_14.gif" class="STYLE1">&nbsp;</td>
            <td width="42%" background="<?php echo $current_skin;?>/images/tab_14.gif" class="STYLE1"><div align="center"></div></td>
            <td width="35%" height="26" background="<?php echo $current_skin;?>/images/tab_14.gif" class="STYLE1">&nbsp;</td>
          </tr>
          <tr>
            <td height="18" bgcolor="#FFFFFF"><div align="center" class="STYLE2 STYLE1">SMTP地址</div></td>
            <td bgcolor="#FFFFFF"><label>
            <input name="host" type="text" id="textfield" size="70" value="<?php echo $re['host'];?>" />
            </label></td>
            <td height="18" bgcolor="#FFFFFF"><div align="center"><span class="STYLE2"><img src="<?php echo $current_skin;?>/images/010.gif" width="9" height="9" /> </span><span class="STYLE1">[<a href="#"  id="btn_add_smtp">递交</a>]</span>[<a href="#" id="clear_all">重置</a>]</div></td>
          </tr>
          <tr>
            <td height="27" bgcolor="#FFFFFF"><div align="center">用户名</div></td>
               <td bgcolor="#FFFFFF"><input name="username" type="text" id="textfield10" size="70" value="<?php echo $re['username'];?>"/></td>
               <td height="27" bgcolor="#FFFFFF">&nbsp;</td>
          </tr>
          <tr>
            <td height="18" bgcolor="#FFFFFF"><div align="center">密码</div></td>
            <td bgcolor="#FFFFFF"><label>
              <input name="pwd" type="text" id="textfield11" size="70" value="<?php echo $re['pwd'];?>"/>
              <input name="id" type="hidden" id="textfield11" size="70" value="<?php echo $re['id'];?>"/>
              <div align="center"></div>
            </label></td>
            <td height="18" bgcolor="#FFFFFF">&nbsp;</td>
          </tr>
          <tr>
            <td height="18" bgcolor="#FFFFFF"><div align="center">端口</div></td>
            <td bgcolor="#FFFFFF"><input name="port" type="text" id="textfield12" size="10" value="25" /></td>
            <td height="18" bgcolor="#FFFFFF"> </td>
          </tr>
          <tr>
            <td height="18" bgcolor="#FFFFFF"><div align="center">是否验证
              </div></td>
            <td height="18" bgcolor="#FFFFFF"><div align="center">
              <input name="is_auth" type="radio"  id="rad_csv"  value="1" checked="checked" />
              是
              <input type="radio" name="is_auth"  value="0" id="rad_sql" />
              否</div></td>
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
    </table></td>
  </tr>
</table></div>
</form>
<div id='loading' style='display:none'><div id='loading_dialog'><img src="<?php echo $current_skin;?>/images/loading.gif" width="32" height="32" /></div></div>
</body>
</html>
