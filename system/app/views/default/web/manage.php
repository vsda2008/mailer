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
<script type="text/JavaScript">

</script>


</head>

<body>
<div style="margin:10px;">
<div style="margin-bottom:10px;"><font style="align:left;font-size:18px; color:red;">接口列表</font>
<font style="align:left;font-size:14px; color:red;"><a href="add_manage">添加新管理员</a></font>
</div>
<table width='400'>
<?php  if($re):?>
<tr><td>管理员名字</td><td>操作</td></tr>
<?php foreach($re as $key=>$value):?>
<tr><td><?php echo $value['username'];?></td><td><a href="del_manage/id/<?php echo $value['user_id'];?>">删除</a></td></tr>
<?php endforeach;?>
<?php else:?>
<tr><td>没有添加管理员请<a href="modu_del/add_manage">添加</a></td></tr>
<?php endif;?>
</table>
</div>
</body>
</html>
