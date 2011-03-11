{include file='header.tpl' }
<div class="main">
{include file='right.tpl' }
    <div class="right" style="float:left">
    	<div class="righttitle" style="text-align:center; ">
        {foreach from=$arc key=k item=arc }
        <h2 style="position:relative; top:10px;">{$arc.title}</h2>
        <p style="border-bottom:#999999 solid 2px"> 来源:{$arc.source}&nbsp;|作者:{$arc.anthor}&nbsp;|时间:{$arc.pub_time}&nbsp;|点击:<strong style="color:#FF0000" id="digg">{$arc.digg}
</strong></p>
        </div>
        <div class="rightcontent" style="text-indent:2em; margin:10px; text-align:justify; font-size:18px; overflow:hidden">
            {$arc.body}
       </div>
       {/foreach}
    </div>
</div>
{include file='footer.tpl'}
