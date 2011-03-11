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
<div style="margin-bottom:10px;"><font style="align:left;font-size:18px; color:red;">跟踪期数列表</font>
</div>
<table width='400'>
<tr><td>跟踪期数</td><td>操作</td></tr>
<?php foreach($re as $key=>$value):?>
<tr><td><?php echo $value['f_name'];?></td><td><a href="hr_click/id/<?php echo $value['f_id'];?>">查看链接</a></td></tr>
<?php endforeach;?>
</table>
</div>
</body>
</html>
