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
<script type="text/JavaScript">

</script>


</head>

<body>
<div style="margin:10px;">
<div style="margin-bottom:10px;"><font style="align:left;font-size:18px; color:red;">�ӿ��б�</font>
<font style="align:left;font-size:14px; color:red;"><a href="modu_add">�����½ӿ�</a></font>
</div>
<table width='400'>
<tr><td>�ӿ�����</td><td>����</td></tr>
<?php foreach($re as $key=>$value):?>
<tr><td><?php echo $value['modu_name'];?></td><td><a href="modu_edit/id/<?php echo $value['id'];?>">�޸�</a>|<a href="modu_del/id/<?php echo $value['id'];?>">ɾ��</a>|<a href="modu_load/id/<?php echo $value['id'];?>"><?php if($value['cate']==0):?>�ʼ�¼��<?php else:?>�ֻ�¼��<?php endif;?></a></td></tr>
<?php endforeach;?>
</table>
</div>
</body>
</html>