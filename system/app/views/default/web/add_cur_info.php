<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>无标题文档</title>
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
<form action="/index.php/mailer/modu_update" method="post" name="mform" id='mform'>
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
            <td height="18" bgcolor="#FFFFFF"><div align="center" class="STYLE2 STYLE1">接口名字</div></td>
            <td bgcolor="#FFFFFF"><label>
            <input name="modu_name" type="text" id="textfield" size="70" value="<?php echo $re['modu_name'];?>" />
            </label></td>
            <td height="18" bgcolor="#FFFFFF"><div align="center"><span class="STYLE2"><img src="<?php echo $current_skin;?>/images/010.gif" width="9" height="9" /> </span><input type="submit" value='提交'></div></td>
          </tr>
          <tr>
            <td height="27" bgcolor="#FFFFFF"><div align="center">所选数据库</div></td>
               <td bgcolor="#FFFFFF">
			  <select id="select" name="db">
			  
         <option value="mysql" <?php if($re['db']=="mysql"):echo"selected"; endif?>>mysql</option>
         <option value="mysqli" <?php if($re['db']=="mysqli"):echo"selected" ;endif?>>mysqli</option>
         <option value="mssql" <?php if($re['db']=="mssql"):echo"selected" ;endif?>>mssql</option>
         <option value="oci8" <?php if($re['db']=="oci8"):echo"selected" ;endif?>>oci8</option>
         <option value="odbc" <?php if($re['db']=="odbc"):echo"selected"; endif?>>odbc</option>
         <option value="postgre" <?php if($re['db']=="postgre"):echo"selected" ;endif?>>postgre</option>
         <option value="sqlite" <?php if($re['db']=="sqlite"):echo"selected"; endif?>>sqlite</option>
			</select>
			   </select>
               <td height="27" bgcolor="#FFFFFF" align='center'><input type="reset" value='重置'></td>
          </tr>
          <tr>
            <td height="18" bgcolor="#FFFFFF"><div align="center">数据库名字</div></td>
            <td bgcolor="#FFFFFF"><label>
              <input name="db_name" type="text" id="textfield11" size="20" value="<?php echo $re['db_name'];?>"/>
              <div align="center"></div>
            </label></td>
            <td height="18" bgcolor="#FFFFFF">&nbsp;</td>
          </tr>
          <tr>
            <td height="18" bgcolor="#FFFFFF"><div align="center">数据库用户名</div></td>
            <td bgcolor="#FFFFFF"><input type="hidden" name='id' value="<?php echo $re['id']?>"><input name="user" type="text" id="textfield12" size="20"  value="<?php echo $re['user'];?>"/></td>
            <td height="18" bgcolor="#FFFFFF"> </td>
          </tr>
		   <tr>
            <td height="18" bgcolor="#FFFFFF"><div align="center">数据库密码</div></td>
            <td bgcolor="#FFFFFF"><input name="pwd" type="text" id="textfield12" size="20"  value="<?php echo $re['pwd'];?>"/></td>
            <td height="18" bgcolor="#FFFFFF"> </td>
          </tr>
		   <tr>
            <td height="18" bgcolor="#FFFFFF"><div align="center">表名</div></td>
            <td bgcolor="#FFFFFF"><input name="table_name" type="text" id="textfield12" size="20"  value="<?php echo $re['table_name'];?>"/></td>
            <td height="18" bgcolor="#FFFFFF"> </td>
          </tr>
		   <tr>
            <td height="18" bgcolor="#FFFFFF"><div align="center">数据库所在地址</div></td>
            <td bgcolor="#FFFFFF"><input name="address" type="text" id="textfield12" size="40" value="<?php echo $re['address'];?>" /></td>
            <td height="18" bgcolor="#FFFFFF"> </td>
          </tr>
		   <tr>
            <td height="18" bgcolor="#FFFFFF"><div align="center">数据库编码</div></td>
            <td bgcolor="#FFFFFF"><input name="cod" type="text" id="textfield10" size="20"  value="<?php echo $re['cod'];?>"/></td>
            <td height="18" bgcolor="#FFFFFF"> </td>
          </tr>
		   <tr>
            <td height="18" bgcolor="#FFFFFF"><div align="center">字段名字</div></td>
            <td bgcolor="#FFFFFF"><input name="field" type="text" id="textfield12" size="20" value="<?php echo $re['field'];?>" /></td>
            <td height="18" bgcolor="#FFFFFF"> </td>
          </tr>
          <tr>
            <td height="18" bgcolor="#FFFFFF"><div align="center">选择接口类型
              </div></td>
            <td height="18" bgcolor="#FFFFFF"><div align="center">
              <input name="cate" type="radio"  id="rad_csv"  value="1"  <?php if($re['cate']==1):echo"checked='checked'"; endif?> />
              手机
              <input type="radio" name="cate"  value="0" id="rad_sql"  <?php if($re['cate']!=1):echo"checked='checked'"; endif?> />
              邮箱</div></td>
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
