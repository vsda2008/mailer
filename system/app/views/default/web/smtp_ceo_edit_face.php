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
	   $("#checkall").click(function(){
	         $("input[name='temp_id[]']").each(function(i){
			    //alert($(this).val());
			    this.checked = true;
			 
			 });
	   });
	   $("#clearall").click(function(){
	         $("input[name='temp_id[]']").each(function(i){
			    //alert($(this).val());
			    this.checked = false;
			 
			 });
	   }); 
	   $('#btn_del_temp').click(function(){
		   // $('#loading_dialog').dialog('option','title','发送中...');
		    $('#mform').attr('action','/index.php/smtp_ceo/del') 
            $('#mform').submit(); 
	   });
	   $('#test_send').click(function(){
		    $('#mform').attr('action','/index.php/mailer/test_send') ;
            $('#mform').submit(); 
	   });
       $('#btn_mod_temp').click(function(){
	       //$('#mform').action='';
		     select = false;
	         $("input[name='id[]']").each(function(i){
			    //alert($(this).val());
				cur = this.checked ;
			    if ( cur == true){
                  select = true;
				  
			    } 
			 
			 });
			if (select == false)
			{
				alert('您还没有选择,要修改的SMTP!');
				exit;
			}
		    $('#mform').attr('action','/index.php/smtp_ceo/add_face') 
            $('#mform').submit(); 
	   });
		$("#loading").bind("ajaxSend", function(){
		    $('#loading_dialog').dialog('open');
		}).bind("ajaxComplete", function(){
		    $('#loading_dialog').dialog('close');
		});

		$.ajax({
		      type:"POST",
			  url:"/index.php/smtp_ceo/get_smtp_list",
			  data:"page=1&ac=del_temp",
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
        <td background="<?php echo $current_skin;?>/images/tab_05.gif"><img src="<?php echo $current_skin;?>/images/311.gif" width="16" height="16" />SMTP编辑</td>
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
            <td width="18%" height="18" bgcolor="#FFFFFF">&nbsp;</td>
            <td width="47%" bgcolor="#FFFFFF"><label>
              <div align="center">SMTP列表</div>
              <div align="center"></div>
              <div align="center"></div>
            </label></td>
            <td width="35%" height="18" bgcolor="#FFFFFF"><span class="STYLE2"><img src="<?php echo $current_skin;?>/images/010.gif" width="9" height="9" /> </span><span class="STYLE1">[<a href="#"  id="btn_del_temp">删除</a>]</span><span class="STYLE1">[<a href="#"  id="btn_mod_temp">修改</a>][<a href="#" id='test_send'>测试</a>]</span></td>
          </tr>
          <tr>
            <td height="18" bgcolor="#FFFFFF">&nbsp;</td>
               <td height="18" bgcolor="#FFFFFF" id='temp_div'>
               <label>
               <input type="checkbox" name="del_group" id="del_group" />
               0000</label><br /> 
                    </td>
            <td height="18" bgcolor="#FFFFFF"><label style="float:left; margin:5px;">
              <input type="button" name="checkall" id="checkall" value="全选" />
            </label>
              <span style="float:left; margin:5px;">
              <input type="button" name="clearall" id="clearall" value="取消" />
              </span>            <br />  </td>
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
<div id='loading' style='display:none'><div id='loading_dialog'><img src="<?php echo $current_skin;?>/images/loading.gif" width="32" height="32" /></div></div>
</form>
</body>
</html>
