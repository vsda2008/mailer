<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>�ޱ����ĵ�</title>
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
	  $('#btn_post_mail').click(function(){
		    ph = $("input[name='input_phone']").val();
			$.ajax({
				type: "POST",
				url: "/index.php/ajax/add_one_phone",
				data: "phone=" + ph,
				success: function(msg){
					 alert(msg);
				} 

			});
	  });
	  $('#loading_dialog').dialog({
	                 autoOpen: false,
					 width: 600,
					 resizable: false,
					 modal: true,
					 title: '������,���Ժ�...'
	   
	   });
	  $('input[type=text]').focus(function(){
	      $(this).val('');
	      //alert($(this).val());
	  });
	  $('#upfile').uploadify({ 
			'uploader':  '<?php echo $current_up;?>/js/upload/uploadify.swf', 
			'script':    '/index.php/ajax/upfile', 
			'folder':    '/upfile', 
			'cancelImg': '<?php echo $current_up;?>/js/upload/cancel.png',
			'fileDesc' : '���ŷָ���,�ı�(!��֧��������)',
			'fileExt' : '*.csv;*.txt;',
			'buttonText': '_|_',
			'auto':      true,
			onComplete : function(event, ID, fileObj, response, data) {
			    //  alert('�ļ�: ' + fileObj.name + ' �ϴ��ɹ�');
                            type = $("input[name='export_type']:checked").val();
							$.ajax({
								type: "POST",
								url: "/index.php/ajax/export_phone",
								data: "file_name=" + fileObj.name + '&export_type=' + type,
								success: function(msg){
									 alert(msg);
								} 

							});

			}
	   }); 
		$('#dialog').dialog({
					autoOpen: false,
					width: 600,
					resizable: false,
					modal: true,
					title: '���ݿ�����:',
					buttons: {
						"Ok": function() { 
							post_str = '';
                            $('input[type=text]').each(function(i){
								   text = $(this).val();
								   
							       if( typeof text != 'undefined' && text != ''){
							         post_str +=  this.name + '=' + text + '&';
								   };
								 
							});
							driver = $('select[name=dbdriver]').val();
							$.ajax({
								type: "POST",
								url: "/index.php/ajax/export_phone",
								data: post_str + 'export_type=sql&dbdriver=' + driver,
								success: function(msg){
									alert(msg);
								} 

							});
							$(this).dialog("close"); 
						}, 
						"Cancel": function() { 
							$(this).dialog("close"); 
						} 
					}
		});
	   $('#rad_sql').click(function(){
		         type = $("input[name='export_type']:checked").val();
				 if( typeof type == 'undefined'  ){alert('����û��ѡ��!'); return false;}else{
				    $('#dialog').dialog('open'); 
					
				 };
	   });
		$('#up_file_dialog').dialog({
					autoOpen: false,
					width: 600,
					resizable: false,
					modal: true
		});

	   $('#rad_csv').click(function(){
		         type = $("input[name='export_type']:checked").val();
				  
				 if( typeof type == 'undefined'  ){alert('����û��ѡ��!'); return false;}else{
				     $('#up_file_dialog').dialog('open'); 
				 };
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
        <td background="<?php echo $current_skin;?>/images/tab_05.gif"><img src="<?php echo $current_skin;?>/images/311.gif" width="16" height="16" />�ֻ�¼��</td>
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
            <td width="42%" background="<?php echo $current_skin;?>/images/tab_14.gif" class="STYLE1"><div align="center">�����ַ</div></td>
            <td width="35%" height="26" background="<?php echo $current_skin;?>/images/tab_14.gif" class="STYLE1">&nbsp;</td>
          </tr>
          <tr>
            <td height="18" bgcolor="#FFFFFF"><div align="center" class="STYLE2 STYLE1">����¼��</div></td>
            <td bgcolor="#FFFFFF"><label>
              <input name="input_phone" type="text" id="textfield" size="70" />
            </label></td>
            <td height="18" bgcolor="#FFFFFF"><div align="center"><span class="STYLE2"><img src="<?php echo $current_skin;?>/images/010.gif" width="9" height="9" /> </span><span class="STYLE1">[<a href="#"  id="btn_post_mail">�ݽ�</a>]</span></div></td>
          </tr>
          <tr>
            <td height="27" bgcolor="#FFFFFF">&nbsp;</td>
               <td bgcolor="#FFFFFF">
              <div align="center" class="STYLE2">��������</div>              </td>
               <td height="27" bgcolor="#FFFFFF">&nbsp;</td>
          </tr>
          <tr>
            <td height="18" bgcolor="#FFFFFF"><div align="center">��������</div></td>
            <td bgcolor="#FFFFFF"><label>
            <div align="center">
              <input type="radio" name="export_type"  value="csv"  id="rad_csv" />
              csv ����
             <input type="radio" name="export_type"  value="sql" id="rad_sql" />
              ���ݿ⵼��</div>
            </label></td>
            <td height="18" bgcolor="#FFFFFF">&nbsp;</td>
          </tr>
          <tr>
            <td height="18" bgcolor="#FFFFFF">&nbsp;</td>
            <td bgcolor="#FFFFFF">&nbsp;</td>
            <td height="18" bgcolor="#FFFFFF"> </td>
          </tr>
          <tr>
            <td height="18" colspan="3" bgcolor="#FFFFFF">&nbsp;</td>
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
<div id='dialog' title='���ݿ�����' style='display:none'>�������������ݿ�����:���ݿ�����:
  <label>
  <select name="dbdriver" id="select">
         <option>mysql</option>
         <option>mysqli</option>
         <option>mssql</option>
         <option>oci8</option>
         <option>odbc</option>
         <option>postgre</option>
         <option>sqlite</option>
  </select>
  </label>
  <p>��&nbsp;&nbsp;&nbsp;��:
    <input name="username" type="text" id="textfield2" size="15" value='trip3721' /> 
    ��&nbsp;&nbsp;&nbsp;��:
    <input name="password" type="text" id="textfield3" size="15" value='trip3721784352'/>
  </p>
  <p>��&nbsp;&nbsp;&nbsp;ַ:
    <input name="hostname" type="text" id="textfield6" size="15" value='www.t960.com'/>
  
���ݿ�:
    <input name="database" type="text" id="textfield4" size="15" value='trip3721_newweb'/>
</p>
  <p>��&nbsp;&nbsp;&nbsp;��:
    <input name="char_set" type="text" id="textfield5" size="15" value='gb2312'/>
    ��&nbsp;&nbsp;��
    :
    <input name="table_name" type="text" id="textfield7" size="15" value='t960_members'/>
</p>
  <p>(��)��:
    <input name="mail" type="text" id="textfield8" size="15" value='email'/>
</p>
  <p>(��)��:
    <input name="phone" type="text" id="textfield9" size="15"value='phone' />
  </p>
</div>
<div id='up_file_dialog' title='���뱾���ļ�' style='display:none'>������ťѡ��,Ҫ�ϴ����ļ�:<input id="upfile" name="upfile" type="file" /></div>
<div id='loading' style='display:none'><div id='loading_dialog'><img src="<?php echo $current_skin;?>/images/loading.gif" width="32" height="32" /></div></div>
</body>
</html>