{include file='header.tpl' }  {* <span class="spanred">·</span> *}
<div class="main">
{include file='right.tpl' }
    <div class="right" style="float:left">
    	<div class="righttitle">&nbsp;&nbsp;文章列表</div>
        <div class="rightcontent">
        {foreach name=outer from=$id_list key=k item=v}
          <div style="float:left; width:46%; border:1px #FFFFFF solid; margin-bottom:5px; margin-bottom:10px; margin-left:10px;">
              {foreach from=$v key=kk item=vv}
              <div style="position:relative; top:5px;" ><strong style="color:#99FF66">{$kk}</strong></div>
              <hr />
                  {foreach from=$vv key=kkk item=vvv}
                    <div style="text-align:left; margin-left:20px;">
                    <a href="index.php?view=1&arc_id={$vvv.id}">{$vvv.title}</a>
                    </div> 
                  {/foreach}      
              {/foreach}
          </div>
        {/foreach}  
    </div>
</div>
{include file='footer.tpl'}