<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<script language="javascript" src="<?php echo $current_skin;?>/js/jquery.js" ></script>
<script language="javascript" src="<?php echo $current_skin;?>/js/common.js" ></script>
<title><?php echo $title;?></title>
</head>

<frameset rows="61,*,24" cols="*" framespacing="0" frameborder="no" border="0">
  <frame src="<?php echo $top;?>" name="topFrame" scrolling="No" noresize="noresize" id="topFrame" />
  
      <frame src="<?php echo $center;?>" name="mainFrame" id="mainFrame" />
      <frame src="<?php echo $down;?>" name="bottomFrame" scrolling="No" noresize="noresize" id="bottomFrame" />

</frameset>
<noframes><body>
</body>
</noframes></html>
