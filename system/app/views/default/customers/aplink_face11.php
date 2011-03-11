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
function SetEditorContents(EditorName, ContentStr) { 
    var oEditor = FCKeditorAPI.GetInstance(EditorName) ; 
    oEditor.SetHTML(ContentStr) ; 
}
function GetEditorContents(EditorName){
    var oEditor = FCKeditorAPI.GetInstance(EditorName) ; 
    return oEditor.GetHTML() ; 
}
$(function(){
	   $('#loading_dialog').dialog({
	                 autoOpen: false,
					 width: 600,
					 resizable: false,
					 modal: true,
					 title: '加载中,请稍后...'
	   
	   });
	   $('#save_to_aplink').click(function(){
			title = $("input=[name='title']").val();
			url_link = $("input=[name='url_link']").val();
            tid = $("input=[name='tid']").val();
			res_type = $("input=[name='res_type']").val();
			issn = $("input=[name='issn']").val();
			content = GetEditorContents('content');
			$.ajax({
					type:'POST',
					url:'/index.php/customers/do_add',
						//encodeURIComponent('张');
					data:'title=' + title + '&url_link=' + url_link + '&issn=' + issn + '&res_type=' + res_type + 
					'&tid=' + tid + '&content=' + encodeURIComponent(content),
					success: function(msg){
						 alert(msg);
					}
			});
	   });


		$("#loading").bind("ajaxSend", function(){
		    $('#loading_dialog').dialog('open');
		}).bind("ajaxComplete", function(){
		    $('#loading_dialog').dialog('close');
		});
//		//,closeText: 'close',draggable:false,hide: 'slide',modal=true,resizable=false
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
        <td background="<?php echo $current_skin;?>/images/tab_05.gif"><img src="<?php echo $current_skin;?>/images/311.gif" width="16" height="16" />文章添加</td>
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
            <td width="23%" height="26" background="<?php echo $current_skin;?>/images/tab_14.gif" class="STYLE1"><div align="center">当前栏目</div></td>
            <td width="42%" background="<?php echo $current_skin;?>/images/tab_14.gif" class="STYLE1"><?php echo $tname?></td>
            <td width="35%" height="26" background="<?php echo $current_skin;?>/images/tab_14.gif" class="STYLE1"><div align="center" class="STYLE2">[<a href="#" id='save_to_aplink'>保存</a>] </div></td>
          </tr>
          <!--<tr>
            <td height="18" bgcolor="#FFFFFF"><div align="center" class="STYLE1">文章标题</div></td>
            <td bgcolor="#FFFFFF"><label>
               <input name="tid" type="hidden" id="textfield" value='<?php echo $tid;?>' />
               <input name="issn" type="hidden" id="textfield" value='<?php echo $issn;?>' />
                <input name="res_type" type="hidden" id="textfield" value='<?php echo $res_type;?>' />
              <input name="title" type="text" id="textfield" size="70" />
            </label></td>
            <td height="18" bgcolor="#FFFFFF"><div align="center"></div></td>
          </tr>-->
          <tr>
            <td height="18" bgcolor="#FFFFFF"><div align="center" class="STYLE2 STYLE1">团购商品购买链接</div></td>
            <td bgcolor="#FFFFFF"><label>
              <input name="url_link" type="text" id="textfield" size="70" />
            </label></td>
            <td height="18" bgcolor="#FFFFFF"><div align="center"></div></td>
          </tr>
          <!--<tr>
            <td height="18" bgcolor="#FFFFFF"><div align="center" class="STYLE1">
              <div align="center" class="STYLE1">文章描述</div>
            </div></td>
            <td bgcolor="#FFFFFF">&nbsp;</td>
            <td height="18" bgcolor="#FFFFFF"><div align="center"></div></td>
          </tr>
          <tr>
            <td height="18" colspan="3" bgcolor="#FFFFFF"><div><?php echo $editor;?>
                  <div></div>
            </div></td>
            </tr>-->
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
<div id='loading'><div id='loading_dialog'><img src="<?php echo $current_skin;?>/images/loading.gif" width="32" height="32" /></div></div>
</body>
</html>
