<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>�ޱ����ĵ�</title>
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
</head>

<body>
<form action="/index.php/mailer/modu_add_insert" method="post" name="mform" id='mform'>
<div ><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="30"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="15" height="30"><img src="<?php echo $current_skin;?>/images/tab_03.gif" width="15" height="30" /></td>
        <td background="<?php echo $current_skin;?>/images/tab_05.gif"><img src="<?php echo $current_skin;?>/images/311.gif" width="16" height="16" />SMPT¼��</td>
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
            <td height="18" bgcolor="#FFFFFF"><div align="center" class="STYLE2 STYLE1">�ӿ�����</div></td>
            <td bgcolor="#FFFFFF"><label>
            <input name="modu_name" type="text" id="textfield" size="70"  />
            </label></td>
            <td height="18" bgcolor="#FFFFFF"><div align="center"><span class="STYLE2"><img src="<?php echo $current_skin;?>/images/010.gif" width="9" height="9" /> </span><input type="submit" value='�ύ'></div></td>
          </tr>
          <tr>
            <td height="27" bgcolor="#FFFFFF"><div align="center">��ѡ���ݿ�</div></td>
               <td bgcolor="#FFFFFF">
			  <select id="select" name="db">
         <option value="mysql">mysql</option>
         <option value="mysqli">mysqli</option>
         <option value="mssql">mssql</option>
         <option value="oci8">oci8</option>
         <option value="odbc">odbc</option>
         <option value="postgre">postgre</option>
         <option value="sqlite">sqlite</option>
			</select>
			   </select>
               <td height="27" bgcolor="#FFFFFF" align='center'><input type="reset" value='����'></td>
          </tr>
          <tr>
            <td height="18" bgcolor="#FFFFFF"><div align="center">���ݿ�����</div></td>
            <td bgcolor="#FFFFFF"><label>
              <input name="db_name" type="text" id="textfield11" size="20" />
              <div align="center"></div>
            </label></td>
            <td height="18" bgcolor="#FFFFFF">&nbsp;</td>
          </tr>
          <tr>
            <td height="18" bgcolor="#FFFFFF"><div align="center">���ݿ��û���</div></td>
            <td bgcolor="#FFFFFF"><input name="user" type="text" id="textfield12" size="20"  /></td>
            <td height="18" bgcolor="#FFFFFF"> </td>
          </tr>
		   <tr>
            <td height="18" bgcolor="#FFFFFF"><div align="center">���ݿ�����</div></td>
            <td bgcolor="#FFFFFF"><input name="pwd" type="text" id="textfield12" size="20"  /></td>
            <td height="18" bgcolor="#FFFFFF"> </td>
          </tr>
		   <tr>
            <td height="18" bgcolor="#FFFFFF"><div align="center">����</div></td>
            <td bgcolor="#FFFFFF"><input name="table_name" type="text" id="textfield12" size="20"  /></td>
            <td height="18" bgcolor="#FFFFFF"> </td>
          </tr>
		   <tr>
            <td height="18" bgcolor="#FFFFFF"><div align="center">���ݿ����ڵ�ַ</div></td>
            <td bgcolor="#FFFFFF"><input name="address" type="text" id="textfield12" size="40"  /></td>
            <td height="18" bgcolor="#FFFFFF"> </td>
          </tr>
		   <tr>
            <td height="18" bgcolor="#FFFFFF"><div align="center">���ݿ����</div></td>
            <td bgcolor="#FFFFFF"><input name="cod" type="text" id="textfield10" size="20"  /></td>
            <td height="18" bgcolor="#FFFFFF"> </td>
          </tr>
		   <tr>
            <td height="18" bgcolor="#FFFFFF"><div align="center">�ֶ�����</div></td>
            <td bgcolor="#FFFFFF"><input name="field" type="text" id="textfield12" size="20" value="" /></td>
            <td height="18" bgcolor="#FFFFFF"> </td>
          </tr>
          <tr>
            <td height="18" bgcolor="#FFFFFF"><div align="center">ѡ��ӿ�����
              </div></td>
            <td height="18" bgcolor="#FFFFFF"><div align="center">
              <input name="cate" type="radio"  id="rad_csv"  value="1" checked="checked" />
              �ֻ�
              <input type="radio" name="cate"  value="0" id="rad_sql" />
              ����</div></td>
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
