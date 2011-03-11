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
	  $('#upfile').uploadify({ 
			'uploader':  '<?php echo $current_up;?>/js/upload/uploadify.swf', 
			'script':    '/index.php/ajax/upfile', 
			'folder':    '/upfile', 
			'cancelImg': '<?php echo $current_up;?>/js/upload/cancel.png',
			'fileDesc' : '*.文本;网页', 
		    'fileExt' : '*.txt;*.htm;*.html;', 
			'buttonText': '_|_',
			'auto':      true,
			onComplete : function(event, ID, fileObj, response, data) {
			      alert('文件' + fileObj.name + '上传成功');
							$.ajax({
								type: "POST",
								url: "/index.php/ajax/get_file_content",
								data: "file_name=" + fileObj.name,
								success: function(msg){
						             SetEditorContents('content',msg);
									 alert('导入成功!');
								} 

							});
			}
			
//			onError : function(event, queueID, fileObj) { 
//			    alert("文件:" + fileObj.name + "上传失败"); 
//			}, 
//			onCancel : function(event, queueID, fileObj){ 
//			  alert("您取消了" + fileObj.name); 
//			}  
	   });

	   $('#save_temp_dialog').dialog({
	                autoOpen: false,
					width: 600,
					resizable: false,
					modal: true,
					title: '模板保存',
                    buttons:{
					     "Ok": function(){
								tname = $("input=[name='temp_name']").val();
								temp_id = $("input=[name='temp_id']").val();
								mail_to = $("input=[name='mail_to']").val();
								mail_subject = $("input=[name='mail_subject']").val();
								content = GetEditorContents('content');
                                $('#loading_dialog').dialog('option','title','保存中..,请稍后');
								$.ajax({
										type:'POST',
										url:'/index.php/ajax/save_temp',
											//encodeURIComponent('张');
										data:'temp_id=' + temp_id + '&temp_name=' + tname + '&mail_to=' + mail_to + 
										'&mail_subject=' + mail_subject + '&content=' + encodeURIComponent(content),
										success: function(msg){
											 alert(msg);
											 
										}
								});
								$(this).dialog('close'); 
						  },
						 "Cancel": function(){
							// alert('ss');
							  $(this).dialog('close');
						  }
					}

	   });
	   $('#save_to_temp').click(function(){
			$("input=[name='mail_to']").val('__mail_to__');
			//$("input=[name='mail_subject']").val('__mail_to__');
            $('#save_temp_dialog').dialog('open');
	   });
//	   //http://www.t960.com
		$('#dialog').dialog({
					autoOpen: false,
					width: 600,
					resizable: false,
					Modal: true,
					title: '在线网页导入',
					buttons: {
						"Ok": function() { 
							//$('#loading_dialog').dialog('open');
							$v = $('#export-url').val();
							$.ajax({
								type: "POST",
								url: "/index.php/ajax/get_url_content",
								data: "url=" + $v,
								success: function(msg){
						             SetEditorContents('content',msg);
									 //$('#loading_dialog').dialog('close');
									 alert('导入成功!');
								}

							});
							$(this).dialog("close"); 
						}, 
						"Cancel": function() { 
							$(this).dialog("close"); 
						} 
					}
		});
	   $('#show-export').click(function(){
		            
					$('#dialog').dialog('open');
					return false;
	   });
		$('#up_file_dialog').dialog({
					autoOpen: false,
					width: 600,
					resizable: false,
					modal: true
//					buttons: {
//						"Ok": function() { 
//                            $('#upfile').uploadifyUpload();
//							$(this).dialog("close"); 
//						}, 
//						"Cancel": function() { 
//							$(this).dialog("close"); 
//						} 
//					}
		});

		$('#show-upfile').click(function(){
				$('#up_file_dialog').dialog('open');
				return false;
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
        <td background="<?php echo $current_skin;?>/images/tab_05.gif"><img src="<?php echo $current_skin;?>/images/311.gif" width="16" height="16" />模板修改</td>
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
            <td width="42%" background="<?php echo $current_skin;?>/images/tab_14.gif" class="STYLE1">&nbsp;</td>
            <td width="35%" height="26" background="<?php echo $current_skin;?>/images/tab_14.gif" class="STYLE1"><div align="center" class="STYLE2"> </div></td>
          </tr>
          <tr>
            <td height="18" bgcolor="#FFFFFF"><div align="center" class="STYLE2 STYLE1">收件人</div></td>
            <td bgcolor="#FFFFFF"><label>
              <input name="mail_to" type="text" id="textfield" size="70" />
            </label></td>
            <td height="18" bgcolor="#FFFFFF"><div align="center">[<a href="#" id='save_to_temp'>保存更改</a>] </div></td>
          </tr>
          <tr>
            <td height="18" bgcolor="#FFFFFF"><div align="center" class="STYLE2 STYLE1">发件人</div></td>
            <td bgcolor="#FFFFFF"><label>
              <input name="mail_from" type="text" id="textfield" size="70" />
            </label></td>
            <td height="18" bgcolor="#FFFFFF"><div align="center"><span class="STYLE2"><img src="<?php echo $current_skin;?>/images/010.gif" width="9" height="9" /></span><span class="STYLE2"> </span><span class="STYLE1">[</span><a href="#" id='show-export'>导入在线页面</a><span class="STYLE1">]</span></div></td>
          </tr>
          <tr>
            <td height="18" bgcolor="#FFFFFF"><div align="center" class="STYLE2 STYLE1">主题</div></td>
            <td bgcolor="#FFFFFF"><label>
              <input name="mail_subject" type="text" id="textfield" size="70" value="<?php echo $temp_subject?>" />
               <input name="temp_id" type="hidden" id="textfield" size="70" value="<?php echo $temp_id?>" />
            </label></td>
            <td height="18" bgcolor="#FFFFFF"><div align="center"><span class="STYLE2"><img src="<?php echo $current_skin;?>/images/010.gif" width="9" height="9" /></span><span class="STYLE2"> </span><span class="STYLE1">[</span><a href="#" id='show-upfile'>导入本地页面</a><span class="STYLE1">]</span></div></td>
          </tr>
          <tr>
            <td height="18" bgcolor="#FFFFFF"><div align="center" class="STYLE1">内容</div></td>
            <td bgcolor="#FFFFFF"><div align="center" class="STYLE1">请输入您要发送邮件的内容 </div></td>
            <td height="18" bgcolor="#FFFFFF"><div align="center"></div></td>
          </tr>
          <tr>
            <td height="18" colspan="3" bgcolor="#FFFFFF"><div><?php echo $editor;?>
                  <div></div>
            </div></td>
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
<div id='dialog' title='导入在线网页'>请输入您要导入的网址:<input type='text' name='export-url' id='export-url' size='28' value='http://www.t960.com' /></div>
<div id='up_file_dialog' title='导入本地网页'>单击按钮选择,要上传的文件:<input id="upfile" name="upfile" type="file" /></div>
<div id='save_temp_dialog' title='模板保存'>模板名字:<input id="temp_name" name="temp_name" type="text" value='<?php echo $temp_name?>' /></div>
<div id='loading'><div id='loading_dialog'><img src="<?php echo $current_skin;?>/images/loading.gif" width="32" height="32" /></div></div>
</body>
</html>
