{include file='header.tpl' }  {* <span class="spanred">·</span> *}
<div class="main">
{include file='right.tpl' }
    <div class="right" style="float:left">
    	<div class="righttitle">&nbsp;&nbsp;文章列表</div>
        <div class="rightcontent">
            {foreach name=leftcontent from=$channle_list key=k item=v}
            <li style="clear:both">
            <strong style="float:left; cursor:hand;">
            <a href="index.php?view=1&arc_id={$v.id}">{$v.title}</a>
            </strong>
            <strong style="float:right; ">发布时间:{$v.pub_time}
            </strong>
            </li>
            {/foreach}
          <ul>
          <li id="pagelist" style="clear:both; float:right; margin-top:30px">
                <p>
                <a href='?list_arc=1&channel_id={$channel_id}&pageth=1'>首页</a>
                <a href='?list_arc=1&channel_id={$channel_id}&pageth={$nowpages-1}'>上一页</a>
                <a href='?list_arc=1&channel_id={$channel_id}&pageth={$nowpages+1}'>下一页</a>
                <a href='?list_arc=1&channel_id={$channel_id}&pageth={$pages}'>尾页</a>
                <strong style='color:#99FF66'>当前{$nowpages}页</strong>
                <strong style='color:#99FF66'>共{$pages}页</strong>
                </p>
           </li>
          </ul>
       </div>
    </div>
</div>
{include file='footer.tpl'}